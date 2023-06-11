@extends('layouts.app')
@section('content')
   <!-- Basic table -->
<section id="basic-datatable">
<div class="row">
<div class="col-12">
<div class="card">
    <div class="card-header border-bottom p-1">
        <div class="head-label"><h6 class="mb-0">Kriteria</h6></div>
        <button id="createNewData" class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button"  >
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mr-50 font-small-4">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Tambah Data
            </span>
        </button>
    </div>
    <div class="container">
    <table class="data-table table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Kriteria</th>
                <th>Nama Kriteria</th>
                <th>Bobot</th>
                <th>Jenis</th> 
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    </div>
</div>
</div>
</div>


<!-- Modal -->
<div class="modal fade text-left" id="modalBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
    <h4 class="modal-title" id="modalHeading">Basic Modal</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">

<form id="dataForm" name="dataForm" class="form-horizontal">
    <!-- validator -->

    <ul class="list-group" id="errors-validate">
       
    </ul>

    <!-- end -->

    <input type="hidden" name="data_id" id="data_id">
    <div class="form-group">
        <label class="form-label" for="basic-icon-default-fullname">Kode Kriteria</label>
        <input type="text" class="form-control dt-full-name required" id="kode_kriteria" name="kode_kriteria" required="">
    </div>
    <div class="form-group">
        <label class="form-label" for="basic-icon-default-post">Nama Kriteria</label>
        <input type="text" id="nama_kriteria" class="form-control dt-post required" name="nama_kriteria">
    </div>
    
    <div class="form-group">
        <label class="form-label" for="basic-icon-default-post">Bobot</label>
        <input type="text" id="bobot_kriteria" class="form-control dt-post required" name="bobot_kriteria">
    </div>
    <div class="form-group">
        <label class="form-label" for="basic-icon-default-post">Jenis</label>
        <input type="text" id="tipe_kriteria" class="form-control dt-post required" name="tipe_kriteria">
    </div>
  <!-- end form  -->
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cencel</button>
    <button type="submit"  id="saveBtn" class="btn btn-primary" >Save</button>

</div>
</form>
</div>
</div>
</div>
<!-- end modal --> 

</section>
@endsection


@push('before-script')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>

@endpush

@push('after-script')
    <script>
    // start function
    $(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // get data
    var table = $('.data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('kriteria.index') }}",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'kode_kriteria', name: 'kode_kriteria'},
        {data: 'nama_kriteria', name: 'nama_kriteria'}, 
        {data: 'bobot_kriteria', name: 'bobot_kriteria'},
        {data: 'tipe_kriteria', name: 'tipe_kriteria'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
    });
    // end 

    
    // button create new data
    $('#createNewData').click(function () {
        $('#saveBtn').html("Save");
        $('#data_id').val('');
        $('#dataForm').trigger("reset");
        $('#modalHeading').html("Tambah Data");
        $('#modalBox').modal('show');
        $("#errors-validate").hide();
        $('#saveBtn').prop('disabled', false);
    });
    // end 

    // store process
    if ($("#dataForm").length > 0) {
            $("#dataForm").validate({
                submitHandler: function(form) {

                    // button action
                    var actionType = $('#saveBtn').val();
                    $('#saveBtn').html('Sending..');
                    $('#saveBtn').prop('disabled', true);
                    // end 

                    $.ajax({
                    data: $('#dataForm').serialize(),
                    url: "{{ route('kriteria.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {

                        if(data.status == 'sukses'){
                            $('#modalBox').modal('hide');
                            Swal.fire("Selamat", data.message , "success");
                            $('#dataForm').trigger("reset");
                            table.draw();

                        }else{
                        $('#message-error').html(data.message).show()
                        }
                    },
                    error:function(xhr, status, error)  {
                        $.each(xhr.responseJSON.errors, function (key, item) 
                        {
                            $("#errors-validate").show();
                            $("#errors-validate").append("<li class='list-group-item list-group-item-danger'>"+item+"</li>")
                        }); 
                    }
                });

                }
            })
        }
    // end

    // edit data
    $('body').on('click', '.editData', function () {
        var data_id = $(this).data('id');
            $.get("{{ route('kriteria.index') }}" +'/' + data_id +'/edit', function (data) {
                // console.log(data);
            $('#saveBtn').html("Update");  
            $('#modalHeading').html("Edit Data");
            $('#modalBox').modal('show');
            $("#errors-validate").hide();
            $('#saveBtn').prop('disabled', false);
            // get data respone
            $('#data_id').val(data.id);
            $('#kode_kriteria').val(data.kode_kriteria);
            $('#nama_kriteria').val(data.nama_kriteria); 
            $('#bobot_kriteria').val(data.bobot_kriteria);
            $('#tipe_kriteria').val(data.tipe_kriteria);
        })
    });
    // end
    
    // delete
    $('body').on('click', '.deleteData', function () {
        // delete berdasarkan route delete
        var data_id = $(this).data("id");
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Anda tidak dapat mengembalikan data yang sudah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak, Batalkan!',
            reverseButtons: true
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "DELETE",
                    // gunaknak url route delete
                    url: "{{ url('alternatif') }}/" + data_id,
                    success: function (data) {
                        table.draw();
                        Swal.fire(
                        'Deleted!',
                        'Data berhasil dihapus.',
                        'success'
                        )
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        Swal.fire(
                        'Cancelled',
                        'Data gagal dihapus :)',
                        'error'
                        )
                    }
                });
            } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
            ) {
            Swal.fire(
                'Cancelled',
                'Data gagal dihapus :)',
                'error'
            )
            }
        })
    });
    // end delete

    // end function 
});

    </script>
@endpush
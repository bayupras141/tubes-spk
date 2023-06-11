@extends('layouts.app')
@section('content')
   <!-- Basic table -->
<section id="basic-datatable">
<div class="row">
<div class="col-12">
<div class="card">
    {{-- foreach by kriteria --}}
    <div class="card-header border-bottom p-1">
        <div class="head-label"><h6 class="mb-0">Alternatif</h6></div>
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
        {{-- fix style width agar tidak beruhab --}}
    <style>
        .data-table{
            width: 100% !important;
        }
    </style>
    <table class="data-table table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Alternatif</th>
                <th>Nama Alternatif</th> 
                <th>C1</th>
                <th>C2</th>
                <th>C3</th>
                <th>C4</th>
                <th>C5</th>
                <th>C6</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="dataAlternatif">

        </tbody>
    </table>
    </div>

    {{-- end foreach --}}
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
        <label class="form-label" for="basic-icon-default-post">Kode Alternatif</label>
        <input type="text" id="kode_alternatif" class="form-control dt-post required" name="kode_alternatif">
    </div>
    
    <div class="form-group">
        <label class="form-label" for="basic-icon-default-post">Nama Alternatif</label>
        <input type="text" id="nama_alternatif" class="form-control dt-post required" name="nama_alternatif">
    </div>
    <div class="form-group">
        <label class="form-label" for="basic-icon-default-post">C1</label>
        <input type="text" id="c1" class="form-control dt-post required" name="c1">
    </div>
    <div class="form-group">
        <label class="form-label" for="basic-icon-default-post">C2</label>
        <input type="text" id="c2" class="form-control dt-post required" name="c2">
    </div>
    <div class="form-group">
        <label class="form-label" for="basic-icon-default-post">C3</label>
        <input type="text" id="c3" class="form-control dt-post required" name="c3">
    </div>
    <div class="form-group">
        <label class="form-label" for="basic-icon-default-post">C4</label>
        <input type="text" id="c4" class="form-control dt-post required" name="c4">
    </div>
    <div class="form-group">
        <label class="form-label" for="basic-icon-default-post">C5</label>
        <input type="text" id="c5" class="form-control dt-post required" name="c5">
    </div>
    <div class="form-group">
        <label class="form-label" for="basic-icon-default-post">C6</label>
        <input type="text" id="c6" class="form-control dt-post required" name="c6">
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
    // get data
    var table = $('.data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('alternatif.index') }}",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'kode_alternatif', name: 'kode_alternatif'},
        {data: 'nama_alternatif', name: 'nama_alternatif'},
        {data: "c1", name: "c1"},
        {data: "c2", name: "c2"},
        {data: "c3", name: "c3"},
        {data: "c4", name: "c4"},
        {data: "c5", name: "c5"},
        {data: "c6", name: "c6"},
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
    });

    // edit data
    $('body').on('click', '.editData', function () {

        var data_id = $(this).data('id');
        $.get($(location).attr('href') +'/' + data_id +'/edit', function (data) {
            $('#saveBtn').html("Update");  
            $('#modalHeading').html("Edit Data");
            $('#modalBox').modal('show');
            $("#errors-validate").hide();
            $('#saveBtn').prop('disabled', false);
            // get data respone
            $('#data_id').val(data.id);
            $('#kode_alternatif').val(data.kode_alternatif);
            $('#nama_alternatif').val(data.nama_alternatif);
            $('#c1').val(data.c1);
            $('#c2').val(data.c2);
            $('#c3').val(data.c3);
            $('#c4').val(data.c4);
            $('#c5').val(data.c5);
            $('#c6').val(data.c6);
        })
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
                    url: "{{ route('alternatif.store') }}",
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


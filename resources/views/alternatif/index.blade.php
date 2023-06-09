@extends('layouts.app')
@section('content')
   <!-- Basic table -->
<section id="basic-datatable">
<div class="row">
<div class="col-12">
<div class="card">
    {{-- foreach by kriteria --}}
    <div class="card-header border-bottom p-1">
        <div class="head-label"><h6 class="mb-0">Sub Kriteria</h6></div>
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
                <th>Kode Alternatif</th>
                <th>Nama Alternatif</th> 
                <th>C1</th>
                <th>C2</th>
                <th>C3</th>
                <th>C4</th>
                <th>C5</th>
                <th>C6</th>
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
    ajax: "{{ route('alternatif.index') }}",
    var html = '';
        var i;
        var no = 1;
        for(i=0; i<data.length; i++){ 
            html += '<tr>'+
                    '<td>'+no+'</td>'+
                    '<td>'+data[i].kode_alternatif+'</td>'+
                    '<td>'+data[i].nama_alternatif+'</td>'+
                    '<td>'+data[i].penilaian.c1+'</td>'+
                    '<td>'+data[i].penilaian.c2+'</td>'+
                    '<td>'+data[i].penilaian.c3+'</td>'+
                    '<td>'+data[i].penilaian.c4+'</td>'+
                    '<td>'+data[i].penilaian.c5+'</td>'+
                    '<td>'+data[i].penilaian.c6+'</td>'+
                    
                    '</tr>';
            no ++;
        } 
        $('#dataAlternatif').html(html);
        })

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
        })
        });
        // end

    // // edit data
    // $('body').on('click', '.editData', function () {

    //     var data_id = $(this).data('id');
    //     $.get("{{ route('kriteria.index') }}" +'/' + data_id +'/edit', function (data) {

    //         $('#saveBtn').html("Update");  
    //         $('#modalHeading').html("Edit Data");
    //         $('#modalBox').modal('show');
    //         $("#errors-validate").hide();
    //         $('#saveBtn').prop('disabled', false);
    //         // get data respone
    //         $('#data_id').val(data.id);
    //         $('#kode_kriteria').val(data.kode_kriteria);
    //         $('#nama_kriteria').val(data.nama_kriteria); 
    //         $('#bobot_kriteria').val(data.bobot_kriteria);
    //         $('#tipe_kriteria').val(data.tipe_kriteria);
           
    //     })

    //     });

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
                var data_id = $(this).data("id");
                Swal.fire({
                    title: "Apa kamu yakin?",
                    text: "Menghapus data ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!',
                    dangerMode: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                          'Terhapus!',
                          'Data berhasil dihapus.',
                          'success'
                        )
                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('alternatif.store') }}"+'/'+data_id,
                            success: function (data) {
                                table.draw();
                            },
                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                })
            });
            // end delete
    // end function 
    });

    </script>
@endpush


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countries List</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatable/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatable/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
</head>
<body>
    
    <div class="container p-5">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Countries</h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCountryModal">
                    Add New Country
                </button>
            </div>            
            <div class="card-body">
                <table class="table" id="counties-table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Country</th>
                            <th>Capital</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       {{-- @include("displayCountries") --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
      
    @include("addMOdel")    
    @include("editModel")

    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <script>
        // $(document).ready(function () {
        //     alert("cc");
        // });
        toastr.options.preventDuplicates = true;
        toastr.options.positionClass = 'toast-top-center';
        
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $(function() {
            // add new country
            $('#add-country-form').on('submit',function(e){
                e.preventDefault();
                let form = this;
                $.ajax({
                    url:$(form).attr('action'),
                    method:$(form).attr('method'),
                    data:new FormData(form),
                    processData:false,
                    dataType:'json',
                    contentType:false,
                    beforeSend:function(){
                        $(form).find('span.error-text').text('');
                    },
                    success:function(data){
                        if(data.code == 0){
                            $.each(data.error, function (indexInArray, valueOfElement) { 
                                $(form).find('span.' +indexInArray+'_error').text(valueOfElement[0]); 
                            });
                        }else{
                            $('#addCountryModal').modal("hide");

                            $('#counties-table').DataTable().ajax.reload(null, false);
                            toastr.success(data.msg);
                        }
                    }
                });
            });

            //GET ALL COUNTRIES
            $('#counties-table').DataTable({
                    processing:true,
                    info:true,
                    ajax:"{{ route('get.countries.list') }}",
                    pageLength: 5,
                    lengthMenu: [5, 10, 15, 20],
                    columns: [
                        {data:'DT_RowIndex', name:'DT_RowIndex'},
                        {data:'country_name', name:'country_name'},
                        {data:'capital_city', name:'capital_city'},
                        { data: 'actions', name: 'actions'}                    
                    ],
            });

            $(document).on('click', '#editCountryBtn', function(){
                let country_id = $(this).data('id');
                $('#editCountryModal').find('form')[0].reset();
                $('#editCountryModal').find('span.error-text').text('');
                $.post('<?= route("get.countries.details") ?>',{country_id:country_id}, function(data){
                    // alert(data.details.country_name);
                    $('#editCountryModal').find('input[name="cid"]').val(data.details.id);
                    $('#editCountryModal').find('input[name="country_name"]').val(data.details.country_name);
                    $('#editCountryModal').find('input[name="capital_city"]').val(data.details.capital_city);
                    $('#editCountryModal').modal('show');
                }, 'json');
            });

            // add new country
            $('#update-country-form').on('submit',function(e){
                e.preventDefault();
                let form = this;
                $.ajax({
                    url:$(form).attr('action'),
                    method:$(form).attr('method'),
                    data:new FormData(form),
                    processData:false,
                    dataType:'json',
                    contentType:false,
                    beforeSend:function(){
                        $(form).find('span.error-text').text('');
                    },
                    success:function(data){
                        if(data.code == 0){
                            $.each(data.error, function (indexInArray, valueOfElement) { 
                                $(form).find('span.' +indexInArray+'_error').text(valueOfElement[0]); 
                            });
                        }else{
                            editCountryModal
                            $('#editCountryModal').modal("hide");
                            $('#editCountryModal').find('form')[0].reset();
                            $('#counties-table').DataTable().ajax.reload(null, false);
                            toastr.success(data.msg);
                        }
                    }
                });
            });

            //DELETE COUNTRY RECORD
            $(document).on('click','#deleteCountryBtn', function(){
            var country_id = $(this).data('id');
            var url = '<?= route("delete.country") ?>';

                swal.fire({
                        title:'Are you sure?',
                        html:'You want to <b>delete</b> this country',
                        showCancelButton:true,
                        showCloseButton:true,
                        cancelButtonText:'Cancel',
                        confirmButtonText:'Yes, Delete',
                        cancelButtonColor:'#d33',
                        confirmButtonColor:'#556ee6',
                        width:300,
                        allowOutsideClick:false
                }).then(function(result){
                        if(result.value){
                            $.post(url,{country_id:country_id}, function(data){
                                if(data.code == 1){
                                    $('#counties-table').DataTable().ajax.reload(null, false);
                                    toastr.success(data.msg);
                                }else{
                                    toastr.error(data.msg);
                                }
                            },'json');
                        }
            });

        });


        });



    </script>

</body>
</html>

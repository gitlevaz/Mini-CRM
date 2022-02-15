@extends('sb-layouts.app')

@section('content')
    <style>
        *,
        ::after,
        ::before {
            box-sizing: border-box !important;
        }

    </style>
    <section class="content">
        <div class="container">

            <div class="row box box-primary">
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="">
                        <div class="box-header with-border"><br>
                            <h5 class="box-title"> Company</h5>
                        </div><br>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <form class="form-horizontal" id="item_form" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" class="form-control" id="id" name="id">



                            <div class="box-body">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Name<label style="color:red">*</label></label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" required id="name" required name="name" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-8">
                                        <input type="email"  pattern="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" required  class="form-control" id="email" required name="email" value="">
                                    </div>
                                </div>

                                <div class="form-group images">
                                    <label class="col-sm-2 control-label">Logo</label>
                                    <div class="col-sm-8">
                                        <input onchange="previewFile('thumb1', 'img1')" id="img1" type="file" name="image"
                                            class="py-2">
                                    </div><br>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Website</label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="website"  name="website" value="">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Status</label>

                                    <div class="col-sm-8">
                                        <select class="form-control select2" style="width: 100%;" name="status">
                                            <option value="1">
                                                Active
                                            </option>
                                            <option value="0">
                                                Disable
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="error_body col-xs-12" id="summary">
                                    <div class="error_element "></div>
                                    <br>
                                </div>

                            </div>


                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="button" id="btn-submit" class="btn btn-primary">Submit</button>
                                <button type="button" id="btn-update" class="btn btn-primary">Update</button>

                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div><br>
                </div>
            </div>


            <div class="row box box-primary">
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="">
                        <div class="box-header with-border"><br>
                            <h5 class="box-title">Company List</h5>
                        </div><br>
                    </div>

                    <div class="box-body">
                        <table id="customers" class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    {{-- <th class="text-center">Status</th> --}}
                                    <th colspan="2" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="company-tbody">

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>



    </section>


    <script>


        $(document).ready(function() {
            $('#btn-update').hide();
            getAll();
        });

        $(document).ready(function() {
            $('#example').DataTable({
                "pagingType": "full_numbers"
            });
        });




        $('#btn-submit').on('click', function() {
            let myForm = document.getElementById('item_form');
            let formData = new FormData(myForm);
            $.ajax({
                type: "POST",
                url: "{{ route('add_company') }}",
                data: formData,
                dataType: "JSON",
                async: false,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    mzg(response);
                    location.reload();
                },
                error: function(err) {
                    mzg(err);
                    location.reload();
                }
            });
        })

        function mzg(msg) {
            alert(msg.responseText);
        }



        $('#btn-update').on('click', function() {
            let myForm = document.getElementById('item_form');
            let formData = new FormData(myForm);
            $.ajax({
                type: "POST",
                url: "{{ route('company.update') }}",
                data: formData,
                dataType: "JSON",
                async: false,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    location.reload();
                },
                error: function(err) {
                    location.reload();
                }
            });
        })

        function getAll() {
            $.ajax({
                type: "POST",
                url: "{{ route('company.all') }}",
                headers: {
                    'XSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                dataType: "JSON",
                data: "",
       
                success: function(response) {
                    // console.log(response.data);
                    var tbody = $('#company-tbody').html("");
                    $.each(response.data, function(q, value) {
                        console.log(value.name);
                        var tr = document.createElement('tr');
                        var td1 = document.createElement('td');
                        var td2 = document.createElement('td');
                        var td3 = document.createElement('td');
                        var td4 = document.createElement('td');
                        var td5 = document.createElement('td');
                        var td6 = document.createElement('td');
                        var td7= document.createElement('td');

                        $(td1).html(q+1);
                        $(td2).html(value.name);
                        $(td3).html(value.email);
                        $(td4).html(value.website);
                        $(td1).attr({
                            class: 'text-center'
                        });
                        $(td2).attr({
                            class: 'text-center'
                        });
                        $(td3).attr({
                            class: 'text-center'
                        });
                        $(td4).attr({
                            class: 'text-center'
                        });
                        
                        $(td6).attr({
                            class: 'text-right'
                        });
                        $(td7).attr({
                            class: 'text-left'
                        });

                        // if (value.status == 1) {
                        //     $(td5).html("<span class=\"label label-info\">Active</span>");
                        // } else {
                        //     $(td5).html("<span class=\"label label-danger\">Inactive</span>");
                        // }

                        var btn = document.createElement('button');
                        $(btn).attr({
                            class: 'btn btn-xs btn-info'
                        });
                        $(btn).html('<span class="fa fa-pencil"></span>');
                        $(btn).click(function() {
                            geteachDetails(value.id);
                        });

                        var del = document.createElement('button');
                        $(del).attr({
                            class: 'btn btn-xs btn-danger'
                        });
                        $(del).html('<i class="fas fa-trash-alt"></i>');
                        $(del).click(function() {
                            selectdelete(value.id);
                        });

                        $(td6).append(btn);
                        $(td7).append(del);

                        $(tr).append(td1, td2,  td3, td6, td7);
                        $(tbody).append(tr);
                    });

                },
                error: function(err) {

                }
            });
            // $('#customers').DataTable();
        }

        function geteachDetails(id) {
            $('#btn-submit').hide();
            $('#btn-update').show();
            $.ajax({
                type: "POST",
                url: "{{ route('company.getDetails') }}",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    console.log(response);
                    $('#name').val(response.name);
                    $('#email').val(response.email);
                    $('#website').val(response.website);
                    $('#status').val(response.status).change();
                    $('#id').val(response.id);
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }

        function selectdelete(id) {
            $.ajax({
                type: "POST",
                url: "{{ route('company.delete') }}",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    location.reload();
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
    </script>


@endsection

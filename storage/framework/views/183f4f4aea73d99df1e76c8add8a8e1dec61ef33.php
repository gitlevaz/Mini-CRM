<?php $__env->startSection('content'); ?>
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
                            <h5 class="box-title"> Employees</h5>
                        </div><br>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <form class="form-horizontal" id="item_form" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <input type="hidden" class="form-control" id="id" name="id">



                            <div class="box-body">

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">First Name<label style="color:red">*</label></label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="f_name" required name="f_name" value="">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Last Name<label style="color:red">*</label></label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="l_name" required name="l_name" value="">
                                    </div>
                                </div>

                                <div class="form-group images">
                                    <label class="col-sm-2 control-label">Company</label>
                                    <div class="col-sm-8">     
                                        <select  class="form-control" id="company"  required  name="company" >
                                            <option value="">--Select--</option>
                                            <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> {
                                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                               }
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
                                        </select>
                                      </div><br>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email</label>

                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="email"  name="email" value="">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Phone</label>

                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="phone"  name="phone" value="">
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
                            <h5 class="box-title">Employees List</h5>
                        </div><br>
                    </div>

                    <div class="box-body">
                        <table id="customers" class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th  class="text-center">#</th>
                                    <th  class="text-center">Name</th>
                                    <th  class="text-center">company</th>
                                    
                                    <th colspan="2" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="emp-tbody">

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
                url: "<?php echo e(route('add_emp')); ?>",
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
                url: "<?php echo e(route('emp.update')); ?>",
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
                url: "<?php echo e(route('emp.all')); ?>",
                headers: {
                    'XSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                dataType: "JSON",
                data: "",
                success: function(response) {
                    console.log('sssssssssssssssssssssssss');
                    var tbody = $('#emp-tbody').html("");
                    $.each(response.data, function(q, value) {
                        console.log(response);
                        var tr = document.createElement('tr');
                        var td1 = document.createElement('td');
                        var td2 = document.createElement('td');
                        var td3 = document.createElement('td');
                        var td4 = document.createElement('td');
                        var td5 = document.createElement('td');
                        var td6 = document.createElement('td');
                        var td7 = document.createElement('td');

                        $(td1).html(q+1);
                        $(td2).html(value.f_name);
                        $(td3).html(value.l_name);
                        $(td4).html(value.company);

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

                        // if (response[q].status == 1) {
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

                        $(tr).append(td1, td2,  td4, td6, td7);
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
                url: "<?php echo e(route('emp.getDetails')); ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    console.log(response);
                    $('#f_name').val(response.f_name);
                    $('#l_name').val(response.l_name);
                    $('#email').val(response.email);
                    $('#phone').val(response.phone);
                    $('#company').val(response.company).change();
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
                url: "<?php echo e(route('emp.delete')); ?>",
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('sb-layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\blog_project\resources\views/employee/index.blade.php ENDPATH**/ ?>
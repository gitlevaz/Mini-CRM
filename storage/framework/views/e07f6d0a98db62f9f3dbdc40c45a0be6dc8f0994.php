<?php $__env->startSection('content'); ?>

<style>
    *, ::after, ::before {
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
                            <h5 class="box-title">Company  Form</h5>
                        </div><br>
                        <!-- /.box-header -->
                        <!-- form start -->
                        
                            <form class="form-horizontal" id="item_form"    enctype="multipart/form-data" > 
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <input type="hidden" class="form-control" id="id"  name="id"  >

                                        

                                        <div class="box-body">

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Number<label style="color:red">*</label></label>

                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id="number"  required  name="number" value="">
                                                </div>
                                            </div>

                                            <div class="form-group images">
                                                <label class="col-sm-2 control-label">Category</label>
                                                <div class="col-sm-8">     
                                                    <select  class="form-control" id="category"  required  name="category" >
                                                        <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> {
                                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                           }
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
                                                    </select>
                                                  </div><br>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Heading<label style="color:red">*</label></label>

                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="heading"  required  name="heading" value="">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Content<label style="color:red">*</label></label>

                                                <div class="col-sm-8">
                                                           <textarea class="form-control summernote" id="description"
                                                           name="content"></textarea>
                                                </div>
                                            </div>
                                                                                    

                                            <div class="form-group images">
                                                <label class="col-sm-2 control-label">Video URL</label>
                                                <div class="col-sm-8">     
                                                    <input type="text" class="form-control" id="video"  required  name="video" value="">
                                                  </div><br>
                                            </div>

                                            
                                            <div class="form-group images">
                                                <label class="col-sm-2 control-label">Image</label>
                                                <div class="col-sm-8">     
                                                      <input onchange="previewFile('thumb1', 'img1')"  id="img1" type="file"  name="image" class="py-2">    
                                                  </div><br>
                                            </div>




                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Status</label>

                                                <div class="col-sm-8">
                                                    <select class="form-control select2" style="width: 100%;"
                                                            name="status">
                                                        <option value="1" >
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
                                            <button type="button" id="btn-update"  class="btn btn-primary">Update</button>

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
                        <h5 class="box-title"> List</h5>
                    </div><br>
                </div>

                <div class="box-body">
                    <table id="customers"  class="table table-bordered ">
                        <thead>
                        <tr>
                            <th>#</th>
                            
                            <th>Content</th>
                            
                            <th class="text-center">Status</th>
                            <th colspan="2" class="text-cantar">Action</th>
                        </tr>
                        </thead>
                        <tbody id="news-tbody">

                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>

        </div>



</section>


<script>

    CKEDITOR.replace( 'description' );

    $(document).ready(function () {
        $('#btn-update').hide();
        getAll();
    });

    $(document).ready(function() {
        $('#example').DataTable( {
            "pagingType": "full_numbers"
        } );
    } );




    $('#btn-submit').on('click', function(){
        let myForm = document.getElementById('item_form');
        let formData = new FormData(myForm);
        var editorData = CKEDITOR.instances['description'].getData();
        formData.append("content",editorData);
                $.ajax({
                    type: "POST",
                    url: "<?php echo e(route('add_research')); ?>",
                    data: formData,
                    dataType: "JSON",
                    async:false,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response){
                        mzg(response);
                        location.reload();
                    },
                    error: function (err) {
                        mzg(err);
                        location.reload();
                    }
                });
    })
    function mzg(msg) {
       alert(msg.responseText);
    }


    
    $('#btn-update').on('click', function(){
        let myForm = document.getElementById('item_form');
        let formData = new FormData(myForm);
        var editorData = CKEDITOR.instances['description'].getData();
        formData.append("content",editorData);
                $.ajax({
                    type: "POST",
                    url: "<?php echo e(route('research.update')); ?>",
                    data: formData,
                    dataType: "JSON",
                    async:false,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response){
                        location.reload();
                    },
                    error: function (err) {
                        location.reload();
                    }
                });
    })

 function getAll() {
            $.ajax({
               type: "POST",
               url: "<?php echo e(route('research.all')); ?>",
               headers: {'XSRF-TOKEN': $('meta[name="_token"]').attr('content')},
               dataType: "JSON",
               data: "",
               success: function (response) {
                   console.log(response);
                    var tbody = $('#news-tbody').html("");
                    $.each(response , function (q) { 
                        var tr = document.createElement('tr');
                       var td1 = document.createElement('td');
                       var td2 = document.createElement('td');
                       var td3 = document.createElement('td');
                       var td4 = document.createElement('td');
                       var td5 = document.createElement('td');
                       var td6 = document.createElement('td');
                       var td7 = document.createElement('td');

                        $(td1).html(q);
                        $(td2).html(response[q].heading);
                        $(td3).html(response[q].content);
                        $(td4).html(response[q].video);
                        
                        $(td5).attr({class: 'text-center'});
                        $(td6).attr({class: 'text-right'});
                        $(td7).attr({class: 'text-left'});

                        if (response[q].status == 1) {
                            $(td5).html("<span class=\"label label-info\">Active</span>");
                        } else {
                            $(td5).html("<span class=\"label label-danger\">Inactive</span>");
                        }

                        var btn = document.createElement('button');
                        $(btn).attr({class:'btn btn-xs btn-info'});
                        $(btn).html('<span class="fa fa-pencil"></span>');
                        $(btn).click(function () {
                            geteachDetails(response[q].id);
                        });

                        var del = document.createElement('button');
                        $(del).attr({class:'btn btn-xs btn-danger'});
                        $(del).html('<i class="fas fa-trash-alt"></i>');
                        $(del).click(function () {
                            selectdelete(response[q].id);
                        });

                        $(td6).append(btn);
                        $(td7).append(del);
                        
                        $(tr).append(td1,td3,td5,td6,td7);
                        $(tbody).append(tr);
                    });

               },
               error: function (err) {

               }
            });
            // $('#customers').DataTable();
        }

        function geteachDetails(id) {
            $('#btn-submit').hide();
             $('#btn-update').show();
            $.ajax({
                type: "POST",
                url: "<?php echo e(route('research.getDetails')); ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response){
                    console.log(response);
                    $('#heading').val(response.heading);
                    $('#video').val(response.video);
                    CKEDITOR.instances['description'].setData(response.content);
                    $('#status').val(response.status).change();
                    $('#id').val(response.id);
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }

        function selectdelete(id){
            $.ajax({
                type: "POST",
                url: "<?php echo e(route('research.delete')); ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response){
                    location.reload();
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }

 </script>

<script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('sb-layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\blog_project\resources\views/research/index.blade.php ENDPATH**/ ?>
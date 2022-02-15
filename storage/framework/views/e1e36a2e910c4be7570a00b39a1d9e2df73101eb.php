<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

<div class="container">
  <br>
  <h2>Add Accura Member</h2><br><br>
  
<form action="add_available" method="POST" id="myForm">
  

  <div class="col-md-12">
    <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="last_name">First name</label>
        <input id="fname" class="form-control input-cl" required type="text" name="fname" value="">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="from">D S Divition</label>
        <select class="form-control input-cl" required  id="divition" name="divition">
          <option value="" selected>select..</option>
          <option value="Colombo1">Colombo 1</option>
          <option value="Colombo2">Colombo 2</option>
          <option value="Colombo3">Colombo 3</option>
          <option value="Colombo4">Colombo 4</option>
          <option value="Colombo5">Colombo 5</option>
          <option value="Colombo6">Colombo 6</option>
          <option value="Colombo7">Colombo 7</option>
          <option value="Colombo8">Colombo 8</option>
          <option value="Colombo9">Colombo 9</option>
          <option value="Colombo10">Colombo 10</option>
          </select>
     
      </div>
    </div>
  </div>
  </div>


  <div class="col-md-12">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="from">last name</label>
          <input id="lname" class="form-control input-cl" required type="text" name="lname" value="">
        </div>
      </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="from">Date of Birth</label>
        <input id="dob" class="form-control input-cl"  required type="date" name="dob" value="">
      </div>
    </div>
  </div>
  </div>



  <div class="col-md-12">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="from">Summery</label><br>
          <textarea id="summery" name="summery" rows="4" required cols="50"></textarea>
          
        </div>
      </div>
    <div class="col-md-6">

    </div>
  </div>
  </div>

           <a href="<?php echo e(url('table')); ?>" style="color: darkblue"><-Back</a>	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	

            <button class="btn btn-primary main-class"  type="submit" >
              <img width="50" height="50" id="loading" src="<?php echo e(asset('images/spinner.gif')); ?>" alt="" style="display:none;">
              save</button>
              <img width="50" height="50" id="ok" src="<?php echo e(asset('images/Capture.PNG')); ?>" alt="" style="display:none;">
              &nbsp;	&nbsp;	&nbsp;	
              <input type="button" class="btn btn-warning main-class" value="Reset" onclick="myFunction()"  type="">
                
        
   </form><br>
    </div>

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
<script type="text/javascript">

function myFunction() {
  document.getElementById("myForm").reset();
}

    var msg = '<?php echo e(Session::get('alert')); ?>';
    var exist = '<?php echo e(Session::has('alert')); ?>';
    if(exist){
      alert(msg);
    }


</script>
<style>
  .container {
  background-color: #a9a7b9  !important;
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7.4\htdocs\blog_project\resources\views/crud/home.blade.php ENDPATH**/ ?>
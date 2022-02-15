@extends('sb-layouts.app')

        @section('content')
<style>
     .info-box .info-box-icon {
    border-radius: .25rem;
    -ms-flex-align: center;
    align-items: center;
    display: -ms-flexbox;
    display: flex;
    font-size: 1.875rem;
    -ms-flex-pack: center;
    justify-content: center;
    text-align: center;
    width: 70px;
}
  .info-box {
    box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
    border-radius: .25rem;
    background: #fff;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 1rem;
    min-height: 80px;
    padding: .5rem;
    position: relative;
    width: 100%;
}
.fa, .fas {
    font-weight: 900;
}
.fa, .far, .fas {
    font-family: "Font Awesome 5 Free";
}
.fa, .fab, .fad, .fal, .far, .fas {
    -moz-osx-font-smoothing: grayscale;
    -webkit-font-smoothing: antialiased;
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    line-height: 1;
}
::after, ::before {
    box-sizing: border-box;
}

 </style>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div  style="background-color: cornsilk;" class="card-header">Dashboard</div>
  
                    </div>
                </div>
            </div>
        </div><br><br>



        <div class="col-lg-12 mb-4">

            <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">WEb site Updates</h6>
                    </div>
                    <div class="card-body">
                        <div class="card-body">

                            <div class="row">
                                <div class="info-box mb-3 col-md-3">
                                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                    
                                  <div class="info-box-content">
                                    <span class="info-box-text"> &nbsp; Admins</span><br>
                              
                                  </div>
                                  <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                                <div class="info-box mb-3 col-md-3">
                                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                      
                                    <div class="info-box-content">
                                      <span class="info-box-text"> &nbsp; Page Views</span><br>
                                     
                                    </div>
                                    <!-- /.info-box-content -->
                                  </div>

                              </div>

                            <canvas id="pieChart" style="min-height: 250px; max-height:300px; max-width: 70%;  height: 350px;  width: 700px;"></canvas>
                            </div>
                    </div>
                </div>
    
            </div>

        <script src="vendor/chart.js/Chart.min.js"></script>
        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>
        <script>
     
        </script>



@endsection

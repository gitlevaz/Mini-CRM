<!DOCTYPE html>
<html lang="en">

@include('sb-layouts.head')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('sb-layouts.slider')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('sb-layouts.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                <!-- /.container-fluid -->
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('sb-layouts.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    @include('sb-layouts.top-Button')

    <!-- Logout Modal-->
    @include('sb-layouts.logout')

    @include('sb-layouts.js')

</body>

</html>
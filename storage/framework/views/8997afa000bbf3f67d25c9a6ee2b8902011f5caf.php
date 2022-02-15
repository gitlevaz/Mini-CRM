<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"  href="<?php echo e(route('dashboard')); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            
        </div>
        <div class="sidebar-brand-text mx-3"> Mini-CRM</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>



    <li class="nav-item ">
        <a class="nav-link collapsed" href="<?php echo e(route('admin.company')); ?>" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>company</span>
        </a>
    </li>

    <li class="nav-item ">
        <a class="nav-link collapsed" href="<?php echo e(route('admin.emp')); ?>" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Employee</span>
        </a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">


    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul><?php /**PATH C:\xampp7.4\htdocs\Mini-CRM\resources\views/sb-layouts/slider.blade.php ENDPATH**/ ?>
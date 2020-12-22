<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <!---->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    

    <!--Styles-->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet" type="text/css">
    <!--adminlte-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css" rel="stylesheet" type="text/css">
    <!--dataTables-->
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <!--simplemde-->
    <link href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css" rel="stylesheet" type="text/css">
    <!--select2-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/codemirror.min.css" rel="stylesheet"/>
    <!-- Editor's Style -->
    <link href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" rel="stylesheet"/>
     

</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php echo $__env->make('shared.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Main Sidebar Container nav-compact-->
        <aside class=" main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
            <?php echo $__env->make('shared.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </aside>
        

        <!-- Content Wrapper. Contains page content -->
        <main class="content-wrapper">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
        <!-- Content Header (Page header) -->



        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
            Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>


    </div>
    
    <?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- REQUIRED SCRIPTS -->

    <!--scripts-->
    <script src="<?php echo e(asset('js/app.js')); ?>" ></script>

    <!--adminlte
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/js/adminlte.min.js" crossorigin="anonymous"></script>
    -->

    <!--dataTables-->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    

    <!--simplemde-->
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    
    <!--toastui-jquery-editor-->
    <script src="https://uicdn.toast.com/editor/latest/toastui-jquery-editor.min.js"></script>

    <!--select2-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <!--sweetalert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
    <!--fontawesome -->
    <script src="https://kit.fontawesome.com/ef9b68e1f3.js"></script>

    <!--page-->
    <script src="https://unpkg.com/page/page.js"></script>

    <!--hogan-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/hogan.js/2.0.0/hogan.js" type="text/javascript" charset="utf-8"></script>
    
    
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH /home/vagrant/code/ourbox/resources/views/layouts/app.blade.php ENDPATH**/ ?>
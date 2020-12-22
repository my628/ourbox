<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-4">
            <!---->
            <div class="card">
                <div class="card-header">
                create
                </div>
                <div class="card-body">
                <form method="POST" action="/home/category">
                <?php echo csrf_field(); ?>
                    <?php echo $__env->make('home.category.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <button type="submit" class="btn btn-primary mb-2">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add new category
                    </button>
                </form>
                </div>
            </div>
            <!---->
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<!-- -->
<?php $__env->startSection('scripts'); ?>
<script>
$('#category-table').DataTable({
    "info":     false,
    "columnDefs": [ 
            {
                "targets": [ 2 ],
                "ordering": false,
                "searchable": false
            }
        ]
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/ourbox/resources/views/home/category/create.blade.php ENDPATH**/ ?>
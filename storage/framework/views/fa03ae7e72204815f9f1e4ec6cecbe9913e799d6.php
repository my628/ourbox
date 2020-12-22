<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Tags
                </div>
                <div class="card-body">
                    <table id="tag-table" class="table table-sm table-hover display">
                        <thead class="thead-light">
                            <tr>
                                <th>标题</th>
                                <th>发布状态</th>
                                <th>评论数</th>
                                <th>阅读数</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Add new tag 
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <?php echo $__env->make('home.tag.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <button type="submit", class="btn btn-md btn-Primary">
                            <i class="fas fa-trash-alt"></i> 删除
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<!-- -->
<?php $__env->startSection('scripts'); ?>
<script>
$('#tag-table').DataTable({});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/ourbox/resources/views/home/tag/index.blade.php ENDPATH**/ ?>
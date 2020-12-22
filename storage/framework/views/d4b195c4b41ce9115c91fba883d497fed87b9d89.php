<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Posts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Posts</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content  d-inline-flex justify-content-between-->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <a href="#" class="btn btn-md btn-link" disabled>
                                首页 <i class="fas fa-angle-double-right"></i>
                                <span>
                                    文章
                                </span>
                            </a>

                            <div class="card-tools">
                                <!-- Buttons, labels, and many other things can be placed here! -->
                                <!-- Here is a label for example -->
                                <a href=" <?php echo e(route('post.create')); ?> " class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus"></i> 创建新文章
                                </a>
                            </div>
                        </div>
                        <!-- table-striped table-bordered-->
                        <div class="card-body">
                            <table id="post-table" class="table table-sm table-hover display order-column">
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
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td> 
                                            <a href="<?php echo e(route('blog.showPost', $post->id)); ?>"> 
                                                <?php echo e($post->title); ?> (<?php echo e($post->published_at); ?>) 
                                            </a>
                                        </td>
                                        <td><?php echo e($post->is_draft ? '未发布' : '已发布'); ?> </td>
                                        <td><?php echo e($post->comment_count); ?></td>
                                        <td><?php echo e($post->view_count); ?></td>                                
                                        <td>
                                            <form action="<?php echo e(route('post.destroy', $post->id)); ?>" method="POST">   
                                                <a href="/post/<?php echo e($post->id); ?>/edit" class="btn btn-sm btn-info">
                                                    <i class="far fa-edit"></i> 
                                                </a>
                                                
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit", class="btn btn-sm btn-warning">
                                                    <i class="fas fa-trash-alt"></i> 
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<!-- -->
<?php $__env->startSection('scripts'); ?>
<script>
$('#post-table').DataTable({
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/ourbox/resources/views/home/post/index.blade.php ENDPATH**/ ?>
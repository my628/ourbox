<div class="row justify-content-center">
    <div class="col-md-8">  
        <div class="card">
            <div class="card-header">
                Create post
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Example input">
                </div>
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="form-control" aria-label="With textarea" name="content" id="smde"></textarea>
                </div>
            </div><!--body-->
        </div><!--card-->
    </div><!--col-->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                Publish
            </div>
            <div class="card-body">
                <button class="btn btn-primary" type="submit">
                    Submit form
                </button>
            </div>
        </div><!--card-->
        <div class="card mt-3">
            <div class="card-header">
                Category
            </div>
            <div class="card-body">
                <div class="form-group">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?php echo e($category->id); ?>" id="category" name="category_id[]">
                        <label class="form-check-label" for="category"> <?php echo e($category->name); ?>? </label>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="form-group">
                    <a href="/home/category">
                        <i class="fa fa-hand-o-right" aria-hidden="true"></i> Add new category
                    </a>
                </div>
            </div><!--card-body-->
        </div><!--card-->
        <div class="card mt-3">
            <div class="card-header">
                Tags
            </div>
            <div class="card-body">
                <div class="form-group">
                    <select class="form-control" multiple="multiple" id="tags" name="tag_title[]">
                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option><?php echo e($tag->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <a href="#">

                    </a>
                </div>
            </div>
        </div><!--tag card-->
        <div class="card mt-3">
            <div class="card-header">
                Description
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="form-group">
                        <textarea class="form-control" aria-label="With textarea" name="description"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <a href="#">
                        insert description image
                    </a>
                </div>
            </div>
        </div>
    </div><!--col-->
</div><!--row--><?php /**PATH /home/vagrant/code/ourbox/resources/views/home/post/form.blade.php ENDPATH**/ ?>
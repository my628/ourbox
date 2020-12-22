<?php $__env->startSection('header'); ?>
    ##parent-placeholder-594fd1615a341c77829e83ed988f137e1ba96231##
    <section>

  <div class="bg-cover pd-header post-cover" style="background-image: url('https://mdbootstrap.com/img/Photos/Slides/img%20(70).jpg')">
    <div class="container" style="right: 0px;left: 0px;">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="brand">
                    <h1 class="description center-align post-title"><?php echo e($post->title); ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <!--grid row justify-content-end justify-content-center align-items-center-->
    <div class="row ">
        <!--grid column px-lg-5 -->
        <div class="col-sm" style="margin-top: -65px;">
                <!--Card-->

                <div class="card pb-5 mx-md-3">
                    
                <div class="card-header bg-white">
                    
                    <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                        <div class="chip purple-gradient white-text waves-effect mt-2"><?php echo e($tag->title); ?></div>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="pt-4">
                        <i class="far fa-calendar-minus fa-fw"></i> 发布日期 :&nbsp;&nbsp;
                         <?php echo e($post->published_at); ?>


                        <i class="far fa-eye fa-fw"></i> 阅读次数 : &nbsp;&nbsp;
                        <?php echo e($post->comment_count); ?>

                        </div>
                        </div>
                    <div class="card-body">
                        <!--Section heading   <?php echo e($post->title); ?>-->
                        <div id="viewer"><?php echo $post->content; ?></div>
                    </div>
                </div>
            </div>
            <!--

            <div id="toc-aside" class="expanded col l3 hide-on-med-and-down">
        <div class="toc-widget">
            <div class="toc-title"><i class="far fa-list-alt"></i>&nbsp;&nbsp;目录</div>
            <div id="toc-content"></div>
        </div>
-->
    </div>

    </div>
<div>
</div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('comments'); ?>
<div class="container">
<div class="col-sm">
<div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div id="vcomments"></div>
                </div>
            </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<!---->
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
$('#viewer').toastuiEditor({
        viewer: true,
        previewStyle: 'vertical',
        height: '500px',
        
      });

tocbot.init({
  // Where to render the table of contents.
  tocSelector: '#toc-content',
  // Where to grab the headings to build the table of contents.
  contentSelector: '#viewer',
  // Which headings to grab inside of the contentSelector element.
  headingSelector: 'h1, h2, h3',
  // For headings inside relative or absolute positioned containers within content.
  hasInnerContainers: true,
});

new Valine({
            el: '#vcomments',
            appId: 'Your appId',
            appKey: 'Your appKey'
        });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/ourbox/resources/views/blog/detail.blade.php ENDPATH**/ ?>
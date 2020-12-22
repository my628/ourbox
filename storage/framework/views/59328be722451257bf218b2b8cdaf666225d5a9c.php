<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create</h1>
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
	<div class="content">
        <div class="container-fluid">
			<form action="/home/post" method="POST">
				<?php echo csrf_field(); ?>
				<?php echo $__env->make('home.post.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<!---->

<?php $__env->startSection('scripts'); ?>
<script>
//
var simplemde = new SimpleMDE({ 

    autofocus: true,
	autosave: {
		enabled: true,
		uniqueId: "MyUniqueID",
		delay: 1000,
	},
	blockStyles: {
		bold: "__",
		italic: "_"
	},
    element: document.getElementById("smde")[0],
    showIcons: ["code", "table"],

 });


//
$('#tags').select2({
tags: true,
tokenSeparators: [',', ' ']
});
//
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/ourbox/resources/views/home/post/create.blade.php ENDPATH**/ ?>
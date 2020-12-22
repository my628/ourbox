@extends('layouts.app')

@section('content')
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
				@csrf
				@include('home.post.form')
			</form>
		</div>
	</div>
</div>
@endsection
<!---->

@section('scripts')
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
@stop
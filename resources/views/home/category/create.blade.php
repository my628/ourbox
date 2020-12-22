@extends('layouts.app')

@section('content')
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
                @csrf
                    @include('home.category.form')
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
@endsection
<!-- -->
@section('scripts')
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
@stop
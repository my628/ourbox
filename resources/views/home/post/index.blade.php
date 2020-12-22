@extends('layouts.app')

@section('content')
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
                                <a href=" {{ route('post.create') }} " class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus"></i> 创建新文章
                                </a>
                            </div>
                        </div>
                        <!-- table-striped table-bordered table-hover display order-column class="thead-light"-->
                        <div class="card-body">
                            <table id="post-table" class="table table-sm ">
                                <thead >
                                <tr>
                                    <th>标题</th>
                                    <th>发布状态</th>
                                    <th>评论数</th>
                                    <th>阅读数</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td> 
                                            <a href="{{ route('blog.showPost', $post->id) }}"> 
                                                {{ $post->title }} ({{ $post->published_at }}) 
                                            </a>
                                        </td>
                                        <td>{{ $post->is_draft ? '未发布' : '已发布' }} </td>
                                        <td>{{ $post->comment_count }}</td>
                                        <td>{{ $post->view_count }}</td>                                
                                        <td>
                                            <form action="{{ route('post.destroy', $post->id) }}" method="POST">   
                                                <a href="/post/{{ $post->id }}/edit" class="btn btn-sm btn-info">
                                                    <i class="far fa-edit"></i> 
                                                </a>
                                                
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit", class="btn btn-sm btn-warning">
                                                    <i class="fas fa-trash-alt"></i> 
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- -->
@section('scripts')
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
@stop
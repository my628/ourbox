@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-inline-flex justify-content-between">
                    <a href="#" class="btn btn-md btn-link" disabled>
                        分类
                    </a>
                    <a href=" {{ route('category.create') }} " class="btn btn-md btn-primary">
                        <i class="fas fa-plus"></i> 创建新分类
                    </a>
                </div>
                <!---->
                <div class="card-body">
                    <table id="post-table" class="table table-sm table-striped table-bordered table-hover display">
                        <thead>
                            <tr>
                                <th>名称</th>
                                <th>描述</th>
                                <th>发布状态</th>
                                <th>评论数</th>
                                <th>阅读数</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($categorys as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description}} </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">   
                                        <a href="/category/{{ $category->id }}/edit" class="btn btn-sm btn-info">
                                            <i class="far fa-edit"></i> 编辑
                                        </a>
                                        
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit", class="btn btn-sm btn-warning">
                                            <i class="fas fa-trash-alt"></i> 删除
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
@endsection
<!-- -->
@section('scripts')
<script>
$('#category-table').DataTable({});
</script>
@stop
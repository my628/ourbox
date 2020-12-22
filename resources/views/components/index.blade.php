@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 shadow-lg rounded">
        <ul class="list-unstyled">
            @foreach ($posts as $post)
            <li >
                <!---->
                <h3 class="mt-0">
                    <a href="{{ $post->url() }}">
                    {{ $post->title }} 
                    </a>
                </h3>
                <div class="media py-4">
                    <div class="media-body ">
                        <p class="lead">摘要： {{ $post->content }} </p>
                        <a href="">Read More <i class="fas fa-chevron-right"></i></a>
                    </div>
                    <img class="media-object img-thumbnail img-fluid align-self-center ml-4" style="width: 13rem;height: 13rem" src="https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1590441074390&di=252c7fa1aad56f7d12575544ca65909f&imgtype=0&src=http%3A%2F%2Fp5.qhmsg.com%2Fdmsmty%2F708_975_%2Ft01eb6c6906bb4e5ff3.jpg" alt="Generic placeholder image">
                </div>
                <div class="">
                    @foreach ($tags as $tag)
                    @endforeach
                    <a href="#" class="badge badge-pill badge-primary"><i class="fas fa-tag"></i> PHP</a>
                    <a href="#" class="badge badge-pill badge-secondary"><i class="fas fa-tag"></i> Laravel</a>
                    <a href="#" class="badge badge-pill badge-info"><i class="fas fa-tag"></i> Blog</a>
                </di>

                <div class="float-right">
                    <i class="fas fa-user"></i> {{ $post->user->name }}
                    <i class="fas fa-clock"></i> {{ $post->published_at }}
                    <i class="fas fa-eye"></i> {{ $post->view_count }}
                    <i class="fas fa-comments"></i> {{ $post->comment_count }}
                </div>
            </li>
            <hr>
            @endforeach
        </ul>
        @include('components.comment')
        @include('components.pagination')
    </div>
    <div class="col-md-4">

        <div class="card">
            <div class="card-header bg-white">
                分类
            </div>
            <div class="card-body">
                @foreach ($categories as $category)
                    <button type="button" class="btn btn-outline-primary btn-sm">{{ $category->name }}</button>
                @endforeach
            </div>
        </div>

        <div class="card my-4">
            <div class="card-header bg-white">
                标签
            </div>
            <div class="card-body">
                @foreach ($tags as $tag)
                    <button type="button" class="btn btn-outline-primary btn-sm">{{ $tag->title }}</button>
                @endforeach
            </div>
        </div>

        <div class="card my-4">
            <div class="card-header bg-white">
            阅读排行榜
            </div>
            <div class="card-body">
            </div>
        </div>

        <div class="card my-4">
            <div class="card-header bg-white">
            评论排行榜
            </div>
            <div class="card-body">
            </div>
        </div>

    </div>

</div>
@endsection
<!--  -->
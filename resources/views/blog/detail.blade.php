@extends('layouts.blog')

@section('header')
    @parent
    <section>
    <div class="bg-cover view view-cascade overlay">
    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Slides/img%20(70).jpg"
      alt="Card image cap">
    <a href="#!">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>
    </section>
@endsection

@section('content')
<div class="container">
    <!--grid row justify-content-end justify-content-center align-items-center-->
    <div class="row ">
        <!--grid column px-lg-5 -->
        <div class="col-sm" style="margin-top: -65px;">
                <!--Card-->

                <div class="card pb-5 mx-md-3">
                    
                <div class="card-header bg-white">
                    
                    @foreach ($post->tags as $tag)
                    
                        <div class="chip purple-gradient white-text waves-effect mt-2">{{ $tag->title }}</div>
                    
                    @endforeach
                        <div class="pt-4">
                        <i class="far fa-calendar-minus fa-fw"></i> 发布日期 :&nbsp;&nbsp;
                         {{$post->published_at}}

                        <i class="far fa-eye fa-fw"></i> 阅读次数 : &nbsp;&nbsp;
                        {{$post->comment_count}}
                        </div>
                        </div>
                    <div class="card-body">
                        <!--Section heading   {{ $post->title }}-->
                        <div id="viewer">{!! $post->content !!}</div>
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
@endsection

@section('comments')
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
@endsection
<!---->
@section('scripts')
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
@stop
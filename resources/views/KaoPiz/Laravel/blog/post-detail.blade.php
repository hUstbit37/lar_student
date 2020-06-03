@extends ('KaoPiz/layout/master')
@section ('styles')
<!-- <link href="{{ asset('css/list_blog.css') }}" rel="stylesheet"> -->
@endsection

@section ('content')
<div>
    <h2>{{$post_detail->title}}</h2>
    <div id="post-content">
        <p>{{$post_detail->post_content}}</p>
    </div>
    <div id="comment-area">
        @if(count($post_detail->comment)>0)
        @foreach ($post_detail->comment as $key=>$value)
        <p>{{$key+1}}:{{$value->comment_content}}</p>
        @endforeach

        @else
        <p><b>Don't have any comment in this post</b></p>
        @endif
    </div>
</div>
@endsection
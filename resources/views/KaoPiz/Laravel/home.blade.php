@extends ('KaoPiz/layout/master')
@section ('styles')
<link href="{{ asset('css/list_blog.css') }}" rel="stylesheet">
@endsection

@section ('content')

@include('KaoPiz/Laravel/blog/blog-management')
@endsection
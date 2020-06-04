@extends ('KaoPiz/layout/master')
@section ('styles')
<!-- <link href="{{ asset('css/list_blog.css') }}" rel="stylesheet"> -->
@endsection

@section ('content')
<div id='login' class="">
    <h2>Wellcome KaoPiz blog</h2>
    <h3>Login</h3>
    <form action="{{ route('getLogin')}}" method="post">
        @csrf
        <label for="">User name</label><br>
        <input type="text" name='username' placeholder="Username" value="{{ old('username') }}"><br>
        <label for="">Password</label><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <button type=" submit" class="btn btn-primary">Login</button>
    </form>
    <ul>
        @foreach ($errors ->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @if ( Session::has('error') )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <strong>{{ Session::get('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
    </div>
    @endif
</div>
<p>If you do not have an account! </p>
<a href="{{route('register')}}">Sign up</a>

@endsection
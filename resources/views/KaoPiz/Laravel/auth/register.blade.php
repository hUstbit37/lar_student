@extends ('KaoPiz/layout/master')
@section ('styles')
<!-- <link href="{{ asset('css/list_blog.css') }}" rel="stylesheet"> -->
@endsection

@section ('content')
@include('KaoPiz/Laravel/blog/session-message')
<div id='register' class="">
    <h2>Wellcome KaoPiz blog</h2>
    <h3>Sign Up</h3>
    <form action="{{ route('getRegister')}}" method="post">
        @csrf
        <label for="">User name</label><br>
        <input type="text" name='username' placeholder="Username"><br>
        <label for="">Email</label><br>
        <input type="email" name='email' placeholder="Email"><br>
        <label for="">Password</label><br>
        <input type="password" name="password" placeholder="Password"><br>
        <label for="password-confirm">Confirm password</label><br>
        <input id='password-confirm' type="password" name='password_confirm' placeholder='Confirm password'><br>
        <button type="submit" class="btn btn-primary">Sign up</button>
    </form>
    <ul>
        @foreach ($errors ->all() as $error)
        <li style="color:red">{{$error}}</li>
        @endforeach
    </ul>
</div>

@endsection
<h1>Create New Post</h1>
@include('KaoPiz/Laravel/blog/session-message')
<form action="{{ route('store') }}" method="post">
    @csrf
    <label for="">Title</label><br>
    <input type="text" name="title" placeholder="title"><br>
    <label for="">Content</label><br>
    <!-- <input type="text" name="post_content" id="" placeholder="post content"><br> -->
    <textarea name="post_content" id="" cols="30" rows="10" placeholder="post content"></textarea><br>
    <button type='submit' class="btn btn-add-new">Create</button>
</form>
<ul>
    @foreach ($errors ->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
<a href="{{ route('home')}}">Back Home</a>
<div>
    <h2>Update post: {{ $post_update->title}}</h2>
    @include('KaoPiz/Laravel/blog/session-message')
    <form action="{{ route('update',$post_update->id)}}" method="post">
        @csrf

        <label for="">Title</label><br>
        <input type="text" name="title" value="{{ $post_update->title}}"><br>
        <label for="">Content</label><br>
        <textarea name="post_content" cols="30" rows="10">{{ $post_update->post_content}}</textarea><br>
        <button type="submit">Update</button>
    </form>

    <ul>
        @foreach ($errors ->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
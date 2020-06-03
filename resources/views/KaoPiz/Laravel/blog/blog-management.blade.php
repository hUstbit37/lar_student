<h2> Blog management</h2>

@include('KaoPiz/Laravel/blog/session-message')
<table class="table" border='1'>
    <thead class="thead-dark">
        <th>#</th>
        <th>Title</th>
        <th>Content</th>
        <th>Created_at</th>
        <th>Action</th>
    </thead>
    <tbody>
        @if(count($list_blog)>0)
        @foreach($list_blog as $key=>$value)
        <tr>
            <td scope="row">{{$value->id}}</td>
            <td> <a href="post-detail/{{$value->id}}">{{$value->title}}</a></td>
            <td>{{$value->post_content}}</td>
            <td>{{$value->created_at}}</td>
            <td class='text-center'>
                <a href="view-update/{{$value->id}}"><button class='btn btn-success' type='button'>Edit</button></a>
                <a href="delete/{{$value->id}}"><button class='btn btn-danger btn-delete'
                        type='button'>Delete</button></a>
                <!-- <button class="btn btn-danger btn-delete" idproduct="{{$value->id}}" type="button">Delete</button> -->
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td class="text-center" colspan="8">Không có dữ liệu phù hợp với kết quả search</td>
        </tr>
        @endif

    </tbody>
</table>
{{$list_blog->links()}}
<a href="create" class="btn btn-primary btn-sm">Create new blog</a>
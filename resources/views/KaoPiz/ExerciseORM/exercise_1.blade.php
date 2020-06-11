<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 1 ORM</title>
</head>

<body>
    <form action="view_search1" method="post">
        @csrf
        <label for="">ID</label><br>
        <input type="number" name="id"><br>
        <label for="">Name</label><br>
        <input type="text" name="name"><br>
        <label for="">Email</label><br>
        <input type="text" name="email"><br>
        <input type="submit" value="Search">
    </form>
    <hr>
    @if(isset($result) && count($result)>0)
    @foreach($result as $value)

    <p>{{$value->id}}, {{$value->name}}, {{$value->email}}</p>
    @endforeach
    @else
    <p>Khong co ket qua phu hop</p>
    @endif
</body>

</html>
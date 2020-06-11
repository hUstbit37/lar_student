<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 2 ORM</title>
</head>

<body>
    <form action="view_search2" method="post">
        @csrf
        <label for="">User id</label><br>
        <input type="text" name="user_id"><br>
        <label for="">Phone</label><br>
        <input type="text" name="phone"><br>
        <label for="">Role name</label><br>
        <input type="text" name="role_name"><br>
        <input type="submit" value="Search">
    </form>
</body>

</html>
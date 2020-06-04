<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="login1" method="post">
        @csrf
        <label for="">User name</label><br>
        <input type="text" name='username' placeholder="Username"><br>
        <label for="">Password</label><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</body>

</html>
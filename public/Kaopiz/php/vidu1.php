<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- <form action="test.php" method="post">
        <label for="">Nhap gia dien</label><br>
        <input type="text" name="tienDien" id="">
        <input type="submit" value="Nhap">
    </form> -->
    <p>Login</p>
    <form name='myForm' action="login.php" method="post" onsubmit="return validateForm();">

        <label for="">Username</label><br>
        <input type="text" name="username" id="user"><br>

        <label for="">Password</label><br>
        <input type="password" name="password" id="pass"><br>
        <button type="submit" name="login_submit">Login</button>
    </form><br>
</body>
<script type="text/javascript">
function validateForm() {
    var username = document.getElementById('user').value;
    // var test = document.myForm.username.value;
    // alert(test);
    var pass = document.getElementById('pass').value;
    if (username == '' || pass == '') {

        alert("k de trong");
        return false;
    }
}
</script>

</html>
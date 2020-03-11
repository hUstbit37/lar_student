<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
    <title>Page Register</title>
</head>
<body>
    <div class='container'>
        <h2>Page Register</h2>
        <form action="{{ route('getRegisterQb')}}" method ='post'>
            @csrf
            <label for="user">Username</label>
            <input id='user' type="text" name='username' class='form-control' placeholder='Enter username'><br>
            <label for="email">Email</label>
            <input id='email' type="email" name='email' class='form-control' placeholder='Enter email'><br>
            <label for="pass">Password</label>
            <input id='pass' type="password" name='password' class='form-control' placeholder='Enter password'><br>
            <label for="password-confirm">Confirm Password</label>
            <input id='password-confirm' type="password" name='password_confirm' class='form-control' placeholder='Confirm password'><br>
            <!-- <input type="submit" value='Submit' class='btn-black btn-danger text-uppercase font-weight-bold'> -->
            <button type="submit" class="btn btn-primary">Submit</button>
            <ul>
                @foreach ($errors ->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </form>
    </div>
</body>
</html>
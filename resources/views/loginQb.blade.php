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
    <title>Page Login</title>
    <style>
        h2 {
            text-align: center;
            color: red;
            font-weight: bold;
        }
        .form-control{
            width: 400px;
            
        }
        .container {
            background-color: #A9F5F2;
            width: 600px;
            padding: 15px;
        }
        .center {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
            
    </style>
</head>
<body>
    <div class='container'>
        <h2>LOGIN</h2>
        <div class='center'>
        <form action="{{ route('getLoginQb')}}" method ='post' >
            @csrf
            <label for="user">Username</label>
            <input id='user' type="text" name='username' class='form-control' placeholder='Nhập username'><br>
            <!-- <label for="email">Email</label>
            <input id='email' type="email" name='email' class='form-control' placeholder='Nhập email'><br> -->
            <label for="pass">Password</label>
            <input id='pass' type="password" name='password' class='form-control' placeholder='Nhập password'><br>
            <!-- <input type="submit" value='Submit' class='btn-black btn-danger text-uppercase font-weight-bold'> -->
            <input type="checkbox" value='remember'> Remember me <br><br>
            <button type="submit" class="btn btn-primary">Login</button><br>
            @if ($errors->any())
                <div class='alert alert-danger'>
                    <ul>
                        @foreach ($errors ->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ( Session::has('error') )
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <strong>{{ Session::get('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            @endif
        </form>
        </div>
        
    </div>
</body>
</html>
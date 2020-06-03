<?php
session_start();
if(isset($_SESSION['username'])){
    header('location: vidu1.php');
}
if(isset($_POST['login_submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    if($username=='duc' && $password=='1234'){
        setcookie('username', $username, time()+100);
        $_SESSION['username']=$username;
        // return view('home');
        echo 'Dang nhap thanh cong';
    }
} 
?>
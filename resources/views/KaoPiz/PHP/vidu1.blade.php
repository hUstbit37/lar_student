<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    // echo "Hello";
    // echo "<br>";
    // define('NAME', 'Duc');
    // echo NAME;
    // $name1="Toan";
    // echo "<br>";
    // echo 'Wellcome '.$name1;
    // echo'<br>';
    // $age=20;
    // $age=$age +10;
    // echo 'Age: '.$age;
    // $arr=[1,2,3,4];
    // echo'<br>';
    // $arr2=["Toan"=>'20', "Toan2"=>'21', "Toan3"=>'22'];
    // foreach($arr2 as $key=>$value){
    //     echo "Key= ".$key. ", Value= ". $value;
    //     echo"<br>";
    // }
    // echo "<br>";
    // $arr3=array(
    //     array('Duc', '22'),
    //     array('Toan', '23')
    // );
    // for($row=0; $row<2; $row++){
    //     echo "Row number: ".$row;
    //     for($col=0; $col<2; $col++){
    //         echo $arr3[$row][$col];
    //     }
    // }
    // echo "<br>";
    // $arr4=[1,2,4,6,3];
    // sort($arr4);
    // print_r($arr4);
    // //If
    // $t=date('H');
    // echo "<br>";
    // if($t<'10'){
    //     echo "Good morning";
    // }elseif($t<'20'){
    //     echo 'Good afternoon';
    // } else{
    //     echo "Good night";
    // }
    // //switch
    // echo"<br>";
    // $color="red";
    // switch ($color) {
    //     case 'red':
    //         echo "Color: Red";
    //         // break;
    //     case 'blue':
    //         echo "Color: Blue";
    //         // break;
    //     case 'green':
    //         echo "Color: Green";
    //         break;
    //     default:
    //        echo "Color: Red or Blue or Green";
    //         break;
    // }
    // //While
    // echo " While: <br>";
    // $x=1;
    // while ($x <= 5) {
    //     echo "x= $x <br>";
    //     $x++;
    // }
    
    // echo"Do While: <br>";
    // $y=2;
    // do {
    //     echo "y= $y <br>";
    //     $y++;
    // } while($y<=5);
    // //for
    // echo "For: <br>";
    // for($i=0; $i<5; $i++){
    //     echo "i= $i <br>";
    // }
    // echo "Foreach: <br>";
    // $arr5=array("Toan", "DUc", "Dat");
    // foreach($arr5 as $key=> $value){
    //     echo $key. $value;
    // }
    // //Ex
    // echo "<br>";
    // $a=10;
    // if($a%2==0){
    //     echo "a la chan";
    // }else {
    //     echo "a la le";
    // }
    // echo "<br>";
    // $b=2; $c=7;
    // $max=$a;
    // if($b>$max){
    //     $max=$b;
    // }
    // if($c>$max){
    //     $max=$c;
    // }
    // echo $max;
    // echo "<br>";
    // $arr6=[1,2,4,6,3];
    // sort($arr6);
    // echo "<hr>";
    echo"Cookie and Session <br>";
//Cookie
//setcookie(name, value, time-expire, path, domain, secure, httponly)
    echo"- Cookie: <br>";
    setcookie("user", "hung", time()+3600);
//Show cookie
    echo $_COOKIE['user'];
//Delete cookie
// setcookie('user', time()- 3600);
    echo "<br>";
//Session
    session_start();
    echo"- Session: <br>";
    $_SESSION['name']='Duc';
    $_SESSION['name1']='Toan';
    echo $_SESSION['name'];
    echo "<br>";
//Delete Session
    //a session
    unset($_SESSION['name']);
    echo var_dump($_SESSION);
    //all session
    // session_unset();
    session_destroy();
    echo "<br>";

    // if(isset($_SESSION['username'])){
    //     return view('home');
    // }
    // if(isset($_POST['submit'])){
    //     $username=$_POST['username'];
    //     $password=$_POST['password'];
    //     if($username=='duc' && $password=='1234'){
    //         setcookie('username', $username, time()+100);
    //         $_SESSION['username']=$username;
    //         // return view('home');
    //         echo 'done';
    //     }
    // }
    

    ?><br>
    <form action="login" method="post" onsubmit='return validateForm();'>
        @csrf
        <label for="">Username</label><br>
        <input type="text" name="username" id=""><br>
        <label for="">Password</label><br>
        <input type="password" name="password" id=""><br>
        <button type="submit">Login</button>
    </form><br>
    <form action="switch" method="post">
        @csrf
        <label for="">Nhap gia dien</label><br>
        <input type="text" name="tienDien" id="">
        <input type="submit" value="Nhap">
    </form>
</body>
<script>

</script>

</html>
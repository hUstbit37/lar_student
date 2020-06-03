<?php
$servername='localhost';
$username='root';
$password='1234';
$dbname="myDBPDO";

try {
    $conn= new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stml=$conn->prepare('INSERT INTO MyGuests (firstname, lastname, email) VALUES (?,?,?)');
    
    $stml=bindParam(1, $firstname);
    $stml=bindParam(2, $lastvalue);
    $stml=bindParam(3, $email);

    //insert 1 row
    $firstname= 'Duong';
    $lastname='Duc';
    $email='duc@1';
    $stml->execute();
    echo "done";
} catch(PDOException $e)
{
    echo $e->getMessage();
}
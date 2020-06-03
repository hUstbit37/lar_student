<?php
// echo 1;
$servername='localhost';
$username='root';
$password='1234';

try {
    $conn= new PDO("mysql:host=$servername", $username, $password);

    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql= "CREATE DATABASE myDBPDO";
    $conn -> exec($sql);
    echo "Database created successfully <br>";
} catch (PDOException $e) {
    echo $e->getMessage();
}
$conn = null;
?>
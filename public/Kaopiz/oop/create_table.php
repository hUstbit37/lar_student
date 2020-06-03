<?php
$servername='localhost';
$username='root';
$password='1234';
$dbname="myDBPDO";

try {
    $conn= new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "create table MyGuests (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP
    )";
    $conn->exec($sql);
    echo "table created";
} catch(PDOException $e)
{
    echo $e->getMessage();
}
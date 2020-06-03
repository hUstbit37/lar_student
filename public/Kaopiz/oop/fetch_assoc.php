<?php
$servername='localhost';
$username='root';
$password='1234';
$dbname="myDBPDO";

try {
    $conn= new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $st=$conn->query("SELECT firstname, lastname, email from MyGuests");

    #setting the fetch mode
    $st->setFetchMode(PDO::FETCH_ASSOC);

    while($row = $st->fetch()){
        echo $row['firstname']. '\n';
        echo $row['lastname']. '\n';
        echo $row['email']. '\n';
    }

} catch(PDOException $e)
{
    echo $e->getMessage();
}
<?php
class User {
    public $email;
    public $isAddmin =false;
    function __construct(){
        if($this->email=='duc@1') {
            $this->isAddmin=true;
        }
    }
}
$stmt= $conn->prepare("SELECT email from MyGuests WHERE firstname= :name");
$stmt->setFetchMode(PDO::FETCH_CLASS , 'User');
$stmt->execute(array('name'=>'Duong'));

while($obj = $stmt->fetch()){
    echo $obj->email;
    echo $obj->isAddmin;
}
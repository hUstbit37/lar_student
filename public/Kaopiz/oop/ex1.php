<?php   
class HocSinh{
    var $id;
    var $name;
    var $age;
    var $address;
    function setHs($par1, $par2, $par3, $par4){
        $this->id=$par1;
        $this->name=$par2;
        $this->age=$par3;
        $this->address=$par4;
    }
    function display(){
        echo 'Id: '.$this->id. '<br>';
        echo 'Name: '.$this->name. '<br>';
        echo 'Age: '. $this->age .'<br>';
        echo 'Address: '.$this->address. '<br>';

    }
}
$hs =new HocSinh;
$hs->setHs(1, "Duc", 20, "Nghe An");
$hs->display();
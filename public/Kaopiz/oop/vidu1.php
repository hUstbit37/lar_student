<?php
echo "Vi du 1 <br>";
class Books {
    var $price;
    var $title;
    function __construct($par1, $par2){
        $this->title=$par1;
        $this->price=$par2;
    }

    function setPrice($par){
        $this->price = $par;
    }
    function getPrice(){
        echo $this->price . "<br>";
    }
    function setTitle($par){
        $this->title = $par;
    }
    function getTitle(){
        echo $this->title ."<br>";
    }
}
// $physics = new Books;
// $math = new Books;
// $chemistry = new Books;

// $physics->setTitle("Vat Ly");
// $math->setTitle("Toan");
// $chemistry->setTitle("Hoa hoc");
// $physics->setPrice(10);
// $math->setPrice(15);
// $chemistry->setPrice(12);
// $physics->getTitle();

// test Constructor
$english= new Books ("English is best", 50);
echo $english->getTitle();

class Novel extends Books{
    var $publisher;
    function setPublisher($par){
        $this->publisher=$par;
    }
    function getPublisher(){
        echo $this->publisher. "<br>";
    }
}
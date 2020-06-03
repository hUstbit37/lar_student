<?php
interface Move{
    function run();
}
class Dog implements Move{
    public function run(){
        echo "con cho chay bang 4 chan";
    }
}
class Car implements Move{
    public function run(){
        echo "Xe chay bang 4 banh";
    }
}
function testRun(Move $move){
    $move->run();
}
$car = new Car;
testRun($car);

abstract class Animal{
    protected $name;
    abstract function run();
}
class Cat extends Animal{
    public function run(){
        echo "MEo chay bang 4 chan";
    }
}
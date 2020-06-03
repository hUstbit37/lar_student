<?php
class Calculator{
    var $number1;
    var $number2;
    function add($a, $b){
        return $a+$b;
    }
    function minus($a, $b){
        return $a-$b;
    }
    function devide($a, $b){
        return $a/$b;
    }
    function multiple($a, $b){
        return $a*$b;
    }
}
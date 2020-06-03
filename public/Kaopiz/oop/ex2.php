<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require('calculator.php');
    $test= new Calculator;
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];

    if($_POST['calculator_option']=='add'){
        $result=$test->add($number1,$number2);
    }
    if($_POST['calculator_option']=='minus'){
        $result=$test->minus($number1,$number2);
    }
    if($_POST['calculator_option']=='devide'){
        $result=$test->devide($number1,$number2);
    }
    if($_POST['calculator_option']=='multiple'){
        $result=$test->multiple($number1,$number2);
    }
?>
    <form action="ex2.php" method="post" name="myForm" onsubmit="return validateForm();">
        Number 1: <input type="text" name="number1" id="num1"><br>
        Number 2: <input type="text" name="number2"><br>
        Calculator:
        <select name="calculator_option">
            <option value="add">add</option>
            <option value="minus">minus</option>
            <option value="devide">devide</option>
            <option value="multiple">multiple</option>
        </select><br>
        <input type="submit" value="calculator">
    </form>
    Result:<input type"text" name="result" value="<?php echo (isset($result))?$result:'';?>">
</body>
<script type="text/javascript">
function validateForm() {
    var test = document.getElementById('num1').value;
    alert(test);
    var num1 = document.myForm.number1.value;
    var num2 = document.myForm.number2.value;
    alert(num1);
    if (num1 = "" || num2 = "") {
        alert('K de trong');
        return false;
    }
    if (isNaN(num1) || isNaN(num2)) {
        alert("Nhap so nhe");
        return false;
    }
}
</script>

</html>
<?php
class Calculator
{
  public $suma = 0;
  public $diferenta = 0;
  public $produsul = 0;
  public $catul = 0;
  function processInput($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return  (float)$data;
  }
  function inputControl($type = "", $name = "", $id = "", $value = "")
  {
    echo  "<input type=\"{$type}\" name=\"{$name}\" id=\"{$id}\" value=\"{$value}\">";
  }
  function selectControl($select)
  {
    $operatii = array("Adunare", "Scadere", "Inmultire", "Impartire");
    echo  "<select name=\"{$select}\">";
    foreach ($operatii as $value) {
      echo "<option value=\"{$value}\" >" . $value . "</option>";
    }
    echo "</select>";
  }
  function suma($number1, $number2)
  {
    return (float)$this->suma = $number1 + $number2;
  }
  function diferenta($number1, $number2)
  {
    return (float)$this->diferenta = $number1 - $number2;
  }
  function produsul($number1, $number2)
  {
    return (float)$this->produsul = $number1 * $number2;
  }
  function catul($number1, $number2)
  {
    return (float)$this->catul = $number1 / $number2;
  }
  function createCalculator($method, $action)
  {
    echo <<<MARCAJ
<!DOCTYPE html>
<html>
<head>
<title></title>
<meta charset="UTF-8">
<style>
@font-face {
font-family:Calculator;
src:url(fonts/DS-DIGIT.TTF);

}
div {
margin: 20px auto;
width:500px;
height:500px;
border:1px solid blue;
background-image:url("images/calculator.jpg");
background-size:contain;

}
input[type="text"] {
margin-left:260px;
}
#number1 {
margin-top:160px;
margin-bottom:0px;
}
#number2 {
margin-top:-5px;
}
p {

width:150px;
margin:100px 10px;

}
#number1Message {
color:red;
position:relative;
top:-65px;
left:270px;
font-size:20px;
}

#number2Message {
color:red;
position:relative;
top:-45px;
left:436px;
font-size:20px;

}
h1 {
font-family:Calculator;
color:blue;
}
</style>
</head>
<body>
<h1>Calculator Application</h1>
<div>
<form method="{$method}" action="{$action}">
MARCAJ;
    $this->inputControl("text", "number1", "number1");
    echo <<<MARCAJ
<br><br>
MARCAJ;
    $this->inputControl("text", "number2", "number2");
    $this->selectControl("options");
    $this->inputControl("submit", "submit", "submit", "Calculeaza");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      require("ProcessForm/ProcessForm.php");
    }
    echo <<<MARCAJ
<br>
</form>
</div>
</body>
</html>
MARCAJ;
  }
}

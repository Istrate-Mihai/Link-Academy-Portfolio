<?php
$errors = array();
if (empty($_POST["number1"])) {
  echo $this->errors["number1"] = "<span id=\"number1Message\">*Trebuie sa completati campul!</span><br>";
} else if (is_numeric($_POST["number1"]) == false) {
  echo  $this->errors["number1"] = "<span id=\"number1Message\">*Trebuie sa introduceti un numar!</span><br>";
} else {
  $this->number1 = $this->processInput($_POST["number1"]);
}

if (empty($_POST["number2"])) {
  echo   $this->errors["number2"] = "<span id=\"number2Message\">*Trebuie sa completati campul!</span><br>";
} else if (is_numeric($_POST["number2"]) == false) {
  echo $this->errors["number2"] = "<span id=\"number2Message\">*Trebuie sa introduceti un numar!</span><br>";
} else {
  $this->number2 = $this->processInput($_POST["number2"]);
}

if (empty($this->errors)) {

  switch (true) {
    case  isset($this->number1) && isset($this->number2)  &&   isset($_POST["options"]) && $_POST["options"] == "Adunare":
      echo "<p>Rezultatul operatiei de adunare este :" . $this->suma($this->number1, $this->number2) . "</p>";
      break;

    case  isset($this->number1) && isset($this->number2) && isset($_POST["options"]) && $_POST["options"] == "Scadere":
      echo "<p>Rezultatul operatiei de scadere este :" . $this->diferenta($this->number1, $this->number2) . "</p>";
      break;

    case  isset($this->number1) && isset($this->number2) && isset($_POST["options"]) && $_POST["options"] == "Inmultire":
      echo "<p>Rezultatul operatiei de inmultire este :" . $this->produsul($this->number1, $this->number2) . "</p>";
      break;

    case  isset($this->number1) && isset($this->number2) && isset($_POST["options"]) && $_POST["options"] == "Impartire":
      echo "<p>Rezultatul operatiei de impartire este :" . $this->catul($this->number1, $this->number2) . "</p>";
      break;
  }
}

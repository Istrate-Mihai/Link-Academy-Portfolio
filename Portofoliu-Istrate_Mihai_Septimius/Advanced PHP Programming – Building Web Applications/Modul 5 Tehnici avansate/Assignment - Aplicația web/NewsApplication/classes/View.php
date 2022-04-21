<?php
class View
{
  public  $controller;
  function __construct(Controller $controller = null)
  {
    $this->controller = $controller;
  }
  function Display()
  {
    if (isset($_COOKIE["Language"]) && $_COOKIE["Language"] == "Romana") {
      require("../Languages/Language7.php");
    } else {
      require("../Languages/Language8.php");
    }
    $this->user = $_SESSION['user'];
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      if (isset($_POST['Logout'])) {
        session_destroy();
        header("Location: ../index.php");
        exit();
      }
    }
    //Here is the menu for Administrator
    if ($this->user == "Administrator") {
      echo <<<MARCAJ
<!DOCTYPE html>
<html>
<head>
<title>$this->statement0</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../CSSFiles/styleNewsWorld.css">
MARCAJ;
      $R = 'REQUEST_METHOD';
      if ($_SERVER[$R] == "POST") {
        $S = 'ShowMenu';
        $H = 'HideMenu';
        if ((isset($_POST[$S])) || (isset($_SESSION[$S]) && $_SESSION[$S] == "Show")) {
          echo "<style>";
          echo "#Toggle {";
          echo "display:block;";
          echo "margin:0;";
          echo "}";
          echo "#ShowMenu {";
          echo "display:none;";
          echo "}";
          echo "#HideMenu {";
          echo "display:inline;";
          echo "}";
          echo "</style>";
          $_SESSION[$S] = "Show";
        }
        if ((isset($_POST[$H])) || (isset($_SESSION[$S]) && $_SESSION[$S] == "Hide")) {
          echo "<style>";
          echo "#Toggle {";
          echo "display:none;";
          echo "}";
          echo "#HideMenu { ";
          echo  "display:none;";
          echo "}";
          echo "#ShowMenu {";
          echo "display:inline;";
          echo "}";
          echo "</style>";
          $_SESSION[$S] = "Hide";
        }
      }
      echo <<<MARCAJ
</head>
<body>
<p class="GreetUser" >$this->statement1 $this->user</p>
<form id="Menu" action="NewsWorld.php" enctype="multipart/form-data" method="POST">
<input type="submit" id="ShowMenu" name="ShowMenu" value="$this->statement11">
MARCAJ;
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if ((isset($_POST[$S])) || (isset($_SESSION[$S]) && $_SESSION[$S] == "Show")) {
          echo " <input type=\"submit\" id=\"HideMenu\" name=\"HideMenu\" value=\"$this->statement12\" > ";
        }
      }
      echo <<<MARCAJ
<input type="submit" name="Logout" value="$this->statement2">
<div id="Toggle">
<br>
<select name="NewsSelection">
<option value="Select News Category">$this->statement3</option>
<option value="Politics">$this->statement4</option>
<option value="Sports">$this->statement5</option>
<option value="Science">$this->statement6</option>
<option value="Celebrity">$this->statement7</option>
</select>
<br>
<br>
<input type="submit" name="Browse" value="$this->statement8">
<br>
<br>
<label  for="SpecialComments">$this->statement13</label>
<br>
<br>
<textarea id="SpecialComments" name="AdministratorComment"></textarea>
<br>
<br>
<input type="submit" name="SpecialComments" value="$this->statement14">
<input type="reset" value="$this->statement15">
<br>
<br>
<label >$this->statement16</label>
<br>
<br>
<label>$this->statement17</label>
<br>
<br>
<label for="Title" >$this->statement18</label>
<br>
<br>
<input type="text" id="Title" name="NewsTitle">
<br>
<br>
<label for="Category" >$this->statement19</label><br><br>
<input type="text" id="Category" name="NewsCategory">
<label>$this->statement20</label>
<br><br>
<label for="NewsContent">$this->statement21</label>
<br><br>
<textarea id="NewsContent" name="NewsContent"></textarea>
<br>
<br>
<label >$this->statement22</label>
<br><br>
<label>$this->statement23</label>
<br><br>
<input type="file"  name="imageUpload">
<br><br>
<input type="submit" name="SendNews" value="$this->statement24">
<br>
<br>
<label>$this->statement25</label>
<br>
<br>
<input type="submit" name="BrowseEmail" value="$this->statement26">
<br>
<br>
</div>
</form>
MARCAJ;
    } else {           //Here is the menu for a regular user
      echo <<<MARCAJ
<!DOCTYPE html>
<html>
<head>
<title>$this->statement0</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../CSSFiles/styleNewsWorld.css">
</head>
<body>
<p class="GreetUser" >$this->statement1 $this->user</p>
<form id="Menu" action="NewsWorld.php" method="POST">
<input type="submit" name="Logout" value="$this->statement2">
<select name="NewsSelection">
<option value="Select News Category">$this->statement3</option>
<option value="Politics">$this->statement4</option>
<option value="Sports">$this->statement5</option>
<option value="Science">$this->statement6</option>
<option value="Celebrity">$this->statement7</option>
</select>
<br>
<br>
<input type="submit" name="Browse" value="$this->statement8">
</form>
MARCAJ;
    }
    if ($this->user == "Administrator") {
      $this->controller->ReceiveforAdministrator();
    } else {
      $this->controller->ReceiveforRegularUser();
    }
    ///////////// Options from menu responses
    echo <<<MARCAJ
<div class="container">
<header id="header">
<h1>$this->statement9 $this->user</h1>
</header>
<main id="main">
<article>
<p>$this->statement10</p>
</article>
MARCAJ;
    $this->controller->ReceiveURL();
    //////////////// URL Response from Server
    echo "</main>";
    echo "<footer id=\"containerfooter\">NewsWorld &trade;-Istrate Mihai &copy; 2021</footer>";
    echo "</div>";
    echo "</body>";
    echo "</html>";
  }
}

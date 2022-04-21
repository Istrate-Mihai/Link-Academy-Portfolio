<?php
session_start();
error_reporting(0);
class Model
{
  function Logic()
  {
    if (isset($_COOKIE["Language"]) && $_COOKIE["Language"] == "Romana") {
      $this->statement1 = "Nu exista un astfel de nume de utilizator sau parola in baza de date,va rog inregistrati-va daca doriti sa vizita-ti NewsWorld!";
      $this->statement2 = "Conexiune nereusita: ";
    } else {
      $this->statement1 = "No such username or password exists in the database,please register if you would like to visit NewsWorld!";
      $this->statement2 = "Connection failed: ";
    }
    try {
      $hostname = "localhost";
      $username = "root";
      $password = "";
      $dbname = "users";
      $dsn = "mysql:host=$hostname;database=$dbname;charset=utf8";
      $connection = new PDO($dsn, $username, $password);
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $selectQuery = "SELECT Username,Password FROM users.usersdata";
      $result = $connection->query($selectQuery);
      $ResultSet = $result->fetchAll(PDO::FETCH_ASSOC);
      foreach ($ResultSet as $data) {
        if ($_POST['username'] == $data['Username'] && $_POST['password'] == $data['Password']) {
          $_SESSION['user'] = $_POST['username'];
          session_regenerate_id(true);
          header("Location: pages/NewsWorld.php");
          exit();
        } else {
          echo "<p class=\"error\">$this->statement1</p>";
        }
      }
    } catch (PDOException $e) {
      echo "<p class=\"error\">$this->statement2</p>" . $e->getMessage();
    }
    $connection = null;
  }
}
class Controller
{
  public  $view;
  public  $model;
  function __construct(View $view, Model $model)
  {
    $this->view = $view;
    $this->model = $model;
  }
  function Receive()
  {
    if (isset($_COOKIE["Language"]) && $_COOKIE["Language"] == "Romana") {
      $this->statement1 = "Campul de parola sau de nume de utilizator este gol,va rog introduce-ti numele de utilizator si parola!";
    } else {
      $this->statement1 = "Username field or password field is empty,please enter your username and password!";
    }
    $this->view->Display1();
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      if (isset($_POST['Cookie'])) {
        setcookie("Language", "Romana", time() + (86400 * 30));
        header("Location: index.php");
      }
      if (isset($_POST['GoToRegister'])) {
        header("Location: Register.php");
        exit();
      }
      if (isset($_POST['submitConnect'])) {
        //Check username & password for login
        if (isset($_POST['username']) && $_POST['username'] != "" && isset($_POST['password']) && $_POST['password'] != "") {
          $this->model->Logic();
        } else {
          echo "<p class=\"error\">$this->statement1</p>";
          return;
        }
      }
      $this->view->Display2();
    }
  }
}
class View
{
  function Display1()
  {
    if (isset($_COOKIE["Language"]) && $_COOKIE["Language"] == "Romana") {
      require("Languages/Language1.php");
    } else {
      require("Languages/Language2.php");
    }
    echo <<<MARCAJ
<!DOCTYPE html>
<html>
<head>
<title>$this->statement0 </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="CSSFiles/styleIndex.css">
</head>
<body>
<p>$this->statement1</p>
<form action="index.php" method="POST">
<label for="username">$this->statement2</label>
<input type="text" name="username" id="username">
<br>
<br>
<label for="password">$this->statement3</label>
<input type="password" name="password" id="password">
<br>
<br>
<input type="submit" name="submitConnect" value="$this->statement4">
<br>
<br>
<label>$this->statement5</label>
<input type="submit" name="GoToRegister" value="$this->statement6"><br><br>
<label>$this->statement7</label>
<input type="submit" id="Cookie" name="Cookie" value="$this->statement8">
</form>
MARCAJ;
  }
  function Display2()
  {
    echo "</body>";
    echo "</html>";
  }
}
if (!isset($_SESSION['user'])) {
  $Interface = new View;
  $Database = new Model;
  $Application = new Controller($Interface, $Database);
  $Application->Receive();
} else {
  if (isset($_COOKIE["Language"]) && $_COOKIE["Language"] == "Romana") {
    echo "Sunte-ti logat!";
    echo "<br>";
    echo "<br>";
    echo "<button style=\" font-size: 25px;\"><a style=\"text-decoration: none;\" href=\"pages/NewsWorld.php\">Vizita-ti Site-ul!</a></button>";
  } else {
    echo "Your are logged in!";
    echo "<br>";
    echo "<br>";
    echo "<button style=\" font-size: 25px;\"><a style=\"text-decoration: none;\" href=\"pages/NewsWorld.php\">Go To Site!</a></button>";
  }
}

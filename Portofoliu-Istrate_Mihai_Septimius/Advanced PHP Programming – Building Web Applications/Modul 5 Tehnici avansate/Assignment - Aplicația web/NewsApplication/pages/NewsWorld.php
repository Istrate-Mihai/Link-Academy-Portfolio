<?php
session_start();
session_regenerate_id(true);
error_reporting(0);
require("config.php");

//////////////////////// Application Generated Here!
if( isset($_SESSION['user']) && $_SESSION['user']=="Administrator" ){
          
  $DataBaseAdministrator=new Model;
  $ControllerAdministrator=new Controller($DataBaseAdministrator);
  $ViewAdministrator=new View($ControllerAdministrator);
  $ViewAdministrator->Display();
  

}else if( isset($_SESSION['user']) && $_SESSION['user']!="Administrator"  ){

    $DataBaseUser=new Model;
    $ControllerUser=new Controller($DataBaseUser);
    $ViewUser=new View($ControllerUser);
    $ViewUser->Display();
    


}else{
  header("Location: ../index.php");
  exit();
}




?>
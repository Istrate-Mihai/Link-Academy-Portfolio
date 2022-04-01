<?php

class Model {


    function Logic(){

         if( isset($_COOKIE["Language"]) && $_COOKIE["Language"]=="Romana"  ){
            require("Languages/Language3.php");
        
           
         }else{
            require("Languages/Language4.php");
          
            
         }



    //Validate Name
    if( isset($_POST['Name']) && $_POST['Name']!=""){
                    
        $_POST['Name']=filter_var($_POST['Name'],FILTER_SANITIZE_STRING);
      
        if( $_POST['Name']==""){
            
            
             echo "<p class=\"error\">$this->statement1</p>";
             return;				
        }else{
            
            $this->Name=$_POST['Name'];
        }
      
        
    }else{
        echo "<p class=\"error\">$this->statement2</p>";
        return;
    }
    //Validate LastName
    
if( isset($_POST['LastName']) && $_POST['LastName']!=""){
        
        $_POST['LastName']=filter_var($_POST['LastName'],FILTER_SANITIZE_STRING);
      
        if( $_POST['LastName']==""){
            echo "<p class=\"error\">$this->statement3</p>";
             
           return;				
        }else{
            
            $this->LastName=$_POST['LastName'];
            
        }
      
        
    }else{
        echo "<p class=\"error\">$this->statement4</p>";
        return;
    }
//Validate UserName
if( isset($_POST['UserName']) && $_POST['UserName']!=""){
        
        $_POST['UserName']=filter_var($_POST['UserName'],FILTER_SANITIZE_STRING);
      
        if( $_POST['UserName']==""){
            echo "<p class=\"error\">$this->statement5</p>";
           return;				
        }else{
            $this->UserName=$_POST['UserName'];
            
        }
      
        
    }else{
        echo "<p class=\"error\">$this->statement6</p>";
        return;
    }
//Validate Password
if( isset($_POST['Password']) && $_POST['Password']!=""){
   
     if( preg_match("/^[a-zA-Z0-9]{1,25}$/",$_POST['Password']) ){
        $this->Password=$_POST['Password'];
     }else{
         echo "<p class=\"error\">$this->statement7</p>";
        return;
         
     }
   
  

}else{   
        echo "<p class=\"error\">$this->statement8</p>";
        return;
    }
//Validate E-mail   
if( isset($_POST['E-mail']) && $_POST['E-mail']!=""){
     if( preg_match("/^[_\.0-9a-zA-Z-]+@([0-9-a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-z]{2,6}$/i",$_POST['E-mail'])  ){
        $this->Email=$_POST['E-mail'];
       }else{
           
        echo "<p class=\"error\">$this->statement9</p>";

        return;
       }


}else{   
    echo "<p class=\"error\">$this->statement10</p>";
    return;
}

//Registration input insertion into Database 
if(isset($this->Name) && isset($this->LastName) && isset($this->UserName) && isset($this->Password) && isset($this->Email) )
{
   try{
   $hostname="localhost";
   $username="root";
   $password="";
   $dbname="users";
   $dsn="mysql:host=$hostname;database=$dbname;charset=utf8";
   $connection=new PDO($dsn,$username,$password);
   $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
   
   echo "<p style=\"color:blue;font-size:30px;margin-top:400px; \">$this->statement11</p>"; 
   echo "<br>";
   echo "<br>";
   $insertQuery="INSERT INTO users.usersdata (Name,LastName,UserName,Password,Email) VALUES(:Name,:LastName,:UserName,:Password,:Email)";
   $preparedQuery=$connection->prepare($insertQuery);
   $preparedQuery->bindParam(':Name',$this->Name);
   $preparedQuery->bindParam(':LastName',$this->LastName);
   $preparedQuery->bindParam(':UserName',$this->UserName);
   $preparedQuery->bindParam(':Password',$this->Password);
   $preparedQuery->bindParam(':Email',$this->Email);
   $preparedQuery->execute();
   echo "<p style=\"color:blue;font-size:30px;margin-top:50px; \">$this->statement12</p>";
   echo "<br>";
   echo "<button style=\"font-size:25px;\"><a style=\"text-decoration:none;\" href=\"index.php\">$this->statement13</a></button>";
  }catch(PDOException $e) {
       echo "<p class=\"error\">$this->statement14</p>" . $e->getMessage();
  
  }
  $connection=null;	
   
}




    }


}




class Controller {
   
    public  $view;
    public  $model;
    function __construct(View $view,Model $model){
      $this->view=$view;
      $this->model=$model;
    }
   
     function Receive(){
        $this->view->Display1();
        if( $_SERVER['REQUEST_METHOD']=="POST"){
	        if(isset($_POST['submitRegistration'])){
                $this->model->Logic();   
            }
        }
        $this->view->Display2();

     }
             

}







class View {
function Display1(){    

      if(  isset($_COOKIE["Language"]) && $_COOKIE["Language"]=="Romana"  ){
        require("Languages/Language5.php");
       
      }else{
        require("Languages/Language6.php");
       
 
      }




echo<<<MARCAJ

    <!DOCTYPE html>
    <html>
    <head>
    <title>$this->statement0 </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSSFiles/styleRegister.css">
    </head>
    <body>
    <form action="register.php" method="POST">
    <label for="Name">$this->statement1</label>
    <input type="text" name="Name" id="Name">
    <br>
    <br>
    <label for="LastName">$this->statement2</label>
    <input type="text" name="LastName" id="LastName">
    <br>
    <br>
    
    <label for="UserName">$this->statement3</label>
    <input type="text" name="UserName" id="UserName">
    <br>
    <br>
    
    <label for="Password">$this->statement4</label>
    <input type="password" name="Password" id="Password">
    <br>
    <br>

    <label for="E-mail">$this->statement5</label>
    <input type="text" name="E-mail" id="E-mail">
    <br>
    <br> 


    <input type="submit" name="submitRegistration" value="$this->statement6">
    </form>

MARCAJ;
}
function Display2(){
  echo  "</body>";
  echo  "</html>";
}


}

$Interface=new View;
$Database=new Model;
$Application=new Controller($Interface,$Database);
$Application->Receive();





?>
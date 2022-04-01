<?php
class Model {   
    
     function FormatDataBaseOutput($data){


       $NotSpace=false;
      for( $i=0 ; $i < strlen($data) ; $i++ ){
        if( $data[$i]!=" " ){
          $NotSpace=true;
        }
      }

       if ( isset($NotSpace) && $NotSpace == false){
        for( $i=0 ; $i < strlen($data) ; $i++ ){
      
          if( $i%60 == 0 && $data[$i]==" "  ) 
        {
         $data=substr_replace( $data, "<br>", $i, 0 ); 
          
           
   
        } 
        
        if( $i%250 == 0   && $data[$i]==" ") {
       $data=substr_replace( $data, "<br><br><br>",$i,0); 
         
        }
       
         }
        $data=trim($data);
        $data=stripslashes($data);     
       return $data;   
          
  
       }/*else if( isset($NotSpace) && $NotSpace == true){ Aceasta formatare nu este prea eleganta ,am comentat-o, 
        insa fara ea daca administratorul introduce un text continuu deoarece  este preluat din baza de acesta va iesi din cadrul gri daca este activata va formata textul ca versurile unei poezii
  for( $i=0 ; $i < strlen($data) ; $i++ ){
  if( $i%60 == 0  ) 
{
 $data=substr_replace( $data, "<br>", $i, 0 ); 
} 

if( $i%250 == 0   ) 
{
$data=substr_replace( $data, "<br><br><br>",$i,0);  
}

 }
$data=trim($data);
$data=stripslashes($data);        
return $data;

    }*/else{
      $data=trim($data); 
      $data=stripslashes($data);
      return $data;
     }

    }



    function Logic($Process){
           
      if( isset($_COOKIE["Language"]) && $_COOKIE["Language"]=="Romana"  ){
        require("../Languages/Language9.php");
          





      }else{
            
        require("../Languages/Language10.php");

         



      }
  




        $this->user=$_SESSION['user'];    
        try{
           $this->hostname="localhost";
           $this->username="root";
           $this->password="";
           $this->dbname="users";
           $this->dsn="mysql:host=$this->hostname;database=$this->dbname;charset=utf8";
           $this->connection=new PDO($this->dsn,$this->username,$this->password);
           $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
             ///////// All Server Communication With Database  Regarding Processes Are Contained within this switch {}
             switch($Process){
                 ///////////////////////////
                 //////////////////////////
                case "Selection":
                    $_SESSION['Category']=$_POST['NewsSelection'];
                    switch(true){
                     case $_POST['NewsSelection']=="Select News Category":
                       echo "<ul id=\"NewsList\"><li>$this->statement0</li></ul>";  
                       break; 
                     
                       case $_POST['NewsSelection']=="Politics":
                        $this->queryForSelection="SELECT Politics FROM users.newscategory";
                        $this->resultSelectCategory=$this->connection->query($this->queryForSelection);
                        $this->ResultSetCategory=$this->resultSelectCategory->fetchAll(PDO::FETCH_ASSOC); 
                         echo "<ul id=\"NewsList\">";
                         foreach($this->ResultSetCategory as $this->selected){
                           if( $this->selected['Politics']!=""){
                              $this->Politics=$this->selected['Politics'];
                          
                           echo "<li><a href=\"NewsWorld.php?NewsTitle=$this->Politics\">".$this->selected['Politics']."</a></li>";
                         }

                         }
                         echo "<li><a href=\"NewsWorld.php?NewsTitle=All\">$this->statement1</a></li>";
                         echo "</ul>";
                         break; 
                         case $_POST['NewsSelection']=="Sports":
                            $this->queryForSelection="SELECT Sports FROM users.newscategory";
                            $this->resultSelectCategory=$this->connection->query($this->queryForSelection);
                            $this->ResultSetCategory=$this->resultSelectCategory->fetchAll(PDO::FETCH_ASSOC); 
                           echo "<ul id=\"NewsList\">";
                           foreach($this->ResultSetCategory as $this->selected){
                             if( $this->selected['Sports']!=""){
                                
                              $this->Sports=$this->selected['Sports'];
                        
                             echo "<li><a href=\"NewsWorld.php?NewsTitle=$this->Sports\">".$this->selected['Sports']."</a></li>";
                           }

                           }
                           echo "<li><a href=\"NewsWorld.php?NewsTitle=All\">$this->statement1</a></li>";
                           echo "</ul>";
                           break;
                           case $_POST['NewsSelection']=="Science":
                            $this->queryForSelection="SELECT Science FROM users.newscategory";
                            $this->resultSelectCategory=$this->connection->query($this->queryForSelection);
                            $this->ResultSetCategory=$this->resultSelectCategory->fetchAll(PDO::FETCH_ASSOC); 
                             echo "<ul id=\"NewsList\">";
                             foreach($this->ResultSetCategory as $this->selected){
                               if( $this->selected['Science']!=""){
                                $this->Science=$this->selected['Science'];
                        
                               echo "<li><a href=\"NewsWorld.php?NewsTitle=$this->Science\">".$this->selected['Science']."</a></li>";
                             }

                             }
                             echo "<li><a href=\"NewsWorld.php?NewsTitle=All\">$this->statement1</a></li>";
                             echo "</ul>";

                             break;
                             case $_POST['NewsSelection']=="Celebrity":
                                $this->queryForSelection="SELECT Celebrity FROM users.newscategory";
                                $this->resultSelectCategory=$this->connection->query($this->queryForSelection);
                                $this->ResultSetCategory=$this->resultSelectCategory->fetchAll(PDO::FETCH_ASSOC); 
                               echo "<ul id=\"NewsList\">";
                               foreach($this->ResultSetCategory as $this->selected){
                                 if( $this->selected['Celebrity']!=""){
                                    $this->Celebrity=$this->selected['Celebrity'];
                          
                                 echo "<li><a href=\"NewsWorld.php?NewsTitle=$this->Celebrity\">".$this->selected['Celebrity']."</a></li>";
                               }

                               }
                               echo "<li><a href=\"NewsWorld.php?NewsTitle=All\">$this->statement1</a></li>";
                               echo "</ul>";

                               break;

                    }
                 
                 break; 
                               /////////////////////
                               /////////////////////
                               case "SendComment":
                                if( isset( $_POST['Comment'] ) &&  $_POST['Comment']!=""){
                                  $_POST['Comment']=filter_var($_POST['Comment'],FILTER_SANITIZE_STRING);
                                 if( $_POST['Comment']!="" ){
                                  $this->Comment=$_POST['Comment'];
                                
                                  $this->TitleComment=$_POST['CommentTitle'];
                                  $this->user=$_SESSION['user'];
                                  $this->Category=$_POST['Category'];
                                  $this->insertQuery="INSERT INTO users.comments (Username,NewsName,Comment,Category) VALUES(:UserName,:NewsName,:Comment,:Category)";
                                  $this->preparedQuery=$this->connection->prepare($this->insertQuery);
                                  $this->preparedQuery->bindParam(':UserName',$this->user);
                                  $this->preparedQuery->bindParam(':NewsName',$this->TitleComment);
                                  $this->preparedQuery->bindParam(':Comment',$this->Comment);
                                  $this->preparedQuery->bindParam(':Category',$this->Category);
                                  $this->preparedQuery->execute();                                            
                                     echo "<p class=\"Inform\" >$this->statement2</p>";


                                  }else{
                                    echo "<p class=\"Inform\">$this->statement3</p>";
                                  }

                                }else{
                                  echo "<p class=\"Inform\" >$this->statement4</p>";
                                }
                                
                                break;
                               ///////////////////////
                               ///////////////////////
                               case "DeleteComment":
                                $user=$_SESSION['user'];
                                 if( isset( $_POST['SpecificComment'] ) && isset( $_POST['SpecificTitle'] )){
                                     $this->NewsName=$_POST['SpecificTitle'];
                                     $this->Comment=$_POST['SpecificComment'];

                                     $this->deleteQuery="Delete FROM users.comments WHERE  Comment='$this->Comment' AND NewsName='$this->NewsName'"; 
                                     $this->connection->exec($this->deleteQuery);
                                  echo "<p class=\"Inform\">$this->statement5</p>";


                                 }      
                               break;  
                               /////////////////////////
                               ////////////////////////
                               case "ShowSpecialComments":

                                $this->selectQuery="SELECT Comment FROM users.administratorcomments";
                                $this->result=$this->connection->query($this->selectQuery);
                                $this->ResultSet=$this->result->fetchAll(PDO::FETCH_ASSOC); 
                                
                                $this->user=$_SESSION['user'];
                                echo "<br>";
                                
                                echo "<p>$this->statement6</p>";   
                                foreach($this->ResultSet as $this->Comment){
                                  $this->ThisComment=$this->Comment['Comment'];
                                  $this->Comment['Comment']=$this->FormatDataBaseOutput($this->Comment['Comment']);   
                                  echo "<p>".$this->Comment['Comment']."</p>";
                                  
                              
                                  if($this->user=="Administrator"){
                                  echo "<form action=\"NewsWorld.php\" method=\"POST\">";
                                  echo     "<input type=\"hidden\" name=\"SpecificAdministratorComment\" value=\"$this->ThisComment\">";
                                  echo     "<input type=\"submit\" name=\"CommentEraserAdministrator\" value=\"$this->statement7\">";  
                                  echo "</form>";
                                     
                                 }

                            }
                               break;
                               ////////////////////////
                               ////////////////////////
                               case "Load_Latest_News":
                                $this->lastIdQuery="SELECT MAX(id) FROM users.news";
                                $this->lastIdResult=$this->connection->query($this->lastIdQuery);
                                $this->lastId =$this->lastIdResult->fetchColumn();
                                
                                $this->selectQuery="SELECT Title,Text,Category FROM users.news WHERE id=$this->lastId";
                                $this->result=$this->connection->query($this->selectQuery);
                                $this->ResultSet=$this->result->fetchAll(PDO::FETCH_ASSOC); 
                                
                                $this->selectAllQuery="SELECT Title FROM users.news";
                                $this->resultAll=$this->connection->query($this->selectAllQuery);
                                $this->ResultAllSet=$this->resultAll->fetchAll(PDO::FETCH_ASSOC);

                        
                            
                                $this->whitelist=array();
                                //Creation of Whitelist Array is made on each load of the site to always have an whitelist to compare the value of parameters sent through the URL for Security  
                                foreach($this->ResultAllSet as $this->dataTitle){
                                    $this->whitelist[]=$this->dataTitle['Title'];
                            
                                }
                            
                                
                                foreach($this->ResultSet as $this->data){
                                  
                                  echo "<h2>$this->statement8".$this->data['Title']."</h2>";   
                                  $this->title=$this->data['Title']; 
                                  $this->data['Text']=$this->FormatDataBaseOutput($this->data['Text']);
                                  $this->NewsContent=$this->data['Text'];   
                                                                        
                                  $this->CategoryContent=$this->data['Category'];
                                  $this->selectComment="SELECT UserName,Comment FROM users.comments WHERE NewsName='$this->title'";
                                
                                  $this->commentResult=$this->connection->query($this->selectComment);
                                  $this->commentResultSet=$this->commentResult->fetchAll(PDO::FETCH_ASSOC);
                                  $this->user=$_SESSION['user'];
                               
                                  $this->filenamePNG="../images/$this->title.png";
                                  $this->filenameJPG="../images/$this->title.jpg";
                                  $this->filenameJPEG="../images/$this->title.png";

                            
                                
                                if( file_exists($this->filenamePNG) ){
                                
                                echo "<img src=\"$this->filenamePNG\"  alt=\"$this->statementPhoto\" >";   
                              }else if ( file_exists($this->filenameJPG) ){
                                   echo "<img src=\"$this->filenameJPG\"  alt=\"$this->statementPhoto\" >";
                                }else if( file_exists($this->filenameJPEG) ){
                            
                                  echo "<img src=\"$this->filenameJPEG\"  alt=\"$this->statementPhoto\" >";
                                }
                                else{
                                  echo "<p  class=\"Inform\" >$this->statement9</p>";
                                }
                               
                               echo "<article class=\"latest\">".$this->NewsContent."</article>";
                               echo "<br>";
                            
                               if($this->user=="Administrator"){
                                echo "<form action=\"NewsWorld.php\" method=\"POST\">";
                                echo "<input type=\"hidden\" name=\"NewsTitleForDeletion\" value=\"$this->title\">";
                                echo "<input type=\"hidden\" name=\"NewsCategoryForDeletion\" value=\"$this->CategoryContent\">";                                        
                                echo "<input type=\"submit\" name=\"DeleteThisNews\" value=\"$this->statement10\">"; 
                                echo "</form>";
                              } 
                            
                            
                               echo "<br>";
                               echo "<br>";
                               echo "<p>$this->statement11</p>";   
                               foreach( $this->commentResultSet as $this->Comment){
                                     
                                 echo"<h3>From: ".$this->Comment['UserName']."</h3>";
                                 $this->CommentOwner=$this->Comment['UserName'];
                                 $this->ThisComment=$this->Comment['Comment'];
                                 $this->Comment['Comment']=$this->FormatDataBaseOutput($this->Comment['Comment']);
                                 echo "<p>".$this->Comment['Comment']."</p>";
                                 
                                 $this->ThisTitle=$this->title;
                                    

                                 if($this->user==$this->CommentOwner){
                                  echo "<form action=\"NewsWorld.php\" method=\"POST\">";
                                  echo  "<input type=\"hidden\" name=\"SpecificComment\" value=\"$this->ThisComment\">";
                                  echo  "<input type=\"hidden\" name=\"SpecificTitle\" value=\"$this->ThisTitle\">";
                                  echo  "<input type=\"submit\" name=\"CommentEraser\" value=\"$this->statement7\">";  
                                  echo   "</form>";
                                    
                                }

                           }
                               require("Comment.php");  
                              }
                              break;
                              //////////////////////////
                              //////////////////////////
                              case "URL-ALL":
                                $this->Category=$_SESSION['Category'];
                                $this->NewsTitle=$_GET['NewsTitle'];
                                    
                                $this->select="SELECT Title,Text,Category FROM users.news WHERE Category='$this->Category'";
                                $this->result=$this->connection->query($this->select);
                                $this->ResultSet=$this->result->fetchAll(PDO::FETCH_ASSOC);
                                  
                                $this->selectComment="SELECT UserName,Comment FROM users.comments WHERE Category='$this->Category'";
                                $this->commentResult=$this->connection->query($this->selectComment);
                                $this->commentResultSet=$this->commentResult->fetchAll(PDO::FETCH_ASSOC);
                                  
                                  foreach($this->ResultSet as $this->News){
                                    echo "<h2>$this->statement12".$this->News['Title']."</h2>";
                                    $this->title=$this->News['Title'];
                                    $this->user=$_SESSION['user'];                                 
                                    $this->CategoryContent=$this->News['Category'];
                                    $this->filenamePNG="../images/$this->title.png";
                                    $this->filenameJPG="../images/$this->title.jpg";
                                    $this->filenameJPEG="../images/$this->title.png";

                                
                                    
                                    if( file_exists($this->filenamePNG) ){
                                    
                                    echo "<img src=\"$this->filenamePNG\"  alt=\"$this->statementPhoto\" >";   
                                  }else if ( file_exists($this->filenameJPG) ){
                                
                                     echo "<img src=\"$this->filenameJPG\"  alt=\"$this->statementPhoto\" >";
                                    }else if( file_exists($this->filenameJPEG) ){
                          
                                      echo "<img src=\"$this->filenameJPEG\"  alt=\"$this->statementPhoto\" >";
                                    }
                                    else{
                                      echo "<p class=\"Inform\" >$this->statement9</p>";
                                    }
               

                                    $this->News['Text']=$this->FormatDataBaseOutput($this->News['Text']);
                                    $this->News['Text']=$this->News['Text'];


                                    echo "<article class=\"chosen\">".$this->News['Text']."<br>"."</article>";
                                    echo "<br>";
                            
                                    if($this->user=="Administrator"){
                                      echo "<form action=\"NewsWorld.php\" method=\"POST\">";
                                      echo "<input type=\"hidden\" name=\"NewsTitleForDeletion\" value=\"$this->title\">";
                                      echo "<input type=\"hidden\" name=\"NewsCategoryForDeletion\" value=\"$this->CategoryContent\">";                                        
                                      echo "<input type=\"submit\" name=\"DeleteThisNews\" value=\"$this->statement10\">"; 
                                      echo "</form>";
                                    } 

                            
                            
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<p>$this->statementAllCommentaries </p>";   
                                    foreach( $this->commentResultSet as $this->Comment){
                                          
                                      echo"<h3>From: ".$this->Comment['UserName']."</h3>";
                                      $this->CommentOwner=$this->Comment['UserName'];
                                      $this->ThisComment=$this->Comment['Comment'];
                                      $this->Comment['Comment']=$this->FormatDataBaseOutput($this->Comment['Comment']);
                                      echo "<p>".$this->Comment['Comment']."</p>";
                                      
                                      $this->ThisTitle=$this->News['Title'];
                                      if($this->user==$this->CommentOwner){
                                        echo "<form action=\"NewsWorld.php\" method=\"POST\">";
                                        echo  "<input type=\"hidden\" name=\"SpecificComment\" value=\"$this->ThisComment\">";
                                        echo  "<input type=\"hidden\" name=\"SpecificTitle\" value=\"$this->ThisTitle\">";
                                        echo  "<input type=\"submit\" name=\"CommentEraser\" value=\"$this->statement7\">";  
                                        echo   "</form>";
                                          
                                      }

                                }
                                    require("Comment.php");
                                  }
                                break;
                                   //////////////////////////////////
                                   /////////////////////////////////
                                   case "URL-ONE":
                                    $this->NewsTitle=$_GET['NewsTitle'];
                                      
                                    $this->select="SELECT Title,Text,Category FROM users.news WHERE Title='$this->NewsTitle'";
                                    $this->result=$this->connection->query($this->select);
                                    $this->ResultSet=$this->result->fetchAll(PDO::FETCH_ASSOC);
                                    
                                    $this->selectComment="SELECT UserName,Comment FROM users.comments WHERE NewsName='$this->NewsTitle'";
                                    $this->commentResult=$this->connection->query($this->selectComment);
                                    $this->commentResultSet=$this->commentResult->fetchAll(PDO::FETCH_ASSOC);

                                    foreach($this->ResultSet as $this->News){
                                      echo "<h2>$this->statement12".$this->News['Title']."</h2>";
                                      $this->title=$this->News['Title'];
                                      $this->user=$_SESSION['user'];
                                      $this->CategoryContent=$this->News['Category'];
                                      $this->filenamePNG="../images/$this->title.png";
                                      $this->filenameJPG="../images/$this->title.jpg";
                                      $this->filenameJPEG="../images/$this->title.png";

                                  
                                      
                                      if( file_exists($this->filenamePNG) ){
                                
                                      echo "<img src=\"$this->filenamePNG\"  alt=\"$this->statementPhoto\" >";   
                                    }else if ( file_exists($this->filenameJPG) ){
                        
                                       echo "<img src=\"$this->filenameJPG\"  alt=\"$this->statementPhoto\" >";
                                      }else if( file_exists($this->filenameJPEG) ){
                          
                                        echo "<img src=\"$this->filenameJPEG\"  alt=\"$this->statementPhoto\" >";
                                      }
                                      else{
                                        echo "<p class=\"Inform\">$this->statement9</p>";
                                      }

                                      $this->News['Text']=$this->FormatDataBaseOutput($this->News['Text']);
                                      $this->News['Text']=$this->News['Text'];


                                      echo "<article class=\"chosen\">".$this->News['Text']."<br>"."</article>";
                                      echo "<br>";
                              
                                      if($this->user=="Administrator"){
                                        echo "<form action=\"NewsWorld.php\" method=\"POST\">";
                                        echo "<input type=\"hidden\" name=\"NewsTitleForDeletion\" value=\"$this->title\">";
                                        echo "<input type=\"hidden\" name=\"NewsCategoryForDeletion\" value=\"$this->CategoryContent\">";                                        
                                        echo "<input type=\"submit\" name=\"DeleteThisNews\" value=\"$this->statement10\">"; 
                                        echo "</form>";
                                      }


                                      echo "<br>";
                                      echo "<br>";
                                      echo "<p>$this->statement11</p>";   
                                      foreach( $this->commentResultSet as $this->Comment){
                                            
                                        echo"<h3>From: ".$this->Comment['UserName']."</h3>";
                                        $this->CommentOwner=$this->Comment['UserName'];
                                        $this->ThisComment=$this->Comment['Comment'];
                                        $this->Comment['Comment']=$this->FormatDataBaseOutput($this->Comment['Comment']);
                                        echo "<p>".$this->Comment['Comment']."</p>";
                                        
                                        $this->ThisTitle=$this->News['Title'];
                                       if($this->user==$this->CommentOwner){
                                          echo "<form action=\"NewsWorld.php\" method=\"POST\">";
                                          echo  "<input type=\"hidden\" name=\"SpecificComment\" value=\"$this->ThisComment\">";
                                          echo  "<input type=\"hidden\" name=\"SpecificTitle\" value=\"$this->ThisTitle\">";
                                          echo  "<input type=\"submit\" name=\"CommentEraser\" value=\"$this->statement7\">";     
                                          echo   "</form>";
                                            
                                        }
                                  }
                                     
                                      require("Comment.php");
                                    }
                                    break;
                                       //////////////////////                             
                                       /////////////////////
                                       case "AdministratorComment":

                                        if( isset( $_POST['AdministratorComment'] ) &&  $_POST['AdministratorComment']!=""){
                                          $_POST['AdministratorComment']=filter_var($_POST['AdministratorComment'],FILTER_SANITIZE_STRING);
                                         if( $_POST['AdministratorComment']!="" ){

                                          $this->Comment=$_POST['AdministratorComment'];
                                      
                                          $this->insertQuery="INSERT INTO users.administratorcomments (Comment) VALUES(:Comment)";
                                          $this->preparedQuery=$this->connection->prepare($this->insertQuery);
                                          $this->preparedQuery->bindParam(':Comment',$this->Comment);
                                          $this->preparedQuery->execute();                                            
                                             echo "<p class=\"Inform\">$this->statement2</p>";


                                          }else{
                                            echo "<p class=\"Inform\">$this->statement3</p>";
                                          }

                                        }else{
                                          echo "<p class=\"Inform\">$this->statement4</p>";
                                        }
                                       break;
                                         ////////////////////////////////
                                         ////////////////////////////////
                                       case "AdministratorCommentDeletion":
                                        $this->Comment=$_POST['SpecificAdministratorComment']; 
                                        $this->deleteQuery="DELETE FROM users.administratorcomments WHERE Comment='$this->Comment'";
                                        if(  $this->connection->exec($this->deleteQuery) ){
                                          echo "<p class=\"Inform\" >$this->statement13</p>";
                                           
                                        }else{                    
                                          echo "<p class=\"Inform\" >$this->statement14</p>" ;
                                        }
                                        break;
                                        /////////////////////////////
                                        /////////////////////////////
                                        case "InsertNews":
                                                  
                                          $this->imageupload=false;
                                          /////////////////
                                          if( isset($_POST['NewsTitle']) && $_POST['NewsTitle']!="" ){
                                                      $_POST['NewsTitle']=filter_var($_POST['NewsTitle'],FILTER_SANITIZE_STRING);
                                                          if($_POST['NewsTitle']!=""){
                                                            $this->NewsTitle=$_POST['NewsTitle'];
                                                          }else {
                                                            echo "<p class=\"Inform\" >$this->statement15</p>";  
                                                          }
                                          }else{
                                            echo "<p class=\"Inform\">$this->statement16</p>";  
                                          }
                                             ///////////////
                                          if( isset($_POST['NewsCategory']) && $_POST['NewsCategory']!="" ){
                                                        $_POST['NewsCategory']=filter_var($_POST['NewsCategory'],FILTER_SANITIZE_STRING);
                                                        if($_POST['NewsCategory']!=""){
                                                          $this->NewsCategory=$_POST['NewsCategory'];
                                                        }else {
                                                        echo "<p class=\"Inform\">$this->statement17</p>";   
                                                        }
                                              }else{
                                            echo "<p class=\"Inform\">$this->statement18</p>"; 
                                          }
                                            
                                           ////////////////////    
                                          if( isset($_POST['NewsContent']) && $_POST['NewsContent']!="" ){
                                                        $_POST['NewsContent']=filter_var($_POST['NewsContent'],FILTER_SANITIZE_STRING);
                                                        if($_POST['NewsContent']!=""){
                                                    
                                                          $this->NewsContent=$_POST['NewsContent'];
                                                          
                                                        }else {
                                                        echo "<p class=\"Inform\">$this->statement19</p>";   
                                                        }   
                                          }else{
                                            echo "<p class=\"Inform\">$this->statement20</p>";  
                                          }
                                          ///////////////////////
                                          $this->uploads_dir = __DIR__ . "/../images/";
                                          $this->file=$this->uploads_dir.$_FILES["imageUpload"]["name"];
                                          $this->fileName= $_FILES["imageUpload"]["name"];

                                                         if( file_exists($this->file) ){             
                                                          echo "<p class=\"Inform\">$this->statement21  $this->fileName $this->statement22 </p>";
                                                         }           
                                                    
                                                       else if( $_FILES["imageUpload"]["size"]<=0 ) {
                                                         echo "<p class=\"Inform\">$this->statement23</p>"; 
                                                        }

                                                        else if ($_FILES["imageUpload"]["type"]!="image/jpeg" && $_FILES["imageUpload"]["type"]!="image/jpg" && $_FILES["imageUpload"]["type"]!="image/png") {
                                                         echo   "<p class=\"Inform\">$this->statement24</p>"; 
                                                        }

                                                        else {
                                                          echo "<p class=\"Inform\">$this->statement25</p>";  
                                                          move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $this->uploads_dir . $_FILES["imageUpload"]["name"]);
                                                          $this->imageupload=true;
                                                        }
                                                if( $this->imageupload==true && isset($this->NewsTitle) && isset($this->NewsCategory) && isset($this->NewsContent) ){
                                                          
                                                  $this->insertQuery="INSERT INTO users.news (Category,Title,Text) VALUES(:Category,:Title,:Text)";
                                                  $this->preparedQuery=$this->connection->prepare($this->insertQuery);
                                                  $this->preparedQuery->bindParam(':Category',$this->NewsCategory);
                                                  $this->preparedQuery->bindParam(':Title',$this->NewsTitle);
                                                  $this->preparedQuery->bindParam(':Text',$this->NewsContent);
                                                  $this->preparedQuery->execute();
                                                  $this->insertQuery="INSERT INTO users.newscategory ($this->NewsCategory) VALUES(:$this->NewsCategory)";
                                                  $this->preparedQuery=$this->connection->prepare($this->insertQuery);
                                                  $this->preparedQuery->bindParam(":$this->NewsCategory",$this->NewsTitle); 
                                                  $this->preparedQuery->execute();                                          
                                                  echo "<p class=\"Inform\">$this->statement26</p>"; 
                                                }       
                                                  break;
                                                  /////////////////////////////////
                                                  /////////////////////////////////
                                                  case "AdministratorNewsDeletion":
                                                    $this->title=$_POST['NewsTitleForDeletion'];
                                                    $this->Category=$_POST['NewsCategoryForDeletion'];
                                                    $this->deleteQueryA="DELETE FROM users.news WHERE Title='$this->title'";
                                                    $this->deleteQueryB="DELETE FROM users.newscategory WHERE $this->Category='$this->title'";
                                                    $this->connection->beginTransaction();
                                                    $this->connection->exec($this->deleteQueryA);
                                                    $this->connection->exec($this->deleteQueryB);
                                                 
                                                   if(  $this->connection->commit() ){
                                                     echo "<p class=\"Inform\">$this->statement27</p>"; 
                                                      
                                                   }else{                    
                                                     echo "<p class=\"Inform\">$this->statement28</p>" ;  
                                                   }

                                                  break;
                                                 ///////////////////////////
                                                 ///////////////////////////
                                                 case "UsersEmail";
                                                 $this->selectQuery="SELECT Name,LastName,Email FROM users.usersdata";
                                                 $this->result=$this->connection->query($this->selectQuery);
                                                 $this->ResultSet=$this->result->fetchAll(PDO::FETCH_ASSOC);
                                                 echo "<table id=\"usersEmail\">";
                                                 echo "<tr>"; 
                                                 echo "<th>$this->statement29</th>";   
                                                 echo "<th>$this->statement30</th>";  
                                                 echo "<th>$this->statement31</th>";  
                                                 echo "</tr>";
                                                 foreach( $this->ResultSet as $this->data ){
                                                   echo "<tr><td>".$this->data['Name']."</td>"."<td>".$this->data['LastName']."</td>"."<td>".$this->data['Email']."</td>";
                                                 }
                                                 echo "</table>";
                                                 echo "<br>";
                                                 echo "<br>";
                                          
                                                 echo "<div id=\"UsersEmailForm\" >";
                                                 echo "<form  method=\"POST\" action=\"NewsWorld.php\">";
                                                 echo "<br><br>";
                                                 echo "<label for=\"InsertedEmail\">$this->statement32</label>"; 
                                                 echo "<br><br>";
                                                 echo "<input id=\"InsertedEmail\" type=\"text\" name=\"userEmail\" >";
                                                 echo "<br><br>";
                                                 echo "<label for=\"EmailSubject\">$this->statement33</label>";   
                                                 echo "<br><br>";
                                                 echo "<input type=\"text\" name=\"EmailSubject\" id=\"EmailSubject\">";   
                                                 echo "<br><br>";
                                                 echo "<label for=\"EmailContent\">$this->statement34</label>";   
                                                 echo "<br><br>";
                                                 echo "<textarea name=\"EmailContent\" id=\"EmailContent\"></textarea>";
                                                 echo "<br><br>";
                                                 echo "<input type=\"submit\" name=\"SendEmail\" value=\"$this->statement35\">";    
                                                 echo "</form>";
                                                 echo "</div>";
                                                 break;
                                                 ///////////////////////////
                                                 /////////////////////////// 
                                                 case "SendUsersEmail": 
                                                   
                                                 if( isset($_POST['userEmail']) && $_POST['userEmail']!="" ) {
                                                    $this->userEmail=$_POST['userEmail'];    
                                                     }else{
                                                      echo "<p class=\"Inform\">$this->statement36</p>";   
                                                     }
                                                
                                                     if( isset($_POST['EmailSubject']) && $_POST['EmailSubject']!="" ) {
                                                      $this->EmailSubject=$_POST['EmailSubject'];    
                                                       }else{
                                                        echo "<p class=\"Inform\">$this->statement37</p>";    
                                                       }
         
                                                     if( isset($_POST['EmailContent']) && $_POST['EmailContent']!="" ){
                                                          
                                                      $this->EmailContent=$_POST['EmailContent'];

                                                     }else{
                                                      echo "<p class=\"Inform\">$this->statement38</p>";   
                                                     }

                                                   if( isset($this->userEmail) && isset($this->EmailSubject) && isset($this->EmailContent)  ){
                                                 $this->to = $this->userEmail;
                                                 $this->subject = $this->EmailSubject;      
                                                 $this->message = $this->EmailContent;
                                                 $this->headers="bcc:support@barn.com";
                                                 mail($this->to,$this->subject,$this->message,$this->headers);
                                                 echo "<p class=\"Inform\">$this->statement39</p>";     
                                                }
                                                 break;
                                                 /////////////////////////////////
                                                 ////////////////////////////////

                                }  
        
              }catch(PDOException $e) {
                        echo "<p>$this->statement40</p>" . $e->getMessage();    
                        $this->connection->rollback();
                  }
                  $this->connection=null;

              }


}

?>
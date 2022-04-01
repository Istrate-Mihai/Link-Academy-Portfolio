<?php


class Controller {
    
    public $model;
   
    function __construct(Model $model){

        $this->model=$model;
    }
   
     function ReceiveforRegularUser(){

        $this->user=$_SESSION['user'];

        if($_SERVER['REQUEST_METHOD']=="POST"){
  
            if( isset($_POST['Browse']) ){
               
                if(isset($_POST['NewsSelection'])){
        
             $this->model->Logic("Selection");
           
               }
             }
         
         if( isset($_POST['SendComment']) ){
              $this->model->Logic("SendComment");
         
         }
         
         if( isset($_POST['CommentEraser'])   ){
             $this->model->Logic("DeleteComment");
         
         }
         
         
         }

     }
   
    
    function ReceiveURL(){

        $this->model->Logic("ShowSpecialComments");
        $this->model->Logic("Load_Latest_News");
      
          

        if( isset($_GET['NewsTitle']) ){
  
            if( $_GET['NewsTitle']=="All" ){
                $this->model->Logic("URL-ALL");
           
               }else if(in_array($_GET['NewsTitle'],$this->model->whitelist)){
                $this->model->Logic("URL-ONE");
               }else{
                   if( isset($_COOKIE["Language"]) && $_COOKIE["Language"]=="Romana" ){
                    echo "<p class=\"Inform\">O astfel de valoare pentru parametrul din URL nu exista!</p>";
                   }else{
                    echo "<p class=\"Inform\">Such a value for the URL parameter doesn't exist!</p>";
                   }
                
               }
    
        }
    
        }


  function ReceiveforAdministrator(){

    $this->user=$_SESSION['user'];

    if($_SERVER['REQUEST_METHOD']=="POST"){

        if( isset($_POST['Browse']) ){
           
            if(isset($_POST['NewsSelection'])){
    
         $this->model->Logic("Selection");
       
           }
         }
     
     if( isset($_POST['SendComment']) ){
          $this->model->Logic("SendComment");
     
     }
     
     if( isset($_POST['CommentEraser'])   ){
         $this->model->Logic("DeleteComment");
     
     }
     
     if( isset($_POST['SpecialComments'])   ){
      $this->model->Logic("AdministratorComment");
     
     }
     
     if( isset( $_POST['CommentEraserAdministrator']   ) ){
      $this->model->Logic("AdministratorCommentDeletion");
     
     }
     
     if( isset( $_POST['SendNews']) ) {
      $this->model->Logic("InsertNews");
     
     }
     
     if( isset( $_POST['DeleteThisNews'] )){
      $this->model->Logic("AdministratorNewsDeletion");
     }

     if( isset( $_POST['BrowseEmail'] )  ){
      $this->model->Logic("UsersEmail");
     }

      if( isset( $_POST['SendEmail'] )  ){
        $this->model->Logic("SendUsersEmail");
       }

     }

  }







}











?>
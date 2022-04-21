<?php
class User {
  public $id; 
  public $first_name;	
  public $last_name;	 
  public $age;
	function __construct($id,$first_name,$last_name,$age) {
      $this->id=$id;	 
	  $this->first_name=$first_name;	
	  $this->last_name=$last_name;
      $this->age=$age;
	}
function get_First_and_Last_Name() {
return "{$this->last_name} {$this->first_name}";
	}
function verify_Age(){
	if(($this->age)>18){
		return $this->Legal_age=true; 
	}else{
		return $this->Legal_age=false;
	}
}	
}
$Link_Academy_User=new User(1,"Mihai Septimius","Istrate",24);
echo<<<MARCAJ
Numele complet al utilizatorului este: {$Link_Academy_User->get_First_and_Last_Name()}
<br>
<br>
MARCAJ;
echo<<<MARCAJ
Afirmatia ca acesta este major are valoare de adevar: {$Link_Academy_User->verify_Age()}
MARCAJ;

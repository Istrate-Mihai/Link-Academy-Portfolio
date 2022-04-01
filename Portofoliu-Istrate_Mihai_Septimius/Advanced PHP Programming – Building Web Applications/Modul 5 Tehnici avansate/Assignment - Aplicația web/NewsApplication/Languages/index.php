<?php

 if( isset($_COOKIE["Language"]) && $_COOKIE["Language"]=="Romana" ){
     echo "Ne pare rau URL-ul solicitat poate duce la compromiterea de informatii despre aplicatie va rog intoarceti-va!";
 }else{
    echo "Sorry the requested URL might lead to the release of sensitive information regarding this app,please return!";
 }
  











?>
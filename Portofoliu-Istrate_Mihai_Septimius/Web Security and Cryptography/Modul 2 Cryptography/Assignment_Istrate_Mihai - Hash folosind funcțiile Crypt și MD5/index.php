<?php error_reporting(0); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Criptat</title>
</head>
<body>

<?php

$tekst = 'Utilizarea funcţiilor HASH în limbajul PHP.';
$hash_Crypt = crypt($tekst,'Random Salt');
$hash_MD5 = md5($tekst);
$hash_password_hash = password_hash($tekst,PASSWORD_DEFAULT);


echo '<p> Crypt() function hash: <span style="font-weight:bold;color:blue;">'.$hash_Crypt.'</span></p>';
echo '<p> MD5() function hash: <span style="font-weight:bold;color:blue;">'.$hash_MD5.'</span></p>';
echo '<p> Password_hash() function hash with default algorithm: <span style="font-weight:bold;color:blue;">'.$hash_password_hash.'</span></p>';

echo '<p>Password_Verify() checking hash with default algorithm:</p>';

 if( password_verify('Utilizarea funcţiilor HASH în limbajul PHP.',$hash_password_hash) ){
    
     echo '<p>Password_Verify() <span style="font-weight:bold;color:blue;">confirms hash!</span></p>';

 }else{

    echo '<p>Password_Verify() <span style="font-weight:bold;color:red;">doesn\'t confirm hash!</span></p>'; 
 }


?>


</body>
</html>
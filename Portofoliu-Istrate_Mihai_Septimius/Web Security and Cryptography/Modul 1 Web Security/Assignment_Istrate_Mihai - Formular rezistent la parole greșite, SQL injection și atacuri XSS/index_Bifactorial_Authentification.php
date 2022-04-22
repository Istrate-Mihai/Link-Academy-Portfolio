<!--Backend Verification-->
<?php
error_reporting(0);
//Bifactorial Authentification Here (Second Stage Authentification)
if (isset($_POST['bifactorial_Submit'])) {
  $given_code = $_POST['codeVerification'];
  $entered_code = trim($_POST['bifactorial']);
  if ($entered_code === $given_code) {
    $successful_Login = '<p style="color:blue;font-weight:bold;">Logged In Successfully!</p>';
    echo $successful_Login;
    $final_login_Message = true;
    $succeeded = true;
  } else {
    echo '<p style="color:red;font-weight:bold;">Login Failed,you\'ve entered a wrong code,please try again!</p';
    $final_login_Message = true;
    $failed = true;
  }
}
////////
///First Stage Authentification Here
$successful_Login = '';
$warning = '';
$ok_Username = false;
$ok_Password = false;
function process_Data_Transmitted($givenInput = '', $chosed_Field = '')
{
  global $warning, $successful_Login;
  if ($chosed_Field === 'username') {
    $pattern = '/^[a-z]{8,20}$/';
  } else if ($chosed_Field === 'password') {
    $pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/';
  }
  $givenInput = trim($givenInput);
  if (!empty($givenInput)) {
    $givenInput = htmlspecialchars($givenInput, ENT_QUOTES);
    $givenInput = htmlspecialchars($givenInput);
    if (!preg_match($pattern, $givenInput)) {
      $warning = '<p style="color:red;">Submitted username or password is incorrect,please try again!</p>';
      $successful_Login = '';
    } else {
      if ($chosed_Field === 'username') {
        global $ok_Username;
        $ok_Username = true;
      } else if ($chosed_Field === 'password') {
        global $ok_Password;
        $ok_Password = true;
      }
      $successful_Login .= '<p>Your <span style="color:blue;">' . $chosed_Field . '</span> is good!</p>';
    }
  } else {
    $warning = '<p style="color:red;">Submitted username or password is empty,please fill each field correctly!</p>';
    $successful_Login = '';
  }
}
if (isset($_POST['submitButton'])) {
  process_Data_Transmitted($_POST['username'], 'username');
  process_Data_Transmitted($_POST['password'], 'password');
  if (isset($warning) && $warning != '') {
    echo $warning;
  } else if (isset($successful_Login) && $successful_Login != '' && isset($ok_Username) && $ok_Username && isset($ok_Password) && $ok_Password) {
    $randomNumber = mt_rand(1000, 9999);;
    $to = "john.smith@barn.com";
    $subj = "Authentification";
    $mess = "Authentification code is: $randomNumber!";
    $headers = "bcc:support@barn.com";
    mail($to, $subj, $mess, $headers);
    $authentificate_Bifactorial = true;
  } else if ((isset($ok_Username) && !$ok_Username) || (isset($ok_Password) && !$ok_Password)) {
    echo '<p style="color:red;">Login Failed,Submitted username or password is incorrect,please try again!</p>';
  }
}
?>
<!--Presentation Layer-->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formular Securitate</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <style>
    body {
      padding: 0;
      margin: 0;
    }

    form {
      margin: 10% auto;
      width: 20%;
    }

    label {
      font-weight: bold;
      color: brown;
    }

    button[type="submit"],
    img {
      border-radius: 50%;
    }

    button[type="submit"] {
      width: 32%;
    }

    /*
  Default style for authentification 
*/
    #successful_Bifactorial_Authentification,
    #failed_Bifactorial_Authentification {
      display: none;
    }

    <?php
    if (isset($_POST['submitButton'])) {
      if (isset($authentificate_Bifactorial) && $authentificate_Bifactorial) {
        echo  '#loginForm {
display:none;
}';
      }
    }
    if (isset($final_login_Message) && $final_login_Message) {
      echo  '#loginForm {
display:none;
}';
      if (isset($succeeded) && $succeeded) {
        echo '#successful_Bifactorial_Authentification {
display:inline-block;
}';
      } else if (isset($failed) && $failed) {
        echo '#failed_Bifactorial_Authentification {
display:inline-block;
}';
      }
    }
    ?>
  </style>
</head>

<body>
  <?php
  if (isset($_POST['submitButton'])) {
    $action = htmlspecialchars($_SERVER['PHP_SELF']);
    echo '<form  id="bifactorial_Login_Form" name="bifactorial_Login_Form" action="' . $action . '" method="POST">
<label>Enter the 4 digit code sent via email,within 30 seconds, to complete your authentification!</label>
<input type="text" name="bifactorial" id="bifactorial"> 
<input type="hidden" id="codeVerification" name="codeVerification" value="' . $randomNumber . '">
<input type="submit" name="bifactorial_Submit">
</form>';
  }
  ?>
  <img src="https://i.pinimg.com/originals/d2/64/65/d264655b41a1f27439947a45e5992c62.jpg" id="successful_Bifactorial_Authentification" width="250px" height="250px" alt="successful_Bifactorial_Authentification">
  <img src="https://media.istockphoto.com/photos/handmade-picture-id844102752?k=6&m=844102752&s=612x612&w=0&h=mz7Wx1jKUqAVVVaz2KhY9787apENTZAKN4yKbrePE8Q=" id="failed_Bifactorial_Authentification" width="250px" height="250px" alt="failed_Bifactorial_Authentification">
  <form id="loginForm" name="loginForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Username" onclick="selectedField(this)" onkeyup="checkUsername(this)" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" onclick="selectedField(this)" onkeyup="checkUsername(this)" required>
    </div>
    <br>
    <button type="submit" name="submitButton" class="btn btn-primary" disabled><img src="https://th.bing.com/th/id/OIP.f_p8uCPRxknvSjdrYVz4nQHaDl?pid=ImgDet&rs=1" width="150px" height="100px" alt='Login'></button>
  </form>
  <p id="output_Username"></p>
  <p id="output_Password"></p>
  <!--Frontend Verification-->
  <script>
    <?php
    if (isset($_POST['submitButton'])) {
      if (isset($authentificate_Bifactorial) && $authentificate_Bifactorial) {
        echo 'setTimeout(function(){
let bifactorial_Form = document.getElementById("bifactorial_Login_Form");
bifactorial_Form.style.display = "none";
document.write("Session Expired");  
},30000)';
      }
    }
    ?>
    let ok_Username, ok_Password, current_checked_Field;
    ok_Username = false;
    ok_Password = false;

    function selectedField(expected_Field) {
      current_checked_Field = expected_Field.id;
      console.log(current_checked_Field);
    }

    function checkUsername(expected_Field) {
      let checked_Value, pattern, output_Message_Username, output_Message_Password;
      checked_Value = expected_Field.value;
      output_Message_Username = document.getElementById("output_Username");
      output_Message_Password = document.getElementById("output_Password");
      if (current_checked_Field === "username") {
        pattern = /^[a-z]{8,20}$/;
        if (checked_Value === '') {
          output_Message_Username.style.display = 'none';
        } else {
          output_Message_Username.style.display = 'block';
        }
        if (!checked_Value.match(pattern)) {
          output_Message_Username.innerText = 'Not a good username entered,the username must be between 8 to 20 characters long and can only contain lowercase letters!';
          output_Message_Username.style.color = 'red';
          ok_Username = false;
        } else {
          output_Message_Username.innerText = 'Valid username expected value entered in the field!';
          output_Message_Username.style.color = 'green';
          ok_Username = true;
        }
      } else if (current_checked_Field === "password") {
        pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/;
        if (checked_Value === '') {
          output_Message_Password.style.display = 'none';
        } else {
          output_Message_Password.style.display = 'block';
        }
        if (!checked_Value.match(pattern)) {
          output_Message_Password.innerText = 'Not a good password entered,the password must be between 8 and 20 characters long and contain a capital letter, a lowercase letter,a digit [0-9] and a special character (!,?,=,; etc.)!';
          output_Message_Password.style.color = 'red';
          ok_Password = false;
        } else {
          output_Message_Password.innerText = 'Valid password expected value entered in the field!';
          output_Message_Password.style.color = 'green';
          ok_Password = true;
        }
      }
      //////////Check conditions for submit button acomplished
      if (ok_Username && ok_Password) {
        document.getElementsByTagName("button")[0].disabled = false;
      } else {
        document.getElementsByTagName("button")[0].disabled = true;
      }
    }
  </script>
</body>

</html>
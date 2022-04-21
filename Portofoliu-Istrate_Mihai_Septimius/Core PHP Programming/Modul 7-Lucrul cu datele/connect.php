<?php
// Process 'INSERT' button entry:
if (isset($_POST['insert'])) {
  function processData($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $errors = array();
  $nume = "";
  $prenume = "";
  $gen = "";
  $varsta = "";
  $inaltime = "";
  $greutate = "";
  $cod_boala = "";
  $cod_medic = "";
  // Process 'nume' entry:	
  if (empty($_POST['nume'])) {
    $errors['nume'] = "Trebuie completat câmpul.";
  } else if (strlen($_POST['nume']) > 12) {
    $errors['nume'] = "Numele trebuie sa fie de cel mult 12 caractere.";
  } else if (is_numeric($_POST['nume']) || preg_match('/[^a-zA-Z]/', $_POST['nume'])) {
    $errors['nume'] = "Numele nu poate sa fie un numar sau sa contina numere.";
  } else {
    $nume = processData($_POST['nume']);
  }
  // Process 'prenume' entry:	
  if (empty($_POST['prenume'])) {
    $errors['prenume'] = "Trebuie completat câmpul.";
  } else if (strlen($_POST['prenume']) > 12) {
    $errors['prenume'] = "Prenumele trebuie sa fie de cel mult 12 caractere.";
  } else if (is_numeric($_POST['prenume']) || preg_match('/[^a-zA-Z]/', $_POST['prenume'])) {
    $errors['prenume'] = "Prenumele nu poate sa fie un numar sau sa contina numere.";
  } else {
    $prenume = processData($_POST['prenume']);
  }
  // Process 'gen' entry:	
  if (empty($_POST['gen'])) {
    $errors['gen'] = "Trebuie completat campul.";
  } else if ($_POST['gen'] !== "Masculin") {
    if ($_POST['gen'] !== "Feminin") {
      $errors['gen'] = "Genul trebuie sa fie completat ca Masculin sau Feminin,acestea fiind singurele intrari posibile ale campului.";
    }
  } else {
    $gen = processData($_POST['gen']);
  }
  // Process 'vârsta' entry:	
  if (empty($_POST['varsta'])) {
    $errors['varsta'] = "Trebuie completat câmpul.";
  } else if (strlen($_POST['varsta']) >= 3 || $_POST['varsta'] > 18 || is_numeric($_POST['varsta']) == false) {
    $errors['varsta'] = "Vârsta trebuie sa fie de cel mult 2 caractere numerice și o valoare până în 18 ani.";
  } else {
    $varsta = processData($_POST['varsta']);
  }
  // Process 'înalțime' entry:	
  if (empty($_POST['inaltime'])) {
    $errors['inaltime'] = "Trebuie completat câmpul.";
  } else if (strlen($_POST['inaltime']) > 3 || $_POST['inaltime'] > 250 ||  is_numeric($_POST['inaltime']) == false) {
    $errors['inaltime'] = "Înălțimea trebuie sa fie un numar de 3 cifre,pana în 250 de cm.";
  } else {
    $inaltime = processData($_POST['inaltime']);
  }
  // Process 'greutate' entry:	
  if (empty($_POST['greutate'])) {
    $errors['greutate'] = "Trebuie completat câmpul.";
  } else if (strlen($_POST['greutate']) > 3 || $_POST['greutate'] > 120  || is_numeric($_POST['greutate']) == false) {
    $errors['greutate'] = "Greutatea trebuie sa fie un numar de 3 cifre până în 120 de kg.";
  } else {
    $greutate = processData($_POST['greutate']);
  }
  // Process 'cod_boală' entry:	
  if (empty($_POST['cod_boala'])) {
    $errors['cod_boala'] = "Trebuie completat câmpul.";
  } else if (strlen($_POST['cod_boala']) > 12 || is_numeric($_POST['cod_boala']) == false) {
    $errors['cod_boala'] = "Codul bolii trebuie sa fie un numar de pana in 12 cifre.";
  } else {
    $cod_boala = processData($_POST['cod_boala']);
  }
  // Process 'cod_medic' entry:	
  if (empty($_POST['cod_medic'])) {
    $errors['cod_medic'] = "Trebuie completat câmpul.";
  } else if (strlen($_POST['cod_medic']) > 12 || is_numeric($_POST['cod_medic']) == false) {
    $errors['cod_medic'] = "Codul bolii trebuie sa fie un numar de pana in 12 cifre.";
  } else {
    $cod_medic = processData($_POST['cod_medic']);
  }
  // Values will be inserted here 
  if (empty($errors)) {
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pacient";
    $conn = mysqli_connect($host, $username, $password, $dbname);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    // SQL pentru inserarea datelor completate in formular
    $date = "INSERT INTO date (nume,prenume,gen,varsta,inaltime,greutate,cod_boala,cod_medic)
VALUES ('$nume','$prenume','$gen','$varsta','$inaltime','$greutate','$cod_boala','$cod_medic')";
    if (mysqli_query($conn, $date)) {
      echo "Înregistrarea datelor în tabel a fost realizată cu succes";
    } else {
      echo "Error: " . $date . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
  }
}

// Process 'SELECT' button entry:
if (isset($_POST['select'])) {
  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "pacient";
  $conn = mysqli_connect($host, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $select = "SELECT * FROM date";
  $result = mysqli_query($conn, $select);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "ID: " . $row["id"] . " - Nume: " . $row["nume"] . " - Prenume: " . $row["prenume"] . " - Gen: " . $row["gen"] . " - Varsta: " . $row["varsta"] . " - Inaltime: " . $row["inaltime"] . " - Greutate: " . $row["greutate"] . " - Cod_boala: " . $row["cod_boala"] . " - Cod_medic: " . $row["cod_medic"] . "<br>";
    }
  } else {
    echo "0 rezultate de afisat";
  }
  mysqli_close($conn);
}
// Process 'DELETE FIRST ENTRY' button entry:
if (isset($_POST['delete_first'])) {
  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "pacient";
  $conn = mysqli_connect($host, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $delete_first = "DELETE FROM date WHERE id=1";
  if (mysqli_query($conn, $delete_first)) {
    echo "Datele despre prima înregistrare a paciențiilor au fost șterse";
  } else {
    echo "Error: " . $delete_first . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
}
// Process 'DELETE ALL' button entry:
if (isset($_POST['delete_all'])) {
  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "pacient";
  $conn = mysqli_connect($host, $username, $password, $dbname);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $delete_all = "DELETE FROM date";
  if (mysqli_query($conn, $delete_all)) {
    echo "Toate datele despre toate înregistrările paciențiilor au fost șterse";
  } else {
    echo "Error: " . $delete_all . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
}

<?php require("connect.php"); ?>
<!DOCTYPE html>
<html lang="ro">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interfață Gestionare Pacienți</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
  <h1>Interfața de Gestiune a Bazei de Date - Spitalul Clinic Pediatric "Maria Sklodowska Curie" </h1>
  <form action="index.php" method="POST">
    <fieldset>
      <legend>Introduceți datele pacientului:</legend>
      <table>
        <tr>
          <td>
            <label for="nume">Numele</label>
          </td>
          <td>
            <input type="text" id="nume" name="nume" placeholder="Surname" value="<?php if (isset($nume)) {
                                                                                    echo $nume;
                                                                                  } ?>" <?php if (isset($errors['nume'])) {
                                                                                          echo "class='error'";
                                                                                        } ?>><span class="errorMessage"><?php if (isset($errors['nume'])) {
                                                                                                                          echo "** " . $errors['nume'];
                                                                                                                        } ?></span>
          <td>
        </tr>
        <tr>
          <td>
            <label for="prenume">Prenumele</label>
          </td>
          <td>
            <input type="text" id="prenume" name="prenume" placeholder="LastName" value="<?php if (isset($prenume)) {
                                                                                            echo $prenume;
                                                                                          } ?>" <?php if (isset($errors['prenume'])) {
                                                                                                  echo "class='error'";
                                                                                                } ?>><span class="errorMessage"><?php if (isset($errors['prenume'])) {
                                                                                                                                  echo "** " . $errors['prenume'];
                                                                                                                                } ?></span>
          </td>
        </tr>
        <tr>
          <td>
            <label for="gen">Genul:</label>
          </td>
          <td>
            <input type="text" id="gen" name="gen" placeholder="Gender" value="<?php if (isset($gen)) {
                                                                                  echo $gen;
                                                                                } ?>" <?php if (isset($errors['gen'])) {
                                                                                        echo "class='error'";
                                                                                      } ?>><span class="errorMessage"><?php if (isset($errors['gen'])) {
                                                                                                                        echo "** " . $errors['gen'];
                                                                                                                      } ?></span>
          </td>
        </tr>
        <tr>
          <td>
            <label for="vârsta">Vârsta:</label>
          </td>
          <td>
            <input type="text" id="varsta" name="varsta" placeholder="Age" value="<?php if (isset($varsta)) {
                                                                                    echo $varsta;
                                                                                  } ?>" <?php if (isset($errors['varsta'])) {
                                                                                          echo "class='error'";
                                                                                        } ?>><span class="errorMessage"><?php if (isset($errors['varsta'])) {
                                                                                                                          echo "** " . $errors['varsta'];
                                                                                                                        } ?></span>
          </td>
        </tr>
        <tr>
          <td>
            <label for="înaltime">Înălțime:</label>
          </td>
          <td>
            <input type="text" id="inaltime" name="inaltime" placeholder="Height(in cm)" value="<?php if (isset($inaltime)) {
                                                                                                  echo $inaltime;
                                                                                                } ?>" <?php if (isset($errors['inaltime'])) {
                                                                                                        echo "class='error'";
                                                                                                      } ?>><span class="errorMessage"><?php if (isset($errors['inaltime'])) {
                                                                                                                                        echo "** " . $errors['inaltime'];
                                                                                                                                      } ?></span>
          </td>
        </tr>
        <tr>
          <td>
            <label for="greutate">Greutate:</label>
          </td>
          <td>
            <input type="text" id="greutate" name="greutate" placeholder="Weight(in kg)" value="<?php if (isset($greutate)) {
                                                                                                  echo $greutate;
                                                                                                } ?>" <?php if (isset($errors['greutate'])) {
                                                                                                        echo "class='error'";
                                                                                                      } ?>><span class="errorMessage"><?php if (isset($errors['greutate'])) {
                                                                                                                                        echo "** " . $errors['greutate'];
                                                                                                                                      } ?></span>
          </td>
        </tr>
        <tr>
          <td>
            <label for="cod_boală">Cod boală* :</label>
          </td>
          <td>
            <input type="text" id="cod_boala" name="cod_boala" placeholder="Diagnostic_id" value="<?php if (isset($cod_boala)) {
                                                                                                    echo $cod_boala;
                                                                                                  } ?>" <?php if (isset($errors['cod_boala'])) {
                                                                                                          echo "class='error'";
                                                                                                        } ?>><span class="errorMessage"><?php if (isset($errors['cod_boala'])) {
                                                                                                                                          echo "** " . $errors['cod_boala'];
                                                                                                                                        } ?></span>
          </td>
        </tr>
        <tr>
          <td>
            <label for="cod_medic">Cod medic* :</label>
          </td>
          <td>
            <input type="text" id="cod_medic" name="cod_medic" placeholder="Doctor_id" value="<?php if (isset($cod_medic)) {
                                                                                                echo $cod_medic;
                                                                                              } ?>" <?php if (isset($errors['cod_medic'])) {
                                                                                                      echo "class='error'";
                                                                                                    } ?>><span class="errorMessage"><?php if (isset($errors['cod_medic'])) {
                                                                                                                                      echo "** " . $errors['cod_medic'];
                                                                                                                                    } ?></span>
          </td>
        </tr>
        <tr>
          <td><input class="formButton" type="submit" name="insert" value="INSERT"></td>
          <td><input class="formButton" type="submit" name="select" value="SELECT"></td>
        </tr>
        <tr>
          <td><input class="formButton" type="submit" name="delete_first" value="DELETE FIRST ENTRY"></td>
          <td><input class="formButton" type="submit" name="delete_all" value="DELETE ALL"></td>
        </tr>
        <tr>
          <td><input class="formButton" type="submit" name="reset" value="RESET"></td>
        </tr>
        <tr>
          <td><span style="color:blue;font-size:14px;">*Trebuie introdus numarul de înregistrare(ex:1,2,3....);</span></td>
          <td><span style="color:red;font-size:14px;">**Intrare incorecta;</span></td>
        </tr>
      </table>
    </fieldset>
  </form>
  <div>
    <p>Bună ziua domnule Doctor,bine a-ți venit la interfața de gestiune pentru baza de date a Spitalului Clinic "Maria Sklodowska Curie"! </p>
    <p>Pentru o utilizare cât mai eficientă a sistemului informatic,vă rugăm să parcurgeți etapele de mai jos:</p>
    <ul>
      <li>Pentru a introduce un nou pacient in sistem,completați toate câmpurile,in conformitate cu descrierile acestora!</li>
      <li>Pentru a înregistra datele în sistem apăsați butonul <button style="font-size:10px">INSERT</button></li>
      <li>Pentru a afisa datele din sistem apăsați butonul <button style="font-size:10px">SELECT</button></li>
      <li>Pentru a sterge prima intrare despre un pacient apăsați <button style="font-size:10px">DELETE FIRST ENTRY</button></li>
      <li>Pentru a sterge toate datele din sistem apăsați <button style="font-size:10px">DELETE ALL</button></li>
      <li>Pentru a reseta câmpurile formularului și a introduce datele unui nou pacient apasati <button style="font-size:10px">RESET</button></li>
      <li>Utilizarea corectă a sistemului(pentru asigurarea funcționalității liniare)se realizează prin intoducerea datelor cel puțin o data apoi folosirea butoanelor<button style="font-size:10px">INSERT</button>,<button style="font-size:10px">SELECT</button>,<button style="font-size:10px">DELETE</button>,respectiv<button style="font-size:10px">DELETE FIRST ENTRY</button></li>
    </ul>
  </div>
</body>

</html>
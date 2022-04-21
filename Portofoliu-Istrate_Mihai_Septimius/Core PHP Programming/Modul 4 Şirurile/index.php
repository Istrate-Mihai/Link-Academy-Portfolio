<?php
$peopleData = array(
  array('id', 'fname', 'lname', 'email'),
  array(1, 'Peter', 'Andersen', 'peter@gmail.com'),
  array(2, 'John', 'Miller', 'john@gmail.com'),
  array(3, 'Thomas', 'Swift', 'thomas@gmail.com')
);
$n = count($peopleData); // Number of rows for the table defined here
$m = count($peopleData[1]); // Number of columns for the table defined here
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assignment Manipularea Sirurilor</title>
  <style>
    table,
    td,
    th {
      border: 1px solid black;
      border-collapse: collapse;
      border-spacing: 0;
      padding: 2px;
      text-align: left;
    }
  </style>
</head>

<body>
  <p>To contact our management you can refer to one of the following email adresses:</p>
  <table>
    <tr>
      <?php for ($i = 0; $i < 1; $i++) :
        $m = count($peopleData[$i]);  // Just the number of the elements of the first row needed,  
        for ($j = 0; $j < $m; $j++) : // I used a separate loop because in the first row I want <th> elements not <td>
      ?>
          <th><?php echo $peopleData[$i][$j]; ?></th>
      <?php endfor;
      endfor;
      ?>
    </tr>
    <?php for ($i = 1; $i < $n; $i++) :  ?>
      <tr>
        <?php for ($j = 0; $j < $m; $j++) : ?>
          <td><?php echo $peopleData[$i][$j]; ?></td>
      <?php endfor;
      endfor;
      ?>
      </tr>
  </table>
</body>

</html>
<?php
  $name = htmlspecialchars(filter_input(INPUT_GET, 'name'));
  $gross_income = htmlspecialchars(filter_input(INPUT_GET, 'gross_income'));
  $deductions = htmlspecialchars(filter_input(INPUT_GET, 'deductions'));
  $adj_income = htmlspecialchars(filter_input(INPUT_GET, 'adj_income'))
  
  ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Federal Income Tax</title>
</head>
<body>
  

  <form action="index.php" method="get">
    <label>Name: </label>
    <input type="text" name="name" /><br>
    <label>Gross Income: </label>
    <input type="text" name="gross_income" /><br>
    <label>Total Deductions:</label>
    <input type="text" name="deductions" /><br>
    <input type="submit" value="Submit" />
  </form>



  <?php
  //CALCULATE ADJUSTED GROSS INCOME//
  $adj_income = $gross_income - $deductions;


  //CALCULATE TAXES OWED DEPENDANT ON BRACKET//
  if ($adj_income >= 0 && $adj_income <= 10275 ){
    $taxes_10 = $adj_income * .1;
  }elseif ($adj_income >= 10275 && $adj_income <= 41775){
    $taxes_12 = ($adj_income - 10275) * .12;
    $taxes_10 = 1027.50;
  }elseif($adj_income >= 41776 && $adj_income <= 89075){
    $taxes_22 = ($adj_income - 41777) * .22;
    $taxes_10 = 1027.5;
    $taxes_12 = 3780;
  }elseif($adj_income >= 89076 && $adj_income <= 170050){
    $taxes_24 = ($adj_income - 89075) * .24;
    $taxes_10 = 1027.5;
    $taxes_12 = 3780;
    $taxes_22 = 10406;
  }elseif($adj_income >= 170051 && $adj_income <= 215950){
    $taxes_24 = ($adj_income - 170050) * .32;
    $taxes_10 = 1027.5;
    $taxes_12 = 3780;
    $taxes_22 = 10406;
    $taxes_24 = 19434;
  }elseif($adj_income >= 215951 && $adj_income <= 539900){
    $taxes_35 = ($adj_income - 215951) * .35;
    $taxes_10 = 1027.5;
    $taxes_12 = 3780;
    $taxes_22 = 10406;
    $taxes_24 = 19434;
    $taxes_32 = 14688;
  }elseif($adj_income >= 539901){
    $taxes_37 = ($adj_income - 539901) * .37;
    $taxes_10 = 1027.5;
    $taxes_12 = 3780;
    $taxes_22 = 10406;
    $taxes_24 = 19434;
    $taxes_32 = 14688;
    $taxes_35 = 113382.5;
  }
  
  //ADD ALL TAXES OWED//
  $taxes_owed = $taxes_10 + $taxes_12 + $taxes_22 + $taxes_24 + $taxes_32 + $taxes_35 + $taxes_37;

  //DISPLAY EACH BRACKET AMOUNT OWED AND TOTAL TAXES OVERALL//
  echo "Hi $name, the IRS wants some money!";
  echo "<br>";
  echo "Adjusted Gross Income: $adj_income";
  echo "<br>";
  echo "Taxes Owed at 10% Bracket: $taxes_10";
  echo "<br>";
  echo "Taxes Owed at 12% Bracket: $taxes_12";
  echo "<br>";
  echo "Taxes Owed at 22% Bracket: $taxes_22";
  echo "<br>";
  echo "Taxes Owed at 24% Bracket: $taxes_24";
  echo "<br>";
  echo "Taxes Owed at 32% Bracket: $taxes_32";
  echo "<br>";
  echo "Taxes Owed at 35% Bracket: $taxes_35";
  echo "<br>";
  echo "Taxes Owed at 37% Bracket: $taxes_37";
  echo "<br>";
  echo "Taxes Owed: $taxes_owed ";
  echo "<br>";
  ?>
  
</body>
</html>
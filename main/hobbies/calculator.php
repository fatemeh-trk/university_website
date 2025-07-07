<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form action="calculator.php" method="post">
    <label for="">circle</label>
    <br>
    <label for="">radius :</label>
    <input type="text" name="radius">
    <br>
    <input type="submit" value="calculate">
   </form>  <br>
</body>
</html>

<?php
  $volume = null;
  $area = null;
  $radius = $_POST["radius"];
  $circum_circle = round($radius * 2 * pi(),2);
  $area = round(pow($radius,2)*pi(),2);
  $volume = 4/3 * pi() * pow($radius,3);
  echo "area = {$area} cm^2 <br>";
  echo "volume = {$volume} cm^3 <br>";

  echo "circumference = {$circum_circle} cm";

?>
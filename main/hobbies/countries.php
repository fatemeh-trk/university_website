<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="countries.php" method="post">
        <label for="">country :</label>
        <input type="text" name = "country">
        <br>
        <input type="submit"  value="show capital">
    </form>
</body>
</html>
<?php

 $capitals = Array("USA"=>"D.C",
                    "Japan"=>"kyoto",
                    "France"=>"Paris"
                  );
 $input = $_POST["country"];  
 echo $capitals[$input];
 if (empty($input)){
    echo "enter a value";
 }

?>
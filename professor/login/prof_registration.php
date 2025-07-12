
<?php

 $db_server = "localhost";
 $db_user = "root";
 $db_pass = "";
 $db_name = "uni_web";
 $conn = "";
 


 try {
    $conn = mysqli_connect($db_server,$db_user,$db_pass,$db_name);
  }
 catch (mysqli_sql_exception) {
    echo "no connection";
  } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./professor_login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>"  method="post">
            <h1>Registration</h1>
            <input type="text" class="input_box" placeholder="first name" name="first_name">
            <br>
            <input type="text" class="input_box"
            placeholder="last name" name="last_name">
            <br>
            <input type="text" class="input_box" placeholder="username" name="username">
            <br>
            <input type="text" 
            class="input_box" placeholder="professor ID" name="prof_id">
            <br>
            <input type="password" class="input_box" placeholder="password" name="pro_pass">
            <br>
            <input type="submit" class="input_box" value="Register" name="submit">
        </form>
    </div>
    <style>
        h1{
            margin-bottom: 17px;
            
        }
    </style>
</body>
</html>


<?php


























 mysqli_close($conn)
?>
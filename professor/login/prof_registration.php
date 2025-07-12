
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
            <input type="password" class="input_box" placeholder="password" name="prof_pass">
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
    if (isset($_POST["submit"])) {  
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $first_name = filter_input(INPUT_POST,"first_name",FILTER_SANITIZE_SPECIAL_CHARS);
        $last_name = filter_input(INPUT_POST,"last_name",FILTER_SANITIZE_SPECIAL_CHARS);
        $username = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
        $prof_id = filter_input(INPUT_POST,"prof_id",FILTER_SANITIZE_SPECIAL_CHARS);
        $prof_pass = filter_input(INPUT_POST,"prof_pass",FILTER_SANITIZE_SPECIAL_CHARS);
        
            
            $req=['first_name','last_name','username','prof_id','prof_pass'];
            $mis=[];

            foreach ($req as $field) {
                if(empty(trim($_POST[$field]))){
                $mis [] = $field;
                }
               
            }
            if (!empty($mis)) {
                $error_text = "please fill in : " . implode(', ',$mis);
                echo "<script>alert('".addslashes($error_text)."');</script>";
                }
            else{
                $hash_prof_pass = password_hash($prof_pass,PASSWORD_DEFAULT);

                $Sql = "INSERT INTO professors (prof_id,prof_name,prof_family,prof_username,prof_pass) values
                ('$prof_id','$first_name','$last_name','$username','$hash_prof_pass')";

                mysqli_query($conn,$Sql);
                echo "<script>alert('".addslashes("you registered successfully !! ")."');</script>";
                }
            
        }

     }


  






















 mysqli_close($conn)
?>
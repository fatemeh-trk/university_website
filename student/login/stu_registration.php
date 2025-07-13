<?php
 $db_server = "localhost";
 $db_user = "root";
 $db_pass = "";
 $db_name = "uni_web";
 $con = "";
 


 try {
    $con = mysqli_connect($db_server,$db_user,$db_pass,$db_name);
  }
 catch (mysqli_sql_exception) {
    echo "no connection";
  } 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./student_login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
            <div class="input_box"><input type="text" placeholder="first name" name="first_name"></div>
            <div class="input_box"><input type="text" placeholder="last name" name="last_name"></div>
            <div class="input_box"><input type="text" placeholder="username" name="username"></div>
            <div class="input_box"><input type="text" placeholder="student ID" name="student_id"></div>
            <div class="input_box"><input type="password" placeholder="password" name="student_pass"></div>
            <div class="input_box"><input type="submit" value="register" name="submit"></div>
        </form>
    </div>
    
</body>
</html>
<?php

if (isset($_POST['submit'])) {
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $first_name = filter_input(INPUT_POST,'first_name',FILTER_SANITIZE_SPECIAL_CHARS);
        $last_name = filter_input(INPUT_POST,'last_name',FILTER_SANITIZE_SPECIAL_CHARS);
        $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS);
        $student_id = filter_input(INPUT_POST,'student_id',FILTER_SANITIZE_SPECIAL_CHARS);
        $student_pass = filter_input(INPUT_POST,'student_pass',FILTER_SANITIZE_SPECIAL_CHARS);
    }

    $req = ['first_name','last_name','username','student_id','student_pass'];
    $mis = [];

    foreach($req as $field){
        if(empty(trim($_POST[$field]))){
            $mis[] = $field;
        }
    }
    if(!empty($mis)){
        $error_txt = "please fill in " . implode(', ',$mis);
        echo "<script>alert('".addslashes($error_txt)."');</script>";}
    
    elseif(empty($mis)){
        $sql = "INSERT INTO student (stu_name , stu_family , stu_id , stu_username , stu_pass) values ('$first_name','$last_name','$student_id','$username','$student_pass')";

        mysqli_query($con,$sql);
        echo "<script>alert('".addslashes("successfull .")."');</script>";
    }


}




mysqli_close($con)
?>
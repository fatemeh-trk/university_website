

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);

    $password = filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);

    $sql= "select * from student where stu_username = '$username' and stu_pass = '$password'";
    $result = mysqli_query($conn,$sql);
    $count= mysqli_num_rows($result);
    if ($count == 1){
        header("location:../panel/student_panel.html");
    }
    else{
        header("location:student_login.html");
    }
}






?>


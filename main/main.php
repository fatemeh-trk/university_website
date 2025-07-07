

<?php


if(isset($_POST['select'])){
    $role = $_POST["role"];
    if($role == 'student'){

      header("Location: ../student/login/student_login.html");
      exit;
       }
    elseif($role == 'professor'){

       header("Location:../professor/login/professor_login.html");
      exit;
    }
    else{
        echo "choose ur role .";
    }
}
?>
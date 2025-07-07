

<?php
  $username = $_POST["username"];
  $password = $_POST["password"];
  $date = date("h : m : s");

  

  foreach ($_POST as $key => $value) {
    echo "<br>".$key ," => ", $value;
  }
  if(isset($_POST["login"])){
    if (empty($username) && empty($password)){
      echo "<br>enter username & password";
    } 
    elseif(empty($username) ){
      echo "<br>enter username ";
    } 
    elseif(empty($password)){
      echo "<br>enter password";
    }
    else{
      echo "<br>user {$username} loged in at {$date}";
      header("Location: ../panel/student_panel.html");
    }

    
  }

?>


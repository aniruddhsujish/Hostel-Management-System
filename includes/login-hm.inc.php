<?php
session_start();
if (isset($_POST['login-submit'])) {

  require 'config.inc.php';

  $username = $_POST['username'];
  $password = $_POST['pwd'];

  if (empty($username) || empty($password)) {
    echo"<script>alert('Input All Fields');window.location='../login-hostel_manager.php'</script>";
    exit();
  }
  else {
    $sql = "SELECT * FROM Hostel_Manager WHERE Username = '$username'";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result)){
      $pwdCheck =true;//password_verify($password, $row['Pwd']);;
      if($pwdCheck == false){

        echo"<script>alert('Incorrect Password');window.location='../login-hostel_manager.php'</script>";
        exit();
      }
      else if($pwdCheck == true) {

        //session_start();
        $_SESSION['hostel_man_id'] = $row['Hostel_man_id'];
        $_SESSION['fname'] = $row['Fname'];
        $_SESSION['lname'] = $row['Lname'];
        $_SESSION['mob_no'] = $row['Mob_no'];
        $_SESSION['username'] = $row['Username'];
        $_SESSION['hostel_id'] = $row['Hostel_id'];
        $_SESSION['isadmin'] = $row['Isadmin'];
        $_SESSION['PSWD'] = $row['Pwd'];
        $_SESSION['Mess_id'] = $row['Mess_id'];

        if($_SESSION['isadmin']==0){
          echo"<script>window.location='../home_manager.php'</script>";
        }
        else {
          echo"<script>window.location='../admin/admin_home.php'</script>";
        }
      }
      else {
        echo"<script>alert('Error Occured, Try Again');window.location='../login-hostel_manager.php'</script>";
        exit();
      }
    }
    else{
      echo"<script>alert('User does not exist. Sign up');window.location='../login-hostel_manager.php'</script>";
      exit();
    }
  }

}
else {
  echo"<script>window.location='../login-hostel_manager.php'</script>";
  exit();
}

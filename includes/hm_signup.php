<?php
session_start();
if (isset($_POST['hm_signup_submit'])) {

  require 'config.inc.php';

  $username= $_POST['hm_uname'];
  $fname = $_POST['hm_fname'];
  $lname = $_POST['hm_lname'];
  $mobile = $_POST['hm_mobile'];
  $hostel_name = $_POST['hostel_name'];
  $password = $_POST['pass'];
  $cnfpassword = $_POST['confpass'];


  if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
    echo"<script>alert('Incorrect Username');window.location='../admin/create_hm.php'</script>";
    exit();
  }
  else if($password !== $cnfpassword){
    echo"<script>alert('Entered passwords do not match');window.location='../admin/create_hm.php'</script>";
    exit();
  }
  else {

    $sql = "SELECT Username FROM Hostel_Manager WHERE Username=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      echo"<script>window.location='../admin/create_hm.php'</script>";
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        echo"<script>window.location='../admin/create_hm.php'</script>";
        exit();
      }
      else {

          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
          $sql = "SELECT *FROM Hostel WHERE Hostel_name = '$hostel_name'";
          $result = mysqli_query($conn, $sql);
          if($row = mysqli_fetch_assoc($result)){
            $HostelID = $row[Hostel_id];
            $zz = 0;
            $sql = "INSERT INTO Hostel_Manager (Username, Fname, Lname, Mob_no, Hostel_id, Mess_id, Pwd, Isadmin) VALUES ('$username', '$fname', '$lname', '$mobile', '$HostelID', '$HostelID', '$hashedPwd', '$zz')";
          $result = mysqli_query($conn, $sql);
          if($result){
            echo"<script>window.location='../admin/create_hm.php'</script>";
          }
          else {
            echo"<script>alert('Error Occured, Try Again.');window.location='../admin/create_hm.php'</script>";
          }
          }
          else {
            echo"<script>alert('Entered hostel does not exist.');window.location='../admin/create_hm.php'</script>";
            exit();
          }


      }
    }

  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

}
else {
  echo"<script>alert(' ');window.location='../admin/create_hm.php'</script>";
  //header("Location: ../admin/create_hm.php");
  exit();
}

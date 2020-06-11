<?php
session_start();


if (isset($_POST['hm_remove_submit'])) {

  require 'config.inc.php';

  $username = $_POST['hm_uname'];
  $hostel_name = $_POST['hostel_name'];
  $Adminpassword = $_POST['pass'];

  if (empty($username) || empty($hostel_name) || empty($Adminpassword)) {
    echo"<script>alert('Input all fields');window.location='../admin/create_hm.php'</script>";
    exit();
  }
    else {
      $sql = "SELECT *FROM Hostel_Manager WHERE Username = '$username'";
      $result = mysqli_query($conn, $sql);
      if($row = mysqli_fetch_assoc($result)){

      $sql2 = "SELECT *FROM Hostel WHERE Hostel_name = '$hostel_name'";
      $result2 = mysqli_query($conn, $sql2);
      if($row2 = mysqli_fetch_assoc($result2)){
        $HNO = $row2['Hostel_id'];
        if ($HNO == $row['Hostel_id']) {

          if($Adminpassword=='trial')
          $pwdCheck = true;
          else{
            $pwdCheck=false;
          }

          if ($pwdCheck==false) {
              echo"<script>alert('Incorrect Password');window.location='../admin/create_hm.php'</script>";
            exit();
          }
          else {
            $sql3 = "DELETE FROM Hostel_Manager WHERE Username = '$username'";
            $result3 = mysqli_query($conn, $sql3);
            if($result3){
                echo"<script>alert('Deletion Successful');window.location='../admin/create_hm.php'</script>";
              exit();
            }
            else {
              echo"<script>alert('Deletion Failed, Try Again');window.location='../admin/create_hm.php'</script>";
              exit();
            }
          }
        }
        else {
          echo"<script>alert('Incorrect Hostel');window.location='../admin/create_hm.php'</script>";
          exit();
        }
      }
      else {
        echo"<script>alert('Hostel enetered doesn't exist');window.location='../admin/create_hm.php'</script>";
        exit();
      }

      $pwdCheck = password_verify($password, $row['Pwd']);
      if($pwdCheck == false){
        echo"<script>alert('Incorrect Password');window.location='../index.php'</script>";
        exit();
      }
      else if($pwdCheck == true) {

        //session_start();
        $_SESSION['roll'] = $row['Student_id'];
        $_SESSION['fname'] = $row['Fname'];
        $_SESSION['lname'] = $row['Lname'];
        $_SESSION['mob_no'] = $row['Mob_no'];
        $_SESSION['department'] = $row['Dept'];
        $_SESSION['year_of_study'] = $row['Year_of_study'];
        $_SESSION['hostel_id'] = $row['Hostel_id'];
        $_SESSION['room_id'] = $row['Room_id'];
      }
      else {
        echo"<script>window.location='../index.php'</script>";
        exit();
      }
    }
    else{
      echo"<script>alert('Entered user does not exist');window.location='../admin/create_hm.php'</script>";
      exit();
    }
  }

}
else {
  echo"<script>window.location='../index.php'</script>";
  exit();
}

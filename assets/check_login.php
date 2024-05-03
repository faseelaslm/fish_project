<?php
// print_r($_POST);
// exit();
session_start();
if (isset($_POST['A_email'])) {
  include("condb.php");

  $A_email = $_POST['A_email'];
  $A_password = $_POST['A_password'];

  $sql = "SELECT * FROM admin_db 
  WHERE  A_email='" . $A_email . "' 
  AND  A_password='" . $A_password . "' ";
  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);

    $_SESSION["A_id"] = $row["A_id"];
    $_SESSION["A_email"] = $row["A_email"];
    $_SESSION["A_Firstname"] = $row["A_Firstname"];
    $_SESSION["A_Lastname"] = $row["A_Lastname"];


    if ($_SESSION["A_id"] != '') {

      Header("Location: admin/index.php");
    }
  } else {
    echo "<script>";
    echo "alert(\" E-mail หรือ  password ของคุณไม่ถูกต้อง\");";
    echo "window.history.back()";
    echo "</script>";
  }
} else {

  Header("Location: index.php"); //user & password incorrect back to login again

}

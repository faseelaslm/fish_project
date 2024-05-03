<?php session_start();
echo '<meta charset="utf-8">';
include('../config.php');
include('../condb.php');

$Aq_id = mysqli_real_escape_string($con, $_GET["ID"]); // แก้ตรงนี้เป็น $_GET["ID"]
$sql = "DELETE FROM tbl_aquatic WHERE Aq_id=$Aq_id"; // แก้ตรงนี้เป็น Aq_id
$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));
mysqli_close($con);

if ($result) {
    // ลบข้อมูลสำเร็จ
    echo "<script type='text/javascript'>";
    echo "window.location = 'aquatic.php'; ";
    echo "</script>";
} else {
    // ไม่สามารถลบข้อมูลได้
    echo "<script type='text/javascript'>";
    echo "alert('ไม่สามารถลบข้อมูลได้'); ";
    echo "window.location = 'aquatic.php'; ";
    echo "</script>";
}

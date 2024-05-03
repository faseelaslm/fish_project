<?php
session_start();
echo '<meta charset="utf-8">';
include('../condb.php');
include('../config.php');
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit();

$Aq_thainame = mysqli_real_escape_string($con, $_POST["Aq_thainame"]);
$Aq_engname = mysqli_real_escape_string($con, $_POST["Aq_engname"]);
$Aq_sciname = mysqli_real_escape_string($con, $_POST["Aq_sciname"]);
$Aq_family = mysqli_real_escape_string($con, $_POST["Aq_family"]);
$Aq_general = mysqli_real_escape_string($con, $_POST["Aq_general"]);
$Aq_origin = mysqli_real_escape_string($con, $_POST["Aq_origin"]);
$Aq_behavior = mysqli_real_escape_string($con, $_POST["Aq_behavior"]);
$Aq_food = mysqli_real_escape_string($con, $_POST["Aq_food"]);
$Aq_care = mysqli_real_escape_string($con, $_POST["Aq_care"]);
$Aq_status = mysqli_real_escape_string($con, $_POST["Aq_status"]);
$Aq_reproduction = mysqli_real_escape_string($con, $_POST["Aq_reproduction"]);

$Aq_Image = (isset($_POST['Aq_Image']) ? $_POST['Aq_Image'] : '');
$upload_image = $_FILES['Aq_Image']['name'];
if ($upload_image != '') {
    $path = "assets/img/";
    $type = strrchr($_FILES['Aq_Image']['name'], ".");
    $newname = uniqid() . $type;
    $path_copy = $path . $newname;
    $path_link = "assets/img/" . $newname;
    move_uploaded_file($_FILES['Aq_Image']['tmp_name'], $path_copy);
}

$Aq_qrcode = ''; // กำหนดค่าเริ่มต้นให้เป็นสตริงว่าง
$upload_qrcode = $_FILES['Aq_qrcode']['name'];
if (!empty($upload_qrcode)) {
    $path1 = "assets/qrcode/";
    $type1 = strrchr($_FILES['Aq_qrcode']['name'], ".");
    $newname1 = uniqid() . $type1;
    $path_copy1 = $path1 . $newname1;
    $path_link1 = "assets/qrcode/" . $newname1;
    move_uploaded_file($_FILES['Aq_qrcode']['tmp_name'], $path_copy1);
    $Aq_qrcode = $newname1; // ถ้ามีการอัปโหลดไฟล์ Qrcode ให้กำหนดค่าให้กับตัวแปร $Aq_qrcode
}

$Aq_vdo = mysqli_real_escape_string($con, $_POST["Aq_vdo"]);


$sql = "INSERT INTO tbl_aquatic
	(
    Aq_thainame,
    Aq_engname,
    Aq_sciname,
    Aq_family,
    Aq_general,
	Aq_origin,
	Aq_behavior,
    Aq_food,
	Aq_care,
    Aq_status,
	Aq_reproduction,
	Aq_Image,
    Aq_qrcode,
    Aq_vdo
	)
	VALUES
	(
	'$Aq_thainame',
    '$Aq_engname',
    '$Aq_sciname',
    '$Aq_family',
    '$Aq_general',
	'$Aq_origin',
	'$Aq_behavior',
	'$Aq_food',
	'$Aq_care',
	'$Aq_status',
    '$Aq_reproduction',
	'$newname',
    '$Aq_qrcode',
    '$Aq_vdo'
	)";

$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));

mysqli_close($con);


if ($result) {
    echo '<script>';
    echo "window.location='aquatic.php?do=success';";
    echo '</script>';
} else {
    echo '<script>';
    echo "window.location='aquatic.php?act=add&do=f';";
    echo '</script>';
}
?>
<?php include('import_script.php'); ?>
<?php include('footerjs.php'); ?>
<?php
session_start();
echo '<meta charset="utf-8">';
include('../condb.php');
include('../config.php');

$Aq_id = mysqli_real_escape_string($con, $_POST["Aq_id"]);
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
$Aq_qrcode = (isset($_POST['Aq_qrcode']) ? $_POST['Aq_qrcode'] : '');

$upload_image = $_FILES['Aq_Image']['name'];
$upload_qrcode = $_FILES['Aq_qrcode']['name'];


$newname = $Aq_Image;
$newname1 = $Aq_qrcode;

if ($upload_image != '') {
    $path = "assets/img/";
    $type = strrchr($_FILES['Aq_Image']['name'], ".");
    $newname = uniqid() . $type;
    $path_copy = $path . $newname;
    $path_link = "assets/img/" . $newname;
    move_uploaded_file($_FILES['Aq_Image']['tmp_name'], $path_copy);

    if (!empty($Aq_Image)) {
        $old_image_path = "assets/img/" . $Aq_Image;
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }
    }
}

if ($upload_qrcode != '') {
    $path1 = "assets/qrcode/";
    $type1 = strrchr($_FILES['Aq_qrcode']['name'], ".");
    $newname1 = uniqid() . $type1;
    $path_copy1 = $path1 . $newname1;
    $path_link1 = "assets/qrcode/" . $newname1;
    move_uploaded_file($_FILES['Aq_qrcode']['tmp_name'], $path_copy1);

    if (!empty($Aq_qrcode)) {
        $old_qrcode_path = "assets/qrcode/" . $Aq_qrcode;
        if (file_exists($old_qrcode_path)) {
            unlink($old_qrcode_path);
        }
    }
}

$Aq_vdo = mysqli_real_escape_string($con, $_POST["Aq_vdo"]);
$ID = mysqli_real_escape_string($con, $_POST["Aq_id"]);

$update_query = "";


if (!empty($ID)) {

    $update_query = "UPDATE tbl_aquatic SET Aq_vdo = '$Aq_vdo' WHERE Aq_id = $ID";
}


$Aq_qrcode = '';
if (isset($_POST['delete_qrcode']) && $_POST['delete_qrcode'] == '1') {
    if (!empty($Aq_qrcode)) {
        $old_qrcode_path = "assets/qrcode/" . $Aq_qrcode;
        if (file_exists($old_qrcode_path)) {
            unlink($old_qrcode_path);
        }
    }
    $newname1 = '';
}

$sql = "UPDATE tbl_aquatic SET
    Aq_thainame = '$Aq_thainame',
    Aq_engname = '$Aq_engname',
    Aq_sciname = '$Aq_sciname',
    Aq_family = '$Aq_family',
    Aq_general = '$Aq_general',
    Aq_origin = '$Aq_origin',
    Aq_behavior = '$Aq_behavior',
    Aq_food = '$Aq_food',
    Aq_care = '$Aq_care',
    Aq_status = '$Aq_status',
    Aq_reproduction = '$Aq_reproduction',
    Aq_Image = '$newname',
    Aq_qrcode = '$newname1',
    Aq_vdo = '$Aq_vdo'
WHERE Aq_id = $ID";



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

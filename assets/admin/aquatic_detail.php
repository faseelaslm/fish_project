<?php
session_start();
include('../config.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>รายละเอียดสัตว์น้ำ</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include('import_style.php'); ?>
    <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300&amp;subset=thai" rel="stylesheet">
</head>

<style>
    div.polaroid {
        width: 100%;
        background-color: white;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        margin-bottom: 25px;
    }

    div.container_di {
        text-align: center;
        padding: 10px 20px;
    }
</style>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
        <?php include('header.php'); ?>
        <?php include('menu_left.php'); ?>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    <i class="glyphicon glyphicon-list-alt hidden-xs"></i> <span class="hidden-xs">รายละเอียดสัตว์น้ำเพื่อการวิจัย</span>
                    <a href="aquatic.php?act=add" class="btn btn-primary btn-sm">เพิ่มข้อมูลสัตว์น้ำ</a>
                </h1>

            </section>
            <div class="container">
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="box-body">
                                            <?php
                                            if (isset($_GET['ID'])) {
                                                $Aq_id = $_GET['ID'];
                                                $sql = "SELECT * FROM tbl_aquatic WHERE Aq_id=$Aq_id";
                                                $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));
                                                $row = mysqli_fetch_assoc($result);

                                                if ($row) {
                                            ?>
                                                    <div class="box-body bg-white">
                                                        <div class="row">
                                                            <div class="container" align="center">
                                                                <div class="col-md-12">
                                                                    <div class="container" style="margin-top: 50px;">
                                                                        <div class="row">
                                                                            <div class="col-md-5">
                                                                                <div class="polaroid">
                                                                                    <?php echo "<img src='assets/img/" . $row['Aq_Image'] . "' width='100%'>"; ?>
                                                                                    <div class="container_di">
                                                                                        <p><b>ชื่อไทย : </b><?php echo $row["Aq_thainame"]; ?></p>
                                                                                        <p><b>ชื่ออังกฤษ : </b><?php echo $row["Aq_engname"]; ?></p>
                                                                                        <p><b>ชื่อวิทยาศาสตร์ : </b><i><?php echo $row["Aq_sciname"]; ?></i></p>
                                                                                    </div>
                                                                                    <div style="width: 100%;">
                                                                                        <p style="width: 100%;"><?php echo $row['Aq_vdo']; ?></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                            <div class="col-md-6" align="left">
                                                                                <p><b>ชื่อไทย : </b><?php echo $row["Aq_thainame"]; ?></b></p>
                                                                                <p><b>ชื่ออังกฤษ : </b><?php echo $row["Aq_engname"]; ?></b></p>
                                                                                <p><b>ชื่อวิทยาศาสตร์ : </b><i><?php echo $row["Aq_sciname"]; ?></i></b></p>
                                                                                <p><b>ชื่อวงศ์ตระกูล : </b><?php echo $row["Aq_family"]; ?></b></p>
                                                                                <p><b>ลักษณะทั่วไป : </b><?php echo $row["Aq_general"]; ?></p>
                                                                                <p><b>พฤติกรรมของสัตว์น้ำ : </b><?php echo $row["Aq_behavior"]; ?></p>
                                                                                <p><b>ถิ่นกำเนิด : </b><?php echo $row["Aq_origin"]; ?></p>
                                                                                <p><b>อาหารการกิน : </b><?php echo $row["Aq_food"]; ?></p>
                                                                                <p><b>การเลี้ยงดู : </b><?php echo $row["Aq_care"]; ?></p>
                                                                                <p><b>การสืบพันธุ์ : </b><?php echo $row["Aq_reproduction"]; ?></p>
                                                                                <p><b>สถานภาพ : </b><?php echo $row["Aq_status"]; ?></p>
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-md-4">
                                                                            <?php
                                                                            if (!empty($row['Aq_qrcode'])) {
                                                                                echo "<div class='polaroid'>";
                                                                                echo "<img src='assets/qrcode/" . $row['Aq_qrcode'] . "' width='100%'>";
                                                                                echo "<div class='container_di'>";
                                                                                echo "<p><b>QRCODE AR <br>" . $row["Aq_thainame"] . "</p>";
                                                                                echo "<script type='text/javascript' src='//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5500ee80057fdb99'></script>";
                                                                                echo "<div class='addthis_inline_share_toolbox_sf2w' style='margin-left: auto; margin-right: auto;'></div>";
                                                                                echo "</div></div>";
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br><br>
                                                                <td style='text-align: center;'>
                                                                    <a href='aquatic.php' class='btn btn-primary btn-lg'>
                                                                        <span class='glyphicon glyphicon-arrow-left'></span> ย้อนกลับ
                                                                    </a>
                                                                    <a href='aquatic.php?act=edit&ID=<?php echo $row['Aq_id']; ?>' class='btn btn-warning btn-lg'>
                                                                        <span class='glyphicon glyphicon-edit'></span> แก้ไข
                                                                    </a>
                                                                    <a href='aquatic_del_db.php?ID=<?php echo $row['Aq_id']; ?>' onclick="return confirm('ยันยันการลบ')" class='btn btn-danger btn-lg'>
                                                                        <span class='glyphicon glyphicon-trash'></span> ลบ
                                                                    </a>

                                                                </td>

                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>
                                    </div>
                </section>
        <?php
                                                } else {
                                                    echo "ไม่พบข้อมูลสัตว์น้ำที่คุณค้นหา";
                                                }
                                            } else {
                                                echo "ไม่พบ ID ของสัตว์น้ำที่ต้องการดูรายละเอียด";
                                            }
        ?>
            </div>
        </div>
    </div>
</body>

</html>
<?php include('import_script.php'); ?>
<?php include('footerjs.php'); ?>
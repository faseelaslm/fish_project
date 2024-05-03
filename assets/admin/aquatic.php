
<?php session_start();
include('../config.php');
$sql = "SELECT * FROM tbl_aquatic ORDER BY Aq_id ASC";
$query = mysqli_query($connection, $sql);
// echo $sql;
// exit();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ระบบสัตว์น้ำเพื่อการวิจัย</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include('import_style.php'); ?>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300&amp;subset=thai" rel="stylesheet">
</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

        <?php include('header.php'); ?>

        <?php include('menu_left.php'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <?php
            include('menu_main.php');
            ?>
            <section class="content-header">
                <h1>
                    <i class="glyphicon glyphicon-list-alt hidden-xs"></i> <span class="hidden-xs">ข้อมูลสัตว์น้ำเพื่อการวิจัย</span>
                    <a href="aquatic.php?act=add" class="btn btn-primary btn-sm">เพิ่มข้อมูลสัตว์น้ำ</a>
                </h1>
            </section>

            <!-- Main content -->
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="box-body">
                                        <?php
                                        $act = (isset($_GET['act']) ? $_GET['act'] : '');
                                        if ($act == 'add') {
                                            include('aquatic_form_add.php');
                                        } elseif ($act == 'edit') {
                                            include('aquatic_form_edit.php');
                                        } else {
                                            include('aquatic_list.php');
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</body>

</html>
<?php include('import_script.php'); ?>
<?php include('footerjs.php'); ?>
</body>

</html>
<?php
mysqli_close($connection);
?>
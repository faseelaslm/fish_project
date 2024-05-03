<?php session_start();
include('../condb.php');
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
  <?php include('import_style.php');?>

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

      <!-- Main content -->
      <section class="content">
        <!--เนื้อหา-->

        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header text-center bg-blue">
                <h3 class="box-title">ข้อมูลประจำตัวผู้ใช้งาน</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-3"></div>
                  <form method="post">
                    <div class="col-md-6" align="center">
                      <h5>ชื่อ - นามสกุล : <?php echo $A_Firstname; ?> <?php echo $A_Lastname; ?>
                      <hr><h5>E-mail : <?php echo $A_email; ?>
                        <hr>ระดับสิทธิ์การใช้งาน : admin
                      </h5>
                    </div>
                    <div class="col-md-3"></div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->

        </div> <!-- ./row-->

        <!--ปิดเนื้อหา-->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include('footerjs.php'); ?>


    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <?php include('import_script.php'); ?>
</body>

</html>
<?php
mysqli_close($connection);
?>


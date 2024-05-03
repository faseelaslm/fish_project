<?php
include('head.php');
include('condb.php');
$Aq_id = $_GET["id"];
?>
<!DOCTYPE html>

<head>
    <title>ระบบสัตว์น้ำเพื่อการวิจัย</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> -->

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
</head>

<body>

    <!-- <div class="container"> -->
    <?php include('navbar.php'); ?>
    <div class="row">

        <?php
        $sql = "SELECT * FROM tbl_aquatic AS a
        WHERE Aq_id=$Aq_id";

        $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));
        $row = mysqli_fetch_array($result);

        ?>
        <div class="container" align="center">
            <div class="col-md-12">
                <div class="container" style="margin-top: 50px;">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="polaroid">
                                <?php echo "<img src='admin/assets/img/" . $row['Aq_Image'] . "'width='100%'>"; ?>
                                <div class="container_di">
                                    <p><b>ชื่อไทย : </b><?php echo $row["Aq_thainame"]; ?></p>
                                    <p><b>ชื่ออังกฤษ : </b><?php echo $row["Aq_engname"]; ?></p>
                                    <p><b>ชื่อวิทยาศาสตร์ : </b><i><?php echo $row["Aq_sciname"]; ?></i></p>
                                </div>

                                <div>
                                    <p style="width: 100%;"><?php echo $row['Aq_vdo']; ?></p>
                                </div>

                            </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="col-md-6" align="left">
                            <p><b> ชื่อไทย : </b><?php echo $row["Aq_thainame"]; ?></b></p>
                            <p><b> ชื่ออังกฤษ : </b><?php echo $row["Aq_engname"]; ?></b></p>
                            <p><b> ชื่อวิทยาศาสตร์ : </b><i><?php echo $row["Aq_sciname"]; ?></i></b></p>
                            <p><b> ชื่อวงศ์ตระกูล : </b><?php echo $row["Aq_family"]; ?></b></p>
                            <p>
                                <b>ลักษณะทั่วไป : </b><?php echo $row["Aq_general"]; ?>
                            </p>
                            <p>
                                <b>พฤติกรรมของสัตว์น้ำ : </b><?php echo $row["Aq_behavior"]; ?>
                            </p>
                            <p>
                                <b>ถิ่นกำเนิด : </b><?php echo $row["Aq_origin"]; ?>
                            </p>
                            <p>
                                <b>อาหารการกิน : </b><?php echo $row["Aq_food"]; ?>
                            </p>
                            <p>
                                <b>การเลี้ยงดู : </b><?php echo $row["Aq_care"]; ?>
                            </p>
                            <p>
                                <b>การสืบพันธุ์ : </b><?php echo $row["Aq_reproduction"]; ?>
                            </p>
                            <p>
                                <b>สถานภาพ : </b><?php echo $row["Aq_status"]; ?>
                            </p>
                        </div>
                        <div class="container" style="margin-left: auto; margin-right: auto;" align="center">
                            <div class="row">
                                <div class="col-md-4">
                                    <?php
                                    if (!empty($row['Aq_qrcode'])) {
                                        echo "<div class='polaroid'>";
                                        echo "<img src='admin/assets/qrcode/" . $row['Aq_qrcode'] . "' width='100%'>";
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
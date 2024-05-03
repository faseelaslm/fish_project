<?php include('head.php'); ?>
<?php include('navbar.php'); ?><br>

<body>
    <?php include('search_tem.php'); ?>
    <br>

    <div class="col-md-0">
        <?php
        include('condb.php');



        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $search_query = mysqli_real_escape_string($con, $_POST["search"]);

            $sql = "SELECT * FROM tbl_aquatic 
            WHERE tbl_aquatic.Aq_thainame LIKE '%$search_query%'
            OR tbl_aquatic.Aq_engname LIKE '%$search_query%'
            OR tbl_aquatic.Aq_sciname LIKE '%$search_query%'
            OR tbl_aquatic.Aq_family LIKE '%$search_query%'
            OR tbl_aquatic.Aq_general LIKE '%$search_query%'
            OR tbl_aquatic.Aq_origin LIKE '%$search_query%'
            OR tbl_aquatic.Aq_food LIKE '%$search_query%'
            OR tbl_aquatic.Aq_status LIKE '%$search_query%'  
            OR tbl_aquatic.Aq_behavior LIKE '%$search_query%'
            OR tbl_aquatic.Aq_care LIKE '%$search_query%'
            OR tbl_aquatic.Aq_reproduction LIKE '%$search_query%'";

            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '<div class="container">';
                echo '<div class="row">';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-md-3 mb-4">';
                    echo '<div class="card bg-light">';
                    echo '<img src="admin/assets/img/' . $row['Aq_Image'] . '" class="card-img-top" alt="...">';
                    echo '<div class="card-body">';
                    echo '<h6 class="card-title"><b>ชื่อไทย : </b>' . $row['Aq_thainame'] . '</h6>';
                    echo '<h6 class="card-text"><b>ชื่ออังกฤษ : </b>' . $row['Aq_engname'] . '</h6>';
                    echo '<h6 class="card-text"><b>ชื่อวิทยาศาสตร์ : </b><i>' . $row['Aq_sciname'] . '</i></h6>';
                    echo '<br/>';
                    echo '<a href="detail_aquatic.php?id=' . $row['Aq_id'] . '" class="btn btn-primary">ดูรายละเอียด</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
                echo '</div>';
            } else {
                echo '<div class="alert alert-warning text-center" role="alert">';
                echo 'ไม่พบข้อมูลที่ค้นหา';
                echo '</div>';
                // echo '<center><div class="col-md-6"><button class="btn btn-info btn-block" onclick="reloadPage()">ค้นหาอีกครั้ง</button></div></center>';
                echo '<script>window.location.href = "index.php";</script>';
                exit;
            }
        }
        ?>
        <style>
            .card {
                min-height: 365px;
                min-width: 280px;
            }

            .card-img-top {
                width: 100%;
                height: 200px;
                object-fit: cover;
            }

      
            @media (max-width: 576px) {
                .col-md-3 {
                    flex: 0 0 100%;
                    max-width: 100%;
                }
            }

    
            @media (max-width: 1200px) {
                .card {
                    min-height: 350px;
                    min-width: 250px;
                }

                .card-img-top {
                    height: 150px;
                }
            }

         
            @media (min-width: 577px) and (max-width: 991px) {
                .col-md-3 {
                    flex: 0 0 50%;
                    max-width: 50%;
                }
            }

            @media (min-width: 992px) {
                .col-md-3 {
                    flex: 0 0 33.333%;
                    max-width: 33.333%;
                }
            }
        </style>
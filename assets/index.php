<?php include('head.php'); ?>
<?php include('navbar.php'); ?>
<br>

<body>
    <?php include('search_tem.php'); ?>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $act = (isset($_GET['act']) ? $_GET['act'] : '');
                if ($act == 'search') {
                    include('search_aquatic.php');
                } else {
                    include('show_aquatic.php');
                }
                ?>
            </div>
        </div>
    </div>

</body>


<?php include('footer.php'); ?>


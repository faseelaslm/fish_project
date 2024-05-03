<?php include('head.php'); ?>
<?php include('navbar.php'); ?>

<body>
    <section class="py-5">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center h-100">
                <div class="card col-md-4 my-auto shadow">
                    <div class="text-center card-body">
                        <img src="assets/logo2.png" alt="..." width="100%" height="">
                        <br><br>
                        <h4>สำหรับเจ้าหน้าที่</h4>
                    </div>
                    <div class="card-body">
                        <form action="check_login.php" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="A_email" />
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" name="A_password" />
                            </div>
                            <br>
                            <input type="submit" class="btn btn-primary w-100" value="LOGIN" name="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php include('footer.php'); ?>
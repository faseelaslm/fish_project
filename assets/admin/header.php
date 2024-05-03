<?php session_start();
include('../config.php');
include('../condb.php');

?>
<header class="main-header">
  <!-- Logo 50x50 pixels -->
  <a href="#" class="logo">
    <span class="logo-mini"><b>AD</b></span>
    <span class="logo-lg"><b>Admin</b></span>
  </a>

  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    </a>
    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="index.php"> ระบบข้อมูลสัตว์น้ำเพื่อการวิจัย </a></li>


      </ul>
      </li>

      </ul>
    </div>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="img-member/14072019286626112.png" class="user-image" alt="User Image">
            <span class="hidden-xs">ยินดีต้อนรับ : <?php echo $A_Firstname; ?> </span>
            <!-- <span class="fa fa-angle-double-down" style="padding-left: 20px;"></span> -->
          </a>
        </li>
        <li class="header">
          <a href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่ ?');"><span class="fa fa-power-off">
              <span> ออกจากระบบ</span>
          </a>
        </li>
      </ul>


    </div>
  </nav>
</header>
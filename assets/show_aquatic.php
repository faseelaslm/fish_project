<?php include('head.php'); ?>
<style>
  .card {
    min-height: 365px;
    min-width: 300px;
  }

  .card-img-top {
    width: 100%;
    height: 225px;
    object-fit: cover;
  }

  @media (max-width: 576px) {
    .col-md-3 {
      flex: 0 0 100%;
      max-width: 100%;
    }
  }

  @media (max-width: 991px) {
    .col-md-3 {
      flex: 0 0 50%;
      max-width: 50%;
    }

    .card {
      min-height: 350px;
      min-width: 250px;
    }

    .card-img-top {
      height: 150px;
    }
  }

  @media (min-width: 992px) {
    .col-md-3 {
      flex: 0 0 33.333%;
      max-width: 33.333%;
    }
  }

  @media (max-width: 768px) {
    .col-md-3 {
      flex: 0 0 100%;
      max-width: 100%;
    }
  }
</style>

<?php
require_once('condb.php');
$query_aquatic = "SELECT * FROM tbl_aquatic AS a
ORDER BY a.Aq_id ASC";
$result_project = mysqli_query($con, $query_aquatic) or die("Error in query: $query_aquatic " . mysqli_error($con));
?>

<div class="container">
  <div class="row">
    <?php foreach ($result_project as $row_project) { ?>
      <div class="col-md-3 col-sm-6 mb-4">
        <div class="card bg-light">
          <img src="admin/assets/img/<?php echo $row_project['Aq_Image']; ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h6 class="card-title"><b>ชื่อไทย : </b><?php echo $row_project['Aq_thainame']; ?></h6>
            <h6 class="card-text"><b>ชื่ออังกฤษ : </b><?php echo $row_project['Aq_engname']; ?></h6>
            <h6 class="card-text"><b>ชื่อวิทยาศาสตร์ : </b><i><?php echo $row_project['Aq_sciname']; ?></i></h6>
            <?php echo "<br/>"; ?>
            <a href="detail_aquatic.php?id=<?php echo $row_project['Aq_id'] ?>" class="btn btn-primary">ดูรายละเอียด</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

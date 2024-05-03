<?php
if (@$_GET['do'] == 'success') {
    echo '<script type="text/javascript">
          swal("", "ทำรายการสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=aquatic.php" />';
} else if (@$_GET['do'] == 'finish') {
    echo '<script type="text/javascript">
          swal("", "แก้ไขสำเร็จ !!", "success");
          </script>';
    echo '<meta http-equiv="refresh" content="1;url=aquatic.php" />';
}

$query = "SELECT *
          FROM tbl_aquatic AS a
          ORDER BY a.Aq_id DESC";

$result = mysqli_query($con, $query);
echo ' <table id="example1" class="table table-bordered table-striped">';
echo "<thead>";
echo "<tr class=''>
      <th width='2%'  class='hidden-xs' style='text-align: center;'>ลำดับ</th>
      <th width='8%' class='hidden-xs' style='text-align: center;'>รูป</th>
       <th width='10%' style='text-align: center;'>ชื่อไทย</th>
       <th width='15%' style='text-align: center;'>ชื่ออังกฤษ</th>
       <th width='18%' style='text-align: center;'>ชื่อทางวิทยาสาสตร์</th>
       <th width='15%' style='text-align: center;'>วงศ์ตระกูล</th>
       <th width='10%' class='hidden-xs' style='text-align: center;'>ดูรายละเอียด</th>
      <th width='6%' style='text-align: center;'>-</th>
    </tr>";

echo "</thead>";


$row_number = 0;

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";

    $row_number++;

    echo "<td class='hidden-xs' style='text-align: center;'>" . $row_number . "</td> "; // แสดงลำดับ

    echo "<td class='hidden-xs'><img src='assets/img/" . $row['Aq_Image'] . "' width='100%'></td>";

    echo "<td><b>ชื่อไทย : </b>" . $row["Aq_thainame"] . "</td>";

    echo "<td><b>ชื่ออังกฤษ : </b>" . $row["Aq_engname"] . "</font>" . "</td>";

    echo "<td><b>ชื่อวิทยาศาสตร์ : </b><i>" . $row["Aq_sciname"] . "</i></td>";

    echo "<td><b>วงศ์ตระกูล : </b>" . $row["Aq_family"] . "</font>" . "</td>";

    echo "<td style='text-align: center;'><a href='aquatic_detail.php?act=view&ID=$row[Aq_id]' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-eye-open'></span> ดูรายละเอียด</a></td>";

    echo "<td style='text-align: center;'><a href='aquatic.php?act=edit&ID=$row[Aq_id]' class='btn btn-warning btn-xs'><span class='glyphicon glyphicon-edit'></span></a> 
            <a href='aquatic_del_db.php?ID=$row[Aq_id]' onclick=\"return confirm('ยันยันการลบ')\" class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash'></span></a>        
        </td>";
}

echo "</table>";
mysqli_close($con);




?>


<?php include('import_script.php'); ?>
<?php include('footerjs.php'); ?>
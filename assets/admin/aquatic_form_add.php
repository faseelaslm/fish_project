
<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  function readURL(input, imageId) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#' + imageId).attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<?php
if (@$_GET['do'] == 'f') {
  echo '<script type="text/javascript">
            swal("", "กรุณาใส่ข้อมูลให้ถูกต้อง !!", "warning");
            </script>';
  echo '<meta http-equiv="refresh" content="2;url=durable.php?act=add" />';
} elseif (@$_GET['do'] == 'd') {
  echo '<script type="text/javascript">
            swal("", "เลขครุภัณฑ์ซ้ำ กรุณาเปลี่ยน  !!", "error");
            </script>';
  echo '<meta http-equiv="refresh" content="1;url=durable.php?act=add" />';
}
?>

<form action="aquatic_form_add_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
    <div class="form-group">
      <div class="col-sm-2 control-label">
        ชื่อไทย :
      </div>
      <div class="col-sm-3">
        <input type="text" name="Aq_thainame" required class="form-control">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-2 control-label">
        ชื่ออังกฤษ :
      </div>
      <div class="col-sm-3">
        <input type="text" name="Aq_engname" required class="form-control">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-2 control-label">
        ชื่อวิทยาศาสตร์ :
      </div>
      <div class="col-sm-3">
        <input type="text" name="Aq_sciname" required class="form-control">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-2 control-label">
        ชื่อวงศ์ตระกูล :
      </div>
      <div class="col-sm-3">
        <input type="text" name="Aq_family" required class="form-control">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-2 control-label">
        ลักษณะ :
      </div>
      <div class="col-sm-3">
        <textarea name="Aq_general" rows="15" cols="80"></textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-2 control-label">
        ถิ่นกำเนิด :
      </div>
      <div class="col-sm-3">
        <textarea name="Aq_origin" cols="80"></textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-2 control-label">
        พฤติกรรมของสัตว์น้ำ :
      </div>
      <div class="col-sm-3">
        <textarea name="Aq_behavior" cols="80"></textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-2 control-label">
        อาหารการกิน :
      </div>
      <div class="col-sm-3">
        <textarea name="Aq_food" cols="80"></textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-2 control-label">
        การดูแล :
      </div>
      <div class="col-sm-3">
        <textarea name="Aq_care" rows="15" cols="80"></textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-2 control-label">
        สถานภาพ :
      </div>
      <div class="col-sm-3">
        <textarea name="Aq_status" cols="80"></textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-2 control-label">
        การสืบพันธุ์ :
      </div>
      <div class="col-sm-3">
        <textarea name="Aq_reproduction" rows="5" cols="80"></textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-2 control-label">
        วีดีโอสัตว์น้ำ (ลิงก์ YouTube) :
      </div>
      <div class="col-sm-3">
        <textarea name="Aq_vdo" rows="3" cols="80"></textarea>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-2 control-label">
        รูปภาพสัตว์น้ำ:
      </div>
      <div class="col-sm-4">
        <input type="file" name="Aq_Image" required class="form-control" accept="image/*" onchange="readURL(this, 'image1');" />
        <img id="image1" src="#" alt="" width="250" class="img-rounded" style="margin-top: 10px;">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-2 control-label">
        AR QRCode:
      </div>
      <div class="col-sm-4">
        <input type="file" name="Aq_qrcode" class="form-control" accept="image/*" onchange="readURL(this, 'image2');" />
        <img id="image2" src="#" alt="" width="250" class="img-rounded" style="margin-top: 10px;">
      </div>
    </div>


    <div class="form-group">
      <div class="col-sm-2">
      </div>
      <div class="col-sm-3">
        <button type="submit" class="btn btn-success">เพิ่มข้อมูล</button>
        <a href="aquatic.php" class="btn btn-danger">ยกเลิก</a>
      </div>
    </div>
</form>
<?php include('import_script.php'); ?>
<?php include('footerjs.php'); ?>
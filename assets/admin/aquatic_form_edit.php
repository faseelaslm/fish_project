<?php
$ID = mysqli_real_escape_string($con, $_GET['ID']);
$sql = "SELECT * FROM tbl_aquatic AS a
WHERE a.Aq_id=$ID
ORDER BY a.Aq_id DESC";


$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error($con));
$row = mysqli_fetch_array($result);



?>
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

    function readURL(input, imgId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#' + imgId).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<form action="aquatic_form_edit_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
        <div class="form-group">
            <div class="col-sm-2 control-label">
                ชื่อไทย :
            </div>
            <div class="col-sm-3">
                <input type="text" name="Aq_thainame" required class="form-control" value="<?php echo $row['Aq_thainame']; ?>">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label">
                ชื่ออังกฤษ :
            </div>
            <div class="col-sm-3">
                <input type="text" name="Aq_engname" required class="form-control" value="<?php echo $row['Aq_engname']; ?>">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label">
                ชื่อวิทยาศาสตร์ :
            </div>
            <div class="col-sm-3">
                <input type="text" name="Aq_sciname" required class="form-control" value="<?php echo $row['Aq_sciname']; ?>">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label">
                ชื่อวงศ์ตระกูล :
            </div>
            <div class="col-sm-3">
                <input type="text" name="Aq_family" required class="form-control" value="<?php echo $row['Aq_family']; ?>">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label">
                ลักษณะ :
            </div>
            <div class="col-sm-3">
                <textarea name="Aq_general" rows="15" cols="80"><?php echo $row['Aq_general']; ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label">
                ถิ่นกำเนิด :
            </div>
            <div class="col-sm-3">
                <textarea name="Aq_origin" cols="80"><?php echo $row['Aq_origin']; ?></textarea>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-2 control-label">
                พฤติกรรมของสัตว์น้ำ :
            </div>
            <div class="col-sm-3">
                <textarea name="Aq_behavior" cols="80"><?php echo $row['Aq_behavior']; ?></textarea></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label">
                อาหารการกิน :
            </div>
            <div class="col-sm-3">
                <textarea name="Aq_food" cols="80"><?php echo $row['Aq_food']; ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label">
                การดูแล :
            </div>
            <div class="col-sm-3">
                <textarea name="Aq_care" rows="15" cols="80"><?php echo $row['Aq_care']; ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label">
                สถานภาพ :
            </div>
            <div class="col-sm-3">
                <textarea name="Aq_status" cols="80"><?php echo $row['Aq_status']; ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label">
                การสืบพันธุ์ :
            </div>
            <div class="col-sm-3">
                <textarea name="Aq_reproduction" rows="5" cols="80"><?php echo $row['Aq_reproduction']; ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label">
                วีดีโอสัตว์น้ำ (ลิงก์ YouTube) :
            </div>
            <div class="col-sm-3">
                <textarea name="Aq_vdo" rows="3" cols="80"><?php echo $row['Aq_vdo']; ?></textarea>
            </div>
        </div>



        <div class="form-group">
            <div class="col-sm-2 control-label">
                รูปภาพสัตว์น้ำ :
            </div>
            <div class="col-sm-4">
                รูปเก่า <br>
                <img src="assets/img/<?php echo $row['Aq_Image']; ?>" width="200px">
                <br>
                <input type="file" id="Aq_Image" name="Aq_Image" class="form-control" accept="image/*" onchange="readURL(this, 'blah1');" />
                <img id="blah1" src="#" alt="" width="250" class="img-rounded" / style="margin-top: 10px;">

            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2 control-label">
                AR QRCODE :
            </div>
            <div class="col-sm-4">
                รูปเก่า <br>
                <img src="assets/qrcode/<?php echo $row['Aq_qrcode']; ?>" width="200px">
                <br>
                <label>
                    <input type="checkbox" name="delete_qrcode" value="1"> ลบ QR code เก่า
                </label>
                <input type="file" id="Aq_qrcode" name="Aq_qrcode" class="form-control" accept="image/*" onchange="readURL(this, 'blah2');" />
                <img id="blah2" src="#" alt="" width="250" class="img-rounded" / style="margin-top: 10px;">

            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-3">
                <input type="hidden" name="Aq_Image" value="<?php echo $row['Aq_Image']; ?>">
                <input type="hidden" name="Aq_qrcode" value="<?php echo $row['Aq_qrcode']; ?>">
                <input type="hidden" name="Aq_id" value="<?php echo $ID; ?>" />
                <button type="submit" class="btn btn-success">แก้ไขข้อมูล</button>
                <a href="aquatic.php" class="btn btn-danger">ยกเลิก</a>
            </div>
        </div>
</form>

<?php include('import_script.php'); ?>
<?php include('footerjs.php'); ?>
<?php
include('../ketnoi.php');
$sql1 = "SELECT * FROM tacgia";
$r = mysqli_query($conn, $sql1);
$sql2 = "SELECT * FROM theloai";
$t = mysqli_query($conn, $sql2);
$sql3 = "SELECT * FROM nhaxuatban";
$y = mysqli_query($conn, $sql3);
if (isset($_POST["btnSave"]))
{
    $masach = $_POST["masach"];
    $tensach = $_POST["tensach"];
    $matacgia = $_POST["matacgia"];
    $matheloai = $_POST["matheloai"];
    $manhaxuatban = $_POST["manhaxuatban"];
    $sotrang = $_POST["sotrang"];
    $trangthai = $_POST["trangthai"];
    $target_dir = "../images/";
    $file_name = $_FILES['hinhanh']["name"];
    $target_file = $target_dir . basename($file_name);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file);
    $gioithieu = $_POST["gioithieu"];
    $sql = "INSERT INTO sach VALUES ('$masach','$tensach','$matacgia','$matheloai','$manhaxuatban', '$sotrang', '$trangthai', '$file_name', '$gioithieu')";
    if (mysqli_query($conn, $sql)){
    header('location: danhsachsach.php');
}
else{
    $result = "Lỗi thêm mới" . mysqli_error($conn);
}
}
mysqli_close($conn);
?>
<?php
include('menu.php');
?>
  </aside>
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách sách</li>
        <li class="breadcrumb-item"><a href="#">Thêm sách</a></li>
      </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <form class="row" method="post" enctype="multipart/form-data">
<input type="hidden" ame = "masach" id = "masach" value = "">

<div class="form-group  col-md-4">
    <label for="tensach">Tên sách:</label>
    <input type = "text" name = "tensach" id = "tensach" value = "" class="form-control">
</div>
<div class="form-group  col-md-4">
    <label for="matacgia">Mã tác giả:</label>
    <select id = "matacgia" name = "matacgia" class="form-control">
    <?php
        while($s = mysqli_fetch_array($r)){
            ?>
            <option><?php echo $s['matacgia']; ?>. <?php echo $s['tentacgia']; ?></option>
        <?php
        }
        ?>
    </select>
</div>
<div class="form-group  col-md-4">
    <label for="matheloai">Mã thể loại:</label>
    <select name = "matheloai" id = "matheloai" class="form-control">
    <?php
        while($s = mysqli_fetch_array($t)){
            ?>
            <option><?php echo $s['matheloai']; ?>. <?php echo $s['tentheloai']; ?></option>
        <?php
        }
        ?>
    </select>
</div>
<div class="form-group  col-md-4">
    <label for="manhaxuatban">Mã xuất bản:</label>
    <select name = "manhaxuatban" id = "manhaxuatban" class="form-control">
    <?php
        while($s = mysqli_fetch_array($y)){
            ?>
            <option><?php echo $s['manhaxuatban']; ?>. <?php echo $s['tennhaxuatban']; ?></option>
            
        <?php
        }
        ?>
    </select>
</div>
<div class="form-group  col-md-4">
    <label for="sotrang">Số trang:</label>
    <input type = "text" name = "sotrang" id = "sotrang" value = ""  class="form-control"></td>
</div>
<div class="form-group  col-md-4">
    <label for="trangthai">Trạng thái</label>
            <select name = "trangthai" class="form-control" id="trangthai" value="">
              <option>Còn</option>
              <option>Hết</option>
              <option>Chờ bổ sung</option>
            </select>
</div>
<div class="form-group  col-md-4">
    <label for="hinhanh">Hình ảnh:</label>
    <input type = "file" id = "hinhanh" name = "hinhanh" value = "" size = "30" class="form-control" ></td>
</div>
<div class="form-group col-md-4">
    <label for="gioithieu">Giới thiệu:</label>
    <input type = "text" name = "gioithieu" id = "gioithieu" value = "" class="form-control">
</div>

    <input type="submit" id = "btn" name = "btnSave" value="Thêm tác giả" class="btn-primary btn btn-block">
    <a class="btn btn-cancel" data-dismiss="modal" href="danhsachsach.php">Hủy bỏ</a>
                </form>
            </div>
        </div>
     
    </div>
</body>
</html>
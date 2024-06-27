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
            $sql = "UPDATE sach SET tensach ='$tensach', matacgia='$matacgia', matheloai='$matheloai', manhaxuatban='$manhaxuatban', sotrang='$sotrang', hinhanh ='$file_name', trangthai='$trangthai', gioithieu='$gioithieu' WHERE masach = '$masach' ";
            if (mysqli_query($conn, $sql)){
             header('location:danhsachsach.php');
        }
        else{
            $result = "Cập nhật không thành công" . mysqli_error($conn);
        }
        }
        $masach = $_GET["masach"];
        $sql = "SELECT * FROM sach WHERE masach = '$masach'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $masach = $row["masach"];
        $tensach = $row["tensach"];
        $matacgia = $row["matacgia"];
        $matheloai = $row["matheloai"];
        $manhaxuatban = $row["manhaxuatban"];
        $sotrang = $row["sotrang"];
        $trangthai = $row["trangthai"];
        $hinhanh = $row["hinhanh"];
        $gioithieu = $row["gioithieu"];
    }
    
?>
<?php
include("menu.php");
?>
  </aside>
    <main class="app-content">
      <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item">Danh sách sách</li>
          <li class="breadcrumb-item"><a href="#">Sửa sách</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <form class="row" method="post" enctype="multipart/form-data">
                <input type="hidden" name="masach" value="<?php echo $masach; ?>">

<div class="form-group  col-md-4">
    <label for="tensach">Tên sách:</label>
    <input type = "text" name = "tensach" value = "<?php echo $tensach ?>" class="form-control">
</div>
<div class="form-group  col-md-4">
    <label for="matacgia">Mã tác giả:</label>
    <select name = "matacgia" class="form-control">
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
    <select name = "matheloai" class="form-control">
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
    <select name = "manhaxuatban" class="form-control">
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
    <input type = "text" name = "sotrang" value = "<?php echo $sotrang?>"  class="form-control"></td>
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
    <input type = "file" id = "hinhanh" name = "hinhanh" value = "<?php echo $hinhanh?>" size = "30" class="form-control" ></td>
</div>
<div class="form-group col-md-4">
    <label for="gioithieu">Giới thiệu:</label>
    <input type = "text" name = "gioithieu" value = "<?php echo $gioithieu?>" class="form-control">
</div>
<input type="submit" id = "btn" name = "btnSave" value="Lưu" class="btn-primary btn btn-block">
    <a class="btn btn-cancel" data-dismiss="modal" href="danhsachsach.php">Hủy bỏ</a>
                </form>
            </div>
        </div>
     
    </div>
</body>
</html>
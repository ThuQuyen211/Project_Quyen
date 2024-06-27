<?php
include('../ketnoi.php');
if (isset($_POST["btnSave"]))
{
    $matacgia = $_POST["matacgia"];
    $tentacgia = $_POST["tentacgia"];
    $namsinh = $_POST["namsinh"];
    $target_dir = "../images/";
    $file_name = $_FILES['hinhanh']["name"];
    $target_file = $target_dir . basename($file_name);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file);
    $ghichu = $_POST["ghichu"];
    $sql = "INSERT INTO tacgia VALUES ('$matacgia','$tentacgia','$namsinh','$file_name','$ghichu')";
    if (mysqli_query($conn, $sql)){
    header('location: danhsachtacgia.php');
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
        <li class="breadcrumb-item">Danh sách tác giả</li>
        <li class="breadcrumb-item"><a href="#">Thêm tác giả</a></li>
      </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <form class="row" method="post" enctype="multipart/form-data">

<input type="hidden" id="matacgia" name = "matacgia" value = "">

<div class="form-group  col-md-4">
    <label for="tentacgia">Tên tác giả: </label>
    <input type = "text" id="tentacgia" name = "tentacgia" value = "" class="form-control">
</div>
<div class="form-group  col-md-4">
    <label for="namsinh">Năm sinh: </label>
    <input type="year" class="form-control" name="namsinh" value = "" class="form-control">
</div>
<div class="form-group  col-md-4">
    <label for="hinhanh">Hình ảnh:</label>
    <input type = "file" id = "hinhanh" name = "hinhanh" size = "30" class="form-control" ></td>
</div>
<div class="form-group  col-md-4">
    <label for="ghichu">Ghi chú: </label>
    <input type = "text" id="ghichu" name = "ghichu" value = "" class="form-control">
</div>

    <input type="submit" id = "btn" name = "btnSave" value="Thêm tác giả" class="btn-primary btn btn-block">
    <a class="btn btn-cancel" data-dismiss="modal" href="danhsachtacgia.php">Hủy bỏ</a>
                </form>
            </div>
        </div>
     
    </div>
</body>
</html>
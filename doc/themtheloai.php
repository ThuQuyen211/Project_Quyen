<?php
include('../ketnoi.php');
if (isset($_POST["btnSave"]))
{
    $matheloai = $_POST["matheloai"];
    $tentacgia = $_POST["tentheloai"];
    $ghichu = $_POST["ghichutheloai"];
    $sql = "INSERT INTO theloai VALUES ('$matheloai','$tentheloai','$ghichu')";
    if (mysqli_query($conn, $sql)){
    header('location: danhsachtheloai.php');
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
        <li class="breadcrumb-item">Danh sách thể loại</li>
        <li class="breadcrumb-item"><a href="#">Thêm thể loại</a></li>
      </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <form class="row" method="post">
<input type="hidden" id="matheloai" name = "matheloai" value = "">
<div class="form-group  col-md-4">
    <label for="tentheloai">Tên thể loại: </label>
    <input type = "text" id="tentheloai" name = "tentheloai" value = "" class="form-control">
</div>
<div class="form-group  col-md-4">
    <label for="ghichu">Ghi chú: </label>
    <input type = "text" id="ghichu" name = "ghichu" value = "" class="form-control">
</div>

    <input type="submit" id = "btn" name = "btnSave" value="Thêm tác giả" class="btn-primary btn btn-block">
    <a class="btn btn-cancel" data-dismiss="modal" href="danhsachtheloai.php">Hủy bỏ</a>
                </form>
            </div>
        </div>
     
    </div>
</body>
</html>
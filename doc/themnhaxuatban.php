<?php
include('../ketnoi.php');
if (isset($_POST["btnSave"]))
{
    $manhaxuatban = $_POST["manhaxuatban"];
    $tennhaxuatban = $_POST["tennhaxuatban"];
    $namthanhlap = $_POST["namthanhlap"];
    $sql = "INSERT INTO nhaxuatban VALUES ('$manhaxuatban','$tennhaxuatban','$namthanhlap')";
    if (mysqli_query($conn, $sql)){
    header('location: danhsachnhaxuatban.php');
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
        <li class="breadcrumb-item">Danh sách nhà xuất bản</li>
        <li class="breadcrumb-item"><a href="#">Thêm nhà xuất bản</a></li>
      </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <form class="row" method="post">
<input type="hidden" id="manhaxuatban" name = "manhaxuatban" value = "">

<div class="form-group  col-md-4">
    <label for="tennhaxuatban">Tên nhà xuất bản: </label>
    <input type = "text" id="tennhaxuatban" name = "tennhaxuatban" value = "" class="form-control">
</div>

<div class="form-group  col-md-4">
    <label for="namthanhlap">Năm thành lập: </label>
    <input type="year" class="form-control" name="namthanhlap" value = "" class="form-control">
</div>
    <input type="submit" id = "btn" name = "btnSave" value="Thêm nhân viên" class="btn-primary btn btn-block">
    <a class="btn btn-cancel" data-dismiss="modal" href="danhsachnhaxuatban.php">Hủy bỏ</a>
                </form>
            </div>
        </div>
     
    </div>
</body>
</html>
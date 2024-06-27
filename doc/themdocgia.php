<?php
include('../ketnoi.php');
if (isset($_POST["btnSave"]))
{
        $madocgia = $_POST["madocgia"];
        $tendocgia = $_POST["tendocgia"];
        $diachi = $_POST["diachi"];
        $sodienthoai = $_POST["sodienthoai"];
        $gmail = $_POST["gmail"];
    $sql = "INSERT INTO docgia VALUES ('$madocgia','$tendocgia','$diachi', '$sodienthoai', '$gmail', NULL, NULL, '0')";
    if (mysqli_query($conn, $sql)){
    header('location: danhsachdocgia.php');
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
        <li class="breadcrumb-item">Danh sách độc giả</li>
        <li class="breadcrumb-item"><a href="#">Thêm độc giả</a></li>
      </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <form class="row" method="post">
<input type="hidden" id="madocgia" name = "madocgia" value = "">

<div class="form-group  col-md-4">
    <label for="tendocgia">Tên độc giả: </label>
    <input type = "text" id="tendocgia" name = "tendocgia" value = "" class="form-control">
</div>

<div class="form-group  col-md-4">
    <label for="diachi">Địa chỉ: </label>
    <input type = "text" id="diachi" name = "diachi" value = "" class="form-control">
</div>

<div class="form-group  col-md-4">
    <label for="sodienthoai">Số điện thoại: </label>
    <input type = "text" id="sodienthoai" name = "sodienthoai" value = "" class="form-control">
</div>

<div class="form-group  col-md-4">
    <label for="gmail">Gmail: </label>
    <input type = "text" id="gmail" name = "gmail" value = "" class="form-control">
</div>
    <input type="submit" id = "btn" name = "btnSave" value="Thêm độc giả" class="btn-primary btn btn-block">
    <a class="btn btn-cancel" data-dismiss="modal" href="danhsachdocgia.php">Hủy bỏ</a>
                </form>
            </div>
        </div>
     
    </div>
</body>
</html>
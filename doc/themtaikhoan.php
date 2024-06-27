<?php
include('../ketnoi.php');
$sql = "SELECT * FROM docgia";
$result = mysqli_query($conn, $sql);
if (isset($_POST["btnSave"]))
{   
    $mataikhoan = $_POST['mataikhoan'];
    $madocgia = $_POST["madocgia"];
    $tendangnhap = $_POST["tendangnhap"];
    $matkhau = $_POST["matkhau"];
    $thanphan = $_POST["thanphan"];
    $sql = "INSERT INTO taikhoan VALUES ('$mataikhoan','$madocgia','$tendangnhap','$matkhau','$thanphan')";
    if (mysqli_query($conn, $sql)){
    header('location: danhsachtaikhoan.php');
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
        <li class="breadcrumb-item">Danh sách tài khoản</li>
        <li class="breadcrumb-item"><a href="#">Thêm tài khoản</a></li>
      </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <form class="row" method="post">
<input type="hidden" id="mataikhoan" name = "mataikhoan" value = "">
<div class="form-group  col-md-4">
    <label for="madocgia">Mã độc giả:</label>
    <select id = "madocgia" name = "madocgia" class="form-control">
    <?php
        while($row = mysqli_fetch_array($result)){
            ?>
            <option><?php echo $row['madocgia']; ?>. <?php echo $row['tendocgia']; ?></option>
        <?php
        }
        ?>
    </select>
</div>
<div class="form-group  col-md-4">
    <label for="tendangnhap">Tên đăng nhập: </label>
    <input type = "text" id="tendangnhap" name = "tendangnhap" value = "" class="form-control">
</div>
<div class="form-group  col-md-4">
    <label for="matkhau">Mật khẩu: </label>
    <input type = "text" id="matkhau" name = "matkhau" value = "" class="form-control">
</div>
<div class="form-group  col-md-4">
    <label for="thanphan">Thân phận: </label>
    <input type = "text" id="thanphan" name = "thanphan" value = "0" class="form-control">
</div>

    <input type="submit" id = "btn" name = "btnSave" value="Thêm tài khoản" class="btn-primary btn btn-block">
    <a class="btn btn-cancel" data-dismiss="modal" href="danhsachtaikhoan.php">Hủy bỏ</a>
                </form>
            </div>
        </div>
     
    </div>
</body>
</html>
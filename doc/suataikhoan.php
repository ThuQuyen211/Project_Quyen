<?php
    include('../ketnoi.php');
    $sql1 = "SELECT * FROM docgia";
    $r = mysqli_query($conn, $sql1);

    if (isset($_POST["btnSave"]))
    {
        $mataikhoan = $_POST["mataikhoan"];
        $madocgia = $_POST["madocgia"];
        $tendangnhap = $_POST["tendangnhap"];
        $matkhau = $_POST["matkhau"];
        $thanphan = $_POST["thanphan"];
        $sql = "UPDATE taikhoan SET madocgia ='$madocgia', tendangnhap='$tendangnhap', matkhau='$matkhau', thanphan ='$thanphan' WHERE mataikhoan = '$mataikhoan' ";
            if (mysqli_query($conn, $sql)){
            header('location:danhsachtaikhoan.php');
        }
        else{
            $result = "Cập nhật không thành công" . mysqli_error($conn);
        }
        }
    $mataikhoan = $_GET["mataikhoan"];
    $sql = "SELECT * FROM taikhoan WHERE mataikhoan = '$mataikhoan' ";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $mataikhoan = $row["mataikhoan"];
        $madocgia = $row["madocgia"];
        $tendangnhap = $row["tendangnhap"];
        $matkhau = $row["matkhau"];
        $thanphan = $row["thanphan"];
    }
    
?>
<?php
include("menu.php");
?>
  </aside>
    <main class="app-content">
      <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item">Danh sách tài khoản</li>
          <li class="breadcrumb-item"><a href="#">Sửa tài khoản</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <form class="row" method="post">
                <div class="form-group  col-md-4">
                <input type="hidden" name="mataikhoan" value="<?php echo $mataikhoan; ?>">
<div class="form-group  col-md-4">
    <label for="madocgia">Mã độc giả:</label>
    <select name = "madocgia" class="form-control">
    <?php
    
        while($s = mysqli_fetch_array($r)){
            ?>
            <option><?php echo $s['madocgia']; ?>. <?php echo $s['tendocgia']; ?></option>  
        <?php
        }
        ?>
    </select>
</div>

<div class="form-group  col-md-4">
    <label for="tendangnhap">Tên đăng nhập:</label>
    <input type ="text" name ="tendangnhap" value = "<?php echo $tendangnhap ?>" class="form-control">
</div>

<div class="form-group  col-md-4">
    <label for="matkhau">Mật khẩu:</label>
    <input type ="text" name ="matkhau" value = "<?php echo $matkhau?>"  class="form-control"></td>
</div>

<div class="form-group  col-md-4">
    <label for="thanphan">Thân phận:</label>
    <input type ="text" name ="thanphan" value = "<?php echo $thanphan?>"  class="form-control"></td>
</div>

<input type="submit" id = "btn" name = "btnSave" value="Lưu" class="btn-primary btn btn-block">
    <a class="btn btn-cancel" data-dismiss="modal" href="danhsachtaikhoan.php">Hủy bỏ</a>
                </form>
            </div>
        </div>
     
    </div>
</body>
</html>
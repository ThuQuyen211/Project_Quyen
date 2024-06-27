<?php
        include('../ketnoi.php');
        if (isset($_POST["btnSave"]))
        {
          $madocgia = $_POST["madocgia"];
          $tendocgia = $_POST["tendocgia"];
          $diachi = $_POST["diachi"];
          $sodienthoai = $_POST["sodienthoai"];
          $gmail = $_POST["gmail"];
          $sql = "UPDATE docgia SET tendocgia ='$tendocgia', diachi='$diachi', sodienthoai='$sodienthoai', gmail='$gmail' WHERE madocgia = '$madocgia' ";
          if (mysqli_query($conn, $sql)){
          header('location:danhsachdocgia.php');
        }
        else{
            $result = "Cập nhật không thành công" . mysqli_error($conn);
        }
        }
        $madocgia = $_GET["madocgia"];
        $sql = "SELECT madocgia, tendocgia, diachi, sodienthoai, gmail FROM docgia WHERE madocgia = '$madocgia'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
          $madocgia = $row["madocgia"];
          $tendocgia = $row["tendocgia"];
          $diachi = $row["diachi"];
          $sodienthoai = $row["sodienthoai"];
          $gmail = $row["gmail"];
    }
    
?>
<?php
include("menu.php");
?>
  </aside>
    <main class="app-content">
      <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item">Danh sách độc giả</li>
          <li class="breadcrumb-item"><a href="#">Sửa độc giả</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <form class="row" method="post">
                <input type="hidden" name="madocgia" value="<?php echo $madocgia; ?>">

<div class="form-group  col-md-4">
    <label for="tendocgia">Tên độc giả:</label>
    <input type = "text" name = "tendocgia" value = "<?php echo $tendocgia ?>" class="form-control">
</div>
<div class="form-group  col-md-4">
    <label for="diachi">Địa chỉ:</label>
    <input type = "text" name = "diachi" value = "<?php echo $diachi?>"  class="form-control"></td>
</div>
<div class="form-group col-md-4">
    <label for="sodienthoai">Số điện thoại:</label>
    <input type = "text" name = "sodienthoai" value = "<?php echo $sodienthoai?>" class="form-control">
</div>
<div class="form-group col-md-4">
    <label for="gnail">Gmail:</label>
    <input type = "text" name = "gmail" value = "<?php echo $gmail?>" class="form-control">
</div>
<input type="submit" id = "btn" name = "btnSave" value="Lưu" class="btn-primary btn btn-block">
    <a class="btn btn-cancel" data-dismiss="modal" href="danhsachdocgia.php">Hủy bỏ</a>
                </form>
            </div>
        </div>
     
    </div>
</body>
</html>
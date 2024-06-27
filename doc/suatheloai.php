<?php
        include('../ketnoi.php');
        if (isset($_POST["btnSave"]))
        {
            $matheloai = $_POST["matheloai"];
            $tentheloai = $_POST["tentheloai"];
            $ghichutheloai = $_POST["ghichutheloai"];
    
            $sql = "UPDATE theloai SET tentheloai ='$tentheloai', ghichutheloai = '$ghichutheloai' WHERE matheloai = '$matheloai' ";
            if (mysqli_query($conn, $sql)){
            header('location:danhsachtheloai.php');
        }
        else{
            $result = "Cập nhật không thành công" . mysqli_error($conn);
        }
        }
        $matheloai = $_GET["matheloai"];
        $sql = "SELECT * FROM theloai WHERE matheloai = '$matheloai'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $matheloai = $row["matheloai"];
            $tentheloai = $row["tentheloai"];
            $ghichutheloai = $row["ghichutheloai"];
    }
    
?>
<?php
include("menu.php");
?>
  </aside>
    <main class="app-content">
      <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item">Danh sách thể loại</li>
          <li class="breadcrumb-item"><a href="#">Sửa thể loại</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <form class="row" method="post">
                <input type="hidden" name="matheloai" value="<?php echo $matheloai; ?>">

<div class="form-group  col-md-4">
    <label for="tentheloai">Tên thể loại:</label>
    <input type = "text" name = "tentheloai" value = "<?php echo $tentheloai ?>" class="form-control">
</div>

<div class="form-group  col-md-4">
    <label for="ghichutheloai">Ghi chú:</label>
    <input type = "text" name = "ghichutheloai" value = "<?php echo $ghichutheloai?>" size = "30" class="form-control"></td>
</div>

<input type="submit" id = "btn" name = "btnSave" value="Lưu" class="btn-primary btn btn-block">

<a class="btn btn-cancel" data-dismiss="modal" href="danhsachtheloai.php">Hủy bỏ</a>
                </form>
            </div>
        </div>
     
    </div>
</body>
</html>
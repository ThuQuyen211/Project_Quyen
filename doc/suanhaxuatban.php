<?php
        include('../ketnoi.php');
        if (isset($_POST["btnSave"]))
        {
            $manhaxuatban = $_POST["manhaxuatban"];
            $tennhaxuatban = $_POST["tennhaxuatban"];
            $namthanhlap = $_POST["namthanhlap"];
            $sql = "UPDATE nhaxuatban SET tennhaxuatban ='$tennhaxuatban', namthanhlap='$namthanhlap' WHERE manhaxuatban = '$manhaxuatban' ";
            if (mysqli_query($conn, $sql)){
            header('location:danhsachnhaxuatban.php');
        }
        else{
            $result = "Cập nhật không thành công" . mysqli_error($conn);
        }
        }
        $manhaxuatban = $_GET["manhaxuatban"];
        $sql = "SELECT * FROM nhaxuatban WHERE manhaxuatban = '$manhaxuatban'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $manhaxuatban = $row["manhaxuatban"];
            $tennhaxuatban = $row["tennhaxuatban"];
            $namthanhlap = $row["namthanhlap"];
        }
?>
<?php
include("menu.php");
?>
  </aside>
    <main class="app-content">
      <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item">Danh sách nhà xuất bản</li>
          <li class="breadcrumb-item"><a href="#">Sửa nhà xuất bản</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                <form class="row" method="post">
                <input type="hidden" name="manhaxuatban" value="<?php echo $manhaxuatban; ?>">

<div class="form-group  col-md-4">
    <label for="tennhaxuatban">Tên nhà xuất bản:</label>
    <input type = "text" name = "tennhaxuatban" value = "<?php echo $tennhaxuatban ?>" class="form-control">
</div>

<div class="form-group  col-md-4">
    <label for="namthanhlap">Năm thành lập:</label>
    <input type = "text" name = "namthanhlap" value = "<?php echo $namthanhlap?>" size = "30" class="form-control"></td>
</div>

<input type="submit" id = "btn" name = "btnSave" value="Lưu" class="btn-primary btn btn-block">

<a class="btn btn-cancel" data-dismiss="modal" href="danhsachnhaxuatban.php">Hủy bỏ</a>
                </form>
            </div>
        </div>
     
    </div>
</body>
</html>
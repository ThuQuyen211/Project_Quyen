<?php
include('../ketnoi.php');
if(!$_SESSION['dangnhap']) {
    header("Location:../cuahang.php");
}
$sql = "SELECT madocgia, tendocgia, diachi, sodienthoai, gmail FROM docgia";
$result = mysqli_query($conn, $sql);
?>
<?php
include("menu.php");
?>
  </aside>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Danh sách độc giả</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
              
                              <a class="btn btn-add btn-sm" href="themdocgia.php" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo mới độc giả</a>
                            </div>
                            <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                      class="fas fa-print"></i> In dữ liệu</a>
                </div>
                          </div>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
            <th>Mã độc giả</th>
            <th>Tên độc giả</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ gmail</th>
            <th>Chức năng</th>
        </tr>
    </thead>
<?php
while($row = mysqli_fetch_assoc($result)){
    $madocgia = $row["madocgia"];
    $tendocgia = $row["tendocgia"];
    $diachi = $row["diachi"];
    $sdt = $row["sodienthoai"];
    $gmail = $row["gmail"];
    
?>
    <td><?php echo $madocgia ?></td>
    <td><?php echo $tendocgia ?></td>
    <td><?php echo $diachi ?></td>
    <td><?php echo $sdt ?></td>
    <td><?php echo $gmail ?></td>
    <td><a href = "suadocgia.php?madocgia=<?php echo $madocgia;?>" type="button" class="btn btn-primary">Sửa</a> <a href = "xoadocgia.php?madocgia=<?php echo $madocgia;?>" type="button" class="btn btn-danger">Xóa</a></td>
</tr>
<?php
}
?>

<?php
mysqli_close($conn); ?>
  </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php
include ("thoigian.php");
?>

</html>
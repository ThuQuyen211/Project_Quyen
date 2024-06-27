<?php
include('../ketnoi.php');
$sql = "SELECT * FROM tacgia";
$result = mysqli_query($conn, $sql);
?>
<?php
include("menu.php");
?>
</aside>
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href="#"><b>Danh sách tác giả</b></a></li>
      </ul>
      <div id="clock"></div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
              
                              <a class="btn btn-add btn-sm" href="themtacgia.php" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo mới</a>
                            </div>
                            <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                      class="fas fa-print"></i> In dữ liệu</a>
                </div>
              </div>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>Mã tác giả</th>
                                    <th>Tên tác giả</th>
                                    <th>Năm sinh</th>
                                    <th>Hình ảnh</th>
                                    <th>Ghi chú</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
<?php
while($row = mysqli_fetch_assoc($result)){
    $matacgia = $row["matacgia"];
    $tentacgia = $row["tentacgia"];
    $namsinh = $row["namsinh"];
    $ghichu = $row["ghichu"];
    
?>
    <td><?php echo $matacgia ?></td>
    <td><?php echo $tentacgia ?></td>
    <td><?php echo $namsinh ?></td>
    <td><img style="width:100px" src="../images/<?php echo $row["hinhanh"]; ?>"></td>
    <td><?php echo $ghichu ?></td>
    <td><a href = "suatacgia.php?matacgia=<?php echo $matacgia;?>" type="button" class="btn btn-primary">Sửa</a> <a href = "xoatacgia.php?matacgia=<?php echo $matacgia;?>" type="button" class="btn btn-danger">Xóa</a></td>
</tr>
<?php
}
?>
<?php
mysqli_close($conn);
?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php
include ("thoigian.php");
?>
</body>
</html>
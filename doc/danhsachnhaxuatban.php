<?php
include('../ketnoi.php');
$sql = "SELECT * FROM nhaxuatban";
$result = mysqli_query($conn, $sql);
?>
<?php
include("menu.php");
?>
</aside>
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href="#"><b>Danh sách nhà xuất bản</b></a></li>
      </ul>
      <div id="clock"></div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
              
                              <a class="btn btn-add btn-sm" href="themnhaxuatban.php" title="Thêm"><i class="fas fa-plus"></i>
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
                                    <th>Mã nhà xuất bản</th>
                                    <th>Tên nhà xuất bản</th>
                                    <th>Năm thành lập</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
<?php
while($row = mysqli_fetch_assoc($result)){
    $manhaxuatban = $row["manhaxuatban"];
    $tennhaxuatban = $row["tennhaxuatban"];
    $namthanhlap = $row["namthanhlap"];
    
?>
    <td><?php echo $manhaxuatban ?></td>
    <td><?php echo $tennhaxuatban ?></td>
    <td><?php echo $namthanhlap ?></td>
    <td><a href = "suanhaxuatban.php?manhaxuatban=<?php echo $manhaxuatban;?>" type="button" class="btn btn-primary">Sửa</a> <a href = "xoanhaxuatban.php?manhaxuatban=<?php echo $manhaxuatban;?>" type="button" class="btn btn-danger">Xóa</a></td>
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
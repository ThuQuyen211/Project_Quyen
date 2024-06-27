<?php 
include('../ketnoi.php');
$sql = "SELECT * FROM taikhoan WHERE thanphan = '0' ";
$result = mysqli_query($conn, $sql);
?>

<?php
include("menu.php");
?>
  </aside>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item active"><a href="#"><b>Danh sách tài khoản</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
              
                              <a class="btn btn-add btn-sm" href="themtaikhoan.php" title="Thêm"><i class="fas fa-plus"></i>
                                Tạo mới tài khoản</a>
                            </div>
                            <div class="col-sm-2">
                  <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i
                      class="fas fa-print"></i> In dữ liệu</a>
                </div>
                          </div>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
            <th>Mã tài khoản</th>
            <th>Mã độc giả</th>
            <th>Tên đăng nhập</th>
            <th>Mật khẩu</th>
            <th>Thân phận</th>
            <th>Chức năng</th>
        </tr>
    </thead>
<?php
while($row = mysqli_fetch_assoc($result)){
    $mataikhoan = $row["mataikhoan"];
    $madocgia = $row["madocgia"];
    $tendangnhap = $row["tendangnhap"];
    $matkhau = $row["matkhau"];
    $thanphan = $row["thanphan"];
    
?>
    <td><?php echo $mataikhoan ?></td>
    <td><?php echo $madocgia ?></td>
    <td><?php echo $tendangnhap ?></td>
    <td><?php echo $matkhau ?></td>
    <td><?php if ($thanphan == 0) echo "Độc giả"; else echo "Quản lí";  ?></td>
    <td><a href = "suataikhoan.php?mataikhoan=<?php echo $mataikhoan;?>" type="button" class="btn btn-primary">Sửa</a> <a href = "xoataikhoan.php?mataikhoan=<?php echo $mataikhoan;?>" type="button" class="btn btn-danger">Xóa</a></td>
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
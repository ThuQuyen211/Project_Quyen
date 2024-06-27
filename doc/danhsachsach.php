<?php
    include('../ketnoi.php');
?>
<?php
$sql = "SELECT s.masach, s.tensach, tg.matacgia, tg.tentacgia, tl.matheloai, tl.tentheloai, nxb.manhaxuatban, nxb.tennhaxuatban, s.sotrang, s.trangthai, s.hinhanh, s.gioithieu FROM sach s, tacgia tg, theloai tl, nhaxuatban nxb WHERE s.matacgia = tg.matacgia AND s.matheloai = tl.matheloai AND s.manhaxuatban = nxb.manhaxuatban";
$result = mysqli_query($conn, $sql);
?>
<?php
include("menu.php");
?>
</aside>
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href="#"><b>Danh sách sách, tài liệu</b></a></li>
      </ul>
      <div id="clock"></div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
              
                              <a class="btn btn-add btn-sm" href="themsach.php" title="Thêm"><i class="fas fa-plus"></i>
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
                                    <th>Mã sách</th>
                                    <th>Tên sách</th>
                                    <th>Tên tác giả</th>
                                    <th>Tên thể loại</th>
                                    <th>Tên nhà xuất bản</th>
                                    <th>Số trang</th>
                                    <th>Trạng thái</th>
                                    <th>Hình ảnh</th>
                                    <th>Giới thiệu</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
<?php
while($row = mysqli_fetch_assoc($result)){
    $masach = $row["masach"];
    $tensach = $row["tensach"];
    $tentacgia = $row["tentacgia"];
    $tentheloai = $row["tentheloai"];
    $tennhaxuatban = $row["tennhaxuatban"];
    $sotrang = $row["sotrang"];
    $trangthai = $row["trangthai"];
    $gioithieu = $row["gioithieu"];
    
?>
    <td><?php echo $masach ?></td>
    <td><?php echo $tensach ?></td>
    <td><?php echo $tentacgia ?></td>
    <td><?php echo $tentheloai ?></td>
    <td><?php echo $tennhaxuatban ?></td>
    <td><?php echo $sotrang ?></td>
    <td><?php echo $trangthai ?></td>
    <td><img style="width:100px" src="../images/<?php echo $row["hinhanh"]; ?>"></td>
    <td><?php echo $gioithieu ?></td>
    <td><a href = "suasach.php?masach=<?php echo $masach;?>" type="button" class="btn btn-primary">Sửa</a> <a href = "xoasach.php?mahsach=<?php echo $masach;?>" type="button" class="btn btn-danger">Xóa</a></td>
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
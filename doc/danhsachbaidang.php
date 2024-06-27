<?php
include('../ketnoi.php');
$sql = "SELECT * FROM baidang";
$result = mysqli_query($conn, $sql);
?>
<?php
include("menu.php");
?>
</aside>
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item active"><a href="#"><b>Danh sách bài đăng</b></a></li>
      </ul>
      <div id="clock"></div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="row element-button">
                            <div class="col-sm-2">
              
                              <a class="btn btn-add btn-sm" href="thembaidang.php" title="Thêm"><i class="fas fa-plus"></i>
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
                                    <th>Tiêu đề</th>
                                    <th>Người viết</th>
                                    <th>Nội dung</th>
                                    <th>Thời gian</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
<?php
while($row = mysqli_fetch_assoc($result)){
    $mabaidang = $row["id"];
    $tieude = $row["title"];
    $noidung = $row["content"];
    $tacgia = $row["author"];
    $thoigian = $row["created_at"];
    
?>
    <td><?php echo $tieude ?></td>
    <td><?php echo $noidung ?></td>
    <td><?php echo $tacgia ?></td>
    <td><?php echo $thoigian ?></td>
    <td><a href = "suabaidang.php?id=<?php echo $mabaidang;?>" type="button" class="btn btn-primary">Sửa</a> <a href = "xoabaidang.php?id=<?php echo $mabaidang;?>" type="button" class="btn btn-danger">Xóa</a></td>
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
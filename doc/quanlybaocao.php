<?php
  include('../ketnoi.php');
  $result1 = mysqli_query($conn, "SELECT * FROM sach");
  $result2 = mysqli_query($conn, "SELECT * FROM docgia");
  $result3 = mysqli_query($conn, "SELECT * FROM theloai");
  $result4 = mysqli_query($conn, "SELECT * FROM sach WHERE trangthai = 'Hết' ");
  $result5 = mysqli_query($conn, "SELECT theloai.*, COUNT(sach.matheloai) AS so_vl FROM sach INNER JOIN theloai ON sach.matheloai = theloai.matheloai GROUP BY sach.matheloai;");
  $data = [];
  while($row = mysqli_fetch_array($result5)){
    $data[] = $row;
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['tenheloai', 'so_vl'],
          <?php
            foreach($data as $key){
              echo "['" . $key['tentheloai']."' , " . $key['so_vl'] . "],";
            }
          ?>
        ]);

        var options = {
          title: 'Biểu đồ thống kê thể loại sách',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
</head>

<body  onload="time()" class="app sidebar-mini rtl">
  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


    <li><a class="app-nav__item" href="../dangnhap.html"><i class='bx bx-log-out bx-rotate-180'></i> </a>

</li>
</ul>
</header>
<?php
include "menu.php";
?>
  </aside>
  <main class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="#"><b>Thống kê sách</b></a></li>
          </ul>
          <div id="clock"></div>
        </div>
      </div>
    </div>
        <div class="row">
        </div>
      </div>
    </div>
    <?php
    if($result1){
    ?>
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="widget-small primary coloured-icon"><i class='icon  bx bxs-user fa-3x'></i>
                    <div class="info">
                        <h4>Tổng số sách</h4>
                        <p><b><?php echo mysqli_num_rows($result1). " ";?></b></p>
                    </div>
                </div>
            </div>
    <?php
    }
    ?>
    <?php
    if($result2){
    ?>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small info coloured-icon"><i class='icon bx bxs-purchase-tag-alt fa-3x' ></i>
                    <div class="info">
                        <h4>Tổng số độc giả</h4>
                        <p><b><?php echo mysqli_num_rows($result2). " ";?></b></p>
                    </div>
                </div>
            </div>
            <?php
    }
    ?>
    <?php
    if($result3){
    ?>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small warning coloured-icon"><i class='icon fa-3x bx bxs-shopping-bag-alt'></i>
                    <div class="info">
                        <h4>Tổng số thể loại</h4>
                        <p><b><?php echo mysqli_num_rows($result3). " ";?></b></p>
                    </div>
                </div>
            </div>
    <?php
    }
    ?>
    <?php
    if($result4){
    ?>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small warning coloured-icon"><i class='icon fa-3x bx bxs-tag-x' ></i>
                    <div class="info">
                        <h4>Hết hàng</h4>
                        <p><b><?php echo mysqli_num_rows($result4). " ";?></b></p>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div>
                            <h3 class="tile-title">TỔNG SỐ SÁCH</h3>
                        </div>
                        <div class="tile-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
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
                                </tr>
                            </thead>
<?php
$sql = "SELECT s.masach, s.tensach, tg.matacgia, tg.tentacgia, tl.matheloai, tl.tentheloai, nxb.manhaxuatban, nxb.tennhaxuatban, s.sotrang, s.trangthai, s.hinhanh, s.gioithieu FROM sach s, tacgia tg, theloai tl, nhaxuatban nxb WHERE s.matacgia = tg.matacgia AND s.matheloai = tl.matheloai AND s.manhaxuatban = nxb.manhaxuatban";
$result = mysqli_query($conn, $sql);
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
</tr>
<?php
}
?>
                                </tbody>
                            </table>
                        </div>

        <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div>
                            <h3 class="tile-title">SẢN PHẨM ĐÃ HẾT</h3>
                        </div>
                        <div class="tile-body">
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
                                    </tr>
                                </thead>
<?php
$result = mysqli_query($conn, $sql = "SELECT s.masach, s.tensach, tg.matacgia, tg.tentacgia, tl.matheloai, tl.tentheloai, nxb.manhaxuatban, nxb.tennhaxuatban, s.sotrang, s.trangthai, s.hinhanh, s.gioithieu FROM sach s, tacgia tg, theloai tl, nhaxuatban nxb WHERE s.matacgia = tg.matacgia AND s.matheloai = tl.matheloai AND s.manhaxuatban = nxb.manhaxuatban AND trangthai = 'Hết' ");
while($r = mysqli_fetch_assoc($result)){
  $masach = $r["masach"];
  $tensach = $r["tensach"];
  $tentacgia = $r["tentacgia"];
  $tentheloai = $r["tentheloai"];
  $tennhaxuatban = $r["tennhaxuatban"];
  $sotrang = $r["sotrang"];
  $trangthai = $r["trangthai"];
  $gioithieu = $r["gioithieu"];
  
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
</tr>
<?php
}
?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</div>
</div>
        <div class="row">
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tile">
                    <h3 class="tile-title">THỐNG KÊ</h3>
                        <div id="piechart_3d" style="width: 550px; height: 500px;"></div>
                    </div>
                </div>
            </div>
        </div>
      </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript">
    var data = {
      labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"],
      datasets: [{
          label: "Dữ liệu đầu tiên",
          fillColor: "rgba(255, 255, 255, 0.158)",
          strokeColor: "black",
          pointColor: "rgb(220, 64, 59)",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "green",
          data: [20, 59, 90, 51, 56, 100, 40, 60, 78, 53, 33, 81]
        },
        {
          label: "Dữ liệu kế tiếp",
          fillColor: "rgba(255, 255, 255, 0.158)",
          strokeColor: "rgb(220, 64, 59)",
          pointColor: "black",
          pointStrokeColor: "#fff",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "green",
          data: [48, 48, 49, 39, 86, 10, 50, 70, 60, 70, 75, 90]
        }
      ]
    };


        var ctxl = $("#lineChartDemo").get(0).getContext("2d");
        var lineChart = new Chart(ctxl).Line(data);

        var ctxb = $("#barChartDemo").get(0).getContext("2d");
        var barChart = new Chart(ctxb).Bar(data);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
        if (document.location.hostname == 'pratikborsadiya.in') {
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-72504830-1', 'auto');
            ga('send', 'pageview');
        }
    </script>
</body>
</html>
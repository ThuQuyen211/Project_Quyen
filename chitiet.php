<?php
include "ketnoi.php"
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/logo-dai-hoc-hai-phong-inkythuatso-01.jpg" type="image/x-icon">

  <title>
    Sách ĐHHP
  </title>

  <!-- Lightbox CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet" />

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="search.css">

  <style>
    /* Zoom Effect on Hover */
    .img-box {
      position: relative;
      overflow: hidden;
      max-width: 300px; /* Set max-width for the image container */
      margin: auto; /* Center the image container */
    }

    .img-box img {
      transition: transform 0.5s ease;
      width: 100%;
      height: auto;
    }

    .img-box:hover img {
      transform: scale(1.2);
    }

    .detail-box {
      margin-top: 20px; /* Add some margin to the detail box for better spacing */
    }
    .red-text {
      color: red;
    }
    <style>
    .book {
      text-align: center;
      width: 250px; /* Độ rộng của mỗi cuốn sách */
      display: inline-block;
    }

    .book .img-box {
      width: 100%; /* Kích thước ảnh sách */
      height: 200px; /* Kích thước ảnh sách */
      margin: auto;
      overflow: hidden;
      border-radius: 10px;
      margin-bottom: 20px; /* Khoảng cách dưới mỗi cuốn sách */
    }

    .book img {
      width: 100%;
      height: auto;
      border-radius: 10px;
      transition: transform 0.3s ease-in-out;
    }

    .book:hover img {
      transform: scale(1.1); /* Hiệu ứng phóng to khi rê chuột vào */
    }

    .book h6,
    .book h7 {
        max-width: 200px; /* Giới hạn chiều dài tối đa của tên sách */
        white-space: nowrap; /* Ngăn không cho tên sách xuống dòng */
        overflow: hidden; /* Ẩn phần vượt quá chiều dài */
        text-overflow: ellipsis; /* Hiển thị dấu chấm ba (...) nếu tên sách quá dài */
      
    }

    .red-text {
      color: red;
    }

    /* Style cho Owl Carousel */
    .owl-carousel .owl-item img {
      display: block;
      width: 100%;
      height: auto;
    }

    /* Owl Carousel navigation */
    .owl-prev,
    .owl-next {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 25px;
      height: 25px;
      background-color: #333;
      color: #fff;
      border-radius: 50%;
      text-align: center;
      line-height: 25px;
    }

    .owl-prev {
      left: 10px;
    }

    .owl-next {
      right: 10px;
    }

    .owl-prev:hover,
    .owl-next:hover {
      background-color: #555;
    }
  </style>
</head>

<body>
<div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index.html">
          <span>
            Trang xem tư liệu của thư viện trường Đại Học Hải Phòng
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item active">
              <a class="nav-link" href="cuahang.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php
                $sql_danhmuc = mysqli_query($conn,"SELECT * FROM theloai");
                while ($row = mysqli_fetch_array($sql_danhmuc)){
                ?>
            <li class="nav-item">
              <a class="nav-link" href="loc_theloai.php?matheloai=<?php echo $row['matheloai'];?>">
                <?php echo $row['tentheloai'] ?>
              </a>
            </li>
            <?php
               }
            ?>
          <div class="user_option">
          <a href="doc/dangxuat.php">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Đăng xuất
              </span>
            </a>
            <?php
            $tendangnhap = $_SESSION['tendangnhap'];
            $matkhau = $_SESSION['matkhau'];
            $sql = "SELECT d.madocgia, d.tendocgia, d.diachi, d.sodienthoai, d.gmail, t.mataikhoan, t.tendangnhap, t.matkhau, t.thanphan
            FROM docgia d
            LEFT JOIN taikhoan t ON d.madocgia = t.madocgia WHERE t.tendangnhap = ? AND t.matkhau = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $tendangnhap, $matkhau);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()){
                  $madocgia = $row["madocgia"];
                  $tendocgia = $row["tendocgia"];
                  ?>
                  <a href="formthongtin.php?madocgia=<?php echo $madocgia; ?>">
                      <i class="fa fa-user" aria-hidden="true"></i>
                      <span>
                      <?php echo $tendocgia; ?>
                      </span>
                  </a>
          <?php
              }
          } else {
              echo "Không tìm thấy thông tin độc giả.";
          }
          
          $stmt->close();
          ?>
          <div class="vertical-search-container">
            <form class="vertical-search-form" action="timkiem.php" method="post">
              <input type="text" name="query" placeholder="Search..." class="search-input">
              <button class="search-submit" name ="searchbt"type="submit" value="">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
    </div>
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->
  </div>
  <!-- end hero area -->

  <!-- shop detail section -->
  <section class="shop_detail_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
          <?php
            if(isset($_GET['masach'])){
            $masach = $_GET['masach'];
            }
            $sql_chitiet = mysqli_query($conn, "SELECT masach, nhaxuatban.tennhaxuatban, trangthai, tacgia.tentacgia, tensach, tentheloai, sotrang, gioithieu, sach.hinhanh FROM sach, tacgia, theloai, nhaxuatban WHERE sach.matacgia = tacgia.matacgia AND sach.matheloai = theloai.matheloai AND nhaxuatban.manhaxuatban = sach.manhaxuatban AND masach='$masach'");
            while($row1 = mysqli_fetch_array($sql_chitiet)){
            ?>
            <a href="images/<?php echo $row1['hinhanh'] ?>" data-lightbox="product">
              <img src="images/<?php echo $row1['hinhanh'] ?>" alt="Product Image">
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
          <h3>Tên sách: <?php echo $row1['tensach'] ?></h3>
        <div class="detail-box">
          <h6>Tác giả: <span><?php echo $row1['tentacgia'] ?></span></h6>
        </div>
        <div class="detail-box">
          <h6>Thể loại: <?php echo $row1['tentheloai'] ?></h6>
        </div>
        <div class="detail-box">
          <h6>Nhà xuất bản: <?php echo $row1['tennhaxuatban'] ?></h6>
        </div>
        <div class="detail-box">
          <h6>Số trang: <?php echo $row1['sotrang'] ?></h6>
        </div>
        <div class="detail-box">
          <h7 class="red-text">Trạng thái: <?php echo $row1['trangthai'] ?></h7>
        </div>
        <div class="detail-box">
          <h6>Giới thiệu: </br><?php echo $row1['gioithieu'] ?></h6>
        </div>
        </br>
            <div class="btn-box">
              <a href="cuahang.php" class="btn btn-secondary">Xem sách khác</a>
            </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>

      <!--Chitietsach--->
      <!--Sach de cu -->
<div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="heading_container heading_center">
          <h2>Những cuốn sách khác</h2></br>
        </div>
        <div class="owl-carousel owl-theme">
          <?php
          // Assuming $conn is your database connection object
          $sql_sp = mysqli_query($conn, "SELECT masach, trangthai, tacgia.tentacgia, tensach, tentheloai, sach.hinhanh FROM sach, tacgia, theloai WHERE sach.matacgia = tacgia.matacgia AND sach.matheloai = theloai.matheloai");
          while ($row1 = mysqli_fetch_array($sql_sp)) {
          ?>
            <div class="item">
              <div class="book">
                <div class="img-box">
                  <img src="images/<?php echo $row1['hinhanh'] ?>" alt="">
                </div>
                <h6><a href="chitiet.php?masach=<?php echo $row1['masach']; ?>"><?php echo $row1['tensach'] ?></a></h6>
                <div class="detail-box">
                  <h6></br>
                    <span><?php echo $row1['tentacgia'] ?></span></h6>
                </div>
                <div class="detail-box">
                  <h6></br>
                  <?php echo $row1['tentheloai'] ?></h6>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
        </br>
  <!-- end shop detail section -->

  <!-- info section -->
  <section class="info_section layout_padding2-top">
    <div class="social_container">
      <div class="social_box">
        <a href="">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-youtube" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6>
              ABOUT US
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_form ">
              <h5>
                Newsletter
              </h5>
              <form action="#">
                <input type="email" placeholder="Enter your email">
                <button>
                  Subscribe
                </button>
              </form>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              NEED HELP
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              CONTACT US
            </h6>
            <div class="info_link-box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span> Gb road 123 london Uk </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>+01 12345678901</span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span> demo@gmail.com</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- footer section -->
    <footer class=" footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a>
        </p>
      </div>
    </footer>
    <!-- footer section -->
  </section>
  <!-- end info section -->

  <!-- Lightbox JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="js/custom.js"></script>

</body>

</html>

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
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <link href="css/book.css" rel="stylesheet" />
  <link rel="stylesheet" href="search.css">
  <style>
    .red-text {
      color: red;
    }
    .img-box img {
  width: 100%;
  height: auto;
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
              header("Location: doc/dangxuat.php");
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
<!-- slider section -->
<section class="slider_section">
  <div class="slider_container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <?php
        $sql_slider = mysqli_query($conn, "SELECT * FROM truot WHERE hoatdong='1' ORDER BY id");
        $active = true; // Đảm bảo mục đầu tiên được đánh dấu là active
        while ($row_slider = mysqli_fetch_array($sql_slider)){
        ?>
        <div class="carousel-item <?php if($active) { echo 'active'; $active = false; } ?>">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-7">
                <div class="detail-box">
                  <h3>
                    <?php echo $row_slider['tieude']; ?>
                  </h3>
                  <img src="images/<?php echo $row_slider['anh']; ?>" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        }
        ?>
      </div>
      <!-- Thêm các điều khiển cho slider -->
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</section>
<!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->

<section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>Danh sách tài liệu, sách</h2>
    </div>
      <div class="row justify-content-center">
      <?php
            $sql_sp = mysqli_query($conn, "SELECT masach, trangthai, tacgia.tentacgia, tensach, tentheloai, sach.hinhanh FROM sach, tacgia, theloai WHERE sach.matacgia = tacgia.matacgia AND sach.matheloai = theloai.matheloai");
            while($row1 = mysqli_fetch_array($sql_sp)){
      ?>
      <div class="book">
        <div class="img-box">
          <img src="images/<?php echo $row1['hinhanh'] ?>" alt="">
        </div>
          <h6><a href= "chitiet.php?masach=<?php echo $row1['masach'];?>" ><?php echo $row1['tensach'] ?></a></h6>
        <div class="detail-box">
          <h6>Tác giả: <span><?php echo $row1['tentacgia'] ?></span></h6>
        </div>
        <div class="detail-box">
          <h6>Thể loại: <?php echo $row1['tentheloai'] ?></h6>
        </div>
        <div class="detail-box">
          <h7 class="red-text">Trạng thái: <?php echo $row1['trangthai'] ?></h7>
        </div>
      </div>
      <?php
            }
      ?>
        </div>
      </div>
    </div>
  </section>

  <!-- end shop section -->

  <!-- contact section -->

  <section class="contact_section ">
    <div class="container px-0">
      <div class="heading_container ">
        <h2 class="">
          Đặt câu hỏi cho chúng tôi
        </h2>
      </div>
    </div>
    <div class="container container-bg">
      <div class="row">
        <div class="col-lg-7 col-md-6 px-0">
          <div class="map_container">
            <div class="map-responsive">
            <span class="label label-success">Vị trí của trường</span>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3729.6042754294617!2d106.62132607470858!3d20.807291495349503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7735d162afdb%3A0x70df39254ee1c357!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBI4bqjaSBQaMOybmc!5e0!3m2!1svi!2s!4v1718822281090!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 px-0">
        <form action="lienhe.php" method="post">
          <input type="text" id="name" name="name" placeholder="Tên" required><br><br>

          <input type="email" id="email" name="email" placeholder="Email" required><br><br>

          <input class="message-box" id="message" name="message" placeholder="Tin nhắn" required></input><br><br>

          <input class="btn btn-primary" type="submit" value="Submit">
        </form>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->

  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2 class="">
          Bài đăng mới nhất
        </h2>
      </div>
    </div>
    <div class="container px-0">
      <div id="customCarousel2" class="carousel  carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
          <?php
          $sql = "SELECT id, title, content, author, created_at FROM baidang ORDER BY created_at DESC LIMIT 1";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            // Output data of the latest post
            $row = $result->fetch_assoc();
          ?>
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    <?php echo $row["title"] ?>;
                  </h5>
                  <h6>
                    <?php echo $row["author"] ?>; <?php echo $row["created_at"] ?>; 
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
                <?php echo $row["content"] ?>;
              </p>
            </div>
            <?php
            }
            ?>
          </div>
      </div>
    </div>
  </section>
  <!-- end client section -->

  <!-- info section -->

  <section class="info_section  layout_padding2-top">
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
  </section>

  <!-- end info section -->


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>


<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>
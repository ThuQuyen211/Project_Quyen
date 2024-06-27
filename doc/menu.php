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

</head>

<body  onload="time()" class="app sidebar-mini rtl">
  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
<li><a class="app-nav__item" href="dangxuat.php"><i class='bx bx-log-out bx-rotate-180'></i> </a></li>
?>
</ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
<div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../images/avata.png" width="50px"
  alt="User Image">
<div>
  <p class="app-sidebar__user-name"><b>Admin</b></p>
  <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
</div>
</div>
<hr>
<ul class="app-menu">

<li><a class="app-menu__item " href="danhsachdocgia.php"><i class='app-menu__icon bx bx-user-circle'></i><span
      class="app-menu__label">Quản lý độc giả</span></a></li>

<li><a class="app-menu__item " href="danhsachnhaxuatban.php"><i class='app-menu__icon bx bx-buildings'></i>
      <span class="app-menu__label">Quản lý nhà xuất bản</span></a></li>

<li><a class="app-menu__item" href="danhsachsach.php"><i class='app-menu__icon bx bx-book'></i><span
      class="app-menu__label">Quản lý sách</span></a></li>

<li><a class="app-menu__item" href="danhsachtacgia.php"><i class='app-menu__icon bx bx-user-plus'></i><span
      class="app-menu__label">Quản lý tác giả</span></a></li>

<li><a class="app-menu__item" href="danhsachtheloai.php"><i class='app-menu__icon bx bx-purchase-tag-alt'></i><span
      class="app-menu__label">Quản lý thể loại</span></a></li>

<li><a class="app-menu__item" href="danhsachtaikhoan.php"><i class='app-menu__icon bx bx-id-card'></i><span
class="app-menu__label">Quản lý tài khoản</span></a></li>

<li><a class="app-menu__item" href="quanlybaocao.php"><i
      class='app-menu__icon bx bx-bar-chart-square'></i><span class="app-menu__label">Thống kê</span></a></li>

<li><a class="app-menu__item" href="lienhe.php"><i
      class='app-menu__icon bx bx-chat'></i></i><span class="app-menu__label">Liên hệ</span></a></li>

<li><a class="app-menu__item" href="danhsachbaidang.php"><i
      class='app-menu__icon bx bx-message-alt-edit'></i></i><span class="app-menu__label">Bài đăng</span></a></li>

</ul>
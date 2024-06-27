<?php
include "ketnoi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tendangnhap = $_POST['tendangnhap'];
    $matkhau = $_POST['matkhau'];

    // Sử dụng câu lệnh chuẩn bị để ngăn chặn SQL Injection
    $stmt = $conn->prepare("SELECT * FROM taikhoan WHERE tendangnhap = ? AND matkhau = ?");
    $stmt->bind_param("ss", $tendangnhap, $matkhau);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $_SESSION['tendangnhap'] = $row['tendangnhap'];
        $_SESSION['matkhau'] = $row['matkhau'];
        $_SESSION['dangnhap'] = $row['thanphan'];
        
        header('Location: doc/danhsachdocgia.php');
    } else {
        echo "Tên đăng nhập hoặc mật khẩu không đúng";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="" href="images/logo-dai-hoc-hai-phong-inkythuatso-01.jpg">
    <title>Đăng nhập hệ thống sách ĐHHP</title>
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css" />
    <link rel="stylesheet" href="css/dangnhap.css">
</head>
<body>
    <form class="row" method="post">
        <h1>Đăng nhập</h1>
        <input type="text" placeholder="Tên tài khoản" name="tendangnhap" id="tendangnhap" required>
        <input type="password" placeholder="Mật khẩu" name="matkhau" id="matkhau" required>
        <button type="submit" value="Đăng nhập" name="dangnhap">Đăng nhập</button>
    </form>
</body>
</html>

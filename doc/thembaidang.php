<?php
include('../ketnoi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $tieude = htmlspecialchars(strip_tags(trim($_POST["title"])));
    $noidung = htmlspecialchars(strip_tags(trim($_POST["content"])));
    $tacgia = htmlspecialchars(strip_tags(trim($_POST["author"])));

    // Prepare and execute the SQL statement
    $sql = "INSERT INTO baidang (title, content, author) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $tieude, $noidung, $tacgia);

    if ($stmt->execute()) {
        header('Location: danhsachbaidang.php');
        exit();
    } else {
        $result = "Thêm bài đăng không thành công: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Post</title>
    <link rel="stylesheet" href="path/to/your/css/file.css">
</head>
<body>
    <?php include("menu.php"); ?>
    </aside>
  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">Danh sách bài đăng</li>
        <li class="breadcrumb-item"><a href="#">Thêm bài đăng</a></li>
      </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                        <form class="row" method="post">
                            <div class="form-group col-md-4">
                                <label for="title">Tiêu đề:</label>
                                <input type="text" id="title" name="title" class="form-control" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="content">Nội dung:</label>
                                <textarea id="content" name="content" class="form-control" required></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="author">Tác giả:</label>
                                <input type="text" id="author" name="author" class="form-control" required>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="submit" name="btnSave" value="Lưu" class="btn btn-primary btn-block">
                                <a class="btn btn-cancel" href="danhsachbaidang.php">Hủy bỏ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

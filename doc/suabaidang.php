<?php
include('../ketnoi.php');

if (isset($_POST["btnSave"])) {
    // Collect and sanitize form data
    $ma = ($_POST["id"]);
    $tieude = ($_POST["title"]);
    $noidung = ($_POST["content"]);
    $tacgia = ($_POST["author"]);

    // Prepare and execute the SQL statement
    $sql = "UPDATE baidang SET title = '$tieude', content = '$noidung', author = '$tacgia' WHERE id = '$ma'";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute()) {
        header('Location: danhsachbaidang.php');
        exit();
    } else {
        $result = "Cập nhật không thành công: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch the current post data
if (isset($_GET["id"])) {
    $ma = intval($_GET["id"]);
    $sql = "SELECT * FROM baidang WHERE id = '$ma'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $tieude = htmlspecialchars($row["title"]);
        $noidung = htmlspecialchars($row["content"]);
        $tacgia = htmlspecialchars($row["author"]);
        $thoigian = htmlspecialchars($row["created_at"]);
    } else {
        echo "Post not found.";
        exit();
    }

    $stmt->close();
} else {
    echo "No post ID specified.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="path/to/your/css/file.css">
</head>
<body>
    <?php include("menu.php"); ?>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item">Danh sách bài đăng
          </li>
          <li class="breadcrumb-item"><a href="#">Sửa bài đăng
          </a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
                        <form class="row" method="post">
                            <input type="hidden" name="id" value="<?php echo $ma; ?>">
                            <div class="form-group col-md-4">
                                <label for="title">Tiêu đề:</label>
                                <input type="text" id="title" name="title" value="<?php echo $tieude; ?>" class="form-control" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="content">Nội dung:</label>
                                <textarea id="content" name="content" class="form-control" required><?php echo $noidung; ?></textarea>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="author">Tác giả:</label>
                                <input type="text" id="author" name="author" value="<?php echo $tacgia; ?>" class="form-control" required>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="submit" id="btn" name="btnSave" value="Lưu" class="btn btn-primary btn-block">
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

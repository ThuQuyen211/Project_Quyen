<?php
include('ketnoi.php');

if (isset($_POST["btnSave"])) {
    $madocgia = $_POST['madocgia'];
    $tendocgia = $_POST['tendocgia'];
    $diachi = $_POST['diachi'];
    $sodienthoai = $_POST['sodienthoai'];
    $gmail = $_POST['gmail'];
    $mataikhoan = $_POST['mataikhoan'];
    $tendangnhap = $_POST["tendangnhap"];
    $matkhau = $_POST["matkhau"];
    $thanphan = $_POST["thanphan"];

    // Bắt đầu transaction
    $conn->begin_transaction();

    try {
        // Cập nhật bảng docgia
        $sql_docgia = "UPDATE docgia SET tendocgia = ?, diachi = ?, sodienthoai = ?, gmail = ? WHERE madocgia = ?";
        $stmt_docgia = $conn->prepare($sql_docgia);
        $stmt_docgia->bind_param("ssssi", $tendocgia, $diachi, $sodienthoai, $gmail, $madocgia);
        $stmt_docgia->execute();

        // Cập nhật bảng taikhoan
        $sql_taikhoan = "UPDATE taikhoan SET tendangnhap = ?, matkhau = ?, thanphan = ? WHERE mataikhoan = ?";
        $stmt_taikhoan = $conn->prepare($sql_taikhoan);
        $stmt_taikhoan->bind_param("sssi", $tendangnhap, $matkhau, $thanphan, $mataikhoan);
        $stmt_taikhoan->execute();

        // Nếu không có lỗi, commit các thay đổi vào cơ sở dữ liệu
        $conn->commit();
        echo "Cập nhật thành công.";

    } catch (Exception $e) {
        // Nếu có lỗi, rollback các thay đổi và hiển thị thông báo lỗi
        $conn->rollback();
        echo "Có lỗi xảy ra: " . $e->getMessage();
    }
}

if (!isset($_GET['madocgia']) || empty($_GET['madocgia'])) {
    echo "Không có ID người dùng được cung cấp.";
    exit;
}

$ma = $_GET['madocgia'];

// Chuẩn bị câu lệnh SQL để lấy thông tin từ cả hai bảng
$sql = "SELECT d.madocgia, d.tendocgia, d.diachi, d.sodienthoai, d.gmail, t.mataikhoan, t.tendangnhap, t.matkhau, t.thanphan
        FROM docgia d
        LEFT JOIN taikhoan t ON d.madocgia = t.madocgia 
        WHERE d.madocgia = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $ma); // i: integer (định dạng của madocgia)
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $madocgia = $row["madocgia"];
    $tendocgia = $row["tendocgia"];
    $diachi = $row["diachi"];
    $sodienthoai = $row["sodienthoai"];
    $gmail = $row["gmail"];
    $mataikhoan = $row["mataikhoan"];
    $tendangnhap = $row["tendangnhap"];
    $matkhau = $row["matkhau"];
    $thanphan = $row["thanphan"];
} else {
    echo "Không tìm thấy thông tin người dùng có ID = " . $ma;
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form người dùng</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Thông tin
                    </div>
                    <div class="card-body">
                        <form class="row" method="post">
                            <input type="hidden" name="madocgia" value="<?php echo $ma; ?>">
                            
                            <div class="form-group col-md-6">
                                <label for="tendocgia">Họ tên:</label>
                                <input type="text" class="form-control" id="tendocgia" name="tendocgia" value="<?php echo $tendocgia; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="diachi">Địa chỉ:</label>
                                <input type="text" class="form-control" id="diachi" name="diachi" value="<?php echo $diachi; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sodienthoai">Số điện thoại:</label>
                                <input type="text" class="form-control" id="sodienthoai" name="sodienthoai" value="<?php echo $sodienthoai; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gmail">Gmail:</label>
                                <input type="text" class="form-control" id="gmail" name="gmail" value="<?php echo $gmail; ?>">
                            </div>
                            
                            <input type="hidden" name="mataikhoan" value="<?php echo $mataikhoan; ?>">
                            <input type="hidden" name="madocgia1" value="<?php echo $ma; ?>">
                            <div class="form-group col-md-6">
                                <label for="tendangnhap">Tên đăng nhập:</label>
                                <input type="text" class="form-control" id="tendangnhap" name="tendangnhap" value="<?php echo $tendangnhap; ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="matkhau">Mật khẩu:</label>
                                <input type="text" class="form-control" id="matkhau" name="matkhau" value="<?php echo $matkhau; ?>">
                            </div>
                            <input type="hidden" name="thanphan" value="<?php echo $thanphan; ?>">
                            
                            <div class="form-group col-md-6">
                                <button type="submit" name="btnSave" class="btn btn-primary btn-block">Lưu</button>
                            </div>
                            <div class="form-group col-md-6">
                                <a class="btn btn-secondary btn-block" href="cuahang.php">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Link to Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

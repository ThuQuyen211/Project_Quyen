<?php
include('../ketnoi.php');
$mataikhoan = $_GET["mataikhoan"];
$sql = "DELETE FROM taikhoan WHERE mataikhoan = '$mataikhoan'";
if (mysqli_query($conn, $sql)){
    header('location: danhsachtaikhoan.php');
}
else{
    $result = "Xóa không thành công" . mysqli_error($conn);
}
?>
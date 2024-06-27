<?php
include('../ketnoi.php');
$matheloai = $_GET["matheloai"];
$sql = "DELETE FROM theloai WHERE matheloai = '$matheloai'";
if (mysqli_query($conn, $sql)){
    header('location: danhsachtheloai.php');
}
else{
    $result = "Xóa không thành công" . mysqli_error($conn);
}
?>
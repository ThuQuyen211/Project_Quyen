<?php
include('../ketnoi.php');
$manhaxuatban = $_GET["manhaxuatban"];
$sql = "DELETE FROM nhaxuatban WHERE manhaxuatban = '$manhaxuatban'";
if (mysqli_query($conn, $sql)){
    header('location: danhsachnhaxuatban.php');
}
else{
    $result = "Xóa không thành công" . mysqli_error($conn);
}
?>
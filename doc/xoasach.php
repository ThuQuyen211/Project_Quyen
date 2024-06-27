<?php
include('../ketnoi.php');
$masach = $_GET["masach"];
$sql = "DELETE FROM sach WHERE masach = '$masach'";
if (mysqli_query($conn, $sql)){
    header('location: danhsachsach.php');
}
else{
    $result = "Xóa không thành công" . mysqli_error($conn);
}
?>
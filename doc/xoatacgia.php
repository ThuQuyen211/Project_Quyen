<?php
include('../ketnoi.php');
$matacgia = $_GET["matacgia"];
$sql = "DELETE FROM tacgia WHERE matacgia = '$matacgia'";
if (mysqli_query($conn, $sql)){
    header('location: danhsachtacgia.php');
}
else{
    $result = "Xóa không thành công" . mysqli_error($conn);
}
?>
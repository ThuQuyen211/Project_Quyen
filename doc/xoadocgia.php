<?php
include('../ketnoi.php');
$madocgia = $_GET["madocgia"];
$sql = "DELETE FROM docgia WHERE madocgia = '$madocgia'";
if (mysqli_query($conn, $sql)){
    header('location: danhsachdocgia.php');
}
else{
    $result = "Xóa không thành công" . mysqli_error($conn);
}
?>
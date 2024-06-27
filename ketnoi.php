<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "quanlytailieu";
global $conn;

$conn = mysqli_connect($servername,$username,$password);
if(!$conn){
    die('Không thể kết nối ' . msqli_error($conn));
}
mysqli_select_db($conn,$db);
?>
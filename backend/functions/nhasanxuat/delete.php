<?php
// Truy vấn database
// 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
include_once(__DIR__ . '/../../../dbconnect.php');

$nsx_ma = $_GET['nsx_ma'];

$sqlDelete = "DELETE FROM nhasanxuat WHERE nsx_ma=$nsx_ma;";
$result = mysqli_query($conn, $sqlDelete);

mysqli_close($conn);

// Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
// Điều hướng bằng Javascript
echo '<script>location.href = "index.php";</script>';
?>


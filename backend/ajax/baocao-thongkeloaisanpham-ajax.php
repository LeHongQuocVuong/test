<?php
    // Truy vấn database để lấy danh sách
    // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
    include_once(__DIR__ . '/../../dbconnect.php');

    // 2. Chuẩn bị câu truy vấn $sql
    $sqlquantityThongKeLoaiSanPham = <<<EOT
    SELECT lsp.lsp_ten as TenLoaiSanPham, COUNT(sp.sp_ten) AS quantity
    FROM sanpham AS sp
    JOIN loaisanpham AS lsp ON sp.lsp_ma = lsp.lsp_ma
    GROUP BY lsp.lsp_ten;
EOT;

    // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
    $result = mysqli_query($conn, $sqlquantityThongKeLoaiSanPham);

    // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
    // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
    // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
    $dataquantityThongKeLoaiSanPham = [];
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $dataquantityThongKeLoaiSanPham[] = array(
            'TenLoaiSanPham' => $row['TenLoaiSanPham'],
            'quantity' => $row['quantity'] 
        );
    }
    // Dữ liệu JSON, array PHP -> JSON 
    echo json_encode($dataquantityThongKeLoaiSanPham);
?>
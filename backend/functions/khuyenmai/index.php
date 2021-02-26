<!-- Nhúng file cấu hình để xác định được Tên và Tiêu đề của trang hiện tại người dùng đang truy cập -->
<?php include_once(__DIR__ . '/../../layouts/config.php'); ?>
<?php
// hàm `session_id()` sẽ trả về giá trị SESSION_ID (tên file session do Web Server tự động tạo)
// - Nếu trả về Rỗng hoặc NULL => chưa có file Session tồn tại
if (session_id() === '') {
  // Yêu cầu Web Server tạo file Session để lưu trữ giá trị tương ứng với CLIENT (Web Browser đang gởi Request)
  session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Nhúng file quản lý phần HEAD -->
  <?php include_once(__DIR__ . '/../../layouts/head.php'); ?>
</head>

<body class="d-flex flex-column h-100">
  <!-- header -->
  <?php include_once(__DIR__ . '/../../layouts/partials/header.php'); ?>
  <!-- end header -->

  <div class="container-fluid">
    <div class="row">
      <!-- sidebar -->
      <?php include_once(__DIR__ . '/../../layouts/partials/sidebar.php'); ?>
      <!-- end sidebar -->

      <main role="main" class="col-md-10 ml-sm-auto px-4 mb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Danh sách Chương trình khuyến mãi</h1>
        </div>

        <!-- Block content -->
        <?php
        // Truy vấn database để lấy danh sách
        // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
        include_once(__DIR__. '/../../../dbconnect.php');

        // 2. Chuẩn bị câu truy vấn $sql
        $stt=1;
        $sql = "SELECT km_ma, km_ten, km_noidung, km_tungay, km_denngay	FROM khuyenmai;";

        // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
        $result = mysqli_query($conn, $sql);
        // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
        // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
        // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
        $ds_khuyenmai = [];
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          $ds_khuyenmai[] = array(
            'km_ma' => $row['km_ma'],
            'km_ten' => $row['km_ten'],
            'km_noidung' => $row['km_noidung'],
            'km_tungay' => $row['km_tungay'],
            'km_denngay' => $row['km_denngay']
          );
        }
        ?>

        <!-- Nút thêm mới, bấm vào sẽ hiển thị form nhập thông tin Thêm mới -->
        <a href="create.php" class="btn btn-primary">Thêm mới</a>
        <table id="tableSP" class="table table-bordered table-hover mt-2">
          <thead class="thead-dark">
          <tr>
              <th>STT</th>
              <th>Mã khuyến mãi</th>
              <th>Tên khuyến mãi</th>
              <th>Nội dung khuyến mãi</th>
              <th>Từ ngày</th>
              <th>Đến ngày</th>
              <th>Hành động</th>
          </tr>
          </thead>
          <tbody>
            <?php
              foreach ($ds_khuyenmai as $km):?>
                <tr>
                  <td><?= $stt; $stt++?></td>
                  <td><?= $km['km_ma']?></td>
                  <td><?= $km['km_ten']?></td>
                  <td><?= $km['km_noidung']?></td>
                  <td><?= $km['km_tungay']?></td>
                  <td><?= $km['km_denngay']?></td>
                  <td>
                    <!-- Nút sửa, bấm vào sẽ hiển thị form hiệu chỉnh thông tin dựa vào khóa chính `km_ma` -->
                    <a href="edit.php?km_ma=<?= $km['km_ma'] ?>" class="btn btn-warning">
                      <span data-feather="edit"></span> Sửa
                    </a>
                    <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `km_ma` -->                    
                    <button class="btn btn-danger btnDelete" data-km_ma="<?= $km['km_ma'] ?>">Xóa</button>
                  </td>
                  
                </tr>
              <?php endforeach ?>
          </tbody>
        
        </table>
        <!-- End block content -->
      </main>
    </div>
  </div>

  <!-- footer -->
  <?php include_once(__DIR__ . '/../../layouts/partials/footer.php'); ?>
  <!-- end footer -->

  <!-- Nhúng file quản lý phần SCRIPT JAVASCRIPT -->
  <?php include_once(__DIR__ . '/../../layouts/scripts.php'); ?>

  <!-- SweetAlert -->
  <script src="/test/assets/vendor/sweetalert/sweetalert.min.js"></script>
  <!-- Các file Javascript sử dụng riêng cho trang này, liên kết tại đây -->
  <!-- <script src="..."></script> -->

  <script>
    $(document).ready( function () {
      // Cảnh báo khi xóa
        // 1. Đăng ký sự kiện click cho các phần tử (element) đang áp dụng class .btnDelete
        
        $('.btnDelete').click(function() {
            // Click hanlder
            // Hiện cảnh báo khi bấm nút xóa
            swal({
                title: "Bạn có chắc chắn muốn xóa?",
                text: "Một khi đã xóa, không thể phục hồi....",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                
                if (willDelete) { // Nếu đồng ý xóa
                    
                    // 2. Lấy giá trị của thuộc tính (custom attribute HTML) 'km_ma'
                    
                    var km_ma = $(this).data('km_ma');
                    var url = "delete.php?km_ma=" + km_ma;
                    
                    // Điều hướng qua trang xóa với REQUEST GET, có tham số km_ma=...
                    location.href = url;

                } else {
                    swal("Cẩn thận hơn nhé!");
                }
            });
          });
      
    } );
  </script>
</body>

</html>
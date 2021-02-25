<!-- Nhúng file cấu hình để xác định được Tên và Tiêu đề của trang hiện tại người dùng đang truy cập -->
<?php include_once(__DIR__ . '/../../layouts/config.php'); ?>

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
          <h1 class="h2">Danh sách các Loại sản phẩm</h1>
        </div>

        <!-- Block content -->
        <?php
        // Truy vấn database để lấy danh sách
        // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
        include_once(__DIR__. '/../../../dbconnect.php');

        // 2. Chuẩn bị câu truy vấn $sql
        $stt=1;
        $sql = "SELECT lsp_ma, lsp_ten, lsp_mota	FROM loaisanpham;";

        // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
        $result = mysqli_query($conn, $sql);
        // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
        // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
        // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
        $ds_loaisanpham = [];
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          $ds_loaisanpham[] = array(
            'lsp_ma' => $row['lsp_ma'],
            'lsp_ten' => $row['lsp_ten'],
            'lsp_mota' => $row['lsp_mota']
          );
        }
        ?>

        <!-- Nút thêm mới, bấm vào sẽ hiển thị form nhập thông tin Thêm mới -->
        <a href="create.php" class="btn btn-primary">Thêm mới</a>
        <table id="tableSP" class="table table-bordered table-hover mt-2">
          <thead class="thead-dark">
          <tr>
              <th>STT</th>
              <th>Mã loại sản phẩm</th>
              <th>Tên loại sản phẩm</th>
              <th>Mô tả loại sản phẩm</th>
              <th>Hành động</th>
          </tr>
          </thead>
          <tbody>
            <?php
              foreach ($ds_loaisanpham as $lsp):?>
                <tr>
                  <td><?= $stt; $stt++?></td>
                  <td><?= $lsp['lsp_ma']?></td>
                  <td><?= $lsp['lsp_ten']?></td>
                  <td><?= $lsp['lsp_mota']?></td>
                  <td>
                    <!-- Nút sửa, bấm vào sẽ hiển thị form hiệu chỉnh thông tin dựa vào khóa chính `lsp_ma` -->
                    <a href="edit.php?lsp_ma=<?= $lsp['lsp_ma'] ?>" class="btn btn-warning">
                      <span data-feather="edit"></span> Sửa
                    </a>
                    <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `lsp_ma` -->                    
                    <button class="btn btn-danger btnDelete" data-lsp_ma="<?= $lsp['lsp_ma'] ?>">Xóa</button>
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
  <script src="/back_end/assets/vendor/sweetalert/sweetalert.min.js"></script>
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
                    
                    // 2. Lấy giá trị của thuộc tính (custom attribute HTML) 'lsp_ma'
                    
                    var lsp_ma = $(this).data('lsp_ma');
                    var url = "delete.php?lsp_ma=" + lsp_ma;
                    
                    // Điều hướng qua trang xóa với REQUEST GET, có tham số lsp_ma=...
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
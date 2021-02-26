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
  <!-- DataTable CSS -->
  <link href="/test/assets/vendor/DataTables/datatables.css" type="text/css" rel="stylesheet" />
  <link href="/test/assets/vendor/DataTables/Buttons-1.6.5/css/buttons.bootstrap4.min.css" type="text/css" rel="stylesheet" />
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
          <h1 class="h2">Danh sách Khách hàng</h1>
        </div>

        <!-- Block content -->
        <?php
        // Truy vấn database để lấy danh sách
        // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
        include_once(__DIR__. '/../../../dbconnect.php');

        // 2. Chuẩn bị câu truy vấn $sql
        $stt=1;
        $sql = <<<EOT
        SELECT kh_tendangnhap, kh_matkhau, kh_ten, kh_gioitinh, kh_diachi, kh_dienthoai, kh_email, kh_ngaysinh, kh_thangsinh, kh_namsinh, kh_cmnd, kh_quantri
	      FROM khachhang;
EOT;

        // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
        $result = mysqli_query($conn, $sql);
        // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
        // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
        // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
        $ds_khachhang = [];
        
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          $ds_khachhang[] = array(
            'stt' => $stt,
            'kh_tendangnhap' => $row['kh_tendangnhap'],
            'kh_matkhau' => $row['kh_matkhau'],
            'kh_ten' => $row['kh_ten'],
            'kh_gioitinh' => $row['kh_gioitinh'],
            'kh_diachi' => $row['kh_diachi'],
            'kh_dienthoai' => $row['kh_dienthoai'],
            'kh_email' => $row['kh_email'],
            'kh_ngaysinh' => $row['kh_ngaysinh'],
            'kh_thangsinh' => $row['kh_thangsinh'],
            'kh_namsinh' => $row['kh_namsinh'],
            'kh_cmnd' => $row['kh_cmnd'],
            'kh_quantri' => $row['kh_quantri']            
          );
          $stt = $stt + 1;
        }
        ?>

        <!-- Nút thêm mới, bấm vào sẽ hiển thị form nhập thông tin Thêm mới -->
        <a href="create.php" class="btn btn-primary">Thêm mới</a>
        <div class="table-responsive">
          <table id="tableSP" class="table table-bordered table-hover mt-2 table-sm">
            <thead class="thead-dark">
            <tr>
                <th>STT</th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Tên</th>
                <th>Giới tính</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
                <th>Ngày sinh</th>
                <th>Tháng sinh</th>
                <th>Năm sinh</th>
                <th>Chứng minh nhân dân</th>
                <th>Quản trị</th>
                
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
              <?php
                foreach ($ds_khachhang as $kh):?>
                  <tr>
                    <td><?= $kh['stt']?></td>
                    <td><?= $kh['kh_tendangnhap']?></td>
                    <td><?= $kh['kh_matkhau']?></td>
                    <td><?= $kh['kh_ten']?></td>
                    <td><?php if($kh['kh_gioitinh']) echo "Nam"; else echo"Nữ";?></td>
                    <td><?= $kh['kh_diachi']?></td>                    
                    <td><?= $kh['kh_dienthoai']?></td>
                    <td><?= $kh['kh_email']?></td>
                    <td><?= $kh['kh_ngaysinh']?></td>
                    <td><?= $kh['kh_thangsinh']?></td>
                    <td><?= $kh['kh_namsinh']?></td>
                    <td><?= $kh['kh_cmnd']?></td>
                    <td><?php if($kh['kh_quantri']) echo "Quản trị"; else echo"Khách hàng";?></td>
                    <td>
                      <!-- Nút sửa, bấm vào sẽ hiển thị form hiệu chỉnh thông tin dựa vào khóa chính `kh_tendangnhap` -->
                      <a href="edit.php?kh_tendangnhap=<?= $kh['kh_tendangnhap'] ?>" class="btn btn-warning">
                        <span data-feather="edit"></span> Sửa
                      </a>
                      <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `kh_tendangnhap` -->
                      <button class="btn btn-danger btnDelete" data-kh_tendangnhap="<?= $kh['kh_tendangnhap'] ?>">Xóa</button>
                    </td>
                    
                  </tr>
                <?php endforeach ?>
            </tbody>
          
          </table>
        </div>
        <!-- End block content -->
      </main>
    </div>
  </div>

  <!-- footer -->
  <?php include_once(__DIR__ . '/../../layouts/partials/footer.php'); ?>
  <!-- end footer -->

  <!-- Nhúng file quản lý phần SCRIPT JAVASCRIPT -->
  <?php include_once(__DIR__ . '/../../layouts/scripts.php'); ?>
  <!-- DataTable JS -->
  <script src="/test/assets/vendor/DataTables/datatables.min.js"></script>
  <script src="/test/assets/vendor/DataTables/Buttons-1.6.5/js/buttons.bootstrap4.min.js  "></script>
  <script src="/test/assets/vendor/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
  <script src="/test/assets/vendor/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
  <!-- SweetAlert -->
  <script src="/test/assets/vendor/sweetalert/sweetalert.min.js"></script>  

  <script>
    $(document).ready( function () {
      var eventFiredBtnDeleteSweetAlert = function(jE) {     
        $(jE).on('click', '.btnDelete', function(e) {
            e.preventDefault();
            var btnDelete = $(this);
            swal({
              title: "Bạn có chắc chắn muốn xóa?",
              text: "Một khi đã xóa, không thể phục hồi....",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            }).then((willDelete) => {
                    
                    if (willDelete) { // Nếu đồng ý xóa
                        
                        // 2. Lấy giá trị của thuộc tính (custom attribute HTML) 'kh_tendangnhap'
                        // var kh_tendangnhap = $(this).attr('data-kh_tendangnhap');
                        var kh_tendangnhap = $(this).data('kh_tendangnhap');
                        var url = "delete.php?kh_tendangnhap=" + kh_tendangnhap;
                        
                        // Điều hướng qua trang xóa với REQUEST GET, có tham số kh_tendangnhap=...
                        location.href = url;

                    } else {
                        swal("Cẩn thận hơn nhé!");
                    }
                });
        });
      };

    $('#tableSP').on('draw.dt', function () {
          console.log('draw.dt');
          eventFiredBtnDeleteSweetAlert(this);
      }).DataTable({    
        responsive: false,   
        dom: 'Blfrtip',
        buttons: [
            'copy', 'excel', 'pdf'
        ]
      });
  } );
    </script>
</body>

</html>
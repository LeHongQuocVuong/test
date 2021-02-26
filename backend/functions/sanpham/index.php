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
          <h1 class="h2">Danh sách Sản phẩm</h1>
        </div>

        <!-- Block content -->
        <?php
        // Truy vấn database để lấy danh sách
        // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
        include_once(__DIR__. '/../../../dbconnect.php');

        // 2. Chuẩn bị câu truy vấn $sql
        $stt=1;
        $sql = <<<EOT
        SELECT *
        FROM sanpham AS sp
        JOIN loaisanpham AS lsp ON sp.lsp_ma = lsp.lsp_ma
        JOIN nhasanxuat AS nsx ON sp.nsx_ma = nsx.nsx_ma
        LEFT JOIN khuyenmai AS km on sp.km_ma = km.km_ma;
EOT;

        // 3. Thực thi câu truy vấn SQL để lấy về dữ liệu
        $result = mysqli_query($conn, $sql);
        // 4. Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
        // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
        // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
        $ds_sanpham = [];
        
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
          $km_thongtin = 'Không';
          if(!empty($row['km_ma'])){
            $km_thongtin = sprintf(
              "Khuyến mãi %s, nội dung %s, thời gian: %s-%s",
              $row['km_ten'],
              $row['kh_noidung'],
              date('d/m/Y' , strtotime($row['kh_tungay'])),
              date('d/m/Y' , strtotime($row['km_denngay']))
            );
          }
          $z=$row['sp_ma'];
          
          //Chi tiết sản phẩm
          $sqlChitiet = "select * from chitietsanpham where sp_ma =". $z;
          // $sqlChitiet = "SELECT * FROM chitietsanpham WHERE sp_ma = 51;";
          $resultChitiet = mysqli_query($conn, $sqlChitiet);
          $rowChitiet = mysqli_fetch_array($resultChitiet, MYSQLI_ASSOC);
          // var_dump(!is_null($rowChitiet['manhinh'])); die;
          
          $mota = "<ul>";
          if(isset($rowChitiet['manhinh'])) {
            $mota = $mota . "<li>Màn hình: " . $rowChitiet['manhinh'] . "</li>";
          }
          // var_dump($rowChitiet['manhinh']); die;
          // var_dump($mota); die;
          if(isset($rowChitiet['os'])) {
            $mota = $mota . "<li>Hệ điều hành: " . $rowChitiet['os'] . "</li>";
          }
          if(isset($rowChitiet['camera_sau'])) {
            $mota = $mota . "<li>Camera sau: " . $rowChitiet['camera_sau'] . "</li>";
          }
          if(isset($rowChitiet['camera_truoc'])) {
            $mota = $mota . "<li>Camera trước: " . $rowChitiet['camera_truoc'] . "</li>";
          }
          if(isset($rowChitiet['cpu'])) {
            $mota = $mota . "<li>CPU: " . $rowChitiet['cpu'] . "</li>";
          }
          if(isset($rowChitiet['ram'])) {
            $mota = $mota . "<li>RAM: " . $rowChitiet['ram'] . "</li>";
          }
          if(isset($rowChitiet['ocung'])) {
            $mota = $mota . "<li>Bộ nhớ: " . $rowChitiet['ocung'] . "</li>";
          }
          if(isset($rowChitiet['pin'])) {
            $mota = $mota . "<li>Pin: " . $rowChitiet['pin'] . "</li>";
          }

          $mota = $mota . "</ul>";

          

          $ds_sanpham[] = array(
            'stt' => $stt,
            'sp_ma' => $row['sp_ma'],
            'sp_ten' => $row['sp_ten'],
            // Sử dụng hàm number_format(số tiền, số lẻ thập phân, dấu phân cách số lẻ, dấu phân cách hàng nghìn) 
            // để định dạng số khi hiển thị trên giao diện. 
            // Vd: 15800000 -> format thành 15,800,000.66 vnđ
            'sp_gia' => number_format($row['sp_gia'], 2, ".", ",") . ' vnđ',
            'sp_giacu' => number_format($row['sp_giacu'], 2, ".", ",") . ' vnđ',
            // 'sp_mota_ngan' => $row['sp_mota_ngan'],
            // 'sp_mota_chitiet' => $row['sp_mota_chitiet'],
            'mota' => $mota,
            'sp_ngaycapnhat' => date('d/m/Y H:i:s', strtotime($row['sp_ngaycapnhat'])),
            'sp_soluong' => number_format($row['sp_soluong'], 0, ".", ","),
            'lsp_ma' => $row['lsp_ma'],
            'nsx_ma' => $row['nsx_ma'],
            'km_ma' => $row['km_ma'],
            // Các cột dữ liệu lấy từ liên kết khóa ngoại
            'lsp_ten' => $row['lsp_ten'],
            'nsx_ten' => $row['nsx_ten'],
            'km_thongtin' => $km_thongtin,
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
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Giá cũ</th>
                <th>Mô tả</th>
                <!-- <th>Mô tả ngắn</th>
                <th>Mô tả chi tiết</th> -->
                <th>Ngày cập nhật</th>
                <th>Số lượng</th>
                <th>Loại sản phẩm</th>
                <th>Nhà sản xuất</th>
                <th>Khuyến mãi</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
              <?php
                foreach ($ds_sanpham as $sp):?>
                  <tr>
                    <td><?= $sp['stt']?></td>
                    <td><?= $sp['sp_ma']?></td>
                    <td><?= $sp['sp_ten']?></td>
                    <td><?= $sp['sp_gia']?></td>
                    <td><?= $sp['sp_giacu']?></td>
                    <td><?= $sp['mota']?></td>
                    
                    <td><?= $sp['sp_ngaycapnhat']?></td>
                    <td><?= $sp['sp_soluong']?></td>
                    <td><?= $sp['lsp_ten']?></td>
                    <td><?= $sp['nsx_ten']?></td>
                    <td><?= $sp['km_thongtin']?></td>
                    <td>
                      <!-- Nút sửa, bấm vào sẽ hiển thị form hiệu chỉnh thông tin dựa vào khóa chính `sp_ma` -->
                      <a href="edit.php?sp_ma=<?= $sp['sp_ma'] ?>" class="btn btn-warning">
                        <span data-feather="edit"></span> Sửa
                      </a>
                      <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `sp_ma` -->
                      <button class="btn btn-danger btnDelete" data-sp_ma="<?= $sp['sp_ma'] ?>">Xóa</button>
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
  <!-- Các file Javascript sử dụng riêng cho trang này, liên kết tại đây -->
  <!-- <script src="..."></script> -->

  <script>
    $(document).ready( function () {
      // $('#tableSP').DataTable(
      //   {
      //         dom: 'Blfrtip',
      //         buttons: [
      //             'copy', 'excel', 'pdf'
      //         ]
      //     }
      // );
      // Cảnh báo khi xóa
        // 1. Đăng ký sự kiện click cho các phần tử (element) đang áp dụng class .btnDelete
        
        // $('.btnDelete').click(function() {
        //     // Click hanlder
        //     // Hiện cảnh báo khi bấm nút xóa
        //     swal({
        //         title: "Bạn có chắc chắn muốn xóa?",
        //         text: "Một khi đã xóa, không thể phục hồi....",
        //         icon: "warning",
        //         buttons: true,
        //         dangerMode: true,
        //     })
        //     .then((willDelete) => {
                
        //         if (willDelete) { // Nếu đồng ý xóa
                    
        //             // 2. Lấy giá trị của thuộc tính (custom attribute HTML) 'sp_ma'
        //             // var sp_ma = $(this).attr('data-sp_ma');
        //             var sp_ma = $(this).data('sp_ma');
        //             var url = "delete.php?sp_ma=" + sp_ma;
                    
        //             // Điều hướng qua trang xóa với REQUEST GET, có tham số sp_ma=...
        //             location.href = url;

        //         } else {
        //             swal("Cẩn thận hơn nhé!");
        //         }
        //     });
        //   });

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
                        
                        // 2. Lấy giá trị của thuộc tính (custom attribute HTML) 'sp_ma'
                        // var sp_ma = $(this).attr('data-sp_ma');
                        var sp_ma = $(this).data('sp_ma');
                        var url = "delete.php?sp_ma=" + sp_ma;
                        
                        // Điều hướng qua trang xóa với REQUEST GET, có tham số sp_ma=...
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
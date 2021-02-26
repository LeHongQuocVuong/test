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
          <h1 class="h2">Thêm mới Khuyến mãi</h1>
        </div>

        <!-- Block content -->
        <form action="" method="post" name="frmCreate" id="frmCreate">
          <div class="form-group">
            <label for="km_ten">Tên khuyến mãi</label>
            <input type="text" class="form-control" id="km_ten" name="km_ten" aria-describedby="km_tenHelp">
            <small id="km_tenHelp" class="form-text text-muted">Nhập ít nhất 5 ký tự</small>
          </div>
          <div class="form-group">
            <label for="km_noidung">Nội dung khuyến mãi</label>
            <input type="text" class="form-control" id="km_noidung" name="km_noidung" aria-describedby="km_noidungHelp">
            <small id="km_noidungHelp" class="form-text text-muted">Nhập ít nhất 5 ký tự</small>
          </div>
          <div class="form-group">
            <label for="km_tungay">Từ ngày</label>
            <input type="text" class="form-control" id="km_tungay" name="km_tungay" aria-describedby="km_tungayHelp">
            <small id="km_tungayHelp" class="form-text text-muted">Nhập ngày bắt đầu</small>
          </div>
          <div class="form-group">
            <label for="km_denngay">Đến ngày</label>
            <input type="text" class="form-control" id="km_denngay" name="km_denngay" aria-describedby="km_denngayHelp">
            <small id="km_denngayHelp" class="form-text text-muted">Nhập ngày kết thúc</small>
          </div>
          
          <button class="btn btn-primary" name="btnSave">Lưu dữ liệu</button>
        </form>

        <?php
          // Truy vấn database
          // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
          include_once(__DIR__ . '/../../../dbconnect.php');

          // 2. Nếu người dùng có bấm nút "Lưu dữ liệu"
          if(isset($_POST['btnSave'])){
            // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
            $km_ten = htmlentities($_POST['km_ten']);
            $km_noidung = htmlentities($_POST['km_noidung']);
            $km_tungay = htmlentities($_POST['km_tungay']);
            $km_denngay = htmlentities($_POST['km_denngay']);

            // Kiểm tra ràng buộc dữ liệu (Validation)
            // Tạo biến lỗi để chứa thông báo lỗi
            $errors = [];

            // Validate Khuyến mãi
            // required
            if(empty($km_ten)){
              $errors['km_ten'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $km_ten,
                'msg' => 'Vui lòng nhập tên Khuyến mãi'
              ];
            }
            // minlength 3
            if (!empty($km_ten) && strlen($km_ten) < 5) {
              $errors['km_ten'][] = [
                'rule' => 'minlength',
                'rule_value' => 5,
                'value' => $km_ten,
                'msg' => 'Tên Khuyến mãi phải có ít nhất 5 ký tự'
              ];
            }
            // maxlength 500
            if (!empty($km_ten) && strlen($km_ten) > 500) {
              $errors['km_ten'][] = [
                'rule' => 'maxlength',
                'rule_value' => 500,
                'value' => $km_ten,
                'msg' => 'Tên Khuyến mãi không được vượt quá 500 ký tự'
              ];
            }

            // Validate nội dung
            // required
            if (empty($km_noidung)) {
              $errors['km_noidung'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $km_noidung,
                'msg' => 'Vui lòng nhập nội dung Khuyến mãi'
              ];
            }
            // minlength 3
            if (!empty($km_noidung) && strlen($km_noidung) < 5) {
              $errors['km_noidung'][] = [
                'rule' => 'minlength',
                'rule_value' => 5,
                'value' => $km_noidung,
                'msg' => 'Nội dung khuyến mãi phải có ít nhất 5 ký tự'
              ];
            }
            // maxlength 1000
            if (!empty($km_noidung) && strlen($km_noidung) > 1000) {
              $errors['km_noidung'][] = [
                'rule' => 'maxlength',
                'rule_value' => 1000,
                'value' => $km_noidung,
                'msg' => 'Nội dungkhuyến mãi không được vượt quá 1000 ký tự'
              ];
            }

            // Validate Ngày bắt đầu
            // required
            if(empty($km_tungay)){
              $errors['km_tungay'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $km_tungay,
                'msg' => 'Vui lòng nhập ngày bắt đầu'
              ];
            }
            // Validate Ngày kết thúc
            // required
            if(empty($km_denngay)){
              $errors['km_denngay'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $km_denngay,
                'msg' => 'Vui lòng nhập ngày kết thúc'
              ];
            }
          }
            ?>

          <!-- Nếu có lỗi VALIDATE dữ liệu thì hiển thị ra màn hình 
          - Sử dụng thành phần (component) Alert của Bootstrap
          - Mỗi một lỗi hiển thị sẽ in theo cấu trúc Danh sách không thứ tự UL > LI
          -->
          <?php if (
            isset($_POST['btnSave'])  // Nếu người dùng có bấm nút "Lưu dữ liệu"
            && isset($errors)         // Nếu biến $errors có tồn tại
            && (!empty($errors))      // Nếu giá trị của biến $errors không rỗng
          ) : ?>
            <div id="errors-container" class="alert alert-danger face my-2" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <ul>
                <?php foreach ($errors as $fields) : ?>
                  <?php foreach ($fields as $field) : ?>
                    <li><?php echo $field['msg']; ?></li>
                  <?php endforeach; ?>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <?php
            // Nếu không có lỗi VALIDATE dữ liệu (tức là dữ liệu đã hợp lệ)
            // Tiến hành thực thi câu lệnh SQL Query Database
            // => giá trị của biến $errors là rỗng
            if (
              isset($_POST['btnSave'])  // Nếu người dùng có bấm nút "Lưu dữ liệu"
              && (!isset($errors) || (empty($errors))) // Nếu biến $errors không tồn tại Hoặc giá trị của biến $errors rỗng
            ) {
              // VALIDATE dữ liệu đã hợp lệ
              // Thực thi câu lệnh SQL QUERY
              // Câu lệnh INSERT
              $sql = <<<EOT
              INSERT INTO khuyenmai
              (km_ten, km_noidung, km_tungay, km_denngay)
              VALUES ('$km_ten', '$km_noidung', '$km_tungay', '$km_denngay')
EOT;

              // Thực thi INSERT
              mysqli_query($conn, $sql) or die("<b>Có lỗi khi thực thi câu lệnh SQL: </b>" . mysqli_error($conn) . "<br /><b>Câu lệnh vừa thực thi:</b></br>$sql");

              // Đóng kết nối
              mysqli_close($conn);

              // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
              // Điều hướng bằng Javascript
              echo '<script>location.href = "index.php";</script>';
            }
            ?>
          
          

        <!-- End block content -->
      </main>
    </div>
  </div>

  <!-- footer -->
  <?php include_once(__DIR__ . '/../../layouts/partials/footer.php'); ?>
  <!-- end footer -->

  <!-- Nhúng file quản lý phần SCRIPT JAVASCRIPT -->
  <?php include_once(__DIR__ . '/../../layouts/scripts.php'); ?>

  <!-- Các file Javascript sử dụng riêng cho trang này, liên kết tại đây -->
  <!-- <script src="..."></script> -->

  <script>
  $(document).ready(function() {
    $("#frmCreate").validate({
      rules: {
        km_ten: {
          required: true,
          minlength: 5,
          maxlength: 500
        },
        km_noidung: {
          required: true,
          minlength: 5,
          maxlength: 1000
        },
        km_tungay: {
          required: true
        },
        km_denngay: {
          required: true
        },

      },
      messages: {
        km_ten: {
          required: "Vui lòng nhập tên Khuyến mãi",
          minlength: "Tên Khuyến mãi phải có ít nhất 5 ký tự",
          maxlength: "Tên Khuyến mãi không được vượt quá 500 ký tự"
        },
        km_noidung: {
          required: "Vui lòng nhập mô tả cho Khuyến mãi",
          minlength: "Mô tả cho Khuyến mãi phải có ít nhất 5 ký tự",
          maxlength: "Mô tả cho Khuyến mãi không được vượt quá 1000 ký tự"
        },
        km_tungay: {
          required: "Vui lòng nhập ngày bắt đầu"
          },
          km_denngay: {
          required: "Vui lòng nhập ngày kết thúc"
        },
      },
      errorElement: "em",
      errorPlacement: function(error, element) {
        // Thêm class `invalid-feedback` cho field đang có lỗi
        error.addClass("invalid-feedback");
        if (element.prop("type") === "checkbox") {
          error.insertAfter(element.parent("label"));
        } else {
          error.insertAfter(element);
        }
      },
      success: function(label, element) {},
      highlight: function(element, errorClass, validClass) {
        $(element).addClass("is-invalid").removeClass("is-valid");
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).addClass("is-valid").removeClass("is-invalid");
      }
    });
  });
</script>

</body>

</html>
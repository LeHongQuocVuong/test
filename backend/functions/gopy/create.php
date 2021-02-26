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
          <h1 class="h2">Tạo góp ý</h1>
        </div>

        <?php
        // Truy vấn database
        // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
        include_once(__DIR__ . '/../../../dbconnect.php');

        /* --- 
        --- 2.Truy vấn dữ liệu Chủ đề góp ý 
        --- 
        */
        // Chuẩn bị câu truy vấn Chủ đề góp ý
        $sqlChuDeGopY = "select * from chudegopy";
        // Thực thi câu truy vấn SQL để lấy về dữ liệu
        $resultChuDeGopY = mysqli_query($conn, $sqlChuDeGopY);

        // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
        // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
        // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
        $dataChuDeGopY = [];
        while ($rowChuDeGopY = mysqli_fetch_array($resultChuDeGopY, MYSQLI_ASSOC)) {
            $dataChuDeGopY[] = array(
                'cdgy_ma' => $rowChuDeGopY['cdgy_ma'],
                'cdgy_ten' => $rowChuDeGopY['cdgy_ten']
            );
        }
        ?>

        <!-- Block content -->
        <form action="" method="post" name="frmCreate" id="frmCreate">
        <div class="form-group">
            <label for="gy_hoten">Họ tên</label>
            <input type="text" class="form-control" id="gy_hoten" name="gy_hoten" placeholder="Họ tên">
        </div>
        <div class="form-group">
            <label for="gy_email">Email</label>
            <input type="text" class="form-control" id="gy_email" name="gy_email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="gy_diachi">Địa chỉ</label>
            <input type="text" class="form-control" id="gy_diachi" name="gy_diachi" placeholder="Địa chỉ">
        </div>
        
        <div class="form-group">
            <label for="gy_dienthoai">Điện thoại</label>
            <input type="text" class="form-control" id="gy_dienthoai" name="gy_dienthoai" placeholder="Điện thoại">
        </div>
        <div class="form-group">
            <label for="gy_tieude">Tiêu đề</label>
            <input type="text" class="form-control" id="gy_tieude" name="gy_tieude" placeholder="Tiêu đề góp ý">
        </div>
        <div class="form-group">
            <label for="gy_noidung">Nội dung</label>
            <input type="text" class="form-control" id="gy_noidung" name="gy_noidung" placeholder="Nội dung">
        </div>
        <div class="form-group">
            <label for="gy_ngaygopy">Ngày góp ý</label>
            <input type="text" class="form-control" id="gy_ngaygopy" name="gy_ngaygopy" placeholder="Ngày góp ý">
        </div>
        
        
        <div class="form-group">
            <label for="cdgy_ma">Chủ đề góp ý</label>
            <select class="form-control" id="cdgy_ma" name="cdgy_ma">
                <?php foreach ($dataChuDeGopY as $chudegopy) : ?>
                    <option value="<?= $chudegopy['cdgy_ma'] ?>">
                      <?= $chudegopy['cdgy_ten'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <button class="btn btn-primary" name="btnSave">Lưu dữ liệu</button>
        </form>

        <?php
          // 2. Nếu người dùng có bấm nút Đăng ký thì thực thi câu lệnh UPDATE
          if (isset($_POST['btnSave'])) {
            // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
            $gy_hoten = htmlentities($_POST['gy_hoten']);
            $gy_email = htmlentities($_POST['gy_email']);
            $gy_diachi = htmlentities($_POST['gy_diachi']);            
            $gy_dienthoai = htmlentities($_POST['gy_dienthoai']);
            $gy_tieude = htmlentities($_POST['gy_tieude']);
            $gy_noidung = htmlentities($_POST['gy_noidung']);
            $gy_ngaygopy = htmlentities($_POST['gy_ngaygopy']);
            
            $cdgy_ma = $_POST['cdgy_ma'];
            
            // Kiểm tra ràng buộc dữ liệu (Validation)
            // Tạo biến lỗi để chứa thông báo lỗi
            $errors = [];

            // Validate tên người góp ý_____________
            // required
            if(empty($gy_hoten)){
              $errors['gy_hoten'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $gy_hoten,
                'msg' => 'Vui lòng nhập tên người góp ý'
              ];
            }
            // minlength 5
            if (!empty($gy_hoten) && strlen($gy_hoten) < 5) {
              $errors['gy_hoten'][] = [
                'rule' => 'minlength',
                'rule_value' => 5,
                'value' => $gy_hoten,
                'msg' => 'tên người góp ý phải có ít nhất 5 ký tự'
              ];
            }
            // maxlength 100
            if (!empty($gy_hoten) && strlen($gy_hoten) > 100) {
              $errors['gy_hoten'][] = [
                'rule' => 'maxlength',
                'rule_value' => 100,
                'value' => $gy_hoten,
                'msg' => 'tên người góp ý không được vượt quá 100 ký tự'
              ];
            }

            // Validate Email________________________
            // required
            if (empty($gy_email)) {
              $errors['gy_email'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $gy_email,
                'msg' => 'Vui lòng nhập Email góp ý'
              ];
            }
            
            // Validate địa chỉ___________________
            // required
            if (empty($gy_diachi)) {
              $errors['gy_diachi'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $gy_diachi,
                'msg' => 'Vui lòng nhập địa chỉ'
              ];
            }   

            // Validate số điện thoại___________________
            // required
            if(empty($gy_dienthoai)){
              $errors['gy_dienthoai'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $gy_dienthoai,
                'msg' => 'Vui lòng nhập số điện thoại'
              ];
            }
            
            // Validate tiêu đề góp ý
            // required
            if(empty($gy_tieude)){
              $errors['gy_tieude'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $gy_tieude,
                'msg' => 'Vui lòng nhập tiêu đề góp ý'
              ];
            }

            // Validate nội dung góp ý
            // required
            if(empty($gy_noidung)){
              $errors['gy_noidung'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $gy_noidung,
                'msg' => 'Vui lòng nhập nội dung góp ý'
              ];
            }

            // Validate ngày góp ý
            // required
            if(empty($gy_ngaygopy)){
              $errors['gy_ngaygopy'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $gy_ngaygopy,
                'msg' => 'Vui lòng nhập ngày góp ý'
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
              <button type="button" class="clgy_tieudee" data-dismiss="alert" aria-label="Clgy_tieudee">
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
                    // 2. Nếu người dùng có bấm nút Đăng ký thì thực thi câu lệnh UPDATE
          // Nếu không có lỗi VALIDATE dữ liệu (tức là dữ liệu đã hợp lệ)
            // Tiến hành thực thi câu lệnh SQL Query Database
            // => giá trị của biến $errors là rỗng
            if (isset($_POST['btnSave'])  // Nếu người dùng có bấm nút "Lưu dữ liệu"
            && (!isset($errors) || (empty($errors))) // Nếu biến $errors không tồn tại Hoặc giá trị của biến $errors rỗng
          ) {
            // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
            
            // Câu lệnh Update
            $sql = <<<EOT
            INSERT INTO gopy
            (gy_hoten, gy_email, gy_diachi, gy_dienthoai, gy_tieude, gy_noidung, gy_ngaygopy, cdgy_ma)
            VALUES ('$gy_hoten', '$gy_email', '$gy_diachi', '$gy_dienthoai', '$gy_tieude', '$gy_noidung', '$gy_ngaygopy', $cdgy_ma);
EOT;
            mysqli_query($conn, $sql);            

            // Đóng kết nối
            mysqli_close($conn);

            // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
            echo "<script>location.href = 'index.php';</script>";
          
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
        gy_hoten: {
          required: true,
          minlength: 5,
          maxlength: 100
        },
        gy_email: {
          required: true,
          number: true,
          min: 0
        },
        gy_diachi: {
          required: true,
          number: true,
          min: 0
        },
        gy_dienthoai: {
          required: true
        },
        gy_tieude: {
          required: true          
        },
        gy_noidung: {
          required: true          
        },
        gy_ngaygopy: {
          required: true          
        },
        cpu: {
          required: true          
        },
        ram: {
          required: true          
        },
        ocung: {
          required: true          
        },
        pin: {
          required: true          
        },
        gy_dienthoai: {
          required: true
        },
        : {
          required: true,
          number: true,
          min: 0
        }
      },
      messages: {
        gy_hoten: {
          required: "Vui lòng nhập tên người góp ý",
          min: "Họ tên phải có ít nhất 5 ký tự",
          maxlength: "Họ tên không được vượt quá 100 ký tự"
        },
        gy_email: {
          required: "Vui lòng nhập Email góp ý",
          number: "Email phải là số",
          min: "Vui lòng nhập Email góp ý lớn hơn 0"
        },
        gy_diachi: {
          required: "Vui lòng nhập địa chỉ",
          number: "Địa chỉ phải là số",
          min: "Địa chỉ phải lớn hơn 0"
        },
        gy_dienthoai: {
          required: "Vui lòng nhập mô tả góp ý"
          },
        gy_tieude: {
          required: "Vui lòng nhập tiêu đề góp ý"
          },
        gy_noidung: {
          required: "Vui lòng nhập nội dung góp ý"
          },
          gy_ngaygopy: {
          required: "Vui lòng nhập ngày góp ý"
          },
          cpu: {
          required: "Vui lòng nhập CPU góp ý"
          },
        ram: {
          required: "Vui lòng nhập RAM góp ý"
          },
          ocung: {
          required: "Vui lòng nhập ổ cứng góp ý"
          },
        pin: {
          required: "Vui lòng nhập pin góp ý"
          },
        
        gy_dienthoai: {
          required: "Vui lòng nhập ngày cập nhật góp ý"
        },
        : {
          required: "Vui lòng nhập số lượng góp ý",
          number: " góp ý phải là số",
          min: " góp ý phải lớn hơn 0"
        }
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
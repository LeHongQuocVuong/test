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
          <h1 class="h2">Sửa thông tin khách hàng</h1>
        </div>

        <?php
        // Truy vấn database
        // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
        include_once(__DIR__ . '/../../../dbconnect.php');
        $kh_tendangnhap = $_GET['kh_tendangnhap'];
        $select = "SELECT *	FROM khachhang WHERE kh_tendangnhap = '$kh_tendangnhap';";
        $resultSelect = mysqli_query($conn,$select);
        $selectRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);

        ?>

        <!-- Block content -->
        <form action="" method="post" name="frmCreate" id="frmCreate">
        
        <div class="form-group">
            <label for="kh_matkhau">Mật khẩu</label>
            <input type="text" class="form-control" id="kh_matkhau" name="kh_matkhau" placeholder="Mật khẩu" value="<?= $selectRow['kh_matkhau'] ?>">
        </div>
        <div class="form-group">
            <label for="kh_ten">Tên khách hàng</label>
            <input type="text" class="form-control" id="kh_ten" name="kh_ten" placeholder="Tên khách hàng" value="<?= $selectRow['kh_ten'] ?>">
        </div>
        
        <div class="form-group">
          <label>Giới tính</label><br />
          <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="kh_gioitinh" id="kh_gioitinh-1" class="custom-control-input" value="1" <?php if($selectRow['kh_gioitinh']==1) echo "checked"; ?>>
              <label class="custom-control-label" for="kh_gioitinh-1">Nam</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="kh_gioitinh" id="kh_gioitinh-2" class="custom-control-input" value="0" <?php if($selectRow['kh_gioitinh']==0) echo "checked"; ?>>
              <label class="custom-control-label" for="kh_gioitinh-2">Nữ</label>
          </div>
      </div>

        <div class="form-group">
            <label for="kh_diachi">Địa chỉ</label>
            <input type="text" class="form-control" id="kh_diachi" name="kh_diachi" placeholder="Địa chỉ" value="<?= $selectRow['kh_diachi'] ?>">
        </div>
        <div class="form-group">
            <label for="kh_dienthoai">Điện thoại</label>
            <input type="text" class="form-control" id="kh_dienthoai" name="kh_dienthoai" placeholder="Điện thoại" value="<?= $selectRow['kh_dienthoai'] ?>">
        </div>
        
        <div class="form-group">
            <label for="kh_email">Email</label>
            <input type="text" class="form-control" id="kh_email" name="kh_email" placeholder="Email"value="<?= $selectRow['kh_email'] ?>">
        </div>

        <div class="form-group">
          <label>Ngày sinh</label>
            <select name="kh_ngaysinh" id="kh_ngaysinh" class="form-control">
            <option value="">Vui lòng chọn Ngày sinh</option>
                <?php for ($i=1; $i<=31; $i++) : ?>
                    <option value="<?= $i ?>"<?php if($selectRow['kh_ngaysinh']==$i) echo "selected"; ?>><?= $i ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group">
          <label>Tháng sinh</label>
            <select name="kh_thangsinh" id="kh_thangsinh" class="form-control">
            <option value="">Vui lòng chọn Tháng sinh</option>
                <?php for ($i=1; $i<=12; $i++) : ?>
                    <option value="<?= $i ?>"<?php if($selectRow['kh_thangsinh']==$i) echo "selected"; ?>><?= "Tháng " . $i ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group">
          <label>Năm sinh</label>
            <select name="kh_namsinh" id="kh_namsinh" class="form-control">
            <option value="">Vui lòng chọn Năm sinh</option>
                <?php for ($i=2021; $i>=1900; $i--) : ?>
                    <option value="<?= $i ?>"<?php if($selectRow['kh_namsinh']==$i) echo "selected"; ?>><?= $i ?></option>
                <?php endfor; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="kh_cmnd">Chứng minh nhân dân</label>
            <input type="text" class="form-control" id="kh_cmnd" name="kh_cmnd" placeholder="Chứng minh nhân dân"value="<?= $selectRow['kh_cmnd'] ?>">
        </div>

        <div class="form-group">
          <label>Quản trị</label><br />
          <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="kh_quantri" id="kh_quantri-1" class="custom-control-input" value="0" <?php if($selectRow['kh_quantri']==0) echo "checked"; ?>>
              <label class="custom-control-label" for="kh_quantri-1">Khách hàng</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" name="kh_quantri" id="kh_quantri-2" class="custom-control-input" value="1" <?php if($selectRow['kh_quantri']==1) echo "checked"; ?>>
              <label class="custom-control-label" for="kh_quantri-2">Quản trị</label>
          </div>
        </div>

        <button class="btn btn-primary" name="btnSave">Lưu dữ liệu</button>
        </form>

        <?php
        // 2. Nếu người dùng có bấm nút "Lưu dữ liệu"
          if(isset($_POST['btnSave'])){
            // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
            // $kh_tendangnhap = htmlentities($_POST['kh_tendangnhap']);
            $kh_matkhau = htmlentities($_POST['kh_matkhau']);
            $kh_ten = htmlentities($_POST['kh_ten']);
            $kh_gioitinh = htmlentities($_POST['kh_gioitinh']);
            // var_dump($kh_gioitinh);die;
            $kh_diachi = htmlentities($_POST['kh_diachi']);
            $kh_dienthoai = htmlentities($_POST['kh_dienthoai']);
            $kh_email = htmlentities($_POST['kh_email']);
            $kh_ngaysinh = htmlentities($_POST['kh_ngaysinh']);
            $kh_thangsinh = htmlentities($_POST['kh_thangsinh']);
            $kh_namsinh = htmlentities($_POST['kh_namsinh']);
            $kh_cmnd = htmlentities($_POST['kh_cmnd']);
            $kh_quantri = htmlentities($_POST['kh_quantri']);
            
            // Kiểm tra ràng buộc dữ liệu (Validation)
            // Tạo biến lỗi để chứa thông báo lỗi
            $errors = [];

            
            // Validate mật khẩu________________________
            // required
            if (empty($kh_matkhau)) {
              $errors['kh_matkhau'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $kh_matkhau,
                'msg' => 'Vui lòng nhập mật khẩu'
              ];
            }
            
            // minlength 5
            if (!empty($kh_matkhau) && strlen($kh_matkhau) < 5) {
              $errors['kh_matkhau'][] = [
                'rule' => 'minlength',
                'rule_value' => 5,
                'value' => $kh_matkhau,
                'msg' => 'Mật khẩu phải có ít nhất 5 ký tự'
              ];
            }
            // maxlength 50
            if (!empty($kh_matkhau) && strlen($kh_matkhau) > 50) {
              $errors['kh_matkhau'][] = [
                'rule' => 'maxlength',
                'rule_value' => 50,
                'value' => $kh_matkhau,
                'msg' => 'Mật khẩu không được vượt quá 50 ký tự'
              ];
            }
            
            // Validate tên___________________
            // required
            if (empty($kh_ten)) {
              $errors['kh_ten'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $kh_ten,
                'msg' => 'Vui lòng nhập tên khách hàng'
              ];
            }   

            // minlength 5
            if (!empty($kh_ten) && strlen($kh_ten) < 5) {
              $errors['kh_ten'][] = [
                'rule' => 'minlength',
                'rule_value' => 5,
                'value' => $kh_ten,
                'msg' => 'Mật khẩu phải có ít nhất 5 ký tự'
              ];
            }
            // maxlength 500
            if (!empty($kh_ten) && strlen($kh_ten) > 500) {
              $errors['kh_ten'][] = [
                'rule' => 'maxlength',
                'rule_value' => 500,
                'value' => $kh_ten,
                'msg' => 'Mật khẩu không được vượt quá 500 ký tự'
              ];
            }

            // Validate giới tính___________________
            // required
            // if (empty($kh_gioitinh)) {
            //   $errors['kh_gioitinh'][] = [
            //     'rule' => 'required',
            //     'rule_value' => true,
            //     'value' => $kh_gioitinh,
            //     'msg' => 'Vui lòng nhập giới tính'
            //   ];
            // }   
            
            // Validate địa chỉ___________________
            // required
            if(empty($kh_diachi)){
              $errors['kh_diachi'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $kh_diachi,
                'msg' => 'Vui lòng nhập địa chỉ'
              ];
            }
            
            // Validate Số điện thoại
            // required
            if(empty($kh_dienthoai)){
              $errors['kh_dienthoai'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $kh_dienthoai,
                'msg' => 'Vui lòng nhập số điện thoại'
              ];
            }

            // Validate Email
            // required
            if(empty($kh_email)){
              $errors['kh_email'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $kh_email,
                'msg' => 'Vui lòng nhập email'
              ];
            }

            // Validate ngày sinh
            // required
            if(empty($kh_ngaysinh)){
              $errors['kh_ngaysinh'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $kh_ngaysinh,
                'msg' => 'Vui lòng nhập ngày sinh'
              ];
            }

            // Validate tháng sinh
            // required
            if(empty($kh_thangsinh)){
              $errors['kh_thangsinh'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $kh_thangsinh,
                'msg' => 'Vui lòng nhập tháng sinh'
              ];
            }

            // Validate Năm sinh
            // required
            if(empty($kh_namsinh)){
              $errors['kh_namsinh'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $kh_namsinh,
                'msg' => 'Vui lòng nhập năm sinh'
              ];
            }

            // Validate số chứng minh nhân dân
            // required
            if(empty($kh_cmnd)){
              $errors['kh_cmnd'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $kh_cmnd,
                'msg' => 'Vui lòng nhập số chứng minh nhân dân'
              ];
            }

            // Validate quản trị
            // required
            // if(empty($kh_quantri)){
            //   $errors['kh_quantri'][] = [
            //     'rule' => 'required',
            //     'rule_value' => true,
            //     'value' => $kh_quantri,
            //     'msg' => 'Vui lòng nhập quản trị'
            //   ];
            // }
            
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
                    // 2. Nếu người dùng có bấm nút Đăng ký thì thực thi câu lệnh UPDATE
          // Nếu không có lỗi VALIDATE dữ liệu (tức là dữ liệu đã hợp lệ)
            // Tiến hành thực thi câu lệnh SQL Query Database
            // => giá trị của biến $errors là rỗng
          if (isset($_POST['btnSave'])  // Nếu người dùng có bấm nút "Lưu dữ liệu"
            && (!isset($errors) || (empty($errors))) // Nếu biến $errors không tồn tại Hoặc giá trị của biến $errors rỗng
          ) {
            // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
            
            // Câu lệnh INSERT
            $sql = <<<EOT
            UPDATE khachhang
            SET
              kh_matkhau='$kh_matkhau',
              kh_ten='$kh_ten',
              kh_gioitinh=$kh_gioitinh,
              kh_diachi='$kh_diachi',
              kh_dienthoai='$kh_dienthoai',
              kh_email='$kh_email',
              kh_ngaysinh=$kh_ngaysinh,
              kh_thangsinh=$kh_thangsinh,
              kh_namsinh=$kh_namsinh,
              kh_cmnd='$kh_cmnd',
              kh_quantri=$kh_quantri
            WHERE kh_tendangnhap = '$kh_tendangnhap';
EOT;
            // Thực thi INSERT
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
        
        kh_matkhau: {
          required: true,
          minlength: 5,
          maxlength: 50
        },
        kh_ten: {
          required: true,
          minlength: 5,
          maxlength: 500
        },
        // kh_gioitinh: {
        //   required: true
        // },
        kh_diachi: {
          required: true          
        },
        kh_dienthoai: {
          required: true          
        },
        kh_email: {
          required: true          
        },
        kh_ngaysinh: {
          required: true          
        },
        kh_thangsinh: {
          required: true          
        },
        kh_namsinh: {
          required: true          
        },
        kh_cmnd: {
          required: true          
        },
        // kh_quantri: {
        //   required: true
        // }
      },
      messages: {
        
        kh_matkhau: {
          required: "Vui lòng nhập mật khẩu",
          min: "Mật khẩu phải có ít nhất 5 ký tự",
          maxlength: "Mật khẩu không được vượt quá 50 ký tự"
        },
        kh_ten: {
          required: "Vui lòng nhập tên khách hàng",
          min: "Tên có ít nhất 5 ký tự",
          maxlength: "Tên không được vượt quá 500 ký tự"
        },
        // kh_gioitinh: {
        //   required: "Vui lòng nhập giới tính"
        //   },
        kh_diachi: {
          required: "Vui lòng nhập địa chỉ"
          },
        kh_dienthoai: {
          required: "Vui lòng nhập số điện thoại"
          },
        kh_email: {
          required: "Vui lòng nhập Email"
          },
        kh_ngaysinh: {
          required: "Vui lòng nhập ngày sinh"
          },
        kh_thangsinh: {
          required: "Vui lòng nhập tháng sinh"
          },
        kh_namsinh: {
          required: "Vui lòng nhập năm sinh"
          },
        kh_cmnd: {
          required: "Vui lòng nhập chứng minh nhân dân"
          },
        
          // kh_quantri: {
          // required: "Vui lòng nhập địa chỉ"
        // }
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
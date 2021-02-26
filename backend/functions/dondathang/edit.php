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
    <!-- Nhúng file Quản lý các Liên kết CSS dùng chung cho toàn bộ trang web -->
    <?php include_once(__DIR__ . '/../../layouts/styles.php'); ?>
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
                    <h1 class="h2">Sửa đơn đặt hàng</h1>
                </div>

                <!-- Block content -->
                <?php
                // Hiển thị tất cả lỗi trong PHP
                // Chỉ nên hiển thị lỗi khi đang trong môi trường Phát triển (Development)
                // Không nên hiển thị lỗi trên môi trường Triển khai (Production)
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);

                // Truy vấn database
                // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
                include_once(__DIR__ . '/../../../dbconnect.php');

                // Chuẩn bị câu truy vấn $sqlSelect, lấy dữ liệu ban đầu của record cần update
                // Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
                $dh_ma = $_GET['dh_ma'];
                $select = "SELECT *	FROM dondathang WHERE dh_ma = $dh_ma;";
                $resultSelect = mysqli_query($conn,$select);
                $selectRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);

                $selectChitiet = "SELECT *	FROM sanpham_dondathang WHERE dh_ma = $dh_ma;";

                $resultChitiet = mysqli_query($conn,$selectChitiet);
                
                $dataChitiet = [];
                while ($rowChitiet = mysqli_fetch_array($resultChitiet, MYSQLI_ASSOC)) {
                  $selectSP = "SELECT *	FROM sanpham WHERE sp_ma =" . $rowChitiet['sp_ma'];
                  
                  $resultSP = mysqli_query($conn,$selectSP);
                  $SP = mysqli_fetch_array($resultSP, MYSQLI_ASSOC);
                    $dataChitiet[] = array(
                        'sp_ma' => $rowChitiet['sp_ma'],
                        'sp_ten' => $SP['sp_ten'],
                        'sp_dh_soluong' => $rowChitiet['sp_dh_soluong'],
                        'sp_dh_dongia' => $rowChitiet['sp_dh_dongia'],
                        'thanhtien' => $rowChitiet['sp_dh_soluong'] * $rowChitiet['sp_dh_dongia']
                    );
                }

                /*  --- 
                --- 2.Truy vấn dữ liệu Hình thức Thanh toán
                --- 
                */
                // Chuẩn bị câu truy vấn
                $sqlHinhThucThanhToan = "select * from `hinhthucthanhtoan`";

                // Thực thi câu truy vấn SQL để lấy về dữ liệu
                $resultHinhThucThanhToan = mysqli_query($conn, $sqlHinhThucThanhToan);

                // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
                // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
                // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
                $dataHinhThucThanhToan = [];
                while ($rowHinhThucThanhToan = mysqli_fetch_array($resultHinhThucThanhToan, MYSQLI_ASSOC)) {
                    $dataHinhThucThanhToan[] = array(
                        'httt_ma' => $rowHinhThucThanhToan['httt_ma'],
                        'httt_ten' => $rowHinhThucThanhToan['httt_ten'],
                    );
                }
                /* --- End Truy vấn dữ liệu Hình thức Thanh toán --- */

                /*  --- 
                --- 3.Truy vấn dữ liệu Khách hàng
                --- 
                */
                // Chuẩn bị câu truy vấn
                $sqlKhachHang = "select * from `khachhang`";

                // Thực thi câu truy vấn SQL để lấy về dữ liệu
                $resultKhachHang = mysqli_query($conn, $sqlKhachHang);

                // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
                // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
                // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
                $dataKhachHang = [];
                while ($rowKhachHang = mysqli_fetch_array($resultKhachHang, MYSQLI_ASSOC)) {
                    // Sử dụng hàm sprintf() để chuẩn bị mẫu câu với các giá trị truyền vào tương ứng từng vị trí placeholder
                    $kh_tomtat = sprintf(
                        "Họ tên %s, số điện thoại: %s",
                        $rowKhachHang['kh_ten'],
                        $rowKhachHang['kh_dienthoai']
                    );

                    $dataKhachHang[] = array(
                        'kh_tendangnhap' => $rowKhachHang['kh_tendangnhap'],
                        'kh_tomtat' => $kh_tomtat,
                    );
                }
                /* --- End Truy vấn dữ liệu Hình thức Thanh toán --- */

                /*  --- 
                --- 4.Truy vấn dữ liệu sản phẩm 
                --- 
                */
                // Chuẩn bị câu truy vấn sản phẩm
                $sqlSanPham = "select * from `sanpham`";

                // Thực thi câu truy vấn SQL để lấy về dữ liệu
                $resultSanPham = mysqli_query($conn, $sqlSanPham);

                // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
                // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
                // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
                $dataSanPham = [];
                while ($rowSanPham = mysqli_fetch_array($resultSanPham, MYSQLI_ASSOC)) {
                    $dataSanPham[] = array(
                        'sp_ma' => $rowSanPham['sp_ma'],
                        'sp_gia' => $rowSanPham['sp_gia'],
                        'sp_ten' => $rowSanPham['sp_ten'],
                    );
                }
                // var_dump($dataSanPham);die;
                /* --- End Truy vấn dữ liệu sản phẩm --- */
                ?>

                <!-- Form cho phép người dùng upload file lên Server bắt buộc phải có thuộc tính enctype="multipart/form-data" -->
                <form name="frmhinhsanpham" id="frmhinhanpham" method="post" action="" enctype="multipart/form-data">
                    <fieldset id="donHangContainer">
                        <legend>Thông tin Đơn hàng</legend>
                        <div class="form-row">
                            
                            <div class="col">
                              <div class="form-group">
                                    <label>Khách hàng</label>
                                    <select name="kh_tendangnhap" id="kh_tendangnhap" class="form-control">
                                        <option value="">Vui lòng chọn Khách hàng</option>
                                        <?php foreach ($dataKhachHang as $khachhang) : ?>
                                            <option value="<?= $khachhang['kh_tendangnhap'] ?>" <?php if($selectRow['kh_tendangnhap']==$khachhang['kh_tendangnhap']) echo"selected"?>
                                            >
                                              <?= $khachhang['kh_tomtat'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Ngày lập</label>
                                    <input type="text" name="dh_ngaylap" id="dh_ngaylap" class="form-control" value="<?= $selectRow['dh_ngaylap'] ?>"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Ngày giao</label>
                                    <input type="text" name="dh_ngaygiao" id="dh_ngaygiao" class="form-control" value="<?= $selectRow['dh_ngaygiao'] ?>"/>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Nơi giao</label>
                                    <input type="text" name="dh_noigiao" id="dh_noigiao" class="form-control" value="<?= $selectRow['dh_noigiao'] ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Trạng thái thanh toán</label><br />
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="dh_trangthaithanhtoan" id="dh_trangthaithanhtoan-1" class="custom-control-input" value="0" checked>
                                        <label class="custom-control-label" for="dh_trangthaithanhtoan-1">Chưa thanh toán</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="dh_trangthaithanhtoan" id="dh_trangthaithanhtoan-2" class="custom-control-input" value="1">
                                        <label class="custom-control-label" for="dh_trangthaithanhtoan-2">Đã thanh toán</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                            <div class="form-group">
                                    <label>Hình thức thanh toán</label>
                                    <select name="httt_ma" id="httt_ma" class="form-control">
                                    <option value="">Vui lòng chọn Hình thức thanh toán</option>
                                        <?php foreach ($dataHinhThucThanhToan as $httt) : ?>
                                            <option value="<?= $httt['httt_ma'] ?>" <?php if($selectRow['httt_ma']==$httt['httt_ma']) echo"selected"?>
                                            >
                                              <?= $httt['httt_ten'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset id="chiTietDonHangContainer">
                        <legend>Thông tin Chi tiết Đơn hàng</legend>
                        <div class="form-row">
                            <div class="col">
                              <div class="form-group">
                                    <label for="sp_ma">Sản phẩm</label>
                                    <select class="form-control" id="sp_ma" name="sp_ma">
                                        <option value="">Vui lòng chọn Sản phẩm</option>
                                        <?php foreach ($dataSanPham as $sanpham) : ?>
                                            <option value="<?= $sanpham['sp_ma'] ?>" data-sp_gia="<?= $sanpham['sp_gia'] ?>"><?= $sanpham['sp_ten'] ?> - <?= number_format($sanpham['sp_gia'],0,".",",") ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input type="text" name="soluong" id="soluong" class="form-control" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Xử lý</label><br />
                                    <button type="button" id="btnThemSanPham" class="btn btn-secondary">Thêm vào đơn hàng</button>
                                </div>
                            </div>
                        </div>

                        <table id="tblChiTietDonHang" class="table table-bordered">
                            <thead>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Thành tiền</th>
                                <th>Hành động</th>
                            </thead>
                            <tbody>
                            
                                <?php foreach ($dataChitiet as $Chitiet) : ?>
                                  <tr>
                                    <td><?= $Chitiet['sp_ten']?> <input type="hidden" name="sp_ma[]" value="<?= $Chitiet['sp_ma']?>"/></td>
                                    <td><?= $Chitiet['sp_dh_soluong']?><input type="hidden" name="sp_dh_soluong[]" value="<?= $Chitiet['sp_dh_soluong']?>"/></td>
                                    <td id="<?= $Chitiet['sp_ma']?>"><?= number_format($Chitiet['sp_dh_dongia'],0,".",",") ?><input type="hidden" name="sp_dh_dongia[]" value="<?= $Chitiet['sp_dh_dongia']?>"/></td>
                                    <td><?= number_format($Chitiet['thanhtien'],0,".",",") ?></td>
                                    <td><button type="button" class="btn btn-danger btn-delete-row">Xóa</button></td> 
                                  </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </fieldset>

                    <button class="btn btn-primary" name="btnSave">Lưu</button>
                    <a href="index.php" class="btn btn-outline-secondary" name="btnBack" id="btnBack">Quay về</a>
                </form>

                <?php
                // Nếu người dùng có bấm nút Đăng ký thì thực thi câu lệnh
                if (isset($_POST['btnSave'])) {
                    // 1. Phân tách lấy dữ liệu người dùng gởi từ REQUEST POST
                    // Thông tin đơn hàng
                    $kh_tendangnhap = $_POST['kh_tendangnhap'];
                    $dh_ngaylap = $_POST['dh_ngaylap'];
                    $dh_ngaygiao = $_POST['dh_ngaygiao'];
                    $dh_noigiao = $_POST['dh_noigiao'];
                    $dh_trangthaithanhtoan = $_POST['dh_trangthaithanhtoan'];
                    $httt_ma = $_POST['httt_ma'];

                    // Thông tin các dòng chi tiết đơn hàng
                    $arr_sp_ma = $_POST['sp_ma'];                   // mảng array do đặt tên name="sp_ma[]"
                    $arr_sp_dh_soluong = $_POST['sp_dh_soluong'];   // mảng array do đặt tên name="sp_dh_soluong[]"
                    $arr_sp_dh_dongia = $_POST['sp_dh_dongia'];     // mảng array do đặt tên name="sp_dh_dongia[]"
                                        
                    // Câu lệnh UPDATE
                    $sqlUpdateDonHang = "UPDATE dondathang SET dh_ngaylap='$dh_ngaylap', dh_ngaygiao='$dh_ngaygiao', dh_noigiao='$dh_noigiao', dh_trangthaithanhtoan=$dh_trangthaithanhtoan, httt_ma=$httt_ma, kh_tendangnhap='$kh_tendangnhap' WHERE dh_ma=$dh_ma";
                    
                    // Thực thi UPDATE Đơn hàng
                    mysqli_query($conn, $sqlUpdateDonHang);

                    //Xóa chi tiết đơn hàng
                    $delete = "DELETE FROM sanpham_dondathang WHERE dh_ma=$dh_ma";
                    mysqli_query($conn, $delete);
                    
                    // 4. Duyệt vòng lặp qua mảng các dòng Sản phẩm của chi tiết đơn hàng được gởi đến qua request POST
                    for($i = 0; $i < count($arr_sp_ma); $i++) {
                        // 4.1. Chuẩn bị dữ liệu cho câu lệnh INSERT vào table `sanpham_dondathang`
                        $sp_ma = $arr_sp_ma[$i];
                        $sp_dh_soluong = $arr_sp_dh_soluong[$i];
                        $sp_dh_dongia = $arr_sp_dh_dongia[$i];

                        // 4.2. Câu lệnh INSERT
                        $sqlInsertSanPhamDonDatHang = "INSERT INTO `sanpham_dondathang` (`sp_ma`, `dh_ma`, `sp_dh_soluong`, `sp_dh_dongia`) VALUES ($sp_ma, $dh_ma, $sp_dh_soluong, $sp_dh_dongia)";

                        // 4.3. Thực thi INSERT
                        mysqli_query($conn, $sqlInsertSanPhamDonDatHang);
                    }

                    // 5. Thực thi hoàn tất, điều hướng về trang Danh sách
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
    <script>
        // Đăng ký sự kiện Click nút Thêm Sản phẩm
        $('#btnThemSanPham').click(function() {
            // debugger;
            // Lấy thông tin Sản phẩm
            var sp_ma = $('#sp_ma').val();
            var sp_gia = $('#sp_ma option:selected').data('sp_gia');
            var sp_ten = $('#sp_ma option:selected').text();
            var soluong = $('#soluong').val();
            var thanhtien = (soluong * sp_gia);
            
            // Tạo mẫu giao diện HTML Table Row
            if(sp_ma != '' && soluong >0){
                var htmlTemplate = '<tr>'; 
                htmlTemplate += '<td>' + sp_ten + '<input type="hidden" name="sp_ma[]" value="' + sp_ma + '"/></td>';
                htmlTemplate += '<td>' + soluong + '<input type="hidden" name="sp_dh_soluong[]" value="' + soluong + '"/></td>';
                htmlTemplate += '<td id="'+ sp_ma +'">' + sp_gia.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") + '<input type="hidden" name="sp_dh_dongia[]" value="' + sp_gia + '"/></td>';
                htmlTemplate += '<td>' + thanhtien.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,") + '</td>';
                htmlTemplate += '<td><button type="button" class="btn btn-danger btn-delete-row">Xóa</button></td>';
                htmlTemplate += '</tr>';

                // Thêm vào TABLE BODY
                $('#tblChiTietDonHang tbody').append(htmlTemplate);
            }
            else alert("chọn sản phẩm");

            // Clear
            $('#sp_ma').val('');
            $('#soluong').val('');
        });

        // Đăng ký sự kiện cho tất cả các nút XÓA có sử dụng class .btn-delete-row
        $('#chiTietDonHangContainer').on('click', '.btn-delete-row', function() {
            // Ta có cấu trúc
            // <tr>
            //    <td>
            //        <button class="btn-delete-row"></button>     <--- $(this) chính là đối tượng đang được người dùng click
            //    </td>
            // </tr>
            
            // Từ nút người dùng click -> tìm lên phần tử cha -> phần tử cha
            // Xóa dòng TR
            $(this).parent().parent()[0].remove();
        });
    </script>
</body>

</html>
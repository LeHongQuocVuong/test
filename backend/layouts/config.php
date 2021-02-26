<?php
// var_dump($_SERVER["SCRIPT_NAME"]);die;

// Biến $_SERVER là biến hệ thống do PHP quản lý, dùng để lưu trữ các thông tin về Request gởi đến Server
// Trong đó key: $_SERVER['SCRIPT_NAME']
// Dùng để lưu trữ giá trị thông tin đường dẫn URL
// Tùy theo đường dẫn URL, set giá trị Tên trang và Tiêu đề phù hợp
switch ($_SERVER['SCRIPT_NAME']) {
  // CRUD Danh mục Chủ đề góp ý
  case "/test/backend/functions/chudegopy/index.php":
    $CURRENT_PAGE = "backend.chudegopy.index";
    $PAGE_TITLE = "Danh sách Chủ đề góp ý";
    break;
  case "/test/backend/functions/chudegopy/create.php":
    $CURRENT_PAGE = "backend.chudegopy.create";
    $PAGE_TITLE = "Thêm mới Chủ đề góp ý";
    break;
  case "/test/backend/functions/chudegopy/edit.php":
    $CURRENT_PAGE = "backend.chudegopy.edit";
    $PAGE_TITLE = "Sửa Chủ đề góp ý";
    break;

  // CRUD Danh mục Đơn đặt hàng
  case "/test/backend/functions/dondathang/index.php":
    $CURRENT_PAGE = "backend.dondathang.index";
    $PAGE_TITLE = "Danh sách Đơn đặt hàng";
    break;
  case "/test/backend/functions/dondathang/create.php":
    $CURRENT_PAGE = "backend.dondathang.create";
    $PAGE_TITLE = "Thêm mới Đơn đặt hàng";
    break;
  case "/test/backend/functions/dondathang/edit.php":
    $CURRENT_PAGE = "backend.dondathang.edit";
    $PAGE_TITLE = "Sửa Đơn đặt hàng";
    break;
  case "/test/backend/functions/dondathang/print.php":
    $CURRENT_PAGE = "backend.dondathang.print";
    $PAGE_TITLE = "In Đơn đặt hàng";
    break;
  
  // CRUD Danh mục Góp ý
  case "/test/backend/functions/gopy/index.php":
    $CURRENT_PAGE = "backend.gopy.index";
    $PAGE_TITLE = "Danh sách Góp ý";
    break;
  case "/test/backend/functions/gopy/create.php":
    $CURRENT_PAGE = "backend.gopy.create";
    $PAGE_TITLE = "Thêm mới Góp ý";
    break;
  case "/test/backend/functions/gopy/edit.php":
    $CURRENT_PAGE = "backend.gopy.edit";
    $PAGE_TITLE = "Sửa Góp ý";
    break;

  // CRUD Danh mục Hình sản phẩm
  case "/test/backend/functions/hinhsanpham/index.php":
    $CURRENT_PAGE = "backend.hinhsanpham.index";
    $PAGE_TITLE = "Danh sách Hình sản phẩm";
    break;
  case "/test/backend/functions/hinhsanpham/create.php":
    $CURRENT_PAGE = "backend.hinhsanpham.create";
    $PAGE_TITLE = "Thêm mới Hình sản phẩm";
    break;
  case "/test/backend/functions/hinhsanpham/edit.php":
    $CURRENT_PAGE = "backend.hinhsanpham.edit";
    $PAGE_TITLE = "Sửa Hình sản phẩm";
    break;

  // CRUD Danh mục Hình thức thanh toán
  case "/test/backend/functions/hinhthucthanhtoan/index.php":
    $CURRENT_PAGE = "backend.hinhthucthanhtoan.index";
    $PAGE_TITLE = "Danh sách Hình thức thanh toán";
    break;
  case "/test/backend/functions/hinhthucthanhtoan/create.php":
    $CURRENT_PAGE = "backend.hinhthucthanhtoan.create";
    $PAGE_TITLE = "Thêm mới Hình thức thanh toán";
    break;
  case "/test/backend/functions/hinhthucthanhtoan/edit.php":
    $CURRENT_PAGE = "backend.hinhthucthanhtoan.edit";
    $PAGE_TITLE = "Sửa Hình thức thanh toán";
    break;

  // CRUD Danh mục Khách hàng
  case "/test/backend/functions/khachhang/index.php":
    $CURRENT_PAGE = "backend.khachhang.index";
    $PAGE_TITLE = "Danh sách Khách hàng";
    break;
  case "/test/backend/functions/khachhang/create.php":
    $CURRENT_PAGE = "backend.khachhang.create";
    $PAGE_TITLE = "Thêm mới Khách hàng";
    break;
  case "/test/backend/functions/khachhang/edit.php":
    $CURRENT_PAGE = "backend.khachhang.edit";
    $PAGE_TITLE = "Sửa Khách hàng";
    break;

  // CRUD Danh mục Khuyến mãi
  case "/test/backend/functions/khuyenmai/index.php":
    $CURRENT_PAGE = "backend.khuyenmai.index";
    $PAGE_TITLE = "Danh sách Khuyến mãi";
    break;
  case "/test/backend/functions/khuyenmai/create.php":
    $CURRENT_PAGE = "backend.khuyenmai.create";
    $PAGE_TITLE = "Thêm mới Khuyến mãi";
    break;
  case "/test/backend/functions/khuyenmai/edit.php":
    $CURRENT_PAGE = "backend.khuyenmai.edit";
    $PAGE_TITLE = "Sửa Khuyến mãi";
    break;

  // CRUD Danh mục Loại sản phẩm
  case "/test/backend/functions/loaisanpham/index.php":
    $CURRENT_PAGE = "backend.loaisanpham.index";
    $PAGE_TITLE = "Danh sách Loại sản phẩm";
    break;
  case "/test/backend/functions/loaisanpham/create.php":
    $CURRENT_PAGE = "backend.loaisanpham.create";
    $PAGE_TITLE = "Thêm mới Loại sản phẩm";
    break;
  case "/test/backend/functions/loaisanpham/edit.php":
    $CURRENT_PAGE = "backend.loaisanpham.edit";
    $PAGE_TITLE = "Sửa Loại sản phẩm";
    break;

  // CRUD Danh mục Nhà sản xuất
  case "/test/backend/functions/nhasanxuat/index.php":
    $CURRENT_PAGE = "backend.nhasanxuat.index";
    $PAGE_TITLE = "Danh sách Nhà sản xuất";
    break;
  case "/test/backend/functions/nhasanxuat/create.php":
    $CURRENT_PAGE = "backend.nhasanxuat.create";
    $PAGE_TITLE = "Thêm mới Nhà sản xuất";
    break;
  case "/test/backend/functions/nhasanxuat/edit.php":
    $CURRENT_PAGE = "backend.nhasanxuat.edit";
    $PAGE_TITLE = "Sửa Nhà sản xuất";
    break;

    // CRUD Danh mục Sản phẩm
  case "/test/backend/functions/loaisanpham/index.php":
    $CURRENT_PAGE = "backend.loaisanpham.index";
    $PAGE_TITLE = "Danh sách Sản phẩm";
    break;
  case "/test/backend/functions/loaisanpham/create.php":
    $CURRENT_PAGE = "backend.loaisanpham.create";
    $PAGE_TITLE = "Thêm mới Sản phẩm";
    break;
  case "/test/backend/functions/loaisanpham/edit.php":
    $CURRENT_PAGE = "backend.loaisanpham.edit";
    $PAGE_TITLE = "Sửa Sản phẩm";
    break;

  // CRUD Danh mục Chi tiết đơn hàng
  case "/test/backend/functions/sanpham_dondathang/index.php":
    $CURRENT_PAGE = "backend.sanpham_dondathang.index";
    $PAGE_TITLE = "Danh sách Chi tiết đơn hàng";
    break;

    // Tên trang và Tiêu đề mặc định
  default:
    $CURRENT_PAGE = "backend.index";
    $PAGE_TITLE = "Lê Hồng Quốc Vương";
}

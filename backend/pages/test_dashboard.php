
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NenTang.vn</title>

  <!-- Nhúng file Quản lý các Liên kết CSS dùng chung cho toàn bộ trang web -->
  <?php include_once(__DIR__ . '/../layouts/styles.php'); ?>
</head>

<body class="d-flex flex-column h-100">
  <!-- header -->
  <?php include_once(__DIR__ . '/../layouts/partials/header.php'); ?>
  <!-- end header -->

  <div class="container-fluid">
    <div class="row">
      <!-- sidebar -->
      <?php include_once(__DIR__ . '/../layouts/partials/sidebar.php'); ?>
      <!-- end sidebar -->

      <main role="main" class="col-md-10 ml-sm-auto px-4 mb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Bảng tin DASHBOARD</h1>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div id="baocaoSanPham_SoLuong">
                    <h1>0</h1>
                </div>
                <p>Tổng số mặt hàng</p>
                <button id="refreshBaoCaoSanPham">refresh Dữ liệu</button>
            </div>
            <div class="col-md-3">
                <div id="baocaoKhachHang_SoLuong">
                    <h1>0</h1>
                </div>
                <p>Tổng số Khách hàng</p>
                <button id="refreshBaoCaoKhachHang">refresh Dữ liệu</button>
            </div>
            <div class="col-md-3">
                <div id="baocaoDonHang_SoLuong">
                    <h1>0</h1>
                </div>
                <p>Tổng số đơn hàng</p>
                <button id="refreshBaoCaoDonHang">refresh Dữ liệu</button>
            </div>
            <div class="col-md-3">
                <div id="baocaoGopY_SoLuong">
                    <h1>0</h1>
                </div>
                <p>Tổng số góp ý</p>
                <button id="refreshBaoCaoGopY">refresh Dữ liệu</button>
            </div>
            
        </div>
        <div class="row">
            <!-- Biểu đồ thống kê loại sản phẩm -->
            <div class="col-sm-6 col-lg-6">
              <canvas id="chartOfobjChartThongKeLoaiSanPham"></canvas>
              <button class="btn btn-outline-primary btn-sm form-control" id="refreshThongKeLoaiSanPham">Refresh dữ liệu</button>
            </div><!-- col -->

          </div><!-- row -->
      </main>
    </div>
  </div>

  <!-- footer -->
  <?php include_once(__DIR__ . '/../layouts/partials/footer.php'); ?>
  <!-- end footer -->

  <!-- Nhúng file quản lý phần SCRIPT JAVASCRIPT -->
  <?php include_once(__DIR__ . '/../layouts/scripts.php'); ?>

  <!-- Các file Javascript sử dụng riêng cho trang này, liên kết tại đây -->
  <!-- Liên kết thư viện ChartJS -->
  <script src="/back_end/assets/vendor/Chart.js/Chart.min.js"></script>
  <script>
    $(document).ready(function(){
        function getDuLieuBaoCaoTongSoMatHang(){
            $.ajax('/back_end/backend/ajax/baocao-tongsomathang-ajax.php',{
                
                success: function(data){
                    // debugger;
                    var dataObj = JSON.parse(data);
                    var htmlString = '<h1>' + dataObj.quantity +'</h1>';
                    $('#baocaoSanPham_SoLuong').html(htmlString);
                },
                error: function(jqXHR, textStatus, errorThrown){
                    var htmlString = '<h1>Không thể xử lý. Lỗi'+ errorThrown +'</h1>';
                    $('#baocaoSanPham_SoLuong').html(htmlString);
                }
            });

        }
        $('#refreshBaoCaoSanPham').click(function(event){
            event.preventDefault();
            getDuLieuBaoCaoTongSoMatHang();
        });

        function getDuLieuBaoCaoTongSoKhachHang(){
            $.ajax('/back_end/backend/ajax/baocao-tongsokhachhang-ajax.php',{
                success: function(data){
                    // debugger;
                    var dataObj = JSON.parse(data);
                    var htmlString = '<h1>' + dataObj.quantity +'</h1>';
                    $('#baocaoKhachHang_SoLuong').html(htmlString);
                },
                error: function(jqXHR, textStatus, errorThrown){
                    var htmlString = '<h1>Không thể xử lý. Lỗi'+ errorThrown +'</h1>';
                    $('#baocaoKhachHang_SoLuong').html(htmlString);
                }
            });

        }
        $('#refreshBaoCaoKhachHang').click(function(event){
            event.preventDefault();
            getDuLieuBaoCaoTongSoKhachHang();
        });

        function getDuLieuBaoCaoTongSoDonHang(){
            $.ajax('/back_end/backend/ajax/baocao-tongsodonhang-ajax.php',{
                success: function(data){
                    // debugger;
                    var dataObj = JSON.parse(data);
                    var htmlString = '<h1>' + dataObj.quantity +'</h1>';
                    $('#baocaoDonHang_SoLuong').html(htmlString);
                },
                error: function(jqXHR, textStatus, errorThrown){
                    var htmlString = '<h1>Không thể xử lý. Lỗi'+ errorThrown +'</h1>';
                    $('#baocaoDonHang_SoLuong').html(htmlString);
                }
            });

        }
        $('#refreshBaoCaoDonHang').click(function(event){
            event.preventDefault();
            getDuLieuBaoCaoTongSoDonHang();
        });
        function getDuLieuBaoCaoTongSoGopY(){
            $.ajax('/back_end/backend/ajax/baocao-tongsogopy-ajax.php',{
                success: function(data){
                    // debugger;
                    var dataObj = JSON.parse(data);
                    var htmlString = '<h1>' + dataObj.quantity +'</h1>';
                    $('#baocaoGopY_SoLuong').html(htmlString);
                },
                error: function(jqXHR, textStatus, errorThrown){
                    var htmlString = '<h1>Không thể xử lý. Lỗi'+ errorThrown +'</h1>';
                    $('#baocaoGopY_SoLuong').html(htmlString);
                }
            });

        }
        $('#refreshBaoCaoGopY').click(function(event){
            event.preventDefault();
            getDuLieuBaoCaoTongSoGopY();
        });

        var $objChartThongKeLoaiSanPham;
      var $chartOfobjChartThongKeLoaiSanPham = document.getElementById("chartOfobjChartThongKeLoaiSanPham").getContext(
        "2d");

      function renderChartThongKeLoaiSanPham() {
        $.ajax({
          url: '/back_end/backend/ajax/baocao-thongkeloaisanpham-ajax.php',
          type: "GET",
          success: function(response) {
            var data = JSON.parse(response);
            var myLabels = [];
            var myData = [];
            $(data).each(function() {
              myLabels.push((this.TenLoaiSanPham));
              myData.push(this.quantity);
            });
            myData.push(0); // tạo dòng số liệu 0
            if (typeof $objChartThongKeLoaiSanPham !== "undefined") {
              $objChartThongKeLoaiSanPham.destroy();
            }
            $objChartThongKeLoaiSanPham = new Chart($chartOfobjChartThongKeLoaiSanPham, {
              // Kiểu biểu đồ muốn vẽ. Các bạn xem thêm trên trang ChartJS
              type: "bar",
              data: {
                labels: myLabels,
                datasets: [{
                  data: myData,
                  borderColor: "#9ad0f5",
                  backgroundColor: "#9ad0f5",
                  borderWidth: 1
                }]
              },
              // Cấu hình dành cho biểu đồ của ChartJS
              options: {
                legend: {
                  display: false
                },
                title: {
                  display: true,
                  text: "Thống kê Loại sản phẩm"
                },
                responsive: true
              }
            });
          }
        });
      };
      $('#refreshThongKeLoaiSanPham').click(function(event) {
        event.preventDefault();
        renderChartThongKeLoaiSanPham();
      });

      // Mới mở web (khi trang web load xong)
      // thì sẽ gọi lập tức một số hàm AJAX gọi API lấy dữ liệu
      getDuLieuBaoCaoTongSoMatHang();
      getDuLieuBaoCaoTongSoKhachHang();
      getDuLieuBaoCaoTongSoDonHang();
      getDuLieuBaoCaoTongSoGopY();
      renderChartThongKeLoaiSanPham();
    });
    


  </script>
</body>

</html>
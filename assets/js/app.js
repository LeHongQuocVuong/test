// index
$(document).ready(function () {
    // owlCarousel
    $('#slider .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        // dots:false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 5,
            }
        }
    });
    // owlCarousel2
    $('#slider2 .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        // dots:false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 5,
            }
        }
    });



    // Back to top
    //Check to see if the window is top if not then display button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#myBtn').fadeIn(800);
        } else {
            $('#myBtn').fadeOut(800);
        }
    });

    //Click event to scroll to top
    $('#myBtn').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 800);
        return false;
    });

    


});





// <!-- Script Vuejs -->

Vue.component('product', {
    props: ['obj'],
    template: `
    
        <a :href="obj.link">
            <img :src="obj.hinhanh" alt=""
                style="width: 180px; height: 180px;" class="img-fluid">
            <h6>{{obj.ten}}</h6>
            <small>
                <div class="row">
                    <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <strong style="color: red; ">{{obj.giamoi}}₫</strong>
                        </div>
                        <div class="col-md-5"><del>{{obj.giacu}}</del></div>
                    </div>
            </small>
            <label class="Tragop">Trả góp 0%</label>
            <img src="assets/img/icon/icon_BH.png" alt="" class="BaoHanh" style="left: 210px;">
        </a>
    
    `
});

var vue = new Vue({
    el: '#app',
    data: {
        dt: [
            { id: 1, class_gia:'Tren13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/iphone-11-pro-max-green-400x400.jpg', ten: 'Iphone 11 pro max green', giamoi: '20.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 2, class_gia:'Tren13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/iphone-xs-gold-600x600-2-600x600.jpg', ten: 'Iphone xs gold', giamoi: '19.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 3, class_gia:'Tren13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/iphone-se-256gb-2020-261920-101916-200x200.jpg', ten: 'Iphone se 256gb', giamoi: '18.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 4, class_gia:'Tren13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/oneplus-nord-5g-600x600-1-400x400.jpg', ten: 'Oneplus nord 5g', giamoi: '17.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 5, class_gia:'7_13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/realme-c3-64gb-263620-023637-200x200.jpg', ten: 'Realme c3 64gb', giamoi: '13.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 6, class_gia:'7_13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/samsung-galaxy-a71-195420-105424-400x400.jpg', ten: 'Samsung galaxy a71', giamoi: '12.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 7, class_gia:'7_13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/samsung-galaxy-note-20-062220-122200-400x400.jpg', ten: 'Samsung galaxy note 20', giamoi: '11.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 8, class_gia:'7_13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/samsung-galaxy-tab-s7-084820-024825-400x400.jpg', ten: 'Samsung galaxy tab s7', giamoi: '10.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 9, class_gia:'7_13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/vsmart-live-4-241720-071719-400x400.jpg', ten: 'Vsmart live 4', giamoi: '9.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 10, class_gia:'7_13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/vsmart-star-4-den-400x460-2-400x460.png', ten: 'Vsmart star 4', giamoi: '8.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 11, class_gia:'7_13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/vsmart-star-3-xanh-400x460-400x460.png', ten: 'Vsmart star 3', giamoi: '7.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 12, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/vsmart-joy-3-4gb-den-400x460-400x460.png', ten: 'Vsmart joy 3', giamoi: '6.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 13, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/xiaomi-redmi-note-9s-(21).jpg', ten: 'Xiaomi redmi note 9s', giamoi: '5.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 14, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/xiaomi-mi-note-10-pro-black-600x600.jpg', ten: 'Xiaomi mi note 10 pro black', giamoi: '4.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 15, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/xiaomi-mi-note-10-lite-trang-600x600-600x600.jpg', ten: 'Xiaomi mi note 10 lite trang', giamoi: '3.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },

        ],

        iphone: [
            { id: 1, class_gia:'Tren13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/iphone-11-pro-max-green-400x400.jpg', ten: 'Iphone 11 pro max green', giamoi: '20.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 2, class_gia:'Tren13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/6_i_iphone-11-256gb-black.jpg', ten: 'Iphone 11 256GB', giamoi: '19.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 3, class_gia:'Tren13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/iphone-xs-gold-600x600-2-600x600.jpg', ten: 'Iphone xs gold', giamoi: '18.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 4, class_gia:'Tren13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/6_i_iphone-8-plus-128gb.jpg', ten: 'Iphone 8 plus 128GB', giamoi: '17.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            
            { id: 5, class_gia:'7_13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/iphone-se-256gb-2020-261920-101916-200x200.jpg', ten: 'Iphone se 256gb', giamoi: '12.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 6, class_gia:'7_13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/6_i_iphone-7-plus-128gb.jpg', ten: 'Iphone 7 Plus 256gb', giamoi: '11.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 7, class_gia:'7_13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/iphone-11-pro-max-green-400x400.jpg', ten: 'Iphone 11 pro max green', giamoi: '10.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 8, class_gia:'7_13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/6_i_iphone-11-256gb-black.jpg', ten: 'Iphone 11 256GB', giamoi: '9.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 9, class_gia:'7_13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/iphone-xs-gold-600x600-2-600x600.jpg', ten: 'Iphone xs gold', giamoi: '7.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            
            { id: 10, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/6_i_iphone-8-plus-128gb.jpg', ten: 'Iphone 8 plus 128GB', giamoi: '6.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 11, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/iphone-se-256gb-2020-261920-101916-200x200.jpg', ten: 'Iphone se 256gb', giamoi: '5.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 12, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/6_i_iphone-7-plus-128gb.jpg', ten: 'Iphone 7 Plus 256gb', giamoi: '5.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },

        ],

        samsung: [
            { id: 1, class_gia:'Tren13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/samsung-galaxy-a71-195420-105424-400x400.jpg', ten: 'Samsung galaxy a71', giamoi: '20.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 2, class_gia:'Tren13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/samsung-galaxy-note-20-062220-122200-400x400.jpg', ten: 'Samsung galaxy note 20', giamoi: '19.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 3, class_gia:'Tren13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/6_s_samsung-galaxy-s20-plus.jpg', ten: 'Samsung galaxy S20', giamoi: '19.000.000', giacu: '18.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            
            { id: 4, class_gia:'7_13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/samsung-galaxy-tab-s7-084820-024825-400x400.jpg', ten: 'Samsung galaxy tab s7', giamoi: '13.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 5, class_gia:'7_13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/6_s_samsung-galaxy-a21s.jpg', ten: 'Samsung galaxy A21s', giamoi: '12.000.000', giacu: '12.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 6, class_gia:'7_13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/6_s_samsung-galaxy-a51.jpg', ten: 'Samsung galaxy A51', giamoi: '11.000.000', giacu: '11.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 7, class_gia:'7_13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/6_s_samsung-galaxy-a21s.jpg', ten: 'Samsung galaxy A21s', giamoi: '10.000.000', giacu: '12.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 8, class_gia:'7_13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/6_s_samsung-galaxy-a51.jpg', ten: 'Samsung galaxy A51', giamoi: '9.000.000', giacu: '11.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },


            { id: 9, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/samsung-galaxy-a71-195420-105424-400x400.jpg', ten: 'Samsung galaxy a71', giamoi: '7.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 10, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/samsung-galaxy-note-20-062220-122200-400x400.jpg', ten: 'Samsung galaxy note 20', giamoi: '6.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 11, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/6_s_samsung-galaxy-s20-plus.jpg', ten: 'Samsung galaxy S20', giamoi: '5.000.000', giacu: '5.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 12, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/samsung-galaxy-tab-s7-084820-024825-400x400.jpg', ten: 'Samsung galaxy tab s7', giamoi: '4.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 13, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/6_s_samsung-galaxy-a21s.jpg', ten: 'Samsung galaxy A21s', giamoi: '3.000.000', giacu: '12.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 14, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/6_s_samsung-galaxy-a51.jpg', ten: 'Samsung galaxy A51', giamoi: '3.000.000', giacu: '11.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },

        ],

        xiaomi: [
            { id: 1, class_gia:'Tren13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/xiaomi-redmi-note-9s-(21).jpg', ten: 'Xiaomi redmi note 9s', giamoi: '20.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 2, class_gia:'Tren13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/xiaomi-mi-note-10-pro-black-600x600.jpg', ten: 'Xiaomi mi note 10 pro black', giamoi: '19.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 3, class_gia:'Tren13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/xiaomi-mi-note-10-lite-trang-600x600-600x600.jpg', ten: 'Xiaomi mi note 10 lite trang', giamoi: '18.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 4, class_gia:'Tren13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/6_x_xiaomi-redmi-9.jpg', ten: 'Xiaomi mi note 9', giamoi: '17.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 5, class_gia:'Tren13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/xiaomi-mi-note-10-lite-trang-600x600-600x600.jpg', ten: 'Xiaomi mi note 10 lite trang', giamoi: '16.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },


            { id: 6, class_gia:'7_13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/6_x_xiaomi-redmi-note-8-pro.jpg', ten: 'Xiaomi redmi note 8s', giamoi: '13.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 7, class_gia:'7_13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/6_x_xiaomi-redmi-9.jpg', ten: 'Xiaomi mi note 9', giamoi: '12.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 8, class_gia:'7_13', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/xiaomi-mi-note-10-lite-trang-600x600-600x600.jpg', ten: 'Xiaomi mi note 10 lite trang', giamoi: '11.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },


            { id: 9, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/xiaomi-redmi-note-9s-(21).jpg', ten: 'Xiaomi redmi note 9s', giamoi: '7.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 10, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/xiaomi-mi-note-10-pro-black-600x600.jpg', ten: 'Xiaomi mi note 10 pro black', giamoi: '6.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 11, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/xiaomi-mi-note-10-lite-trang-600x600-600x600.jpg', ten: 'Xiaomi mi note 10 lite trang', giamoi: '5.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 12, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/6_x_xiaomi-redmi-note-8-pro.jpg', ten: 'Xiaomi redmi note 8s', giamoi: '4.000.000', giacu: '23.000.000', km: '6.000.000', manhinh: 'OLED, 6.5 &rdquo;, Super Retina XDR', HDH: 'iOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },

        ],

        // ______________



        lt: [
            { id: 1, class_gia:'Tren13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_hp-348-g7-i5.jpg', ten: 'HP 348 G7 i5 10210U', giamoi: '20.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 2, class_gia:'Tren13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_acer-aspire-3-a315.jpg', ten: 'Acer aspire 3 a315', giamoi: '19.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 3, class_gia:'Tren13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_lenovo-ideapad-s145-81w8001xvn-a4-216292-400x400.jpg', ten: 'Lenovo ideapad s145 81w8001xvn', giamoi: '18.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            
            { id: 4, class_gia:'7_13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_apple-macbook-air-2020.jpg', ten: 'Apple macbook air', giamoi: '17.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 5, class_gia:'7_13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_apple-macbook-air.jpg', ten: 'Apple macbook air', giamoi: '13.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 6, class_gia:'7_13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_asus-vivobook-x509ja-i3.jpg', ten: 'Asus vivobook', giamoi: '12.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 7, class_gia:'7_13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_asus-vivobook-x509ma.jpg', ten: 'Asus vivobook', giamoi: '11.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            
            { id: 8, class_gia:'Duoi7', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_msi-gaming-leopard-10sdr.jpg', ten: 'Msi gaming leopard', giamoi: '6.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 9, class_gia:'Duoi7', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_dell-xps-13-9300-i7.jpg', ten: 'Dell xps 13', giamoi: '5.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 10, class_gia:'Duoi7', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_asus-expertbook-b9450f-i7.jpg', ten: 'Asus expertbook', giamoi: '4.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },

        ],

        macbook: [
            { id: 1, class_gia:'Tren13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_apple-macbook-air-2020.jpg', ten: 'Apple macbook air', giamoi: '20.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 2, class_gia:'Tren13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_apple-macbook-air.jpg', ten: 'Apple macbook air', giamoi: '18.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            
            { id: 3, class_gia:'7_13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_apple-macbook-air-2020.jpg', ten: 'Apple macbook air', giamoi: '13.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 4, class_gia:'7_13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_apple-macbook-air.jpg', ten: 'Apple macbook air', giamoi: '12.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            
            { id: 5, class_gia:'Duoi7', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_apple-macbook-air-2020.jpg', ten: 'Apple macbook air', giamoi: '7.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 6, class_gia:'Duoi7', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_apple-macbook-air.jpg', ten: 'Apple macbook air', giamoi: '6.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },

        ],

        asus: [
            { id: 1, class_gia:'Tren13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_asus-expertbook-b9450f-i7.jpg', ten: 'Asus expertbook', giamoi: '20.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 2, class_gia:'Tren13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_asus-vivobook-x509ja-i3.jpg', ten: 'Asus vivobook', giamoi: '18.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 3, class_gia:'Tren13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_asus-vivobook-x509ma.jpg', ten: 'Asus vivobook', giamoi: '17.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },

            { id: 4, class_gia:'7_13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_a_asus-gaming-rog-strix-g512.jpg', ten: 'Asus ROG G512', giamoi: '13.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 5, class_gia:'7_13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_a_asus-ux333fa-i5-8265u.jpg', ten: 'Asus Zenbook', giamoi: '12.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 6, class_gia:'7_13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_a_asus-gaming-rog-strix-g512.jpg', ten: 'Asus ROG G512', giamoi: '13.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 7, class_gia:'7_13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_a_asus-ux333fa-i5-8265u.jpg', ten: 'Asus Zenbook', giamoi: '12.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },

            { id: 8, class_gia:'Duoi7', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_asus-vivobook-x509ja-i3.jpg', ten: 'Asus vivobook', giamoi: '7.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 9, class_gia:'Duoi7', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_asus-vivobook-x509ma.jpg', ten: 'Asus vivobook', giamoi: '6.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 10, class_gia:'Duoi7', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_asus-vivobook-x509ja-i3.jpg', ten: 'Asus vivobook', giamoi: '7.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 11, class_gia:'Duoi7', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_asus-vivobook-x509ma.jpg', ten: 'Asus vivobook', giamoi: '6.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },

        ],

        dell: [
            { id: 1, class_gia:'Tren13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_dell-xps-13-9300-i7.jpg', ten: 'Dell xps 13', giamoi: '20.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 2, class_gia:'Tren13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_d_dell-inspiron-7373.jpg', ten: 'Dell inspiron 7373', giamoi: '19.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 3, class_gia:'Tren13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_d_dell-vostro-3580.jpg', ten: 'Dell vostro 3580', giamoi: '18.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },

            { id: 4, class_gia:'7_13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_dell-xps-13-9300-i7.jpg', ten: 'Dell xps 13', giamoi: '13.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 5, class_gia:'7_13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_d_dell-inspiron-7373.jpg', ten: 'Dell inspiron 7373', giamoi: '12.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 6, class_gia:'7_13', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_d_dell-vostro-3580.jpg', ten: 'Dell vostro 3580', giamoi: '11.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },

            { id: 7, class_gia:'Duoi7', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_dell-xps-13-9300-i7.jpg', ten: 'Dell xps 13', giamoi: '7.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 8, class_gia:'Duoi7', link: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_d_dell-inspiron-7373.jpg', ten: 'Dell inspiron 7373', giamoi: '6.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },
            { id: 9, class_gia:'Duoi7', ink: 'hp-348-g7-i5.html', hinhanh: 'assets/img/product/2_lt_d_dell-vostro-3580.jpg', ten: 'Dell vostro 3580', giamoi: '5.000.000', giacu: '23.000.000', km: '1.000.000', manhinh: '14 inch, Full HD (1920 x 1080)', HDH: 'Windows 10 Home SL', CPU: 'Intel Core i5 Comet Lake, 10210U, 1.60 GHz', RAM: '8 GB, DDR4 (2 khe), 2666 MHz', OCung: 'SSD 512 GB M.2 PCIe' },

        ],


        tl: [
            { id: 1, class_gia:'7_13', link: 'ipad-10-2-inch-wifi-cellular-32gb-2019-gold.html', hinhanh: 'assets/img/product/3_tl_ipad-10-2-inch-wifi-cellular-32gb-2019-gold.jpg', ten: 'iPad Cellular 32GB (2019)', giamoi: '13.000.000', giacu: '14.000.000', km: '1.000.000', manhinh: 'LED backlit LCD, 10.2 &rdquo', HDH: 'iPadOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 2, class_gia:'7_13', link: 'ipad-10-2-inch-wifi-cellular-32gb-2019-gold.html', hinhanh: 'assets/img/product/3_tl_masstel-tab10-pro-gold-2.jpg', ten: 'Masstel tab10 pro', giamoi: '12.000.000', giacu: '14.000.000', km: '1.000.000', manhinh: 'LED backlit LCD, 10.2 &rdquo', HDH: 'iPadOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },

            { id: 3, class_gia:'Duoi7', link: 'ipad-10-2-inch-wifi-cellular-32gb-2019-gold.html', hinhanh: 'assets/img/product/3_tl_samsung-galaxy-tab-a8-plus.jpg', ten: 'Samsung galaxy tab', giamoi: '7.000.000', giacu: '14.000.000', km: '1.000.000', manhinh: 'LED backlit LCD, 10.2 &rdquo', HDH: 'iPadOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 4, class_gia:'Duoi7', link: 'ipad-10-2-inch-wifi-cellular-32gb-2019-gold.html', hinhanh: 'assets/img/product/3_tl_samsung-galaxy-tab-a8-t295-2019-silver.jpg', ten: 'Samsung galaxy tab', giamoi: '6.000.000', giacu: '14.000.000', km: '1.000.000', manhinh: 'LED backlit LCD, 10.2 &rdquo', HDH: 'iPadOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 5, class_gia:'Duoi7', link: 'ipad-10-2-inch-wifi-cellular-32gb-2019-gold.html', hinhanh: 'assets/img/product/3_tl_samsung-galaxy-tab-s6-lite.jpg', ten: 'Samsung galaxy tab', giamoi: '5.000.000', giacu: '14.000.000', km: '1.000.000', manhinh: 'LED backlit LCD, 10.2 &rdquo', HDH: 'iPadOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
        ],

        iPad: [
            { id: 1, class_gia:'7_13', link: 'ipad-10-2-inch-wifi-cellular-32gb-2019-gold.html', hinhanh: 'assets/img/product/3_tl_ipad-10-2-inch-wifi-cellular-32gb-2019-gold.jpg', ten: 'iPad Cellular 32GB (2019)', giamoi: '13.000.000', giacu: '14.000.000', km: '1.000.000', manhinh: 'LED backlit LCD, 10.2 &rdquo', HDH: 'iPadOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 2, class_gia:'7_13', link: 'ipad-10-2-inch-wifi-cellular-32gb-2019-gold.html', hinhanh: 'assets/img/product/3_tl_ipad-pro-128gb-2020.jpg', ten: 'iPad Pro 2020', giamoi: '12.000.000', giacu: '14.000.000', km: '1.000.000', manhinh: 'LED backlit LCD, 10.2 &rdquo', HDH: 'iPadOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 3, class_gia:'7_13', link: 'ipad-10-2-inch-wifi-cellular-32gb-2019-gold.html', hinhanh: 'assets/img/product/3_tl_ipad-10-2-inch-wifi-cellular-32gb-2019-gold.jpg', ten: 'iPad Cellular 32GB (2019)', giamoi: '11.000.000', giacu: '14.000.000', km: '1.000.000', manhinh: 'LED backlit LCD, 10.2 &rdquo', HDH: 'iPadOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 4, class_gia:'7_13', link: 'ipad-10-2-inch-wifi-cellular-32gb-2019-gold.html', hinhanh: 'assets/img/product/3_tl_ipad-pro-128gb-2020.jpg', ten: 'iPad Pro 2020', giamoi: '10.000.000', giacu: '14.000.000', km: '1.000.000', manhinh: 'LED backlit LCD, 10.2 &rdquo', HDH: 'iPadOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },

            { id: 5, class_gia:'Duoi7', link: 'ipad-10-2-inch-wifi-cellular-32gb-2019-gold.html', hinhanh: 'assets/img/product/3_tl_ipad-mini-64gb-2019-gold.jpg', ten: 'iPad Mini 2019', giamoi: '7.000.000', giacu: '14.000.000', km: '1.000.000', manhinh: 'LED backlit LCD, 10.2 &rdquo', HDH: 'iPadOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 6, class_gia:'Duoi7', link: 'ipad-10-2-inch-wifi-cellular-32gb-2019-gold.html', hinhanh: 'assets/img/product/3_tl_ipad-air-2019-gold.jpg', ten: 'iPad Air 2020', giamoi: '6.000.000', giacu: '14.000.000', km: '1.000.000', manhinh: 'LED backlit LCD, 10.2 &rdquo', HDH: 'iPadOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },

        ],

        samsung_tab: [
            { id: 1, class_gia:'Duoi7', link: 'ipad-10-2-inch-wifi-cellular-32gb-2019-gold.html', hinhanh: 'assets/img/product/3_tl_samsung-galaxy-tab-a8-plus.jpg', ten: 'Samsung galaxy tab', giamoi: '13.000.000', giacu: '14.000.000', km: '1.000.000', manhinh: 'LED backlit LCD, 10.2 &rdquo', HDH: 'iPadOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 2, class_gia:'Duoi7', link: 'ipad-10-2-inch-wifi-cellular-32gb-2019-gold.html', hinhanh: 'assets/img/product/3_tl_samsung-galaxy-tab-a8-t295-2019-silver.jpg', ten: 'Samsung galaxy tab', giamoi: '12.000.000', giacu: '14.000.000', km: '1.000.000', manhinh: 'LED backlit LCD, 10.2 &rdquo', HDH: 'iPadOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },
            { id: 3, class_gia:'Duoi7', link: 'ipad-10-2-inch-wifi-cellular-32gb-2019-gold.html', hinhanh: 'assets/img/product/3_tl_samsung-galaxy-tab-s6-lite.jpg', ten: 'Samsung galaxy tab', giamoi: '11.000.000', giacu: '14.000.000', km: '1.000.000', manhinh: 'LED backlit LCD, 10.2 &rdquo', HDH: 'iPadOS 13', CameraSau: '3 camera 12 MP', CameraTruoc: '12 MP', CPU: 'Apple A13 Bionic 6 nhân', RAM: '4 GB', ROM: '64 GB' },

        ],



        tn: [
            { id: 1, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/4_tn_tai-nghe-chup-tai-corsair-hs50-pro.jpg', ten: 'Tai nghe Corsair hs50', giamoi: '1.000.000', giacu: '2.000.000', km: '100.000', TuongThich: 'Android, Windows, iOS (iPhone)', Jack: '3.5 mm' },
            { id: 2, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/4_tn_tai-nghe-ep-bluetooth-sony.jpg', ten: 'Tai nghe bluetooth sony', giamoi: '1.000.000', giacu: '2.000.000', km: '100.000', TuongThich: 'Android, Windows, iOS (iPhone)', Jack: '3.5 mm' },
            { id: 3, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/4_tn_tai-nghe-chup-tai-gaming-71-rapoo.jpg', ten: 'Tai nghe 71 rapoo', giamoi: '1.000.000', giacu: '2.000.000', km: '100.000', TuongThich: 'Android, Windows, iOS (iPhone)', Jack: '3.5 mm' },
            { id: 4, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/4_tn_tai-nghe-xiaomi-zbw4493gl.jpg', ten: 'Tai nghe xiaomi zbw4493gl', giamoi: '1.000.000', giacu: '2.000.000', km: '100.000', TuongThich: 'Android, Windows, iOS (iPhone)', Jack: '3.5 mm' },
            { id: 5, class_gia:'Duoi7', link: 'iphone-11-pro-max-green.html', hinhanh: 'assets/img/product/4_tn_tai-nghe-wh-xb700.jpg', ten: 'Tai nghe wh xb700', giamoi: '1.000.000', giacu: '2.000.000', km: '100.000', TuongThich: 'Android, Windows, iOS (iPhone)', Jack: '3.5 mm' },
        ],
    
        // Liên Hệ
        // Tạo biến quản lý lỗi là mảng rỗng
        errors: [],

        // Tạo biến quản lý việc kiếm tra Ràng buộc dữ liệu (validation) hay chưa?
        // Mặc định là chưa kiểm tra
        dakiemtraloixong: false,

        // Khởi tạo giá trị ban đầu cho FORM
        hoten: '',
        email: '',
        sodienthoai: '',
        loinhan: ''
    },

    methods: {
        kiemTraDuLieu: function (e) {
            // Dừng sự kiện tiếp theo của FORM
            e.preventDefault();

            // Trước khi kiểm tra, cần reset lại biến lỗi
            // => Giả sử như chưa có lỗi xảy ra
            this.errors = [];
            this.dakiemtraloixong = false;

            // Validate Họ tên
            // Kiểm tra rỗng
            if (this.hoten == "") {
                this.errors.push('Vui lòng nhập Họ tên');
            } else if (this.hoten.length < 5) { // Kiểm tra độ dài
                this.errors.push('Vui lòng nhập Họ tên 5 ký tự trở lên');
            }

            // Validate Email
            // Kiểm tra rỗng
            if (this.email == "") {
                this.errors.push('Vui lòng nhập địa chỉ Email');
            } else if (this.email.length < 5) { // Kiểm tra độ dài
                this.errors.push('Vui lòng nhập địa chỉ Email 5 ký tự trở lên');
            } else if (!this.validateEmail(this.email)) { // Kiểm tra mẫu nhập EMAIL
                this.errors.push('Vui lòng nhập email đúng định dạng');
            }

            // Validate Số điện thoại
            // Kiểm tra rỗng
            if (this.sodienthoai == "") {
                this.errors.push('Vui lòng nhập số điện thoại');
            } else if (this.sodienthoai.length < 5) { // Kiểm tra độ dài
                this.errors.push('Vui lòng nhập số điện thoại 5 ký tự trở lên');
            }

            // Validate Lời nhắn
            // Kiểm tra rỗng
            if (this.loinhan == "") {
                this.errors.push('Vui lòng nhập lời nhắn');
            } else if (this.loinhan.length < 5) { // Kiểm tra độ dài
                this.errors.push('Vui lòng nhập lời nhắn 5 ký tự trở lên');
            }

            // Đã kiểm tra lỗi xong
            this.dakiemtraloixong = true;

            // Ví dụ demo, ngưng gởi dữ liệu SUBMIT đi
            // Always return false
            return false;
        },
        validateEmail: function (email) {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                return true;
            }
            return false;
        },
        hienThiThongBaoLoi: function() {
            // Nếu chưa vượt qua bước kiểm tra lỗi thì không được hiển thị thông báo
            if(this.dakiemtraloixong == false) {
                return false;
            }

            // Nếu có bất kỳ lỗi nào (mảng array lỗi không rỗng) => độ dài array > 0)
            // Có lỗi => được hiển thị thông báo lỗi
            if(this.errors.length > 0) {
                return true;
            } 

            // Nếu không có lỗi thì không được hiển thị thông báo lỗi
            return false;
        },
        hienThiThongBaoChaoMung: function() {
            // Nếu chưa vượt qua bước kiểm tra lỗi thì không được hiển thị thông báo
            if(this.dakiemtraloixong == false) {
                return false;
            }

            // Nếu không có bất kỳ lỗi nào (mảng array lỗi là rỗng) => độ dài array == 0)
            // Không có lỗi => được hiển thị thông báo chào mừng
            if(this.errors.length == 0) {
                return true;
            } 

            // Mặc định không hiển thị
            return false;
        }
    }
});
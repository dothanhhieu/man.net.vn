<?php
    require_once('comp/head.php');
    $page='list';
    require_once('lib/db.php');
    require_once('config.php');
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('comp/layout_head.php');?>
    <link rel="stylesheet" href="css/news.css">
    <link rel="stylesheet" href="css/category.css">
</head>

<body>
    <?php require_once('comp/page_menu.php');?>
    <header>
    </header>
    <main>
        <section class="title">
            <div class="cover pt-5 pb-5">
                <div class="content pt-3 pb-3">
                    <h3>Chi nhánh</h3>
                    <p class="mt-4">&nbsp;</p>
                </div>
            </div>
        </section>
        <section class="main">
            <div class="container mt-5 mb-2">
                <div class="row">
                    <div class="col-md-8 p-3">
                        <iframe id="frm_map"
                            src="https://www.google.com/maps/d/embed?mid=1BPDJrffFhwuhysCvMYHv1tDy_WFqZja1&hl=vi&ll=15.516911032273114%2C105.58696114042375&z=6"
                            width="100%" style="border:none"></iframe>
                    </div>
                    <div class="col-md-4">
                        <div id="lst_branch" class="branch-info" style="overflow-y:auto;font-size:.9rem;">
                        <h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">1</span>&nbsp;<a href="http://maps.google.com/maps?q=10.742929845216006,106.7172689878772&z=17" style="color:red;font-weight:bolder;">VP Chính  TPHCM/ Sài gòn</a></h5>19A, đường 43, P. Bình Thuận, Quận 7</br>Hồ Chí Minh
                        <h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">2</span>&nbsp;<a href="http://maps.google.com/maps?q=10.967430035174932,106.6585630863767&z=17" style="color:orange;">VP Đại diện  Bình Dương</a></h5>Số H242/83 Khu phố 9, Phường Chánh Nghĩa, Thành phố Thủ Dầu Một</br>Bình Dương</br><em>Mr. Hải: <span style="color:blue;">0974666454</span></em>
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">3</span>&nbsp;<a href="http://maps.google.com/maps?q=10.989965378023294,106.66652931347768&z=17" style="color:orange;">VP Đại diện  Bình Dương</a></h5>Số 48/200 đường Hoàng Hoa Thám, Tổ 55, Khu 6, Phường Phú Lợi, Thành phố Thủ Dầu Một</br>Bình Dương</br><em>Mr. Tư: <span style="color:blue;">0913793366</span></em>
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">4</span>&nbsp;<a href="http://maps.google.com/maps?q=16.032029602414795,108.21404579986913&z=17" style="color:orange;">VP Đại diện  Đà Nẵng</a></h5>Tầng M, Toà nhà MEICO, 224 Xô Viết Nghệ Tĩnh, Phường Khuê Trung, Quận Cẩm Lệ</br>Đà Nẵng</br><em>Mr. Tiến: <span style="color:blue;">0905895898</span></em>
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">5</span>&nbsp;<a href="http://maps.google.com/maps?q=15.879978824602471,108.33844977450029&z=17" style="color:orange;">VP Đại diện  Hội An/ Quảng Nam</a></h5>, Thành phố Hội An</br>Quảng Nam</br><em>Ms. Thu: <span style="color:blue;">0905305575</span></em>
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">6</span>&nbsp;<a href="http://maps.google.com/maps?q=10.244186160952516,106.35574808273601&z=17" style="color:orange;">VP Đại diện  Bến Tre</a></h5>18A18 Bình Khi, Phường 6, Thành phố Bến Tre</br>Bến Tre</br><em>Mr. Nguyễn: <span style="color:blue;">0909205009</span></em>
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">7</span>&nbsp;<a href="http://maps.google.com/maps?q=10.939977568728892,108.13742834861974&z=17" style="color:orange;">VP Đại diện  Bình Thuận/ Phan Thiết</a></h5>3-5 Hoàng Sâm, Phường Phú Hài, Thành phố Phan Thiết</br>Bình Thuận</br><em>Ms. Quyên: <span style="color:blue;">0975700538</span></em>
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">8</span>&nbsp;<a href="http://maps.google.com/maps?q=11.582554287699937,108.99122912506905&z=17" style="color:orange;">VP Đại diện  Ninh Thuận/ Phan Rang</a></h5>, Thành phố Phan Rang</br>Ninh Thuận</br><em>Mr. Ý: <span style="color:blue;">091 8921930</span></em>
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">9</span>&nbsp;<a href="http://maps.google.com/maps?q=10.536262324744081,106.4072186555112&z=17" style="color:orange;">VP Đại diện  Long An</a></h5>Long An</br><em>Ms. Hà: <span style="color:blue;">093 7132956</span></em>
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">10</span>&nbsp;<a href="http://maps.google.com/maps?q=11.334550177495926,106.10733522447124&z=17" style="color:orange;">VP Đại diện  Tây Ninh</a></h5>Tây Ninh
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">11</span>&nbsp;<a href="http://maps.google.com/maps?q=10.375960038860523,106.34561712394158&z=17" style="color:orange;">VP Đại diện  Bà Rịa - Vũng Tàu</a></h5>Bà Rịa - Vũng Tàu</br><em>Mr. Ân: <span style="color:blue;">0909909289</span></em>
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">12</span>&nbsp;<a href="http://maps.google.com/maps?q=10.040043976160351,105.76110828128047&z=17" style="color:orange;">VP Đại diện  Tiền Giang</a></h5>Tiền Giang</br><em>Ms. Lam: <span style="color:blue;">0977202828</span></em>
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">13</span>&nbsp;<a href="http://maps.google.com/maps?q=21.027562955554863,105.83422014592726&z=17" style="color:orange;">VP Đại diện  Cần Thơ</a></h5>Cần Thơ</br><em>Ms. Nhã:: <span style="color:blue;">0939942494</span></em>
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">14</span>&nbsp;<a href="http://maps.google.com/maps?q=21.03032376924554,105.84526262047667&z=17" style="color:orange;">VP Đại diện  Hà Nội</a></h5>Hà Nội</br><em>Mr. Hồng: <span style="color:blue;">090 3226399</span></em>
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">15</span>&nbsp;<a href="http://maps.google.com/maps?q=10.772340037736448,106.69867955070853&z=17" style="color:orange;">VP Đại diện  Quận 1</a></h5>, Quận 1</br>Hồ Chí Minh</br><em>Ms. Hạnh: <span style="color:blue;">076695979</span></em>
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">16</span>&nbsp;<a href="http://maps.google.com/maps?q=9.174002061460174,105.15112035557925&z=17" style="color:orange;">VP Đại diện  Cà Mau</a></h5>Cà Mau</br><em>Mr. Nam: <span style="color:blue;">0961371143</span></em>
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">17</span>&nbsp;<a href="http://maps.google.com/maps?q=9.806053647361313,105.65471432930106&z=17" style="color:orange;">VP Đại diện  Hậu Giang</a></h5>Hậu Giang</br><em>Ms. Thi: <span style="color:blue;">0939961209</span></em>
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">18</span>&nbsp;<a href="http://maps.google.com/maps?q=13.779559913643283,109.22273826752347&z=17" style="color:orange;">VP Đại diện  Bình Định</a></h5>Bình Định</br><em>Mr. Trịnh: <span style="color:blue;">0934944468</span></em>
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">19</span>&nbsp;<a href="http://maps.google.com/maps?q=10.92635142094156,107.24812363385767&z=17" style="color:orange;">VP Đại diện  Đồng Nai</a></h5>Đồng Nai</br><em>Mr. Thuyền: <span style="color:blue;">098 2582350</span></em>
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">20</span>&nbsp;<a href="http://maps.google.com/maps?q=12.269156259552874,109.19174483688784&z=17" style="color:orange;">VP Đại diện  Nha Trang/ Khánh Hoà</a></h5>Khánh Hoà
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">21</span>&nbsp;<a href="http://maps.google.com/maps?q=11.93077930092342,108.4501716846924&z=17" style="color:orange;">VP Đại diện  Đà Lạt/ Lâm Đồng</a></h5>PAI Homestay, Phường 3, Thành phố Đà Lạt</br>Lâm Đồng</br><em>Ms. Chi: <span style="color:blue;">0909976824</span></em>
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">22</span>&nbsp;<a href="http://maps.google.com/maps?q=11.542457729448056,106.9161358746105&z=17" style="color:orange;">VP Đại diện  Bình Phước</a></h5>Bình Phước</br><em>Mr. Khai: <span style="color:blue;">0918177926</span></em>
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">23</span>&nbsp;<a href="http://maps.google.com/maps?q=10.715283072796225,105.52052257817273&z=17" style="color:orange;">VP Đại diện  Đồng Tháp</a></h5>Đồng Tháp</br><em>Ms. Tươi: <span style="color:blue;"></span></em>
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">24</span>&nbsp;<a href="http://maps.google.com/maps?q=10.253914710694566,105.95385567915527&z=17" style="color:orange;">VP Đại diện  Vĩnh Long</a></h5>Vĩnh Long
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">25</span>&nbsp;<a href="http://maps.google.com/maps?q=9.605473090273964,105.97609458675127&z=17" style="color:orange;">VP Đại diện  Sóc Trăng</a></h5>Sóc Trăng 
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">26</span>&nbsp;<a href="http://maps.google.com/maps?q=9.287694223534496,105.72566358051677&z=17" style="color:orange;">VP Đại diện  Bạc Liêu</a></h5>Bạc Liêu
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">27</span>&nbsp;<a href="http://maps.google.com/maps?q=20.85234799884903,106.68621484163698&z=17" style="color:orange;">VP Đại diện  Hải Phòng</a></h5>Hải Phòng 
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">28</span>&nbsp;<a href="http://maps.google.com/maps?q=20.674061862846155,106.06125672348975&z=17" style="color:orange;">VP Đại diện  Hưng Yên</a></h5>Hưng Yên
<h6 class="mt-3"><span class="pl-1 pr-1 bg-primary" style="border-radius:50%;color:#fff;display:inline-block;width:1.5rem;height:1.5rem;text-align:center;line-height:1.5rem;">29</span>&nbsp;<a href="http://maps.google.com/maps?q=19.806382978959995,105.7801721584314&z=17" style="color:orange;">VP Đại diện  Thanh Hoá</a></h5>Thanh Hoá

                        </div>
                    </div>
                </div>
            </div>
            <div class="frm container mb-5">
        <div class="row">
            <div class="col-lg-12 pr-3 mb-5">
                <p class="font-italic pt-4">Mọi thông tin vui lòng điền các yêu cầu vào form bên dưới và gửi cho MAN.
                    Chúng tôi sẽ phản hồi đến các bạn ngay
                    khi nhận được yêu cầu</p>
                <form>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <label for="txtFullName">Họ và tên *</label>
                            <input type="text" name="txtFullName" id="txtFullName" class="form-control">
                        </div>
                        <div class="col-lg-6">
                            <label for="txtEmail">Email *</label>
                            <input type="email" name="txtEmail" id="txtEmail" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <label for="txtPhone">Số điện thoại *</label>
                            <input type="text" name="txtPhone" id="txtPhone" class="form-control">
                        </div>
                        <div class="col-lg-6">
                            <label for="txtTitle">Tiêu đề *</label>
                            <input type="text" name="txtTitle" id="txtTitle" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="txtContent">Chi tiết yêu cầu của bạn</label>
                            <textarea rows="3" name="txtContent" id="txtContent" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <button class="btn"
                                style="border:1px solid gray; min-width:100px;border-radius: 0px;">Xóa</button><button id="btn_send_idea" type="button"
                                class="ml-3 btn btn-warning text-light"
                                style="min-width:100px;border-radius: 0px;">Gửi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        </section>
    </main>

    <?php require_once('comp/footer.php');?>

    <script src="vendor/jquery-3.5.1.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/aos/aos.js"></script>
    <script>
    AOS.init({
        easing: 'ease-out-back',
        duration: 1000
    });
    </script>
    <script>
    // hljs.initHighlightingOnLoad();
    $('.hero__scroll').on('click', function(e) {
        $('html, body').animate({
            scrollTop: $(window).height()
        }, 1200);
    });
    $(document).ready(function() {
        // $fn.scrollSpeed(step, speed, easing);
        //jQuery.scrollSpeed(200, 1000);
    });

    // Custom scrolling speed with jQuery
    // Source: github.com/ByNathan/jQuery.scrollSpeed
    // Version: 1.0.2

    (function($) {

        jQuery.scrollSpeed = function(step, speed, easing) {

            var $document = $(document),
                $window = $(window),
                $body = $('html, body'),
                option = easing || 'default',
                root = 0,
                scroll = false,
                scrollY,
                scrollX,
                view;

            if (window.navigator.msPointerEnabled)

                return false;

            $window.on('mousewheel DOMMouseScroll', function(e) {

                var deltaY = e.originalEvent.wheelDeltaY,
                    detail = e.originalEvent.detail;
                scrollY = $document.height() > $window.height();
                scrollX = $document.width() > $window.width();
                scroll = true;

                if (scrollY) {

                    view = $window.height();

                    if (deltaY < 0 || detail > 0)

                        root = (root + view) >= $document.height() ? root : root += step;

                    if (deltaY > 0 || detail < 0)

                        root = root <= 0 ? 0 : root -= step;

                    $body.stop().animate({

                        scrollTop: root

                    }, speed, option, function() {

                        scroll = false;

                    });
                }

                if (scrollX) {

                    view = $window.width();

                    if (deltaY < 0 || detail > 0)

                        root = (root + view) >= $document.width() ? root : root += step;

                    if (deltaY > 0 || detail < 0)

                        root = root <= 0 ? 0 : root -= step;

                    $body.stop().animate({

                        scrollLeft: root

                    }, speed, option, function() {

                        scroll = false;

                    });
                }

                return false;

            }).on('scroll', function() {

                if (scrollY && !scroll) root = $window.scrollTop();
                if (scrollX && !scroll) root = $window.scrollLeft();

            }).on('resize', function() {

                if (scrollY && !scroll) view = $window.height();
                if (scrollX && !scroll) view = $window.width();

            });
        };

        jQuery.easing.default = function(x, t, b, c, d) {

            return -c * ((t = t / d - 1) * t * t * t - 1) + b;
        };

    })(jQuery);
    </script>
    <script src="js/layout.js"></script>

    <script src="js/news.js"></script>
    <script>
    var h = document.getElementById('frm_map').clientWidth;
    document.getElementById('frm_map').height = h + 'px';
    document.getElementById('lst_branch').style.height=h+"px";
    </script>
</body>

</html>
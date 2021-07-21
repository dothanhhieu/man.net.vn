<?php
    $page='detail';
    require_once('comp/head.php');
    if(!isset($_GET['id']))
    {
        header('location:index.php');
    }
    $ser=DP::run_query('SELECT `id`, `tit`, `des`, `content`, `create_time`, `create_mem`, `edit_time`, `edit_mem`, `status`,`parent_id`, `rank` FROM `services` WHERE `status`=1 and `id`=?',[$_GET['id']],2);
	if(count($ser)==0)
	{
		header('location:index.php');
	}
    $ser=$ser[0];
    $lst_ser_1=DP::run_query('SELECT `id`, `tit`, `des`, `content`, `status`, `create_mem`, `create_time`, `edit_time`, `edit_mem`, `parent_id`, `rank` FROM `services` where `status`=1 and `parent_id`=0 order by `rank`',[],2);
?><!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('comp/layout_head.php');?>
    <link rel="stylesheet" href="css/news.css">
</head>

<body>
    <?php require_once('comp/page_menu.php');?>
    <header>
    </header>
    <main>
        <section class="title">
            <div class="cover pt-5 pb-5">
                <div class="content pt-3 pb-3">
                    <h3><?php echo $ser['tit'];?></h3>
                    <p class="mt-4"><?php echo $ser['des'];?></p>
                </div>
            </div>
        </section>
        <section class="main">
            <div class="content mt-5 mb-5">
                <div class="row">
                    <div class="sb-left col-lg-2">
                        <div class="sticky">
                            <p class="font-weight-bold">ĐĂNG TẢI NGÀY</p>
                            <p class="mt-2"><?php echo date_format(date_create($ser['edit_time']),"d/m/Y - h:m");?></p>
                        </div>
                    </div>
                    <div class="col-lg-7 text-justify" style="-moz-user-select: none;-webkit-user-select: none; -ms-user-select: none;-o-user-select: none;user-select: none;">
                        <div>
                        <?php echo $ser['content'];?>
                        </div>
                        <div class="responsive-time">
                            <p class="font-weight-bold">ĐĂNG TẢI NGÀY</p>
                            <p class="mt-2"><?php echo date_format(date_create($ser['edit_time']),"d/m/yy - h:m");?></p>
                            <!-- <p class="mt-4">Chia sẻ bài viết</p>
                            <div class="d-flex"><button class="btn btn-sm btn-primary"
                                    style="width:40%;margin-right:10px">Share</button><button
                                    class="btn btn-sm btn-primary" style="width:40%">Tải về</button></div> -->
                        </div>
                    </div>
                    <div class="sb-right pl-4 col-lg-3">
                        <div class="sticky">
                        <p class="font-weight-bold">DỊCH VỤ KHÁC</p>
                        <ul>
                        <?php $ser1_id=0;
                        foreach($lst_ser_1 as $ser1){ ?>
                            <li <?php if($_GET['id']==$ser1['id']) {echo 'class="active"'; //$ser1_id=$ser1['id'];
                            }?>><a href="detail.php?id=<?php echo $ser1['id'];?>"><?php echo $ser1['tit'];?></a>
                            <?php
                                 $lst_ser_2=DP::run_query('SELECT `id`, `tit`, `des`, `content`, `status`, `create_mem`, `create_time`, `edit_time`, `edit_mem`, `parent_id`, `rank` FROM `services` where `status`=1 and `parent_id`=? order by `rank`',[$ser1['id']],2);
                                 if(count($lst_ser_2)>0)
                                 {
                                    ;
                            ?>
                                <i class="fas fa-angle-right ml-2"
                                    sub-id="id<?php echo $ser1['id'];?>"></i>
                                <ul id="id<?php echo $ser1['id'];?>">
                                    <?php foreach($lst_ser_2 as $ser2){ ?>
                                    <li <?php if($_GET['id']==$ser2['id']) {echo 'class="active"';$ser1_id=$ser1['id'];}?>><a href="detail.php?id=<?php echo $ser2['id'];?>"><?php echo $ser2['tit'];?></a></li>
                                    <?php } ?>                                   
                                </ul>
                                <?php }
                                ?>
                            </li>
                        <?php }?>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact" class="map">
            <div class="devide p-3 position-relative">
                <div class="position-absolute icon">
                    <i class="fas fa-angle-down"></i>
                </div>
                <h4 class="content text-light pl-5">Liên Hệ Với Chúng Tôi</h4>
            </div>
            <div class="frm content mt-5 mb-5">
                <div class="row">
                    <div class="col-lg-8 pr-4">
                    <?php require_once('comp/contact.php');?>
                    </div>
                    <div class="right col-lg-4">
                    <?php require_once('comp/page_officer.php');?>
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
        $('.hero__scroll').on('click', function (e) {
            $('html, body').animate({
                scrollTop: $(window).height()
            }, 1200);
        });
        $(document).ready(function () {
            // $fn.scrollSpeed(step, speed, easing);
            //jQuery.scrollSpeed(200, 1000);
        });

        // Custom scrolling speed with jQuery
        // Source: github.com/ByNathan/jQuery.scrollSpeed
        // Version: 1.0.2

        (function ($) {

            jQuery.scrollSpeed = function (step, speed, easing) {

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

                $window.on('mousewheel DOMMouseScroll', function (e) {

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

                        }, speed, option, function () {

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

                        }, speed, option, function () {

                            scroll = false;

                        });
                    }

                    return false;

                }).on('scroll', function () {

                    if (scrollY && !scroll) root = $window.scrollTop();
                    if (scrollX && !scroll) root = $window.scrollLeft();

                }).on('resize', function () {

                    if (scrollY && !scroll) view = $window.height();
                    if (scrollX && !scroll) view = $window.width();

                });
            };

            jQuery.easing.default = function (x, t, b, c, d) {

                return -c * ((t = t / d - 1) * t * t * t - 1) + b;
            };

        })(jQuery);
    </script>
    <script src="js/layout.js"></script>
    
    <script src="js/news.js"></script>
    <script>
    <?php
        echo '$(".sb-right ul ul#id'.$ser1_id.'").slideDown();';
    ?>
    </script>
</body>

</html>
<?php
    $page='list';
    require_once("comp/head.php");
    if(!isset($_GET['id']))
    {
        header('location:index.php');
    }
    $news=DP::run_query('SELECT `id`, `tit`, `img`, `des`, `content`, `create_time`, `create_mem`, `edit_time`, `edit_mem`, `status`, `rank`, `catid` FROM `news` WHERE `status`=1 and `id`=?',[$_GET['id']],2);
	if(count($news)==0)
	{
		header('location:index.php');
	}
    $news=$news[0];
    $lst_rel = DP::run_query('SELECT `id`, `tit`, `img`, `des`, `content`, `create_time`, `create_mem`, `edit_time`, `edit_mem`, `status`, `rank`, `catid` FROM `news` WHERE `status`=1 and `catid`=? and `id`<>? order by `edit_time` desc limit 0,4',[$news['catid'],$_GET['id']],2);
?>
<!DOCTYPE html>
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
                    <h3 >Tin tức</h3>      
                    <p class="mt-4"><?php echo $news['tit'];?></p>              
                </div>
            </div>
        </section>
        <section class="main">
            <div class="content mt-5 mb-5">
                <div class="row">
                    <div class="sb-left col-lg-2">
                        <div class="sticky">
                            <p class="font-weight-bold">ĐĂNG TẢI NGÀY</p>
                            <p class="mt-2"><?php echo date_format(date_create($news['edit_time']),"d/m/Y - h:m");?></p>
                           
                        </div>
                    </div>
                    <div class="col-lg-7 text-justify"  style="-moz-user-select: none;-webkit-user-select: none; -ms-user-select: none;-o-user-select: none;user-select: none;">                        
                        <!-- <div style="font-style:italic;">                  
                        <?php echo $news['des'];?>   
                        </div>  -->
                        <!-- <div class="news-imp">
                            <img src="<?php echo NEWS_PATH.$news['img'];?>" alt="" class="img-fluid img-thumbnail">
                        </div>                  -->
                       <div>
                       <?php echo $news['content'];?>
                       </div>
                        <div class="responsive-time">
                            <p class="font-weight-bold">ĐĂNG TẢI NGÀY</p>
                            <p class="mt-2"><?php echo date_format(date_create($news['edit_time']),"d/m/yy - h:m");?></p>
                            <!-- <p class="mt-4">Chia sẻ bài viết</p>
                            <div class="d-flex"><button class="btn btn-sm btn-primary"
                                    style="width:40%;margin-right:10px">Share</button><button
                                    class="btn btn-sm btn-primary" style="width:40%">Tải về</button></div> -->
                        </div>
                    </div>
                    <div class="sb-right pl-4 col-lg-3">
                        <div class="sticky">
                        <p class="font-weight-bold" style="padding-left:15px">TIN TỨC LIÊN QUAN</p>
                            <div class="container-fluid">
                                <div class="row">
                                    <?php
                                    foreach($lst_rel as $rel){
                                    ?>
                                    <div class="col-12 mb-4">
                                        <div style="border:1px solid #dfdfdf">
                                        <div class="img"> <img src="<?php echo NEWS_PATH.$rel['img']?>" alt="" class="w-100">
                                        </div>
                                        <p class="text-right date pt-2 mb-2 pr-2" style="font-size:.9em;color:#4a4a4a;font-weight:300;"><?php echo date_format(date_create($rel['edit_time']),"d/m/yy");?></p>
                                        <p class="mt-0 pl-2 pr-2 text-justify"><a href="news.php?id=<?php echo $rel['id'];?>" class="tit" style="color:#4a4a4a;font-weight:600;">
                                        <?php echo $rel['tit'];?>
                                            </a></p>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
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

    <?php require_once("comp/footer.php");?>

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
</body>

</html>
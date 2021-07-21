<section id="supp" class="advisory container-fluid aos-item aos-init aos-animate" data-aos="fade-down"
    data-aos-easing="linear" data-aos-duration="1000">
    <div class="row content align-items-center">
        <div class="col-md-8 left">
            <h3 class="text-center">Đội Ngũ Tư Vấn</h3>
            <div id="lst-officer" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach($lst_officer as $key=>$cus){?>
                    <?php if($key%3==0) {?><div
                        class="carousel-item <?php echo ($key==0?'active':'');?> container-fluid">
                        <div class="row text-center">
                            <?php }?>
                            <div class="col-md-4">
                                <img src="<?php echo OFFICER_PATH.$cus['img'].'?'.rand();?>"
                                    alt="<?php echo $cus['name'];?>" class="img-fluid img-thumbnail">
                                <h5 class="mt-2"><?php echo $cus['name'];?></h5>
                                <p><?php echo $cus['pos'];?></p>
                                <div class="line mb-3"></div>
                                <p class="d-info"><?php echo $cus['phone'];?></p>
                                <p class="d-info"><?php echo $cus['email'];?></p>
                                <p>Ngôn ngữ: <?php echo $cus['lang'];?></p>
                            </div>
                            <?php if($key%3==2 || $key==count($lst_officer)-1) {?>
                        </div>
                    </div>
                </div><?php } 
                    } ?>
            </div>
        </div>
        <div class="col-md-4 right text-right">
            <h3 class="pb-4">Trở Thành Cộng Sự Của Chúng Tôi Ngay</h3>
            <p class="font-italic">Hãy để lại thông tin, chúng tôi sẽ liên lạc với bạn ngay khi chúng tôi nhận
                được</p>
            <p><a href="#" data-toggle="modal" data-target="#model_ctv">Tham gia ngay!</a></p>
        </div>
    </div>
</section>
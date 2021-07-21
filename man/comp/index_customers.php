<section class="content customer container-fluid text-center">
    <h3>Khách Hàng Của Chúng Tôi</h3>
    <div id="lst-cus" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
                foreach($lst_customers as $key=>$cus){
                ?>
            <?php if($key%12==0){?><div class="carousel-item<?php echo ($key==0?' active':'');?> container-fluid">
                <div class="row pt-5 align-items-center"><?php } ?>
                    <div class="col-md-2 mb-5"><img src="<?php echo LOGOCUS_PATH.$cus['logo'].'?'.rand();?>" alt=""
                            class="img-fluid"></div>
                    <?php if($key%12==11 || $key==count($lst_customers)-1){?>
                </div>
            </div><?php } ?>
            <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#lst-cus" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#lst-cus" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div id="lst-cus-2" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
                foreach($lst_customers as $key=>$cus){
                ?>
            <?php if($key%8==0){?><div class="carousel-item<?php echo ($key==0?' active':'');?> container-fluid">
                <div class="row pt-5 align-items-center"><?php } ?>
                    <div class="col-3 mb-5"><img src="<?php echo LOGOCUS_PATH.$cus['logo'].'?'.rand();?>" alt=""
                            class="img-fluid"></div>
                    <?php if($key%8==7 || $key==count($lst_customers)-1){?>
                </div>
            </div><?php } ?>
            <?php } ?>
        </div>
        <a class="carousel-control-prev" href="#lst-cus-2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#lst-cus-2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
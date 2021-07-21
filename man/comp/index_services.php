<section id="ser" class="require container-fluid"
    style="overflow: hidden;background: linear-gradient(to right, #f7f8fc, #f7f8fc,#fff);">
    <div class="content row">
        <h2 class="col-md-4 text-right">Nhu Cầu <br>Của Quý Khách</h2>
        <ul class="lst-require col-md-4 aos-item aos-init aos-animate" data-aos="fade-right" data-aos-duration="1500"
            style="background-color: #fff;">
            <?php for($i=0;$i<$num_ser_1;$i++){ ?>
            <li>
                <h4>
                    <?php 
                    $lst_ser_2=DP::run_query('SELECT `id`, `tit`, `des`, `content`, `status`, `create_mem`, `create_time`, `edit_time`, `edit_mem`, `parent_id`, `rank` FROM `services` where `status`=1 and `parent_id`=? order by `rank`',[$lst_ser_1[$i]['id']],2);
                    if(count($lst_ser_2)>0)
                    {
                        echo $lst_ser_1[$i]['tit'];
                    ?>
                </h4>
                <p>
                    <?php echo $lst_ser_1[$i]['des']?></p>               
                    <div>
                    <div class="card card-body" style="background-color:#F1F2F6;border-color:#F5A623;">
                        <ul>
                            <?php foreach($lst_ser_2 as $ser){
                                ?>
                            <li> <<?php echo (trim($ser['content'])!=''?'a':'span'); ?> href="detail.php?id=<?php echo $ser['id'];?>"><?php echo $ser['tit'];?></<?php echo (trim($ser['content'])!=''?'a':'span'); ?>>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php 
                    }
                    else
                    {
                    ?>
                    <a href="<?php echo 'detail.php?id='.$lst_ser_1[$i]['id'];?>"><?php echo $lst_ser_1[$i]['tit'];?></a>
                    </h4>
                    <p>
                    <?php echo $lst_ser_1[$i]['des']?></p>   
                    <?php
                    }
                    ?>
            </li>
            <?php } ?>
        </ul>
        <ul class="lst-require col-md-4 content aos-item aos-init aos-animate" data-aos="fade-left"
            data-aos-duration="1500" style="background-color: #fff;">
            <?php $num_ser=count($lst_ser_1);
            for($i=$num_ser_1;$i<$num_ser;$i++){ ?>
            <li>
                <h4>
                <?php 
                    $lst_ser_2=DP::run_query('SELECT `id`, `tit`, `des`, `content`, `status`, `create_mem`, `create_time`, `edit_time`, `edit_mem`, `parent_id`, `rank` FROM `services` where `status`=1 and `parent_id`=? order by `rank`',[$lst_ser_1[$i]['id']],2);
                    if(count($lst_ser_2)>0)
                    {
                     echo $lst_ser_1[$i]['tit'];?>
                </h4>
                <p>
                    <?php echo $lst_ser_1[$i]['des']?></p>
                <div>
                    <div class="card card-body" style="background-color:#F1F2F6;border-color:#F5A623;">
                        <ul>
                            <?php foreach($lst_ser_2 as $ser){
                                ?>
                            <li> <<?php echo (trim($ser['content'])!=''?'a':'span'); ?> href="detail.php?id=<?php echo $ser['id'];?>"><?php echo $ser['tit'];?></<?php echo (trim($ser['content'])!=''?'a':'span'); ?>>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <?php 
                }
                else
                {
                ?>
                <a href="<?php echo 'detail.php?id='.$lst_ser_1[$i]['id'];?>"><?php echo $lst_ser_1[$i]['tit'];?></a>
                </h4>
                <p>
                <?php echo $lst_ser_1[$i]['des']?></p>   
                <?php
                }
                ?>
            </li>
            <?php } ?>
        </ul>
    </div>
</section>
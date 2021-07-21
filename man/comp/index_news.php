<div class="content title mt-5 mb-5"><span>Tin Tức</span></div>
<section id="blog" class="news container-fluid mt-3 aos-item aos-init aos-animate" data-aos="fade-down">
    <div class="content row">
        <div class="col-md-7 position-relative mb-1">
            <div>
                <img src="<?php echo NEWS_PATH.$lst_news[0]['img'].'?'.rand();?>" alt="" class="w-100">
            </div>
            <div class="position-absolute">
                <h3><a
                        href="news.php?id=<?php echo $lst_news[0]['id'];?>"><?php echo substr($lst_news[0]['tit'],0,getPosition($lst_news[0]['tit'],getPosition($lst_news[0]['tit'],100))).(strlen($lst_news[0]['tit'])>100?'...':'');?></a>
                </h3>
                <p class="mt-1">
                    <?php echo substr($lst_news[0]['des'],0,getPosition($lst_news[0]['des'],150)).(strlen($lst_news[0]['des'])>150?'...':'');?>
                </p>
            </div>
        </div>
        <div class="col-md-5 mb-1" style="line-height:1.2">
            <div class="container-fluid h-100">
                <div class="lstSubNews row align-content-between align-items-stretch h-100">
                    <div class="col-md-4"><img src="<?php echo NEWS_PATH.$lst_news[1]['img'].'?'.rand();?>" alt=""
                            class="w-100"></div>
                    <div class="col-md-8">
                        <p><a class="font-weight-bolder"
                                href="news.php?id=<?php echo $lst_news[1]['id'];?>"><?php echo substr($lst_news[1]['tit'],0,getPosition($lst_news[1]['tit'],100)).(strlen($lst_news[1]['tit'])>100?'...':'');?></a>
                        </p>
                        <p class="sub-title">
                            <?php echo substr($lst_news[1]['des'],0,getPosition($lst_news[1]['des'],150)).(strlen($lst_news[1]['des'])>150?'...':'');?>
                        </p>
                    </div>
                    <div class="col-12" style="height:5px"></div>
                    <div class="col-md-4"><img src="<?php echo NEWS_PATH.$lst_news[2]['img'].'?'.rand();?>" alt=""
                            class="img-fluid"></div>
                    <div class="col-md-8">
                        <p><a class="font-weight-bolder"
                                href="news.php?id=<?php echo $lst_news[2]['id'];?>"><?php echo substr($lst_news[2]['tit'],0,getPosition($lst_news[2]['tit'],100)).(strlen($lst_news[2]['tit'])>100?'...':'');?></a>
                        </p>
                        <p class="sub-title">
                            <?php echo substr($lst_news[2]['des'],0,getPosition($lst_news[2]['des'],150)).(strlen($lst_news[2]['des'])>150?'...':'');?>
                        </p>
                    </div>
                    <div class="col-12" style="height:5px"></div>
                    <div class="col-md-4"><img src="<?php echo NEWS_PATH.$lst_news[3]['img'].'?'.rand();?>" alt=""
                            class="w-100"></div>
                    <div class="col-md-8">
                        <p><a class="font-weight-bolder"
                                href="news.php?id=<?php echo $lst_news[3]['id'];?>"><?php echo substr($lst_news[3]['tit'],0,getPosition($lst_news[3]['tit'],100)).(strlen($lst_news[3]['tit'])>100?'...':'');?></a>
                        </p>
                        <p class="sub-title">
                            <?php echo substr($lst_news[3]['des'],0,getPosition($lst_news[3]['des'],150)).(strlen($lst_news[3]['des'])>150?'...':'');?>
                        </p>
                    </div>
                    <div class="col-12" style="height:5px"></div>
                    <div class="col-md-4"><img src="<?php echo NEWS_PATH.$lst_news[4]['img'].'?'.rand();?>" alt=""
                            class="img-fluid"></div>
                    <div class="col-md-8">
                        <p><a class="font-weight-bolder"
                                href="news.php?id=<?php echo $lst_news[4]['id'];?>"><?php echo substr($lst_news[4]['tit'],0,getPosition($lst_news[4]['tit'],100)).(strlen($lst_news[4]['tit'])>100?'...':'');?></a>
                        </p>
                        <p class="sub-title">
                            <?php echo substr($lst_news[4]['des'],0,getPosition($lst_news[4]['des'],150)).(strlen($lst_news[4]['des'])>150?'...':'');?>
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
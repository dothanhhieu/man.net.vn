<?php
    $lst_officer=DP::run_query('SELECT `id`, `name`, `rank`, `img`, `pos`, `phone`, `email`, `lang`, `status` FROM `setting_officer` WHERE `status`=1 order by `rank`',[],2);
?>
<ul>
    <?php foreach($lst_officer as $officer){ ?>
    <li class="container-fluid">
        <div class="row">
            <div class="col-12">
                <p class="name"><?php echo $officer['name'];?></p>
                <p class="pos"><?php echo $officer['pos'];?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-2">Phone: </div>
            <div class="col-10"><a href="tel:<?php echo $officer['phone'];?>"><?php echo $officer['phone'];?></a></div>
        </div>
        <div class="row">
            <div class="col-2">Zalo: </div>
            <div class="col-10"><a href="tel:<?php echo $officer['phone'];?>"><?php echo $officer['phone'];?></a></div>
        </div>
        <div class="row">
            <div class="col-2">Email: </div>
            <div class="col-10"><a href="mailto:<?php echo $officer['email'];?>"><?php echo $officer['email'];?></a></div>
        </div>
    </li>
    <?php
    }
    ?>
</ul>
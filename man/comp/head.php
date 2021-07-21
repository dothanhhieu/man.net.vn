<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

        $_SESSION['token_guest']=base64_encode(rand());    

    require_once('lib/db.php');
    require_once('config.php');
    $info = DP::run_query('SELECT `id`, `company`, `logo`, `logofooter`, `fb_page`, `email`, `tit`, `intro`, `address`, `phone1`, `phone2`, `phone3`, `map_iframe` FROM `setting_info`',[],2);
    $info=$info[0];
    $lst_ser_1=DP::run_query('SELECT `id`, `tit`, `des`, `content`, `status`, `create_mem`, `create_time`, `edit_time`, `edit_mem`, `parent_id`, `rank` FROM `services` where `status`=1 and `parent_id`=0 order by `rank`',[],2);
    $num_ser_1=ceil(count($lst_ser_1)/2);
?>
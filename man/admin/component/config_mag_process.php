<?php
	if(isset($_POST['btn_update']))
	{
		DP::run_query('UPDATE `setting_info` SET `company`=?,`fb_page`=?,`email`=?,`tit`=?,`intro`=?,`address`=?,`phone1`=?,`phone2`=?,`phone3`=?,`map_iframe`=? WHERE `id` = 1',[$_POST['company'],$_POST['fb_page'],$_POST['email'],$_POST['tit'],$_POST['intro'],$_POST['address'],$_POST['phone1'],$_POST['phone2'],$_POST['phone3'],$_POST['map_iframe']],1);
		echo '<script>alert(\'Cập nhật thành công\');</script>';
	}
?>
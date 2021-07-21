<?php
if(isset($_POST['btn_add']))
{
	$r=DP::run_query('SELECT `username`, `pass`, `name`, `role`, `status` FROM `member` WHERE `username` like ?',[$_POST['txt_us']],2);
	if(count($r)==0)
	{
		DP::run_query('INSERT INTO `member`(`username`, `name`, `pass`, `role`, `status`) VALUES (?,?,?,?,?)',[$_POST['txt_us'],$_POST['txt_name'],md5('123456'),$_POST['ddl_rule'], $_POST['ddl_tt']],1);
	}
	else
	{
		echo '<script>alert(\'Tài khoản này đã tồn tại!\');</script>';
	}
}
?>
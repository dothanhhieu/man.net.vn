<?php
if(isset($_POST['btn_login']) && $_POST['token']==$_SESSION['token'])
{
	// if($_POST['txt_us']=='admin' && $_POST['txt_pas']='admin')
	// {
	// 	$_SESSION['us']=$_POST['txt_us'];
	// 	$_SESSION['ht']='admin';
	// 	$_SESSION['rule']=0;
	// }
	// else
	{
		$r = DP::run_query('select * from `member` where `username`=? and `pass`=? and `status`=1',[$_POST['txt_us'],md5($_POST['txt_pas'])],2);
		if(count($r)==1)
		{
			$_SESSION['us']=$_POST['txt_us'];
			$_SESSION['ht']=$r[0]['name'];
			$_SESSION['rule']=$r[0]['role'];
		}
	}
	
}
?>
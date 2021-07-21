<?php
	$lst_rule=[0,1,2];
	$check_login=true;
	require_once('../lib/db.php');
	$process='component/service_process.php';
	// if(isset($_GET['id']))
	// {
	// 	$news=DP::run_query('SELECT `id`, `tit`, `img`, `des`, `content`, `create_time`, `create_mem`, `edit_time`, `edit_mem`, `status`, `rank` FROM `news` WHERE `id`=?',[$_GET['id']],2);
	// 	if(count($news)==0)
	// 	{
	// 		header('location:post.php');
	// 	}
	// 	$news=$news[0];
	// }
	$ctp='component/service_ctp.php';
	$title_page='Dịch vụ';
	require_once('layout.php');
?>
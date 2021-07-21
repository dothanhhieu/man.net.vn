<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if(isset($_POST['btn_post']) && $_POST['token']==$_SESSION['token'])
{
	$id=DP::run_query('INSERT INTO `services`(`tit`,  `des`, `content`, `create_time`, `create_mem`, `edit_time`, `edit_mem`, `status`,`parent_id`, `rank`) VALUES (?,?,?,now(),?,now(),?,?,?,?)',[$_POST['tit'],$_POST['des'],$_POST['content'],$_SESSION['us'],$_SESSION['us'],isset($_POST['chkShow']),$_POST['parent_id'],$_POST['rank']],3);
    echo '<script>alert(\'Thêm dịch vụ thành công\');</script>';
}
if(isset($_POST['btn_update_post']) && $_POST['token']==$_SESSION['token'])
{
	$id = $_GET['id'];
	DP::run_query('UPDATE `services` SET `tit`=?,`des`=?,`content`=?,`edit_time`=now(),`edit_mem`=?,`status`=?,`parent_id`=?,`rank`=? WHERE `id`=?',[$_POST['tit'],$_POST['des'],$_POST['content'],$_SESSION['us'],isset($_POST['chkShow']),$_POST['parent_id'],$_POST['rank'],$id],1);	
	echo '<script>alert(\'Cập nhật dịch vụ thành công\');</script>';
}
$lst_ser;
if(isset($_GET['id']))
{
	$lst_ser=DP::run_query('SELECT `id`, `tit` FROM `services` where `id`<>?',[$_GET['id']],2);
	$news=DP::run_query('SELECT `id`, `tit`, `des`, `content`, `create_time`, `create_mem`, `edit_time`, `edit_mem`, `status`,`parent_id`, `rank` FROM `services` WHERE `id`=?',[$_GET['id']],2);
	if(count($news)==0)
	{
		header('location:service.php');
	}
	$news=$news[0];
}
else
{
$lst_ser=DP::run_query('SELECT `id`, `tit`, `des`, `content`, `status`, `create_mem`, `create_time`, `edit_time`, `edit_mem`, `parent_id`, `rank` FROM `services`',[],2);
}
?>
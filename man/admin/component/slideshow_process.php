<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
//require_once('../lib/db.php');
if(isset($_POST['btn_post']) && $_POST['token']==$_SESSION['token'])
{
	$id=DP::run_query('INSERT INTO `slideshow`(`tit`, `link`, `status`, `rank`, `create_time`, `create_mem`, `edit_time`, `edit_mem`) VALUES (?,?,?,?,now(),?,now(),?)',[$_POST['tit'],$_POST['link'],isset($_POST['chkShow']),$_POST['rank'],$_SESSION['us'],$_SESSION['us']],3);
	$target_file=$id.'.'.strtolower(pathinfo(basename($_FILES["fulimg_avatar"]["name"]),PATHINFO_EXTENSION));
	if(move_uploaded_file($_FILES["fulimg_avatar"]["tmp_name"],'../'.SLIDER_PATH.$target_file))
	{
		DP::run_query('update `slideshow` set `img`=? where `id`=?',[$target_file,$id],1);	
	}	
    echo '<script>alert(\'Thêm slider thành công-'.$r.'\');</script>';
}
if(isset($_POST['btn_update_post']) && $_POST['token']==$_SESSION['token'])
{
	$id = $_GET['id'];
	DP::run_query('UPDATE `slideshow` SET `tit`=?,`link`=?,`edit_time`=now(),`edit_mem`=?,`status`=?,`rank`=? WHERE `id`=?',[$_POST['tit'],$_POST['link'],$_SESSION['us'],isset($_POST['chkShow']),$_POST['rank'],$id],1);
	if(isset($_FILES["fulimg_avatar"])&&$_FILES["fulimg_avatar"]["name"]!="")
	{
		if($_POST['hdf_img']!='')
		{
			unlink('../'.SLIDER_PATH.$_POST['hdf_img']);
		}
		$target_file=$id.'.'.strtolower(pathinfo(basename($_FILES["fulimg_avatar"]["name"]),PATHINFO_EXTENSION));
		if(move_uploaded_file($_FILES["fulimg_avatar"]["tmp_name"],'../'.SLIDER_PATH.$target_file))
		{
			DP::run_query('update `slideshow` set `img`=? where `id`=?',[$target_file,$id],1);
		}		
	}
	echo '<script>alert(\'Cập nhật tin tức thành công\');</script>';
}
if(isset($_GET['id']))
	{
		$news=DP::run_query('SELECT `id`, `tit`, `link`, `des`, `img`, `status`, `rank`, `create_time`, `create_mem`, `edit_time`, `edit_mem` FROM `slideshow` WHERE `id`=?',[$_GET['id']],2);
		if(count($news)==0)
		{
			header('location:slideshow.php');
		}
		$news=$news[0];
	}
?>
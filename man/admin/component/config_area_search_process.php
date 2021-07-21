<?php
if(isset($_POST['btn_add']))
{
	DP::run_query('INSERT INTO `config_dientich`(`min`, `max`, `ten`, `thutu`, `tt`) VALUES (?,?,?,?,?)',[$_POST['txt_min'],$_POST['txt_max'],$_POST['txt_des'],$_POST['txt_order'],$_POST['ddl_tt']],1);
	echo '<script>alert(\'Thêm tiêu chí thành công!\');</script>';
}
if(isset($_POST['btn_update']))
{
	DP::run_query('UPDATE `config_dientich` SET `min`=?,`max`=?,`ten`=?,`thutu`=?,`tt`=? WHERE `id`=?',[$_POST['txt_min'],$_POST['txt_max'],$_POST['txt_des'],$_POST['txt_order'],$_POST['ddl_tt'],$_GET['id']],1);
	echo '<script>alert(\'Cập nhật tiêu chí thành công!\');</script>';
}
?>
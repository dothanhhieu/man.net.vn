<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if($_POST['token']!=$_SESSION['token'])
{
	echo "Yêu cầu không hợp lệ";
}
require_once('../../lib/db.php');
DP::run_query('update `cus_contact` set `status`=?,`mem`=? where `id`=?',[$_POST['tt'],$_SESSION['us'],$_POST['con']],1);
echo json_encode(['tt'=>$_POST['tt'],'id'=>$_POST['con']]);
?>
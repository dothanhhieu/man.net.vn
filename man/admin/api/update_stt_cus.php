<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if($_POST['token']!=$_SESSION['token'])
{
	echo "Yêu cầu không hợp lệ";
}
require_once('../../lib/db.php');
DP::run_query('update `customer` set `status`=? where `id`=?',[$_POST['tt'],$_POST['cus']],1);
echo json_encode(['tt'=>$_POST['tt'],'id'=>$_POST['cus']]);
?>
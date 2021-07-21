<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if($_POST['token']!=$_SESSION['token'])
{
	echo "Yêu cầu không hợp lệ";
}
require_once('../../lib/db.php');
DP::run_query('update `collaborator` set `check_date`=now(),`check_mem`=? where `id`=?',[$_SESSION['us'],$_POST['con']],1);
echo json_encode(['tt'=>'1','id'=>$_POST['con']]);
?>
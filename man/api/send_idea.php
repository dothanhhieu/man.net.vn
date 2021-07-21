<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if($_POST['token']!=$_SESSION['token_guest'])
{
    echo '0';
    die();
}
require_once('../lib/db.php');
$r= (int)DP::run_query("INSERT INTO `cus_contact`(`email`, `name`, `phone`, `tit`, `detail`, `status`) VALUES (?,?,?,?,?,?)",[$_POST['email'],$_POST['name'],$_POST['phone'],$_POST['tit'],$_POST['detail'],0],1);
if($r==1)
{
    require_once('../lib/mail/send_mail.php');
    sendMail("man@man.net.vn",'[Đóng góp ý kiến]',$_POST['email'].' đóng góp ý kiến lúc '.date("Y-m-d H:i:s"),$_POST['email'].' đóng góp ý kiến lúc '.date("Y-m-d H:i:s"));
}
echo $r;
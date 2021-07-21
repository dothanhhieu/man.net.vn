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
$r= (int)DP::run_query("INSERT INTO `collaborator`(`name`, `phone`, `note`, `post_date`) VALUES (?,?,?,now())",[$_POST['name'],$_POST['phone'],$_POST['note']],1);
if($r==1)
{
    require_once('../lib/mail/send_mail.php');
    sendMail("man@man.net.vn",'[Đăng ký cộng tác viên]',$_POST['name'].' đăng ký cộng tác viên '.date("Y-m-d H:i:s"),$_POST['name'].' đăng ký cộng tác viên lúc '.date("Y-m-d H:i:s"));
}
echo $r;
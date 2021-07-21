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
$r = (int)DP::run_query("INSERT INTO `reg_mail`(`email`, `reg_date`) VALUES (?,now())",[$_POST['email_us']],1);
if($r==1)
{
    require_once('../lib/mail/send_mail.php');
    sendMail("man@man.net.vn",'[Đăng ký nhận tin]',$_POST['email_us'].' đăng ký nhận tin lúc '.date("Y-m-d H:i:s"),$_POST['email_us'].' đăng ký nhận tin lúc '.date("Y-m-d H:i:s"));
}
echo $r;
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_POST['client']))
{
    if($_POST['token']!=$_SESSION['token'])
    {
        echo "Yêu cầu không hợp lệ";
        die();
    }
}
else
{
    if($_POST['token']!=$_SESSION['token_cus'])
    {
        echo $_POST['token'];
        die();
    }
}
require_once('../../lib/db.php');
$query='SELECT `id`, `name`, `des`, `rank`, `logo`, `link`, `status` FROM `customer`';
$page = (isset($_POST['page'])==true?$_POST['page']:0);
$num_per_page=$_POST['num_per_page'];
$paras=[];
if(isset($_POST['key'])&&$_POST['key']!='')
{
    $query.=' where `name` like concat(\'%\',?,\'%\')';
    $paras[]=$_POST['key'];
}
if(isset($_POST['id'])!='')
{
    $query.=' where `id` = ?';
    $paras[]=$_POST['id'];
}
$lst_feature = DP::run_query($query,$paras,2);
$sum = count($lst_feature);
$num = ceil($sum/$num_per_page);
$query.=' limit '.(($page-1)*$num_per_page).','.$num_per_page;
$lst_feature = DP::run_query($query,$paras,2);
$lst_feature[]=["sum"=>$sum];
$lst_feature[]=["num_page"=>$num];
echo json_encode($lst_feature);
die();
?>
<?php
if(isset($_POST['btn_add']))
{
    if($_POST['token']==$_SESSION['token'])
    {
        $paras = [$_POST['name'],$_POST['des'],$_POST['rank'],$_POST['link'],$_POST['ddl_tt']];
        $id = DP::run_query('INSERT INTO `customer`( `name`, `des`, `rank`, `link`, `status`) VALUES (?,?,?,?,?)',$paras,3);
        $target_file=$id.'.'.strtolower(pathinfo(basename($_FILES["fulimg_logo"]["name"]),PATHINFO_EXTENSION));
        if(move_uploaded_file($_FILES["fulimg_logo"]["tmp_name"],'../'.LOGOCUS_PATH.$target_file))
        {
            DP::run_query('update `customer` set `logo`=? where `id`=?',[$target_file,$id],1);
        }
    }
}
if(isset($_POST['btn_update']))
{
    if($_POST['token']==$_SESSION['token'])
    {
        $paras = [$_POST['name'],$_POST['des'],$_POST['rank'],$_POST['link'],$_POST['ddl_tt'],$_POST['hdf_id']];
        $id = DP::run_query('update `customer` set `name`=?, `des`=?, `rank`=?, `link`=?, `status`=? where `id`=?',$paras,3);
        if(isset($_FILES["fulimg_logo"]))
        {
            if($_POST['hdf_img']!='')
            {
                unlink('../img/logocus/'.$_POST['hdf_img']);
            }
            $target_file=$id.'.'.strtolower(pathinfo(basename($_FILES["fulimg_logo"]["name"]),PATHINFO_EXTENSION));
            DP::run_query('update `customer` set `logo`=? where `id`=?',[$target_file,$_POST['hdf_id']],1);
            move_uploaded_file($_FILES["fulimg_logo"]["tmp_name"],'../'.LOGOCUS_PATH.$target_file);
        }
        
    }
}
?>
<?php
if(isset($_POST['btn_add']))
{
    if($_POST['token']==$_SESSION['token'])
    {
        $paras = [$_POST['name'],$_POST['rank'],$_POST['pos'],$_POST['phone'],$_POST['email'],$_POST['lang'],$_POST['ddl_tt']];
        $id = DP::run_query('INSERT INTO `setting_officer`(`name`, `rank`, `pos`, `phone`, `email`, `lang`, `status`) VALUES (?,?,?,?,?,?,?)',$paras,3);
        $target_file=$id.'.'.strtolower(pathinfo(basename($_FILES["fulimg_logo"]["name"]),PATHINFO_EXTENSION));
            
        if(move_uploaded_file($_FILES["fulimg_logo"]["tmp_name"],'../'.OFFICER_PATH.$target_file))
        {
            DP::run_query('update `setting_officer` set `img`=? where `id`=?',[$target_file,$id],1);
        }
        echo '<script>alert(\'Đã thêm tư vấn viên!\');</script>';
    }
}
if(isset($_POST['btn_update']))
{
    if($_POST['token']==$_SESSION['token'])
    {
        $paras = [$_POST['name'],$_POST['rank'],$_POST['pos'],$_POST['phone'],$_POST['email'],$_POST['lang'],$_POST['ddl_tt'],$_POST['hdf_id']];
        $id = DP::run_query('update `setting_officer` set `name`=?,`rank`=?,`pos`=?,`phone`=?,`email`=?,`lang`=?,`status`=? where `id`=?',$paras,3);
        if(isset($_FILES["fulimg_logo"]))
        {
            if($_POST['hdf_img']!='')
            {
                unlink('../'.OFFICER_PATH.$_POST['hdf_img']);
            }
            $target_file=$_POST['hdf_id'].'.'.strtolower(pathinfo(basename($_FILES["fulimg_logo"]["name"]),PATHINFO_EXTENSION));            
            if(move_uploaded_file($_FILES["fulimg_logo"]["tmp_name"],'../'.OFFICER_PATH.$target_file))
            {
                DP::run_query('update `setting_officer` set `img`=? where `id`=?',[$target_file,$_POST['hdf_id']],1);
            }
        }
        echo '<script>alert(\'Cập nhật tư vấn viên thành công!\');</script>';
    }
}
?>
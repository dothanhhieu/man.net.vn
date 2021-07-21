<?php
  if(isset($_POST['btn_update']))
  {
    $paras=[$_POST['txt_name'],$_SESSION['us']];
    if(!empty($_POST['txt_pass']))
    {
      array_splice( $paras, 1, 0, md5($_POST['txt_pass']));
    }
    DP::run_query('update `member` set `name`=?'.(empty($_POST['txt_pass'])?'':',`pass`=?').' where `username`=?',$paras,1);
    echo '<script>alert(\'Cập nhật thông tin thành công!\');</script>';
  }
?>
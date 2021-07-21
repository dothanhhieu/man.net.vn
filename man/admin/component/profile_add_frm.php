<?php
  $user=DP::run_query('SELECT `username`, `pass`, `name`, `role`, `status` FROM `member` where `username`=?',[$_SESSION['us']],2)[0];
?>
<form action="" method="post" enctype="multipart/form-data">
  <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
  <div class="form-group col-md-6">
      <label for="txt_title">Tên đăng nhập</label>
      <span class="form-control"><?php echo $_SESSION['us'];?></span>
  </div>
  <div class="form-group col-md-6">
     <label for="txt_name">Tên hiển thị</label>
    <input type="text" placeholder="Nhập liên kết" class="form-control" id="txt_name" name="txt_name" <?php echo 'value="'.$user['username'].'"';?>>
  </div>
  <div class="col-md-6" style="margin-bottom:10px">
      <label for="txt_pass">Mật khẩu</label>
      <input type="password" minlength ="5" maxlength="30" placeholder="Nhập mật khẩu" class="form-control" id="txt_pass" name="txt_pass">
  </div>
  <div class="col-md-6" style="margin-bottom:10px">
      <label for="txt_repass">Nhập lại mật khẩu</label>
      <input type="password" minlength ="5" maxlength="30" placeholder="Nhập lại mật khẩu" class="form-control" id="txt_repass" name="txt_repass">
  </div>
  <div class="col-md-8" style="padding-top: 10px;">
      <button type="submit" name="btn_update" class="btn" style="color:#fff;background-color: #152036;border:solid 1px #fff;"><i class="fa fa-save"></i>&nbsp;Cập nhật</button>
  </div>
  
</form>
<script>
  function readURL(input, img_id) {

     if (input.files && input.files[0]) {
       var reader = new FileReader();

       reader.onload = function(e) {
         $('#'+img_id).attr('src', e.target.result);
     }

     reader.readAsDataURL(input.files[0]);
 }
}
$("[id=ful_icon]").change(function() {
  var idx=$(this).attr('id').substring($(this).attr('id').length-1, $(this).attr('id').length);
  // if (!$('#img-'+idx).length)
  // {
  //  var simg = '<div id="img-'+idx+'" class="col-lg-3 col-md-6"><h6>Hình '+idx+'</h6><img id="img'+idx+'" class="img-fluid img-thumbnail" src="" alt=""></div>';
  //  $(this).parent().parent().before(simg);
  // }
  readURL(this, 'img-ico');
});
</script>
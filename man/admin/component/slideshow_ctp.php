<script src="../vendor/ckeditor/js/ckeditor.js"></script>
<script src="../vendor/ckeditor/js/sample.js"></script>
<link rel="stylesheet" href="../vendor/ckeditor/css/samples.css">
<link rel="stylesheet" href="../vendor/ckeditor/toolbarconfigurator/lib/codemirror/neo.css">
<div class="container-fluid product-status-wrap">
		<form id="frmPost" action="" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>">
		<div class="row">			
			<div class="col-md-9" style="padding-top: 10px;">
				Tiêu đề
				<input type="text" required class="form-control" name="tit" id="tit" value="<?php echo (isset($_GET['id'])?$news['tit']:'');?>">
			</div>
			<div class="col-md-3" style="padding-top: 10px;">
				Thứ tự
				<input type="number" required class="form-control" name="rank" id="rank" value="<?php echo (isset($_GET['id'])?$news['rank']:'0');?>">
			</div>
			</div>
			<div class="row">
			<div class="col-md-12" style="padding-top: 10px;">
				Liên kết
				<input type="text" class="form-control" name="link" id="link" value="<?php echo (isset($_GET['id'])?$news['link']:'');?>">
			</div>
			</div>
			<div class="custom-file col-lg-12">
                    <input <?php if(isset($_GET['id'])) echo ''; else echo 'required';?> img-target="img_ico" id="fulimg_avatar" name="fulimg_avatar" type="file" accept="image/*" class="custom-file-input"
                        <?php if(isset($_GET['id'])==false) echo 'required';?>>
                    <label class="custom-file-label" for="fulimg_avatar"
                        style="color:#fff;background-color: #1b2a47;border:none;margin-right:5px;font-weight:300;"><i
                            class="fa fa-upload"></i>&nbsp;Chọn ảnh</label>
                    <img id="img_ico" style="max-height:200px;width:auto;"
                        src="../<?php if(isset($_GET['id'])) echo SLIDER_PATH.$news['img'].'?'.rand(); else echo 'img/noimage.jpg';?>"
                        alt="">
					<input type="hidden" name="hdf_img" value="<?php if(isset($_GET['id'])) echo $news['img']; else echo '';?>">
                </div> 
			<div class="row">		
			<div class="col-md-12" style="padding-top:10px;">
				<input type="checkbox" <?php
					if(isset($_GET['id']))
					{
						echo ($news['status']==1?'checked':'');
					}
				?> value="1" name="chkShow"> Hiện (duyệt)
				</div>
				<div class="col-md-12" style="padding-top:10px;">
				<button class="btn" name="<?php echo (isset($_GET['id'])?'btn_update_post':'btn_post');?>" style="color:#fff;background-color: #152036;border:solid 1px #fff;"><i class="fa fa-edit"></i>&nbsp;<?php echo (isset($_GET['id'])?'Cập nhật':'Đăng bài');?></button>
			</div>
		</div>
		</form>
	</div>


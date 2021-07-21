<div class="container-fluid product-status-wrap">
		<form id="frmPost" action="" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>">
		<div class="row">			
			<div class="col-md-8" style="padding-top: 10px;">
				Tiêu đề bài viết
				<input type="text" required class="form-control" name="tit" id="tit" value="<?php echo (isset($_GET['id'])?$news['tit']:'');?>">
			</div>
			<div class="col-md-4" style="padding-top: 10px;">
				Thứ tự
				<input type="number" required class="form-control" name="rank" id="rank" value="<?php echo (isset($_GET['id'])?$news['rank']:'0');?>">
			</div>
			</div>
			<div class="row">
			<div class="col-md-8" style="padding-top: 10px;">
				Tóm tắt<br>
				<textarea class="form-control" rows="4" style="width:100%" id="des" name="des"><?php echo (isset($_GET['id'])?$news['des']:'');?></textarea>
			</div>
			<div class="col-md-4" style="padding-top: 10px;">
                Danh mục
                <select class="form-control" id="catid" name="catid">
                    <option value="0">Chọn danh mục</option>
					<?php
					foreach($lst_cat as $cat)
					{
						?>
					<option <?php if(isset($_GET['id']) && $news['catid']==$cat['id']) echo 'selected';?> value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
						<?php
					}
					?>
                </select>
            </div>
			</div>
			<div class="custom-file col-lg-12">
                    <input <?php if(isset($_GET['id'])) echo ''; else echo 'required';?> img-target="img_ico" id="fulimg_avatar" name="fulimg_avatar" type="file" accept="image/*" class="custom-file-input"
                        <?php if(isset($_GET['id'])==false) echo 'required';?>>
                    <label class="custom-file-label" for="fulimg_avatar"
                        style="color:#fff;background-color: #1b2a47;border:none;margin-right:5px;"><i
                            class="fa fa-upload"></i>&nbsp;Ảnh đại diện</label>
                    <img id="img_ico" style="max-height:200px;width:auto;"
                        src="../<?php if(isset($_GET['id'])) echo NEWS_PATH.$news['img'].'?'.rand(); else echo 'img/noimage.jpg';?>"
                        alt="">
					<input type="hidden" name="hdf_img" value="<?php if(isset($_GET['id'])) echo $news['img']; else echo '';?>">
                </div> 
			<div class="row">
			<h5 class="col-md-12" style="padding-top:10px;"><i class="fa fa-file-text pr-2"></i>&nbsp;Chi tiết</h5>			
			<div class="col-md-12">
				<textarea class="w-100" id="content" name="content" rows="10">
					<?php if(isset($_GET['id'])) echo $news['content'];?>
				</textarea> 
				
			</div>
			<div class="col-md-12" style="padding-top:10px;">
				<input type="checkbox" <?php
					if(isset($_GET['id']))
					{
						echo ($news['status']==1?'checked':'');
					}
				?> value="1" name="chkShow"> Hiện (duyệt)
				<button class="btn" name="<?php echo (isset($_GET['id'])?'btn_update_post':'btn_post');?>" style="color:#fff;background-color: #152036;border:solid 1px #fff;"><i class="fa fa-edit"></i>&nbsp;<?php echo (isset($_GET['id'])?'Cập nhật':'Đăng bài');?></button>
			</div>
		</div>
		</form>
	</div>
	<script src="ckeditor5/ckeditor.js"></script>
	<script>ClassicEditor
			.create( document.querySelector( '#content' ), {
				
				toolbar: {
					items: [
						'fontFamily',
						'fontSize',
						'fontColor',
						'fontBackgroundColor',
						'heading',
						'|',
						'alignment',
						'bold',
						'italic',
						'bulletedList',
						'numberedList',
						'|',
						'imageUpload',
						'mediaEmbed',
						'insertTable',
						'|',
						'indent',
						'outdent',
						'link',
						'blockQuote',
						'undo',
						'redo',
						'highlight',
						'specialCharacters',
						'subscript',
						'superscript',
						'underline'
					]
				},
				language: 'vi',
				licenseKey: '',
				
				
				
			} )
			.then( editor => {
				window.editor = editor;
		
				
				
				
			} )
			.catch( error => {
				console.error( 'Oops, something went wrong!' );
				console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
				console.warn( 'Build id: l9gb2f1m2hrl-amz57ugcm3e7' );
				console.error( error );
			} );
	</script>

<?php
	$info = DP::run_query('SELECT `id`, `company`, `logo`, `logofooter`, `fb_page`, `email`, `tit`, `intro`, `address`, `phone1`, `phone2`, `phone3`, `map_iframe` FROM `setting_info`',[],2)[0];
?>
<!-- <script src="../vendor/ckeditor/js/ckeditor.js"></script>
<script src="../vendor/ckeditor/js/sample.js"></script> -->
<link rel="stylesheet" href="../vendor/ckeditor/css/samples.css">
<link rel="stylesheet" href="../vendor/ckeditor/toolbarconfigurator/lib/codemirror/neo.css">
<div class="product-status-wrap">
	<div class="container-fluid">
		<div class="row">
			<form action="" method="post">
				<input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
				<div class="form-group col-md-6">
					<label for="company">Tên công ty</label>
					<input required type="text" class="form-control" id="company" name="company" <?php echo 'value="'.htmlentities($info['company']).'"'; ?>>
				</div>
				<div class="form-group col-md-6">
					<label for="fb_page">Facebook</label>
					<input required type="text" class="form-control" id="fb_page" name="fb_page" <?php echo 'value="'.htmlentities($info['fb_page']).'"'; ?>>
				</div>
				<div class="form-group col-md-6">
					<label for="email">Email</label>
					<input required type="text" class="form-control" id="email" name="email" <?php echo 'value="'.htmlentities($info['email']).'"'; ?>>
				</div>
				<div class="form-group col-md-6">
					<label for="tit">Tiêu đề</label>
					<input required type="text" class="form-control" id="tit" name="tit" <?php echo 'value="'.htmlentities($info['tit']).'"'; ?>>
				</div>
				<div class="form-group col-md-6">
					<label for="address">Địa chỉ</label>
					<input required type="text" class="form-control" id="address" name="address" <?php echo 'value="'.htmlentities($info['address']).'"'; ?>>
				</div>
				<div class="form-group col-md-6">
					<label for="phone1">Số điện thoại 1</label>
					<input required type="text" class="form-control" id="phone1" name="phone1" <?php echo 'value="'.htmlentities($info['phone1']).'"'; ?>>
				</div>
				<div class="form-group col-md-6">
					<label for="phone2">Số điện thoại 2</label>
					<input required type="text" class="form-control" id="phone2" name="phone2" <?php echo 'value="'.htmlentities($info['phone2']).'"'; ?>>
				</div>
				<div class="form-group col-md-6">
					<label for="phone3">Số điện thoại 3</label>
					<input required type="text" class="form-control" id="phone3" name="phone3" <?php echo 'value="'.htmlentities($info['phone3']).'"'; ?>>
				</div>
				<div class="col-md-12">
				<label for="address">Giới thiệu</label><br>
				<textarea class="w-100" id="intro" name="intro">
					<?php echo $info['intro'];?>
				</textarea> 
			</div>
			<div class="custom-file col-lg-6">
                    <input img-target="img_header" id="fulimg_header" name="fulimg_header" type="file" accept="image/*" class="custom-file-input">
                    <label class="custom-file-label" for="fulimg_header"
                        style="color:#fff;background-color: #1b2a47;border:none;margin-right:5px;"><i
                            class="fa fa-upload"></i>&nbsp;Logo header</label>
                    <img id="img_header" style="max-height:200px;width:auto;"
                        src="../<?php echo IMG.$info['logo'].'?'.rand();?>"
                        alt="">
					<input type="hidden" name="hdf_imglogo" value="<?php echo $info['logo'];?>">
                </div> 
				<div class="custom-file col-lg-6">
                    <input img-target="img_footer" id="fulimg_footer" name="fulimg_footer" type="file" accept="image/*" class="custom-file-input">
                    <label class="custom-file-label" for="fulimg_footer"
                        style="color:#fff;background-color: #1b2a47;border:none;margin-right:5px;"><i
                            class="fa fa-upload"></i>&nbsp;Logo footer</label>
                    <img id="img_footer" style="max-height:200px;width:auto;"
                        src="../<?php echo IMG.$info['logofooter'].'?'.rand();?>"
                        alt="">
					<input type="hidden" name="hdf_imglogo" value="<?php echo $info['logofooter'];?>">
                </div> 
				<div class="form-group col-md-12">
					<label for="map_iframe">Map</label>
					<textarea name="map_iframe" class="form-control" rows="5" style="width:100%"><?php echo htmlentities($info['map_iframe']);?></textarea>
				</div>
				<div class="col-md-12" style="margin-bottom:10px;">
					<button type="submit" name="btn_update" class="btn" style="color:#fff;background-color: #152036;border:solid 1px #fff;"><i class="fa fa-save"></i>&nbsp;Cập nhật thông tin</button>
				</div>
				<div class="col-md-12">
					<iframe width="100%" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo $info['diachi'];?>&output=embed"></iframe>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="ckeditor5/ckeditor.js"></script>
<script>ClassicEditor
			.create( document.querySelector( '#intro' ), {
				
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
<div class="container-fluid product-status-wrap">
    <form id="frmPost" action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'];?>">
        <div class="row">
            <div class="col-md-12" style="padding-top: 10px;">
                Tên dịch vụ
                <input type="text" required class="form-control" name="tit" id="tit"
                    value="<?php echo (isset($_GET['id'])?$news['tit']:'');?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" style="padding-top: 10px;">
                Thứ tự
                <input type="number" required class="form-control" name="rank" id="rank"
                    value="<?php echo (isset($_GET['id'])?$news['rank']:'0');?>">
            </div>
            <div class="col-md-8" style="padding-top: 10px;">
               Dịch vụ cha
                <select class="form-control" id="parent_id" name="parent_id">
                    <option value="0">Không có dịch vụ cha</option>
					<?php
					foreach($lst_ser as $ser)
					{
						?>
					<option <?php if(isset($_GET['id']) && $news['parent_id']==$ser['id']) echo 'selected';?> value="<?php echo $ser['id'];?>"><?php echo $ser['tit'];?></option>
						<?php
					}
					?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="padding-top: 10px;">
                Tóm tắt<br>
                <textarea class="form-control" rows="4" style="width:100%" id="des"
                    name="des"><?php echo (isset($_GET['id'])?$news['des']:'');?></textarea>
            </div>
        </div>
        <div class="row">
            <h5 class="col-md-12" style="padding-top:10px;"><i class="fa fa-file-text pr-2"></i>&nbsp;Chi tiết</h5>
            <div class="col-md-12">
                <textarea class="w-100" id="content" name="content">
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
                <button class="btn" name="<?php echo (isset($_GET['id'])?'btn_update_post':'btn_post');?>"
                    style="color:#fff;background-color: #152036;border:solid 1px #fff;"><i
                        class="fa fa-edit"></i>&nbsp;<?php echo (isset($_GET['id'])?'Cập nhật':'Đăng bài');?></button>
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
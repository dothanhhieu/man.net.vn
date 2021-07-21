<?php
    $lst_customers=DP::run_query('SELECT `id`, `name`, `rank`, `img`, `pos`, `phone`, `email`, `lang`, `status` FROM `setting_officer` order by `id` desc',[],2);
?>
<div class="product-status-wrap">
    <div class="container-fluid">
        <div class="row">
            <form id="frm" action="" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                <input type="hidden" name="hdf_id">
                <input type="hidden" name="hdf_img">
                <div class="form-group col-md-3">
                    <label for="name">Tên tư vấn viên</label>
                    <input required type="text" class="form-control" minlength="3" id="name" name="name">
                </div>
                <div class="form-group col-md-3">
                    <label for="pos">Vị trí</label>
                    <input required type="text" class="form-control" id="pos" name="pos">
                </div>
                <div class="form-group col-md-3">
                    <label for="rank">Thứ tự hiển thị</label>
                    <input required type="number" value="0" class="form-control" id="rank" name="rank">
                </div>
                <div class="form-group col-md-3">
                    <label for="ddl_tt">Trạng thái</label>
                    <select class="form-control" id="ddl_tt" name="ddl_tt">
                        <option value="1">Hoạt động</option>
                        <option value="0">Tạm ngưng</option>
                    </select>
                </div>
                               
                <div class="form-group col-md-4">
                    <label for="phone">Số điện thoại</label>
                    <input required type="text" class="form-control" id="phone" name="phone">
                </div>
                <div class="form-group col-md-4">
                    <label for="lang">Ngôn ngữ</label>
                    <input required type="text" class="form-control" id="lang" name="lang">
                </div>
                <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input required type="email" class="form-control" id="email" name="email">
                </div>
                <div class="custom-file col-lg-12">
                    <input img-target="img_ico" id="fulimg_logo" name="fulimg_logo" type="file" accept="image/*" class="custom-file-input"
                        <?php if(isset($_GET['id'])==false) echo 'required';?>>
                    <label class="custom-file-label" for="fulimg_logo"
                        style="color:#fff;background-color: #1b2a47;border:none;margin-right:5px;"><i
                            class="fa fa-upload"></i>&nbsp;Logo</label>
                    <img id="img_ico" style="max-height:200px;width:auto;"
                        src="../<?php if(isset($_GET['id'])) echo NEWS_PATH.$bv[0]['logo'].'?'.rand(); else echo 'img/noimage.jpg';?>"
                        alt="">
                </div> 
                <div class="row">
                <div class="col-md-12">
                    <button name="btn_add" class="btn"
                        style="color:#fff;background-color: #152036;border:solid 1px #fff; margin-top:.5rem"><i
                            class="fa fa-save"></i>&nbsp;<span>Thêm tư vấn viên</span></button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="product-status-wrap" style="margin-top:10px;padding:30px;">
    <div>
        <a class="btn" href="" style="color:#fff;background-color: RGBA(0,0,0,0.1);border:solid 1px #fff"><i
                class="fa fa-plus"></i>&nbsp;Thêm mới</a>
    </div>
    <div class="filter" style="margin-top:10px">
        <form>
            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <input id="txt_key" type="text" class="form-control" placeholder="Từ khóa...">
                    <input type="hidden" id="hdf_key" value="">
                </div>
                <div class="col-md-4 col-lg-3">
                    <button type="button" id="btn_search" class="btn"
                        style="color:#fff;background-color: RGBA(0,0,0,0.1);border:solid 1px #fff"><i
                            class="fa fa-filter"></i>&nbsp;Tìm kiếm</button>
                </div>
            </div>
        </form>
    </div>
    <h5 style="margin-top: 10px">Có <span id="sum"></span> kết quả</h5>
    <table id="tb_cus">
    <thead>
    <tr>
        <th>Id</th>
        <th>Họ tên</th>
        <th>Thứ tự</th>        
        <th>Hình ảnh</th> 
        <th>Ngôn ngữ</th> 
        <th>Email</th>
        <th>Số điện thoại</th> 
        <th>Trạng thái</th>
        <th>Chức năng</th>
    </tr>
    </thead>
        <tbody>
           
        </tbody>
    </table>
    <div class="custom-pagination" id="paging-cus" tb-id="tb_cus" num-per-page='7'>
        <ul class="pagination">
            <li class="page-item"><a name="pre-page" class="page-link" style="cursor: pointer">Trước đó</a></li>
            <li class="page-item active"><span name="cur-page" class="page-link"><span id="page_idx"></span>/<span id="num_page"></span></span></li>
            <li class="page-item"><a name="next-page" class="page-link" style="cursor: pointer">Tiếp theo</a></li>
        </ul>
    </div>
</div>
<!-- <script type="text/javascript" src="custom-js/paging.js"></script>
<script type="text/javascript" src="custom-js/cus_table.js"></script> -->
<script type="text/javascript">
$('#btn_search').click(function() {
    var key=$('#txt_key').val().trim();
    $('#hdf_key').val(key);
    loadListCus(key,1,10,$('#tb_cus>tbody'));
});

$('[name=btn_update_stt]').click(function() {
    $.post("api/update_stt_cus.php", {
            cus: $(this).attr('cus'),
            tt: (($(this).attr('data-original-title') == 'Ẩn đi') ? '0' : '1'),
            token: $('[name=token]').val()
        },
        function(data, status) {
            alert(data);
            var r = JSON.parse(data);
            $('[name="btn_stt"][cus="' + r.id + '"]').attr('class', (r.tt == 1 ? 'pd-setting' :
                'ds-setting'));
            $('[name="btn_stt"][cus="' + r.id + '"]').html((r.tt == 0 ? 'Ẩn' : 'Hoạt động'));
            $('[name="btn_update_stt"][cus="' + r.id + '"] i').attr('class', (r.tt == 1 ? 'fa fa-trash-o' :
                'fa fa-refresh'));
            $('[name="btn_update_stt"][cus="' + r.id + '"]').attr('data-original-title', (r.tt == 1 ?
                'Ẩn đi' : 'Phục hồi'));
        });
});

function getToEdit(ctrl){   
    $.post("api/get_list_officer.php", {
            id: $(this).attr('data-id'),
            page: 1,
            num_per_page:1,
            token: $('[name=token]').val()
        },
        function(data, status) {
            var r = JSON.parse(data);
            $('input[name="name"]').val(r[0].name);
            $('input[name="lang"]').val(r[0].lang);
            $('input[name="rank"]').val(r[0].rank);
            $('input[name="email"]').val(r[0].email);
            $('input[name="pos"]').val(r[0].pos);
            $('#img_ico').attr('src','../img/officer/'+r[0].img);
            $('input[name="phone"]').val(r[0].phone);
            $('input[name="ddl_tt"]').val(r[0].status);
            $('input[name="hdf_id"]').val(r[0].id);
            $('input[name="hdf_img"]').val(r[0].img);
            $('button[name="btn_add"] span').html('Cập nhật');
            $('button[name="btn_add"]').attr('name','btn_update');            
            $('#fulimg_logo').prop('required',false);
            $('html, body').animate({
                scrollTop: $("#frm").offset().top-100
            }, 1000);
        });
};
loadListCus('',1,10,$('#tb_cus>tbody'));
$('#paging-cus a[name="next-page"]').click(function(){
    var idx =parseInt($('#page_idx').html());
    var num =parseInt($('#num_page').html());
    if(idx<num)
    {
        loadListCus($('#hdf_key').val(),idx+1,10,$('#tb_cus>tbody'));
    }
});
$('#paging-cus a[name="pre-page"]').click(function(){
    var idx =parseInt($('#page_idx').html());
    var num =parseInt($('#num_page').html());
    if(idx>1)
    {
        loadListCus($('#hdf_key').val(),idx-1,10,$('#tb_cus>tbody'));
    }
});
function loadListCus(key,page,num_per_page,tbody)
{
    $.post("api/get_list_officer.php", {
            'key': key,
            'page': page,
            'num_per_page':num_per_page,
            'token': $('[name=token]').val()
        },
        function(data, status) {
            //alert(data);
            tbody.html('');
            var r = JSON.parse(data);
            var sHTML='';
            for(var i=0;i<r.length-2;i++)
            {
                sHTML=sHTML+
                '<tr>'+
                    '<td>'+r[i].id+'</td>'+
                    '<td>'+r[i].name+'</td>'+
                    '<td>'+r[i].rank+'</td>'+
                    '<td><img src="../img/officer/'+r[i].img+'"/></td>'+
                    '<td>'+r[i].lang+'</td>'+
                    '<td>'+r[i].email+'</td>'+
                    '<td>'+r[i].phone+'</td>'+
                    '<td><button cus="'+r[i].id+'" name="btn_stt" class="'+ (r[i].status=='1'?'pd-setting':'ds-setting')+'">'+(r[i].status=='1'?'Hoạt động':'Ẩn')+'</button></td>'+
                    '<td><button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit" type="button" data-id="'+r[i].id+'" name="btnEdit" onClick="getToEdit(this);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>';
                if(r[i].status=='1')
                {
                    sHTML=sHTML+
                        '<button name="btn_update_stt" cus="'+r[i].id+'" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Ẩn đi"><i class="fa fa-trash-o" aria-hidden="true"></i></button>';
                }
                else
                {
                    sHTML=sHTML+
                        '<button name="btn_update_stt" cus="'+r[i].id+'" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Phục hồi"><i class="fa fa-refresh" aria-hidden="true"></i></button>';                    
                }
                sHTML=sHTML+'</td></tr>';
            }
            $('#sum').html(r[r.length-2].sum);
            $('#page_idx').html(page);
            $('#num_page').html(r[r.length-1].num_page);
            tbody.html(sHTML);
        });
}
</script>
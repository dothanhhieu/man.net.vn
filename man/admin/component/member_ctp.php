<?php
    $lst_users=DP::run_query('SELECT `username`, `pass`, `name`, `role`, `status` FROM `member` where `username` not like \'admin\'',[],2);
?>
<div class="product-status-wrap">
	<div class="container-fluid">
		<div class="row">
            <form action="" method="POST">
                <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
                <div class="form-group col-md-3">
                    <label for="txt_us">Tên đăng nhập</label>
                    <input required type="text" class="form-control" pattern="[_a-zA-Z][a-zA-Z0-9_]{3,31}" id="txt_us" name="txt_us">
                </div>
                <div class="form-group col-md-3">
                    <label for="txt_name">Họ tên</label>
                    <input required type="text" class="form-control" id="txt_name" name="txt_name">
                </div>
                <div class="form-group col-md-3">
                    <label for="ddl_rule">Phân quyền</label>
                    <select class="form-control" id="ddl_rule" name="ddl_rule">
                       <option value="0">Admin</option>
                       <option value="1">Moderator</option>
                       <option value="2">Editor</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="ddl_tt">Trạng thái</label>
                    <select class="form-control" id="ddl_tt" name="ddl_tt">
                       <option value="1">Hoạt động</option>
                       <option value="0">Tạm ngưng</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <button name="btn_add" class="btn" style="color:#fff;background-color: #152036;border:solid 1px #fff;"><i class="fa fa-save"></i>&nbsp;Thêm tài khoản</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="product-status-wrap" style="margin-top:10px;padding:30px;">
    <div>
        <button class="btn" style="color:#fff;background-color: RGBA(0,0,0,0.1);border:solid 1px #fff"><i class="fa fa-plus"></i>&nbsp;Thêm mới</button>
    </div>                   
    <div class="filter" style="margin-top:10px">
        <form>
            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <input id="txt_key" type="text" class="form-control" placeholder="Tên đăng nhập">
                </div>
                <div class="col-md-4 col-lg-3">
                   <button type="button" id="btn_search" class="btn" style="color:#fff;background-color: RGBA(0,0,0,0.1);border:solid 1px #fff"><i class="fa fa-filter"></i>&nbsp;Tìm kiếm</button>
                </div>
            </div>
        </form>
    </div>
    <h5 style="margin-top: 10px">Kết quả gồm tổng cộng <?php echo count($lst_users);?> thành viên</h5>                        
    <table id="tb_users">
        <tbody>
            <tr>
            <th>Tên đăng nhập</th>
            <th>Họ tên</th>
            <th>Quyền</th>
            <th>Trạng thái</th>
            <th>Chức năng</th>
            </tr>
            <?php
            foreach ($lst_users as $user) {
            ?>
            <tr>
                <td><?php echo $user['username']?></td>
                <td><?php echo $user['name']?></td>
                <td>
                    <?php echo ($user['role']==0?'Admin':($user['role']==1?'Moderator':'Editor'));?>
                </td>
                <td>
                    <button ac="<?php echo $user['username'];?>" name="btn_stt" class="<?php echo ($user['status']=='1'?'pd-setting':'ds-setting');?>"><?php echo ($user['status']=='1'?'Hoạt động':'Ẩn');?></button>
                </td>
                <td>
                    <!-- <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> -->
                    <?php
                    if($user['status']=='1')
                    {
                    ?>
                    <button name="btn_update_stt" ac="<?php echo $user['username'];?>" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Ẩn đi"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    <?php
                    }
                    else
                    {
                    ?>
                    <button name="btn_update_stt" ac="<?php echo $user['username'];?>" data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Phục hồi"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    <?php
                    }
                    ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <div class="custom-pagination" id="paging-users" tb-id="tb_users" num-per-page='7'>
        <ul class="pagination">
            <li class="page-item"><a name="pre-page" class="page-link" style="cursor: pointer">Trước đó</a></li>
            <li class="page-item active"><span name="cur-page" class="page-link">1/3</span></li>
            <li class="page-item"><a name="next-page" class="page-link" style="cursor: pointer">Tiếp theo</a></li>
        </ul>
    </div>
</div>
<script type="text/javascript" src="custom-js/paging.js"></script>
<script type="text/javascript" src="custom-js/cus_table.js"></script>
<script type="text/javascript">
    $('#btn_search').click(function(){
        search_tb('tb_users',1,1,$('#txt_key').val());
    });
    
    $('[name=btn_update_stt]').click(function(){
        $.post("../api/update_stt_account.php",
        {
            account: $(this).attr('ac'),
            tt: (($(this).attr('data-original-title')=='Ẩn đi')?'0':'1'),
            token:$('[name=token]').val()
        },
        function(data, status){
            //alert(data);
            var r=JSON.parse(data);
            $('[name="btn_stt"][ac="'+r.ac+'"]').attr('class',(r.tt==1?'pd-setting':'ds-setting'));
            $('[name="btn_stt"][ac="'+r.ac+'"]').html((r.tt==0?'Ẩn':'Hoạt động'));
            $('[name="btn_update_stt"][ac="'+r.ac+'"] i').attr('class',(r.tt==1?'fa fa-trash-o':'fa fa-refresh'));
             $('[name="btn_update_stt"][ac="'+r.ac+'"]').attr('data-original-title',(r.tt==1?'Ẩn đi':'Phục hồi'));
        });
    });
    paging('#tb_users','#paging-users');
</script>
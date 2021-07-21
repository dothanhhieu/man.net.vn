<?php
$query_string='';

$query ='SELECT `id`, `email`, `reg_date` FROM `reg_mail`';
$paras=[];
if(isset($_GET['txtTitle']))
{
    $query .=' where (`email` like concat(\'%\',?,\'%\'))';
    array_push($paras,$_GET['txtTitle']);
    $query_string=$query_string.($query_string==''?'?':'&').'txtTitle='.$_GET['txtTitle'];
}

if(isset($_GET['sort']))
{
    if($_GET['sort']=='1')
    {
        $query=$query.' order by id desc';
    }
    $query_string=$query_string.($query_string==''?'?':'&').'sort='.$_GET['sort'];
}

$lst_post=DP::run_query($query,$paras,2);
$num_page=0;$begin=-1;$end=-1;
$num_per_page=10;$page_idx=(isset($_GET['page'])?$_GET['page']:1);

Paging::div_Page(count($lst_post),$num_per_page,$page_idx,$num_page, $begin,$end);
//echo '<script>alert(\''.$begin.'-'.$end.'\');</script>';
//$query_string=(isset())
?>
<div class="product-status-wrap">                  
    <div class="filter" style="margin-top:10px">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
        <form method="get">            
            <div class="row">
                <div class="col-md-4" style="padding-top: 5px;">
                    <input name="txtTitle" type="text" class="form-control" placeholder="Từ khóa" <?php echo (isset($_GET['txtTitle'])?'value="'.$_GET['txtTitle'].'"':'');?>>
                </div>
                <div class="col-md-4" style="padding-top: 5px;">
                    <select name="sort" class="custom-select" style="color:#fff;background-color: #152036;border:solid 1px #152036;">
                        <option value="" selected>Sắp xếp</option>
                        <option value="1" <?php echo isset($_GET['ddl_loaibai'])?($_GET['ddl_loaibai']=='1'?'selected':''):'';?>>Mới nhất</option>                        
                    </select>
                </div>
                <div class="col-md-4" style="padding-top: 5px;">
                 <button class="btn" style="color:#fff;background-color: RGBA(0,0,0,0.1);border:solid 1px #fff"><i class="fa fa-filter"></i>Tìm kiếm</button>
                </div>
            </div>
        </form>
    </div>
    <h4 style="margin-top: 10px">Kết quả gồm tổng cộng <?php echo count($lst_post);?> email</h4>
    <?php
    if($num_page>0)
    {
    ?>
    <table id="tb-post">
        <tbody>
            <tr>
                <th><a href="<?php echo ($query_string==''?'?':$query_string.'&');?>sort=<?php echo (!isset($_GET['sort'])? '0':($_GET['sort']==1?'0':'1') );?>">#</a></th>
                <th>Email</th>
                <th>Ngày đăng ký</th>                
            </tr>
            <?php
            foreach ($lst_post as $key=>$post) {
                if($key>=$begin-1 && $key<=$end-1)
                {
            ?>
            <tr>
                <td><?php echo $post['id'];?></td>
                <td><?php echo $post['email'];?></td>
                <td><?php echo $post['reg_date'];?></td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    
    <div class="custom-pagination" id="paging-std" tb-id="tb-post" num-per-page='10'>
        <ul class="pagination">
            <li class="page-item"><a href="<?php echo ($query_string==''?'?':$query_string.'&');?>page=<?php echo ($page_idx==1?$page_idx:($page_idx-1));?>" name="pre-page" class="page-link" style="cursor: pointer">Trước đó</a></li>
            <li class="page-item active"><span name="cur-page" class="page-link"><?php if(!isset($_GET['page'])) echo 1; else echo $_GET['page'];?>/<?php echo $num_page;?></span></li>
            <li class="page-item"><a href="<?php echo ($query_string==''?'?':$query_string.'&');?>page=<?php echo ($page_idx==$num_page?$page_idx:($page_idx+1));?>" name="next-page" class="page-link" style="cursor: pointer">Tiếp theo</a></li>
        </ul>
    </div>
    <?php
    }
    ?>
</div>

<script type="text/javascript">
   function duyetYeuCau(id, stt)
   {
    $.post("api/update_stt_contact.php", {
            'tt':stt,
            'con':id,
            'token': $('[name=token]').val()
        },
        function(data, status) {
            var r=JSON.parse(data);
            
            if(r.tt=='1')
            {
                $('button[conid='+r.id+']').attr('class','pd-setting');
                $('button[conid='+r.id+']').html('Đã duyệt');
                $('button[edit-id='+r.id+']').attr('onclick','duyetYeuCau('+r.id+',0)');
            }           
            else
            {
                $('button[conid='+r.id+']').attr('class','ds-setting');
                $('button[conid='+r.id+']').html('Chưa duyệt');
                $('button[edit-id='+r.id+']').attr('onclick','duyetYeuCau('+r.id+',1)');
            }
        });
   }
</script>
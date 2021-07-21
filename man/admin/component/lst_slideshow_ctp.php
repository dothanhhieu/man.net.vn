<?php
$query_string='';

$query ='SELECT `id`, `tit`, `link`, `des`, `img`, `status`, `rank`, `create_time`, `create_mem`, `edit_time`, `edit_mem` FROM `slideshow`';
$paras=[];
if(isset($_GET['txtTitle']))
{
    $query .=' where (`tit` like concat(\'%\',?,\'%\') or `des` like concat(\'%\',?,\'%\'))';
    array_push($paras,$_GET['txtTitle'],$_GET['txtTitle']);
    $query_string=$query_string.($query_string==''?'?':'&').'txtTitle='.$_GET['txtTitle'];
}

if(isset($_GET['ddl_trangthai']))
{
    if($_GET['ddl_trangthai']!='')
    {
        $query .=' and `slideshow`.`status`=?';
        array_push($paras,$_GET['ddl_trangthai']);
        $query_string=$query_string.($query_string==''?'?':'&').'ddl_trangthai='.$_GET['ddl_trangthai'];
    }
}

if(isset($_GET['sort']))
{
    if($_GET['sort']=='1')
    {
        $query=$query.' order by edit_time desc';
    }
    if($_GET['sort']=='2')
    {
        $query=$query.' order by rank';
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
    <div>
        <button class="btn" style="color:#fff;background-color: RGBA(0,0,0,0.1);border:solid 1px #fff" onclick="window.location.href='post.php'"><i class="fa fa-edit"></i>Đăng bài</button>
    </div>                   
    <div class="filter" style="margin-top:10px">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
        <form method="get">            
            <div class="row">
                <div class="col-md-8" style="padding-top: 5px;">
                    <input name="txtTitle" type="text" class="form-control" placeholder="Từ khóa" <?php echo (isset($_GET['txtTitle'])?'value="'.$_GET['txtTitle'].'"':'');?>>
                </div>
                
                <div class="col-md-4" style="padding-top: 5px;">
                    <select name="ddl_trangthai" class="custom-select" style="color:#fff;background-color: #152036;border:solid 1px #152036;">
                        <option value="" selected>Tất cả trạng thái</option>
                        <option value="0" <?php echo isset($_GET['ddl_trangthai'])?($_GET['ddl_trangthai']=='0'?'selected':''):'';?> >Chưa duyệt</option>
                        <option value="1" <?php echo isset($_GET['ddl_trangthai'])?($_GET['ddl_trangthai']=='1'?'selected':''):'';?> >Đã duyệt</option>
                    </select>
                </div>
                </div>
                <div class="row">
                <div class="col-md-4" style="padding-top: 5px;">
                    <select name="sort" class="custom-select" style="color:#fff;background-color: #152036;border:solid 1px #152036;">
                        <option value="" selected>Sắp xếp</option>
                        <option value="1" <?php echo isset($_GET['ddl_loaibai'])?($_GET['ddl_loaibai']=='1'?'selected':''):'';?>>Mới nhất</option>
                        <option value="2" <?php echo isset($_GET['ddl_loaibai'])?($_GET['ddl_loaibai']=='2'?'selected':''):'';?>>Thứ tự hiển thị</option>
                    </select>
                </div>
                <div class="col-md-4 col-lg-3" style="padding-top: 5px;">
                 <button class="btn" style="color:#fff;background-color: RGBA(0,0,0,0.1);border:solid 1px #fff"><i class="fa fa-filter"></i>Tìm kiếm</button>
                </div>
            </div>
        </form>
    </div>
    <h4 style="margin-top: 10px">Kết quả gồm tổng cộng <?php echo count($lst_post);?> slide</h4>
    <?php
    if($num_page>0)
    {
    ?>
    <table id="tb-post">
        <tbody>
            <tr>
                <th><a href="<?php echo ($query_string==''?'?':$query_string.'&');?>sort=<?php echo (!isset($_GET['sort'])? '0':($_GET['sort']==1?'0':'1') );?>">#</a></th>
                <th>Hình ảnh</th>
                <th style="min-width:20%;">Tiêu đề</th>
                <th>Mô tả ngắn</th>
                <th>Trạng thái</th>
                
                <th>Ngày chỉnh sửa</th>
                <th>Người chỉnh sửa</th>                      
                <th style="min-width:150px;">Chức năng</th>
            </tr>
            <?php
            foreach ($lst_post as $key=>$post) {
                if($key>=$begin-1 && $key<=$end-1)
                {
            ?>
            <tr>
                <td><?php echo $post['id'];?></td>
                <td><a href=""><img style="min-height:100px;width:auto;" src="<?php echo '../'.SLIDER_PATH.$post['img']?>" alt=""></a></td>
                <td><a href="post.php?id=<?php echo $post['id'];?>"><?php echo $post['tit']?></a></td>
                <td><a href=""><?php echo $post['des']?></a></td>
                <td>
                    <button class="<?php echo $post['status']==1?'pd-setting':'ds-setting';?>"><?php echo $post['status']==1?'Hiện':($post['status']==2?'Chưa duyệt':'Ẩn');?></button>
                </td>
                <td><?php echo $post['edit_time'];?></td>
                <td><?php echo $post['edit_mem'];?></td> 
                
                <td>
                    <button data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Edit" onclick="window.location.href='slideshow.php?id=<?php echo $post['id'];?>'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                </td>
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
    $('[name=chk_slider]').click(function(){
        $.post("../api/update_post_slider.php",
        {
            id: $(this).attr('data-id'),
            slider:($(this).is(':checked')?1:0),
            token:$('[name=token]').val()
        },
        function(data, status){
            //var r=JSON.parse(data);
            alert('Bạn đã thêm 1 bài đăng vào slider');
        });
    });
    
</script>
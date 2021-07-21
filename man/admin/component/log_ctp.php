<?php
    $query='SELECT `id`, `us`, `nd`, `tg`, `loai` FROM `log` ';
    $paras=[];
    if(isset($_GET['log']))
    {
      $query.=' where `loai`=?';
      array_push($paras,$_GET['log']);
    }
    $query.=' order by `id` desc limit 0,30';
    $lst_log=DP::run_query($query,$paras,2);
?>
<div class="product-status-wrap"> 
  <div class="filter" style="margin-top:10px">
        <form method="get">
            <div class="row">
                <div class="col-md-4 col-lg-3">
                  Loại log
                  <select class="form-control" name="log" id="ddl_moi">
                    <option value="" <?php if(isset($_GET['log'])) echo($_GET['log']==0?'selected':'');?>>Tất cả</option>
                    <option value="1" <?php if(isset($_GET['log'])) echo($_GET['log']==1?'selected':'');?>>Hóa đơn</option>
                    <option value="2" <?php if(isset($_GET['log'])) echo($_GET['log']==2?'selected':'');?>>Bài viết</option>
                    <option value="3" <?php if(isset($_GET['log'])) echo($_GET['log']==3?'selected':'');?>>Gói giá</option>
                  </select>
                </div>
                <div class="col-md-4 col-lg-3">
                   <button type="submit" id="btn_search" class="btn" style="color:#fff;background-color: RGBA(0,0,0,0.1);border:solid 1px #fff"><i class="fa fa-filter"></i>&nbsp;Tìm kiếm</button>
                </div>
            </div>
        </form>
  </div>                       
  <table id="tb_log">
      <tbody>
          <tr>
              <th>Thời gian</th>
              <th>Người dùng</th>
              <th>Hành động</th>
              <th>Loại</th>
          </tr>
          <?php
          foreach ($lst_log as $log) {
          ?>
          <tr>
              <td><?php echo $log['tg'];?></td>
              <td><?php echo $log['us'];?></td>
              <td><?php echo $log['nd'];?></td>
              <td><?php echo ($log['loai']==1?"Hóa đơn":($log['loai']==2?"Mặt bằng":"Gói giá"));?>
              </td>
         </tr>
          <?php
          }
          ?>
      </tbody>
  </table>
  <div class="custom-pagination" id="paging-log" tb-id="tb_log" num-per-page='10'>
      <ul class="pagination">
          <li class="page-item"><a name="pre-page" class="page-link" style="cursor: pointer">Trước đó</a></li>
          <li class="page-item active"><span name="cur-page" class="page-link">1/3</span></li>
          <li class="page-item"><a name="next-page" class="page-link" style="cursor: pointer">Tiếp theo</a></li>
      </ul>
  </div>
</div>
<script type="text/javascript" src="custom-js/paging.js"></script>
<script type="text/javascript">
    paging('#tb_log','#paging-log');
</script>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
            <h4 class="text-left">Tin tức</h4>
            <div class="row vertical-center-box vertical-center-box-tablet">
                <div class="col-xs-3 mar-bot-15 text-left">
                    <label class="label bg-green">Chưa duyệt <?php echo count(DP::run_query('select `id` from `news` where `status`=2',[],2));?></label>
                </div>
                <div class="col-xs-9 cus-gh-hd-pro">
                    <h2 class="text-right no-margin"><?php echo count(DP::run_query('select `id` from `news`',[],2));?> bài</h2>
                </div>
            </div>
            <div class="progress progress-mini">
                <div style="width: 100%;" class="progress-bar bg-green"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1px;">
        <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
            <h4 class="text-left text-uppercase">Dịch vụ</h4>
            <div class="row vertical-center-box vertical-center-box-tablet">
                <div class="text-left col-xs-3 mar-bot-15">
                    <label class="label bg-red"><i class="fa fa-edit"></i></label>
                </div>
                <div class="col-xs-9 cus-gh-hd-pro">
                    <h2 class="text-right no-margin"><?php echo count(DP::run_query('select `id` from `services` where `status`=1',[],2));?> dịch vụ</h2>
                </div>
            </div>
            <div class="progress progress-mini">
                <div style="width: 100%;" class="progress-bar progress-bar-danger bg-red"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
            <h4 class="text-left text-uppercase">Khách hàng</h4>
            <div class="row vertical-center-box vertical-center-box-tablet">
                <div class="text-left col-xs-3 mar-bot-15">
                    <label class="label bg-blue"><i class="fa fa-user"></i></label>
                </div>
                <div class="col-xs-9 cus-gh-hd-pro">
                    <h2 class="text-right no-margin"><?php echo count(DP::run_query('select `id` from `customer`',[],2));?></h2>
                </div>
            </div>
            <div class="progress progress-mini">
                <div style="width: 100%;" class="progress-bar bg-blue"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
            <h4 class="text-left text-uppercase">Thành viên</h4>
            <div class="row vertical-center-box vertical-center-box-tablet">
                <div class="text-left col-xs-3 mar-bot-15">
                    <label class="label bg-purple"><i class="fa fa-money" aria-hidden="true"></i></label>
                </div>
                <div class="col-xs-9 cus-gh-hd-pro">
                    <h2 class="text-right no-margin"><?php $tong=count(DP::run_query('select `username` from `member` where `status` =1',[],2)); echo ($tong);?></h2>
                </div>
            </div>
            <div class="progress progress-mini">
                <div style="width: 60%;" class="progress-bar bg-purple"></div>
            </div>
        </div>
    </div>
</div>
<?php
if(!isset($_SESSION['us']))
{
?>
<div class="product-status-wrap" style="margin-top: 10px;">
    <div class="row">
    <div class="col-md-offset-3 col-md-6" style="border:solid 1px #fff;border-radius: 5px;padding:10px;">
        <form method="post" action="">
            <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
            <div class="form-group">
                <label for="txt_us">Tên đăng nhập</label>
                <input type="text" required class="form-control" id="txt_us" name="txt_us" placeholder="username">
            </div>
            <div class="form-group">
                <label for="pwd">Mật khẩu</label>
                <input type="password" required class="form-control" id="txt_pas" name="txt_pas" placeholder="password">
            </div>
            <div class="text-center">
                <button type="submit" name="btn_login" class="btn" style="height:auto;color:#fff;background-color: RGBA(0,0,0,0.1);border:solid 1px #fff"><i class="fa fa-user"></i>&nbsp;Đăng nhập</button>
            </div>
        </form>
    </div>
    </div>
</div>
<?php
}
?>
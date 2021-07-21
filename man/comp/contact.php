<form action="" method="post">
    <input type="hidden" name="token_guest" value="<?php echo $_SESSION['token_guest'];?>">
    <div class="row mt-3">
        <div class="col-lg-6">
            <label for="name">Họ và tên *</label>
            <input type="text" required name="name" id="name" class="form-control">
        </div>
        <div class="col-lg-6">
            <label for="email">Email *</label>
            <input type="email" required name="email" id="email" class="form-control">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-6">
            <label for="phone">Số điện thoại *</label>
            <input type="text" required name="phone" id="phone" class="form-control">
        </div>
        <div class="col-lg-6">
            <label for="tit">Tiêu đề *</label>
            <input type="text" required name="tit" id="tit" class="form-control">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <label for="detail">Chi tiết yêu cầu của bạn</label>
            <textarea rows="3" required name="detail" id="detail" class="form-control"></textarea>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <button class="btn" type="reset" style="border:1px solid gray; min-width:100px;border-radius: 0px;">Xóa</button><button name="btnGui" type="submit" class="ml-3 btn btn-warning text-light" style="min-width:100px;border-radius: 0px;">Gửi</button>
        </div>
    </div>
</form>
<?php
if(isset($_POST['btnGui']))
{
    if($_SESSION['token_guest']==$_POST['token_guest'])
    {
        DP::run_query('INSERT INTO `cus_contact`(`email`, `name`, `phone`, `tit`, `detail`, `status`) VALUES (?,?,?,?,?,0)',[$_POST['email'],$_POST['name'],$_POST['phone'],$_POST['tit'],$_POST['detail']],1);
        echo '<script>alert(\'Gửi yêu cầu thành công\');</script>';
    }
}
?>
<?php

include("../layout/header.php");

?>

<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="index.php">Trang chủ</a></li>
                <li class="active">Lấy lại mật khẩu</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--start-account-->
<div class="account">
    <div class="container">
        <div class="account-bottom">
            <div class="col-md-12 account-left">
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                    <input type="hidden" name="tranghientai" value="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <div class="account-top heading">
                        <h3>Lấy lại mật khẩu</h3>
                    </div>
                    <div class="address">
                        <span>Tên đăng nhập</span>
                        <input id="tendangnhap" name="tendangnhap" type="text">
                        <span style="color: red;" id="thongbao">
                            Hãy điền tên đăng nhập của bạn, mật khẩu sẽ được gửi qua email của bạn lúc bạn đăng ký.
                        </span>
                    </div>
                    <div class="address">
                        <input id="laymk" type="submit" value="Lấy lại mật khẩu">

                    </div>
            </div>
            </form>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

<?php
global $conn;

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $tendangnhap=$_POST["tendangnhap"];
    $ktTaiKhoan="SELECT * FROM khachhang WHERE TenDangNhap='".$tendangnhap."'";
    $truyvankyTaiKhoan=mysqli_query($conn,$ktTaiKhoan);

    if(mysqli_num_rows($truyvankyTaiKhoan) > 0)
    {
        $cot=mysqli_fetch_array($truyvankyTaiKhoan);

        if(mail($cot["Email"],"Lấy lại mật khẩu website bán hàng","Xin chào ! \n Mật khẩu của bạn là: ".$cot["MatKhau"],"From: taikhoangg0@gmail.com"))
            echo "<script> $('#thongbao').text('Lấy lại mật khẩu thành công, hãy kiểm tra email của bạn');</script>";
        else
            echo "<script> $('#thongbao').text('Đã có lỗi xảy ra');</script>";
    }
    else
    {
        echo "<script> $('#thongbao').text('Tài khoản không tồn tại');</script>";
    }
}
?>

<script>
    $(document).ready(function(){
        $('#laymk').click(function(){
            tendangnhap=$('#tendangnhap').val();

            loi=0;
            if(tendangnhap=="")
            {
                loi++;
                $('#thongbao').text("Hãy nhập tên đăng nhập");
            }

            if(loi!=0)
            {
                return false;
            }
        });

    });
</script>

<?php
include("../layout/footer.php");
?>


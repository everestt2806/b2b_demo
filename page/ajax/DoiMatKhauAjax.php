<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banhang_php";
$conn = mysqli_connect($servername, $username, $password, $dbname);
	
if(!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
mysqli_query($conn,"set names utf8");

$ktTonTai="SELECT * FROM thanhvien WHERE TenDangNhap='".$_POST["tendangnhap"]."' and MatKhau='".$_POST["matkhaucu"]."'";
$truyvanktTonTai=mysqli_query($conn,$ktTonTai);
if(mysqli_num_rows($truyvanktTonTai) > 0)
{
    $thaydoiMatKhau="UPDATE thanhvien SET MatKhau='".$_POST["matkhaumoi"]."' WHERE TenDangNhap='".$_POST["tendangnhap"]."'";
    if(mysqli_query($conn,$thaydoiMatKhau))
        echo "Đổi mật khẩu thành công";
    else
        echo "Xảy ra lỗi";
}
else
{
    echo "Mật khẩu không chính xác" ;
}

?>
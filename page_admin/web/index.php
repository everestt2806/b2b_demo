<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Login Admin Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="keywords" content="Ribbon Login Form Responsive Templates, Iphone Compatible Templates, Smartphone Compatible Templates, Ipad Compatible Templates, Flat Responsive Templates"/>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!--/webfonts-->
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
    ?>
	
</head>
<body>
<!--start-main-->
<h1>Xin chào quản trị viên !<span>Xin hãy đăng nhập...</span></h1>
<div class="login-box">
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
			<input name="tendangnhap" id="tendangnhap" type="text" class="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" >
			<input name="matkhau" id="matkhau" type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">

		<div class="remember">
			<h4>Chào mừng đến trang quản lý.</h4>
		</div>
		<div class="clear"> </div>
		<div class="btn">
			<input id="dangnhap" type="submit" value="Đăng Nhập" >
		</div>
		<div class="clear"> </div>
    </form>

</div>
<!--//End-login-form-->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tendangnhap = $_POST["tendangnhap"];
    $matkhau = $_POST["matkhau"];

    $ktTonTai = "SELECT * FROM nhanvien WHERE TenDangNhap = '" . $tendangnhap . "' AND MatKhau='" . $matkhau . "'";
    $truyVanktTonTai = mysqli_query($conn, $ktTonTai);

    if ($truyVanktTonTai === false) {
        // Xử lý lỗi kết nối
        echo "<script>alert('Lỗi kết nối MySQL: " . mysqli_connect_error() . "')</script>";
    } else {
        // Kiểm tra số lượng dòng kết quả
        $numRows = mysqli_num_rows($truyVanktTonTai);

        if ($numRows > 0) {
            // Đăng nhập thành công
            $row = mysqli_fetch_assoc($truyVanktTonTai);
            $userRole = $row['role'];

            echo "<script>alert('Đăng nhập thành công! Chúc mừng')</script>";

            // Lưu trữ thông tin đăng nhập trong session
            $_SESSION["admin"] = $tendangnhap;
            $_SESSION["userRole"] = $userRole;

            echo "<script>location='../index.php';</script>";
        } else {
            // Đăng nhập thất bại
            echo "<script>alert('Tài khoản hoặc mật khẩu không đúng!')</script>";
        }
    }
}
?>
</body>
</html>


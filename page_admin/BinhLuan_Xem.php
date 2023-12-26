<?php

include("../layout/header_admin.php");

if(!isset($_SESSION["admin"]))
    echo "<script>location='web/index.php';</script>";


if(!isset($_GET["MaBinhLuan"]))
    echo "<script>location='BinhLuan.php';</script>";

$layDuLieu="SELECT * FROM binhluan
                INNER JOIN khachhang ON binhluan.TenDangNhap=khachhang.TenDangNhap
                INNER JOIN sanpham ON binhluan.MaSanPham=sanpham.MaSanPham
                WHERE MaBinhLuan='".$_GET["MaBinhLuan"]."'";
global $conn;
$truyvan_layDuLieu=mysqli_query($conn,$layDuLieu);
if(mysqli_num_rows($truyvan_layDuLieu)>0)
{
    $cot=mysqli_fetch_array($truyvan_layDuLieu);
}
else
{
    echo "<script>location='BinhLuan.php';</script>";
}

?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                       Xem chi tiết bình luận
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>  <a href="index.php">Trang chủ</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> <a href="BinhLuan.php">Danh sách bình luận</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Xem chi tiết bình luận
                        </li>
                    </ol>
                </div>

                <div class="col-lg-12">
                    <div >
                        <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                            <table class="table table-bordered">

                                <tr>
                                    <th>Người bình luận</th><td><input readonly class="form-control " value="<?php echo $cot["HoTen"]; ?>"> </td>

                                </tr>
                                <tr>
                                    <th>Tên sản phẩm</th><td><input readonly class="form-control" value="<?php echo $cot["TenSanPham"]; ?>"> </td>

                                </tr>
                                <tr>
                                    <th>Ngày bình luận</th><td><input readonly class="form-control" value="<?php echo date("d/m/Y",strtotime($cot["NgayBinhLuan"])); ?>"> </td>

                                </tr>
                                <tr>
                                    <th>Nội dung</th><td><textarea readonly rows="10" class="form-control" ><?php echo $cot["NoiDung"]; ?></textarea></td>

                                </tr>
                                <tr>
                                    <th></th>
                                    <th><input id="Xoa" type="submit" value="Xóa" class="btn btn-danger"></th>
                                </tr>


                            </table>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>

    <script>
        $(document).ready(function(){
            $('#Xoa').click(function(){
                if(!confirm("Bạn có thực muốn xóa !"))
                    return false;
            });

        });
    </script>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST") {
		global $conn;
        $xoaDuLieu="DELETE FROM binhluan  WHERE MaBinhLuan='".$_GET["MaBinhLuan"]."'";
        if(mysqli_query($conn,$xoaDuLieu))
        {
            echo "<script>alert('Xóa thành công !')</script>";
        }
        else
        {
            echo "<script>alert('Đã xảy ra lỗi !')</script>";
        }
    echo "<script>location='BinhLuan_Xem.php?MaBinhLuan=".$_GET["MaBinhLuan"]."';</script>";
}

?>

<?php
include("../layout/footer_admin.php");

?>
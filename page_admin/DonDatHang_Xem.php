<?php

include("../layout/header_admin.php");

if(!isset($_SESSION["admin"]))
    echo "<script>location='web/index.php';</script>";

global $conn;

if(isset($_GET["MaDonDatXoa"]))
{
    $xoaDuLieu1="DELETE FROM ct_dondat  WHERE MaDonDat='".$_GET["MaDonDatXoa"]."'";
	$xoa1=mysqli_query($conn,$xoaDuLieu1);
	$xoaDuLieu2="DELETE FROM dondat  WHERE MaDonDat='".$_GET["MaDonDatXoa"]."'";
    if(mysqli_query($conn,$xoaDuLieu2))
    {
        echo "<script>alert('Xóa thành công !')</script>";
    }
    else
    {
        echo "<script>alert('Đã xảy ra lỗi !')</script>";
    }
}

if(!isset($_GET["MaDonDat"]))
    echo "<script>location='DonDatHang.php';</script>";

$layDonDat="SELECT dondat.* , khachhang.HoTen  hotentv , nhanvien.HoTen  hotennv FROM dondat
                INNER JOIN khachhang ON dondat.TenDangNhap=khachhang.TenDangNhap
                INNER JOIN nhanvien ON dondat.MaNhanVien=nhanvien.MaNhanVien
                WHERE MaDonDat='".$_GET["MaDonDat"]."'";
$truyvan_layDonDat=mysqli_query($conn,$layDonDat);
if(mysqli_num_rows($truyvan_layDonDat)>0)
{
    //lay thong tin don dat hang
    $cotDDH=mysqli_fetch_array($truyvan_layDonDat);

    //lay chi tiet don dat hang
    $layCT_DonDat="SELECT  sanpham.*, ct_dondat.* FROM ct_dondat
                INNER JOIN sanpham ON ct_dondat.MaSanPham=sanpham.MaSanPham
                WHERE MaDonDat='".$_GET["MaDonDat"]."'";
    $truyvan_layCT_DonDat=mysqli_query($conn,$layCT_DonDat);

}
else
{
    echo "<script>location='DonDatHang.php';</script>";
}

?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                       Xem chi tiết đơn đặt hàng
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>  <a href="index.php">Trang chủ</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> <a href="DonDatHang.php">Danh sách đơn đặt hàng</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Xem chi tiết đơn đặt hàng
                        </li>
                    </ol>
                </div>

                <div class="col-lg-12">
                    <div >
                        <form id="frmDuyetDDH" method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                            <table class="table table-bordered">

                                <tr>
                                    <td >
                                        <b>Mã đơn đặt hàng:</b> <?php echo $cotDDH["MaDonDat"]; ?> <br>
                                        <b>Người đặt:</b> <?php echo $cotDDH["hotentv"]; ?> <br>
                                        <b>Nơi giao:</b> <?php echo $cotDDH["NoiGiao"]; ?> <br>
                                        <b>Ngày đặt:</b> <?php echo date("d/m/Y",strtotime($cotDDH["NgayDat"]));?> <br>
                                    </td>
                                    <td colspan="3">

                                       Trạng thái:
                                        <select name="TrangThai" id="TrangThai" class="form-control">
                                            <?php if(trim($cotDDH["TrangThai"])==0) {?>
                                                <option selected value="0">Chưa giao</option>
                                                <option value="1">Đã giao</option>
                                            <?php }else{
                                                ?>
                                                <option value="0">Chưa giao</option>
                                                <option selected value="1">Đã giao</option>
                                           <?php } ?>
                                        </select>
                                        <br>
                                        <a href="<?php echo $_SERVER["PHP_SELF"]; ?>?MaDonDatXoa=<?php echo $cotDDH["MaDonDat"]; ?>" id="Xoa" class="btn btn-danger">Xóa</a>
                                    </td>

                                </tr>

                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng đặt</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                                <?php
                                $tongtien=0;
                                while($cotCT_DDH=mysqli_fetch_array($truyvan_layCT_DonDat))
                                    {
                                        $tongtien+=$cotCT_DDH["SoLuong"]*$cotCT_DDH["DonGia"];
                                 ?>

                                    <tr>
                                        <td><?php echo $cotCT_DDH["TenSanPham"]; ?></td>
                                        <td><?php echo $cotCT_DDH["SoLuong"]; ?></td>
                                        <td><?php echo DinhDangTien($cotCT_DDH["DonGia"]); ?></td>
                                        <td><?php echo DinhDangTien($cotCT_DDH["SoLuong"]*$cotCT_DDH["DonGia"]); ?></td>
                                    </tr>

                                <?php  } ?>
                                <tr>
                                    <th colspan="3">Tổng tiền</th>
                                    <th><?php echo DinhDangTien($tongtien); ?> VNĐ</th>
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

            $('#TrangThai').change(function(){
                $('#frmDuyetDDH').submit();
            });

        });
    </script>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST") {
	global $conn;
    $trangthai=$_POST["TrangThai"];

    $layNV="SELECT * FROM nhanvien WHERE TenDangNhap='".$_SESSION["admin"]."'";
    $truyvan_layNV=mysqli_query($conn,$layNV);
    $cotTV=mysqli_fetch_array($truyvan_layNV);

    $suaDuLieu="UPDATE dondat SET TrangThai='".$trangthai."', MaNhanVien='".$cotTV["MaNhanVien"]."' WHERE MaDonDat='".$_GET["MaDonDat"]."'";
    if(mysqli_query($conn,$suaDuLieu))
    {
        echo "<script>alert('Cập nhật thành công !')</script>";
    }
    else
    {
        echo "<script>alert('Đã xảy ra lỗi !')</script>";
    }
    echo "<script>location='DonDatHang_Xem.php?MaDonDat=".$_GET["MaDonDat"]."';</script>";
}

?>

<?php
include("../layout/footer_admin.php");

?>
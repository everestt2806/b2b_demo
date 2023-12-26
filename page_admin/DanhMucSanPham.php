<?php

include("../layout/header_admin.php");

if(!isset($_SESSION["admin"]))
    echo "<script>location='web/index.php';</script>";

global $conn;

if(isset($_GET["MaLoaiSP"]))
{
    $xoaDuLieu="DELETE FROM loaisp  WHERE MaLoaiSP='".$_GET["MaLoaiSP"]."'";
    if(mysqli_query($conn,$xoaDuLieu))
    {
        echo "<script>alert('Xóa thành công !')</script>";
    }
    else
    {
        echo "<script>alert('Đã xảy ra lỗi !')</script>";
    }
}


$trang=0;
if(isset($_GET["trang"]))
    $trang=$_GET["trang"];

$layLoaiSP=phan_trang("*","loaisp","",10,$trang,"");

$truyvan_layLoaiSP=$layLoaiSP;



?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Danh mục sản phẩm
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>  <a href="index.php">Trang chủ</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-desktop"></i> Danh mục sản phẩm
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-lg-12">
                <h2><a href="DanhMucSanPham_Them.php" class="btn btn-primary">Thêm danh mục sản phẩm</a></h2>
                <div >

                    <table class="table table-bordered table-hover">

                        <tr>
                            <th>Tên danh mục</th>
                            <th>Mô tả</th>
                            <th></th>
                        </tr>
                    <?php
                        while($cot=mysqli_fetch_array($truyvan_layLoaiSP))
                        {
                        ?>
                            <tr>
                                <td><?php echo $cot["TenLoai"];?></td>
                                <td><?php echo $cot["MoTa"];?></td>
                                <td>
                                    <a href="DanhMucSanPham_Sua.php?MaLoaiSP=<?php echo $cot["MaLoaiSP"]; ?>" class="btn btn-success">Cập nhật</a>
                                    <a href="<?php echo $_SERVER["PHP_SELF"]; ?>?MaLoaiSP=<?php echo $cot["MaLoaiSP"]; ?>" class="XoaDuLieu btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        <?php
                        }
                    ?>

                    </table>
                    <div class="divtrang"></div>
                </div>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function () {
            <?php
               echo  "$('.divtrang_".$trang."').addClass('divtrangactive');";
            ?>
        $('.XoaDuLieu').click(function(){
            if(!confirm("Bạn có thực muốn xóa !"))
                return false;
        });

        });
    </script>
<?php
include("../layout/footer_admin.php");

?>
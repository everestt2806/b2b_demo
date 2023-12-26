<?php
session_start();
include("../layout/header_admin.php");

if(!isset($_SESSION["admin"]) &&(($_SESSION['userRole'] !== "admin") || $_SESSION['userRole'] !== "staff"))
    echo "<script>location='web/index.php';</script>";
global $conn;

$tongSP=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM sanpham"));
$tongLSP=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM loaisp"));
$tongTV=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM khachhang"));
$tongNV=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM nhanvien"));
$tongBL=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM binhluan"));
$tongDDH=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dondat"));
$ddhChua=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dondat WHERE TrangThai=0"));
$ddhDa=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM dondat WHERE TrangThai=1"));

?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Trang chủ
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-home"></i>  <a href="DanhMucSanPham.php">Trang chủ</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $tongBL; ?></div>
                                    <div>Bình luận</div>
                                </div>
                            </div>
                        </div>
                        <a href="BinhLuan.php">
                            <div class="panel-footer">
                                <span class="pull-left">Xem chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $ddhChua; ?></div>
                                    <div>Đơn đặt hàng mới</div>
                                </div>
                            </div>
                        </div>
                        <a href="DonDatHang.php">
                            <div class="panel-footer">
                                <span class="pull-left">Xem chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $tongSP; ?></div>
                                    <div>Sản phẩm</div>
                                </div>
                            </div>
                        </div>
                        <a href="SanPham.php">
                            <div class="panel-footer">
                                <span class="pull-left">Xem chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $tongTV; ?></div>
                                    <div>Khách hàng</div>
                                </div>
                            </div>
                        </div>
                        <a href="KhachHang.php">
                            <div class="panel-footer">
                                <span class="pull-left">Xem chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-fw fa-bar-chart-o"></i> Thống kê chung</h3>
                        </div>
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="SanPham.php" class="list-group-item">
                                    <span class="badge"><?php echo $tongSP; ?></span>
                                    <i class="fa fa-shopping-cart"></i> Tổng sản phẩm
                                </a>
                                <a href="DanhMucSanPham.php" class="list-group-item">
                                    <span class="badge"><?php echo $tongLSP; ?></span>
                                    <i class="fa fa-fw fa-desktop"></i> Tổng danh mục SP
                                </a>
                                <a href="KhachHang.php" class="list-group-item">
                                    <span class="badge"><?php echo $tongTV; ?></span>
                                    <i class="fa fa-fw fa-user"></i> Tổng khách hàng
                                </a>
                                <a href="NhanVien.php" class="list-group-item">
                                    <span class="badge"><?php echo $tongNV; ?></span>
                                    <i class="fa fa-fw fa-gear"></i> Tổng nhân viên
                                </a>
                                <a href="BinhLuan.php" class="list-group-item">
                                    <span class="badge"><?php echo $tongBL; ?></span>
                                    <i class="fa fa-comments"></i> Tổng bình luận
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-fw fa-bar-chart-o"></i> Thống kê mua bán</h3>
                        </div>
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="DonDatHang.php" class="list-group-item">
                                    <span class="badge"><?php echo $tongDDH; ?></span>
                                    <i class="fa fa-tasks"></i> Tổng đơn đặt hàng
                                </a>
                                <a href="DonDatHang.php" class="list-group-item">
                                    <span class="badge"><?php echo $ddhDa; ?></span>
                                    <i class="fa fa-check-square-o"></i> Tổng đơn đặt hàng đã giao
                                </a>
                                <a href="DonDatHang.php" class="list-group-item">
                                    <span class="badge"><?php echo $ddhChua; ?></span>
                                    <i class="fa fa-square-o"></i> Tổng đơn đặt hàng chưa giao
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include("../layout/footer_admin.php");

?>
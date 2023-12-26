<?php
    include("../layout/header.php");
?>

<?php
	global $conn;
    $dieukienTrang="";
    $trang = 0;

    if (isset($_GET["trang"]))
        $trang = $_GET["trang"];
    if (isset($_GET["tensp"]))
        $dieukienTrang = $_GET["tensp"];

    if($_SERVER["REQUEST_METHOD"]=="POST") {
        $dieukienTrang=$_POST["tkTenSP"];
    }

        $where="WHERE TenSanPham LIKE '%" . $dieukienTrang . "%'";
        $laysp=phan_trang("*","sanpham",$where,6,$trang,"&tensp=".$dieukienTrang);

        //$laysp = "SELECT * FROM sanpham WHERE TenSanPham LIKE '%" . $_POST["tkTenSP"] . "%'";
        $truyvan_laysp = $laysp;

        $layLoaiSP="SELECT * FROM loaisp";
        $truyvan_layLoaiSP=mysqli_query($conn,$layLoaiSP);
?>

        <!--start-breadcrumbs-->
        <div class="breadcrumbs">
            <div class="container">
                <div class="breadcrumbs-main">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Trang Chủ</a></li>
                        <li class="active">Sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div>
        <!--end-breadcrumbs-->
        <!--start-product-->
        <div class="product">
            <div class="container">
                <div class="product-main">
                    <div class="col-md-12 p-left">
                        <div class="row">
                            <div class="col-md-4 form-inline">
                                Nhập giá từ <input type="text" id="gia" class="form-control "> trở xuống.
                            </div>
                            <div class="col-md-4 form-inline">
                                Loại sản phẩm:
                                <select id="loaisp" class="form-control">
                                    <option value="">Chọn loại sản phẩm</option>
                                    <?php
                                    while($cot=mysqli_fetch_array($truyvan_layLoaiSP))
                                    {
                                        echo "<option value='".$cot["MaLoaiSP"]."'>".$cot["TenLoai"]."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input id="timkiem" type="button" value="Tìm kiếm" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                    <!--  phan danh sach san pham -->

                    <div class="col-md-9 p-left" id="loadSP">
                        <div class="clearfix"></div>
                        <?php
                        $i = 0;
                        while ($cot = mysqli_fetch_array($truyvan_laysp)) {
                            $i++;
                            ?>
                            <div class="product-one">
                                <div class="col-md-4 product-left single-left">
                                    <div class="p-one simpleCart_shelfItem">

                                        <a href="ChiTietSanPham.php?MaSP=<?php echo $cot["MaSanPham"]; ?>" >  <!-- link chi tiet san pham -->

                                            <img height="250" src="../images/HinhSP/<?php echo $cot["Anh"] ?>" alt=""/>

                                            <div class="mask mask1">
                                                <span>Xem chi tiết</span>
                                            </div>
                                        </a>
                                        <h4><?php echo $cot["TenSanPham"] ?></h4>

                                        <p><a class="item_add" href="#"><span
                                                    class=" item_price"> $ <?php echo DinhDangTien($cot["DonGia"]); ?></span></a></p>
                                    </div>
                                </div>

                            </div>


                            <?php if ($i % 3 == 0) { ?>

                                <div class="clearfix"></div>

                            <?php
                            }
                        }
                        ?>
                        <div class="divtrang"></div>
                    </div>

                    <!-- phan danh muc -->
                    <div class="col-md-3 p-right single-right">
                        <h3>Loại sản phẩm</h3>
                        <ul class="product-categories">
                            <?php
							global $conn;
                            $layLoaiSP="SELECT * FROM loaisp";
                            $truyvan_layLoaiSP=mysqli_query($conn,$layLoaiSP);
                            while($cot=mysqli_fetch_array($truyvan_layLoaiSP))
                            {
                                ?>
                                <li><a href="DanhMucSanPham.php?loaisp=<?php echo $cot["MaLoaiSP"] ?>"><?php echo $cot["TenLoai"] ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                        <h3>Giá</h3>
                        <ul class="product-categories p1">
                            <li><a href="DanhMucSanPham.php?gia=100000">Dưới 100K</a></li>
                            <li><a href="DanhMucSanPham.php?gia=5000000">Dưới 5 triệu</a></li>
                            <li><a href="DanhMucSanPham.php?gia=15000000">Dưới 15 triệu</a></li>
                            <li><a href="DanhMucSanPham.php?gia=30000000">Dưới 30 triệu</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--end-product-->
        <script src="../script/jsNguoiDung/jsNguoiDung.js"></script>
        <script>
            $(document).ready(function () {
                <?php
                   echo  "$('.divtrang_".$trang."').addClass('divtrangactive')";
                ?>

                $('#timkiem').click(function(){
                    timkiem_sanpham($('#gia').val(),$('#loaisp').val());
                });
            });
        </script>

    <?php
include("../layout/footer.php");
?>


<?php
include("../layout/header.php");

global $conn;

$laySPcao1="SELECT * FROM sanpham ORDER BY DonGia DESC LIMIT 0,1";
$truyvan_laySPcao1=mysqli_query($conn,$laySPcao1);
$cot1=mysqli_fetch_array($truyvan_laySPcao1);

$laySPcao2="SELECT * FROM sanpham ORDER BY DonGia DESC LIMIT 1,1";
$truyvan_laySPcao2=mysqli_query($conn,$laySPcao2);
$cot2=mysqli_fetch_array($truyvan_laySPcao2);

$laySP="SELECT * FROM sanpham ORDER BY SoLuong DESC LIMIT 0,8";
$truyvan_laySP=mysqli_query($conn,$laySP);

?>


<!--banner-ends-->
<!--Slider-Starts-Here-->

<!--End-slider-script-->
<!--start-banner-bottom-->
<div class="banner-bottom">
    <div class="container">
        <div class="banner-bottom-top">
            <div class="col-md-6 banner-bottom-left">
                <div class="bnr-one">
                    <div class="bnr-left">
                        <h1><a href="ChiTietSanPham.php?MaSP=<?php echo $cot1["MaSanPham"] ?>"><?php echo $cot1["TenSanPham"] ?></a></h1>
                        <p>Tận hưởng ưu đãi.</p>
                        <div class="b-btn">
                            <a href="ChiTietSanPham.php?MaSP=<?php echo $cot1["MaSanPham"] ?>">MUA NGAY</a>
                        </div>
                    </div>
                    <div class="bnr-right">
                        <a href="ChiTietSanPham.php?MaSP=<?php echo $cot1["MaSanPham"] ?>">
                            <img width="150" height="150" src="../images/HinhSP/<?php echo $cot1["Anh"]; ?>" alt="" />
                        </a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>

            <div class="col-md-6 banner-bottom-right">
                <div class="bnr-two">
                    <div class="bnr-left">
                        <h1><a href="ChiTietSanPham.php?MaSP=<?php echo $cot2["MaSanPham"] ?>"><?php echo $cot2["TenSanPham"] ?></a></h1>
                        <p>Thêm nhiều giảm giá.</p>
                        <div class="b-btn">
                            <a href="ChiTietSanPham.php?MaSP=<?php echo $cot2["MaSanPham"] ?>">MUA NGAY</a>
                        </div>
                    </div>
                    <div class="bnr-right">
                        <a href="ChiTietSanPham.php?MaSP=<?php echo $cot2["MaSanPham"] ?>">
                            <img width="150" height="150" src="../images/HinhSP/<?php echo $cot2["Anh"]; ?>" alt="" />
                        </a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--end-banner-bottom-->
<!--start-shoes-->
<div class="shoes">
    <div class="container">
        <div class="product-one"></div>

            <?php
            $i=0;
            while($cot=mysqli_fetch_array($truyvan_laySP))
                {
                    $i++;
                ?>
        <div class="product-one">
            <div class="col-md-3 product-left">
                <div class="p-one simpleCart_shelfItem">
                    <a href="ChiTietSanPham.php?MaSP=<?php echo $cot["MaSanPham"]; ?>">
                        <img height="250" src="../images/HinhSP/<?php echo $cot["Anh"]; ?>" alt="" />
                        <div class="mask">
                            <span>Xem chi tiết</span>
                        </div>
                    </a>
                    <h4><?php echo $cot["TenSanPham"]; ?></h4>
                    <p><a class="item_add" href="#"><i></i> <span class=" item_price"> <?php echo DinhDangTien($cot["DonGia"]); ?> VNĐ</span></a></p>

                </div>
            </div>
        </div>
            <?php
                    if($i%4==0)
                    { ?>
                    <div class="clearfix"></div>
                <?php
                    }
                }
            ?>



    </div>
</div>
<!--end-shoes-->
<!--start-abt-shoe-->
<div class="abt-shoe">
    <div class="container">
        <div class="abt-shoe-main">
            <div class="col-md-4 abt-shoe-left">
                <div class="abt-one">
                    <a ><img src="../images/abt1.jpg" alt="" /></a>
                    <h4><a href="">Laptop</a></h4>
                    <p>Hỗ trợ tất cả tác vụ học tập,văn phòng cho đến hiệu năng cao dành cho gaming</p>
                </div> 
            </div>
            <div class="col-md-4 abt-shoe-left">
                <div class="abt-one">
                    <a ><img src="../images/abt2.jpg" alt="" /></a>
                    <h4><a href="">Màn hình</a></h4>
                    <p>Làm việc, học tập hiệu quả với góc nhìn rộng hơn, thoải mái hơn</p>
                </div>
            </div>
            <div class="col-md-4 abt-shoe-left">
                <div class="abt-one">
                    <a ><img src="../images/abt3.jpg" alt="" /></a>
                    <h4><a href="">Loa</a></h4>
                    <p>Âm thanh sống động giúp bạn đón nhận nhiều cảm xúc hơn.</p>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>


<?php
include("../layout/footer.php");
?>

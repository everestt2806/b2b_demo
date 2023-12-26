<?php
    include("../layout/header.php");
?>

<?php
    $trang=0;
    if(isset($_GET["trang"]))
        $trang=$_GET["trang"];

    $laysp=phan_trang("*","sanpham","",6,$trang,"");

    $truyvan_laysp=$laysp;

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
                <!--  phan danh sach san pham -->

                <div class="col-md-9 p-left">
                    <div class="clearfix"> </div>
                    <?php
                        $i=0;
                        while($cot=mysqli_fetch_array($truyvan_laysp))
                        {
                            $i++;
                    ?>
				    <div class="product-one">
                        <div class="col-md-4 product-left single-left">
                            <div class="p-one simpleCart_shelfItem">

                                <a href="ChiTietSanPham.php?MaSP=<?php echo $cot["MaSanPham"]; ?>" >  <!-- link chi tiet san pham -->

                                    <img height="250" src="../images/HinhSP/<?php echo $cot["Anh"] ?>" alt="" />
                                    <div class="mask mask1">
                                        <span>Xem chi tiết</span>
                                    </div>
                                </a>
                                <h4><?php echo $cot["TenSanPham"] ?></h4>
                                <p><a class="item_add" href="#"><span class=" item_price"> <?php echo DinhDangTien($cot["DonGia"]); ?> VNĐ</span></a></p>
                            </div>
                        </div>

                    </div>


                    <?php if($i%3==0) {?>

                    <div class="clearfix"> </div>

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
                        <li><a href="DanhMucSanPham.php?gia=200000">Dưới 5 triệu</a></li>
                        <li><a href="DanhMucSanPham.php?gia=300000">Dưới 15 triệu</a></li>
                        <li><a href="DanhMucSanPham.php?gia=400000">Dưới 30 triệu</a></li>
                    </ul>
                </div>
			<div class="clearfix"> </div>
		</div>
	</div>
	</div>
	<!--end-product-->
<script>
    $(document).ready(function(){
        <?php
           echo  "$('.divtrang_".$trang."').addClass('divtrangactive')";
        ?>
    });
</script>

<?php
include("../layout/footer.php");
?>


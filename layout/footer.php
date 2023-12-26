<!--start-footer-->
<div class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="col-md-3 footer-left">
                <h3>VỀ CHÚNG TÔI</h3>
                <ul>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="contact.html">Liên hệ</a></li>
                    <li><a href="#">Các trang web</a></li>
                    <li><a href="#">Tin mới</a></li>
                    <li><a href="#">Nhóm</a></li>
                    <li><a href="#">Công việc</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-left">
                <h3>TÀI KHOẢN CỦA BẠN</h3>
                <ul>
                    <li><a href="account.html">Tài khoản</a></li>
                    <li><a href="#">Thông tin cá nhân</a></li>
                    <li><a href="contact.html">Địa chỉ liên hệ</a></li>
                    <li><a href="#">Giảm giá</a></li>
                    <li><a href="#">Kiểm tra đơn hàng</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-left">
                <h3>DỊCH VỤ HỖ TRỢ</h3>
                <ul>
                    <li><a href="#">Câu hỏi thường gặp</a></li>
                    <li><a href="#">Giao hàng</a></li>
                </ul>
                <div class="sub">
                    <form>
                        <input type="text" value="Nhập Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nhập Email';}">
                        <input type="submit" value="Đăng ký">
                    </form>
                </div>
            </div>
            <div class="col-md-3 footer-left footer-right">
                <h3>THEO DÕI</h3>
                <ul>
                    <li><a href="#"><span class="fb"> </span></a></li>
                    <li><a href="#"><span class="twit"> </span></a></li>
                    <li><a href="#"><span class="drbl"> </span></a></li>
                    <li><a href="#"><span class="google"> </span></a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--end-footer-->

<script src="../script/jsNguoiDung/jsNguoiDung.js"></script>
<!--end-footer-text-->
<div class="footer-text">
    <div class="container">
        <div class="footer-main">
            <p class="footer-class"> <a href="http://w3layouts.com/" target="_blank"></a> </p>
			<p class="footer-class"></p>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            /*
             var defaults = {
             containerID: 'toTop', // fading element id
             containerHoverID: 'toTopHover', // fading element hover id
             scrollSpeed: 1200,
             easingType: 'linear'
             };
             */

            $().UItoTop({ easingType: 'easeOutQuart' });

        });
    </script>
    <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
</div>
<!--end-footer-text-->
</body>
</html>
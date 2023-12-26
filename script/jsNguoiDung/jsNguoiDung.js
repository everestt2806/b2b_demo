function timkiem_sanpham(gia , loaisp)
{
    $.ajax({
        url:"ajax/TimKiemAjax.php",
        type:"POST",
        data:{
            gia:gia,
            loaisp:loaisp
        },
        success:function(giatri) {
            $('#loadSP').html(giatri);
        }

    });
}

function DoiMatKhau(tendangnhap,matkhaucu, matkhaumoi)
{
    $.ajax({
        url:"ajax/DoiMatKhauAjax.php",
        type:"POST",
        data:{
            tendangnhap:tendangnhap,
            matkhaucu:matkhaucu,
            matkhaumoi:matkhaumoi
        },
        success:function(giatri) {
            $('#dmk_thongbao').text(giatri);
        }

    });
}

function ThemGioHang(masanpham,soluong)
{
    $.ajax({
        url:"ajax/ThemGioHang.php",
        type:"POST",
        data:{
            masanpham:masanpham,
            soluong:soluong
        },
        success:function(giatri) {
            $('.divgiohang').html(giatri);
        }

    });
}

function SuaGioHang(masanpham,soluong)
{
    $.ajax({
        url:"ajax/SuaGioHang.php",
        type:"POST",
        data:{
            masanpham:masanpham,
            soluong:soluong
        },
        success:function(giatri) {
            $('.in-check').html(giatri);
        }

    });
}

function XoaGioHang(masanpham)
{
    $.ajax({
        url:"ajax/XoaGioHang.php",
        type:"POST",
        data:{
            masanpham:masanpham
        },
        success:function(giatri) {
            $('.in-check').html(giatri);
        }

    });
}

function DanhGiaSP(masanpham,tendangnhap,noidung)
{
    $.ajax({
        url:"ajax/DanhGiaSP.php",
        type:"POST",
        data:{
            masanpham:masanpham,
            tendangnhap:tendangnhap,
            noidung:noidung
        },
        success:function(giatri) {
            alert(giatri);
            window.location="ChiTietSanPham.php?MaSP="+masanpham;
        }

    });
}

function XoaBinhLuan(mabinhluan,masanpham)
{
    $.ajax({
        url:"ajax/XoaBinhLuan.php",
        type:"POST",
        data:{
            mabinhluan:mabinhluan
        },
        success:function(giatri) {
            alert(giatri);
            window.location="ChiTietSanPham.php?MaSP="+masanpham;
        }

    });
}
function ChinhSuaBinhLuan(mabinhluan,masanpham,noidung)
{
    $.ajax({
        url:"ajax/ChinhSuaBinhLuan.php",
        type:"POST",
        data:{
            mabinhluan:mabinhluan,
            noidung:noidung
        },
        success:function(giatri) {
            alert(giatri);
            window.location="ChiTietSanPham.php?MaSP="+masanpham;
        }

    });
}
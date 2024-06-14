<?php
include "app/models/pdo.php";
$bn = load_all_banner();
$listdm = $listdm = loadAlldm();
$listsp = loadsp();
$listtt = loadAlltt();
$listbanner = load_all_banner();
if (isset($_GET["act"]) && ($_GET["act"] != "")) {
    switch ($_GET["act"]) {
        case "sanpham":
            if (isset($_POST['tukhoa']) && $_POST['tukhoa'] != "") {
                $tukhoa = $_POST['tukhoa'];
            } else {
                $tukhoa = "";
            }
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $iddanhmuc = $_GET['id'];
                // loadAll_sanpham($tukhoa = "", $iddanhmuc = 0);
                // $dsbt = loadsp_danhmuc($iddanhmuc);
            } else {
                $iddanhmuc = 0;
            }
            $listsp = loadAll_sanpham($tukhoa, $iddanhmuc);
            // $dsbt = loadsp_danhmuc($iddanhmuc);
            $tendm = load_ten_dm($iddanhmuc);
            // $dsbt = loadsp_danhmuc($iddanhmuc);
            include "app/views/Client/allsp.php";
            break;

        case "sanphamchitiet":
            if (isset($_GET["id"]) && $_GET["id"] > 0) {
                $id = $_GET["id"];
                $sp = loadOne_sanpham($id);
                extract($sp);
                $listsp = loadOne_sanpham_cungloai($id, $id_danh_muc);
                $listbl = load_all_binh_luan_where($id);
            }
            include "app/views/Client/sanphamchitiet.php";
            break;
        case "allsp":
            if (isset($_POST['tukhoa']) && $_POST['tukhoa'] != "") {
                $tukhoa = $_POST['tukhoa'];
            } else {
                $tukhoa = "";
            }
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $iddanhmuc = $_GET['id'];
                // loadAll_sanpham($tukhoa = "", $iddanhmuc = 0);
                // $dsbt = loadsp_danhmuc($iddanhmuc);
            } else {
                $iddanhmuc = 0;
            }
            $listsp = loadAll_sanpham($tukhoa, $iddanhmuc);
            include "app/views/Client/allsp.php";
            break;


        case "caoall_sp":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $iddanhmuc = $_GET['id'];
                // loadAll_sanpham($tukhoa = "", $iddanhmuc = 0);
                // $dsbt = loadsp_danhmuc($iddanhmuc);
            } else {
                $iddanhmuc = 0;
            }
            $listsp = loadsp_theo_giacao($iddanhmuc);
            include "app/views/Client/allsp.php";
            break;
        case "thapall_sp":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $iddanhmuc = $_GET['id'];
                // loadAll_sanpham($tukhoa = "", $iddanhmuc = 0);
                // $dsbt = loadsp_danhmuc($iddanhmuc);
            } else {
                $iddanhmuc = 0;
            }
            $listsp = loadsp_theo_giathap($iddanhmuc);
            include "app/views/Client/allsp.php";
            break;

            /////////////////////////
        case "cao":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $iddanhmuc = $_GET['id'];
                // loadAll_sanpham($tukhoa = "", $iddanhmuc = 0);
                // $dsbt = loadsp_danhmuc($iddanhmuc);
            } else {
                $iddanhmuc = 0;
            }
            $listsp = loadsp_theo_giacao($iddanhmuc);
            // Header("location: ?act=sanpham&id=$iddanhmuc");
            include "app/views/Client/sanpham.php";
            break;
        case "thap":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $iddanhmuc = $_GET['id'];
                // loadAll_sanpham($tukhoa = "", $iddanhmuc = 0);
                // $dsbt = loadsp_danhmuc($iddanhmuc);
            } else {
                $iddanhmuc = 0;
            }
            $listsp = loadsp_theo_giathap($iddanhmuc);
            include "app/views/Client/sanpham.php";
            break;
            /////////////////////////


        case "lienhe":
            if (isset($_POST['gui']) && $_POST['gui']) {
                $hoten = $_POST['hoten'];
                $email = $_POST['email'];
                $sdt = $_POST['sodienthoai'];
                $noidung = $_POST['noidung'];
                insert_lienhe($hoten, $email, $sdt, $noidung);

                $thongbao = "Gửi thông tin liên hệ thành công";
            }
            include "app/views/Client/lienhe.php";
            break;

        case "tintuc":
            $listtt = loadAlltt();
            $listdm = loadAlldm();
            $listsptt = loadAll_sanpham_tintuc();
            include "app/views/Client/tintuc.php";
            break;

        case "tintucchitiet":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $onett = loadOnett($id);
            }
            $listtt = load_tintuc();
            $listdm = loadAlldm();
            $listsptt = loadAll_sanpham_tintuc();
            include "app/views/Client/tintucchitiet.php";
            break;
        case "home":
            include "app/views/Client/home.php"; //////////////
            break;
        case "dangnhap":
            if (isset($_POST['dangnhap'])) {
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $mat_khau = $_POST['mat_khau'];
                $loginMess = dangnhap($ten_dang_nhap, $mat_khau);
                if (is_array($loginMess)) {
                    $_SESSION['ten_dang_nhap'] = $loginMess;
                    header("location:?act=home&success=true");
                    include "app/views/Client/home.php";
                } else {
                    $loginMess = "Thông tin tài khoản sai";
                    header("location:?act=dangnhap&error=true");
                }
            }
            include "app/views/Client/login/dangnhap.php";
            break;
        case "dangxuat":
            dangxuat();
            $_SESSION['mycart'] = [];
            include "app/views/Client/home.php";
            break;

        case "dangky":
            if (isset($_POST['dangky'])) {
                $tendangnhap = $_POST['tendangnhap'];
                $matkhau = $_POST['matkhau'];
                $hoten = $_POST['hoten'];
                $hinhanh = $_FILES['hinhanh']['name'];
                $target_dir = "app/upload/";
                $target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);
                if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file)) {
                    // echo "Thêm ảnh thành công";
                } else {
                    echo "Không thêm được ảnh";
                }
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $sdt = $_POST['sdt'];
                insert_tkusser($tendangnhap, $matkhau, $hoten, $hinhanh, $email, $sdt, $diachi);
                $thongbao = "Đã đăng kí thành công";
                header("location:?act=dangnhap&success=true");
                // include "app/views/Client/login/dangnhap.php";
                break;
            }
            include "app/views/Client/login/dangky.php";
            break;

        case "capnhat":
            if (isset($_POST["capnhat"])) {
                $id = $_POST['id'];
                $tendangnhap = $_POST['tendangnhap'];
                $hoten = $_POST['hoten'];
                $hinhanh = $_FILES['hinhanh']['name'];
                $target_dir = "app/upload/";
                $target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);
                if (move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file)) {
                    echo "Thêm ảnh thành công";
                } else {
                    echo "Không thêm được ảnh";
                }
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $sdt = $_POST['sdt'];
                update_client($id, $tendangnhap, $hoten, $hinhanh, $email, $sdt, $diachi);
                $thongbao = "Cập nhật thành công";
            }
            header("location:?act=taikhoan&update_success=true");
            // include "app/views/Client/login/dangnhap.php";
            break;


        case "quenmk":
            if (isset($_POST['xacnhan'])) {
                $email = $_POST['email'];
                $checkemail = check_email($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['mat_khau'];
                } else {
                    $thongbao = "Email này không tồn tại";
                }
            }
            include "app/views/Client/login/quenmk.php";
            break;

        case "addtocart":
            if (isset($_POST["addtocart"]) && ($_POST["addtocart"])) {
                $id_san_pham = $_POST["id_san_pham"];
                $ten_san_pham = $_POST["ten_san_pham"];
                $img = $_POST["img"];
                $dung_luong = $_POST['dung_luong'];
                $gia = $_POST['gia'];
                $soluong = $_POST['soluong'];
                $thanhtien = intval($soluong) * intval($gia);

                $fl = 0;
                for ($i = 0; $i < sizeof($_SESSION['mycart']); $i++) {
                    if ($_SESSION['mycart'][$i][1] == $ten_san_pham) {
                        $fl = 1;
                        $so_luong_new = intval($soluong) + $_SESSION['mycart'][$i][5];
                        $_SESSION['mycart'][$i][5] = $so_luong_new;
                        break;
                    }
                }
                if ($fl == 0) {
                    $spadd = [$id_san_pham, $ten_san_pham, $img, $dung_luong, $gia, $soluong, $thanhtien];
                    array_push($_SESSION['mycart'], $spadd);
                }
            }
            include 'app/views/Client/cart/viewcart.php';
            break;

        case 'delcart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header('Location: index.php?act=viewcart');
            break;
        case 'viewcart':
            include 'app/views/Client/cart/viewcart.php';
            break;
        case 'bill':
            include 'app/views/Client/cart/bill.php';
            break;

        case 'thanhtoan':
            if (isset($_POST['thanhtoan']) && ($_POST['thanhtoan'])) {
                if (isset($_SESSION['ten_dang_nhap'])) $id_tai_khoan = $_SESSION['ten_dang_nhap']['id_tai_khoan'];
                $hoten = $_POST['hoten'];
                $sdt = $_POST['sdt'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $pttt = $_POST['pttt'];
                $ngaydathang = date('h:i:sa d/m/Y');
                $tongdondat =  $_POST['giamgiam'];

                $id_hoa_don = insert_hoadon($id_tai_khoan, $hoten, $sdt, $email, $diachi, $pttt, $ngaydathang, $tongdondat);

                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($_SESSION['ten_dang_nhap']['id_tai_khoan'], $cart[0], $cart[2], $cart[1], $cart[4], $cart[3], $cart[5], $cart[6], $id_hoa_don);
                }
                $_SESSION['mycart'] = [];
            }
            $hoadon = loadone_hoadon($id_hoa_don);
            $listhd = loadone_cart($id_hoa_don);
            include 'app/views/Client/cart/thanhtoan.php';
            break;

        case "taikhoan":
            if (isset($_SESSION['ten_dang_nhap'])) {
                $listhoadon = loadall_hoadon($_SESSION['ten_dang_nhap']['id_tai_khoan']);
            }
            include "app/views/Client/taikhoan.php";
            break;
        case "addbl":
            if (isset($_POST['gui']) && ($_POST['gui'])) {
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $danh_gia = $_POST['danh_gia'];
                $noi_dung = $_POST['noi_dung'];
                $ngay_binh_luan = date('h:i:sa d/m/Y');
                $id_san_pham = $_POST['id_san_pham'];
                $id_tai_khoan = $_POST['id_tai_khoan'];
                insert_binhluan($ten_dang_nhap, $danh_gia, $noi_dung, $ngay_binh_luan, $id_san_pham, $id_tai_khoan);
            }
            Header("location: ?act=sanphamchitiet&id=$id_san_pham");
            exit;
            break;
        case "donhang":
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $hd = load_one_hoa_don($id);
                $listsp = loadone_cart($id);
            }
            include "app/views/Client/cart/donhang.php";
            break;
        case "xoabl":
            if (isset($_GET["id"]) && $_GET["id"] > 0) {

                $id = $_GET["id"];
                delete_bl($id);
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            break;

        case 'xoahd':
            if (isset($_GET["id"]) && $_GET["id"] > 0) {
                $id = $_GET["id"];
                delete_hd($id);
            }
            $listhoadon = loadall_hoadon($_SESSION['ten_dang_nhap']['id_tai_khoan']);
            include "app/views/Client/taikhoan.php";
            break;
    }
} else {
    include "app/views/Client/home.php";
}

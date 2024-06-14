<?php
if (isset($hd) && is_array($hd)) {
    extract($hd);
}

?>
<div class="header_bottom bottom_four sticky-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="main_menu header_position">
                    <nav>
                        <ul>
                            <li><a href="index.php">Trang chủ</a>
                            <li><a href="#">Danh Mục<i class="fa fa-angle-down"></i></a>
                                <ul class="sub_menu pages">
                                    <?php foreach ($listdm as $dm) : ?>
                                        <li class="mega_items"><a href="index.php?act=sanpham&id=<?php echo $dm['id_danh_muc'] ?>"><?php echo $dm['ten_danh_muc'] ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>

                            <li><a href="index.php?act=allsp">Sản Phẩm</a></li>
                            <li><a href="index.php?act=tintuc">Tin Tức</a>
                            </li>
                            </li>
                            <li><a href="index.php?act=lienhe"> Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="index.php">Trang Chủ</a></li>
                        <li><a href="index.php?act=taikhoan">Tài Khoản</a></li>
                        <li>Đơn Hàng của tôi</li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--shopping cart area start -->
<div class="wishlist_area mt-30">
    <div class="container">
        <form action="#">
            <div class="coupon_area">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="coupon_code right">
                            <h3>Thông tin đơn hàng</h3>
                            <div class="row invoice-info">

                                <div class="col-sm-6 invoice-col">
                                    Người Gửi
                                    <address>
                                        <strong>H2L Mobile</strong><br>
                                        Số 14, Ngõ 94 Hồ Tùng Mậu<br>
                                        Cầu Giấy, Hà Nội<br>
                                        Số Điện Thoại: 0917555305<br>
                                        Email: hhai03@gmail.com
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-6 invoice-col">
                                    Người Nhận
                                    <address>
                                        <strong><?php echo $hd['ho_ten'] ?></strong><br>
                                        <?php echo $hd['dia_chi'] ?><br>

                                        Số Điện Thoại: <?php echo $hd['sdt'] ?><br>
                                        Email: <?php echo $hd['email'] ?><br>
                                    </address>
                                </div>
                                <!-- /.col -->

                                <!-- /.col -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table_desc wishlist">
                        <div class="cart_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product_thumb">Hình Ảnh</th>
                                        <th class="product_name">Tên sản phẩm</th>
                                        <th class="product_name">Phiên bản</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product_quantity">Số lượng</th>
                                        <th class="product-price">Thành Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listsp as $sp) :
                                        extract($sp);
                                    ?>
                                        <tr>

                                            <td class="product_thumb"><a href="#"><img style="width: 100px; object-fit: contain;" src="app/upload/<?= $img ?>" alt=""></a></td>
                                            <td class="product_name"><a href="#"><?= $ten_san_pham ?></a></td>
                                            <td class="product_name"><a href="#"><?= $dung_luong ?></a></td>
                                            <td class="product-price"><?= number_format($gia, 0, ',', '.') ?>VNĐ</td>
                                            <td class="product_quantity"><a href="#"><?= $soluong ?></a></a></td>
                                            <td class="product-price"><?= number_format($thanh_tien, 0, ',', '.') ?>VNĐ</td>
                                            

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-12">
                <div class="wishlist_share">
                    <h4>Share on:</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                        <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
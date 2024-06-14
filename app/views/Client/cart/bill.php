<script>
    <?php $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $thanhtien = intval($cart[4]) * $cart[5];
        $tong = $tong + $thanhtien;
    } ?>
    <?php
    $km = loadAllkm();
    foreach ($km as $key) {
    ?>

        $(document).ready(function() {
            $("#Apma").click(function() {

                var apma = $("#sale").val();
                if (apma == '<?php echo $key['ma_khuyen_mai'] ?>') {
                    <?php $sale = intval($tong) * (100 - intval($key['phan_tram_khuyen_mai'])) / 100; ?>
                    $("#tongtien").html("<?php echo number_format($sale, 0, ',', '.') ?> VND");
                    $("#giamgiam").val(<?php echo $sale; ?>);
                    $("#makm").html("<?php echo $key['ma_khuyen_mai'] ?>");
                    $("#ptgiam").html("<?php echo number_format($tong - $sale, 0, ',', '.') ?> VND");
                }

            })

        })



    <?php } ?>
</script>


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
                                    <?php

                                    foreach ($listdm as $dm) : ?>
                                        <li class="mega_items"><a href="index.php?act=sanpham&id=<?php echo $dm['id_danh_muc'] ?>"><?php echo $dm['ten_danh_muc'] ?></a>
                                        </li>
                                    <?php endforeach;  ?>
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
                        <li><a href="index.php?act=viewcart">Giỏ Hàng</a></li>
                        <li>Thông Tin Đơn Hàng</li>
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
        <form action="index.php?act=thanhtoan" method="POST">
            <div class="coupon_area">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="coupon_code right">
                            <h3>Thông tin khách hàng</h3>
                            <div class="card-body">
                                <?php
                                if (isset($_SESSION['ten_dang_nhap']) && is_array($_SESSION['ten_dang_nhap'])) {
                                    extract($_SESSION['ten_dang_nhap']); ?>
                                    <div class="form-group">
                                        <label for="inputEstimatedBudget">Tên Khách Hàng</label>
                                        <input type="text" id="inputEstimatedBudget" value="<?php echo $ho_ten ?>" name="hoten" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSpentBudget">Số Điện Thoại</label>
                                        <input type="text" id="inputSpentBudget" value="<?php echo $sdt ?>" name="sdt" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEstimatedDuration">Email</label>
                                        <input type="email" id="inputEstimatedDuration" value="<?php echo $email ?>" name="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEstimatedDuration">Địa Chỉ</label>
                                        <input type="text" id="inputEstimatedDuration" value="<?php echo $dia_chi ?>" name="diachi" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <p></p>
                                        <label for="inputEstimatedDuration">Phương Thức Thanh Toán</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="pttt" id="customRadio1" value="1" checked>
                                            <label for="customRadio1" class="custom-control-label">Thanh toán khi nhận hàng</label>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="form-group">
                                        <label for="inputEstimatedBudget">Tên Khách Hàng</label>
                                        <input type="text" id="inputEstimatedBudget" value="" name="hoten" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSpentBudget">Số Điện Thoại</label>
                                        <input type="text" id="inputSpentBudget" value="" name="sdt" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEstimatedDuration">Email</label>
                                        <input type="email" id="inputEstimatedDuration" value="" name="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEstimatedDuration">Địa Chỉ</label>
                                        <input type="text" id="inputEstimatedDuration" value="" name="diachi" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <p></p>
                                        <label for="inputEstimatedDuration">Phương Thức Thanh Toán</label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="pttt" id="customRadio1" value="1" checked>
                                            <label for="customRadio1" class="custom-control-label">Thanh toán khi nhận hàng</label>
                                        </div>
                                    </div>

                                <?php
                                }
                                ?>
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
                                    <input type="hidden" name="giamgiam" id="giamgiam" value="<?= $tong ?>">

                                    <?php

                                    $i = 0;
                                    foreach ($_SESSION['mycart'] as $cart) {
                                    ?>
                                        <tr>

                                            <td class="product_thumb"><a href="#"><img style="width: 100px; object-fit: contain;" src="app/upload/<?= $cart[2] ?>" alt=""></a></td>
                                            <td class="product_name"><a href="#"><?= $cart[1] ?></a></td>
                                            <td class="product_name"><a href="#"><?= $cart[3] ?></a></td>
                                            <td class="product-price"><?= number_format($cart[4], 0, ',', '.') ?>VNĐ</td>
                                            <td class="product_quantity"><a href="#"><?= $cart[5] ?></a></a></td>

                                            <td class="product-price"><?= number_format($cart[6], 0, ',', '.') ?>VNĐ</td>

                                        </tr>
                                        <?php
                                        $i += 1;      ?>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="coupon_area">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code left">
                            <h3>Mã Khuyến Mãi</h3>
                            <div class="coupon_inner">
                                <p>Vui lòng Nhập Mã Khuyến Mại</p>
                                <input name=giamgia id="sale" placeholder="Nhập..." type="text">
                                <button id="Apma" type="button">Sử dụng</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right">
                            <h3>Tổng Đơn Hàng</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Thành Tiền</p>
                                    <p class="cart_amount"><?= number_format($tong, 0, ',', '.') ?>VNĐ</p>
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Mã Khuyến Mại</p>
                                    <p class="cart_amount" id="makm">Chưa có mã khuyến mại</p>
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Giá Trị</p>
                                    <a id="ptgiam"></a>
                                </div>
                                <div class="cart_subtotal">
                                    <p>Tổng tiền</p>
                                    <p class="cart_amount" id="tongtien"><?= number_format($tong, 0, ',', '.') ?>VNĐ</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="checkout_btn">
                <input style="margin-bottom: 30px;" class="btn btn-warning" name="thanhtoan" type="submit" value="Thanh Toán"></a>

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
<script>
    function thanhToan() {
        swal("Mua hàng thành công!", "chào mừng bạn đến với tư bản", "success");
    }
</script>
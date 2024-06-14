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
                        <li>Sản Phẩm </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!--shop  area start-->
<div class="shop_area shop_fullwidth">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--shop wrapper start-->
                <!--shop toolbar start-->
                <div class="shop_title">
                    <h1 style="margin-bottom: 40px;">Sản Phẩm</h1>
                </div>
                <div style="margin-bottom: 30px;">
                    <a class="loc" href="index.php?act=caoall_sp">Theo giá: Cao - Thấp</a>

                    <a class="loc" href="index.php?act=thapall_sp">Theo giá: Thấp - Cao</a>

                    <!--shop toolbar end-->

                    <div style="margin-top: 30px;" class="row shop_wrapper">
                        <?php
                        foreach ($listsp as $sp) :
                            extract($sp); ?>
                            <div class="col-lg-3 col-md-4 col-12 ">
                                <div class="single_product">
                                    <div class="product_name grid_name">
                                        <h3><a href="index.php?act=sanphamchitiet&id=<?php echo $sp['id_san_pham'] ?>"><?php echo $sp['ten_san_pham'] ?></a></h3>

                                    </div>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="index.php?act=sanphamchitiet&id=<?php echo $sp['id_san_pham'] ?>"><img src="app/upload/<?php echo $sp['img'] ?>" alt=""></a>
                                        <div class="label_product">
                                            <span class="label_sale">-47%</span>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_content grid_content">
                                        <div class="content_inner">
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product_footer d-flex align-items-center">
                                                <div class="price_box">
                                                    <span class="current_price"><?= number_format($gia, 0, ',', '.') ?>VNĐ</span>
                                                    <span class="old_price"><?= number_format($gia_sale, 0, ',', '.') ?>VNĐ</span>
                                                </div>
                                                <div style="margin-left: 35px;" class="add_to_cart">
                                                    <form action="index.php?act=addtocart" method="POST">
                                                        <input type="hidden" name="id_san_pham" value="<?php echo $sp['id_san_pham'] ?>">
                                                        <input type="hidden" name="ten_san_pham" value="<?php echo $sp['ten_san_pham'] ?>">
                                                        <input type="hidden" name="img" value="<?php echo $sp['img'] ?>">
                                                        <input type="hidden" name="dung_luong" value="<?php echo $sp['dung_luong'] ?>">
                                                        <input type="hidden" name="gia" value="<?php echo $sp['gia'] ?>">
                                                        <input style="width:35px;font-size:10px; height: 25px;" min="1" max="10" name="soluong" value="1" type="number">
                                                        <input type="submit" class="dathang" name="addtocart" value="Thêm">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>


                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
                                <li class="current">1</li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next"><a href="#">next</a></li>
                                <li><a href="#">>></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
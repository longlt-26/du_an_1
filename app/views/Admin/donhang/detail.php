<?php
if (isset($hd) && is_array($hd)) {
  extract($hd);
}

?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Đơn Hàng</h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="invoice p-3 mb-3">
      <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h4>
            <i class="fas fa-globe"></i> Hóa đơn chi tiết
          </h4>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">

        <div class="col-sm-6 invoice-col">
          Từ
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
          Đến
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
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Mã Sản Phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Phiên Bản</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành Tiền</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listsp as $sp) :
                extract($sp);
              ?>
                <tr>
                  <td>Sp_<?= $id_san_pham ?></td>
                  <td><?= $ten_san_pham ?></td>
                  <td><img style="width: 150px; object-fit: contain;" src="../../upload/<?= $img ?>" alt=""></td>
                  <td><?= $dung_luong ?></td>
                  <td><?= number_format($gia, 0, ',', '.') ?>VND</td>
                  <td><?= $soluong ?></td>
                  <td><?= number_format($thanh_tien, 0, ',', '.') ?>VND</td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-6">
          <p class="lead">Payment Methods:</p>
          <img src="../../../public/images/credit/visa.png" alt="Visa">
          <img src="../../../public/images/credit/mastercard.png" alt="Mastercard">
          <img src="../../../public/images/credit/american-express.png" alt="American Express">
          <img src="../../../public/images/credit/paypal2.png" alt="Paypal">
        </div>
        <!-- /.col -->
        <div class="col-6">


          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Phương Thức Thanh Toán:</th>
                <td>Thanh toán khi nhận hàng</td>
              </tr>
              <tr>
                <th>Mã giảm giá:</th>
                <td>0%</td>
              </tr>
              <tr>
                <th>Tổng tiền:</th>

                <td><?= number_format($tong_tien, 0, ',', '.') ?>VND</td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-12">
          <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
          <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
            Payment
          </button>
          <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
            <i class="fas fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </div>
    <!-- /.col -->
</div>
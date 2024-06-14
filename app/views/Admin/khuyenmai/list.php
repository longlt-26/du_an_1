<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Khuyến Mại</h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Danh sách Khuyến mại</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Mã khuyến mại</th>
                    <th>Giá trị khuyến mại</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Mô tả</th>
                    <th>Trạng thái</th>
                    <th>Chọn</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($listkhuyenmai as $khuyenmai): ?>
                    
                  <tr>
                    <td> <?php echo $khuyenmai['id_khuyen_mai'];?></td>
                    <td> <?php echo $khuyenmai['ma_khuyen_mai'];?></td>
                    <td><?php echo $khuyenmai['phan_tram_khuyen_mai'];?> </td>
                    <td> <?php echo $khuyenmai['ngay_bat_dau']; ?></td>
                    <td><?php echo $khuyenmai['ngay_ket_thuc']; ?></td>
                    <td><?php echo $khuyenmai['mo_ta'];?></td>
                    <td><?php echo  $khuyenmai['trang_thai'];?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-outline-secondary" href="index.php?act=suakm&id=<?php echo $khuyenmai['id_khuyen_mai']; ?>" role="button">Sửa</a>
                        <a class="btn btn-outline-danger" href="index.php?act=xoakm&id=<?php echo $khuyenmai['id_khuyen_mai'];?> " role="button">Xóa</a>

                      </div>
                    </td>
                  </tr>
                  <?php endforeach; ?>

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
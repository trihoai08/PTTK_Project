<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= $title ?></title>
  <!-- css -->
  <?php $this->load->view('backend/include/base_css'); ?>
</head>

<body id="page-top">
  <!-- Navbar -->
  <?php $this->load->view('backend/include/base_nav'); ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Mã Đặt Vé [<?= $tiket[0]['kd_order']; ?>]</h6>
      </div>
      <div class="card-body">
        <form action="<?= base_url().'backend/order/inserttiket' ?>" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <?php foreach ($tiket as $row) { ?>
              <input type="hidden" class="form-control" name="kd_pelanggan" value="<?= $row['kd_pelanggan'] ?>" readonly>
              <input type="hidden" class="form-control" name="kd_order" value="<?= $row['kd_order'] ?>" readonly>
              <input type="hidden" class="form-control" name="asal_beli" value="<?= $row['asal_order'] ?>" readonly>
              <input type="hidden" class="form-control" name="kd_tiket[]" value="<?= $row['kd_tiket'] ?>" readonly>
              <div class="col-sm-6">
                <label>Mã Vé <b><?= $row['kd_tiket'] ?></b></label>
                <p>Tên Khách Hàng <b><?= $row['nama_order']; ?></b></p>
                <hr>
                <div class="row form-group">
                  <label for="nama" class="col-sm-4 control-label">Mã Lịch Trình</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="kd_jadwal" value="<?= $row['kd_jadwal'] ?>" readonly>
                  </div>
                </div>
                <div class="row form-group">
                  <label for="nama" class="col-sm-4 control-label">Tên Hành Khách</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama[]" value="<?= $row['nama_kursi_order'] ?>" readonly>
                  </div>
                </div>
                <div class="row form-group">
                  <label for="" class="col-sm-4 control-label">Số Ghế</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="no_kursi[]" value="<?= $row['no_kursi_order'] ?>" readonly>
                  </div>
                </div>
                <div class="row form-group">
                  <label for="" class="col-sm-4 control-label">Tuổi Hành Khách</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="umur_kursi[]>" value="<?= $row['umur_kursi_order'] ?> Tuổi" readonly>
                  </div>
                </div>
                <div class="row form-group">
                  <label for="" class="col-sm-4 control-label">Giá Vé</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="harga" value="<?php echo $row['harga_jadwal']; ?>" readonly>
                  </div>
                </div>
                <div class="row form-group">
                  <label for="" class="col-sm-4 control-label">Hạn Thanh Toán</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="tgl_beli" value="<?= hari_indo(date('N', strtotime($row['expired_order']))).', '.tanggal_indo(date('Y-m-d', strtotime($row['expired_order']))).', '.date('H:i', strtotime($row['expired_order'])); ?>" readonly>
                  </div>
                </div>
              </div>
              <?php } ?>
              <div class="col-sm-6">
                <div class="row form-group">
                  <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">Kiểm Tra Xác Nhận Thanh Toán!!</h4>
                    <p>Bạn có thể kiểm tra xác nhận thanh toán của khách hàng tại đây. Nhấn nút "Xem" để kiểm tra bằng chứng thanh toán.</p>
                    <hr>
                    <p class="mb-0">
                      <a href="<?= base_url('backend/konfirmasi/viewkonfirmasi/'.$tiket[0]['kd_order']) ?>" class="btn btn-success">Xem</a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row form-group">
                  <label for="" class="col-sm-4 control-label">Trạng Thái</label>
                  <div class="col-sm-8">
                    <?php if ($tiket[0]['status_order'] == '1') { ?>
                    <select class="form-control" name="status" required>
                      <option value='' selected disabled>Chưa Thanh Toán</option>
                      <option value='2'>Đã Thanh Toán</option>
                      <option value='3'>Hủy Đặt Vé</option>
                    </select>
                    <?php } elseif($tiket[0]['status_order'] == '2') { ?>
                    <p class="btn"><b class="btn btn-outline-success">Đã Thanh Toán</b></p>
                    <?php } else { ?>
                    <p class="btn"><b class="btn btn-outline-warning">Đã Hủy</b></p>
                    <?php }?>
                  </div>
                </div>
                <div class="row form-group">
                  <label for="" class="col-sm-4 control-label">Tổng Thanh Toán</label>
                  <div class="col-sm-8">
                    <p><b>$<?php $total = count($tiket) * $tiket[0]['harga_jadwal']; echo number_format($total) ?></b></p>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <a class="btn btn-danger float-left" href="<?= base_url().'backend/order' ?>">Quay Lại</a>
            <?php if ($tiket[0]['status_order'] == '1') { ?>
            <button type="submit" class="btn btn-success">Xác Nhận</button>
            <?php } elseif($tiket[0]['status_order'] == '3') { ?>
            <p><b>Đã Hủy Vé</b></p>
            <?php } else { ?>
            <a class="btn btn-primary float-right" href="<?= base_url('assets/backend/upload/etiket/'.$row['kd_order'].'.pdf') ?>" target="_blank">In Vé Điện Tử</a>
            <?php } ?>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php $this->load->view('backend/include/base_footer'); ?>
  <!-- js -->
  <?php $this->load->view('backend/include/base_js'); ?>
</body>

</html>

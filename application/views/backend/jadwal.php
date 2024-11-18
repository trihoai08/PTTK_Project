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
    <!-- navbar -->
    <?php $this->load->view('backend/include/base_nav'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <h1 class="h5 text-gray-800">Quản Lý Lịch Trình</h1>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <a href="<?= base_url('backend/jadwal/tambahjadwal') ?>" class="btn btn-success pull-right">
          Thêm Lịch Trình
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Mã Lịch Trình</th>
                  <th>Điểm Khởi Hành</th>
                  <th>Điểm Đến</th>
                  <th>Thời Gian Khởi Hành</th>
                  <th>Thời Gian Đến</th>
                  <th>Giá Vé</th>
                  <th>Hành Động</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; foreach ($jadwal as $row) { ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= $row['kd_jadwal']; ?></td>
                  <td><?= strtoupper($row['kota_tujuan']); ?></td>
                  <td><?= strtoupper($row['wilayah_jadwal']); ?></td>
                  <td><?= date('H:i', strtotime($row['jam_berangkat_jadwal'])); ?></td>
                  <td><?= date('H:i', strtotime($row['jam_tiba_jadwal'])); ?></td>
                  <td><?= number_format((float)($row['harga_jadwal']), 0, ",", "."); ?> VNĐ</td>
                  <td>
                    <a href="<?= base_url('backend/jadwal/viewjadwal/'.$row['kd_jadwal']) ?>" class="btn btn-info">Xem Chi Tiết</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Footer -->
<?php $this->load->view('backend/include/base_footer'); ?>
<!-- End of Footer -->
<!-- js -->
<?php $this->load->view('backend/include/base_js'); ?>
</body>
</html>

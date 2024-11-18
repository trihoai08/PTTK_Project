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
    <!-- Bắt đầu Nội dung Trang -->
    <div class="container-fluid">
      <!-- Bảng Dữ Liệu -->
      <!-- Log on to codeastro.com for more projects -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h1 class="h5 text-gray-800">Danh Sách Khách Hàng</h1>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Mã Khách Hàng</th>
                  <th>Số CMND/CCCD</th>
                  <th>Họ Tên</th>
                  <th>Địa Chỉ</th>
                  <th>Email</th>
                  <th>Số Điện Thoại</th>
                  <!-- <th>Hành Động</th> -->
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; foreach ($pelanggan as $row) { ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['kd_pelanggan']; ?></td>
                    <td><?= $row['no_ktp_pelanggan']; ?></td>
                    <td><?= $row['nama_pelanggan']; ?></td>
                    <td><?= $row['alamat_pelanggan']; ?></td>
                    <td><?= $row['email_pelanggan']; ?></td>
                    <td><?= $row['telpon_pelanggan']; ?></td>
                    <!-- <td><a href="<?= base_url('backend/home/viewpelanggan/'.$row['kd_pelanggan']) ?>" class="btn btn-info">Xem</a></td> -->
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Kết thúc Nội dung -->
  </div>
  <!-- Kết thúc Nội dung Trang -->
</div>
<!-- Kết thúc Content Wrapper -->
<!-- Footer -->
<?php $this->load->view('backend/include/base_footer'); ?>
<!-- Kết thúc Footer -->
<!-- Cuộn Lên -->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>
<!-- js -->
<?php $this->load->view('backend/include/base_js'); ?>
</body>
</html>

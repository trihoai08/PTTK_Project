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
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h1 class="h5 text-gray-800">Danh Sách Đặt Vé</h1>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Mã Đặt Vé</th>
                  <th>Mã Lịch Trình</th>
                  <th>Ngày Khởi Hành</th>
                  <th>Khách Hàng</th>
                  <th>Ngày Mua</th>
                  <th>Số Lượng Vé</th>
                  <th>Trạng Thái</th>
                  <th>Hành Động</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; foreach ($order as $row) { ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['kd_order']; ?></td>
                    <td><?= $row['kd_jadwal']; ?></td>
                    <td><?= hari_indo(date('N', strtotime($row['tgl_berangkat_order']))).', '.tanggal_indo(date('Y-m-d', strtotime(''.$row['tgl_berangkat_order'].'')));?></td>
                    <td><?= $row['nama_order']; ?></td>
                    <td><?= $row['tgl_beli_order']; ?></td>
                    <?php $sqlcek = $this->db->query("SELECT * FROM tbl_order WHERE kd_order LIKE '".$row['kd_order']."'")->result_array(); ?>
                    <td><?= count($sqlcek); ?></td>
                    <?php if ($row['status_order'] == '1') { ?>
                          <td class="btn-danger"> Chưa Thanh Toán</td> 
                          <?php } elseif($row['status_order'] == '2') { ?>
                          <td class="btn-success"> Đã Thanh Toán</td>
                        <?php } else { ?>
                          <td class="btn-warning"> Đã Hủy</td>
                          <?php } ?>
                    <td><a href="<?= base_url('backend/order/vieworder/'.$row['kd_order']) ?>" class="btn btn-info">Xem</a></td>
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

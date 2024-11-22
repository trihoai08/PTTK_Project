<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Quản lý xe</title>
    <!-- css -->
    <?php $this->load->view('backend/include/base_css'); ?>
  </head>
  <body id="page-top">
    <!-- navbar -->
    <?php $this->load->view('backend/include/base_nav'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <h1 class="h5 text-gray-800">Quản lý xe</h1>
      <!-- DataTales Example -->
      <!-- Log on to codeastro.com for more projects -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#ModalTujuan">
          Thêm xe
          </button>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Mã xe</th>
                  <th>Tên xe</th>
                  <th>Bus Plate</th>
                  <th>Số ghế</th>
                  <th>Trạng thái</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1 ; foreach ($bus as $row ) { ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= strtoupper($row['kd_bus']); ?></td>
                  <td><?= strtoupper($row['nama_bus']); ?></td>
                  <td><?= strtoupper($row['plat_bus']); ?></td>
                  <td><?= $row['kapasitas_bus'] ?></td>
                  <?php if ($row['status_bus'] == '1') { ?>
                    <td class="btn-success"> Hoạt động</td> 
                    <?php } else { ?>
                    <td class="btn-danger">Không hoạt động</td>
                  <?php } ?>
                  <td align="center"><a href="<?= base_url('backend/bus/viewbus/'.$row['kd_bus'])?>" class="btn btn btn-info">Xem</a></a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Footer --><!-- Log on to codeastro.com for more projects -->
<?php $this->load->view('backend/include/base_footer'); ?>
<!-- End of Footer -->
<!-- Modal -->
<div class="modal fade" id="ModalTujuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Thêm xe</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form action="<?= base_url()?>backend/bus/tambahbus" method="post">
      <div class="form-group">
        <label for="platbus" class="">Tên xe</label>
        <input type="text" class="form-control" name="nama_bus" placeholder="Tên xe">
      </div>
      <div class="form-group">
        <label for="platbus" class="">Bus Number Plate</label>
        <input type="text" class="form-control" name="plat_bus" placeholder="Bus Plate">
      </div>
      <div class="form-group">
        <label for="seat" class="">Số ghế (Max.23)</label>
        <input type="number" class="form-control" id="seat" name="seat" placeholder="[Maximum 23]">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        <button class="btn btn-success">Lưu</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
<!-- js -->
<?php $this->load->view('backend/include/base_js'); ?>
</body>
</html>
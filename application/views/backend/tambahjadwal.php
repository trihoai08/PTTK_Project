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
    <link rel="stylesheet" href="<?= base_url('assets/frontend/timepicker') ?>/css/bootstrap-material-datetimepicker.css" />
    <?php $this->load->view('backend/include/base_css'); ?>
  </head>
  <body id="page-top">
    <!-- navbar -->
    <?php $this->load->view('backend/include/base_nav'); ?>
    <!-- Bắt đầu Nội dung Trang -->
    <div class="container-fluid">
      <!-- Thêm Lịch Trình -->
      <!-- Log on to codeastro.com for more projects -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Thêm Lịch Trình</h6>
        </div>
        <div class="card-body">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <form action="<?= base_url()?>backend/jadwal/tambahjadwal" method="post">
                  <div class="form-group">
                    <label class="">Điểm Xuất Phát</label>
                    <select class="form-control" name="asal" required>
                      <option value="" selected disabled="">-Chọn Điểm Xuất Phát-</option>
                      <?php foreach ($tujuan as $row ) { ?>
                      <option value="<?= $row['kd_tujuan'] ?>" ><?= strtoupper($row['kota_tujuan'])." - ".$row['terminal_tujuan']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="">Điểm Đến</label>
                    <select class="form-control" name="tujuan" required>
                      <option value="" selected disabled="">-Chọn Điểm Đến-</option>
                      <?php foreach ($tujuan as $row ) { ?>
                      <option value="<?= $row['kd_tujuan'] ?>" ><?= strtoupper($row['kota_tujuan'])." - ".$row['terminal_tujuan']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label  class="">Xe</label>
                    <select class="form-control" name="bus">
                      <option value="" selected disabled="">-Chọn Xe-</option>
                      <?php foreach ($bus as $row ) { ?>
                      <option value="<?= $row['kd_bus'] ?>" >
                        <?= strtoupper($row['nama_bus']); ?> -<?php if ($row['status_bus'] == '1') { ?>
                        Hoạt Động
                        <?php } else { ?>
                        Không Hoạt Động
                      <?php } ?>- 
                      </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label  class="">Giờ Khởi Hành</label>
                    <input type="text" class="form-control"  id="time" name="berangkat" required="" placeholder="Giờ Khởi Hành">
                  </div>
                  <div class="form-group">
                    <label  class="">Giờ Đến</label>
                    <input type="text" class="form-control"  id="time2" name="tiba" required="" placeholder="Giờ Đến">
                  </div>
                  <div class="form-group">
                    <label  class="">Giá Vé</label>
                    <input type="number" class="form-control" name="harga" required="" placeholder="Giá Vé">
                    <?= form_error('name'),'<small class="text-danger pl-3">','</small>'; ?>
                  </div>
                </div>
              </div>
              <hr>
              <a class="btn btn-danger" href="javascript:history.back()"> Quay Lại</a>
              <input  type="submit" class="btn btn-success pull-rigth" value="Thêm Lịch Trình">
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Kết thúc Nội dung -->
    <!-- Footer -->
    <?php $this->load->view('backend/include/base_footer'); ?>
    <!-- Kết thúc Footer -->
    <!-- js -->
        <?php $this->load->view('backend/include/base_js'); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js"></script>
        <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
        <script type="text/javascript" src="<?= base_url('assets/frontend/timepicker') ?>/js/bootstrap-material-datetimepicker.js"></script>
        <script type="text/javascript">
          $(document).ready(function()
          {
            $('#time').bootstrapMaterialDatePicker
            ({
              date: false,
              shortTime: false,
              format: 'HH:mm'
            });
          })
        </script>
        <script type="text/javascript">
          $(document).ready(function()
          {
            $('#time2').bootstrapMaterialDatePicker
            ({
              date: false,
              shortTime: false,
              format: 'HH:mm'
            });
          })
        </script>

      </body>
    </html>

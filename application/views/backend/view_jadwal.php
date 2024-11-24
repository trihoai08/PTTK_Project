<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= $title ?></title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    #myImg {
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
    }

    #myImg:hover {
      opacity: 0.7;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      padding-top: 100px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.9);
    }

    .modal-content {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
    }

    #caption {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
      text-align: center;
      color: #ccc;
      padding: 10px 0;
      height: 150px;
    }

    .modal-content,
    #caption {
      animation-name: zoom;
      animation-duration: 0.6s;
    }

    @keyframes zoom {
      from {
        transform: scale(0)
      }

      to {
        transform: scale(1)
      }
    }

    .close {
      position: absolute;
      top: 15px;
      right: 35px;
      color: #f1f1f1;
      font-size: 40px;
      font-weight: bold;
      transition: 0.3s;
    }

    .close:hover,
    .close:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
    }

    @media only screen and (max-width: 700px) {
      .modal-content {
        width: 100%;
      }
    }
  </style>
  <!-- css -->
  <?php $this->load->view('backend/include/base_css'); ?>
</head>

<body id="page-top">
  <!-- Navbar -->
  <?php $this->load->view('backend/include/base_nav'); ?>
  <!-- Nội dung -->
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Mã Lịch Trình [<?= $jadwal['kd_jadwal']; ?>]</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6">
            <p>Xe buýt: <b><?= $jadwal['kd_bus'] . " [" . $jadwal['nama_bus'] . '-' . $jadwal['plat_bus'] ?>]</b></p>
            <p>Điểm xuất phát: <b><?= strtoupper($asal['kota_tujuan']) . " - " . $asal['terminal_tujuan']; ?></b></p>
            <p>Điểm đến: <b><?= strtoupper($jadwal['kota_tujuan']) . " - " . $jadwal['terminal_tujuan']; ?></b></p>
            <p>Giờ khởi hành: <b><?= date('H:i', strtotime($jadwal['jam_berangkat_jadwal'])) ?></b></p>
            <p>Giờ đến nơi: <b><?= date('H:i', strtotime($jadwal['jam_tiba_jadwal'])) ?></b></p>
            <p>Giá vé: <b>$<?= $jadwal['harga_jadwal']; ?></b></p>
          </div>
        </div>
        <hr>
        <a class="btn btn-danger" href="javascript:history.back()">Quay lại</a>
      </div>
    </div>
  </div>

  <!-- Modal hình ảnh -->
  <div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
  </div>

  <!-- Footer -->
  <?php $this->load->view('backend/include/base_footer'); ?>
  <!-- js -->
  <script>
    var modal = document.getElementById('myModal');
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function () {
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
    }
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function () {
      modal.style.display = "none";
    }
  </script>
  <?php $this->load->view('backend/include/base_js'); ?>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thay đổi mật khẩu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
            </div>
          </div>
        </div>
        </div>
</body>
</html>
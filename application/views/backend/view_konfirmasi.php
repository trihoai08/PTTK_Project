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
        body {font-family: Arial, Helvetica, sans-serif;}
        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        #myImg:hover {opacity: 0.7;}
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
            background-color: rgba(0,0,0,0.9);
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
        /* Add Animation */
.modal-content,
#caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
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
        .close:hover, .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
        /* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
    </style>
    <?php $this->load->view('backend/include/base_css'); ?>
</head>
<body id="page-top">
    <?php $this->load->view('backend/include/base_nav'); ?>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Mã Đặt Chỗ [<?= $konfirmasi[0]['kd_order']; ?>]</h6>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($konfirmasi as $row ) { ?>
                            <div class="col-sm-6">
                                <div class="row form-group">
                                    <label for="nama" class="col-sm-4 control-label">Mã Xác Nhận</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="kd_konfirmasi" value="<?= $row['kd_konfirmasi'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="nama" class="col-sm-4 control-label">Tên Ngân Hàng</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama" value="<?= $row['nama_bank_konfirmasi'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="" class="col-sm-4 control-label">Tên Người Gửi</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="a/n" value="<?= $row['nama_konfirmasi'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="" class="col-sm-4 control-label">Số Tài Khoản</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="harga" value="<?= $row['norek_konfirmasi'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="" class="col-sm-4 control-label">Tổng Thanh Toán</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="tgl_beli" value="<?= $row['total_konfirmasi'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="" class="col-sm-4 control-label">Bằng Chứng Thanh Toán</label>
                                    <div class="col-sm-8">
                                        <img id="myImg" src="<?= base_url($row['photo_konfirmasi']) ?>" alt="<?= $row['nama_konfirmasi'] ?>" style="width:100%;max-width:300px">
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <hr>
                        <a class="btn btn-danger" href="javascript:history.back()">Quay Lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
    <?php $this->load->view('backend/include/base_footer'); ?>
    <script>
        var modal = document.getElementById('myModal');
        var img = document.getElementById('myImg');
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() { 
            modal.style.display = "none";
        }
    </script>
    <?php $this->load->view('backend/include/base_js'); ?>
</body>
</html>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Biểu tượng yêu thích-->
		<link rel="shortcut icon" href="img/elements/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Sự miêu tả -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<!-- Log on to codeastro.com for more projects -->
		<title>ĐẶT VÉ XE KHÁCH</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--CSS-->
		<?php $this->load->view('frontend/include/base_css'); ?>
	</head>
	<body>
		<!-- navbar -->
		<?php $this->load->view('frontend/include/base_nav'); ?>
		<div class="generic-banner">
			<br>
			<h2 class="" align="center">Vé của bạn </h2>
			<div class="container ">
				<div class="row d-flex justify-content-center">
					<?php foreach ($tiket as $row) { ?>
					<div class="col-sm-3">
						&nbsp;
						<div class="card " style="width: 18rem;">
							<img class="card-img-top" src="<?php echo base_url($row['qrcode_order']) ?>" alt="Card image cap" >
							<div class="card-body" align="left">
								<?php if ($row['status_order'] == '3'){ ?>
									<a href="#" class="card-link">Đã hủy bởi Quản trị viên</a>
								<?php }else {?>
								<a href="<?php echo base_url().$row['qrcode_order'] ?>" class="card-link" download>Download QrCode</a><?php }?>
								<h5 class="card-title">Booking Code : <?php echo $row['kd_order']; ?></h5>
								<p>Tên : <?php echo $row['nama_order']; ?>
								 <br>Ngày đặt vé : <?php echo $row['tgl_beli_order']; ?></br>
								 Trạng thái thanh toán : <?php if ($row['status_order'] == '1') { ?>
									<i class='btn-danger'>Chưa thanh toán</i>
									<?php }else if ($row['status_order'] == '3'){ ?>
										<i class='btn-warning'>Đã hủy</i>
									<?php }else{?>
									
									<i class='btn-success'>Trả</i>
									<?php } ?>
									<hr>
									<?php if ($row['status_order'] == '1') { ?>
									<a href="<?php echo base_url('tiket/payment/'.$row['kd_order']) ?>" class="btn btn-primary">Kiểm tra thanh toán</a>
									<?php }else if ($row['status_order'] == '3'){ ?>
										<a href="<?php echo base_url('tiket/') ?>" class="btn btn-warning pull-right">Đặt một vé khác</a>
									<?php }else {?>
									<!-- <a href="<?php echo base_url('backend/home/refund') ?>" class="btn btn-danger" >Batal Tiket</a> -->
									<a href="<?php echo base_url('assets/backend/upload/etiket/'.$row['kd_order'].'.pdf') ?>" class="btn btn-success pull-right" download>In vé</a>
									<?php } ?>
								</div>
							</div>
						</div>
						&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						<?php } ?>
					</div>
				</div>
				<br><br>
				</div>
				<!-- Log on to codeastro.com for more projects -->
				<!-- End banner Area -->
				<!-- End Generic Start -->
				<!-- start footer Area -->
				<?php $this->load->view('frontend/include/base_footer'); ?>
				<!-- js -->
				<?php $this->load->view('frontend/include/base_js'); ?>
			</body>
		</html>
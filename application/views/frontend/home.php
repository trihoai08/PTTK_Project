<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/elements/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Log on to codeastro.com for more projects -->
		<!-- Site Title -->
		<title>ĐẶT VÉ XE KHÁCH</title>
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--
		CSS
		============================================= -->
		<style type="text/css">
		.combined {
		-webkit-text-stroke: 1px black;
		color: white;
		text-shadow:
		2px  2px 0 #000,
		-1px -1px 0 #000,
		1px -1px 0 #000,
		-1px  1px 0 #000,
		1px  1px 0 #000;
		}
		.border-black{
		  color: blue;
		  /*border white with light shadow*/
		  text-shadow: 
		     2px   0  0   #000, 
		    -2px   0  0   #000, 
		     0    2px 0   #000, 
		     0   -2px 0   #000, 
		     1px  1px 0   #000, 
		    -1px -1px 0   #000, 
		     1px -1px 0   #000, 
		    -1px  1px 0   #000,
		     1px  1px 5px #000;
		}
		</style>
		<?php $this->load->view('frontend/include/base_css'); ?>
	</head>
	<body>
		<!-- navbar -->
		<?php $this->load->view('frontend/include/base_nav'); ?>
		<!-- start banner Area -->
		<section class="banner-area relative section-gap relative" id="home">
			<div class="container">
				<div class="row fullscreen d-flex align-items-center justify-content-end">
					<div class="banner-content col-lg-7 col-md-12">
						<!-- <h4  class="combined">Official Ticket Guarantee</h4> -->
							<h2 class="text-white">
								Hệ thống đặt vé xe khách	
							</h2>
						<p class="text-white font-size: 15px" >
							Bây giờ việc tìm vé xe khách dễ dàng hơn, bạn có thể đặt vé trực tuyến tại BTBS. 
							Không cần phải bận tâm đến nhà ga hoặc văn phòng đại lý, giờ đây bạn có thể mua vé dễ dàng.
							Đặt vé nhanh chóng và dễ dàng. Tự do lựa chọn chỗ ngồi. Rẻ nhất mỗi ngày. Dịch vụ khách hàng 24/7.
						<p style="color: white; font-size: 20px; font-weight: bold;">
							Luôn đặt sự an toàn - uy tín - chất lượng lên hàng đầu.</p>
						</p>
						<a href="<?php echo base_url() ?>tiket" class="btn btn-danger text-uppercase">Tìm kiếm vé</a>
					</div>
				</div>
			</div>
		</section>
		<section class="service-area section-gap relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="col-md-8 pb-40 header-text">
						<h1>Các bước đặt vé xe</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="single-service">
							<img class="img-fluid" src="<?php echo base_url() ?>assets/frontend/img/b1.png" width="150" height="150" alt="">
							<h4>Chọn chi tiết tuyến đi
							</h4>
							<p>
							Nhập nơi khởi hành, điểm đến, ngày đi và sau đó nhấp vào 'Tìm kiếm'
							</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="single-service">
							<img class="img-fluid" src="<?php echo base_url() ?>assets/frontend/img/b2.png" width="150" height="150" alt="">
							<h4>Chọn xe và chỗ ngồi của bạn</h4>
							<p>
							Chọn xe, ghế ngồi, nơi khởi hành, điểm đến, điền thông tin hành khách và nhấp vào 'Thanh toán'
							</p>
						</div>
					</div>
					<!-- Log on to codeastro.com for more projects -->
					<div class="col-lg-4 col-md-6">
						<div class="single-service">
							<img class="img-fluid" src="<?php echo base_url() ?>assets/frontend/img/b3.png" width="150" height="150" alt="">
							<h4>Phương thức thanh toán </h4>
							<p>
							Có thể thanh toán thông qua chuyển khoản ATM, Internet Banking.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End service Area -->
		<!-- End feature Area -->
		<!-- Log on to codeastro.com for more projects -->
		<!-- End Generic Start -->
		<!-- start footer Area -->
		<?php $this->load->view('frontend/include/base_footer'); ?>
		<!-- js -->
		<?php $this->load->view('frontend/include/base_js'); ?>
	</body>
</html>
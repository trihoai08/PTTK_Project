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
	<title><?php echo $title ?></title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<!--CSS-->
	<link rel="stylesheet" type="text/css"
		href="<?php echo base_url() ?>assets/frontend/datepicker/dcalendar.picker.css">
	<?php $this->load->view('frontend/include/base_css'); ?>
</head>

<body>
	<!-- navbar -->
	<?php $this->load->view('frontend/include/base_nav'); ?>
	<section class="service-area section-gap relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<!-- Default Card Example -->
					<div class="card mb-5">
						<div class="card-header">
							<i class="fas fa-search"></i> Tìm kiếm vé
						</div>
						<div class="card-body">
							<div class="alert alert-warning" role="alert">

								<p><b>Lưu ý</b></p>
								<P>Trước khi mua vé, vui lòng xem  <b><i data-toggle="modal"
											data-target="#exampleModal">Làm thế nào để coi vé ?</i></b></P>

							</div>
							<form action="<?php echo base_url() ?>tiket/cekjadwal?>" method="get">
								<div class="form-group">
									<label for="exampleInputEmail1">Chọn ngày</label>
									<input placeholder="Chọn ngày" type="text" class="form-control datepicker"
										name="tanggal" required="">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Điểm đi</label>
									<select name="asal" class="form-control js-example-basic-single" required>
										<option value="" selected disabled="">Chọn điểm đi</option>
										<?php foreach ($asal as $row ) { ?>
										<option value="<?php echo $row['kd_tujuan'] ?>">
											<?php echo strtoupper($row['kota_tujuan']) ?>
											- <br><?php echo $row['terminal_tujuan']; ?> </option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Điểm đến</label>
									<select name="tujuan" class="form-control js-example-basic-single">
										<option value="" selected disabled="">Chọn điểm đến</option>
										<?php foreach ($tujuan as $row ) { ?>
										<option value="<?php echo $row['kota_tujuan'] ?>">
											<?php echo strtoupper($row['kota_tujuan']); ?></option>
										<?php } ?>
									</select>
								</div>
								<a href="<?php echo base_url() ?>tiket" class="btn btn-danger pull-left">Quay lại </a>
								<button type="submit" class="btn btn-primary pull-right">Tìm kiếm </button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="card mb-10">
						<div class="card-header">
							<i class="fas fa-info"></i> Lịch trình di chuyển
						</div>
						<div class="card-body">
							<table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">
								<thead>
									<tr>
										<th style="text-align:center;">Điểm xuất phát</th>
										<th>Điểm đến</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($list as $value) { ?>
									<tr>
										<td style="text-align:center;vertical-align:middle">
											<?php echo strtoupper($value['kota_tujuan']) ?></td>
										<td style="vertical-align:middle;"><?php echo $value['terminal_tujuan'] ?></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!-- End banner Area -->
	<!-- Log on to codeastro.com for more projects -->
	<!-- start footer Area -->
	<?php $this->load->view('frontend/include/base_footer'); ?>
	<!-- js -->

	<?php $this->load->view('frontend/include/base_js'); ?>
	<script type="text/javascript">
		$(function () {
			var date = new Date();
			date.setDate(date.getDate());

			$(".datepicker").datepicker({
				startDate: date,
				format: 'yyyy-mm-dd',
				autoclose: true,
				todayHighlight: true,
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('.js-example-basic-single').select2();
		});
	</script>
</body>

</html>
<!-- Modal -->
<!-- Log on to codeastro.com for more projects -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">How to book tickets?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<ol class="ordered-list" align="justify"><span class="center_content2">
					<li>Chọn ngày và chọn nhà thành phố xuất phát và đến của bạn để tìm kiếm lịch trình có sẵn.
							<li>Tìm kiếm vé sau đó nhấp vào nút <b>Chọn</b> trên vé bạn muốn đặt.
							</li>
							<li>Hệ thống sẽ chuyển hướng bạn đến trang chọn chỗ ngồi, tại đó bạn phải <b>chọn bất kỳ chỗ ngồi nào</b> [Tối đa 4 chỗ ngồi cùng một lúc]</li>
							<li>Sau khi chọn chỗ ngồi, hãy nhấp vào nút <b>Tiếp theo</b> để tiếp tục.</li>
							<li>Điền thông tin vé của bạn bằng cách cung cấp thông tin khách hàng như Tên hành khách, Tuổi và các thông tin cần thiết khác 
								<b></b>Với phương thức này, bạn có thể chọn bất kỳ ngân hàng nào có sẵn [làm Phương thức thanh toán] để đặt vé.</li>
							<li>Sau khi gửi biểu mẫu, việc đặt chỗ được thực hiện <b>[tạm thời]</b>. Hệ thống sẽ cung cấp cho bạn một <b>Mã QR</b> và bạn phải thực hiện thanh toán.</li>
							<li>Tất cả các hướng dẫn thanh toán đều được cung cấp trên trang vé.</li>
							<li>Sau đó, nhấn vào nút <b>Xác nhận Thanh toán</b> để gửi chi tiết thanh toán của bạn kèm theo hình ảnh <b>bằng chứng thanh toán</b>.</li>
							<li>Cuối cùng, yêu cầu thanh toán của bạn sẽ được gửi để <b>xác minh</b>.</li>
							<li>Bạn cũng sẽ nhận được một <b>Vé điện tử (E-Ticket)</b> sau khi thanh toán được xác nhận.</li>
							<li>Nếu bạn đã thực hiện thanh toán, hãy mang theo bằng chứng thanh toán vào thời điểm khởi hành và đổi vé trước giờ khởi hành một giờ.</li>
						</span></ol>
					<w:worddocument></w:worddocument>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
			</div>
		</div>
	</div>
</div>
<!DOCTYPE html>
<html>
	<head>
		<title>Thank you</title>
		<meta NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
		
	</head>
	<body style="font-family: tahoma; font-size: 12px;">
		<center>
		<table class="wrapper" width="600px" style="padding: 0; margin: 0; border-collapse: collapse; border: solid 1px #fd7521;">
			<tr class="header" style="background-color:#484B51;">
				<td style="padding-right:10px;" align="left">
					<a href="<?= base_url() ?>" target="_blank">
						<h4>ĐẶT VÉ XE KHÁCH</h4>
					</a>
				</td>
				<td style="padding-right:10px;" align="right">
					<a href="<?= base_url() ?>" target="_blank">
						<img height="45" src="https://cdn4.iconfinder.com/data/icons/dot/256/bus.png" alt="">
					</a>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p style="text-align: justify; padding: 10px;">
					Kính gửi Quý khách hàng,<br>
					Cảm ơn bạn đã sử dụng BTBS.
					</p>
					<p style="text-align: justify; padding: 10px;">
					Sau đây là tóm tắt về các giao dịch của bạn:
						<table width="100%" style="font-size: 14px; margin: 10px;">
								<tr>
								<td>
								Hướng dẫn chuyển số tài khoản
									</td><td>:</td>
									<td>
										<strong><?= $sendmail['nomrek_bank']; ?></strong>
									</td>
								</tr>
								<tr>
								<td>
								Thay mặt cho
									</td><td>:</td>
									<td>
										<strong><?= $sendmail['nasabah_bank']; ?></strong>
									</td>
								</tr>
								<tr>
									<td>
									Ngân hàng nhận
									</td>
									<td>:</td>
									<td>
										<strong><?= $sendmail['nama_bank']; ?></strong>
									</td>
								</tr>
								<tr>
									<td>
									Số tiền đã thanh toán
									</td>
									<td>:</td>
									<td>
										<?php $total = $count * $sendmail['harga_jadwal'] ?>
										<strong>$ <?= number_format((float)($total),0,",","."); ?></strong>
									</td>
								</tr>
								<tr>
									<td>
									Số đặt chỗ
									</td>
									<td>:</td>
									<td>
										<strong><?= $sendmail['kd_order']; ?></strong>
									</td>
								</tr>
								<tr>
									<td>
									Mô tả mua vé
									</td>
									<td>:</td>
									<td>
										<strong>Mã lịch trình <?= $sendmail['kd_jadwal'] ?></strong><br>
										<strong>Khởi hành <?= hari_indo(date('N',strtotime($sendmail['tgl_berangkat_order']))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$sendmail['tgl_berangkat_order'].''))).', '.date('H:i',strtotime($sendmail['jam_berangkat_jadwal'])); ?></strong><br>
										<strong><?= $count; ?>Ghế</strong>
									</td>
								</tr>
								<tr>
									<td>
									Ngày mua
									</td>
									<td>:</td>
									<td>
										<strong><?= $sendmail['tgl_beli_order']; ?></strong>
									</td>
								</tr>
								<tr>
									<td>
									Có hiệu lực cho đến
									</td>
									<td>:</td>
									<td>
										<strong><?php $expired = hari_indo(date('N',strtotime($sendmail['expired_order']))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$sendmail['expired_order'].''))).', '.date('H:i',strtotime($sendmail['expired_order'])); echo $expired;?></strong>
									</td>
								</tr>
									</table>
								</p>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<table width="100%" >
									<tr>
										<td>
											<div class="col-md-12 col-xs-12">
												<h4>Làm thế nào để chuyển qua</h4>
												<div class="hr hr8 hr-double hr-dotted"></div>
												<div class="row">
													<div class="col-md-4">
														<div style="border:1px solid #fd7521;margin:2px;padding:5px;">
															<center><h4>ATM</h4></center>
															<div class="hr hr8 hr-double hr-dotted"></div>
															<ol style="padding:0;">
																<li>Hướng dẫn thanh toán</li>
																<li>Chọn Menu <span class="label">Các giao dịch khác</span></li>
																<li>Chọn <span class="label">Chuyển khoản</span></li>
																<li>Chọn <span class="label">Tài khoản <?= $sendmail['nama_bank'];; ?> </span></li>
																<li>Nhập số tài khoản <span class="label"><?= $sendmail['nomrek_bank']; ?></span></li>
																<li>Chọn <span class="label">Right</span></li>
																<li>Chọn <span class="label">Yes</span></li>
																<li><Table>Hãy mang theo hình ảnh thanh toán của bạn</Table></li>
																<li>Hoàn Thành</li>
															</ol>
														</div>
													</div>
													<div class="col-md-4">
														<div style="border:1px solid #fd7521;margin:2px;padding:5px;">
															<center><h4>Ứng dụng ngân hàng trên di động</h4></center>
															<div class="hr hr8 hr-double hr-dotted"></div>
															<ol style="padding:0;">
																<li>Đăng nhập Ngân hàng </li>
																<li>Chọn <span class="label">Chuyển </span></li>
																<li>Select <span class="label">Tài Khoản</span></li>
																<li>Nhập số tài khoản<span class="label"><?= $sendmail['nomrek_bank'] ?></span></li>
																<li>Chọn <span class="label">Gửi</span></li>
																<li>Thông tin khách hàng sẽ được hiển thị</li>
																<li>Chọn <span class="label">OK</span></li>
																<li>Nhập mã <span class="label">PIN</span></li>
																<li>Mobile Banking</li>
																<li>Bằng chứng thanh toán được hiển thị</li>
																<li>Hoàn thành</li>
															</ol>
														</div>
													</div>
													<div class="col-md-4">
														<div style="border:1px solid #fd7521;margin:2px;padding:5px;">
															<center><h4>Ngân hàng online</h4></center>
															<div class="hr hr8 hr-double hr-dotted"></div>
															<ol style="padding:0;">
																<li>Chọn <span class="label">Giao dịch quỹ</span></li>
																<li>CHọn <span class="label">Chuyển đến tài khoản BCA</span></li>
																<li>Nhập số tài khoản <span class="label"><?= $sendmail['nomrek_bank'] ?></span></li>
																<li></li>
																<li>Chọn <span class="label">Tiếp tục</span></li>
																<li>Đầu vào <span class="label">KeyBCA Appli 1</span></li>
																<li>Chọn <span class="label">Send</span></li>
																<li>Bằng chứng thanh toán được hiển thị</li>
																<li>Hoàn thành</li>
															</ol>
														</div>
													</div>
												</div>
											</div>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<p style="padding:10px;">
										<br>
										Trân trọng,<br>
										<span style="color:#fd7521;"><strong>Hệ thống đặt vé xe khách</strong></span>
										<br>
										<br>
									</p>
								</td>
							</tr>
							<tr>
								
							</tr>
							<tr class="footer" style="font-size: 10px; background-color: #484B51;color:#ffffff;">
								<td style="padding-left:10px; padding-right:10px;">
									<?= date("Y"); ?> &copy; BTBS
								</td>
								<td align="right" style="padding-left:10px; padding-right:10px;">
									<img height="30" src="https://cdn4.iconfinder.com/data/icons/dot/256/bus.png" border="0">
								</td>
							</tr>
						</table>
						</center>
					</body>
				</html>
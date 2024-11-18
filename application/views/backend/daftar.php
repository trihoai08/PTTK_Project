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
	<link rel="stylesheet"
		href="<?= base_url('assets/frontend/timepicker') ?>/css/bootstrap-material-datetimepicker.css" />
	<?php $this->load->view('backend/include/base_css'); ?>
</head>

<body id="page-top">
	<!-- navbar -->
	<?php $this->load->view('backend/include/base_nav'); ?>
	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<!-- Đăng nhập tại codeastro.com để tìm thêm dự án -->
		<!-- Basic Card Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Thêm Quản Trị Viên Mới</h6>
			</div>
			<div class="card-body">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12">
							<form class="user" method="post" action="<?= base_url('backend/login/daftar') ?>">
								<div class="form-group">
									<input type="text" class="form-control form-control-user" id="exampleFirstName" name="name"
										value="<?= set_value('name') ?>" placeholder="Họ và Tên">
									<?= form_error('name'),'<small class="text-danger pl-3">','</small>'; ?>
								</div>
								<div class="form-group">
									<input type="email" class="form-control form-control-user" placeholder="Địa Chỉ Email" name="email"
										value="<?= set_value('email') ?>">
									<?= form_error('email'),'<small class="text-danger pl-3">','</small>'; ?>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-user" placeholder="Tên Đăng Nhập" name="username"
										value="<?= set_value('username') ?>">
									<?= form_error('username'),'<small class="text-danger pl-3">','</small>'; ?>
								</div>
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="password" class="form-control form-control-user" name="password"
											placeholder="Mật Khẩu">
									</div>
									<div class="col-sm-6">
										<input type="password" class="form-control form-control-user" name="password2"
											placeholder="Nhập Lại Mật Khẩu">
									</div>
								</div>
								<div class="form-group">
									<select class="form-control" name="level">
										<option value="2">Quản Trị Viên</option>
										<option value="1">Chủ Sở Hữu</option>
									</select>
								</div>
								<?= form_error('password'),'<small class="text-danger pl-3">','</small>'; ?>
								<a href="<?= base_url('backend/admin')?>" class="btn btn-danger">Quay Lại</a>
								<button type="submit" class="btn btn-success float-right">
								Thêm Tài Khoản
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End of Main Content -->
		<!-- Footer --><!-- Đăng nhập tại codeastro.com để tìm thêm dự án -->
		<?php $this->load->view('backend/include/base_footer'); ?>
		<!-- End of Footer -->
		<!-- js -->
		<?php $this->load->view('backend/include/base_js'); ?>

</body>

</html>

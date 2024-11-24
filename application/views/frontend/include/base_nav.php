<header id="header" id="home">
		    <div class="container">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="<?php echo base_url() ?>"><h3> <i class="fas fa-ticket-alt"></i> <b>B T B S</b></h3></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li class="menu"><a href="<?php echo base_url() ?>">Trang chủ</a></li>
			          <li><a href="<?php echo base_url() ?>tiket">Đặt chỗ</a></li>
			          <li class="menu"><a href="<?php echo base_url() ?>tiket/cektiket">Kiểm tra vé</a></li>
			          <?php if ($this->session->userdata('username')) { ?>
				      	<li class="menu-has-children"><a href="#">Hi, <?php echo $this->session->userdata('nama_lengkap'); ?></a>
						<ul>
							<li><a href="<?php echo base_url() ?>profile/profilesaya/<?php echo $this->session->userdata('kd_pelanggan') ?>">
								<i class="fas fa-id-card"></i> Hồ sơ của tôi</a></li>
							<li><a href="<?php echo base_url() ?>profile/tiketsaya/<?php echo $this->session->userdata('kd_pelanggan') ?>">
								<i class="fas fa-ticket-alt"></i> Vé của tôi</a></li>
							<li><a href="<?php echo base_url() ?>login/logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
						</ul>
						</li>
				      <?php }else{ ?>  
				  	  <li class="menu wobble animated"><a href="<?php echo base_url() ?>login/Daftar">Đăng kí</a></li>
 					  <li><a href="<?php echo base_url() ?>login">Đăng nhập</a></li>
				  	  <?php } ?>
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header><!-- #header -->	
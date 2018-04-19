<aside class="sidebar fixed" style="width: 260px; left: 0px; ">
	<div class="brand-logo">
		<div id="logo">
			<div class="foot1"></div>
			<div class="foot2"></div>
			<div class="foot3"></div>
			<div class="foot4"></div>
		</div>ILIH OMAH </div>
	<div class="user-logged-in text-center">
		<br>
		<img src="<?= base_url() ?>assets/img/photos/user.png" width="120px" height="120px" class="img-circle">
		<div class="user-name">
			<h6 style="color:white">
				<?= $this->session->userdata('peran') ?>
			</h6>
			<p style="color:white">
				<?= $this->session->userdata('nama') ?>
			</p>
		</div>
		<div class="user-actions">
			<a href="<?= site_url() ?>auth/logout" class="btn btn-danger btn-border btn-block"> logout</a>
		</div>
	</div>
	<ul class="menu-links">

		<!-- show menu global -->
		<li>
			<a href="<?= site_url()?>dashbord">
				<i class="md md-blur-on"></i>&nbsp;
				<span>Dashboard</span>
			</a>
		</li>
		<!-- end show menu global -->

		<!-- show menu admin -->
		<?php if (isAdmin()): ?>
		<li>
			<a href="<?= site_url()?>m_kriteria">
				<i class="md md-description"></i>&nbsp;
				<span>Master Kriteria</span>
			</a>
		</li>
		<li>
			<a href="<?= site_url()?>m_masyarakat/index/Belum">
				<i class="md md-people"></i>&nbsp;
				<span>Master Masyarakat</span>
			</a>
		</li>
		<?php endif ?>
		<!-- end show menu admin -->

		<!-- show menu operator -->
		<?php if (isOperator()): ?>
		<li>
			<a href="<?= site_url()?>m_masyarakat/index/Belum">
				<i class="md md-people"></i>&nbsp;
				<span>Pilih Kandidat Masyarakat</span>
			</a>
		</li>
		
		<?php endif ?>
		<!-- end show menu operator -->

		<!-- show menu survayor -->
		<?php if(isSurveyor()): ?>
		<li>
			<a href="<?= site_url()?>m_masyarakat/index/Kandidat">
				<i class="md  md-assignment"></i>&nbsp;
				<span>Entry Data Detail Kandidat </span>
			</a>
		</li>
		<?php endif ?>
		<!-- end show menu survayor -->

		<!-- show menu kepala desa -->
		<?php if(isLurah()): ?>
		<li>
			<a href="<?= site_url()?>m_masyarakat/listMasyrakatPilih">
				<i class="md md-people"></i>&nbsp;
				<span>Pilih Prioritas Masyarakat</span>
			</a>
		</li>
		<li>
			<a href="<?= site_url()?>r_pemilihan_bantuan">
				<i class="md md-assignment"></i>&nbsp;
				<span>Report Penerima Bantuan</span>
			</a>
		</li>
		<?php endif ?>
		<!-- endshow menu kepala desa -->
		


	</ul>
</aside>
<div class="main-container">
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header pull-left">
				<button type="button" class="navbar-toggle pull-left m-15" data-activates=".sidebar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<ul class="breadcrumb">
					<li> <b>SPKPBRLH </b>DESA SUTOJAYAN PAKISAJI <?= DATE("Y") ?></li>
				</ul>
			</div>
			<ul class="nav navbar-nav navbar-right navbar-right-no-collapse">
				<li class="dropdown pull-right">
					<button class="dropdown-toggle pointer btn btn-round-sm btn-link withoutripple" data-template="assets/tpl/partials/theme-picker.html"
					data-toggle="dropdown">
						<i class="md md-settings f20"></i>
					</button>
					<div class="dropdown-menu dropdown-menu-right theme-picker mat-grow-top-right">
						<div class="container-fluid m-v-15">
							<div class="pull-right m-r-10">
								<button type="button" class="close" onclick="$hide()">×</button>
							</div>
							<h4 class="no-margin p-t-5">
								<i class="md md-filter"></i> Pengaturan Tema</h4>
							<div class="row m-t-20">
								<div class="col-md-6">
									<div class="w300">Pilih Tema</div>
									<div class="theme-item theme-template-default" onclick="changeTemplateTheme('theme-template-default');">
										<div class="icon hide">
											<i class="md md-check"></i>
										</div>
										<div class="theme-sidenav"></div>
										<div class="theme-header"></div>
										<div class="theme-body"></div>
									</div>
									<div class="theme-item theme-template-dark" onclick="changeTemplateTheme('theme-template-dark');">
										<div class="icon">
											<i class="md md-check"></i>
										</div>
										<div class="theme-sidenav"></div>
										<div class="theme-header"></div>
										<div class="theme-body"></div>
									</div>
									<div class="theme-item theme-template-light" onclick="changeTemplateTheme('theme-template-light');">
										<div class="icon hide">
											<i class="md md-check"></i>
										</div>
										<div class="theme-sidenav"></div>
										<div class="theme-header"></div>
										<div class="theme-body"></div>
									</div>
									<div class="theme-item theme-template-green" onclick="changeTemplateTheme('theme-template-green');">
										<div class="icon hide">
											<i class="md md-check"></i>
										</div>
										<div class="theme-sidenav"></div>
										<div class="theme-header"></div>
										<div class="theme-body"></div>
									</div>
									<div class="theme-item theme-template-blue" onclick="changeTemplateTheme('theme-template-blue');">
										<div class="icon hide">
											<i class="md md-check"></i>
										</div>
										<div class="theme-sidenav"></div>
										<div class="theme-header"></div>
										<div class="theme-body"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="w300">Warna Tema</div>
									<div class="row gutter-10">
										<div class="col-xs-2 col-sm-2 col-md-4 theme-colors ng-scope">
											<div class="theme-item theme-pink" onclick="changeColorTheme('theme-pink');">
												<div class="icon">
													<i class="md md-check"></i>
												</div>
												<div class="theme-color-1"></div>
												<div class="theme-color-2"></div>
												<div class="theme-color-3"></div>
												<div class="theme-color-4"></div>
											</div>
										</div>
										<div class="col-xs-2 col-sm-2 col-md-4 theme-colors ng-scope">
											<div class="theme-item theme-red" onclick="changeColorTheme('theme-red');">
												<div class="icon hide">
													<i class="md md-check"></i>
												</div>
												<div class="theme-color-1"></div>
												<div class="theme-color-2"></div>
												<div class="theme-color-3"></div>
												<div class="theme-color-4"></div>
											</div>
										</div>
										<div class="col-xs-2 col-sm-2 col-md-4 theme-colors ng-scope">
											<div class="theme-item theme-purple" onclick="changeColorTheme('theme-purple');">
												<div class="icon hide">
													<i class="md md-check"></i>
												</div>
												<div class="theme-color-1"></div>
												<div class="theme-color-2"></div>
												<div class="theme-color-3"></div>
												<div class="theme-color-4"></div>
											</div>
										</div>
										<div class="col-xs-2 col-sm-2 col-md-4 theme-colors ng-scope">
											<div class="theme-item theme-indigo" onclick="changeColorTheme('theme-indigo');">
												<div class="icon hide">
													<i class="md md-check"></i>
												</div>
												<div class="theme-color-1"></div>
												<div class="theme-color-2"></div>
												<div class="theme-color-3"></div>
												<div class="theme-color-4"></div>
											</div>
										</div>
										<div class="col-xs-2 col-sm-2 col-md-4 theme-colors ng-scope">
											<div class="theme-item theme-blue" onclick="changeColorTheme('theme-blue');">
												<div class="icon hide">
													<i class="md md-check"></i>
												</div>
												<div class="theme-color-1"></div>
												<div class="theme-color-2"></div>
												<div class="theme-color-3"></div>
												<div class="theme-color-4"></div>
											</div>
										</div>
										<div class="col-xs-2 col-sm-2 col-md-4 theme-colors ng-scope">
											<div class="theme-item theme-light-blue" onclick="changeColorTheme('theme-light-blue');">
												<div class="icon hide">
													<i class="md md-check"></i>
												</div>
												<div class="theme-color-1"></div>
												<div class="theme-color-2"></div>
												<div class="theme-color-3"></div>
												<div class="theme-color-4"></div>
											</div>
										</div>
										<div class="col-xs-2 col-sm-2 col-md-4 theme-colors ng-scope">
											<div class="theme-item theme-cyan" onclick="changeColorTheme('theme-cyan');">
												<div class="icon hide">
													<i class="md md-check"></i>
												</div>
												<div class="theme-color-1"></div>
												<div class="theme-color-2"></div>
												<div class="theme-color-3"></div>
												<div class="theme-color-4"></div>
											</div>
										</div>
										<div class="col-xs-2 col-sm-2 col-md-4 theme-colors ng-scope">
											<div class="theme-item theme-teal" onclick="changeColorTheme('theme-teal');">
												<div class="icon hide">
													<i class="md md-check"></i>
												</div>
												<div class="theme-color-1"></div>
												<div class="theme-color-2"></div>
												<div class="theme-color-3"></div>
												<div class="theme-color-4"></div>
											</div>
										</div>
										<div class="col-xs-2 col-sm-2 col-md-4 theme-colors ng-scope">
											<div class="theme-item theme-green" onclick="changeColorTheme('theme-green');">
												<div class="icon hide">
													<i class="md md-check"></i>
												</div>
												<div class="theme-color-1"></div>
												<div class="theme-color-2"></div>
												<div class="theme-color-3"></div>
												<div class="theme-color-4"></div>
											</div>
										</div>
										<div class="col-xs-2 col-sm-2 col-md-4 theme-colors ng-scope">
											<div class="theme-item theme-light-green" onclick="changeColorTheme('theme-light-green');">
												<div class="icon hide">
													<i class="md md-check"></i>
												</div>
												<div class="theme-color-1"></div>
												<div class="theme-color-2"></div>
												<div class="theme-color-3"></div>
												<div class="theme-color-4"></div>
											</div>
										</div>
										<div class="col-xs-2 col-sm-2 col-md-4 theme-colors ng-scope">
											<div class="theme-item theme-lime" onclick="changeColorTheme('theme-lime');">
												<div class="icon hide">
													<i class="md md-check"></i>
												</div>
												<div class="theme-color-1"></div>
												<div class="theme-color-2"></div>
												<div class="theme-color-3"></div>
												<div class="theme-color-4"></div>
											</div>
										</div>
										<div class="col-xs-2 col-sm-2 col-md-4 theme-colors ng-scope">
											<div class="theme-item theme-yellow" onclick="changeColorTheme('theme-yellow');">
												<div class="icon hide">
													<i class="md md-check"></i>
												</div>
												<div class="theme-color-1"></div>
												<div class="theme-color-2"></div>
												<div class="theme-color-3"></div>
												<div class="theme-color-4"></div>
											</div>
										</div>
										<div class="col-xs-2 col-sm-2 col-md-4 theme-colors ng-scope">
											<div class="theme-item theme-amber" onclick="changeColorTheme('theme-amber');">
												<div class="icon hide">
													<i class="md md-check"></i>
												</div>
												<div class="theme-color-1"></div>
												<div class="theme-color-2"></div>
												<div class="theme-color-3"></div>
												<div class="theme-color-4"></div>
											</div>
										</div>
										<div class="col-xs-2 col-sm-2 col-md-4 theme-colors ng-scope">
											<div class="theme-item theme-orange" onclick="changeColorTheme('theme-orange');">
												<div class="icon hide">
													<i class="md md-check"></i>
												</div>
												<div class="theme-color-1"></div>
												<div class="theme-color-2"></div>
												<div class="theme-color-3"></div>
												<div class="theme-color-4"></div>
											</div>
										</div>
										<div class="col-xs-2 col-sm-2 col-md-4 theme-colors ng-scope">
											<div class="theme-item theme-deep-orange" onclick="changeColorTheme('theme-deep-orange');">
												<div class="icon hide">
													<i class="md md-check"></i>
												</div>
												<div class="theme-color-1"></div>
												<div class="theme-color-2"></div>
												<div class="theme-color-3"></div>
												<div class="theme-color-4"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</nav>
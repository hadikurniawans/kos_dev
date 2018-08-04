
	<section class="headings">
		<div class="text-heading text-center">
			<div class="container">
				<h1>Jadwalkan Survey</h1>
				<h2><a href="<?php echo base_url() ?>">Home </a> &nbsp;/&nbsp; Survey</h2>
			</div>
		</div>
	</section>
	<!-- END SECTION HEADINGS -->

	<!-- START SECTION 404 -->
	<div id="login">
		<div class="login">
			<form method="POST" action="<?php echo base_url('isi_survey') ?>" autocomplete="off">
				<div class="form-group">
					<label>Nama</label>
					<input class="form-control" name="nama_user" type="text">
					<i class="ti-user"></i>
				</div>
				<div class="form-group">
					<label>No. Telp</label>
					<input class="form-control" name="noTelp_user" type="text">
					<i class="ti-user"></i>
				</div>
				<div class="form-group">
					<label>Tanggal Survey</label>
					<input class="form-control" name="tanggal_survey" type="date">
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Jam</label>
					<input class="form-control" name="jam_survey" type="time">
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Nama Kos/Kontrakan</label>
					<input class="form-control" name="nama_kost_survey" type="text">
					<i class="icon_mail_alt"></i>
				</div>
				<div id="pass-info" class="clearfix"></div>
				<button type="submit" class="btn_1 rounded full-width add_top_30">submit</button>
				<!-- <a type="submit" class="btn_1 rounded full-width add_top_30">Submit</a> -->
				<!-- <div class="text-center add_top_10">Already have an acccount? <strong><a href="login.html">Sign In</a></strong></div> -->
			</form>
		</div>
	</div>
	<!-- END SECTION 404 -->
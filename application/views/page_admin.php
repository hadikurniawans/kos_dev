<section class="counterup">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-xs-12">
					<div class="countr">
						<i class="fa fa-home" aria-hidden="true"></i>
						<div class="count-me">
							<p class="counter text-left"><?php echo $properti; ?></p>
							<h3>Jumlah Properti</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-xs-12">
					<div class="countr mb-0">
						<i class="fa fa-users" aria-hidden="true"></i>
						<div class="count-me">
							<p class="counter text-left"><?php echo $survey ?></p>
							<h3>Total Jumlah survey</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
</section> <br>
<center><h3>DATA PROPERTI KOSEEKER</h3></center>
<div class="container">
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/DataTables/js/jquery.dataTables.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/DataTables/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/DataTables/css/dataTables.bootstrap.css">
		<table class="table table-striped table-bordered data">
			<thead>
				<tr>			
					<th>Kampus</th>
					<th>Daerah Kampus</th>
					<th>Harga</th>
					<th>Kategori</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list_properti as $lp) {
				?>
				<tr>				
					<td><?php echo $lp->kampus ?></td>
					<td><?php echo $lp->daerah_kampus ?></td>
					<td><?php echo $lp->harga_properti ?></td>
					<td><?php echo $lp->kategori_properti ?></td>
					<td><?php if ($lp->status == 0) {
					?>
					<b><p class="btn-success">TERSEDIA</p></b>
					<?php
					}else{
					?>
					<b><p class="btn-danger">SOLD</p></b>
					<?php
					} ?></td>
				</tr>
				<?php
				} ?>
			</tbody>
		</table>
</div>
<br>
<script type="text/javascript">
	$(document).ready(function(){
		$('.data').DataTable();
	});
</script>

	<!-- START FOOTER -->
	<footer class="first-footer">
		<div class="top-footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="netabout">
							<a href="<?php echo base_url('assets/') ?>" class="logo">
								<img src="<?php echo base_url('assets/') ?>images/logofix.png" alt="netcom">
							</a>
							<p>Koseeker memiliki ratusan data kos yang siap dihuni oleh mahasiswa dikampus-kampus wilayah bandung. Koseeker bisa mengantarkan kamu ke tempat kos/apartemen/kontrakan yang kamu inginkan.</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="navigation">
							<h3>Navigasi</h3>
							<div class="nav-footer">
								<ul>
									<li><a href="<?php echo base_url('') ?>">Home</a></li>
									<li><a href="<?php echo base_url('faq') ?>">FAQ</a></li>
									<li><a href="#">Tentang</a></li>

								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="contactus">
							<h3>Hubungi Kami</h3>
							<ul>
								<li>
									<div class="info">
										<i class="fa fa-instagram" aria-hidden="true"></i>
										<p class="in-p">@koseeker</p>
									</div>
								</li>
								<li>
									<div class="info">
										<i class="fa fa-phone" aria-hidden="true"></i>
										<p class="in-p">+62-9673-180-069</p>
									</div>
								</li>
								<li>
									<div class="info">
										<i class="fa fa-facebook-official" aria-hidden="true"></i>
										<p class="in-p ti">koseeker</p>
									</div>
								</li>
							</ul>
						</div>
						<ul class="netsocials">
							<li><a href="https://www.facebook.com/koseeker.official"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="https://www.instagram.com/koseeker/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="https://api.whatsapp.com/send?phone=6289530781416&text=Hallo%20admin%20Koseeker"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="second-footer">
			<div class="container">
				<p>2018 © Copyright - All Rights Reserved.</p>
				<p>Koseeker</p>
			</div>
		</div>
	</footer>


	<a data-scroll href="#heading" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
	<!-- END FOOTER -->

	<!-- START PRELOADER -->
	<div id="preloader">
		<div id="status">
			<div class="status-mes"></div>
		</div>
	</div>
	<!-- END PRELOADER -->
	<!--Style Switcher===========================================-->
	<!-- ARCHIVES JS -->

	<!-- Slider Revolution scripts -->

	<!-- MAIN JS -->
	<script src="<?php echo base_url('assets/') ?>js/script.js"></script>

</body>
<!-- Mirrored from code-theme.com by HTTrack Website Copier/3.x [XR/YP'2000] -->
</html>
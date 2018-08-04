	<section class="headings">
		<div class="text-heading text-center">
			<div class="container">
				<h1>Detail properti</h1>
				<h2><a href="<?php echo base_url() ?>">Home </a> &nbsp;/&nbsp; detail properti</h2>
			</div>
		</div>
	</section>
	<!-- END SECTION HEADINGS -->

	<!-- START SECTION PROPERTIES LISTING -->
	<section class="blog details">
		<div class="container">
			<div class="row">
				<?php foreach ($detail_properti as $dp) {} ?>
				<div class="col-lg-9 col-md-12 blog-pots">
					<!-- Block heading Start-->
					<div class="block-heading details">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-2">
								<h4>
                            <span class="heading-icon">
                                <i class="fa fa-map-marker"></i>
                                </span>
                                <span class="hidden-sm-down"><?php echo $dp->daerah_kampus.', '.$dp->kampus ?></span>
                            </h4>
							</div>
							<div class="col-lg-6 col-md-6 col-10 cod-pad">
								<div class="sorting-options">
									<h5><span>Harga Sewa:</span> Rp. <?php echo $dp->harga_properti ?></h5>
									<h6 class="type"><span><?php echo $dp->tipe_properti ?> : </span><?php echo $dp->kategori_properti ?></h6>
								</div>
							</div>
						</div>
					</div>
					<!-- Block heading end -->
					<div class="row">
						<div class="col-md-12 mb-4">
							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
								</ol>
								<div class="carousel-inner" role="listbox">
									<?php 
									$a = 0;
									$b = '';
									foreach ($data_foto as $df) {
									
									?>
									<div class="carousel-item <?php if($a == 0){
									echo 'active'; } $a++; ?>">
										<img class="d-block img-fluid" src="<?php echo $df->gambar ?>" alt="first slide">
									</div>
									<?php
									} ?> 
									
<!-- 									<div class="carousel-item">
										<img class="d-block img-fluid" src="<?php echo base_url('assets/') ?>images/slider/home-slider-2.jpg" alt="Second slide">
									</div> -->
								</div>
								<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
							<div class="blog-info details">
								<!-- cars content -->
								<div class="homes-content details-2 mb-5">
									<!-- cars List -->
									<ul class="homes-list clearfix">
										<li>
											<i class="fa fa-bed" aria-hidden="true"></i>
											<span>Beds 6</span>
										</li>
										<li>
											<i class="fa fa-bath" aria-hidden="true"></i>
											<span>Baths 3</span>
										</li>
										<li>
											<i class="fa fa-object-group" aria-hidden="true"></i>
											<span>720 sq ft</span>
										</li>
										<li>
											<i class="fa fa-car" aria-hidden="true"></i>
											<span>Garages 2</span>
										</li>
										<li>
											<i class="fa fa-columns" aria-hidden="true"></i>
											<span>Kitchen 2</span>
										</li>
										<li>
											<i class="fa fa-clone" aria-hidden="true"></i>
											<span>Balcony 2</span>
										</li>
									</ul>
								</div>
								<h5 class="mb-4">Informasi Umum</h5>
								<p class="mb-3"><?php echo $dp->deskripsi_properti ?></p>
							</div>
						</div>
					</div>
					<!-- cars content -->
					<div class="homes-content details mb-5">
						<!-- title -->
						<h5 class="mb-4">Amenities</h5>
						<!-- cars List -->
						<ul class="homes-list clearfix">
							<?php foreach ($all_fasilitas as $af) { ?>
							<li>
								<i class="fa fa-check-square" aria-hidden="true"></i>
								<span><?php echo $af->nama_properti ?></span>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<aside class="col-lg-3 col-md-12 car">
					<div class="widget">
						<div class="section-heading">
							<div class="media">
								<div class="media-left">
									<i class="fa fa-home"></i>
								</div>
								<div class="media-body">
									<h5>Mau dianterin Survey Kostan?</h5>
									<div class="border"></div>
									<p></p>
								</div>
							</div>
						</div>
						<!-- Search Fields -->
						<div class="recent-post py-5">
							<div class="recent-main">
								<p><h4>jadwalkan untuk survey dengan agen koseeker <a href="<?php echo base_url('survey')?>" target="new_blank">disini</a>,</h4></p>					
							</div>
							<div class="recent-main">
								<p><h4>atau chat dengan admin koseeker melalui whatsapp <a href="https://api.whatsapp.com/send?phone=6289530781416&text=Hallo%20admin%20Koseeker" target="new_blank">disini</a>.</h4></p>

							</div>
							<p><h4>tambahkan kita di Line juga</h4></p>
							<div class="recent-main">
								<div class="line-img">
								<img src="<?php echo base_url('assets/images/barcode/barcode_line.jpg') ?>">
									<a href="blog-details.html"></a>
								</div>
							</div>
						</div>
					</div>
				</aside>
			</div>
		</div>
	</section>
	<!-- END SECTION PROPERTIES LISTING -->

	<a data-scroll href="#heading" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
	<!-- END FOOTER -->

	<!-- ARCHIVES JS -->
	<script src="<?php echo base_url('assets/') ?>js/jquery.min.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/jquery-ui.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/range-slider.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/tether.min.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/smooth-scroll.min.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/popup.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/ajaxchimp.min.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/newsletter.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhAYvx0GmLyN5hlf6Uv_e9pPvUT3YpozE"></script>
	<!-- <script src="<?php echo base_url('assets/') ?>js/map-single.js"></script> -->
	<script src="<?php echo base_url('assets/') ?>js/color-switcher.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/inner.js"></script>
</body>


<!-- Mirrored from code-theme.com by HTTrack Website Copier/3.x [XR/YP'2000] -->
</html>

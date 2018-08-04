
	<!-- STAR HEADER SEARCH -->
	<section id="hero-area" class="parallax-search overlay" data-stellar-background-ratio="0.5">
		<div class="hero-main">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="hero-inner">
							
							<!-- Welcome Text -->
							<div class="welcome-text">
								<h1>Cari kost mudah di Koseeker!</h1>
								<p>Cari kost, kontrakan, apartemen disekitar kampusmu</p>
							</div>
							<!--/ End Welcome Text -->

							<!-- Search Form -->
							<div class="trip-search">
								<form method="post" action="<?php echo base_url('search') ?>" class="form">
									<!-- Form Location -->
									<div class="form-group location">
										<div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-map-marker"></i>Kampus</span>
											<ul class="list">
												<li data-value="1" class="option selected ">TELKOM</li>
												<li data-value="2" class="option">ITB</li>
												<li data-value="3" class="option">UNPAD</li>
												<li data-value="3" class="option">UNIKOM</li>
												<li data-value="3" class="option">UNISBA</li>
												<li data-value="3" class="option">UNPAR</li>
											</ul>
										</div>
									</div>
									<!--/ End Form Location -->
									<!-- Form Property Type -->
									<div class="form-group">
										<div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-home"></i>Tipe</span>
											<ul class="list">
												<li data-value="1" class="option selected ">Kos-kosan</li>
												<li data-value="2" class="option">Kontrakan</li>
<!-- 												<li data-value="3" class="option">Apartemen</li> -->
											</ul>
										</div>
									</div>
									<!--/ End Form Property Type -->
									<!-- Form Property Status -->
									<div class="form-group duration">
										<div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-home"></i>Kategori</span>
											<ul class="list">
												<li data-value="1" class="option selected ">Putra</li>
												<li data-value="2" class="option">Putri</li>
												<li data-value="2" class="option">Putri/Putri</li>
											</ul>
										</div>
									</div>
									<!--/ End Form Property Status -->
									<!-- Form Bedrooms -->
									<div class="form-group">
										<div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-calendar" aria-hidden="true"></i>Jenis</span>
											<ul class="list">
												<li data-value="1" class="option selected">Harian</li>
												<li data-value="2" class="option">Bulanan</li>
												<li data-value="3" class="option">Tahunan</li>
											</ul>
										</div>
									</div>
									<!--/ End Form Bedrooms -->
									<!-- Form Bathrooms -->
									<div class="form-group">
										<div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-money" aria-hidden="true"></i>Range Harga</span>
											<ul class="list">
												<li data-value="1" class="option selected">5 - 10 Juta</li>
												<li data-value="2" class="option">10 - 15 Juta</li>
												<li data-value="2" class="option">15 - 20 Juta</li>
												<li data-value="2" class="option">20 - 30 Juta</li>
												<li data-value="2" class="option">30 - 50 Juta</li>
												<li data-value="2" class="option">50++ Juta</li>
											</ul>
										</div>
									</div>
									<!--/ End Form Bathrooms -->
									<!-- Form Button -->
									<div class="form-group button">
										<button type="submit" class="btn">Cari</button>
									</div>
									<!--/ End Form Button -->
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END HEADER SEARCH -->

	<!-- START SECTION RECENTLY PROPERTIES -->
	<section class="recently portfolio">
		<div class="container">
			<div class="section-title">
				<h3>Terbaru</h3>
				<h2>Properti</h2>
			</div>
			<div class="row portfolio-items">
			<?php foreach ($data_kos_terbaru as $dkt) { 
			?>
			

				<div class="item col-lg-4 col-md-6 col-xs-12 landscapes">
					<div class="project-single">
						<div class="project-inner project-head">
							<div class="project-bottom">
								<h4><a href="<?php echo base_url('detail/').$dkt->id_properti ?>">Lihat Properti</a><span class="category">Koseeker</span></h4>
							</div>
							<div class="button-effect">
								<a href="<?php echo base_url('detail/').$dkt->id_properti?>" class="btn"><i class="fa fa-link"></i></a>
								<a href="<?php echo $dkt->video_properti.'?autoplay=1' ?>" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
								<?php foreach ($data_foto as $df) {
								?>
								<a class="img-poppu btn" href="<?php echo $df->gambar ?>" data-rel="lightcase:myCollection:slideshow"><i class="fa fa-photo"></i></a>
								<?php
								} ?>
								
							</div>
							<div class="homes">
								<!-- homes img -->
								<a href="<?php echo base_url('detail/').$dkt->id_properti?>" class="homes-img">
									<div class="homes-tag button alt featured">Tersedia</div>
									<div class="homes-tag button alt sale"><?php echo $dkt->jenis_properti ?></div>
									<div class="homes-price"><?php echo $dkt->tipe_properti ?></div>
									<img src="<?php echo $dkt->thumbnail ?>" alt="home-1" class="img-responsive">
								</a>
							</div>
						</div>
						<!-- homes content -->
						<div class="homes-content">
							<!-- homes address -->
							<h3><?php echo $dkt->nama_properti ?></h3>
							<p class="homes-address mb-3">
								<a href="<?php echo base_url('detail/').$dkt->id_properti?>">
									<i class="fa fa-map-marker"></i><span><?php echo $dkt->alamat_properti ?></span>
								</a><br>
								<a href="<?php echo base_url('detail/').$dkt->id_properti?>">
									<?php if ($dkt->kategori_properti == "putra") {
									?>
									<i class="fa fa-male"></i>
									<?php
									}else if ($dkt->kategori_properti == "putri"){
										?>
									
									<i class="fa fa-female"></i>
										<?php
									}else{
										?>
									<i class="fa fa-male"><i class="fa fa-female"></i>	
									<?php
									} ?>
									<span><?php echo $dkt->kategori_properti ?></span>
								</a>
							</p>
							<!-- homes List -->
							<ul class="homes-list clearfix">
								<li>
									<i class="fa fa-bed" aria-hidden="true"></i>
									<span><?php echo $dkt->jumlah_kamar ?> Kamar kosong</span>
								</li>
								<li>
									<i class="fa fa-bath" aria-hidden="true"></i>
									<span>1 Kamar mandi</span>
								</li>
								<li>
									<i class="fa fa-object-group" aria-hidden="true"></i>
									<span>7x6 Meter</span>
								</li>
								<li>
									<i class="fas fa-warehouse" aria-hidden="true"></i>
									<span>1 Ruang tamu</span>
								</li>
							</ul>
							<!-- Price -->
							<div class="price-properties">
								<h3 class="title mt-3">
                                <a href="<?php echo base_url('detail/').$dkt->id_properti?>">Rp. <?php echo $dkt->harga_properti ?></a>
                                </h3>
							</div>
							<div class="footer">
								<!-- <button>jadwalkan survey</button> -->
								<center>
								<button class="btn">
								<a href="<?php echo base_url('survey') ?>">
									<i class="fa fa-user"></i> Jadwalkan Survey
								</a>
								</button>
								</center>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>

			</div>
			<br><br>
			<center><u><h5><a href="<?php echo base_url('lihat_semua') ?>">Lihat semua pilihan properti</a></h5></u></center>
		</div>
	</section>
	<!-- END SECTION RECENTLY PROPERTIES -->

	<!-- START SECTION SERVICES -->
	<section class="services-home bg-white">
		<div class="container">
			<div class="section-title">
				<h3>Jenis pilihan</h3>
				<h2>Properti</h2>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-12 m-top-0 m-bottom-40">
					<div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
						<div class="media">
							<i class="fa fa-home bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
						</div>
						<div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
							<h4 class="m-bottom-15 text-bold-700">Kost</h4>
							<p>Hunian sementara harian, bulanan dan tahunan. banyak pilihan kost yang bisa kamu pilih untuk kamu sewa.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-12 m-top-40 m-bottom-40">
					<div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
						<div class="media">
							<i class="fas fa-building bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
						</div>
						<div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
							<h4 class="m-bottom-15 text-bold-700">Apartment</h4>
							<p>Hunian dalam apartemen bisa kamu cari disini, dapatkan apartemen idamanmu. pilih tipe apartemen pilihanmu, dapatkan harga eksklusif</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-12 m-top-40 m-bottom-40 commercial">
					<div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
						<div class="media">
							<i class="fas fa-warehouse bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
						</div>
						<div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
							<h4 class="m-bottom-15 text-bold-700">Kontrakan</h4>
							<p>tempat tinggal bersama teman temanmu disekitar kampus, sewa tahunan dan bayar bersama teman-temanmu.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END SECTION SERVICES -->

	<!-- START SECTION FEATURED PROPERTIES -->
	<section class="featured portfolio">
		<div class="container">
			<div class="row">
				<div class="section-title col-md-5">
					<h3>pilihan</h3>
					<h2>Properti</h2>
				</div>
			</div>


			<div class="row portfolio-items">
				<?php for ($i=0; $i < 6 ; $i++) { 
				?>

				<div class="item col-lg-4 col-md-6 col-xs-12 landscapes sale">
					<div class="project-single">
						<div class="project-inner project-head">
							<div class="project-bottom">
								<h4><a href="<?php echo base_url('assets/') ?>properties-details.html">View Property</a><span class="category">Real Estate</span></h4>
							</div>
							<div class="button-effect">
								<a href="<?php echo base_url('assets/') ?>properties-details.html" class="btn"><i class="fa fa-link"></i></a>
								<a href="<?php echo base_url('assets/') ?>https://www.youtube.com/watch?v=2xHQqYRcrx4" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
								<a class="img-poppu btn" href="<?php echo base_url('assets/') ?>images/feature-properties/fp-1.jpg" data-rel="lightcase:myCollection:slideshow"><i class="fa fa-photo"></i></a>
							</div>
							<div class="homes">
								<!-- homes img -->
								<a href="<?php echo base_url('assets/') ?>properties-details.html" class="homes-img">
									<div class="homes-tag button alt featured">Featured</div>
									<div class="homes-tag button alt sale">For Sale</div>
									<div class="homes-price">Family Home</div>
									<img src="<?php echo base_url('assets/') ?>images/feature-properties/fp-1.jpg" alt="home-1" class="img-responsive">
								</a>
							</div>
						</div>
						<!-- homes content -->
						<div class="homes-content">
							<!-- homes address -->
							<h3>Real House Luxury Villa</h3>
							<p class="homes-address mb-3">
								<a href="<?php echo base_url('assets/') ?>properties-details.html">
									<i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park South, NYC</span>
								</a>
							</p>
							<!-- homes List -->
							<ul class="homes-list clearfix">
								<li>
									<i class="fa fa-bed" aria-hidden="true"></i>
									<span>6 Bedrooms</span>
								</li>
								<li>
									<i class="fa fa-bath" aria-hidden="true"></i>
									<span>3 Bathrooms</span>
								</li>
								<li>
									<i class="fa fa-object-group" aria-hidden="true"></i>
									<span>720 sq ft</span>
								</li>
								<li>
									<i class="fas fa-warehouse" aria-hidden="true"></i>
									<span>2 Garages</span>
								</li>
							</ul>
							<!-- Price -->
							<div class="price-properties">
								<h3 class="title mt-3">
                                <a href="<?php echo base_url('assets/') ?>properties-details.html">$ 230,000</a>
                                </h3>
								<div class="compare">
									<a href="<?php echo base_url('assets/') ?>#" title="Compare">
										<i class="fas fa-exchange-alt"></i>
									</a>
									<a href="<?php echo base_url('assets/') ?>#" title="Share">
										<i class="fas fa-share-alt"></i>
									</a>
									<a href="<?php echo base_url('assets/') ?>#" title="Favorites">
										<i class="fa fa-heart-o"></i>
									</a>
								</div>
							</div>
							<div class="footer"><center>
								<button class="btn">
								<a href="<?php echo base_url('assets/') ?>agent-details.html">
									<i class="fa fa-user"></i> Jadwalkan Survey
								</a>
								</button>
								</center>
							</div>
						</div>
					</div>
				</div>
				<?php
				} ?>

			</div>
			<br><br>
			<center><u><h5><a href="<?php echo base_url('lihat_semua') ?>">Lihat semua pilihan properti</a></h5></u></center>
			
		</div>
	</section>
	<!-- END SECTION FEATURED PROPERTIES -->

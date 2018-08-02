<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/dropzone.min.js') ?>"></script>
<body class="inner-pages">
	<!-- START SECTION HEADINGS -->
	<div class="header"></div>

	<section class="headings">
		<div class="text-heading text-center">
			<div class="container">
				<h1>Unggah properti disini ya bro</h1>
			</div>
		</div>
	</section>
	<!-- END SECTION HEADINGS -->

	<!-- START SECTION SUBMIT PROPERTY -->
	<section class="royal-add-property-area section_100">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="single-add-property">
						<h3>Deskripsi properti dan harga</h3>
						<div class="single-add-property">
						
					</div>
						<div class="property-form-group">
							<form method="POST" action="<?php echo base_url('tambah_data')?>">
								<div class="row">
									<div class="col-md-12">
										<p>
											<label for="title">Nama Properti</label>
											<input type="text" name="nama_properti" id="Name" placeholder="nama properti">
										</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<p>
											<label for="description">Deskripsi Properti</label>
											<textarea id="description" name="deskripsi_properti" placeholder="Deskripsi properti"></textarea>
										</p>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3 col-md-12">
										<label>	Status properti</label><br>	
										<select class="selectpicker" name="status_properti">
		  										<option value="Disewakan">Disewakan</option>
		  										<option value="dijual">Dijual</option>
										</select>
									</div>
									<div class="col-lg-3 col-md-12">	
										<label>	Tipe properti</label><br>	
										<select class="selectpicker" name="tipe_properti">
		  										<option value="Kost">Kost</option>
		  										<option value="Kontrakan">Kontrakan</option>
		  										<option value="Apartemen">Apartemen</option>
										</select>
									</div>
									<div class="col-lg-3 col-md-12">
										
										<label>	Jumlah Kamar </label><br>	
										<input type="text" name="jumlah_kamar" placeholder="0">
										<!-- <select class="selectpicker" name="jumlah_kamar"></select> -->
									</div>
									<div class="col-lg-3 col-md-12">
										<p class="no-mb last">
											<label for="area">Kampus</label><br>	
											<select class="selectpicker" name="kampus">
		  										<option value="telkom">TELKOM</option>
		  										<option value="itb">ITB</option>
		  										<option value="unikom">UNIKOM</option>
		  										<option value="unpad">UNPAD</option>
										</select>
										</p>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-12">
										<p class="no-mb">
											<label for="price">Harga Properti</label>
											<input type="text" name="harga_properti" placeholder="1.000.000" id="price">
										</p>
									</div>
									<div class="col-lg-6 col-md-12">
										<p class="no-mb last">
											<label for="area">Area/Wilayah</label>
											<input type="text" name="daerah_kampus" id="area">
										</p>
									</div>
								</div>
								<br>	
								<div class="row">
									<div class="col-lg-6 col-md-12">
										<p class="no-mb">
											<label for="price">Alamat</label>
											<!-- <input type="text" name="price" placeholder="USD" id="price"> -->
											<textarea name="alamat_properti"></textarea>
										</p>
									</div>
									
								</div>
						<br>	
								<!-- add -->
						<h3>Fasilitas Properti</h3>

							<div class="row">
								<div class="col-md-12">
									<ul class="pro-feature-add">
										<?php 	foreach ($properti as $p) {
										?>
											<li>
												<label>
													<input type="checkbox" name="feature[]" value="<?php echo $p->id_fasilitas_properti ?>" > <?php echo $p->nama_properti ?>
												</label>
											</li>
										<?php
										} ?>
									</ul>
								</div>
							</div>
								<!-- add -->
									<br>	
								<!-- add2 -->

							<div class="row">
								<div class="col-lg-4 col-md-12">
									<p>
										<label for="con-name">Nama Pemilik</label>
										<input type="text" placeholder="nama pemilik" id="con-name" name="nama_pemilik">
									</p>
								</div>
								<div class="col-lg-4 col-md-12">
									<p>
										<label for="con-user">Alamat</label>
										<input type="text" placeholder="Enter Your Username" id="con-user" name="alamat_pemilik">
									</p>
								</div>
								<div class="col-lg-4 col-md-12">
									<p class="no-mb last">
										<label for="con-phn">No. Hp</label>
										<input type="text" placeholder="nomor Hp" id="con-phn" name="noHp_pemilik">
									</p>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="dropzone"></div>
								</div>
							</div>
						
							<br>	
							<button type="submit" class="btn btn-danger">submit</button>
								<!-- add2 -->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END SECTION SUBMIT PROPERTY -->

<script type="text/javascript">

Dropzone.autoDiscover = false;

var foto_upload= new Dropzone(".dropzone",{
url: "<?php echo base_url('home/proses_upload') ?>",
maxFilesize: 2,
method:"post",
acceptedFiles:"image/*",
paramName:"userfile",
dictInvalidFileType:"Type file ini tidak dizinkan",
addRemoveLinks:true,
});


foto_upload.on("sending",function(a,b,c){
	a.token=Math.random();
	c.append("token_foto",a.token); 
});


foto_upload.on("removedfile",function(a){
	var token=a.token;
	$.ajax({
		type:"post",
		data:{token:token},
		url:"<?php echo base_url('home/remove_foto') ?>",
		cache:false,
		dataType: 'json',
		success: function(){
			console.log("Foto terhapus");
		},
		error: function(){
			console.log("Error");

		}
	});
});


</script>

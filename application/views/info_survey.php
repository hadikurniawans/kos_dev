
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<!-- START SECTION PROPERTIES LISTING -->
	<section class="properties-list featured portfolio blog"> 
		<div class="container">
			
  <h2>List request survey</h2>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>Nama</th>
        <th>No. Hp</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Kost Tujuan</th>
        <th>status</th>
      </tr>
    </thead>
    <tbody>
    	<?php foreach ($all_data_survey as $ads) {
    	?>
    	<tr>
        	<td><?php echo $ads->nama ?></td>
        	<td><?php echo $ads->no_hp ?></td>
        	<td><?php echo $ads->tanggal ?></td>
        	<td><?php echo $ads->jam ?></td>
        	<td><?php echo $ads->nama_kos ?></td>
        	<td><?php if ($ads->status == 0) { ?>
        		<a href="<?php echo base_url('selesai_survey/').$ads->id_penjadwalan ?>" class="btn btn-danger">done</a>
        		<!-- <button class="btn btn-danger">done</button> -->
        	<?php } else { ?>
        		sudah survey
        	<?php } ?>
        	</td>

      	</tr>
    	<?php
    	} ?>
    </tbody>
  </table>
		</div>
	 	
	 </section>
	<!-- END SECTION PROPERTIES LISTING -->
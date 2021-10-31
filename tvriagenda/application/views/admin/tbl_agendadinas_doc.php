<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="<?= base_url("template/admin/bower_components/bootstrap/dist/css/bootstrap.min.css") ?>">
	<title>LPP TVRI SUMATERA SELATAN</title>
</head>
<script type="text/javascript">window.print()</script>
<body>
	<div class="container">
		<div class="row">
		<h4>LPP TVRI SUMATERA SELATAN</h4>
		<h4>Bidang </h4>
		<hr/> 
			<center><h2>Surat Tugas</h2></center>
		<hr/> 
		<h4>Kepala Bidang Menugaskan nama nama yang tercantung di bawah ini Pada :</h4>
		<table id="example2">
			<tr>
			<td>Hari </td>
			<td> &nbsp;:&nbsp;<?= date("D d-m-Y");  ?></td>
			</tr>
			<tr>
			<td>Tanggal</td>
			<td>  &nbsp;:&nbsp;<?=  $dari  ?>  s/d  <?= $sampai ?></td>
			</tr>
		</table>
		<hr/> 
			<table id="example1" class="table table-bordered table-striped">
				<thead>
				<tr>
				<th>No</th>
				<th>Profesi</th>
				<th>Golongan</th>
				<th>Nama</th>
				<th>Keterangan</th>
				</tr>
				</thead>
				<tbody>
						<?php $im=0; $no=1;
						if(!empty($data))
						{
						  //print_r($data);
		
						  foreach($data as $admin) 
						  {
						   //print_r($admin);
		
						?>
						    
							<tr>
							<td><?= $no ?></td>
							<td><?= $admin->nama_unitkerja ?></td> 
							<td><?= $admin->nama_golruang ?></td> 
							<td><?= $admin->nama ?></td>
							
								<td>
								</td> 
							
								</tr>
								<?php $im++; $no++; 
						  }
						}
					?>
				</tbody>
			</table>
			
			<hr>
			<br>
			<h4>untuk melaksanakan tugas operasional penyiaran / penunjang penyiaran dengan baik.</h4>
			<h4>Demikian lah  surat tugas ini dibuat, agara dapat dilaksanakan dengan penuh disiplin dan Tanggung jawab.</h4>

			<br>
			<div style="float: right;">
				<h4>Palembang <?php echo date('d M Y'); ?></h4>
				<br>
				<h4>Kordinator</h4>
			</div>
</div>
</div>

</body>
</html>
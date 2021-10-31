
<div class="box box-warning box-solid" bis_skin_checked="1">
    
	<div class="box-header" bis_skin_checked="1">
		<h3 class="box-title">Kelola Data Agenda Disposisi</h3>
	</div>
	
	<?php //print_r($datacount); ?>
	<?= $this->session->flashdata('pesan') ?>
	
	<div class="box-body" bis_skin_checked="1">
	
		<br>
		<div style="padding-bottom: 10px;" '="" bis_skin_checked="1">
		</div>

		<div id="mytable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer" bis_skin_checked="1">

		<div class="dataTables_length" id="mytable_length" bis_skin_checked="1">

			<?= $this->session->flashdata('pesan') ?>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
				<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>Nama Agenda</th>
				<th>Jmlh Kegiatan</th>
				<th>Diverifikasi</th>
				<th>Ditolak</th>
				<th>Menunggu</th>
				<th>Disposisi</th>
				<th>Status Agenda</th>
				<th>Contact Person</th>
				<th>Aksi</th>
				</tr>
				</thead>
				<tbody>
				<?php $im=0; $no=1; foreach($data->result_array() as $admin): ?>
					<tr>
					<td><?= $no ?></td>
					<td><?= $admin['tanggal'] ?></td> 
					<td><?= $admin['nama_agenda'] ?></td> 
					<td><?php echo $datacount[$im]['jumlahkegiatan'];?></td> 
					<td><?php echo $datacount[$im]['jumlahapproved'];?></td> 
					<td><?php echo $datacount[$im]['jumlahreject'];?></td> 
					<td><?php echo $datacount[$im]['jumlahpending'];?></td>  
					<td><?php echo $datacount[$im]['jumlahwakil'];?></td>  
					<td><?php if($admin['status_agenda'] == "0"){ echo "Pending";}else if($admin['status_agenda'] == "1"){ echo "Disetujui/Approved";}else if($admin['status_agenda'] == "2"){ echo "Ditolak/Reject";}else{ echo "Pending";} ?></td>
					<td><?= $admin['contact_person'] ?></td> 
					<td>
					<a href="<?= base_url('agenda/disposisiagenda_kegiatan/'.$admin['id_agenda']) ?>" class="btn btn-info">List Kegiatan Disposisi</a> 
					</td> 
					</tr>
					<?php $im++; $no++; endforeach; ?>
				</tbody>
			</table>
		
		</div>
	</div>
</div>

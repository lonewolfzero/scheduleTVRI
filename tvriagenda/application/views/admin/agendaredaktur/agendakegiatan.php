
<div class="box box-warning box-solid" bis_skin_checked="1">
    
	<div class="box-header" bis_skin_checked="1">
		<h3 class="box-title">Kelola Data Agenda Kegiatan</h3>
	</div>
	
	
	
	<?php //print_r($datacount); ?>
	<?= $this->session->flashdata('pesan') ?>
	
	<div class="box-body" bis_skin_checked="1">
	
		<br>
		<div style="padding-bottom: 10px;" '="" bis_skin_checked="1">
			
			<a href="<?= base_url('agenda/kegiatan_tambah/'.$idm) ?>" class="btn btn-primary"><i class="fa fa-wpforms"></i>Tambah Agenda Kegiatan</a>
		
		</div>

		<div id="mytable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer" bis_skin_checked="1">

		<div class="dataTables_length" id="mytable_length" bis_skin_checked="1">

		<br/>
		<br/>
		<table>
		<tr>
		<td>Tanggal Agenda </td><td>: <?= $tanggal ?></td>
		</tr>
		<tr>
		<td>Nama Agenda </td><td>: <?= $nama_agenda ?></td>
		</tr>
		<tr>
		<td>Contact </td><td>: <?= $contact_person ?></td>
		</tr>
		</table>
		<br /><br />
		<?= $this->session->flashdata('pesan') ?>
		<table id="example1" class="table table-bordered table-striped">
			<thead>
		<tr>
			<th>No</th>
			<th>Tgl Kegiatan</th>
			<th>Jam Mulai</th>
			<th>Jam Selesai</th>
			<th>Nama Kegiatan</th>
			<th>Lokasi Kegiatan</th>
			<th>Keterangan</th>
			<th>Nama Pejabat</th>
			<th>Status Verifikasi</th>
			<th>Aksi</th>
			</tr>
			</thead>
			<tbody>
			<?php $no=1; foreach($data->result_array() as $admin): ?>
				<tr>
				<td><?= $no ?></td>
				<td><?= $admin['tanggal'] ?></td> 
				<td><?= $admin['jam_mulai'] ?></td> 
				<td><?= $admin['jam_selesai'] ?></td> 
				<td><?= $admin['nama_kegiatan'] ?></td> 
				<td><?= $admin['lokasi_kegiatan'] ?></td> 
				<td><?= $admin['informasi'] ?></td> 
				<td><?= $admin['nama_pejabat'] ?></td>
				<td><?php if($admin['status_kegiatan'] == "0"){ echo "Pending";}else if($admin['status_kegiatan'] == "1"){ echo "Disetujui/Approved";}else if($admin['status_kegiatan'] == "2"){ echo "Ditolak/Reject";}else{ echo "Pending";} ?></td>
				
				<td>
				<a href="<?= base_url('agenda/kegiatan_detail/'.$admin['id_kegiatan'].'/'.$admin['id_agenda']) ?>" class="btn btn-info">Detail</a> 
				<a href="<?= base_url('agenda/kegiatan_edit/'.$admin['id_kegiatan'].'/'.$admin['id_agenda']) ?>" class="btn btn-info">Edit</a> 
				<a href="<?= base_url('agenda/kegiatan_hapus/'.$admin['id_kegiatan'].'/'.$admin['id_agenda']) ?>" onclick="return(confirm('Are You Sure Want Delete ?'))" class="btn btn-danger">Hapus</a>
				</td> 
				</tr>
				<?php $no++; endforeach; ?>
			</tbody>
		</table>

		</div>
	</div>
</div>
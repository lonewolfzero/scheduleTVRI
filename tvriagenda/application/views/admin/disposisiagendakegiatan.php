
<div class="box box-warning box-solid" bis_skin_checked="1">
    
	<div class="box-header" bis_skin_checked="1">
		<h3 class="box-title">Kelola Data Agenda Disposisi</h3>
	</div>
	
	
	<?php //print_r($datacount); ?>
	<?= $this->session->flashdata('pesan') ?>
	
	<div class="box-body" bis_skin_checked="1">
	
		<br>
		<div style="padding-bottom: 10px;" '="" bis_skin_checked="1">

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
		</div>

		<div id="mytable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer" bis_skin_checked="1">

		<div class="dataTables_length" id="mytable_length" bis_skin_checked="1">

				<?= $this->session->flashdata('pesan') ?>
				<table id="example1" class="table table-bordered table-striped">
					<thead>
				<tr>
					<th>No</th>
					<th>Tgl</th>
					<th>Jam Mulai</th>
					<th>Jam Selesai</th>
					<th>Nama Kegiatan</th>
					<th>Lokasi Kegiatan</th>
					<th>Pemberi Disposisi</th>
					<th>Penerima Disposisi</th>
					<th>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php $im=0; $no=1; foreach($data->result_array() as $admin): ?>
						<tr>
						<td><?= $no ?></td>
						<td><?= $admin['tanggal'] ?></td> 
						<td><?= $admin['jam_mulai'] ?></td> 
						<td><?= $admin['jam_selesai'] ?></td> 
						<td><?= $admin['nama_kegiatan'] ?></td> 
						<td><?= $admin['lokasi_kegiatan'] ?></td> 
						<td><?= $admin['nama'] ?></td> 
						<td><?= $datacount[$im]['nama_penerima'] ?></td>
						<td>
							<?php if($admin['status_kegiatan'] == "3"){ ?>
									<a href="<?= base_url('agenda/wakilkan_kegiatan/'.$admin['id_kegiatan'].'/'.$admin['id_agenda']) ?>" class="btn btn-info">Disposisi</a> 
							<?php } ?>
						</td> 
						</tr>
						<?php $im++; $no++; endforeach; ?>
					</tbody>
				</table>


			</div>
	</div>
</div>
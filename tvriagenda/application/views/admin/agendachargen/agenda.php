
<div class="box box-warning box-solid" bis_skin_checked="1">
    
<div class="box-header" bis_skin_checked="1">
	<h3 class="box-title">Kelola Data Agenda Kegiatan Chargen</h3>
</div>



<?php //print_r($datacount); ?>
<?= $this->session->flashdata('pesan') ?>

<div class="box-body" bis_skin_checked="1">

	<br>
	<div style="padding-bottom: 10px;" '="" bis_skin_checked="1">
		<a href="<?= base_url('agendachargen/agenda_tambah/') ?>" class="btn btn-danger btn-sm"><i class="fa fa-wpforms"></i> Tambah Agenda Chargen</a>
		<?php echo anchor(site_url('agendachargen/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
		<?php echo anchor(site_url('agendachargen/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?>

	</div>

	<div id="mytable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer" bis_skin_checked="1">

	<div class="dataTables_length" id="mytable_length" bis_skin_checked="1">

			<table id="example1" class="table table-bordered table-striped">
				<thead>
				<tr>
				<th>No</th>
				<th>Tanggal/Jam</th>
				<th>Nama Agenda</th>
				<th>Lokasi Agenda</th>
				<th>Contact Person</th>
				<th>PIC</th>
				<th>Sebagai</th>
				<th>Absen/Dinas</th>
				<th>Status</th>
				<th>Aksi</th>
				</tr>
				</thead>
				<tbody>
				<?php $im=0; $no=1; foreach($data->result_array() as $admin): ?>
						<?php 
						$tanggal=date("d/m/Y", strtotime($admin['tanggal']));
						$jam=substr($admin['jam_mulai'],0,2);
						$menit=substr($admin['jam_mulai'],3,2);
						
						$jam2=substr($admin['jam_selesai'],0,2);
						$menit2=substr($admin['jam_selesai'],3,2);
						?>
					<tr>
					<td><?= $no ?></td>
					<td><?php echo $tanggal." ".$jam.":".$menit." - ".$jam2.":".$menit2 ?></td> 
					<td><?= $admin['nama_agenda'] ?></td> 
					<td><?= $admin['lokasi_agenda'] ?></td> 
					<td><?= $admin['contact_person'] ?></td>
					
					<td>
						<?= @$datacount[$im]['pegawai'][0]['nama'] ?>
					</td> 
					<td>
						<?= $admin['sebagai'] ?>
					</td> 
					<td>
						<?php 
							if($admin['status_hadir']==1)
							{
								echo "Hari Ini/Hari Dinas";
							} 
							else if($admin['status_hadir']==2)
							{
								echo "Hari Libur";
							} 
							else if($admin['status_hadir']==3)
							{
								echo "Izin";
							} 
							else if($admin['status_hadir']==4)
							{
								echo "Off";
							} 
						?>
					</td> 
					<td>
						<?php 
							if($admin['status_agenda']==0)
							{
								echo "Terjadwal";
							} 
							else if($admin['status_agenda']==1)
							{
								echo "Approved";
							} 
							else if($admin['status_agenda']==2)
							{
								echo "Reject";
							} 
							else if($admin['status_agenda']==3)
							{
								echo "Disposisi/Diwakilkan";
							} 
						?>
					</td> 
					<td>
					
					<a href="<?= base_url('agendachargen/agenda_detail/'.$admin['id_agenda']) ?>" class="btn btn-info"> <i class="fa fa-eye"></i></a> 
					<a href="<?= base_url('agendachargen/agenda_edit/'.$admin['id_agenda']) ?>" class="btn btn-info"> <i class="fa fa fa-pencil-square-o"></i></a> 
					<a href="<?= base_url('agendachargen/agenda_hapus/'.$admin['id_agenda']) ?>" onclick="return(confirm('Are You Sure Want Delete ?'))"  class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
					</td> 
					</tr>
					<?php $im++; $no++; endforeach; ?>
				</tbody>
			</table>


		</div>
	</div>
</div>

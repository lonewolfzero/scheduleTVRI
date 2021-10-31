<?php if($depan == TRUE): ?>
<table class="table table-striped">
  <form action="" method="POST">
   <tr><th>Dari</th><td><input type="date" name="dari" class="form-control" required=""></td></tr>
   <tr><th>Sampai</th><td><input type="date" name="sampai" class="form-control" required=""></td></tr>
   <tr>
		<th>NIP Pegawai</th>
		<td>
			<select name="nip" id="nip" class="form-control select2" required="" style="width:1100px;">
				<?php if($aksi !== "edit"){?> <option value="">--Pilih Data Pegawai--</option> <?php } ?>
				<?php foreach($pegawai as $jab): 
				?>

					<option value="<?= $jab['id_pegawai'] ?>"><?= ucfirst($jab['nip']) ?> - <?= ucfirst($jab['nama']) ?></option>
				<?php endforeach; ?>	
			</select>
		</td>
   </tr>
   <tr><th></th><td><input type="submit" name="cari" class="btn btn-primary"></td></tr>
</form>
</table>

<?php elseif($depan == FALSE): ?>

<?php if($cetak == TRUE ): ?>

<a href="<?= base_url('laporanagenda/cetak_laporan_agendapegawai/'.$this->input->post('dari').'/'.$this->input->post('sampai').'/'.$this->input->post('nip')) ?>" class="btn btn-primary">Cetak</a>
<?php elseif($cetak == FALSE): ?>
<script type="text/javascript">window.print()</script>
<link rel="stylesheet" href="<?= base_url('/template/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
<center>
  <h2><?= ucfirst($judul) ?></h2>
   <hr />
<span color="red"><i>Dicetak Pada Dari <?= tgl_indonesia(date("Y-m-d")) ?></i></span>
</center>

<?php endif; ?>


<br /><br /><br />
<?= $this->session->flashdata('pesan') ?>
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
				<th>Status</th>
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
				 </tr>
                 <?php $no++; endforeach; ?>
				 <tr>
				  <td>Bagian 2</td>
				 </tr>
				 <?php foreach($data2->result_array() as $admin): ?>
					<?php 
					        $state=1;
							foreach($data->result_array() as $admin2)
							{
							
								if($admin['tanggal']==$admin2['tanggal'] && $admin['jam_mulai']==$admin2['jam_mulai'] && $admin['jam_selesai']==$admin2['jam_selesai'])
								{
									$state=0;
									break;
								}
							}
							
							   if($state==1)
							   {
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
							}
							
							?>
					</td> 
				 </tr>
                 <?php $no++; endforeach; ?>
                 </tbody>
               </table>
<?php endif; ?>
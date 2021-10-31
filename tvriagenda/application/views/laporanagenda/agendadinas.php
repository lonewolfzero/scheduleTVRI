<?php if($depan == TRUE): ?>
<table class="table table-striped">
  <form action="" method="POST">
   <tr><th>Dari</th><td><input type="date" name="dari" class="form-control" required=""></td></tr>
   <tr><th>Sampai</th><td><input type="date" name="sampai" class="form-control" required=""></td></tr>
   <tr><th></th><td><input type="submit" name="cari" class="btn btn-primary"></td></tr>
</form>
</table>

<?php elseif($depan == FALSE): ?>

<?php if($cetak == TRUE ): ?>

<a href="<?= base_url('laporanagenda/worddinas/'.$this->input->post('dari').'/'.$this->input->post('sampai')) ?>" class="btn btn-primary">Cetak</a>
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
				<th>Profesi</th>
				<th>Golongan</th>
				<th>Nama</th>
				<th>Keterangan</th>
				</tr>
				</thead>
				<tbody>
						<?php $im=0; $no=1;
						
						//print_r($data->result_array());
						
						if(!empty($data))
						{
						  //print_r($data);
		
						  foreach($data->result_array() as $admin) 
						  {
						     $queryunitkerja = $this->db->query("SELECT nama_unitkerja FROM unitkerja WHERE id_unitkerja='".$admin['id_unitkerja']."'");
							 $rowunitkerja = $queryunitkerja->row();
							 
							 $querygolruang= $this->db->query("SELECT nama_golruang FROM golruang WHERE id_golruang='".$admin['id_unitkerja']."'");
							 $rowgolruang = $querygolruang->row();
						?>
						    
							<tr>
							<td><?= $no ?></td>
							<td><?= $rowunitkerja->nama_unitkerja ?></td> 
							<td><?= $rowgolruang->nama_golruang ?></td> 
							<td><?= $admin['nama'] ?></td>
							
								<td>
								</td> 
							
								</tr>
								<?php $im++; $no++; 
						  }
						}
					?>
				</tbody>
               </table>
<?php endif; ?>
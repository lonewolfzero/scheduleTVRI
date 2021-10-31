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

<a href="<?= base_url('laporanagenda/cetak_laporan_deputiagenda/'.$this->input->post('dari').'/'.$this->input->post('sampai')) ?>" class="btn btn-primary">Cetak</a>
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
                        <th>Nama Satuan Kerja</th>
						<th>Jumlah Agenda</th>
                       </tr>
                      </thead>
                      <tbody>
                      <?php $im=0;  $no=1; foreach($data->result_array() as $admin): ?>
                      <tr>
						<td><?= $no ?></td>
						<td><?= $admin['nama_deputi'] ?></td>
						<td>
						 <?php 
						   $jum1=0;
						   $jum2=0;
						   if(!empty($datacount[$im]['pegawaicount']))
						   {
							  $jum1=$datacount[$im]['pegawaicount'];
						   }

						   if(!empty($datacount[$im]['agendapegawaicount']))
						   {
							  $jum2=$datacount[$im]['agendapegawaicount'];
						   }						   
						  
						   $jumtotal=$jum1+$jum2;
						   echo $jumtotal;
						 ?>
						</td> 
                      </tr>

                      <?php $im++; $no++; endforeach; ?>
                      
                      </tbody>
               </table>
<?php endif; ?>
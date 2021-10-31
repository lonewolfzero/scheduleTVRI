<?php if($print == TRUE):
$nilai="
<script>window.print()</script>
<link rel=\"stylesheet\" href=\"".base_url('/template/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')."\">
<h2>Laporan Data Pegawai </h2><hr />";
elseif($print == FALSE):
$nilai='<a href="'.base_url('laporan/laporan_pegawai_print').'" class="btn btn-primary"><i class="fa fa-print"></i>Cetak</a>
<br /><br /><br />';
endif;
echo $nilai;

?>  
<?= $this->session->flashdata('pesan') ?>
 <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
				  <th>No</th>
				  <th>Nip</th>
				  <th>Nama</th>
				  <th>Nama Jabatan</th>
				  <th>No HP</th>
				</tr>
                </thead>
                 <tbody>
                 <?php $no=1; foreach($data->result_array() as $admin): ?>
                  <tr>
				<td><?= $no ?></td>
				<td><?= $admin['nip'] ?></td> 
				<td><?= $admin['nama'] ?></td> 
				<td><?= $admin['nama_jabatan'] ?></td>
				<td><?= $admin['nohp'] ?></td>
				</tr>
                 <?php $no++; endforeach; ?>
                 </tbody>
               </table>
 
 
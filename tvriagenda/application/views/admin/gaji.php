<div class="box box-warning box-solid" bis_skin_checked="1">
    
<div class="box-header" bis_skin_checked="1">
	<h3 class="box-title">Kelola Data Gaji</h3>
</div>



<?php //print_r($datacount); ?>
<?= $this->session->flashdata('pesan') ?>

<div class="box-body" bis_skin_checked="1">

	<br>
	<div style="padding-bottom: 10px;" '="" bis_skin_checked="1">
      <a href="<?= base_url('admin/gaji_tambah/') ?>" class="btn btn-primary"><i class="fa fa-wpforms"></i>Set Gaji</a>
   </div>

  <div id="mytable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer" bis_skin_checked="1">

  <div class="dataTables_length" id="mytable_length" bis_skin_checked="1">
      <?= $this->session->flashdata('pesan') ?>
      <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Nip</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Foto</th>
                        <th>Nama Jabatan</th>
                        <th>Jumlah Gaji</th>
                        <th>Status Kepegawaian</th>
                        <th>Alamat Lengkap</th>
                        <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $no=1; foreach($data->result_array() as $admin): ?>
                      <tr>
                      <td><?= $no ?></td>
                      <td><?= $admin['nip'] ?></td> 
                      <td><?= $admin['nama'] ?></td> 
                      <td><?php if($admin['jk'] == "L"){ echo "Laki-Laki";}else{ echo "Perempuan";} ?></td>
                      <td><?= $admin['agama'] ?></td>
                      <td><img src="<?= base_url('template/data/'.$admin['foto']) ?>" class="img-responsive" style="width: 100px;height: 100xp"></td>
                      <td><?= $admin['nama_jabatan'] ?></td>
                      <td>Rp .<?= number_format($admin['jumlah']) ?></td>
                      <td><?= $admin['status_kep'] ?></td>
                      <td><?= $admin['alamat'] ?></td>
                      <td><a href="<?= base_url('admin/gaji_hapus/'.$admin['id_gaji']) ?>" onclick="return(confirm('Are You Sure Want Delete ?'))" class="btn btn-danger">Hapus</a></td> 
                      </tr>
                      <?php $no++; endforeach; ?>
                      </tbody>
               </table>


      </div>
	</div>
</div>
 
 
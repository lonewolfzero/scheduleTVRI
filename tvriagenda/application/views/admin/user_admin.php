<div class="box box-warning box-solid" bis_skin_checked="1">
    
    <div class="box-header" bis_skin_checked="1">
      <h3 class="box-title">Kelola Data Hak Akses Level</h3>
    </div>
    
    
    
    <?php //print_r($datacount); ?>
    <?= $this->session->flashdata('pesan') ?>
    
    <div class="box-body" bis_skin_checked="1">
    
      <br>
      <div style="padding-bottom: 10px;" '="" bis_skin_checked="1">
          <a href="<?= base_url('admin/user_admin_tambah/') ?>" class="btn btn-danger  btn-sm"><i class="fa fa-wpforms"></i> Tambah  Hak Akses</a>
      </div>

    	<div id="mytable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer" bis_skin_checked="1">

    	<div class="dataTables_length" id="mytable_length" bis_skin_checked="1">
		<table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Hak Akses</th>
                        <th>Log Akses</th>
                        <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $no=1; foreach($data->result_array() as $admin): ?>
                      <tr>
                      <td><?= $no ?></td>
                      <td><?= $admin['username'] ?></td> 
                      <td><?= @$admin['nip'] ?></td> 
                      <td><?= $admin['nama'] ?></td>
                      <td><?php 
					         if($admin['level']=="admin")
							 {
								 echo "Admin";
							 }
							 else if($admin['level']=="sespri")
							 {
								 echo "Sespri";
							 }
							 else if($admin['level']=="user")
							 {
								 echo "Pejabat";
							 }
							 else if($admin['level']=="pegawai")
							 {
								 echo "Pegawai";
							 }
								 
						  ?>
					  </td>
                      <td><?= $admin['log'] ?></td>
                      <td><a href="<?= base_url('admin/user_admin_edit/'.$admin['id_admin']) ?>" class="btn btn-info"><i class="fa fa fa-pencil-square-o"></i></a> 
                          <a href="<?= base_url('admin/user_admin_hapus/'.$admin['id_admin']) ?>" onclick="return(confirm('Are You Sure Want Delete ?'))" class="btn btn-danger"><i class="fa fa-trash-o"></a></td> 
                      </tr>
                      <?php $no++; endforeach; ?>
                      </tbody>
                    </table>

      </div>
	</div>
</div>


 
 
 
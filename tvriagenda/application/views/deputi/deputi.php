
<div class="box box-warning box-solid" bis_skin_checked="1">
    
    <div class="box-header" bis_skin_checked="1">
      <h3 class="box-title">Satuan Kerja</h3>
    </div>
    
    
    
    <?php //print_r($datacount); ?>
    <?= $this->session->flashdata('pesan') ?>
    
    <div class="box-body" bis_skin_checked="1">
    
      <br>
      <div style="padding-bottom: 10px;" '="" bis_skin_checked="1">      
          <a href="<?= base_url('deputi/deputi_tambah/') ?>" class="btn btn-danger btn-sm"><i class="fa fa-wpforms"></i> Tambah</a>
          <?php echo anchor(site_url('deputi/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
	      	<?php echo anchor(site_url('deputi/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?>

      </div>

	    <div id="mytable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer" bis_skin_checked="1">

	  <div class="dataTables_length" id="mytable_length" bis_skin_checked="1">
      <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Satuan Kerja</th>
                        <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php $no=1; foreach($data as $admin): ?>
                      <tr>
                      <td><?= $no ?></td>
                      <td><?= $admin['nama_deputi'] ?></td>
                      <td>
                      <a href="<?= base_url('deputi/deputi_edit/'.$admin['id_deputi']) ?>" class="btn btn-info"><i class="fa fa fa-pencil-square-o"></i></a> 
                      <a href="<?= base_url('deputi/deputi_hapus/'.$admin['id_deputi']) ?>" onclick="return(confirm('Are You Sure Want Delete ?'))" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td> 
                      </tr>

                      <?php $no++; endforeach; ?>
                      
                      </tbody>
                    </table>
      </div>
	  </div>
</div>


 
 
 
      
<div class="box box-warning box-solid" bis_skin_checked="1">
    
    <div class="box-header" bis_skin_checked="1">
      <h3 class="box-title">Kelola Data Agenda Reject</h3>
    </div>
    
    
    
    <?php //print_r($datacount); ?>
    <?= $this->session->flashdata('pesan') ?>
    
    <div class="box-body" bis_skin_checked="1">
    
      <br>
      <div style="padding-bottom: 10px;" '="" bis_skin_checked="1">
        <a href="<?= base_url('agenda/agenda_tambah/') ?>" class="btn btn-primary"><i class="fa fa-wpforms"></i>Tambah</a>
      </div>

      <div id="mytable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer" bis_skin_checked="1">

      <div class="dataTables_length" id="mytable_length" bis_skin_checked="1">
      <?= $this->session->flashdata('pesan') ?>
      <table id="example1" class="table table-bordered table-striped">
          <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Agenda</th>
            <th>Lokasi Agenda</th>
            <th>Status</th>
            <th>Contact Person</th>
            <th>Nama Penangung Jawab</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
          <?php $no=1; foreach($data->result_array() as $admin): ?>
          <tr>
          <td><?= $no ?></td>
          <td><?= $admin['tanggal'] ?></td> 
          <td><?= $admin['nama_kegiatan'] ?></td> 
          <td><?= $admin['lokasi_kegiatan'] ?></td> 
          <td><?php if($admin['status_kegiatan'] == "0"){ echo "Pending";}else if($admin['status_kegiatan'] == "1"){ echo "Disetujui/Approved";}else if($admin['status_kegiatan'] == "2"){ echo "Ditolak/Reject";}else{ echo "Pending";} ?></td>
          <td><?= $admin['contact_person'] ?></td> 
          <td><?= $admin['nama_pejabat'] ?></td>
          <td>
          <a href="<?= base_url('agenda/agenda_detail/'.$admin['id_agenda']) ?>" class="btn btn-info"><i class="fa fa-eye"></i></a> 
          <a href="<?= base_url('agenda/agenda_edit/'.$admin['id_agenda']) ?>" class="btn btn-info"><i class="fa fa fa-pencil-square-o"></i></a> 
          <a href="<?= base_url('agenda/agenda_hapus/'.$admin['id_agenda']) ?>" onclick="return(confirm('Are You Sure Want Delete ?'))"  class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
          </td> 
          </tr>
          <?php $no++; endforeach; ?>
          </tbody>
        </table>
        </div>
	</div>
</div>
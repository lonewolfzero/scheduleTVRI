
<div class="box box-warning box-solid" bis_skin_checked="1">
    
    <div class="box-header" bis_skin_checked="1">
        <h3 class="box-title">Data TPP</h3>
    </div>
    
    
    
    <?php //print_r($datacount); ?>
    <?= $this->session->flashdata('pesan') ?>
    
    <div class="box-body" bis_skin_checked="1">
    
        <br>
    <div style="padding-bottom: 10px;" '="" bis_skin_checked="1">
    </div>

    <div id="mytable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer" bis_skin_checked="1">

    <div class="dataTables_length" id="mytable_length" bis_skin_checked="1">

        <form action="" method="POST"> 
        <table class="table table-striped">
          <thead>
            <th></th>
          </thead>
          <?php foreach($pegawai->result_array() as $peg); 
              if($peg['jk'] == "L"){
                $jk="Laki -Laki";
              }elseif($peg['jk'] == "P"){
                $jk="Perempuan";
              }else{
                $jk="Tidak Di Kenali";
              }

          ?>
          <tr><td>Nip</td><th><input type="text" value="<?= $peg['nip'] ?>" class="form-control" disabled></th></tr> 
          <input type="hidden" name="id_pegawai" value="<?= $peg['id_pegawai'] ?>">
          <tr><td>Nama Pegawai</td><th><input type="text" value="<?= $peg['nama'] ?>" name="id_pegawai" class="form-control" value="<?= $peg['id_pegawai'] ?>" disabled></th></tr>
            <tr><td>Jenis Kelamin</td><th><input type="text" value="<?= $jk ?>" class="form-control" disabled></th></tr>
            <tr><td>Foto</td><td><img src="<?= base_url('template/data/'.$peg['foto']) ?>" class="img-responsive" style="width: 100px;height: 100xp"></td></tr>
            <tr><td>Jabatan </td><td><input type="text" value="<?= $peg['nama_jabatan'] ?>" class="form-control" disabled></td></tr>
            <tr><td>Status Kepegawaian</td><td><input type="text" value="<?= $peg['status_kep'] ?>" class="form-control" disabled></td></tr>
            <tr><td>Jumlah Tunjangan Pegawai</td><td><input type="number" name="jumlah" value="" class="form-control" placeholder="Masukan Hasil Tunjangan Pegawai.."></td></tr>
            <tr><td></td><td><input type="submit" value="Cetak Data Tunjangan" onclick="return(window.print())" class="btn btn-info">&nbsp;<input type="reset" name="batal" value="Batal" class="btn btn-danger"></td></tr>
        </table>
        </form>

        </div>
	</div>
</div>
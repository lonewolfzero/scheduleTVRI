         
<div class="box box-warning box-solid" bis_skin_checked="1">
    
    <div class="box-header" bis_skin_checked="1">
        <h3 class="box-title">Data Profil Pegawai</h3>
    </div>
    
    
    
    <?php //print_r($datacount); ?>
    <?= $this->session->flashdata('pesan') ?>
    
    <div class="box-body" bis_skin_checked="1">
    
        <br>
    <div style="padding-bottom: 10px;" '="" bis_skin_checked="1">
    </div>

    <div id="mytable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer" bis_skin_checked="1">

    <table class="table table-striped">
         <form action="" method="POST" enctype="multipart/form-data"> 

            <tr><th>Nip/NIK</th><td><input type="text" name="nip" value="<?= $nip ?>" class="form-control" required='' readonly></td></tr>
            <tr><th>Nama</th><td><input type="text" name="nama" value="<?= $nama ?>" class="form-control" required='' readonly></td></tr>
            <tr><th>Foto</th><td>
            <?php
               if($aksi == "edit")
			   {
                  echo '<img src="'.base_url('/template/data/'.$foto).'" class="img-responsive" style="width:130px;height:130px">';
               }
			   else
			   {
				  
               }
            ?>
            <input type="file" name="foto" class="form-control"></td></tr>
            <tr><th>Alamat</th><td><textarea name="alamat"  class="form-control"><?= $alamat ?></textarea></td></tr>
            <tr><th>Agama</th><td><input type="text" name="agama" value="<?= $agama ?>" class="form-control"></td></tr>
            <tr><th>Pendidikan</th><td><input type="text" name="pendidikan" value="<?= $pendidikan ?>" class="form-control"></td></tr>
            <tr><td></td><td><input type="submit" name="kirim" class="btn bnt-primary" value="Submit">&nbsp;&nbsp;&nbsp;
                              <input type="reset" name="" value="Batal" class="btn btn-danger"></td></tr>
         </form>

         </table> 

      </div>
	</div>
</div>
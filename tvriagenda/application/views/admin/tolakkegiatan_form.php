                
<div class="box box-warning box-solid" bis_skin_checked="1">
    
    <div class="box-header" bis_skin_checked="1">
        <h3 class="box-title">Data Tolak Kegiatan</h3>
    </div>
    
    
    
    <?php //print_r($datacount); ?>
    <?= $this->session->flashdata('pesan') ?>
    
    <div class="box-body" bis_skin_checked="1">
    
        <br>
    <div style="padding-bottom: 10px;" '="" bis_skin_checked="1">
    </div>

    <table class="table table-striped">
                <form action="" method="POST" enctype="multipart/form-data"> 
                
                <tr><th>Tanggal</th><td><input type="date" name="tanggal" value="<?= $tanggal ?>" class="form-control" required="" readonly></td></tr>
                <tr><th>Jam Mulai</th><td><input type="time" name="jam_mulai" value="<?= $jam_mulai ?>" class="form-control" required="" readonly></td></tr>
                <tr><th>Jam Selesai</th><td><input type="time" name="jam_selesai" value="<?= $jam_selesai ?>" class="form-control" required="" readonly></td></tr>
                <tr><th>Nama Kegiatan</th><td><input type="text" name="nama_kegiatan" value="<?= $nama_kegiatan ?>" class="form-control" required="" readonly></td></tr>
                <tr><th>Lokasi Kegiatan </th><td><textarea name="lokasi_kegiatan" class="form-control" required="" readonly><?= $lokasi_kegiatan ?></textarea></td></tr>
                <tr><th>Status Kegiatan</th><td><input type="text" name="tipestatus_kegiatan" value="<?= $tipestatus_kegiatan ?>" class="form-control" required="" readonly></td></tr>
                </table>
                Optional
                <hr>
                <br>
                <table class="table table-striped">
                <tr><th>Contact Person</th><td><input type="text" name="contact_person" value="<?= $contact_person ?>" class="form-control" required="" readonly></td></tr>
                <tr><th>Informasi</th><td><textarea name="informasi" class="form-control" required="" readonly><?= $informasi ?></textarea></td></tr>
                <tr><th>Nama Penangung Jawab</th><td><input type="text" name="nama_pejabat" value="<?= $nama_pejabat ?>" class="form-control" required="" readonly></td></tr>
                </table>

                Alasan Penolakan
                <hr>
                <br>
                <table class="table table-striped">
                <tr><th>Data Penolakan</th><td><textarea name="alasan_penolakan" class="form-control" required=""><?= $alasan_penolakan ?></textarea></td></tr>
                <tr><td></td><td><input type="submit" name="kirim" value="Submit" class="btn btn-primary"> &nbsp;&nbsp;<input type="reset" name="g" value="Batal" class="btn btn-danger"></td></tr>
                </form>
                </table>
                <?php 
                if($aksi == "edit"):
                ?>	
                <span><i>Kosongkan gambar jika tidak ingin diganti.</i></span>
                <?php endif; ?>

                </div>
	</div>
</div>
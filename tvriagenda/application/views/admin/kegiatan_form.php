				
<div class="box box-warning box-solid" bis_skin_checked="1">
    
    <div class="box-header" bis_skin_checked="1">
        <h3 class="box-title">Data Kegiatan</h3>
    </div>
    
    
    
    <?php //print_r($datacount); ?>
    <?= $this->session->flashdata('pesan') ?>
    
    <div class="box-body" bis_skin_checked="1">
    
        <br>
    <div style="padding-bottom: 10px;" '="" bis_skin_checked="1">
    </div>

	<table class="table table-striped">
				<form action="" method="POST" enctype="multipart/form-data"> 
				
				<tr><th>Tanggal</th><td><input type="date" name="tanggal" value="<?= $tanggal ?>" class="form-control" required=""></td></tr>
				<tr><th>Jam Mulai</th><td><input type="time" name="jam_mulai" value="<?= $jam_mulai ?>" class="form-control" required=""></td></tr>
				<tr><th>Jam Selesai</th><td><input type="time" name="jam_selesai" value="<?= $jam_selesai ?>" class="form-control" required=""></td></tr>
				<tr><th>Nama Kegiatan</th><td><input type="text" name="nama_kegiatan" value="<?= $nama_kegiatan ?>" class="form-control" required=""></td></tr>
				<tr><th>Lokasi Kegiatan </th><td><textarea name="lokasi_kegiatan" class="form-control" required=""><?= $lokasi_kegiatan ?></textarea></td></tr>

				<tr><th>Status Kegiatan</th><td><select class="form-control" name="tipestatus_kegiatan" required="">
											<option value="Private">Private</option>
											<option value="Public">Public</option>
											</select></td></tr>
											
				<tr>
					<th>Pemberi Wewenang Kegiatan Pejabat</th>
					<td>
						<select name="id_pegawai" class="form-control" required="">
							<?php if($aksi !== "edit"){?> <option value="">--Pilih Data Pejabat--</option> <?php } ?>
							<?php foreach($pejabatdisposisi as $jab): 
							
							?>
								<?php if($id_pegawai==$jab['id_pegawai']){?>
									<option value="<?= $jab['id_pegawai'] ?>" selected='true'><?= ucfirst($jab['nama']) ?></option>
								<?php }
									else
									{
								?>
										<option value="<?= $jab['id_pegawai'] ?>" ><?= ucfirst($jab['nama']) ?></option>
								<?php 	  
									}
								?>
								
							<?php endforeach; ?>	
						</select>
					</td>
				</tr>
				</table>
				Optional
				<hr>
				<br>
				<table class="table table-striped">
				<tr><th>Contact Person</th><td><input type="text" name="contact_person" value="<?= $contact_person ?>" class="form-control" required=""></td></tr>
				<tr><th>Informasi</th><td><textarea name="informasi" class="form-control" required=""><?= $informasi ?></textarea></td></tr>
				<tr><th>Nama Penangung Jawab</th><td><input type="text" name="nama_pejabat" value="<?= $nama_pejabat ?>" class="form-control" required=""></td></tr>
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
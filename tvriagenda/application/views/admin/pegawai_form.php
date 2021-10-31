
<div class="box box-warning box-solid" bis_skin_checked="1">
    
    <div class="box-header" bis_skin_checked="1">
        <h3 class="box-title">Data Pegawai</h3>
    </div>
    
    
    
    <?php //print_r($datacount); ?>
    <?= $this->session->flashdata('pesan') ?>
    
    <div class="box-body" bis_skin_checked="1">
    
        <br>
     <div style="padding-bottom: 10px;" '="" bis_skin_checked="1">
    </div>

			<table class="table table-striped">
				<form action="" method="POST" enctype="multipart/form-data"> 
				
				<tr>
					<th>Nip/Nik</th><td>
					<input type="text" name="nip" value="<?= $nip ?>" class="form-control">
					</td>
				</tr>
				
				<tr>
					<th>Nama</th>
					<td><input type="text" name="nama" value="<?= $nama ?>" class="form-control" required=""></td>
				</tr>
				
				<th>Deputi/Satuan Kerja</th>
					<td>
						<select name="id_deputi" id="id_deputi" class="form-control select2" style="width:1100px;">
							<?php if($aksi !== "edit"){?> <option value="">--Pilih Data Deputi Satuan Kerja--</option> <?php } ?>
							<?php foreach($deputi as $jab): 
								$selected = ($jab['id_deputi'] == $id_deputi) ? "selected" : "";
							?>

								<option value="<?= $jab['id_deputi'] ?>" <?= $selected;?> ><?= ucfirst($jab['nama_deputi']) ?></option>
							<?php endforeach; ?>	
						</select>
					</td>
				</tr>


				<tr>
					<th>Unit Kerja</th>
					<td>
						<select name="id_unitkerja"  id="id_unitkerja" class="form-control select2">
							<?php if($aksi !== "edit"){?> <option value="">--Pilih Data Unit Kerja --</option> <?php } ?>
							<?php foreach($unitkerja as $jab): 
								$selected = ($jab['id_unitkerja'] == $id_unitkerja) ? "selected" : "";
							?>

								<option value="<?= $jab['id_unitkerja'] ?>" <?= $selected;?> ><?= ucfirst($jab['nama_unitkerja']) ?></option>
							<?php endforeach; ?>	
						</select>
					</td>
				</tr>



				<tr>
					<th>Jabatan</th>
					<td>
						 <select name="id_jabatan" class="form-control select2">
							<?php if($aksi !== "edit"){?> <option value="">--Pilih Data Jabatan--</option> <?php } ?>
							<?php foreach($jabatan as $jab): 
								$selected = ($jab['id_jabatan'] == $id_jabatan) ? "selected" : "";
							?>

								<option value="<?= $jab['id_jabatan'] ?>" <?= $selected;?> ><?= ucfirst($jab['nama_jabatan']) ?> (<?= $jab['golongan'];?>)</option>
							<?php endforeach; ?>	
						</select>
					</td>
				</tr>

				<tr>
					<th>Golongan</th>
					<td>
						<select name="id_golruang" class="form-control select2">
							<?php if($aksi !== "edit"){?> <option value="">--Pilih Data Golongan--</option> <?php } ?>
							<?php foreach($golruang as $jab): 
								$selected = ($jab['id_golruang'] == $id_golruang) ? "selected" : "";
							?>

								<option value="<?= $jab['id_golruang'] ?>" <?= $selected;?> ><?= ucfirst($jab['nama_golruang']) ?></option>
							<?php endforeach; ?>	
						</select>
					</td>
				</tr>

			

				<tr>
					<th>Status ASN</th>
					<td>
						<select name="id_statusasn" class="form-control select2">
							<?php if($aksi !== "edit"){?> <option value="">--Pilih Data Status ASN--</option> <?php } ?>
							<?php foreach($statusasn as $jab): 
								$selected = ($jab['id_statusasn'] == $id_statusasn) ? "selected" : "";
							?>

								<option value="<?= $jab['id_statusasn'] ?>" <?= $selected;?> ><?= ucfirst($jab['nama_statusasn']) ?></option>
							<?php endforeach; ?>	
						</select>
					</td>
				</tr>

				
				<tr>
					<th>Jenis Kelamin</th>
					<td>
						<select class="form-control" name="jk">
						<option value="L">Laki-Laki</option>
						<option value="P">Perempuan</option>
						</select>
					</td>
					</tr>
											
				<tr>
				
				<tr>
					<th>Agama</th>
									<td>
									<select class="form-control" name="agama">
									<option value="islam">Islam</option>
									<option value="kristen">Kristen</option>
									<option value="budha">Budha</option>
									<option value="hindu">Hindu</option>
									<option value="konghucu">Konghucu</option>    
									<option value="lainnya">Lainnya</option>    
									</select>
									</td>
				</tr>
				
				<tr>
					<th>Tanggal Dinas</th>
					<td><input type="date" name="tgl_dinas" value="<?= $tgl_dinas ?>" class="form-control" required=""></td>
				</tr>
				
				<tr>
					<th>Status Dinas</th>
					<td>
					<select class="form-control" name="status_dinas">
					<option value="Ops">Ops</option>
					<option value="Berita">Berita</option>
					<option value="Standby">Stand By</option>
					</select>
					</td>
				</tr>
				
				<tr><th>Pendidikan</th><td><input type="text" name="pendidikan" value="<?= $pendidikan ?>" class="form-control" ></td></tr>
				



				
				<tr><th>Alamat </th><td><textarea name="alamat" value="<?= $alamat ?>" class="form-control"><?= $alamat ?></textarea></tr>

				<tr><th>No HP</th><td><input type="text" name="nohp" value="<?= $nohp ?>" class="form-control" ></td></tr>
				
				<tr><th>Foto</th><td>
					<?php 
					if($aksi == "edit" && !empty($foto))
					{
						echo '<img src="'.base_url('template/data/'.$foto).'" class="img-responsive" style="width:200px;height:200px">';
					}
					else
					{

					}
					?>
					<input type="file" name="gambar" value="" class="form-control">
					<?php 
					$max_upload = (int)(ini_get('upload_max_filesize'));
					?>
					Max Upload File Size <?php echo $max_upload; ?> MB
				</td></tr>

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



<script>
	$('#id_deputi').change(function(){
	var id = $(this).val();
	$('#id_unitkerja').html('<option value="">Select Unit Kerja</option>');
	$.ajax({
		url: "<?php echo base_url('pegawai/getUnitkerja') ?>/"+id,
		type: "GET",
		dataType: "JSON",
		success: function(data){
			for(i=0;i<data.length;i++){
			$('#id_unitkerja').append('<option value="' + data[i].id_unitkerja + '">' + data[i].nama_unitkerja + '</option>');
			}
		}
		});
	});
</script>
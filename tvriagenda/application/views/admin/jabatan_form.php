
<div class="box box-warning box-solid" bis_skin_checked="1">
    
    <div class="box-header" bis_skin_checked="1">
        <h3 class="box-title">Data Jabatan</h3>
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
					<th>Deputi/Satuan Kerja</th>
					<td>
						<select name="id_deputi" id="id_deputi" class="form-control select2">
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
					<th>Nama Jabatan</th>
					<td><input type="text" name="nama_jabatan" value="<?= $nama_jabatan ?>" class="form-control" required=""></td>
				</tr>

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

<div class="box box-warning box-solid" bis_skin_checked="1">
    
    <div class="box-header" bis_skin_checked="1">
        <h3 class="box-title">Data Unit Kerja</h3>
    </div>
    
    
    
    <?php //print_r($datacount); ?>
    <?= $this->session->flashdata('pesan') ?>
    
    <div class="box-body" bis_skin_checked="1">
    
        <br>
    <div style="padding-bottom: 10px;" '="" bis_skin_checked="1">
    </div>

			<table class="table table-reposive">
				<form action="" method="POST">
				<tr>
					<th>Satuan Kerja</th>
					<td>
						<select name="id_deputi" class="form-control select2">
							<?php if($aksi !== "edit"){?> <option value="">--Pilih Data Satuan Kerja--</option> <?php } ?>
							<?php foreach($deputi as $jab): 
								$selected = ($jab['id_deputi'] == $id_deputi) ? "selected" : "";
							?>

								<option value="<?= $jab['id_deputi'] ?>" <?= $selected;?> ><?= ucfirst($jab['nama_deputi']) ?></option>
							<?php endforeach; ?>	
						</select>
					</td>
				</tr>
				
				<tr><th>Nama Unit Kerja</th><td><input type="text" name="nama_unitkerja" class="form-control" value="<?= $nama_unitkerja ?>"></td></tr>
				

				<tr><td></td><th><input type="submit" name="kirim" value="Submit" class="btn btn-primary"></th></tr>
				</form>	 
			</table>
			</div>
	</div>
</div>
 
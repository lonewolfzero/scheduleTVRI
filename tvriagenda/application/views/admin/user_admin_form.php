				
<div class="box box-warning box-solid" bis_skin_checked="1">
    
    <div class="box-header" bis_skin_checked="1">
        <h3 class="box-title">Data Level/Hak Akses</h3>
    </div>
    
    
    
    <?php //print_r($datacount); ?>
    <?= $this->session->flashdata('pesan') ?>
    
    <div class="box-body" bis_skin_checked="1">
    
        <br>
    <div style="padding-bottom: 10px;" '="" bis_skin_checked="1">
    </div>

			<form action="" method="POST"> 
				<table class="table table-striped">
					<tr>
						<th>NIP Pegawai</th>
						<td>
							<select name="id_pegawai" id="id_pegawai" class="form-control select2" required="" style="width:1100px;">
								<?php if($aksi !== "edit"){?> <option value="">--Pilih Data Pegawai--</option> <?php } ?>
								<?php foreach($pegawai as $jab): 
									$selected = ($jab['id_pegawai'] == $id_pegawai) ? "selected" : "";
								?>

									<option value="<?= $jab['id_pegawai'] ?>" <?= $selected;?> ><?= ucfirst($jab['nip']) ?> - <?= ucfirst($jab['nama']) ?></option>
								<?php endforeach; ?>	
							</select>
						</td>
					</tr>
					<tr><th>Nama</th><td><input type="text" name="nama" id="nama" class="form-control" value="<?= $nama ?>" required=""></td></tr>
					<tr><th>Username</th><td><input type="text" name="username" class="form-control" value="<?= $username ?>" required=""></td></tr>
					<tr><th>Password</th><td><input type="password" name="password" class="form-control" value="" required=""></td></tr>
					
					<tr><th>Hak-Akses</th><td><select class="form-control" name="level" required="">
						<option value="admin">Admin</option>
						<option value="sespri">Sespri</option>
						<option value="user">Pejabat</option>
						<option value="pegawai">Pegawai</option>
					</select></td></tr>
					<tr><td></td><td><input type="submit" name="kirim" value="Entri Data" class="btn btn-primary">&nbsp;&nbsp;&nbsp;
									<input type="reset" name="" value="Batal" class="btn btn-reset"></td></tr>
				</table>
				</form>

				</div>
	</div>
</div>

<script>
	$('#id_pegawai').change(function(){
	
		var id = $(this).val();
		//alert(id);
		var selectdata=$("#id_pegawai option:selected" ).text();
		//alert(selectdata);
		var selectdata2= selectdata.substr(selectdata.indexOf('-')+1,selectdata.length-1); 
		//alert(selectdata2);
		$('#nama').val(selectdata2);
    
	});
</script>
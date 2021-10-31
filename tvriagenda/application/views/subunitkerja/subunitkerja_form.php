		
<div class="box box-warning box-solid" bis_skin_checked="1">
    
    <div class="box-header" bis_skin_checked="1">
        <h3 class="box-title">Data Sub Unit KErja</h3>
    </div>
    
    
    
    <?php //print_r($datacount); ?>
    <?= $this->session->flashdata('pesan') ?>
    
    <div class="box-body" bis_skin_checked="1">
    
        <br>
    <div style="padding-bottom: 10px;" '="" bis_skin_checked="1">
    </div>

            <table class="table table-reposive">
				<form action="" method="POST">
				<tr><th>Nama Sub Unit Kerja</th><td><input type="text" name="nama_subunitkerja" class="form-control" value="<?= $nama_subunitkerja ?>"></td></tr>
				<tr><td></td><th><input type="submit" name="kirim" value="Submit" class="btn btn-primary"></th></tr>
				</form>	 
			</table>
			</div>
	</div>
</div>		
 
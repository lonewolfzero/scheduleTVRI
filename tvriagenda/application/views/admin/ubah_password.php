			
<div class="box box-warning box-solid" bis_skin_checked="1">
    
    <div class="box-header" bis_skin_checked="1">
        <h3 class="box-title">Ubah Password</h3>
    </div>
    
    
    
    <?php //print_r($datacount); ?>
    <?= $this->session->flashdata('pesan') ?>
    
    <div class="box-body" bis_skin_checked="1">
    
        <br>
    <div style="padding-bottom: 10px;" '="" bis_skin_checked="1">
    </div>

    <div id="mytable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer" bis_skin_checked="1">
		   <table class="table table-sriped">
				<form action="" method="POST">
				<tr><td>Usernme</td><td><input type="text" name="" value="<?= $data['username'] ?>" class="form-control" readonly></td></tr>
				<tr><td>Nama</td><td><input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control"></td></tr>
				<tr><td>Password</td><td><input type="password" name="password" value="" class="form-control"></td></tr>
				<tr>
				<td>Level Akses</td><td>
					<input type="text" name="" value="<?php 
	
							 if($data['level']=="admin")
							 {
								 echo "Admin";
							 }
							 else if($data['level']=="sespri")
							 {
								 echo "Sespri";
							 }
							 else if($data['level']=="user")
							 {
								 echo "Pejabat";
							 }
							 else if($data['level']=="pegawai")
							 {
								 echo "Pegawai";
							 }
					
					?>" class="form-control" readonly>
				</td>
				</tr>
				<tr><td></td><td><input type="submit" name="kirim" value="Submit" class="btn btn-primary"></td></tr>		
				</form>
			</table>

			</div>
	</div>
</div>
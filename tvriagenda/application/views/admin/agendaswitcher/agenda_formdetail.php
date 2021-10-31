<div class="box box-warning box-solid" bis_skin_checked="1">
    
    <div class="box-header" bis_skin_checked="1">
        <h3 class="box-title"> Data Agenda</h3>
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
                    
        <tr><th>Nama Agenda</th><td><input type="text" name="nama_agenda" value="<?= $nama_agenda ?>" class="form-control" required="" readonly></td></tr>
        <tr><th>Lokasi Agenda </th><td><textarea name="lokasi_agenda" class="form-control" required="" readonly><?= $lokasi_agenda ?></textarea></td></tr>
        <tr>
            <th>Penanggung Jawab (PIC)</th>
            <td>
                <select name="id_pegawai" id="id_pegawai" class="form-control select2" required="">
                    <?php if($aksi !== "edit"){?> <option value="">--Pilih Data Penangung Jawab --</option> <?php } ?>
                    <?php foreach($pegawai as $jab): 
                        $selected = ($jab['id_pegawai'] == $id_pegawai) ? "selected" : "";
                    ?>

                        <option value="<?= $jab['id_pegawai'] ?>" <?= $selected;?> ><?= ucfirst($jab['nip']) ?> - <?= ucfirst($jab['nama']) ?></option>
                    <?php endforeach; ?>	
                </select>
            </td>
        </tr>
        
		<tr>
			<th>Sebagai </th>
			<td>
				<select name="sebagai" id="sebagai" class="form-control select2" style="width:1050px;">
					<?php if(empty($sebagai)){?>
							<option value=''>--Pilih Sebagai --</option>
							<option value='Peserta'>Peserta</option>
							<option value='Nara Sumber'>Nara Sumber</option>
					<?php }
						  else  
						  {
							 if($sebagai=="Peserta")
							 {
								 echo "<option value='Peserta' selected>Peserta</option>
									   <option value='Nara Sumber'>Nara Sumber</option>";
							 }
							 else
							 {
								 echo "<option value='Peserta'>Peserta</option>
									   <option value='Nara Sumber' selected>Nara Sumber</option>";
							 }
						  }
					 ?>
				</select>
			</td>
		</tr>
		
        <tr><th>Contact Person</th><td><input type="text" name="contact_person" value="<?= $contact_person ?>" class="form-control" required="" readonly></td></tr>
        <tr><th>Informasi/Deskripsi</th><td><textarea name="informasi" class="form-control" required="" readonly><?= $informasi ?></textarea></td></tr>
        
        <tr class="txt">
            <th>Add Anggota</th>
            <td valign="top">
                <br>
                <br>
                <div id="dvFile2">
                        
							 <select name="id_pejabatmore[]" class="smartsearch_keyword form-control select2" multiple="multiple">
                                    <?php if($aksi !== "edit"){?> <option value="">--Pilih Data NaraSumber --</option> <?php } ?>
                                    <?php foreach($pegawai as $jab): 
										  
											if(!empty($agendapegawai))
											{
												 $hasil=0;
												 foreach($agendapegawai as $pegawai2)
												 {
													if($pegawai2['id_pegawai']==$jab['id_pegawai'])
													{
														//echo "masuk bro";
														//exit();
														$hasil=1;
														break;
													}
													
												 }
												 
												 if($hasil)
												 {
													 echo  "<option value=".$jab['id_pegawai']." selected>".ucfirst($jab['nip'])." - ".ucfirst($jab['nama'])."</option>";
														
												 }
												 else
												 {
													 echo  "<option value=".$jab['id_pegawai'].">".ucfirst($jab['nip'])." - ".ucfirst($jab['nama'])."</option>";
												 }
										    
											}
											else
											{
													 $selected = ($jab['id_pegawai'] == $id_pejabat) ? "selected" : "";
											
                                    ?>

													 <option value="<?= $jab['id_pegawai'] ?>" <?= $selected;?> ><?= ucfirst($jab['nip']) ?> - <?= ucfirst($jab['nama']) ?></option>
									<?php   }
									endforeach; ?>	
                                </select>
                </div>
                <br>             
            </td>
            </tr>

            <tr class="txt">
            <th>File Attachement</th>
            <td valign="top">
                
                <br>
                <div id="dvFile">
                    <?php
					if(!empty($agendafile))
					{
						foreach($agendafile as $filedata)
						{

                    ?>
                        <a target="_blank" href="<?= base_url('template/file/'.$filedata['agenda_file']) ?>"><?= $filedata['agenda_file'] ?></a>
                
                        <br>
                    
                    <?php 
						}
					}
                    ?>
                       
                </div>            
                <br>
            </td>
            </tr>

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
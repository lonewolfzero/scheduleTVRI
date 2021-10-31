
<div class="box box-warning box-solid" bis_skin_checked="1">
    
    <div class="box-header" bis_skin_checked="1">
        <h3 class="box-title">Add Data Agenda Penyiar</h3>
    </div>
    
    
    
    <?php //print_r($datacount); ?>
    <?= $this->session->flashdata('pesan') ?>
    
	<form action="" method="POST" name="yourForm" id="theForm" enctype="multipart/form-data">           
         <table class="table table-striped">    
                    <tr><th>Tanggal</th><td><input type="date" id="tanggal" name="tanggal" value="<?= $tanggal ?>" class="form-control" required=""></td></tr>
                    <tr><th>Jam Mulai</th><td><input type="time" name="jam_mulai" value="<?= $jam_mulai ?>" class="form-control" required=""></td></tr>
                    <tr><th>Jam Selesai</th><td><input type="time" name="jam_selesai" value="<?= $jam_selesai ?>" class="form-control" required=""></td></tr>
                    <tr><th>Nama Agenda</th><td><input type="text" name="nama_agenda" value="<?= $nama_agenda ?>" class="form-control" required=""></td></tr>
                    <tr><th>Lokasi Agenda </th><td><textarea name="lokasi_agenda" class="form-control"><?= $lokasi_agenda ?></textarea></td></tr>
                    <tr>
                        <th>Penanggung Jawab (PIC)</th>
                        <td>
                            <select name="id_pegawai" id="id_pegawai" class="form-control select2" required="" style="width:1050px;">
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
                        <th>Status Agenda(Absensi) </th>
                        <td>
                            <select name="status_hadir" id="status_hadir" class="form-control select2" style="width:1050px;">
									    <option value=''>--Pilih Status --</option>
									    <option value='1'>Hari Ini/Hari Dinas</option>
										<option value='2'>Hari Libur</option>
										<option value='3'>Izin</option>
										<option value='4'>Off</option>
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

                    <tr><th>Contact Person</th><td><input type="text" name="contact_person" value="<?= $contact_person ?>" class="form-control"></td></tr>
                    <tr><th>Informasi/Deskripsi</th><td><textarea name="informasi" class="form-control"><?= $informasi ?></textarea></td></tr>
                    
                    <tr class="txt">
                    <th>Add Anggota</th>
                    <td valign="top">
                       
                        <br>
                        <br>
                        <div id="dvFile2">
                                <select name="id_pejabatmore[]" id="id_pejabatmore"  class="smartsearch_keyword form-control select2" multiple="multiple">
                                    <?php if($aksi !== "edit"){?> <option value="">--Pilih Data Anggota --</option> <?php } ?>
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
                                <br>
                               
                        </div>
                        <br>             
                    </td>
                    </tr>

                    <tr class="txt">
                    <th>File Attachement</th>
                    <td valign="top">
                        <a href="javascript:_add_more();" title="Add more">
                            <img src="<?= base_url('template/data/cross.png') ?>" width='30px' height='30px' border="0"> Add More File
                        </a>
                        <br>
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
                            <input type="file" name="item_file[]">
                            <?php 
							$max_upload = (int)(ini_get('upload_max_filesize'));
							?>
							Max Upload File Size <?php echo $max_upload; ?> MB
                              
                        </div>            
                        <br>
                    </td>
                    </tr>



                    <tr>
						<td></td>
						<td>
						<input type="submit" name="kirim" value="Submit" class="btn btn-primary"> &nbsp;&nbsp;<input type="reset" name="g" value="Batal" class="btn btn-danger">
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


<script>
	$(".smartsearch_keyword").select2({
		multiple: true
	});
	
	$('#id_pegawai').change(function(){
		var id = $(this).val();
		var tanggal = $('#tanggal').val();
		//$('#id_organisasi').html('<option value="">Select Organisasi</option>');
		//$('#id_unitkerja').html('<option value="">Selec Unit Kerja</option>');
		$.ajax({
			url: "<?php echo base_url('pegawai/getjumlah') ?>/"+id+"/"+tanggal,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{
				
				if(data.querydatajum>0)
				{
					alert("PIC Telah Terdaftar Di Agenda Lain");
					return true;
				}
				else
				{
					//alert(data);
					return true;
				}
			}
			});
	});
</script>


<script>
	$('#id_pegawai').change(function(){
	var id = $(this).val();
	var tanggal = $('#tanggal').val();
	
	$.ajax({
			url: "<?php echo base_url('pegawai/getjumlah') ?>/"+id+"/"+tanggal,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{
				
				if(data.querydatajum>0)
				{
					alert("PIC Telah Terdaftar Di Agenda Lain");
					return true;
				}
				else
				{
					//alert(data);
					return true;
				}
			}
			});
	
	$('#id_pejabatmore').html('<option value="">Select Anggota</option>');
	$.ajax({
		url: "<?php echo base_url('pegawai/getPegawai') ?>/"+id,
		type: "GET",
		dataType: "JSON",
		success: function(data){
			for(i=0;i<data.length;i++)
			{
				$('#id_pejabatmore').append('<option value="' + data[i].id_pegawai + '">' + data[i].nama + '</option>');
			}
		}
		});
	});
</script>


<script>
    function _add_more() {
      var txt = "<br><input type=\"file\" name=\"item_file[]\">";
      document.getElementById("dvFile").innerHTML += txt;
    }

</script>

<script>
    function add_more2() 
    {
        <?php 
            $dataselect="";
            
            if($aksi !== "edit")
            { 
              $dataselect="<option value=''>--Pilih Data NaraSumber --</option>";
            } 
        ?>

        <?php foreach($pegawai as $jab): 
            $selected = ($jab['id_pegawai'] == $id_pejabat) ? "selected" : "";
        ?>

            <?php 
                $dataselect.="<option value='".$jab['id_pegawai']."' ".$selected." >".ucfirst($jab['nip'])." - ".ucfirst($jab['nama'])."</option>";
            ?>
         <?php endforeach; ?>	

       var txt = "<br><select name=\"id_pejabatmore[]\" class=\"form-control select2\"><?= $dataselect ?></select>";

       document.getElementById("dvFile2").innerHTML += txt;
    }
</script>

 
	  <section class="content">
          <div class="row">
			
			 <?php 
			if($this->session->userdata('level') =="sespri")
			{
			 ?>
					<div class="col-md-12">
					  <div class="box box-solid">
					   <div class="box-body">
						  <!-- the events -->
						  <div id="external-events">
							<a href="<?= base_url('agenda/agenda_tambah/') ?>" class="btn btn-danger btn-sm"><i class="fa fa-wpforms"></i> Tambah Agenda</a>
							<!--div class="external-event bg-green">Lunch</div>
							<div class="external-event bg-yellow">Go home</div>
							<div class="external-event bg-aqua">Do homework</div>
							<div class="external-event bg-light-blue">Work on UI design</div>
							<div class="external-event bg-red">Sleep tight</div>
							<div class="checkbox">
							  <label for="drop-remove">
								<input type="checkbox" id="drop-remove">
								remove after drop
							  </label>
							</div-->
						  </div>
						</div><!-- /.box-body -->
					  </div><!-- /. box -->
					  <div class="box box-solid">
						
					  </div>
					</div><!-- /.col -->
					
		   
				<?php		
					}
				?>	

		  
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div id="calendar2"></div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
		
		        

<div class="box box-warning box-solid" bis_skin_checked="1">
    
<div class="box-header" bis_skin_checked="1">
	<h3 class="box-title">Agenda Kegiatan Anda </h3>
</div>



<?php //print_r($datacount); ?>
<?= $this->session->flashdata('pesan') ?>

<div class="box-body" bis_skin_checked="1">

	<br>
	<div style="padding-bottom: 10px;" '="" bis_skin_checked="1">
	</div>

	<div id="mytable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer" bis_skin_checked="1">

	<div class="dataTables_length" id="mytable_length" bis_skin_checked="1">

			<table id="example1" class="table table-bordered table-striped">
				<thead>
				<tr>
				<th>No</th>
				<th>Tanggal/Jam</th>
				<th>Nama Agenda</th>
				<th>Lokasi Agenda</th>
				<th>Contact Person</th>
				<th>PIC</th>
				<th>Sebagai</th>
				<th>Status </th>
				<th>Aksi</th>
				</tr>
				</thead>
				<tbody>
				<?php 
					$im3=0;
					$im=0; $no=1; 
					foreach($data->result_array() as $admin)
					{ 
			
						$tanggal=date("d/m/Y", strtotime($admin['tanggal']));
						$jam=substr($admin['jam_mulai'],0,2);
						$menit=substr($admin['jam_mulai'],3,2);
						
						$jam2=substr($admin['jam_selesai'],0,2);
						$menit2=substr($admin['jam_selesai'],3,2);
				
					?>	
					
					<tr>
					<td><?= $no ?></td>
					<td><?php echo $tanggal." ".$jam.":".$menit." - ".$jam2.":".$menit2 ?></td> 
					<td><?= $admin['nama_agenda'] ?></td> 
					<td><?= $admin['lokasi_agenda'] ?></td> 
					<td><?= $admin['contact_person'] ?></td>
					
					<td>
						<?= @$datacount[$im]['pegawai'][0]['nama'] ?>
					</td> 
					
					<td>
						<?= $admin['sebagai'] ?>
					</td> 
					 
					<td>
						<?php 
							if($admin['status_agenda']==0)
							{
								echo "Terjadwal";
							} 
							else if($admin['status_agenda']==1)
							{
								echo "Approved";
							} 
							else if($admin['status_agenda']==2)
							{
								echo "Reject";
							} 
							else if($admin['status_agenda']==3)
							{
								echo "Disposisi/Diwakilkan";
							} 
							
						?>
					</td> 
					<td>
					
					<a href="<?= base_url('agenda/agenda_detail/'.$admin['id_agenda']) ?>" class="btn btn-info"> <i class="fa fa-eye"></i></a> 
					</td> 
					</tr>
					<?php
						$im++; $no++; 
					}
					?>
					
					 <?php 
					 if(!empty($data2))
					 {
						foreach($data2 as $admin): ?>
						<?php 
						 if(!empty($admin))
						 {
								$tanggal=date("d/m/Y", strtotime($admin->tanggal));
								$jam=substr($admin->jam_mulai,0,2);
								$menit=substr($admin->jam_mulai,3,2);
								
								$jam2=substr($admin->jam_selesai,0,2);
								$menit2=substr($admin->jam_selesai,3,2);
								?>
							<tr>
							<td><?= $no ?></td>
							<td><?php echo $tanggal." ".$jam.":".$menit." - ".$jam2.":".$menit2 ?></td> 
							<td><?= $admin->nama_agenda ?></td> 
							<td><?= $admin->lokasi_agenda ?></td> 
							<td><?= $admin->contact_person ?></td>
							
							<td>
								<?= @$datacount[$im]['pegawai'][0]['nama'] ?>
							</td> 
							
							<td>
								Peserta
							</td> 
							
							<td>
								<?php 
									if($admin->status_agenda==0)
									{
										echo "Terjadwal";
									} 
									else if($admin->status_agenda==1)
									{
										echo "Approved";
									} 
									else if($admin->status_agenda==2)
									{
										echo "Reject";
									} 
									else if($admin->status_agenda==3)
									{
										echo "Disposisi/Diwakilkan";
									} 
								?>
					</td> 
						<td>
						
							<a href="<?= base_url('agenda/agenda_detail/'.$admin->id_agenda) ?>" class="btn btn-info"> <i class="fa fa-eye"></i></a> 
						</td> 
					</tr>
						<?php }
						  $im++; $no++; 
						  endforeach;
						  $im3=$im;
					 }
					?>
					
				</tbody>
			</table>


		</div>
	</div>
</div>


 <script>
      $(function () {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function () {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex: 1070,
              revert: true, // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            });

          });
        }
        ini_events($('#external-events div.external-event'));

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
			$('#calendar2').fullCalendar({
			  header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			  },
			  buttonText: {
				today: 'today',
				month: 'month',
				week: 'week',
				day: 'day'
			  },
			  //Random default events
			  events: [
				
				<?php 
					 $im=0; $no=1; 
					 $jumlah=$data->num_rows();
					 $jumlah=$im3;
					  
					 foreach($data->result_array() as $admin)
					 {
						$tahun=substr($admin['tanggal'],0,4);
						$bulan=substr($admin['tanggal'],5,2);
						$hari=substr($admin['tanggal'],8,2);
						$jam=substr($admin['jam_mulai'],0,2);
						$menit=substr($admin['jam_mulai'],3,2);
						$jam2=substr($admin['jam_selesai'],0,2);
						$menit2=substr($admin['jam_selesai'],3,2);
						
						echo "{
						  title: '- ".@$jam2.":".$menit2." - ".@$admin['nama_agenda']."',
						  start: new Date(".@$tahun.", ".($bulan-1).", ".@$hari.", ".@$jam.", ".@$menit."),
						  end: new Date(".@$tahun.", ".($bulan-1).", ".@$hari.", ".@$jam2.", ".@$menit2."),
						  allDay: false,
						  url: '".base_url('agenda/agenda_detail/'.$admin['id_agenda'])."',
						  backgroundColor: '#f56954',
						  borderColor: '#f56954'
						
						";
						
						if($jumlah==$no)
						{
							 echo "}";
						}
						else
						{
						 echo "},";
						}
						
						$im++;
						$no++;
					 }
					 
					 
					 if(!empty($data2))
					 {
						foreach($data2 as $admin)
						{
							 if(!empty($admin))
						     {
								$tanggal=date("d/m/Y", strtotime($admin->tanggal));
								
								$tahun=substr($admin->tanggal,0,4);
								$bulan=substr($admin->tanggal,5,2);
								$hari=substr($admin->tanggal,8,2);
								$jam=substr($admin->jam_mulai,0,2);
								$menit=substr($admin->jam_mulai,3,2);
								
								$jam2=substr($admin->jam_selesai,0,2);
								$menit2=substr($admin->jam_selesai,3,2);
									
								
								echo "{
								  title: '- ".@$jam2.":".$menit2." - ".@$admin->nama_agenda."',
								  start: new Date(".@$tahun.", ".($bulan-1).", ".@$hari.", ".@$jam.", ".@$menit."),
								  end: new Date(".@$tahun.", ".($bulan-1).", ".@$hari.", ".@$jam2.", ".@$menit2."),
								  allDay: false,
								  url: '".base_url('agenda/agenda_detail/'.$admin->id_agenda)."',
								  backgroundColor: '#f56954',
								  borderColor: '#f56954'
								
								";
								
								if($jumlah==$no)
								{
									 echo "}";
								}
								else
								{
								 echo "},";
								}
								
								$im++;
								$no++;
						      }
					    }
					 }
				?>
				
				/*
				{
				  title: 'All Day Event',
				  start: new Date(y, m, 1),
				  backgroundColor: "#f56954", //red
				  borderColor: "#f56954" //red
				},
				{
				  title: 'Long Event',
				  start: new Date(y, m, d - 5),
				  end: new Date(y, m, d - 2),
				  backgroundColor: "#f39c12", //yellow
				  borderColor: "#f39c12" //yellow
				},
				{
				  title: 'Meeting',
				  start: new Date(y, m, d, 10, 30),
				  allDay: false,
				  backgroundColor: "#0073b7", //Blue
				  borderColor: "#0073b7" //Blue
				},
				{
				  title: 'Lunch',
				  start: new Date(y, m, d, 12, 0),
				  end: new Date(y, m, d, 14, 0),
				  allDay: false,
				  backgroundColor: "#00c0ef", //Info (aqua)
				  borderColor: "#00c0ef" //Info (aqua)
				},
				{
				  title: 'Birthday Party',
				  start: new Date(y, m, d + 1, 19, 0),
				  end: new Date(y, m, d + 1, 22, 30),
				  allDay: false,
				  backgroundColor: "#00a65a", //Success (green)
				  borderColor: "#00a65a" //Success (green)
				}
				
				{
				  title: 'Click for Google',
				  start: new Date(1990, 01, 28),
				  end: new Date(1990, 01, 29),
				  url: 'http://google.com/',
				  backgroundColor: "#3c8dbc", //Primary (light-blue)
				  borderColor: "#3c8dbc" //Primary (light-blue)
				}
				*/
				
          ],
          editable: true,
          droppable: true, // this allows things to be dropped onto the calendar !!!
          drop: function (date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar2').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }

          }
        });

        /* ADDING EVENTS */
        var currColor = "#3c8dbc"; //Red by default
        //Color chooser button
        var colorChooser = $("#color-chooser-btn");
        $("#color-chooser > li > a").click(function (e) {
          e.preventDefault();
          //Save color
          currColor = $(this).css("color");
          //Add color effect to button
          $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
        });
        $("#add-new-event").click(function (e) {
          e.preventDefault();
          //Get value and make sure it is not null
          var val = $("#new-event").val();
          if (val.length == 0) {
            return;
          }

          //Create events
          var event = $("<div />");
          event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
          event.html(val);
          $('#external-events').prepend(event);

          //Add draggable funtionality
          ini_events(event);

          //Remove event from text input
          $("#new-event").val("");
        });
      });
    </script>
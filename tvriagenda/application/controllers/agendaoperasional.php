<?php
 if ( ! defined('BASEPATH')) exit(header('Location:../'));
class Agendaoperasional extends CI_controller
{
  function __construct()
  {
	   parent:: __construct();
	   // error_reporting(0);
		if($this->session->userdata('admin') != TRUE){
		  redirect(base_url(''));
		  exit;
		};
	   $this->load->model('m_admin');
	   $this->load->model('m_agendaoperasional');
  }


  public function index()
  {
    $id   = ($this->session->userdata('level') == "pegawai") ? $this->session->userdata('id_pegawai') : $this->session->userdata('id_admin');
    $data = ($this->session->userdata('level') == "pegawai") ? $this->m_agendaoperasional->cari_agenda_pegawai($id) : $this->m_agendaoperasional->agenda_pegawai();
	
	$datacount=array();
	
	$im=0;
	foreach($data->result_array() as $dataman)
	{
	   $idman=$dataman['id_agenda'];
	   $idpegawaiman=$dataman['id_pegawai'];
	   $idpejabatman=$dataman['id_pejabat'];
	   
	   $query = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman'");
	   $datacount[$im]['jumlahkegiatan']=$query->num_rows();
	   
	   $querypending = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman' AND status_kegiatan='0'");
	   $datacount[$im]['jumlahpending']=$querypending->num_rows();
	   
	   $queryapproved = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman' AND status_kegiatan='1'");
	   $datacount[$im]['jumlahapproved']=$queryapproved->num_rows();
	   
	   $queryreject = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman' AND status_kegiatan='2'");
	   $datacount[$im]['jumlahreject']=$queryreject->num_rows();
	   
	   $querywakil = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman' AND status_kegiatan='3'");
	   $datacount[$im]['jumlahwakil']=$querywakil->num_rows();

	   $querypegawai = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai='$idpegawaiman' ");
	   $datacount[$im]['pegawai']=$querypegawai->result_array();

	   $querypejabat = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai='$idpejabatman' ");
	   $datacount[$im]['pejabat']=$querypejabat->result_array();
	   
	   $im++;
	}
	
	//print_r($datacount);
	//exit();
	//$this->db->get('pegawai')->result_array();
    
	$x = array('judul' =>'Agenda Kegiatan Operasional',
			  'datacount' => $datacount,
              'data'  =>$data); 
    tpl('admin/agendaoperasional/agenda',$x);
  }
  
  public function index2()
  {
	$idm=$this->session->userdata('id_admin');
	$datapeg=$this->db->query("SELECT * from admin a LEFT JOIN pegawai d ON(d.id_pegawai=a.id_pegawai) WHERE a.id_admin='$idm'")->row_array();
	$idm2=$datapeg['id_pegawai'];  
	  
    $id   = ($this->session->userdata('level') == "pegawai") ? $this->session->userdata('id_pegawai') : $this->session->userdata('id_admin');
    $data = ($this->session->userdata('level') == "pegawai") ? $this->m_agendaoperasional->cari_agenda_pegawai($id) : $this->m_agendaoperasional->agenda_pegawai();
	$data3 = ($this->session->userdata('level') == "pegawai") ? $this->m_agendaoperasional->cari_agenda_pegawai($idm2) : $this->m_agendaoperasional->cari_agenda_pegawai($idm2);
	$data2 = ($this->session->userdata('level') == "pegawai") ? $this->m_agendaoperasional->cari_agenda_pegawaim2($idm2) : $this->m_agendaoperasional->cari_agenda_pegawaim2($idm2);
	
	$datacount=array();
	
	$im=0;
	foreach($data->result_array() as $dataman)
	{
	   $idman=$dataman['id_agenda'];
	   $idpegawaiman=$dataman['id_pegawai'];
	   $idpejabatman=$dataman['id_pejabat'];
	   
	   $query = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman'");
	   $datacount[$im]['jumlahkegiatan']=$query->num_rows();
	   
	   $querypending = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman' AND status_kegiatan='0'");
	   $datacount[$im]['jumlahpending']=$querypending->num_rows();
	   
	   $queryapproved = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman' AND status_kegiatan='1'");
	   $datacount[$im]['jumlahapproved']=$queryapproved->num_rows();
	   
	   $queryreject = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman' AND status_kegiatan='2'");
	   $datacount[$im]['jumlahreject']=$queryreject->num_rows();
	   
	   $querywakil = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman' AND status_kegiatan='3'");
	   $datacount[$im]['jumlahwakil']=$querywakil->num_rows();

	   $querypegawai = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai='$idpegawaiman' ");
	   $datacount[$im]['pegawai']=$querypegawai->result_array();

	   $querypejabat = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai='$idpejabatman' ");
	   $datacount[$im]['pejabat']=$querypejabat->result_array();
	   
	   $im++;
	}
	
	
	$datacount=array();
	$dataman2=array();
	
	$ij=0;
	
	foreach($data2->result_array() as $dataman)
	{
	   $idman=$dataman['id_agenda'];
	   $dataman=$this->db->query("SELECT * from agendaoperasional WHERE id_agenda='$idman'")->row();
	
	   $dataman2[$ij]=$dataman;
	   $ij++;
	}
	
	
	if(!empty($dataman2))
	{
		foreach($dataman2 as $dsata)
		{
		   if(!empty($dsata))
		   {
		   
			   $idman=$dsata->id_agenda;
			   $idpegawaiman=$dsata->id_pegawai;
			   $idpejabatman=$dsata->id_pejabat;
			   
		   }
		}
	}
	
	 
	$x = array('judul' =>'Agenda Kegiatan',
			  'datacount' => $datacount,
			  'data3'  =>$data3,
			  'data2'  =>$dataman2,
              'data'  =>$data); 
    tpl('admin/agendaoperasional/agenda2',$x);
  
  }

  public function agendacalendar()
  {
    $id   = ($this->session->userdata('level') == "pegawai") ? $this->session->userdata('id_pegawai') : $this->session->userdata('id_admin');
    $data = ($this->session->userdata('level') == "pegawai") ? $this->m_agendaoperasional->cari_agenda_pegawai($id) : $this->m_agendaoperasional->agenda_pegawai();
	
	$datacount=array();
	
	$im=0;
	foreach($data->result_array() as $dataman)
	{
	   $idman=$dataman['id_agenda'];
	   $idpegawaiman=$dataman['id_pegawai'];
	   $idpejabatman=$dataman['id_pejabat'];
	   
	   $query = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman'");
	   $datacount[$im]['jumlahkegiatan']=$query->num_rows();
	   
	   $querypending = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman' AND status_kegiatan='0'");
	   $datacount[$im]['jumlahpending']=$querypending->num_rows();
	   
	   $queryapproved = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman' AND status_kegiatan='1'");
	   $datacount[$im]['jumlahapproved']=$queryapproved->num_rows();
	   
	   $queryreject = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman' AND status_kegiatan='2'");
	   $datacount[$im]['jumlahreject']=$queryreject->num_rows();
	   
	   $querywakil = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman' AND status_kegiatan='3'");
	   $datacount[$im]['jumlahwakil']=$querywakil->num_rows();

	   $querypegawai = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai='$idpegawaiman' ");
	   $datacount[$im]['pegawai']=$querypegawai->result_array();

	   $querypejabat = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai='$idpejabatman' ");
	   $datacount[$im]['pejabat']=$querypejabat->result_array();
	   
	   $im++;
	}
	
	//print_r($datacount);
	//exit();
	//$this->db->get('pegawai')->result_array();
    
	$x = array('judul' =>'Agenda Calendar',
			  'datacount' => $datacount,
              'data'  =>$data); 
			  
    tpl('admin/agendaoperasional/agendacalendar',$x);
  }
  
  
  public function myagendacalendar()
  {
	$idm=$this->session->userdata('id_admin');
	$datapeg=$this->db->query("SELECT * from admin a LEFT JOIN pegawai d ON(d.id_pegawai=a.id_pegawai) WHERE a.id_admin='$idm'")->row_array();
	$idm2=$datapeg['id_pegawai'];
   
    $id   = ($this->session->userdata('level') == "pegawai") ? $this->session->userdata('id_pegawai') : $this->session->userdata('id_admin');
    $data = ($this->session->userdata('level') == "pegawai") ? $this->m_agendaoperasional->cari_agenda_pegawai($idm2) : $this->m_agendaoperasional->cari_agenda_pegawai($idm2);
	$data2 = ($this->session->userdata('level') == "pegawai") ? $this->m_agendaoperasional->cari_agenda_pegawaim2($idm2) : $this->m_agendaoperasional->cari_agenda_pegawaim2($idm2);
	$data3 = ($this->session->userdata('level') == "pegawai") ? $this->m_agendaoperasional->cari_agenda_pegawai($idm2) : $this->m_agendaoperasional->agenda_pegawai();
	
	
	$datacount=array();
	$dataman2=array();
	
	$im=0;
	$ij=0;
	
	foreach($data2->result_array() as $dataman)
	{
	   $idman=$dataman['id_agenda'];
	   $dataman=$this->db->query("SELECT * from agendaoperasional WHERE id_agenda='$idman'")->row();
	
	   $dataman2[$ij]=$dataman;
	   $ij++;
	}
	
	foreach($data->result_array() as $dataman)
	{
	   $idman=$dataman['id_agenda'];
	   $idpegawaiman=$dataman['id_pegawai'];
	   $idpejabatman=$dataman['id_pejabat'];

	   $querypegawai = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai='$idpegawaiman' ");
	   $datacount[$im]['pegawai']=$querypegawai->result_array();

	   $querypejabat = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai='$idpejabatman' ");
	   $datacount[$im]['pejabat']=$querypejabat->result_array();
	   
	   $im++;
	}
	
	
	if(!empty($dataman2))
	{
		foreach($dataman2 as $dsata)
		{
		   if(!empty($dsata))
		   {
		   
			   $idman=$dsata->id_agenda;
			   $idpegawaiman=$dsata->id_pegawai;
			   $idpejabatman=$dsata->id_pejabat;
			   
			   $querypegawai = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai='$idpegawaiman' ");
			   $datacount[$im]['pegawai']=$querypegawai->result_array();

			   $querypejabat = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai='$idpejabatman' ");
			   $datacount[$im]['pejabat']=$querypejabat->result_array();
			   
			   $im++;
		   }
		}
	}
	
	 
	$x = array('judul' =>'Agenda Calendar Anda',
			  'datacount' => $datacount,
			  'data2'  => $dataman2,
              'data3'  => $data3,
			  'data'  =>$data); 
			  
	if($this->session->userdata('level') == "pegawai")
	{
      tpl('admin/agendaoperasional/myagendacalendar',$x);
	}
	else
	{
	  tpl('admin/agendaoperasional/mysagendacalendar',$x);
	}
		
  }
  
  
  public function verifikasi_agenda()
  {
    $id   = ($this->session->userdata('level') == "pegawai") ? $this->session->userdata('id_pegawai') : $this->session->userdata('id_admin');
    $data = ($this->session->userdata('level') == "pegawai") ? $this->m_agendaoperasional->cari_agenda_pegawai($id) : $this->m_agendaoperasional->agenda_pegawai();
	
	$datacount=array();
	
	$im=0;
	foreach($data->result_array() as $dataman)
	{
	   $idman=$dataman['id_agenda'];
	   
	   $query = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman'");
	   $datacount[$im]['jumlahkegiatan']=$query->num_rows();
	   
	   $querypending = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman' AND status_kegiatan='0'");
	   $datacount[$im]['jumlahpending']=$querypending->num_rows();
	   
	   $queryapproved = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman' AND status_kegiatan='1'");
	   $datacount[$im]['jumlahapproved']=$queryapproved->num_rows();
	   
	   $queryreject = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman' AND status_kegiatan='2'");
	   $datacount[$im]['jumlahreject']=$queryreject->num_rows();
	   
	   $querywakil = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman' AND status_kegiatan='3'");
	   $datacount[$im]['jumlahwakil']=$querywakil->num_rows();
	   
	   $im++;
	}
	
    $x = array('judul' =>'Verifikasi Agenda Pegawai',
	          'datacount' => $datacount,
              'data'  =>$data); 
			  
    tpl('admin/agendaoperasional/agendaverifikasi',$x);
  }
  
  
  public function disposisi_agenda()
  {
    $id   = ($this->session->userdata('level') == "pegawai") ? $this->session->userdata('id_pegawai') : $this->session->userdata('id_admin');
    $data = ($this->session->userdata('level') == "pegawai") ? $this->m_agendaoperasional->cari_agenda_pegawai($id) : $this->m_agendaoperasional->agenda_pegawai_disposisi();
	
	$datacount=array();
	
	$im=0;
	foreach($data->result_array() as $dataman)
	{
	   $idman=$dataman['id_agenda'];
	   
	   $query = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman'");
	   $datacount[$im]['jumlahkegiatan']=$query->num_rows();
	   
	   $querypending = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman' AND status_kegiatan='0'");
	   $datacount[$im]['jumlahpending']=$querypending->num_rows();
	   
	   $queryapproved = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman' AND status_kegiatan='1'");
	   $datacount[$im]['jumlahapproved']=$queryapproved->num_rows();
	   
	   $queryreject = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman' AND status_kegiatan='2'");
	   $datacount[$im]['jumlahreject']=$queryreject->num_rows();
	   
	   $querywakil = $this->db->query("SELECT * FROM kegiatan WHERE id_agenda='$idman' AND status_kegiatan='3'");
	   $datacount[$im]['jumlahwakil']=$querywakil->num_rows();
	   
	   $im++;
	}
	
    $x = array('judul' =>'Disposisi Agenda Pegawai',
	          'datacount' => $datacount,
              'data'  =>$data); 
			  
    tpl('admin/agendaoperasional/agendadisposisi',$x);
  }
  
  
  public function agenda_kegiatan($id_agenda)
  {
    $id   = ($this->session->userdata('level') == "pegawai") ? $this->session->userdata('id_pegawai') : $this->session->userdata('id_admin');
    $data = ($this->session->userdata('level') == "pegawai") ? $this->m_agendaoperasional->kegiatan_pegawai($id_agenda) : $this->m_agendaoperasional->kegiatan_pegawai($id_agenda);
	
	$sql=$this->db->get_where('agendaoperasional',array('id_agenda'=>$id_agenda))->row_array(); 
	  
	
    $x = array('judul' =>'Daftar Kegiatan Agenda Pegawai',
	              'idm'=>$id_agenda,
				  'tanggal'=> $sql['tanggal'],
				  'nama_agenda'    => $sql['nama_agenda'],
				  'contact_person'    => $sql['contact_person'],
				  'informasi'    => $sql['informasi'],
				  'nama_pejabat' => $sql['nama_pejabat'],
				  'lokasi_agenda'    => $sql['lokasi_agenda'],
              	  'data'  =>$data); 
    tpl('admin/agendaoperasional/agendakegiatan',$x);
  }
  
  
  public function verifikasiagenda_kegiatan($id_agenda)
  {
    $id   = ($this->session->userdata('level') == "pegawai") ? $this->session->userdata('id_pegawai') : $this->session->userdata('id_admin');
    $data = ($this->session->userdata('level') == "pegawai") ? $this->m_agendaoperasional->kegiatan_pegawai($id_agenda) : $this->m_agendaoperasional->kegiatan_pegawai($id_agenda);
	
	$sql=$this->db->get_where('agendaoperasional',array('id_agenda'=>$id_agenda))->row_array(); 
	  
	
    $x = array('judul' =>'Daftar Kegiatan Agenda Pegawai',
	           'idm'=>$id_agenda,
				  'tanggal'=> $sql['tanggal'],
				  'nama_agenda'    => $sql['nama_agenda'],
				  'contact_person'    => $sql['contact_person'],
				  'informasi'    => $sql['informasi'],
				  'nama_pejabat' => $sql['nama_pejabat'],
				  'lokasi_agenda'    => $sql['lokasi_agenda'],
              'data'  =>$data); 
    tpl('admin/agendaoperasional/verifikasiagendakegiatan',$x);
  }
  
  
  public function disposisiagenda_kegiatan($id_agenda)
  {
    $id   = ($this->session->userdata('level') == "pegawai") ? $this->session->userdata('id_pegawai') : $this->session->userdata('id_admin');
    $data = ($this->session->userdata('level') == "pegawai") ? $this->m_agendaoperasional->disposisikegiatan_pegawai($id_agenda) : $this->m_agendaoperasional->disposisikegiatan_pegawai($id_agenda);
	
	$sql=$this->db->get_where('agendaoperasional',array('id_agenda'=>$id_agenda))->row_array(); 
	
	$datacount=array();
	
	$im=0;
	foreach($data->result_array() as $dataman)
	{
	   $idman=$dataman['id_kegiatan'];
	   
	   $query =$this->db->query("SELECT * from kegiatan d LEFT JOIN pegawai a ON(d.id_pejabatdisposisi=a.id_pegawai) WHERE id_kegiatan='$idman'");
	   $datapenerima=$query->row();
	  // print_r($datapenerima);
	   $datacount[$im]['nama_penerima']=$datapenerima->nama;
	  // exit();
	   $im++;
	}
	  
	
    $x = array('judul' =>'Disposisi Daftar Kegiatan Agenda Pegawai',
	           'idm'=>$id_agenda,
				  'tanggal'=> $sql['tanggal'],
				  'datacount' => $datacount,
				  'nama_agenda'    => $sql['nama_agenda'],
				  'contact_person'    => $sql['contact_person'],
				  'informasi'    => $sql['informasi'],
				  'nama_pejabat' => $sql['nama_pejabat'],
				  'lokasi_agenda'    => $sql['lokasi_agenda'],
              'data'  =>$data); 
    tpl('admin/agendaoperasional/disposisiagendakegiatan',$x);
  }
  
  public function setujui_kegiatan($id,$idm)
  {
	    $sql=$this->db->get_where('kegiatan',array('id_kegiatan'=>$id))->row_array(); 
	  
	    if($sql['status_kegiatan']==0)
		{
		  $inputData=array(
			'status_kegiatan'=>'1');
		 
		  $cek=$this->db->update('kegiatan',$inputData,array('id_kegiatan'=>$id));
		  
		  redirect(base_url('agendaoperasional/verifikasiagenda_kegiatan/'.$idm));
		}
		else
		{
		  redirect(base_url('agendaoperasional/verifikasiagenda_kegiatan/'.$idm));
		}
  }
  
  
  public function tolak_kegiatan($id='',$idm='')
  {
	    $sql=$this->db->get_where('kegiatan',array('id_kegiatan'=>$id))->row_array(); 
	  
	  
		if($sql['status_kegiatan']==0)
		{   	  
			  $x = array('judul'        =>'Tolak Data Kegiatan' ,
					  'aksi'        =>'tambah',
					  'tanggal'=>  $sql['tanggal'],
					  'jam_mulai'=>  $sql['jam_mulai'],
					  'jam_selesai'=> $sql['jam_selesai'],
					  'nama_kegiatan'    => $sql['nama_kegiatan'],
					  'contact_person'    => $sql['contact_person'],
					  'informasi'    => $sql['informasi'],
					  'tipestatus_kegiatan' =>$sql['tipestatus_kegiatan'],
					  'nama_pejabat' => $sql['nama_pejabat'],
					  'alasan_penolakan'=>'',
					  'lokasi_kegiatan'    => $sql['lokasi_kegiatan']); 
		
				if(isset($_POST['kirim']))
				{
				 
				  $inputData=array(
					'status_kegiatan'=>'2',
					'alasan_penolakan'   =>$this->input->post('alasan_penolakan'));
				 
				  $cek=$this->db->update('kegiatan',$inputData,array('id_kegiatan'=>$id));
				  
				  if($cek)
				  {
							$pesan='<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa fa-check"></i> Success!</h4>
								   Data Berhasil Di Tolak.
								  </div>';
							
							$this->session->set_flashdata('pesan',$pesan);
							redirect(base_url('agendaoperasional/verifikasiagenda_kegiatan/'.$idm));
		  
				  }
				  else
				  {
				   echo "ERROR input Data";
				  }
				}
				else
				{
				 tpl('admin/agendaoperasional/tolakkegiatan_form',$x);
				}
		  
		  
		}
		else
		{
		  redirect(base_url('agendaoperasional/verifikasiagenda_kegiatan/'.$idm));
		}
	  
	  
	  
	    
  }
  
  
  public function wakilkan_kegiatan($id='',$idm='')
  {
	    $sql=$this->db->get_where('kegiatan',array('id_kegiatan'=>$id))->row_array(); 
	  
	  
		if($sql['status_kegiatan']==0 || $sql['status_kegiatan']==3)
		{   	  
			  if($sql['status_kegiatan']==0)
			  {
			   $x = array('judul'        =>'Wakilkan Data Kegiatan' ,
					  'aksi'        =>'tambah',
					  'tanggal'=>  $sql['tanggal'],
					  'jam_mulai'=>  $sql['jam_mulai'],
					  'jam_selesai'=> $sql['jam_selesai'],
					  'nama_kegiatan'    => $sql['nama_kegiatan'],
					  'contact_person'    => $sql['contact_person'],
					  'informasi'    => $sql['informasi'],
					  'tipestatus_kegiatan' =>$sql['tipestatus_kegiatan'],
					  'nama_pejabat' => $sql['nama_pejabat'],
					  'disposisi'=>'',
					  'id_pejabatdisposisi'=>'',
					  'id_pegawai'=>$sql['id_pegawai'],
					  'pejabatdisposisi'=>$this->db->get('pegawai')->result_array(),
					  'lokasi_kegiatan'    => $sql['lokasi_kegiatan']); 
			   }
			   else
			   {
				   $x = array('judul'        =>'Wakilkan Data Kegiatan' ,
					  'aksi'        =>'tambah',
					  'tanggal'=>  $sql['tanggal'],
					  'jam_mulai'=>  $sql['jam_mulai'],
					  'jam_selesai'=> $sql['jam_selesai'],
					  'nama_kegiatan'    => $sql['nama_kegiatan'],
					  'contact_person'    => $sql['contact_person'],
					  'informasi'    => $sql['informasi'],
					  'tipestatus_kegiatan' =>$sql['tipestatus_kegiatan'],
					  'nama_pejabat' => $sql['nama_pejabat'],
					  'disposisi'=>$sql['disposisi'],
					  'id_pejabatdisposisi'=>$sql['id_pejabatdisposisi'],
					  'id_pegawai'=>$sql['id_pegawai'],
					  'pejabatdisposisi'=>$this->db->get('pegawai')->result_array(),
					  'lokasi_kegiatan'    => $sql['lokasi_kegiatan']); 
			   }
			   
				if(isset($_POST['kirim']))
				{
				 
				  $inputData=array(
					'status_kegiatan'=>'3',
					'id_pejabatdisposisi'=>$this->input->post('id_pejabatdisposisi'),
					'disposisi'   =>$this->input->post('disposisi'));
				 
				  $cek=$this->db->update('kegiatan',$inputData,array('id_kegiatan'=>$id));
				  
				  if($cek)
				  {
							$pesan='<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa fa-check"></i> Success!</h4>
								   Data Berhasil Di Wakilkan.
								  </div>';
							
							$this->session->set_flashdata('pesan',$pesan);
							redirect(base_url('agendaoperasional/verifikasiagenda_kegiatan/'.$idm));
		  
				  }
				  else
				  {
				   echo "ERROR input Data";
				  }
				}
				else
				{
				 tpl('admin/agendaoperasional/wakilkegiatan_form',$x);
				}
		  
		  
		}
		else
		{
		  redirect(base_url('agendaoperasional/verifikasiagenda_kegiatan/'.$idm));
		}
	  
	  
	  
	    
  }
  
  public function agenda_pending()
  {
    $id   = ($this->session->userdata('level') == "pegawai") ? $this->session->userdata('id_pegawai') : $this->session->userdata('id_admin');
    $data = ($this->session->userdata('level') == "pegawai") ? $this->m_agendaoperasional->cari_agenda_pegawai($id) : $this->m_agendaoperasional->agenda_pegawai_pending();
    $x = array('judul' =>'Pending Agenda Pegawai',
              'data'  =>$data); 
    tpl('admin/agendaoperasional/agendapending',$x);
  }
  
  public function agenda_approved()
  {
    $id   = ($this->session->userdata('level') == "pegawai") ? $this->session->userdata('id_pegawai') : $this->session->userdata('id_admin');
    $data = ($this->session->userdata('level') == "pegawai") ? $this->m_agendaoperasional->cari_agenda_pegawai($id) : $this->m_agendaoperasional->agenda_pegawai_approved();
    $x = array('judul' =>'Apporved Agenda Pegawai',
              'data'  =>$data); 
    tpl('admin/agendaoperasional/agendaapproved',$x);
  }
  
  public function agenda_reject()
  {
    $id   = ($this->session->userdata('level') == "pegawai") ? $this->session->userdata('id_pegawai') : $this->session->userdata('id_admin');
    $data = ($this->session->userdata('level') == "pegawai") ? $this->m_agendaoperasional->cari_agenda_pegawai($id) : $this->m_agendaoperasional->agenda_pegawai_reject();
    $x = array('judul' =>'Reject Agenda Pegawai',
              'data'  =>$data); 
    tpl('admin/agendaoperasional/agendareject',$x);
  }


  public function jabatan()
  {
   $x = array('judul' =>'Data Jabatan', 
              'data'=>$this->db->get('jabatan')->result_array()); 
   tpl('admin/agendaoperasional/jabatan',$x);
  }
  
  

  public function agenda_tambah()
  {
	  $x = array('judul'        => 'Tambah Data Agenda Operasional' ,
				  'aksi'        => 'tambah',
				  'tanggal'=> "",
				  'jam_mulai'=> "",
				  'jam_selesai'=> "",
				  'pegawai'=>$this->db->get('pegawai')->result_array(),
				  'nama_agenda'    => "",
				  'contact_person'    => "",
				  'informasi'    => "",
				  'id_pegawai' => "",
				  'id_pejabat' => "",
				  'nama_pejabat' =>"",
				  'sebagai' =>"",
				  'status_hadir '=>"",
				  'lokasi_agenda'    => ""); 
		
		if(isset($_POST['kirim']))
		{
			$idpegawai=$this->input->post('id_pegawai');
			$id_pejabat=$this->input->post('id_pejabat');
			$tanggal=$this->input->post('tanggal');
			$status_hadir=$this->input->post('status_hadir');
			
			$jammulai=$this->input->post('jam_mulai');
			$jammulai2=substr($jammulai,0,2).":00:00";
			
			$jammulai3=(substr($jammulai,0,2)-1).":00:00";
			
			$jamselesai=$this->input->post('jam_selesai');
			$jamselesai2=substr($jamselesai,0,2).":00:00";

			$querydatajumdata=0;
			$querydatajum = $this->db->query("SELECT * from agendaoperasional WHERE id_pegawai='$idpegawai' AND tanggal='$tanggal' AND (jam_mulai >= '$jammulai2' AND jam_selesai <= '$jamselesai2' OR jam_mulai >='$jammulai3' AND jam_selesai <='$jamselesai2') ");
			$querydatajumdata=$querydatajum->num_rows();
			$querydatajumdatarow=$querydatajum->row();

			$querydatajum21 = $this->db->query("SELECT * FROM agendapegawai a INNER JOIN agendaredaktur b ON(a.id_agenda=b.id_agenda) WHERE a.id_pegawai='$idpegawai' AND b.tanggal='$tanggal' AND (b.jam_mulai >= '$jammulai2' AND b.jam_selesai <= '$jamselesai2' OR jam_mulai >='$jammulai3' AND jam_selesai <='$jamselesai2' AND a.id_type=2)");
			$querydatajumdata21=$querydatajum21->num_rows();	
			$querydatajumdatarow2=$querydatajum21->row();
			
			$datapegawai=$this->input->post('id_pejabatmore');
			$jumdatapegawai=0;
			
			if(!empty($datapegawai))
			{
				foreach($datapegawai as $datapegikut)
				{
					
					$querydatajum2 = $this->db->query("SELECT * FROM agendapegawai a INNER JOIN agendaredaktur b ON(a.id_agenda=b.id_agenda) WHERE a.id_pegawai='$datapegikut' AND b.tanggal='$tanggal' AND (b.jam_mulai >= '$jammulai2' AND b.jam_selesai <= '$jamselesai2' OR jam_mulai >='$jammulai3' AND jam_selesai <='$jamselesai2' AND a.id_type=2)");
					$querydatajum3 = $this->db->query("SELECT * from agendaoperasional WHERE id_pegawai='$datapegikut' AND tanggal='$tanggal' AND (jam_mulai >= '$jammulai2' AND jam_selesai <= '$jamselesai2' OR jam_mulai >='$jammulai3' AND jam_selesai <='$jamselesai2') ");
					
					$querydatajumdata3=$querydatajum3->num_rows();
					$querydatajumdata2=$querydatajum2->num_rows();
					
					$jumdatapegawai=$jumdatapegawai+$querydatajumdata2;
					
					$querydatajumdata=$querydatajumdata+$querydatajumdata3;
					
				}
			}
			
			$jumdatapegawai=$jumdatapegawai+$querydatajumdata21;
			
			
			if($querydatajumdata>0 || $jumdatapegawai>0)
			{
					 if($querydatajumdata>0)
					 {
							 $pegawai='';
							 
							 foreach($querydatajum->result_array() as $datapegawai)
							 {
								 $idpegawaidata=$datapegawai['id_pegawai'];
								 $querydatapegawai = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai='$idpegawaidata'");
								 $querydatapegawairow=$querydatapegawai->row();
								 
								 $pegawai.=" ".$querydatapegawairow->nama;
							 }
							 
							
						 
						     $pesan='<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa fa-check"></i>Error</h4>
									PIC '.$pegawai.' Telah Terdaftar Di Agenda '.$querydatajumdatarow->informasi.' Tanggal :'.$querydatajumdatarow->tanggal.' Jam :'.$querydatajumdatarow->jam_mulai.' - '.$querydatajumdatarow->jam_selesai.'  ,
									Pegawai Atas Nama tersebut  sudah ada jadwal pada hari dan jam tersebut
									</div>';
					 }
					 else
					 {		 $pegawai='';
							  
							 $idpegawairow2=$this->input->post('id_pegawai');
							 $querydatapegawai2 = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai='$idpegawairow2'");
						     $querydatapegawairow2=$querydatapegawai2->row();
							  
							 $pegawai=$pegawai." ".$querydatapegawairow2->nama;
							 
							 $datapegawai=$this->input->post('id_pejabatmore');
							 foreach($datapegawai as $datapegikut)
							 {
								 $querydatajum2 = $this->db->query("SELECT * FROM agendapegawai a INNER JOIN agenda b ON(a.id_agenda=b.id_agenda) WHERE a.id_pegawai='$datapegikut' AND b.tanggal='$tanggal' AND (b.jam_mulai >= '$jammulai2' AND b.jam_selesai <= '$jamselesai2' OR jam_mulai >='$jammulai3' AND jam_selesai <='$jamselesai2') AND b.id_agenda NOT IN($id)  AND a.id_type=2");
								
								 foreach($querydatajum2->result_array() as $datapegawai)
								 {
									 $idagenda=$datapegawai['id_agenda'];
									 $querydatapegawaiagenda = $this->db->query("SELECT * FROM agendapegawai WHERE id_agenda='$idagenda'  AND id_type=2");
									 $pegawaiagendarow=$querydatapegawaiagenda->row();
									 $idpegawaidata=$pegawaiagendarow->id_pegawai;
									 
									 $querydatapegawai = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai='$idpegawaidata'");
									 $querydatapegawairow=$querydatapegawai->row();
									 
									 $pegawai.=", ".$querydatapegawairow->nama;
								 }
							 } 
							 
							  $pesan='<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa fa-check"></i>Error</h4>
									Anggota '.$pegawai.' Telah Terdaftar Di Agenda '.$querydatajumdatarow2->informasi.' Tanggal :'.$querydatajumdatarow2->tanggal.' Jam :'.$querydatajumdatarow2->jam_mulai.' - '.$querydatajumdatarow2->jam_selesai.'  ,
									Pegawai Atas Nama tersebut  sudah ada jadwal pada hari dan jam tersebut
									</div>';
					 }
						
						$this->session->set_flashdata('pesan',$pesan);
						redirect(base_url('agendaoperasional/agenda_tambah',$x));
			}
			else
			{
				$inputData=array(
					'tanggal'=>$this->input->post('tanggal'),
					'nama_agenda'   =>$this->input->post('nama_agenda'),
					'jam_mulai'=>$this->input->post('jam_mulai'),
					'jam_selesai'=>$this->input->post('jam_selesai'),
					'id_pegawai' =>$this->input->post('id_pegawai'),
					'contact_person'   =>$this->input->post('contact_person'),
					'informasi'   =>$this->input->post('informasi'),
					'id_pegawai'   => $this->input->post('id_pegawai'),
					'id_pejabat'   => $this->input->post('id_pejabat'),
					'nama_pejabat'   =>$this->input->post('nama_pejabat'),
					'sebagai'   =>$this->input->post('sebagai'),
					'status_hadir'   =>$this->input->post('status_hadir'),
					'lokasi_agenda'   =>$this->input->post('lokasi_agenda'));
				
				$datapegawai=$this->input->post('id_pejabatmore');
				$datafile=@$_FILES["item_file"];
				
				//echo "<br> Pegawai :";
				//print_r($datapegawai);
				//echo "<br> File";
				//print_r($datafile);
				//exit();
				
				$cek=$this->db->insert('agendaoperasional',$inputData);
				$agenda_id = $this->db->insert_id();

				if($cek)
				{	
					if(!empty($datapegawai))
					{
						foreach($datapegawai as $datapegikut)
						{
							$inputDatapegawai=array(
								'id_pegawai'=>$datapegikut,
								'id_type'=>1,
								'id_agenda'=>$agenda_id);
							$this->db->insert('agendapegawai',$inputDatapegawai);
						}
					}
					
					//print_r($datafile);

					$dataman = array();

					if(!empty($_FILES['item_file']['name']))
					{
							// Count total files
							$countfiles = count($_FILES['item_file']['name']);
			   
					
							// Looping all files
							//echo $countfiles;
							for($i=0;$i<$countfiles;$i++)
							{
					   
							  if(!empty($_FILES['item_file']['name'][$i]))
							  {
								//echo "masuk 2";
								// Define new $_FILES array - $_FILES['file']
								$_FILES['file']['name'] = $_FILES['item_file']['name'][$i];
								$_FILES['file']['type'] = $_FILES['item_file']['type'][$i];
								$_FILES['file']['tmp_name'] = $_FILES['item_file']['tmp_name'][$i];
								$_FILES['file']['error'] = $_FILES['item_file']['error'][$i];
								$_FILES['file']['size'] = $_FILES['item_file']['size'][$i];
								
								// Set preference
								$config['upload_path'] = './template/file/'; 
								$config['allowed_types'] = 'bmp|jpg|png|jpeg|gif|xls|doc|pdf';  
								$config['max_size'] = '100000'; // max_size in kb
								$config['file_name'] = $_FILES['item_file']['name'][$i];
					   
								//Load upload library
								$this->load->library('upload', $config);
								$this->upload->initialize($config);

								// File upload
								if($this->upload->do_upload('file'))
								{
								  // Get data about the file
								  $uploadData = $this->upload->data();
								  $filename = $uploadData['file_name'];
					  
								  // Initialize array
								  $dataman['filenames'][] = $filename;
								  $inputDatapegawai=array(
									'agenda_file'=>$filename,
									'id_type'=>1,
									'id_agenda'=>$agenda_id);
								  $this->db->insert('agendafile',$inputDatapegawai);
								}
							  }
							  else
							  {
								//echo "masuk 3";
							  }
					   
							}
					}


					$pesan='<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-check"></i> Success!</h4>
						Data Berhasil Di Ditambahkan.
						</div>';
					$this->session->set_flashdata('pesan',$pesan);
					redirect(base_url('agendaoperasional/index'));
				}
				else
				{
				echo "ERROR input Data";
				}
			}
		}
		else
		{
			 tpl('admin/agendaoperasional/agenda_form',$x);
		 
		}
		
  }
  
  
  
  
  public function kegiatan_tambah($idm)
  {
	  $x = array('judul'        => 'Tambah Data Agenda' ,
				  'aksi'        => 'tambah',
				  'tanggal'=> "",
				  'jam_mulai'=> "",
				  'jam_selesai'=> "",
				  'pegawai'=>$this->db->get('pegawai')->result_array(),
				  'nama_kegiatan'    => "",
				  'lokasi_kegiatan' =>"",
				  'contact_person'    => "",
				  'informasi'    => "",
				  'id_pegawai'=>'',
				  'pejabatdisposisi'=>$this->db->get('pegawai')->result_array(),
				  'tipestatus_kegiatan' =>"",
				  'nama_pejabat' =>""); 
		
		if(isset($_POST['kirim']))
		{
		  
		  $inputData=array(
		    'id_agenda'=>$idm,
			'tanggal'=>$this->input->post('tanggal'),
			'jam_mulai'=>$this->input->post('jam_mulai'),
			'jam_selesai'=>$this->input->post('jam_selesai'),
			'nama_kegiatan'   =>$this->input->post('nama_kegiatan'),
			'lokasi_kegiatan'   =>$this->input->post('lokasi_kegiatan'),
			'contact_person'   =>$this->input->post('contact_person'),
			'status_kegiatan'   =>'0',
			'informasi'   =>$this->input->post('informasi'),
			'tipestatus_kegiatan'   =>$this->input->post('tipestatus_kegiatan'),
			'id_pegawai'   => $this->input->post('id_pegawai'),
			'nama_pejabat'   =>$this->input->post('nama_pejabat'));
		  
		  $cek=$this->db->insert('kegiatan',$inputData);
		  
		  if($cek)
		  {

				$pesan='<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-check"></i> Success!</h4>
					Data Berhasil Di Ditambahkan.
					</div>';
				$this->session->set_flashdata('pesan',$pesan);
				redirect(base_url('agendaoperasional/agenda_kegiatan/'.$idm));
		  }
		  else
		  {
		   echo "ERROR input Data";
		  }
		}
		else
		{
		 tpl('admin/agendaoperasional/kegiatan_form',$x);
		}
  }
  
    
  public function agenda_edit($id='')
  {
	  $sql=$this->db->get_where('agendaoperasional',array('id_agenda'=>$id))->row_array(); 
	  
	  $x = array('judul'        =>'Edit Data Agenda' ,
				  'aksi'        =>'tambah',
				  'tanggal'=> $sql['tanggal'],
				  'jam_mulai'=> $sql['jam_mulai'],
				  'jam_selesai'=> $sql['jam_selesai'],
				  'id_pegawai'=> $sql['id_pegawai'],
				  'id_pejabat' => $sql['id_pejabat'],
				  'pegawai'=>$this->db->get('pegawai')->result_array(),
				  'agendafile'=>$this->db->get_where('agendafile',array('id_agenda'=>$id))->result_array(),
				  'agendapegawai'=>$this->db->get_where('agendapegawai',array('id_agenda'=>$id))->result_array(),
				  'nama_agenda'    => $sql['nama_agenda'],
				  'contact_person'    => $sql['contact_person'],
				  'informasi'    => $sql['informasi'],
				  'nama_pejabat' => $sql['nama_pejabat'],
				  'sebagai' => $sql['sebagai'],
				  'status_hadir' => $sql['status_hadir'],
				  'lokasi_agenda'    => $sql['lokasi_agenda']); 
		
		if(isset($_POST['kirim']))
		{
			$idpegawai=$this->input->post('id_pegawai');
			$id_pejabat=$this->input->post('id_pejabat');
			$tanggal=$this->input->post('tanggal');
			
			$jammulai=$this->input->post('jam_mulai');
			$jammulai2=substr($jammulai,0,2).":00:00";
			$jammulai3=(substr($jammulai,0,2)-1).":00:00";
			
			$jamselesai=$this->input->post('jam_selesai');
			$jamselesai2=substr($jamselesai,0,2).":00:00";

			$querydatajumdata=0;
			$querydatajum = $this->db->query("SELECT * from agendaoperasional WHERE id_pegawai='$idpegawai' AND tanggal='$tanggal' AND (jam_mulai >= '$jammulai2' AND jam_selesai <= '$jamselesai2' OR jam_mulai >='$jammulai3' AND jam_selesai <='$jamselesai2') AND id_agenda NOT IN($id)");
			$querydatajumdata=$querydatajum->num_rows();
			$querydatajumdatarow=$querydatajum->row();
			
			$querydatajum21= $this->db->query("SELECT * FROM agendapegawai a INNER JOIN agendaredaktur b ON(a.id_agenda=b.id_agenda) WHERE a.id_pegawai='$idpegawai' AND b.tanggal='$tanggal' AND (b.jam_mulai >= '$jammulai2' AND b.jam_selesai <= '$jamselesai2' OR jam_mulai >='$jammulai3' AND jam_selesai <='$jamselesai2') AND b.id_agenda NOT IN($id)  AND a.id_type=2");
			$querydatajumdata21=$querydatajum21->num_rows();
			
			$datapegawai=$this->input->post('id_pejabatmore');
			$jumdatapegawai=0;
			
			if(!empty($datapegawai))
			{
				foreach($datapegawai as $datapegikut)
				{
					$querydatajum2 = $this->db->query("SELECT * FROM agendapegawai a INNER JOIN agendaredaktur b ON(a.id_agenda=b.id_agenda) WHERE a.id_pegawai='$datapegikut' AND b.tanggal='$tanggal' AND (b.jam_mulai >= '$jammulai2' AND b.jam_selesai <= '$jamselesai2' OR jam_mulai >='$jammulai3' AND jam_selesai <='$jamselesai2') AND b.id_agenda NOT IN($id)  AND a.id_type=2");
					$querydatajum3 = $this->db->query("SELECT * from agendaoperasional WHERE id_pegawai='$datapegikut' AND tanggal='$tanggal' AND (jam_mulai >= '$jammulai2' AND jam_selesai <= '$jamselesai2' OR jam_mulai >='$jammulai3' AND jam_selesai <='$jamselesai2') AND id_agenda NOT IN($id)");
					$querydatajumrow3=$querydatajum3->num_rows();
					
					$querydatajumdata2=$querydatajum2->num_rows();
					
					$jumdatapegawai=$jumdatapegawai+$querydatajumdata2;
					$querydatajumdata=$querydatajumdata+$querydatajumrow3;
				}
			}
			
			$jumdatapegawai=$jumdatapegawai+$querydatajumdata21;
			
			if($querydatajumdata>0 || $jumdatapegawai>0)
			{
					 if($querydatajumdata>0)
					 {
							 $pegawai='';
							 
							 foreach($querydatajum->result_array() as $datapegawai)
							 {
								 $idpegawaidata=$datapegawai['id_pegawai'];
								 $querydatapegawai = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai='$idpegawaidata'");
								 $querydatapegawairow=$querydatapegawai->row();
								 
								 $pegawai.=" ".$querydatapegawairow->nama;
							 }
							 
							
						 
						     $pesan='<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa fa-check"></i>Error</h4>
									PIC '.$pegawai.' Telah Terdaftar Di Agenda '.$querydatajumdatarow->informasi.' Tanggal :'.$querydatajumdatarow->tanggal.' Jam :'.$querydatajumdatarow->jam_mulai.' - '.$querydatajumdatarow->jam_selesai.'  ,
									Pegawai Atas Nama tersebut  sudah ada jadwal pada hari dan jam tersebut
									</div>';
					 }
					 else
					 {		 $pegawai='';
							  
							 $idpegawairow2=$this->input->post('id_pegawai');
							 $querydatapegawai2 = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai='$idpegawairow2'");
						     $querydatapegawairow2=$querydatapegawai2->row();
							  
							 $pegawai=$pegawai." ".$querydatapegawairow2->nama;
							 
							 $datapegawai=$this->input->post('id_pejabatmore');
							 foreach($datapegawai as $datapegikut)
							 {
								 $querydatajum2 = $this->db->query("SELECT * FROM agendapegawai a INNER JOIN agenda b ON(a.id_agenda=b.id_agenda) WHERE a.id_pegawai='$datapegikut' AND b.tanggal='$tanggal' AND (b.jam_mulai >= '$jammulai2' AND b.jam_selesai <= '$jamselesai2' OR jam_mulai >='$jammulai3' AND jam_selesai <='$jamselesai2') AND b.id_agenda NOT IN($id)  AND a.id_type=2");
								
								 foreach($querydatajum2->result_array() as $datapegawai)
								 {
									 $idagenda=$datapegawai['id_agenda'];
									 $querydatapegawaiagenda = $this->db->query("SELECT * FROM agendapegawai WHERE id_agenda='$idagenda'  AND id_type=2");
									 $pegawaiagendarow=$querydatapegawaiagenda->row();
									 $idpegawaidata=$pegawaiagendarow->id_pegawai;
									 
									 $querydatapegawai = $this->db->query("SELECT * FROM pegawai WHERE id_pegawai='$idpegawaidata'");
									 $querydatapegawairow=$querydatapegawai->row();
									 
									 $pegawai.=", ".$querydatapegawairow->nama;
								 }
							 } 
							 
							  $pesan='<div class="alert alert-danger alert-dismissible">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa fa-check"></i>Error</h4>
									Anggota '.$pegawai.' Telah Terdaftar Di Agenda '.$querydatajumdatarow2->informasi.' Tanggal :'.$querydatajumdatarow2->tanggal.' Jam :'.$querydatajumdatarow2->jam_mulai.' - '.$querydatajumdatarow2->jam_selesai.'  ,
									Pegawai Atas Nama tersebut  sudah ada jadwal pada hari dan jam tersebut
									</div>';
					 }
						
						$this->session->set_flashdata('pesan',$pesan);
						redirect(base_url('agendaoperasional/agenda_tambah',$x));
			}
			else
			{
		 
				$inputData=array(
					'tanggal'=>$this->input->post('tanggal'),
					'nama_agenda'   =>$this->input->post('nama_agenda'),
					'jam_mulai'=>$this->input->post('jam_mulai'),
					'jam_selesai'=>$this->input->post('jam_selesai'),
					'id_pegawai' =>$this->input->post('id_pegawai'),
					'id_pejabat' =>$this->input->post('id_pejabat'),
					'contact_person'   =>$this->input->post('contact_person'),
					'informasi'   =>$this->input->post('informasi'),
					'nama_pejabat'   =>$this->input->post('nama_pejabat'),
					'sebagai'   =>$this->input->post('sebagai'),
					'status_hadir'   =>$this->input->post('status_hadir'),
					'lokasi_agenda'   =>$this->input->post('lokasi_agenda'));
				
				$datapegawai=$this->input->post('id_pejabatmore');
				$datafile=@$_FILES["item_file"];
	
				$cek=$this->db->update('agendaoperasional',$inputData,array('id_agenda'=>$id));
				 
				if($cek)
				{
					$cek2=$this->db->delete('agendapegawai',array('id_agenda'=>$id));
					foreach($datapegawai as $datapegikut)
					{

						$inputDatapegawai=array(
							'id_pegawai'=>$datapegikut,
							'id_type'=>2,
							'id_agenda'=>$id);
						$this->db->insert('agendapegawai',$inputDatapegawai);
					}
					
					//print_r($datafile);

					$dataman = array();

					// Count total files
					$countfiles = count($_FILES['item_file']['name']);
			   
					// Looping all files
					//echo $countfiles;
					for($i=0;$i<$countfiles;$i++)
					{
					  $cek2=$this->db->delete('agendafile',array('id_agenda'=>$id));
					  
					  if(!empty($_FILES['item_file']['name'][$i]))
					  {
						//echo "masuk 2";
						// Define new $_FILES array - $_FILES['file']
						$_FILES['file']['name'] = $_FILES['item_file']['name'][$i];
						$_FILES['file']['type'] = $_FILES['item_file']['type'][$i];
						$_FILES['file']['tmp_name'] = $_FILES['item_file']['tmp_name'][$i];
						$_FILES['file']['error'] = $_FILES['item_file']['error'][$i];
						$_FILES['file']['size'] = $_FILES['item_file']['size'][$i];
						
						// Set preference
						$config['upload_path'] = './template/file/'; 
						$config['allowed_types'] = 'bmp|jpg|png|jpeg|gif|xls|doc|pdf';  
						$config['max_size'] = '100000'; // max_size in kb
						$config['file_name'] = $_FILES['item_file']['name'][$i];
			   
						//Load upload library
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

						// File upload
						if($this->upload->do_upload('file'))
						{
						  // Get data about the file
						  $uploadData = $this->upload->data();
						  $filename = $uploadData['file_name'];
			  
						  // Initialize array
						  $dataman['filenames'][] = $filename;
						  $inputDatapegawai=array(
							'agenda_file'=>$filename,
							'id_type'=>2,
							'id_agenda'=>$agenda_id);
						  $this->db->insert('agendafile',$inputDatapegawai);
						}
					  }
					  else
					  {
						//echo "masuk 3";
					  }
					}


						$pesan='<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								<h4><i class="icon fa fa-check"></i> Success!</h4>
							Data Berhasil Di Diedit.
							</div>';
						
						$this->session->set_flashdata('pesan',$pesan);
						redirect(base_url('agendaoperasional/index'));

				}
				else
				{
					echo "ERROR input Data";
				}
			}
		}
		else
		{
		 tpl('admin/agendaoperasional/agenda_form',$x);
		}
  }
  
  public function kegiatan_edit($id='',$idm='')
  {
	  $sql=$this->db->get_where('kegiatan',array('id_kegiatan'=>$id))->row_array(); 
	  
	  $x = array('judul'        =>'Edit Data Agenda' ,
				  'aksi'        =>'tambah',
				  'tanggal'=> $sql['tanggal'],
				  'jam_mulai'=>  $sql['jam_mulai'],
				  'jam_selesai'=> $sql['jam_selesai'],
				  'nama_kegiatan'    => $sql['nama_kegiatan'],
				  'contact_person'    => $sql['contact_person'],
				  'informasi'    => $sql['informasi'],
				  'tipestatus_kegiatan' =>$sql['tipestatus_kegiatan'],
				  'id_pegawai'=>$sql['id_pegawai'],
				  'pejabatdisposisi'=>$this->db->get('pegawai')->result_array(),
				  'nama_pejabat' => $sql['nama_pejabat'],
				  'lokasi_kegiatan'    => $sql['lokasi_kegiatan']); 
		
		if(isset($_POST['kirim']))
		{
		 
		  $inputData=array(
			'tanggal'=>$this->input->post('tanggal'),
			'nama_kegiatan'   =>$this->input->post('nama_kegiatan'),
			'contact_person'   =>$this->input->post('contact_person'),
			'informasi'   =>$this->input->post('informasi'),
			'tipestatus_kegiatan'   =>$this->input->post('tipestatus_kegiatan'),
			'id_pegawai'   => $this->input->post('id_pegawai'),
			'nama_pejabat'   =>$this->input->post('nama_pejabat'),
			'lokasi_kegiatan'   =>$this->input->post('lokasi_kegiatan'));
		 
		  $cek=$this->db->update('kegiatan',$inputData,array('id_kegiatan'=>$id));
		  
		  if($cek)
		  {
					$pesan='<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-check"></i> Success!</h4>
						   Data Berhasil Di Diedit.
						  </div>';
					
					$this->session->set_flashdata('pesan',$pesan);
					redirect(base_url('agendaoperasional/agenda_kegiatan/'.$idm));
		  }
		  else
		  {
		   echo "ERROR input Data";
		  }
		}
		else
		{
		 tpl('admin/agendaoperasional/kegiatan_form',$x);
		}
  }
  
  public function agenda_detail($id='')
  {
	  $sql=$this->db->get_where('agendaoperasional',array('id_agenda'=>$id))->row_array(); 
	  
	  $x = array('judul'        =>'Detail Data Agenda' ,
				  'aksi'        =>'tambah',
				  'tanggal'=> $sql['tanggal'],
				  'jam_mulai'=> $sql['jam_mulai'],
				  'jam_selesai'=> $sql['jam_selesai'],
				  'id_pegawai'=> $sql['id_pegawai'],
				  'id_pejabat' => $sql['id_pejabat'],
				  'pegawai'=>$this->db->get('pegawai')->result_array(),
				  'agendafile'=>$this->db->get_where('agendafile',array('id_agenda'=>$id))->result_array(),
				  'agendapegawai'=>$this->db->get_where('agendapegawai',array('id_agenda'=>$id))->result_array(),
				  'nama_agenda'    => $sql['nama_agenda'],
				  'contact_person'    => $sql['contact_person'],
				  'informasi'    => $sql['informasi'],
				  'sebagai'    => $sql['sebagai'],
				  'nama_pejabat' => $sql['nama_pejabat'],
				  'status_hadir ' => $sql['status_hadir'],
				  'lokasi_agenda'    => $sql['lokasi_agenda']); 
		
		
	   tpl('admin/agendaoperasional/agenda_formdetail',$x);	
  }


  public function kegiatan_detail($id='')
  {
	   $sql=$this->db->get_where('kegiatan',array('id_kegiatan'=>$id))->row_array(); 
	  
	    $x = array('judul'        =>'Edit Data Agenda' ,
				  'aksi'        =>'tambah',
				  'tanggal'=> $sql['tanggal'],
				  'jam_mulai'=>  $sql['jam_mulai'],
				  'jam_selesai'=> $sql['jam_selesai'],
				  'nama_kegiatan'    => $sql['nama_kegiatan'],
				  'contact_person'    => $sql['contact_person'],
				  'tipestatus_kegiatan'   =>$this->input->post('tipestatus_kegiatan'),
				  'informasi'    => $sql['informasi'],
				  'nama_pejabat' => $sql['nama_pejabat'],
				  'lokasi_kegiatan'    => $sql['lokasi_kegiatan']); 
		
		
	   tpl('admin/agendaoperasional/kegiatan_formdetail',$x);	
  }


  
  
  public function agenda_hapus($id='')
  {
	   $cek=$this->db->delete('agendaoperasional',array('id_agenda'=>$id));
	   if ($cek) {
		$pesan='<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Success!</h4>
				   Data Berhasil Di Hapus.
				  </div>';
		$this->session->set_flashdata('pesan',$pesan);
		redirect(base_url('agendaoperasional/index'));
	   }
  }
  
  
  public function kegiatan_hapus($id='',$idm='')
  {
	   $cek=$this->db->delete('kegiatan',array('id_kegiatan'=>$id));
	   if ($cek) {
		$pesan='<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Success!</h4>
				   Data Berhasil Di Hapus.
				  </div>';
		$this->session->set_flashdata('pesan',$pesan);
		redirect(base_url('agendaoperasional/agenda_kegiatan/'.$idm));
	   }
  }

	
	public function excel()
	{
		$this->load->helper('exportexcel');
		$namaFile = "AgendaData.xls";
		$judul = "tbl_agenda";
		$tablehead = 0;
		$tablebody = 1;
		$nourut = 1;
		//penulisan header
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=" . $namaFile . "");
		header("Content-Transfer-Encoding: binary ");
  
		xlsBOF();
  
		$kolomhead = 0;
			  xlsWriteLabel($tablehead, $kolomhead++, "No");
			  xlsWriteLabel($tablehead, $kolomhead++, "Nama Agenda");
			  xlsWriteLabel($tablehead, $kolomhead++, "Tgl Agenda");
			  xlsWriteLabel($tablehead, $kolomhead++, "Jam Mulai");
			  xlsWriteLabel($tablehead, $kolomhead++, "Jam Selesai");
  
			foreach ($this->db->query("SELECT * from agendaoperasional d LEFT JOIN pegawai a ON(d.id_pegawai=a.id_pegawai)")->result() as $data) {
				  $kolombody = 0;
  
				  //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
				  xlsWriteNumber($tablebody, $kolombody++, $nourut);
				  xlsWriteLabel($tablebody, $kolombody++, $data->nama_agenda);
				  xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
				  xlsWriteLabel($tablebody, $kolombody++, $data->jam_mulai);
				  xlsWriteLabel($tablebody, $kolombody++, $data->jam_selesai);
  
				   $tablebody++;
				  $nourut++;
			 }
  
			xlsEOF();
			exit();
	}
	
	public function myexcel()
	{
		$this->load->helper('exportexcel');
		$namaFile = "my_agendaExcel.xls";
		$judul = "my_agenda";
		$tablehead = 0;
		$tablebody = 1;
		$nourut = 1;
		//penulisan header
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=" . $namaFile . "");
		header("Content-Transfer-Encoding: binary ");
		
		$idm=$this->session->userdata('id_admin');
		$data=$this->db->query("SELECT * from admin a LEFT JOIN pegawai d ON(d.id_pegawai=a.id_pegawai) WHERE a.id_admin='$idm'")->row_array();
		$idm2=$data['id_pegawai'];
	   
		$id   = ($this->session->userdata('level') == "pegawai") ? $this->session->userdata('id_pegawai') : $this->session->userdata('id_admin');
		$data = ($this->session->userdata('level') == "pegawai") ? $this->m_agendaoperasional->cari_agenda_pegawai($id) : $this->m_agendaoperasional->agenda_pegawai();
		$data2 = ($this->session->userdata('level') == "pegawai") ? $this->m_agendaoperasional->cari_agenda_pegawai($idm2) : $this->m_agendaoperasional->cari_agenda_pegawai($idm2);
		
		$datacount=array();
		
		xlsBOF();
  
		$kolomhead = 0;
			  xlsWriteLabel($tablehead, $kolomhead++, "No");
			  xlsWriteLabel($tablehead, $kolomhead++, "Nama Agenda");
			  xlsWriteLabel($tablehead, $kolomhead++, "Tgl Agenda");
			  xlsWriteLabel($tablehead, $kolomhead++, "Jam Mulai");
			  xlsWriteLabel($tablehead, $kolomhead++, "Jam Selesai");
  
			foreach ($data2->result() as $data) {
				  $kolombody = 0;
  
				  //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
				  xlsWriteNumber($tablebody, $kolombody++, $nourut);
				  xlsWriteLabel($tablebody, $kolombody++, $data->nama_agenda);
				  xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
				  xlsWriteLabel($tablebody, $kolombody++, $data->jam_mulai);
				  xlsWriteLabel($tablebody, $kolombody++, $data->jam_selesai);
  
				   $tablebody++;
				  $nourut++;
			 }
  
			xlsEOF();
			exit();
	}
	
	
	
  
	public function word()
	{
		header("Content-type: application/vnd.ms-word");
		header("Content-Disposition: attachment;Filename=tbl_agenda.doc");
  
		$data = array(
			'tbl_agenda_data' => $this->db->query("SELECT * from agendaoperasional d LEFT JOIN pegawai a ON(d.id_pegawai=a.id_pegawai)")->result(),
			'start' => 0
		);
		
		$this->load->view('admin/agendaoperasional/tbl_agenda_doc',$data);
	}
  
	  
}
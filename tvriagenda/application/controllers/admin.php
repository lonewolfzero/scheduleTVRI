<?php
 if ( ! defined('BASEPATH')) exit(header('Location:../'));
class Admin extends CI_controller
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
  }

  public function index()
  {
     /*$table_to_count = ['pegawai','']
      for ($i=0; $i <=count($table_to_count) ; $i++) { 
        $count_data[i]=$this->m_admin->count_data($table);
      }*/

      $query = $this->db->query("SELECT * FROM pegawai");
      $datacount['jumlahpegawai']=$query->num_rows();

      $query = $this->db->query("SELECT * FROM agenda");
      $datacount['jumlahkegiatan']=$query->num_rows();
      
      $querypending = $this->db->query("SELECT * FROM agenda WHERE tanggal <= CURDATE()");
      $datacount['jumlahpending']=$querypending->num_rows();
      
      $queryapproved = $this->db->query("SELECT * FROM agenda WHERE tanggal > CURDATE()");
      $datacount['jumlahapproved']=$queryapproved->num_rows();
      
      $queryreject = $this->db->query("SELECT * FROM agenda WHERE status_agenda='2'");
      $datacount['jumlahreject']=$queryreject->num_rows();
      
      $querywakil = $this->db->query("SELECT * FROM agenda WHERE status_agenda='3'");
      $datacount['jumlahwakil']=$querywakil->num_rows();

      $x = array('judul' =>'Dashboard',
                 'datacount' => $datacount,);
      
      tpl('admin/home',$x);
  }
  

  public function jabatan()
  {
	$x = array('judul' =>'Data Jabatan', 
              'data'=>$this->db->query("SELECT * from jabatan a LEFT JOIN deputi b ON(a.id_deputi=b.id_deputi) LEFT JOIN unitkerja c ON(a.id_unitkerja=c.id_unitkerja) group by a.id_jabatan")->result_array());
	tpl('admin/jabatan',$x);
  }

  public function jabatan_tambah()
  {
	  $x = array('judul'        => 'Tambah Data Jabatan' ,
				  'aksi'        => 'tambah',
				  'nama_jabatan'=> "",
				  'golongan'    => "",
				  'unitkerja'=>$this->db->get('unitkerja')->result_array(),
				  'deputi'=>$this->db->get('deputi')->result_array(),
				  'tunjangan'   => ""); 
    
	if(isset($_POST['kirim']))
    {
		 $inputData=array(
		'nama_jabatan'=>$this->input->post('nama_jabatan'),
		'golongan'    =>$this->input->post('golongan'),
		'id_deputi'    =>$this->input->post('id_deputi'),
		'id_unitkerja'    =>$this->input->post('id_unitkerja'),
		'tunjangan'         =>$this->input->post('tunjangan'));
			
		 $cek=$this->db->insert('jabatan',$inputData);
      
	  if($cek)
      {
          $pesan='<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-check"></i> Success!</h4>
              Data Berhasil Di Ditambahkan.
              </div>';
        $this->session->set_flashdata('pesan',$pesan);
        redirect(base_url('admin/jabatan'));
      }
      else
      {
		   echo "ERROR input Data";
	  }
	}
	else
	{
		 tpl('admin/jabatan_form',$x);
	}
  }
    
  public function jabatan_edit($id='')
  {
	  $sql=$this->db->get_where('jabatan',array('id_jabatan'=>$id))->row_array(); 
	  
	  $x = array('judul'        =>'Tambah Data Jabatan' ,
				  'aksi'        =>'tambah',
				  'unitkerja'=>$this->db->get('unitkerja')->result_array(),
				  'deputi'=>$this->db->get('deputi')->result_array(),
				  'nama_jabatan'=>$sql['nama_jabatan'],
				  'golongan'    =>$sql['golongan'],
				  'id_deputi'=>$sql['id_deputi'],
				  'id_unitkerja'    =>$sql['id_unitkerja'],
			      'tunjangan'         =>$sql['tunjangan']); 
		
		if(isset($_POST['kirim']))
		{
			 $inputData=array(
				'nama_jabatan'=>$this->input->post('nama_jabatan'),
				'golongan'    =>$this->input->post('golongan'),
				'id_deputi'    =>$this->input->post('id_deputi'),
			    'id_unitkerja'    =>$this->input->post('id_unitkerja'),
				'tunjangan'         =>$this->input->post('tunjangan'));
			  
			  $cek=$this->db->update('jabatan',$inputData,array('id_jabatan'=>$id));
			  if($cek)
			  {
					$pesan='<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-check"></i> Success!</h4>
						   Data Berhasil Di Diedit.
						  </div>';
						  
					$this->session->set_flashdata('pesan',$pesan);
					redirect(base_url('admin/jabatan'));
					
			  }
			  else
			  {
			   echo "ERROR input Data";
			  }
		}else{
		 tpl('admin/jabatan_form',$x);
		}
  }

  
  public function jabatan_hapus($id='')
  {
   $cek=$this->db->delete('jabatan',array('id_jabatan'=>$id));
   if ($cek) {
    $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/jabatan'));
   }
  }

  public function pegawai($value='')
  {
   $x = array('judul' =>':: Data Pegawai ::',
              'data'  =>$this->m_admin->pegawai(),);  
     tpl('admin/pegawai',$x);
  }

  public function ls_pegawai($value='')
  {
     $data=$this->m_admin->pegawai()->row_array();
    echo json_encode($data);
  }

  public function pegawai_tambah($value='')
  {
      $x = array(
        'judul' =>'Tambah Data Pegawai' , 
        'aksi'  =>'Tambah',
        'jabatan'=>$this->db->get('jabatan')->result_array(),
        'jenisjabatan'=>$this->db->get('jenisjabatan')->result_array(),
        'deputi'=>$this->db->get('deputi')->result_array(),
        'statusasn'=>$this->db->get('statusasn')->result_array(),
        'golruang'=>$this->db->get('golruang')->result_array(),
        'organisasi'=>$this->db->get('organisasi')->result_array(),
        'satuankerja'=>$this->db->get('satuankerja')->result_array(),
        'subunitkerja'=>$this->db->get('subunitkerja')->result_array(),
        'unitkerja'=>$this->db->get('unitkerja')->result_array(),
        'id_jabatan'=>'',
		'nohp'=>'',
        'id_jenisjabatan'=>'',
        'id_deputi'=>'',
        'id_statusasn'=>'',
        'id_golruang'=>'',
        'id_organisasi'=>'',
        'id_satuankerja'=>'',
        'id_subunitkerja'=>'',
        'id_unitkerja'=>'',
          'nip'=>'',
          'nama'=>'',
          'jk'=>'',
          'foto'=>'',
          'agama'=>'',
          'pendidikan'=>'',
          'status_kep'=>'',
          'alamat'=>'',
		  'tgl_dinas'=>'',
		  'status_dinas'=>''
        );
    
	if (isset($_POST['kirim'])) 
    {
      
      $config['upload_path'] = './template/data/'; 
      $config['allowed_types'] = 'bmp|jpg|png';  
      $config['file_name'] = 'foto_'.time();  
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      
		  if(empty($_FILES['gambar']['name']))
		  {
				$SQLinsert=array(
				'id_jabatan'=>$this->input->post('id_jabatan'),
				'id_jenisjabatan'=>$this->input->post('id_jenisjabatan'),
				'id_deputi'=>$this->input->post('id_deputi'),
				'id_statusasn'=>$this->input->post('id_statusasn'),
				'id_golruang'=>$this->input->post('id_golruang'),
				'id_organisasi'=>$this->input->post('id_organisasi'),
				'id_unitkerja'=>$this->input->post('id_unitkerja'),
				'nip'=>$this->input->post('nip'),
				'nama'=>$this->input->post('nama'),
				'jk'=>$this->input->post('jk'),
				'nohp'=>$this->input->post('nohp'),
				//'foto'=>$this->upload->file_name,
				'agama'=>$this->input->post('agama'),
				'pendidikan'=>$this->input->post('pendidikan'),
				'status_kep'=>$this->input->post('status_kep'),
				'alamat'=>$this->input->post('alamat'),
				'tgl_dinas'=>$this->input->post('tgl_dinas'),
				'status_dinas'=>$this->input->post('status_dinas')
				//'password'=>md5($this->input->post('password'))
				);

				  $cek=$this->db->insert('pegawai',$SQLinsert);
				  
				  if($cek)
				  {
							$pesan='<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<h4><i class="icon fa fa-check"></i> Success!</h4>
								   Data Berhasil Di Tambahkan.
								  </div>';
							$this->session->set_flashdata('pesan',$pesan);
							  redirect(base_url('admin/pegawai'));
				  }else{
						echo "QUERY SQL ERROR";
				  }
			  
		  }
		  else if($this->upload->do_upload('gambar'))
		  {
			  
			$SQLinsert=array(
			'id_jabatan'=>$this->input->post('id_jabatan'),
				'id_jenisjabatan'=>$this->input->post('id_jenisjabatan'),
				'id_deputi'=>$this->input->post('id_deputi'),
				'id_statusasn'=>$this->input->post('id_statusasn'),
				'id_golruang'=>$this->input->post('id_golruang'),
				'id_organisasi'=>$this->input->post('id_organisasi'),
				'id_unitkerja'=>$this->input->post('id_unitkerja'),
				'nip'=>$this->input->post('nip'),
				'nama'=>$this->input->post('nama'),
				'jk'=>$this->input->post('jk'),
				'nohp'=>$this->input->post('nohp'),
				'foto'=>$this->upload->file_name,
				'agama'=>$this->input->post('agama'),
				'pendidikan'=>$this->input->post('pendidikan'),
				'status_kep'=>$this->input->post('status_kep'),
				'alamat'=>$this->input->post('alamat'),
				'tgl_dinas'=>$this->input->post('tgl_dinas'),
				'status_dinas'=>$this->input->post('status_dinas')
			);

			$cek=$this->db->insert('pegawai',$SQLinsert);
			if($cek){
				$pesan='<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-check"></i> Success!</h4>
						   Data Berhasil Di Tambahkan.
						  </div>';
				$this->session->set_flashdata('pesan',$pesan);
				redirect(base_url('admin/pegawai'));
			}else{
			 echo "QUERY SQL ERROR";
			}
		  }
		  else
		  {
			echo $this->upload->display_errors();
		  }
		
		}
		else
		{
		  tpl('admin/pegawai_form',$x);
		} 
	 
  }


  public function pegawai_edit($id='')
  {

	  $data=$this->db->get_where('pegawai',array('id_pegawai'=>$id))->row_array();  
	  $x = array(
		'aksi'=>'edit',
		'judul' =>'Tambah Data Pegawai' ,
		'jabatan'=>$this->db->get('jabatan')->result_array(),
		'jenisjabatan'=>$this->db->get('jenisjabatan')->result_array(),
		'deputi'=>$this->db->get('deputi')->result_array(),
		'statusasn'=>$this->db->get('statusasn')->result_array(),
		'golruang'=>$this->db->get('golruang')->result_array(),
		'organisasi'=>$this->db->get('organisasi')->result_array(),
		'satuankerja'=>$this->db->get('satuankerja')->result_array(),
		'subunitkerja'=>$this->db->get('subunitkerja')->result_array(),
		'unitkerja'=>$this->db->get('unitkerja')->result_array(),
		'id_jabatan'=>$data['id_jabatan'],
		'id_jenisjabatan'=>$data['id_jabatan'],
		'id_deputi'=>$data['id_deputi'],
		'id_statusasn'=>$data['id_statusasn'],
		'id_golruang'=>$data['id_golruang'],
		'id_organisasi'=>$data['id_organisasi'],
		'id_unitkerja'=>$data['id_unitkerja'],
		'nip'=>$data['nip'],
		'nama'=>$data['nama'],
		'nohp'=>$data['nohp'],
		'jk'=>$data['jk'],
		'foto'=>$data['foto'],
		'agama'=>$data['agama'],
		'pendidikan'=>$data['pendidikan'],
		'status_kep'=>$data['status_kep'],
		'alamat'=>$data['alamat'],
		'tgl_dinas'=>$data['tgl_dinas'],
		'status_dinas'=>$data['status_dinas']
	  );
		
	  if (isset($_POST['kirim'])) 
	  {     
			if(empty($_FILES['gambar']['name']))
			{
			  $SQLinsert=array(
			  'id_jabatan'=>$this->input->post('id_jabatan'),
			  'id_jenisjabatan'=>$this->input->post('id_jenisjabatan'),
			  'id_deputi'=>$this->input->post('id_deputi'),
			  'id_statusasn'=>$this->input->post('id_statusasn'),
			  'id_golruang'=>$this->input->post('id_golruang'),
			  'id_organisasi'=>$this->input->post('id_organisasi'),
			  'id_unitkerja'=>$this->input->post('id_unitkerja'),
			  'nip'=>$this->input->post('nip'),
			  'nama'=>$this->input->post('nama'),
			  'nohp'=>$this->input->post('nohp'),
			  'jk'=>$this->input->post('jk'),
			  //'foto'=>$this->upload->file_name,
			  'agama'=>$this->input->post('agama'),
			  'pendidikan'=>$this->input->post('pendidikan'),
			  'status_kep'=>$this->input->post('status_kep'),
			  'alamat'=>$this->input->post('alamat'),
			  'tgl_dinas'=>$this->input->post('tgl_dinas'),
			  'status_dinas'=>$this->input->post('status_dinas')
			  );

			  $this->db->update('pegawai',$SQLinsert,array('id_pegawai'=>$id));
			  $pesan='<div class="alert alert-success alert-dismissible">
							  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							  <h4><i class="icon fa fa-check"></i> Success!</h4>
							 Data Berhasil Di Edit.
							</div>';
			  $this->session->set_flashdata('pesan',$pesan);
			  redirect(base_url('admin/pegawai'));
			}
			else
			{
				$config['upload_path'] = './template/data/'; 
				$config['allowed_types'] = 'bmp|jpg|png';  
				$config['file_name'] = 'foto_'.time();  
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('gambar'))
				{
				  $SQLinsert=array(
				  'id_jabatan'=>$this->input->post('id_jabatan'),
				   'id_jenisjabatan'=>$this->input->post('id_jenisjabatan'),
				  'id_deputi'=>$this->input->post('id_deputi'),
				  'id_statusasn'=>$this->input->post('id_statusasn'),
				  'id_golruang'=>$this->input->post('id_golruang'),
				  'id_organisasi'=>$this->input->post('id_organisasi'),
				  'id_unitkerja'=>$this->input->post('id_unitkerja'),
				  'nip'=>$this->input->post('nip'),
				  'nama'=>$this->input->post('nama'),
				  'nohp'=>$this->input->post('nohp'),
				  'jk'=>$this->input->post('jk'),
				  'foto'=>$this->upload->file_name,
				  'agama'=>$this->input->post('agama'),
				  'pendidikan'=>$this->input->post('pendidikan'),
				  'status_kep'=>$this->input->post('status_kep'),
				  'alamat'=>$this->input->post('alamat'),
				  'tgl_dinas'=>$this->input->post('tgl_dinas'),
				  'status_dinas'=>$this->input->post('status_dinas')
				  );
          
          $cek=$this->db->update('pegawai',$SQLinsert,array('id_pegawai'=>$id));
          
          if($cek)
          {
					  $pesan='<div class="alert alert-success alert-dismissible">
								  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								  <h4><i class="icon fa fa-check"></i> Success!</h4>
								 Data Berhasil Di Edit.
								</div>';
					  $this->session->set_flashdata('pesan',$pesan);
					  redirect(base_url('admin/pegawai'));
          
          }
          else
          {
				   echo "QUERY SQL ERROR";
				  }
				}
				else
				{
				  echo $this->upload->display_errors();
				}
			 }
		}else{
		  tpl('admin/pegawai_form',$x);
		}
  }
   

  public function pegawai_hapus($id='')
  {
    $foto=$this->db->get_where('pegawai',array('id_pegawai'=>$id))->row_array();
    if($foto['foto'] != ""){ @unlink('template/data/'.$foto['foto']); }else{ }

    $cek=$this->db->delete('pegawai',array('id_pegawai'=>$id));
   if ($cek) {
    $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/pegawai'));
   }
  } 


//bagian absensi  

  public function cari_pegawai()
  {
  if($this->session->userdata('level') == "pegawai"){  

     $id = $this->session->userdata('id_pegawai');  
     $x['pegawai']=$this->db->get_where('pegawai',array('id_pegawai'=>$id));
     $this->load->view('admin/data_pegawai',$x);

  }elseif($this->session->userdata('level') == "admin"){

     $id=$this->input->post('cari_p');  
     $x['pegawai']=$this->db->get_where('pegawai',array('id_pegawai'=>$id));
     $this->load->view('admin/data_pegawai',$x);

  }elseif($this->session->userdata('level') == "user"){
     $id=$this->input->post('cari_p');  
     $x['pegawai']=$this->db->get_where('pegawai',array('id_pegawai'=>$id));
     $this->load->view('admin/data_pegawai',$x);
  }
}

  public function cari_tpp()
  {
  $id=$this->input->post('cari_p');  
  $x['data']=$this->m_admin->tpp_id($id);
  $this->load->view('admin/tpp',$x);
  }

  public function absensi()
  {
    $id   = ($this->session->userdata('level') == "pegawai") ? $this->session->userdata('id_pegawai') : $this->session->userdata('id_admin');
    $data = ($this->session->userdata('level') == "pegawai") ? $this->m_admin->cari_pegawai($id) : $this->m_admin->pegawai();
    $x = array('judul' =>'Absensi Pegawai',
              'data'  =>$data); 
    tpl('admin/absensi',$x);
  }


public function aksi_abs()
{
 
  $id_pegawai= $this->input->post('id_pegawai');
  $bulan     = $this->input->post('bulan');
  
  $tanggal= date('Y-m-d');
  $hadir  = $this->input->post('hadir');
  $izin   = $this->input->post('izin');
  $tidak_hadir=$this->input->post('tidak_hadir'); 
  
  $hitung=$hadir+$izin+$tidak_hadir;
if ($hitung > 31) {
   buat_alert('Data Hadir Izin Dan Tidak Hadir Yang Anda Entrikan Lebih Dari 30');
}else{
  $cek=$this->db->query("SELECT * from absen where id_pegawai='$id_pegawai'
                          AND bulan='$bulan'");
  if ($cek->num_rows() > 0) {
    buat_alert('Data Absensi Sudah Ada .. Silahkan Pilih Abasensi Dengan Bulan Yang Lain');
  }else{
    
    if($hadir >= 10 ){
      $kehadiran='30%';
    }else if($hadir >= 20){
      $kehadiran='10%';
      if($hadir > 25){
        $kehadiran='5%';
      }
    }else if($hadir < 10) {
      $kehadiran='50%';
    }else{
      $kehadiran='0%';
    }
  
    $hasil=$this->m_admin->cari_jabatan($id_pegawai)->row_array();
    $tunjangan=$hasil['tunjangan']-$kehadiran;
    $sql = array(
        'id_pegawai'=>$id_pegawai,
        'jumlah_tpp'=>$tunjangan,
        'jumlah_potongan'=>$kehadiran,
        'bulan_t'=>$bulan,
        'tahun'=>date("Y"),
        'tgl'=>date("Y-m-d"));
    $this->db->insert('tpp',$sql);
    $data = array(
                   'id_pegawai' =>$id_pegawai, 
                   'hadir'      =>$hadir,
                   'izin'       =>$izin,
                   'tidak_hadir'=>$tidak_hadir,
                   'bulan'=>$this->input->post('bulan'),
                   'tanggal'    =>date('Y-m-d'));
     $this->db->insert('absen',$data);
    buat_alert('Data Absensi Berhasil Di Tambahkan ..');
 }
}


}

//bagian gaji

public function cari_gaji_p()
{

$id=$this->input->post('cari_p');  
$x['pegawai']=$this->m_admin->cari_pegawai($id);
$this->load->view('admin/gaji_form',$x);

}

public function gaji_pegawai()
{
 $x['judul'] ="Data Gaji Pegawai";
 $x['data']  =$this->m_admin->gaji_pegawai(); 
 tpl('admin/gaji',$x);
}


public function gaji_tambah()
{
 if (isset($_POST['kirim'])) {
    $id_pegawai=$this->input->post('id_pegawai');
    $cek=$this->db->get_where('gaji',array('id_pegawai'=>$id_pegawai));
    if($cek->num_rows() > 0){
     buat_alert('Maaf Data Gaji Pada Pegawai Ini Telah Ada');
    }else{
    $Sql=array(
    'id_pegawai'=>$this->input->post('id_pegawai'),
    'jumlah'    =>$this->input->post('jumlah'));
    $this->db->insert('gaji',$Sql);
        $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Penggajian Berhasil Di Tambahkan.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/gaji_pegawai'));
  }
}else{
   $x['judul'] ="Data Gaji Pegawai";
   $x['data']  =$this->m_admin->gaji_set(); 
   tpl('admin/set_gaji',$x);
  } 
 
}


public function gaji_hapus($id='')
{
   $cek=$this->db->delete('gaji',array('id_gaji'=>$id));
   if ($cek) {
    $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/gaji_pegawai'));
   }
}

public function tpp()
{
 $x = array('judul' =>'Tunjangan Pendapatan Pegawai',
            'data'=>$this->m_admin->pegawai_data()); 
  tpl('admin/tpp_set',$x);
}

public function tpp_hapus($id)
{
   $cek=$this->db->delete('tpp',array('id_pegawai'=>$id));
   $cek=$this->db->delete('absen',array('id_pegawai'=>$id));
   if ($cek) {
    $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('admin/tpp'));

}
}

public function tpp_print($id='')
{
 $x = array('judul' =>'Print TPP Data',
             'data'=>$this->m_admin->tpp_print($id)->result_array()); 
 $this->load->view('laporan/print_tpp',$x);
}



//bagian Login Administrais User..


public function user_admin($value='')
{
  $x = array('judul' =>'Data Hak Akses',
             'data' =>$this->db->query("SELECT a.username,b.nip,a.id_admin,a.id_pegawai,a.nama,a.level,a.log from admin a LEFT JOIN pegawai b ON(a.id_pegawai=b.id_pegawai) order by a.id_admin")); 
  
  tpl('admin/user_admin',$x);
}

public function user_admin_tambah()
{
	if(isset($_POST['kirim']))
	{
		
	 $data = array(
					'username' =>$this->input->post('username'),
					'password' =>md5($this->input->post('password')),
					'id_pegawai' =>$this->input->post('id_pegawai'),
					'nama' =>$this->input->post('nama'),
					'level' =>$this->input->post('level'), );
	 
	 $cek =$this->db->insert('admin',$data);
	 
	 if($cek)
	 {
		  $pesan='<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Success!</h4>
				   Data Berhasil Di Edit.
				  </div>';
		$this->session->set_flashdata('pesan',$pesan);
		redirect(base_url('admin/user_admin'));
	 }
	 else
	 {
	  buat_alert('SYSTEM ERROR');
	 }
	 
  }
  else
  {
    $x = array('judul' =>'Data Hak Akses',
          'username' =>'',
          'nama'     =>'',
          'pegawai'=>$this->db->get('pegawai')->result_array(),
          'data' =>$this->db->get('admin')); 
          
    tpl('admin/user_admin_form',$x);
	}
}

public function user_admin_edit($id='')
{
    $sql=$this->db->get_where('admin',array('id_admin'=>$id))->row_array();  
    if(isset($_POST['kirim'])){
    $data = array(
                    'username' =>$this->input->post('username'),
                    'password' =>md5($this->input->post('password')),
                    'id_pegawai' =>$this->input->post('id_pegawai'),
                    'nama' =>$this->input->post('nama'),
                    'level' =>$this->input->post('level'),);
    
    $cek =$this->db->update('admin',$data,array('id_admin' =>$id));
    if($cek)
    {
          $pesan='<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                  Data Berhasil Di Edit.
                  </div>';
        $this->session->set_flashdata('pesan',$pesan);
        redirect(base_url('admin/user_admin'));
    }
    else
    {
      buat_alert('SYSTEM ERROR');
    }
  }
  else
  {
    $x = array('judul' =>'Edit Data Hak Akses',
              'username' =>$sql['username'],
              'password' =>$sql['password'],
              'nama'     =>$sql['nama'],
              'id_pegawai'     =>$sql['id_pegawai'],
              'pegawai'=>$this->db->get('pegawai')->result_array(),
              'data' =>$this->db->get('admin')); 
    tpl('admin/user_admin_form',$x);
  }

}
public function user_admin_hapus($id='')
{
 if($this->session->userdata('id_admin') == $id){
  $pesan='<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
              Anda Tidak Bisa Menghapus Anda Sendiri.
              </div>';
 $this->session->set_flashdata('pesan',$pesan);
 redirect(base_url('admin/user_admin'));

 }else{ 
 $this->db->delete('admin',array('id_admin' =>$id));
  $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
 $this->session->set_flashdata('pesan',$pesan);
 redirect(base_url('admin/user_admin'));
}
}

public function profil()
{
 if (isset($_POST['kirim'])) 
 {
     $data = array('password' => md5($this->input->post('password')),
                    'nama'    => $this->input->post('nama'), );
      $this->db->update('admin',$data,array('id_admin'=>$this->session->userdata('id_admin')));
      $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Edit Password Anda Adalah '.$this->input->post('password').' .
              </div>';
   $this->session->set_flashdata('pesan',$pesan);
   redirect(base_url('admin/profil'));   
  }
  else
  {
   $x = array('judul' =>'Ubah Password', 
               'data' =>$this->db->get_where('admin',array('id_admin'=>$this->session->userdata('id_admin')))->row_array(),
             );
   tpl('admin/ubah_password',$x);            
  } 

}


public function profil_pegawai($value='')
{
  if(isset($_POST['kirim']))
  {
   
    $idm=$this->session->userdata('id_admin');
	$data=$this->db->query("SELECT * from admin a LEFT JOIN pegawai d ON(d.id_pegawai=a.id_pegawai) WHERE a.id_admin='$idm'")->row_array();
   
    $vaWhere    = array('id_pegawai'=>$data['id_pegawai']);
    
	if(isset($_FILES['foto']['name']))
	{
      $config['upload_path'] = './template/data/'; 
      $config['allowed_types'] = 'bmp|jpg|png';  
      $config['file_name'] = 'foto_'.time();  
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if($this->upload->do_upload('foto'))
	  {
        $vaFoto     = array('foto'=>$this->upload->file_name);
        $this->db->update('pegawai',$vaFoto,$vaWhere);  
      }
	  else
	  {
        echo $this->upload->display_errors();
      }
    }
    
   
    $sql=array(
      //'nip'=>$this->input->post('nip'),
      //'nama'=>$this->input->post('nama'),
      'jk'=>$this->input->post('jk'),
      'agama'=>$this->input->post('agama'),
      'pendidikan'=>$this->input->post('pendidikan'),
      'alamat'=>$this->input->post('alamat'),
    );
    
    
    $cek=$this->db->update('pegawai',$sql,$vaWhere);
    if($cek){
       $pesan='<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                 Data Berhasil Di Edit.
                </div>';
      $this->session->set_flashdata('pesan',$pesan);
      redirect(base_url('admin/profil_pegawai'));
    
	}
	else
	{
      buat_alert('ERROR');
    }
  
  }
  else
  {
	
    $idm=$this->session->userdata('id_admin');
	$data=$this->db->query("SELECT * from admin a LEFT JOIN pegawai d ON(d.id_pegawai=a.id_pegawai) WHERE a.id_admin='$idm'")->row_array();
    
	$x = array
	(
       'judul' =>'.:: Edit Profil Anda ::.',
       'aksi'=>'edit',
       'foto'=>$data['foto'],
       'nama'=>$data['nama'],
       'jk'=>$data['jk'],
       'alamat'=>$data['alamat'],
       'nip'=>$data['nip'],
       'agama'=>$data['agama'],
       'pendidikan'=>$data['pendidikan'],
       'username'=>$data['username']);
       tpl('admin/profil_pegawai',$x);
  } 
}




public function keluar($value='')
{

$this->session->sess_destroy();
echo "<scrip>alert('Anda Telah Keluar Dari Halaman Administrator')</script>";;
redirect(base_url(''));
}
  
}
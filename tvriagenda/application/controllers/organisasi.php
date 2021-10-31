<?php
 if ( ! defined('BASEPATH')) exit(header('Location:../'));
class Organisasi extends CI_controller
{
  function __construct()
  {
   parent:: __construct();
   // error_reporting(0);
    if($this->session->userdata('admin') != TRUE){
      redirect(base_url(''));
      exit;
    };
    $this->load->model('m_organisasi');
  }
  
  public function index()
  {
     $x = array('judul' =>'Data Organisasi', 
                'data'=>$this->db->query("SELECT * from organisasi a, deputi b where a.id_deputi=b.id_deputi group by a.id_organisasi")->result_array());
                
     tpl('organisasi/organisasi',$x);
  }


  public function organisasi()
  {
    $x = array('judul' =>'Data Organisasi', 
                'data'=>$this->db->query("SELECT * from organisasi a, deputi b where a.id_deputi=b.id_deputi group by a.id_organisasi")->result_array());
                
    tpl('organisasi/organisasi',$x);
  }

  public function organisasi_tambah()
  {
    $x = array('judul'        => 'Tambah Data Organisasi' ,
              'aksi'        => 'tambah',
              'deputi'=>$this->db->get('deputi')->result_array(),
              'nama_organisasi'=> ""); 
			  
    if(isset($_POST['kirim']))
	  {
      $inputData=array(
        'nama_organisasi'=>$this->input->post('nama_organisasi'),
        'id_deputi'=>$this->input->post('id_deputi'));
      
	    $cek=$this->db->insert('organisasi',$inputData);
      
	    if($cek)
	    {
        $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Ditambahkan.
              </div>';
	    	$this->session->set_flashdata('pesan',$pesan);
    
	    	redirect(base_url('organisasi/organisasi'));
      }
	    else
	    {
       echo "ERROR input Data";
      }
    }
  	else
	  {
     tpl('organisasi/organisasi_form',$x);
    }
  }
    
  public function organisasi_edit($id='')
  {
    $sql=$this->db->get_where('organisasi',array('id_organisasi'=>$id))->row_array(); 
    $x = array('judul'        =>'Tambah Data Organisasi' ,
              'aksi'        =>'tambah',
              'deputi'=>$this->db->get('deputi')->result_array(),
              'id_deputi'=>$sql['id_deputi'],
			        'nama_organisasi'=>$sql['nama_organisasi']); 
    
	  if(isset($_POST['kirim']))
	  {
      $inputData=array(
       'nama_organisasi'=>$this->input->post('nama_organisasi'),
       'id_deputi'=>$this->input->post('id_deputi'));
		
	     $cek=$this->db->update('organisasi',$inputData,array('id_organisasi'=>$id));
      
	  if($cek)
	  {
        
		    $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Diedit.
              </div>';
			
			$this->session->set_flashdata('pesan',$pesan);
			redirect(base_url('organisasi/organisasi'));
      }
	    else
	    {
       echo "ERROR input Data";
      }
    }
  	else
  	{
     tpl('organisasi/organisasi_form',$x);
    }
  }

  
  public function organisasi_hapus($id='')
  {
   $cek=$this->db->delete('organisasi',array('id_organisasi'=>$id));
   if ($cek) 
   {
    $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('organisasi/organisasi'));
   }
  }

}
<?php
 if ( ! defined('BASEPATH')) exit(header('Location:../'));
class Jenisjabatan extends CI_controller
{
  function __construct()
  {
   parent:: __construct();
   // error_reporting(0);
    if($this->session->userdata('admin') != TRUE){
      redirect(base_url(''));
      exit;
    };
   $this->load->model('m_jenisjabatan');
  }
  
  public function index()
  {
     $x = array('judul' =>'Data Jenis jabatan', 
              'data'=>$this->db->get('jenisjabatan')->result_array()); 
     tpl('jenisjabatan/jenisjabatan',$x);
  }


  public function jenisjabatan()
  {
   $x = array('judul' =>'Data Jenis jabatan', 
              'data'=>$this->db->get('jenisjabatan')->result_array()); 
   tpl('jenisjabatan/jenisjabatan',$x);
  }

  public function jenisjabatan_tambah()
  {
    $x = array('judul'        => 'Tambah Data Jenis Jabatan' ,
              'aksi'        => 'tambah',
              'nama_jenisjabatan'=> ""); 
			  
    if(isset($_POST['kirim']))
	{
      $inputData=array(
        'nama_jenisjabatan'=>$this->input->post('nama_jenisjabatan'));
      
	  $cek=$this->db->insert('jenisjabatan',$inputData);
      
	  if($cek)
	  {
        $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Ditambahkan.
              </div>';
		$this->session->set_flashdata('pesan',$pesan);
    
		redirect(base_url('jenisjabatan/jenisjabatan'));
      }
	  else
	  {
       echo "ERROR input Data";
      }
    }
	else
	{
     tpl('jenisjabatan/jenisjabatan_form',$x);
    }
  }
    
  public function jenisjabatan_edit($id='')
  {
    $sql=$this->db->get_where('jenisjabatan',array('id_jenisjabatan'=>$id))->row_array(); 
    $x = array('judul'        =>'Tambah Data Golongan' ,
              'aksi'        =>'tambah',
			  'nama_jenisjabatan'=>$sql['nama_jenisjabatan']); 
    
	if(isset($_POST['kirim']))
	{
      $inputData=array(
       'nama_jenisjabatan'=>$this->input->post('nama_jenisjabatan'));
		
	  $cek=$this->db->update('jenisjabatan',$inputData,array('id_jenisjabatan'=>$id));
      
	  if($cek)
	  {
        
		$pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Diedit.
              </div>';
			
			$this->session->set_flashdata('pesan',$pesan);
			redirect(base_url('jenisjabatan/jenisjabatan'));
      }
	  else
	  {
       echo "ERROR input Data";
      }
    }
	else
	{
     tpl('jenisjabatan/jenisjabatan_form',$x);
    }
  }

  
  public function jenisjabatan_hapus($id='')
  {
   $cek=$this->db->delete('jenisjabatan',array('id_jenisjabatan'=>$id));
   if ($cek) 
   {
    $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('jenisjabatan/jenisjabatan'));
   }
  }

}
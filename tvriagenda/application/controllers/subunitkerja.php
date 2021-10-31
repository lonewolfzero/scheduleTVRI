<?php
 if ( ! defined('BASEPATH')) exit(header('Location:../'));
class Subunitkerja extends CI_controller
{
  function __construct()
  {
   parent:: __construct();
   // error_reporting(0);
    if($this->session->userdata('admin') != TRUE){
      redirect(base_url(''));
      exit;
    };
   $this->load->model('m_subunitkerja');
  }
  
  public function index()
  {
     $x = array('judul' =>'Data Sub Unit Kerja', 
              'data'=>$this->db->get('subunitkerja')->result_array()); 
     tpl('subunitkerja/subunitkerja',$x);
  }


  public function subunitkerja()
  {
   $x = array('judul' =>'Data  Sub Unit Kerja', 
              'data'=>$this->db->get('subunitkerja')->result_array()); 
   tpl('subunitkerja/subunitkerja',$x);
  }

  public function subunitkerja_tambah()
  {
    $x = array('judul'        => 'Tambah Data Sub Unit Kerja' ,
              'aksi'        => 'tambah',
              'nama_subunitkerja'=> ""); 
			  
    if(isset($_POST['kirim']))
	{
      $inputData=array(
        'nama_subunitkerja'=>$this->input->post('nama_subunitkerja'));
      
	  $cek=$this->db->insert('subunitkerja',$inputData);
      
	  if($cek)
	  {
        $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Ditambahkan.
              </div>';
		$this->session->set_flashdata('pesan',$pesan);
    
		redirect(base_url('subunitkerja/subunitkerja'));
      }
	  else
	  {
       echo "ERROR input Data";
      }
    }
	else
	{
     tpl('subunitkerja/subunitkerja_form',$x);
    }
  }
    
  public function subunitkerja_edit($id='')
  {
    $sql=$this->db->get_where('subunitkerja',array('id_subunitkerja'=>$id))->row_array(); 
    $x = array('judul'        =>'Tambah Data Sub Unit Kerja' ,
              'aksi'        =>'tambah',
			  'nama_subunitkerja'=>$sql['nama_subunitkerja']); 
    
	if(isset($_POST['kirim']))
	{
      $inputData=array(
       'nama_subunitkerja'=>$this->input->post('nama_subunitkerja'));
		
	  $cek=$this->db->update('subunitkerja',$inputData,array('id_subunitkerja'=>$id));
      
	  if($cek)
	  {
        
		$pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Diedit.
              </div>';
			
			$this->session->set_flashdata('pesan',$pesan);
			redirect(base_url('subunitkerja/subunitkerja'));
      }
	  else
	  {
       echo "ERROR input Data";
      }
    }
	else
	{
     tpl('subunitkerja/subunitkerja_form',$x);
    }
  }

  
  public function subunitkerja_hapus($id='')
  {
   $cek=$this->db->delete('subunitkerja',array('id_subunitkerja'=>$id));
   if ($cek) 
   {
    $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('subunitkerja/subunitkerja'));
   }
  }

}
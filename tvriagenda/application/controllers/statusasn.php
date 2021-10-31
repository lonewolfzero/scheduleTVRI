<?php
 if ( ! defined('BASEPATH')) exit(header('Location:../'));
class Statusasn extends CI_controller
{
  function __construct()
  {
   parent:: __construct();
   // error_reporting(0);
    if($this->session->userdata('admin') != TRUE){
      redirect(base_url(''));
      exit;
    };
   $this->load->model('m_statusasn');
  }
  
  public function index()
  {
     $x = array('judul' =>'Data Status ASN', 
              'data'=>$this->db->get('statusasn')->result_array()); 
     tpl('statusasn/statusasn',$x);
  }


  public function statusasn()
  {
   $x = array('judul' =>'Data  Status ASN', 
              'data'=>$this->db->get('statusasn')->result_array()); 
   tpl('statusasn/statusasn',$x);
  }

  public function statusasn_tambah()
  {
    $x = array('judul'        => 'Tambah Data Status ASN' ,
              'aksi'        => 'tambah',
              'nama_statusasn'=> ""); 
			  
    if(isset($_POST['kirim']))
	{
      $inputData=array(
        'nama_statusasn'=>$this->input->post('nama_statusasn'));
      
	  $cek=$this->db->insert('statusasn',$inputData);
      
	  if($cek)
	  {
        $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Ditambahkan.
              </div>';
		$this->session->set_flashdata('pesan',$pesan);
    
		redirect(base_url('statusasn/statusasn'));
      }
	  else
	  {
       echo "ERROR input Data";
      }
    }
	else
	{
     tpl('statusasn/statusasn_form',$x);
    }
  }
    
  public function statusasn_edit($id='')
  {
    $sql=$this->db->get_where('statusasn',array('id_statusasn'=>$id))->row_array(); 
    $x = array('judul'        =>'Tambah Data Satuan Kerja' ,
              'aksi'        =>'tambah',
			  'nama_statusasn'=>$sql['nama_statusasn']); 
    
	if(isset($_POST['kirim']))
	{
      $inputData=array(
       'nama_statusasn'=>$this->input->post('nama_statusasn'));
		
	  $cek=$this->db->update('statusasn',$inputData,array('id_statusasn'=>$id));
      
	  if($cek)
	  {
        
		$pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Diedit.
              </div>';
			
			$this->session->set_flashdata('pesan',$pesan);
			redirect(base_url('statusasn/statusasn'));
      }
	  else
	  {
       echo "ERROR input Data";
      }
    }
	else
	{
     tpl('statusasn/statusasn_form',$x);
    }
  }

  
  public function statusasn_hapus($id='')
  {
   $cek=$this->db->delete('statusasn',array('id_statusasn'=>$id));
   if ($cek) 
   {
    $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('statusasn/statusasn'));
   }
  }

}
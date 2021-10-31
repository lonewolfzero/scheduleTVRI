<?php
 if ( ! defined('BASEPATH')) exit(header('Location:../'));
class Satuankerja extends CI_controller
{
  function __construct()
  {
   parent:: __construct();
   // error_reporting(0);
    if($this->session->userdata('admin') != TRUE){
      redirect(base_url(''));
      exit;
    };
   $this->load->model('m_satuankerja');
  }
  
  public function index()
  {
     $x = array('judul' =>'Data Satuan Kerja', 
              'data'=>$this->db->get('satuankerja')->result_array()); 
     tpl('satuankerja/satuankerja',$x);
  }


  public function satuankerja()
  {
   $x = array('judul' =>'Data  Satuan Kerja', 
              'data'=>$this->db->get('satuankerja')->result_array()); 
   tpl('satuankerja/satuankerja',$x);
  }

  public function satuankerja_tambah()
  {
    $x = array('judul'        => 'Tambah Data Satuan Kerja' ,
              'aksi'        => 'tambah',
              'nama_satuankerja'=> ""); 
			  
    if(isset($_POST['kirim']))
	{
      $inputData=array(
        'nama_satuankerja'=>$this->input->post('nama_satuankerja'));
      
	  $cek=$this->db->insert('satuankerja',$inputData);
      
	  if($cek)
	  {
        $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Ditambahkan.
              </div>';
		$this->session->set_flashdata('pesan',$pesan);
    
		redirect(base_url('satuankerja/satuankerja'));
      }
	  else
	  {
       echo "ERROR input Data";
      }
    }
	else
	{
     tpl('satuankerja/satuankerja_form',$x);
    }
  }
    
  public function satuankerja_edit($id='')
  {
    $sql=$this->db->get_where('satuankerja',array('id_satuankerja'=>$id))->row_array(); 
    $x = array('judul'        =>'Tambah Data Satuan Kerja' ,
              'aksi'        =>'tambah',
			  'nama_satuankerja'=>$sql['nama_satuankerja']); 
    
	if(isset($_POST['kirim']))
	{
      $inputData=array(
       'nama_satuankerja'=>$this->input->post('nama_satuankerja'));
		
	  $cek=$this->db->update('satuankerja',$inputData,array('id_satuankerja'=>$id));
      
	  if($cek)
	  {
        
		$pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Diedit.
              </div>';
			
			$this->session->set_flashdata('pesan',$pesan);
			redirect(base_url('satuankerja/satuankerja'));
      }
	  else
	  {
       echo "ERROR input Data";
      }
    }
	else
	{
     tpl('satuankerja/satuankerja_form',$x);
    }
  }

  
  public function satuankerja_hapus($id='')
  {
   $cek=$this->db->delete('satuankerja',array('id_satuankerja'=>$id));
   if ($cek) 
   {
    $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('satuankerja/satuankerja'));
   }
  }

}
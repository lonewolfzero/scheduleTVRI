<?php
 if ( ! defined('BASEPATH')) exit(header('Location:../'));
class Golruang extends CI_controller
{
  function __construct()
  {
   parent:: __construct();
   // error_reporting(0);
    if($this->session->userdata('admin') != TRUE){
      redirect(base_url(''));
      exit;
    };
   $this->load->model('m_golruang');
  }
  
  public function index()
  {
     $x = array('judul' =>'Data Golongan', 
              'data'=>$this->db->get('golruang')->result_array()); 
     tpl('golruang/golruang',$x);
  }


  public function golruang()
  {
   $x = array('judul' =>'Data Golongan', 
              'data'=>$this->db->get('golruang')->result_array()); 
   tpl('golruang/golruang',$x);
  }

  public function golruang_tambah()
  {
    $x = array('judul'        => 'Tambah Data Golongan' ,
              'aksi'        => 'tambah',
              'nama_golruang'=> ""); 
			  
    if(isset($_POST['kirim']))
	{
      $inputData=array(
        'nama_golruang'=>$this->input->post('nama_golruang'));
      
	  $cek=$this->db->insert('golruang',$inputData);
      
	  if($cek)
	  {
        $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Ditambahkan.
              </div>';
		$this->session->set_flashdata('pesan',$pesan);
    
		redirect(base_url('golruang/golruang'));
      }
	  else
	  {
       echo "ERROR input Data";
      }
    }
	else
	{
     tpl('golruang/golruang_form',$x);
    }
  }
    
  public function golruang_edit($id='')
  {
    $sql=$this->db->get_where('golruang',array('id_golruang'=>$id))->row_array(); 
    $x = array('judul'        =>'Tambah Data Golongan' ,
              'aksi'        =>'tambah',
			  'nama_golruang'=>$sql['nama_golruang']); 
    
	if(isset($_POST['kirim']))
	{
      $inputData=array(
        'nama_golruang'=>$this->input->post('nama_golruang'));
		
	  $cek=$this->db->update('golruang',$inputData,array('id_golruang'=>$id));
      
	  if($cek)
	  {
        
		$pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Diedit.
              </div>';
			
			$this->session->set_flashdata('pesan',$pesan);
			redirect(base_url('golruang/golruang'));
      }
	  else
	  {
       echo "ERROR input Data";
      }
    }
	else
	{
     tpl('golruang/golruang_form',$x);
    }
  }

  
  public function golruang_hapus($id='')
  {
   $cek=$this->db->delete('golruang',array('id_golruang'=>$id));
   if ($cek) 
   {
    $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('golruang/golruang'));
   }
  }

}
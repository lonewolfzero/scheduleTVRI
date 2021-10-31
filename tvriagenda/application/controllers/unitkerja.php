<?php
 if ( ! defined('BASEPATH')) exit(header('Location:../'));
class Unitkerja extends CI_controller
{
  function __construct()
  {
   parent:: __construct();
   // error_reporting(0);
    if($this->session->userdata('admin') != TRUE){
      redirect(base_url(''));
      exit;
    };
    $this->load->model('m_unitkerja');
  }
  
  public function index()
  {
     $x = array('judul' =>'Data Unit Kerja', 
                'data'=>$this->db->query("SELECT * from unitkerja a LEFT JOIN deputi b ON(a.id_deputi=b.id_deputi) group by a.id_unitkerja")->result_array());
                
     tpl('unitkerja/unitkerja',$x);
  }


  public function unitkerja()
  {
   $x = array('judul' =>'Data Unit Kerja', 
              'data'=>$this->db->get('unitkerja')->result_array()); 
   tpl('unitkerja/unitkerja',$x);
  }

  public function unitkerja_tambah()
  {
    $x = array('judul'        => 'Tambah Data Unit Kerja' ,
              'aksi'        => 'tambah',
              'organisasi'=>$this->db->get('organisasi')->result_array(),
			  'deputi'=>$this->db->get('deputi')->result_array(),
              'nama_unitkerja'=> ""); 
			  
    if(isset($_POST['kirim']))
	  {
      $inputData=array(
        'nama_unitkerja'=>$this->input->post('nama_unitkerja'),
		'id_deputi'=>$this->input->post('id_deputi'),
        'id_organisasi'=>$this->input->post('id_organisasi'));
      
	  $cek=$this->db->insert('unitkerja',$inputData);
      
	  if($cek)
	  {
        $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Ditambahkan.
              </div>';
		    $this->session->set_flashdata('pesan',$pesan);
    
		    redirect(base_url('unitkerja/unitkerja'));
    }
	  else
	  {
       echo "ERROR input Data";
      }
    }
	else
	{
     tpl('unitkerja/unitkerja_form',$x);
    }
  }
    
  public function unitkerja_edit($id='')
  {
    $sql=$this->db->get_where('unitkerja',array('id_unitkerja'=>$id))->row_array(); 
    $x = array('judul'        =>'Tambah Data Sub Unit Kerja' ,
              'aksi'        =>'tambah',
              'organisasi'=>$this->db->get('organisasi')->result_array(),
			  'deputi'=>$this->db->get('deputi')->result_array(),
              'id_organisasi'=>$sql['id_organisasi'],
			        'nama_unitkerja'=>$sql['nama_unitkerja']); 
    
	  if(isset($_POST['kirim']))
	  {
      $inputData=array(
        'nama_unitkerja'=>$this->input->post('nama_unitkerja'),
		'id_deputi'=>$this->input->post('id_deputi'),
        'id_organisasi'=>$this->input->post('id_organisasi'));
		
	  $cek=$this->db->update('unitkerja',$inputData,array('id_unitkerja'=>$id));
      
	  if($cek)
	  {
        
	  	$pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Diedit.
              </div>';
			
			  $this->session->set_flashdata('pesan',$pesan);
			  redirect(base_url('unitkerja/unitkerja'));
     }
	   else
	   {
       echo "ERROR input Data";
      }
    }
	  else
	  {
     tpl('unitkerja/unitkerja_form',$x);
    }
  }

  
  public function unitkerja_hapus($id='')
  {
   $cek=$this->db->delete('unitkerja',array('id_unitkerja'=>$id));
   if ($cek) 
   {
    $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('unitkerja/unitkerja'));
   }
  }

}
<?php
 if ( ! defined('BASEPATH')) exit(header('Location:../'));
class Deputi extends CI_controller
{
  function __construct()
  {
   parent:: __construct();
   // error_reporting(0);
    if($this->session->userdata('admin') != TRUE){
      redirect(base_url(''));
      exit;
    };
   $this->load->model('m_deputi');
  }
  
  public function index()
  {
     $x = array('judul' =>'Data Deputi', 
              'data'=>$this->db->get('deputi')->result_array()); 
     tpl('deputi/deputi',$x);
  }


  public function deputi()
  {
   $x = array('judul' =>'Data Deputi', 
              'data'=>$this->db->get('deputi')->result_array()); 
   tpl('deputi/deputi',$x);
  }
  
  public function getDeputis(){

      // Search term
      $searchTerm = $this->input->post('searchTerm');

      // Get users
      $response = $this->m_deputi->getDeputis($searchTerm);

      echo json_encode($response);
   }

  public function deputi_tambah()
  {
    $x = array('judul'        => 'Tambah Data Deputi' ,
              'aksi'        => 'tambah',
			  'satuankerja'=>"",
              'nama_deputi'=> ""); 
			  
    if(isset($_POST['kirim']))
	{
      $inputData=array(
        'nama_deputi'=>$this->input->post('nama_deputi'),
		'satuankerja'=>$this->input->post('satuankerja'));
      
	  $cek=$this->db->insert('deputi',$inputData);
      
	  if($cek)
	  {
        $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Ditambahkan.
              </div>';
		$this->session->set_flashdata('pesan',$pesan);
    
		redirect(base_url('deputi/deputi'));
      }
	  else
	  {
       echo "ERROR input Data";
      }
    }
	else
	{
     tpl('deputi/deputi_form',$x);
    }
  }
    
  public function deputi_edit($id='')
  {
    $sql=$this->db->get_where('deputi',array('id_deputi'=>$id))->row_array(); 
    $x = array('judul'        =>'Tambah Data Deputi' ,
              'aksi'        =>'tambah',
			  'satuankerja'=>$sql['satuankerja'],
			  'nama_deputi'=>$sql['nama_deputi']); 
    
	if(isset($_POST['kirim']))
	{
      $inputData=array(
        'nama_deputi'=>$this->input->post('nama_deputi'),
		'satuankerja'=>$this->input->post('satuankerja'));
		
	  $cek=$this->db->update('deputi',$inputData,array('id_deputi'=>$id));
      
	  if($cek)
	  {
        
		$pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Diedit.
              </div>';
			
			$this->session->set_flashdata('pesan',$pesan);
			redirect(base_url('deputi/deputi'));
      }
	  else
	  {
       echo "ERROR input Data";
      }
    }
	else
	{
     tpl('deputi/deputi_form',$x);
    }
  }

  
  public function deputi_hapus($id='')
  {
   $cek=$this->db->delete('deputi',array('id_deputi'=>$id));
   if ($cek) 
   {
    $pesan='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
               Data Berhasil Di Hapus.
              </div>';
    $this->session->set_flashdata('pesan',$pesan);
    redirect(base_url('deputi/deputi'));
   }
  }

  public function excel()
  {
      $this->load->helper('exportexcel');
      $namaFile = "tbl_deputi.xls";
      $judul = "tbl_deputi_level";
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
            xlsWriteLabel($tablehead, $kolomhead++, "Nama Level");

          foreach ($this->db->get('deputi')->result() as $data) 
          {
                $kolombody = 0;

                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
                xlsWriteLabel($tablebody, $kolombody++, $data->nama_deputi);

                 $tablebody++;
                 $nourut++;
           }

          xlsEOF();
          exit();
  }

  public function word()
  {
      header("Content-type: application/vnd.ms-word");
      header("Content-Disposition: attachment;Filename=tbl_deputi.doc");

      $data = array(
          'tbl_deputi_data' => $this->db->get('deputi')->result(),
          'start' => 0
      );
      
      $this->load->view('deputi/tbl_deputi_doc',$data);
  }


}
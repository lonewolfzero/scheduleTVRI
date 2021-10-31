<?php

/**
* 
*/
class Pegawai extends CI_controller
{
	
	function __construct()
	{
	 parent:: __construct();
	 if($this->session->userdata('admin') != TRUE){
		redirect(base_url(''));
		exit;
	  };
	 
	 $this->load->model('M_admin');
	}

	public function index()
	{
	  $x = array('judul' =>'Halaman Administrator');
	  tpl('admin/home',$x);
	}

	public function getjumlah($idpegawai,$tanggal)
	{
		$querydatajum = $this->db->query("SELECT * FROM agenda WHERE id_pegawai='$idpegawai' AND tanggal='$tanggal'");
		$datacount['querydatajum']=$querydatajum->num_rows();
		echo json_encode($datacount);
	}
	
	public function getjumlah2($idpegawai,$tanggal)
	{
		$querydatajum = $this->db->query("SELECT * FROM agenda WHERE id_pegawai='$idpegawai' AND tanggal='$tanggal'");
		$datacount['querydatajum']=$querydatajum->num_rows();
		echo json_encode($datacount);
	}

	public function getOrganisasi($id){
		$data = $this->M_admin->getOrganisasi($id);
		echo json_encode($data);
	}
	/*
		get all city of state
	*/
	public function getUnitkerja($id)
	{
		$data = $this->M_admin->getUnitkerja($id);
		echo json_encode($data);
	}
	
	public function getPegawai($id)
	{
		$data = $this->M_admin->getPegawai($id);
		echo json_encode($data);
	}

	public function excel()
	{
		$this->load->helper('exportexcel');
		$namaFile = "tbl_pegawai.xls";
		$judul = "tbl_pegawai";
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
			  xlsWriteLabel($tablehead, $kolomhead++, "Nip");
			  xlsWriteLabel($tablehead, $kolomhead++, "Nama Level");
  
			foreach ($this->db->query("SELECT * from pegawai a LEFT JOIN jabatan b ON(a.id_jabatan=b.id_jabatan)  group by a.id_pegawai")->result() as $data) {
				  $kolombody = 0;
  
				  //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
				  xlsWriteNumber($tablebody, $kolombody++, $nourut);
				  xlsWriteLabel($tablebody, $kolombody++, $data->nip);
				  xlsWriteLabel($tablebody, $kolombody++, $data->nama);
  
				   $tablebody++;
				   $nourut++;
			 }
  
			xlsEOF();
			exit();
	}
  
	public function word()
	{
		header("Content-type: application/vnd.ms-word");
		header("Content-Disposition: attachment;Filename=tbl_pegawai.doc");
  
		$data = array(
			'tbl_pegawai_data' => $this->db->query("SELECT * from pegawai a LEFT JOIN jabatan b ON(a.id_jabatan=b.id_jabatan)  group by a.id_pegawai")->result(),
			'start' => 0
		);
		
		$this->load->view('admin/tbl_pegawai_doc',$data);
	}
  
}
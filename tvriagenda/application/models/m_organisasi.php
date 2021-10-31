<?php 

/**
* 
*/
class M_organisasi extends CI_model
{
	
	public function organisasi($value='')
	{
	 return $this->db->query("SELECT * from organisasi a group by a.id_organisasi");
	}


	public function cari_organisasi($id='')
	{
	 return $this->db->query("SELECT * from organisasi a where a.id_organisasi='$id' group by a.id_organisasi");
	}
	
	public function cari_namaorganisasi($nama='')
	{
	 return $this->db->query("SELECT * from organisasi a where a.nama_organisasi LIKE '$nama%' group by a.id_organisasi");
	}

}
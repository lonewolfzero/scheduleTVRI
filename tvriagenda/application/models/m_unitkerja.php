<?php 

/**
* 
*/
class M_unitkerja extends CI_model
{
	
	public function unitkerja($value='')
	{
	 return $this->db->query("SELECT * from unitkerja a group by a.id_unitkerja");
	}


	public function cari_unitkerja($id='')
	{
	 return $this->db->query("SELECT * from unitkerja a where a.id_unitkerja='$id' group by a.id_unitkerja");
	}
	
	public function cari_namaunitkerja($nama='')
	{
	 return $this->db->query("SELECT * from unitkerja a where a.nama_unitkerja LIKE '$nama%' group by a.id_unitkerja");
	}

}
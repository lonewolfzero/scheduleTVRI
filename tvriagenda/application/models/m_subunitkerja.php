<?php 

/**
* 
*/
class M_subunitkerja extends CI_model
{
	
	public function subunitkerja($value='')
	{
	 return $this->db->query("SELECT * from subunitkerja a group by a.id_subunitkerja");
	}


	public function cari_subunitkerja($id='')
	{
	 return $this->db->query("SELECT * from subunitkerja a where a.id_subunitkerja='$id' group by a.id_subunitkerja");
	}
	
	public function cari_namasubunitkerja($nama='')
	{
	 return $this->db->query("SELECT * from subunitkerja a where a.nama_subunitkerja LIKE '$nama%' group by a.id_subunitkerja");
	}

}
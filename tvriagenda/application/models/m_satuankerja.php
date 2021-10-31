<?php 

/**
* 
*/
class M_satuankerja extends CI_model
{
	
	public function satuankerja($value='')
	{
	 return $this->db->query("SELECT * from satuankerja a group by a.id_satuankerja");
	}


	public function cari_satuankerja($id='')
	{
	 return $this->db->query("SELECT * from satuankerja a where a.id_satuankerja='$id' group by a.id_satuankerja");
	}
	
	public function cari_namasatuankerja($nama='')
	{
	 return $this->db->query("SELECT * from satuankerja a where a.satuankerja LIKE '$nama%' group by a.id_satuankerja");
	}

}
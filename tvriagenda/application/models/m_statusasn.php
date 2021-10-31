<?php 

/**
* 
*/
class M_statusasn extends CI_model
{
	
	public function statusasn($value='')
	{
	 return $this->db->query("SELECT * from statusasn a group by a.id_statusasn");
	}


	public function cari_statusasn($id='')
	{
	 return $this->db->query("SELECT * from statusasn a where a.id_statusasn='$id' group by a.id_statusasn");
	}
	
	public function cari_namastatusasn($nama='')
	{
	 return $this->db->query("SELECT * from statusasn a where a.nama_statusasn LIKE '$nama%' group by a.id_statusasn");
	}

}
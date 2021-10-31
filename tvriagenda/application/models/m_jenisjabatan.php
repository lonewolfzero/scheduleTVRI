<?php 

/**
* 
*/
class M_jenisjabatan extends CI_model
{
	
	public function jenisjabatan($value='')
	{
	 return $this->db->query("SELECT * from jenisjabatan a group by a.id_jenisjabatan");
	}


	public function cari_jenisjabatan($id='')
	{
	 return $this->db->query("SELECT * from jenisjabatan a where a.id_jenisjabatan='$id' group by a.id_jenisjabatan");
	}
	
	public function cari_namajenisjabatan($nama='')
	{
	 return $this->db->query("SELECT * from jenisjabatan a where a.nama_jenisjabatan LIKE '$nama%' group by a.id_jenisjabatan");
	}

}
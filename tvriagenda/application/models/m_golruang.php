<?php 

/**
* 
*/
class M_golruang extends CI_model
{
	
	public function golruang($value='')
	{
	 return $this->db->query("SELECT * from golruang a group by a.id_golruang");
	}


	public function cari_golruang($id='')
	{
	 return $this->db->query("SELECT * from golruang a where a.id_golruang='$id' group by a.id_golruang");
	}
	
	public function cari_namagolruang($nama='')
	{
	 return $this->db->query("SELECT * from golruang a where a.nama_golruang LIKE '$nama%' group by a.id_golruang");
	}

}
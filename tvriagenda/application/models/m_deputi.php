<?php 

/**
* 
*/
class M_deputi extends CI_model
{
	function get_all()
   {
      $this->db->order_by($this->id, $this->order);
      return $this->db->get($this->table)->result();
   }

	public function deputi($value='')
	{
	 return $this->db->query("SELECT * from deputi a group by a.id_deputi");
	}


	public function cari_deputi($id='')
	{
	 return $this->db->query("SELECT * from deputi a where a.id_deputi='$id' group by a.id_deputi");
	}
	
	public function cari_deputinama($nama='')
	{
	 return $this->db->query("SELECT * from deputi a where a.nama_deputi LIKE '$nama%' group by a.id_deputi");
	}
	
	
   function getDeputis($searchTerm="")
   {

     $this->db->select('*');
     $this->db->where("nama_deputi like '%".$searchTerm."%' ");
     $fetched_records = $this->db->get('deputi');
     $users = $fetched_records->result_array();

     // Initialize Array with fetched data
     $data = array();
     foreach($users as $user){
        $data[] = array("id"=>$user['id_deputi'], "text"=>$user['nama_deputi']);
     }
     return $data;
  }



}
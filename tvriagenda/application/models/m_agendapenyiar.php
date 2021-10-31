<?php 

/**
* 
*/
class M_agendapenyiar extends CI_model
{
	public function cari_agenda_pegawai($id='')
	{
		return $this->db->query("SELECT * from agenda d where d.id_pegawai='$id' order by tanggal desc");
		//return $this->db->query("SELECT * from agenda d, pegawai a, jabatan b  where d.id_pegawai=a.id_pegawai AND a.id_jabatan=b.id_jabatan group AND a.id_pegawai='$id' by d.id_pegawai");
	}
	
	public function agenda_pegawai()
	{
	 return $this->db->query("SELECT * from agenda d LEFT JOIN pegawai a ON(d.id_pegawai=a.id_pegawai) order by d.id_agenda desc");
	}


}
<?php

/**
* 
*/
class M_laporanagenda extends CI_controller
{
    public function pegawai()
 	{
 	 return $this->db->query("SELECT * from pegawai a,jabatan b where a.id_jabatan=b.id_jabatan");
 	}	
	
	public function agenda_pegawai()
	{
		return $this->db->query("SELECT * from agenda d, pegawai a, jabatan b  where d.id_pegawai=a.id_pegawai AND a.id_jabatan=b.id_jabatan group by d.id_pegawai");
	}

	public function absensi($dari='',$sampai='')
 	{
 	 return $this->db->query("SELECT * from absen a, pegawai b where a.id_pegawai=b.id_pegawai AND a.tanggal between '$dari' AND '$sampai' group by a.id_pegawai");
 	}	
	
	public function agenda($dari='',$sampai='')
 	{
	  return $this->db->query("SELECT * from agenda a LEFT JOIN pegawai b ON(a.id_pegawai=b.id_pegawai) WHERE a.tanggal between '$dari' AND '$sampai' group by a.id_agenda desc");
 	}
	
	public function agenda2($dari='',$sampai='',$id_pegawai='')
 	{
	  return $this->db->query("SELECT * from agenda a LEFT JOIN pegawai b ON(a.id_pegawai=b.id_pegawai) WHERE a.id_pegawai='$id_pegawai' AND a.tanggal between '$dari' AND '$sampai' group by a.id_agenda desc");
 	}
	
	public function agenda3($dari='',$sampai='',$id_pegawai='')
 	{
	  return $this->db->query("SELECT * from agenda a INNER JOIN agendapegawai b ON(a.id_pegawai=b.id_pegawai) WHERE a.id_pegawai='$id_pegawai' AND a.tanggal between '$dari' AND '$sampai' group by a.id_agenda desc");
 	}
	
	
	public function tpp($dari='',$sampai='')
    {
	 return $this->db->query("SELECT * from pegawai a,jabatan b ,tpp c where a.id_jabatan=a.id_jabatan AND c.tgl between '$dari' AND '$sampai' 
  	 group by c.id_pegawai");
    }   

}
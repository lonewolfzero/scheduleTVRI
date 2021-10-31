<?php 

/**
* 
*/
class M_admin extends CI_model
{

public function getOrganisasi($id = null)
{
		
	return $this->db->select('s.*')
					 ->from('organisasi s')
					 ->join('deputi c','c.id_deputi = s.id_deputi', 'left')
					 ->where('s.id_deputi',$id)
					 ->get()
					 ->result();
}

public function getUnitkerja($id = null)
{

	
	return $this->db->select('c.*')
					 ->from('unitkerja c')
					 ->join('deputi s','s.id_deputi = c.id_deputi', 'left')
					 ->where('c.id_deputi',$id)
					 ->get()
					 ->result();
}


public function getPegawai($value = null)
{

	return $this->db->select('c.*')
					 ->from('pegawai c')
					 ->join('jabatan s','s.id_jabatan = c.id_jabatan', 'left')
					 ->where('c.id_pegawai NOT IN(\''.$value.'\')')
					 ->get()
					 ->result();
}
	
	
public function pegawai($value='')
{
  return $this->db->query("SELECT * from pegawai a LEFT JOIN jabatan b ON(a.id_jabatan=b.id_jabatan)  group by a.id_pegawai");
}

public function count_data($table){
  return $this->db->query("SELECT COUNT(*) AS jml_data FROM $table");
}

public function cek_absen($id_pegawai='',$tanggal='')
{
 return $this->db->query("SELECT * from absen where id_pegawai='$id_pegawai' AND tanggal='$tanggal'");
}

public function gaji_pegawai()
{
 return $this->db->query("SELECT * from pegawai a, jabatan b ,gaji d where a.id_jabatan=b.id_jabatan AND d.id_pegawai=a.id_pegawai group by d.id_pegawai");
}

public function cari_pegawai($cari)
{
 return $this->db->query("SELECT * from pegawai a ,jabatan b where a.id_jabatan=b.id_jabatan AND a.id_pegawai='$cari'");
}

public function cari_agenda_pegawai2($cari)
{
	return $this->db->query("SELECT * from agenda d LEFT JOIN pegawai a ON(d.id_pegawai=a.id_pegawai), jabatan b where a.id_jabatan=b.id_jabatan AND a.id_pegawai='$cari' ");
}

public function pegawai_data()
{
 return $this->db->query("SELECT * from pegawai a ,jabatan b  where a.id_jabatan=b.id_jabatan group by a.id_pegawai");
}

public function agenda_pegawai()
{
 return $this->db->query("SELECT * from agenda d LEFT JOIN pegawai a ON(d.id_pegawai=a.id_pegawai) order by d.id_agenda desc");
}

public function kegiatan_pegawai($id_agenda)
{
 return $this->db->query("SELECT * from kegiatan d LEFT JOIN pegawai a ON(d.id_pegawai=a.id_pegawai) WHERE id_agenda='$id_agenda'");
}

public function disposisikegiatan_pegawai($id_agenda)
{
 return $this->db->query("SELECT * from kegiatan d LEFT JOIN pegawai a ON(d.id_pegawai=a.id_pegawai) WHERE id_agenda='$id_agenda' and d.status_kegiatan='3'");
}

public function agenda_pegawai_pending()
{
 return $this->db->query("SELECT * from agenda d LEFT JOIN pegawai a ON(d.id_pegawai=a.id_pegawai) WHERE status_agenda='0' order by d.id_agenda desc");
}

public function agenda_pegawai_disposisi()
{
 return $this->db->query("SELECT * from agenda d LEFT JOIN kegiatan a ON(d.id_agenda=a.id_agenda) WHERE a.status_kegiatan='3' order by d.id_agenda desc");
}

public function agenda_pegawai_approved()
{
 return $this->db->query("SELECT * from agenda d LEFT JOIN pegawai a ON(d.id_pegawai=a.id_pegawai) WHERE status_agenda='1' order by d.id_agenda desc");
}

public function agenda_pegawai_reject()
{
 return $this->db->query("SELECT * from agenda d LEFT JOIN pegawai a ON(d.id_pegawai=a.id_pegawai) WHERE status_agenda='2' order by d.id_agenda desc");
}



public function tpp_id($id='')
{
  return $this->db->query("SELECT * from pegawai a,jabatan b ,tpp c , absen d where c.id_pegawai='$id' AND a.id_jabatan=b.id_jabatan 
    AND d.id_pegawai=a.id_pegawai
    AND c.id_pegawai=a.id_pegawai
    group by c.id_tpp");
}

public function tpp()
{
  return $this->db->query("SELECT * from pegawai a,jabatan b ,tpp c , absen d where a.id_jabatan=b.id_jabatan 
    AND d.id_pegawai=a.id_pegawai
  	AND c.id_pegawai=a.id_pegawai
  	group by c.id_tpp");
}


public function tpp_print($id)
{
  return $this->db->query("SELECT * from pegawai a,jabatan b ,tpp c , absen d where a.id_jabatan=b.id_jabatan 
    AND d.id_pegawai=a.id_pegawai
  	AND c.id_pegawai=a.id_pegawai
  	AND c.id_tpp='$id'
  	group by c.id_pegawai");
}


public function cari_gaji($id='')
{
return $this->db->query("SELECT * from pegawai a, jabatan b  where a.id_jabatan=b.id_jabatan AND a.id_pegawai='$id' group by a.id_pegawai");
}

public function cari_agenda_pegawai($id='')
{
	return $this->db->query("SELECT * from agenda d where d.id_pegawai='$id' order by tanggal desc");
    //return $this->db->query("SELECT * from agenda d, pegawai a, jabatan b  where d.id_pegawai=a.id_pegawai AND a.id_jabatan=b.id_jabatan group AND a.id_pegawai='$id' by d.id_pegawai");
}

public function cari_agenda_pegawaim2($id='')
{
	return $this->db->query("SELECT d.id_agenda from agendapegawai d LEFT JOIN agenda a ON(d.id_pegawai=a.id_pegawai) where d.id_pegawai='$id' order by tanggal desc");
    //return $this->db->query("SELECT * from agenda d, pegawai a, jabatan b  where d.id_pegawai=a.id_pegawai AND a.id_jabatan=b.id_jabatan group AND a.id_pegawai='$id' by d.id_pegawai");
}

public function cari_jabatan($id='')
{
 return $this->db->query("SELECT * from pegawai a, jabatan b where a.id_pegawai='$id' AND a.id_jabatan=b.id_jabatan group by a.id_pegawai");
}

}
<?php 

/**
* 
*/
class M_agendamastercontrol extends CI_model
{
	public function cari_agenda_pegawai($id='')
	{
		return $this->db->query("SELECT * from agendamastercontrol d where d.id_pegawai='$id' order by tanggal desc");
		//return $this->db->query("SELECT * from agenda d, pegawai a, jabatan b  where d.id_pegawai=a.id_pegawai AND a.id_jabatan=b.id_jabatan group AND a.id_pegawai='$id' by d.id_pegawai");
	}
	
	public function agenda_pegawai()
	{
	 return $this->db->query("SELECT * from agendamastercontrol d LEFT JOIN pegawai a ON(d.id_pegawai=a.id_pegawai) order by d.id_agenda desc");
	}

 
	public function cari_agenda_pegawaim2($id='')
	{
		return $this->db->query("SELECT d.id_agenda from agendapegawai d LEFT JOIN agendamastercontrol a ON(d.id_pegawai=a.id_pegawai) where d.id_pegawai='$id' AND d.id_type=2 order by tanggal desc");
		//return $this->db->query("SELECT * from agenda d, pegawai a, jabatan b  where d.id_pegawai=a.id_pegawai AND a.id_jabatan=b.id_jabatan group AND a.id_pegawai='$id' by d.id_pegawai");
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
	 return $this->db->query("SELECT * from agendamastercontrol d LEFT JOIN pegawai a ON(d.id_pegawai=a.id_pegawai) WHERE status_agenda='0' order by d.id_agenda desc");
	}

	public function agenda_pegawai_disposisi()
	{
	 return $this->db->query("SELECT * from agendamastercontrol d LEFT JOIN kegiatan a ON(d.id_agenda=a.id_agenda) WHERE a.status_kegiatan='3' order by d.id_agenda desc");
	}

	public function agenda_pegawai_approved()
	{
	 return $this->db->query("SELECT * from agendamastercontrol d LEFT JOIN pegawai a ON(d.id_pegawai=a.id_pegawai) WHERE status_agenda='1' order by d.id_agenda desc");
	}

	public function agenda_pegawai_reject()
	{
	 return $this->db->query("SELECT * from agendamastercontrol d LEFT JOIN pegawai a ON(d.id_pegawai=a.id_pegawai) WHERE status_agenda='2' order by d.id_agenda desc");
	}

}
<?php

/**
* 
*/
class M_laporan extends CI_controller
{
    public function pegawai()
 	{
 	 return $this->db->query("SELECT * from pegawai a,jabatan b where a.id_jabatan=b.id_jabatan");
 	}	
	
	public function deputi()
 	{
 	 return $this->db->query("SELECT * from deputi");
 	}	
	
	public function unitkerja()
 	{
 	 return $this->db->query("SELECT * from unitkerja a LEFT JOIN deputi b ON(a.id_deputi=b.id_deputi)");
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
	  return $this->db->query("SELECT * from agenda a LEFT JOIN pegawai b ON(a.id_pegawai=b.id_pegawai) WHERE a.tanggal between '$dari' AND '$sampai' group by a.id_agenda order by a.id_agenda desc");
 	}
	
	public function agendaaudio($dari='',$sampai='')
 	{
	  return $this->db->query("SELECT * from agendaaudio a LEFT JOIN pegawai b ON(a.id_pegawai=b.id_pegawai) WHERE a.tanggal between '$dari' AND '$sampai' group by a.id_agenda order by a.id_agenda desc");
 	}
	
	public function agendaswitcher($dari='',$sampai='')
 	{
	  return $this->db->query("SELECT * from agendaswitcher a LEFT JOIN pegawai b ON(a.id_pegawai=b.id_pegawai) WHERE a.tanggal between '$dari' AND '$sampai' group by a.id_agenda order by a.id_agenda desc");
 	}
	
	
	
	
	public function agendaPegawai($dari='',$sampai='')
 	{
		return $this->db->query("SELECT distinct nip,nama,nohp,d.nama_golruang,c.nama_jabatan,e.nama_unitkerja from pegawai a, agenda b ,jabatan c, golruang d,unitkerja e WHERE a.id_jabatan=c.id_jabatan 
		AND d.id_golruang=a.id_golruang
		AND e.id_unitkerja=a.id_unitkerja
		AND a.id_pegawai=b.id_pegawai
		AND b.tanggal between '$dari' AND '$sampai' group by b.id_agenda order by b.id_agenda desc");
	
	}
	
	public function agendaaudioPegawai($dari='',$sampai='')
 	{
		return $this->db->query("SELECT distinct nip,nama,nohp,d.nama_golruang,c.nama_jabatan,e.nama_unitkerja from pegawai a, agendaaudio b ,jabatan c, golruang d,unitkerja e WHERE a.id_jabatan=c.id_jabatan 
		AND d.id_golruang=a.id_golruang
		AND e.id_unitkerja=a.id_unitkerja
		AND a.id_pegawai=b.id_pegawai
		AND b.tanggal between '$dari' AND '$sampai' group by b.id_agenda order by b.id_agenda desc");
	
	}
	
	
	public function agendaswitcherPegawai($dari='',$sampai='')
 	{
		return $this->db->query("SELECT distinct nip,nama,nohp,d.nama_golruang,c.nama_jabatan,e.nama_unitkerja from pegawai a, agendaswitcher b ,jabatan c, golruang d,unitkerja e WHERE a.id_jabatan=c.id_jabatan 
		AND d.id_golruang=a.id_golruang
		AND e.id_unitkerja=a.id_unitkerja
		AND a.id_pegawai=b.id_pegawai
		AND b.tanggal between '$dari' AND '$sampai' group by b.id_agenda order by b.id_agenda desc");
	
	}
	
	public function agendachargenPegawai($dari='',$sampai='')
 	{
		return $this->db->query("SELECT distinct nip,nama,nohp,d.nama_golruang,c.nama_jabatan,e.nama_unitkerja from pegawai a, agendachargen b ,jabatan c, golruang d,unitkerja e WHERE a.id_jabatan=c.id_jabatan 
		AND d.id_golruang=a.id_golruang
		AND e.id_unitkerja=a.id_unitkerja
		AND a.id_pegawai=b.id_pegawai
		AND b.tanggal between '$dari' AND '$sampai' group by b.id_agenda order by b.id_agenda desc");
	
	}
	
	
	 
	public function agendaeditorPegawai($dari='',$sampai='')
 	{
		return $this->db->query("SELECT distinct nip,nama,nohp,d.nama_golruang,c.nama_jabatan,e.nama_unitkerja from pegawai a, agendaeditor b ,jabatan c, golruang d,unitkerja e WHERE a.id_jabatan=c.id_jabatan 
		AND d.id_golruang=a.id_golruang
		AND e.id_unitkerja=a.id_unitkerja
		AND a.id_pegawai=b.id_pegawai
		AND b.tanggal between '$dari' AND '$sampai' group by b.id_agenda order by b.id_agenda desc");
	
	}
	
	
	public function  agendaitPegawai($dari='',$sampai='')
 	{
		return $this->db->query("SELECT distinct nip,nama,nohp,d.nama_golruang,c.nama_jabatan,e.nama_unitkerja from pegawai a, agendait b ,jabatan c, golruang d,unitkerja e WHERE a.id_jabatan=c.id_jabatan 
		AND d.id_golruang=a.id_golruang
		AND e.id_unitkerja=a.id_unitkerja
		AND a.id_pegawai=b.id_pegawai
		AND b.tanggal between '$dari' AND '$sampai' group by b.id_agenda order by b.id_agenda desc");
	
	}
	
	
	public function agendakepustakaanPegawai($dari='',$sampai='')
 	{
		return $this->db->query("SELECT distinct nip,nama,nohp,d.nama_golruang,c.nama_jabatan,e.nama_unitkerja from pegawai a, agendakepustakaan b ,jabatan c, golruang d,unitkerja e WHERE a.id_jabatan=c.id_jabatan 
		AND d.id_golruang=a.id_golruang
		AND e.id_unitkerja=a.id_unitkerja
		AND a.id_pegawai=b.id_pegawai
		AND b.tanggal between '$dari' AND '$sampai' group by b.id_agenda order by b.id_agenda desc");
	
	}
	
	
	
	public function agendalightningPegawai($dari='',$sampai='')
 	{
		return $this->db->query("SELECT distinct nip,nama,nohp,d.nama_golruang,c.nama_jabatan,e.nama_unitkerja from pegawai a, agendalightning b ,jabatan c, golruang d,unitkerja e WHERE a.id_jabatan=c.id_jabatan 
		AND d.id_golruang=a.id_golruang
		AND e.id_unitkerja=a.id_unitkerja
		AND a.id_pegawai=b.id_pegawai
		AND b.tanggal between '$dari' AND '$sampai' group by b.id_agenda order by b.id_agenda desc");
	
	}
	
		
	public function agendamaintenancePegawai($dari='',$sampai='')
 	{
		return $this->db->query("SELECT distinct nip,nama,nohp,d.nama_golruang,c.nama_jabatan,e.nama_unitkerja from pegawai a, agendamaintenance b ,jabatan c, golruang d,unitkerja e WHERE a.id_jabatan=c.id_jabatan 
		AND d.id_golruang=a.id_golruang
		AND e.id_unitkerja=a.id_unitkerja
		AND a.id_pegawai=b.id_pegawai
		AND b.tanggal between '$dari' AND '$sampai' group by b.id_agenda order by b.id_agenda desc");
	
	}
	
	
	public function agendamastercontrolPegawai($dari='',$sampai='')
 	{
		return $this->db->query("SELECT distinct nip,nama,nohp,d.nama_golruang,c.nama_jabatan,e.nama_unitkerja from pegawai a, agendamastercontrol b ,jabatan c, golruang d,unitkerja e WHERE a.id_jabatan=c.id_jabatan 
		AND d.id_golruang=a.id_golruang
		AND e.id_unitkerja=a.id_unitkerja
		AND a.id_pegawai=b.id_pegawai
		AND b.tanggal between '$dari' AND '$sampai' group by b.id_agenda order by b.id_agenda desc");
	
	}
	
	
	public function agendaoperasionalPegawai($dari='',$sampai='')
 	{
		return $this->db->query("SELECT distinct nip,nama,nohp,d.nama_golruang,c.nama_jabatan,e.nama_unitkerja from pegawai a, agendaoperasional b ,jabatan c, golruang d,unitkerja e WHERE a.id_jabatan=c.id_jabatan 
		AND d.id_golruang=a.id_golruang
		AND e.id_unitkerja=a.id_unitkerja
		AND a.id_pegawai=b.id_pegawai
		AND b.tanggal between '$dari' AND '$sampai' group by b.id_agenda order by b.id_agenda desc");
	
	}
	
	
	public function agendapdumumPegawai($dari='',$sampai='')
 	{
		return $this->db->query("SELECT distinct nip,nama,nohp,d.nama_golruang,c.nama_jabatan,e.nama_unitkerja from pegawai a, agendapdumum b ,jabatan c, golruang d,unitkerja e WHERE a.id_jabatan=c.id_jabatan 
		AND d.id_golruang=a.id_golruang
		AND e.id_unitkerja=a.id_unitkerja
		AND a.id_pegawai=b.id_pegawai
		AND b.tanggal between '$dari' AND '$sampai' group by b.id_agenda order by b.id_agenda desc");
	
	}
	
	
	public function agendapenatariasPegawai($dari='',$sampai='')
 	{
		return $this->db->query("SELECT distinct nip,nama,nohp,d.nama_golruang,c.nama_jabatan,e.nama_unitkerja from pegawai a, agendapenatarias b ,jabatan c, golruang d,unitkerja e WHERE a.id_jabatan=c.id_jabatan 
		AND d.id_golruang=a.id_golruang
		AND e.id_unitkerja=a.id_unitkerja
		AND a.id_pegawai=b.id_pegawai
		AND b.tanggal between '$dari' AND '$sampai' group by b.id_agenda order by b.id_agenda desc");
	
	}
	
	
	public function agendaredakturPegawai($dari='',$sampai='')
 	{
		return $this->db->query("SELECT distinct nip,nama,nohp,d.nama_golruang,c.nama_jabatan,e.nama_unitkerja from pegawai a, agendaredaktur b ,jabatan c, golruang d,unitkerja e WHERE a.id_jabatan=c.id_jabatan 
		AND d.id_golruang=a.id_golruang
		AND e.id_unitkerja=a.id_unitkerja
		AND a.id_pegawai=b.id_pegawai
		AND b.tanggal between '$dari' AND '$sampai' group by b.id_agenda order by b.id_agenda desc");
	
	}
	
	
	public function agendatdPegawai($dari='',$sampai='')
 	{
		return $this->db->query("SELECT distinct nip,nama,nohp,d.nama_golruang,c.nama_jabatan,e.nama_unitkerja from pegawai a, agendatd b ,jabatan c, golruang d,unitkerja e WHERE a.id_jabatan=c.id_jabatan 
		AND d.id_golruang=a.id_golruang
		AND e.id_unitkerja=a.id_unitkerja
		AND a.id_pegawai=b.id_pegawai
		AND b.tanggal between '$dari' AND '$sampai' group by b.id_agenda order by b.id_agenda desc");
	
	}
	
	public function agendavtrPegawai($dari='',$sampai='')
 	{
		return $this->db->query("SELECT distinct nip,nama,nohp,d.nama_golruang,c.nama_jabatan,e.nama_unitkerja from pegawai a, agendavtr b ,jabatan c, golruang d,unitkerja e WHERE a.id_jabatan=c.id_jabatan 
		AND d.id_golruang=a.id_golruang
		AND e.id_unitkerja=a.id_unitkerja
		AND a.id_pegawai=b.id_pegawai
		AND b.tanggal between '$dari' AND '$sampai' group by b.id_agenda order by b.id_agenda desc");
	
	}
	

	
	
	public function agenda2($dari='',$sampai='',$id_pegawai='')
 	{
	  return $this->db->query("SELECT * from agenda a LEFT JOIN pegawai b ON(a.id_pegawai=b.id_pegawai) WHERE a.id_pegawai='$id_pegawai' AND a.tanggal between '$dari' AND '$sampai' group by a.id_agenda  order by id_agenda desc");
 	}
	
	public function agenda3($dari='',$sampai='',$id_pegawai='')
 	{
	  return $this->db->query("SELECT * from agenda a INNER JOIN agendapegawai b ON(a.id_pegawai=b.id_pegawai) WHERE a.id_pegawai='$id_pegawai' AND a.tanggal between '$dari' AND '$sampai' order by tanggal desc");
 	}
	
	
	public function tpp($dari='',$sampai='')
    {
	 return $this->db->query("SELECT * from pegawai a,jabatan b ,tpp c where a.id_jabatan=a.id_jabatan AND c.tgl between '$dari' AND '$sampai' 
  	 group by c.id_pegawai");
    }   

}
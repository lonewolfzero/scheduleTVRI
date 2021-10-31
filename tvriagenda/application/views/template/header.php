<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $judul ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('template/admin') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('template/admin') ?>/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('template/admin') ?>/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
   
   <link rel="stylesheet" href="<?= base_url() ?>/plugins/fullcalendar/fullcalendar.min.css">
   <link rel="stylesheet" href="<?= base_url() ?>/plugins/fullcalendar/fullcalendar.print.css" media="print">
   <!-- Select2 CSS -->
   <link href="<?= base_url() ?>assets2/css/select2.css" rel="stylesheet" />

   <!-- jQuery library -->
   <script src="<?= base_url() ?>assets/jquery-3.3.1.min.js"></script>
   
   <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/select2.min.css">
   <!-- Select2 JS -->
   <script src="<?= base_url() ?>assets2/js/select2.js"></script>
   
    <link rel="stylesheet" href="<?= base_url() ?>/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('template/admin') ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  
  <script src="<?= base_url('template/admin') ?>/bower_components/jquery/jquery-1.11.2.min.js"></script>



 <script src="<?= base_url() ?>assetcaro/tinymce/jquery.tinymce.min.js"></script>
 <script src="<?= base_url() ?>assetcaro/tinymce/tinymce.min.js"></script>
 <script>tinymce.init({selector:'textarea',
						plugins: "lists, advlist",
						toolbar: "numlist bullist"});</script>
						

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
 
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <script>
	 $(".select2").select2();
  </script>
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
//error_reporting(0);
if($this->session->userdata('level') =="admin"){
 $id  = $this->session->userdata('id_admin');
 $data= $this->db->get_where('admin',array('id_admin'=>$id))->row_array();
}
elseif($this->session->userdata('level') == "pegawai")
{
 //$id  = $this->session->userdata('id_pegawai');
 //$data= $this->db->get_where('pegawai',array('id_pegawai'=>$id))->row_array();
  $id  = $this->session->userdata('id_admin');
 $data= $this->db->get_where('admin',array('id_admin'=>$id))->row_array();
}
elseif($this->session->userdata('level') =="user")
{
 $id  = $this->session->userdata('id_admin');
 $data= $this->db->get_where('admin',array('id_admin'=>$id))->row_array();
}
elseif($this->session->userdata('level') =="sespri")
{
 $id  = $this->session->userdata('id_admin');
 $data= $this->db->get_where('admin',array('id_admin'=>$id))->row_array();
}
?>

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>AGENDA</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Agenda Kegiatan</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
           
              <span class="hidden-xs"><?= $data['nama'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                 
                <p>
                  <?= $data['username'] ?> - <?= $data['nama'] ?>
                  <small><?= isset($data['log']) ? $data['log'] : ""; ?></small>
                </p>
              </li>
 
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= base_url('admin/profil') ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url('admin/keluar') ?>" onclick="return(confirm('Anda Akan Keluar Dari Halaman Administrator'))" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button >
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li-->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
   <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <br /><br />
        </div>
        <div class="pull-left info">
          <p><?= ucfirst($data['nama']) ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        
		<li class="active">
          <a href="<?= base_url('admin/') ?>">
            <i class="fa fa-th"></i> <span>Dasboard</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">Home</small>
            </span>
          </a>
        </li>

		<?php if($this->session->userdata('level') == "admin"){ ?>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Data Pegawai</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="<?= base_url('admin/pegawai') ?>" class="active"><i class="fa fa-circle-o"></i>Pegawai</a></li>
			<li><a href="<?= base_url('deputi/deputi') ?>"><i class="fa fa-circle-o"></i>Data Satuan Kerja</a></li>
			<!--li><a href="<?= base_url('organisasi/organisasi') ?>"><i class="fa fa-circle-o"></i>Data Organisasi</a></li-->
			<li><a href="<?= base_url('unitkerja/unitkerja') ?>"><i class="fa fa-circle-o"></i>Data Unit Kerja</a></li>
			<li><a href="<?= base_url('admin/jabatan') ?>"><i class="fa fa-circle-o"></i>Jabatan</a></li>
			<!--li><a href="<?= base_url('jenisjabatan/jenisjabatan') ?>"><i class="fa fa-circle-o"></i>Data Jenis Jabatan</a></li-->
			<li><a href="<?= base_url('golruang/golruang') ?>"><i class="fa fa-circle-o"></i>Data Golongan</a></li>
			<li><a href="<?= base_url('statusasn/statusasn') ?>"><i class="fa fa-circle-o"></i>Data Status ASN</a></li>
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Agenda Kegiatan Penyiar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="<?= base_url('agenda/agendacalendar'); ?>"><i class="fa fa-circle-o"></i> Agenda Calendar Penyiar</a></li>
				<li><a href="<?= base_url('agenda/index'); ?>"><i class="fa fa-circle-o"></i> Agenda Kegiatan Penyiar</a></li>
          </ul>
        </li>   
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Agenda Kegiatan Redaktur</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="<?= base_url('agendaredaktur/agendacalendar'); ?>"><i class="fa fa-circle-o"></i> Agenda Calendar Redaktur</a></li>
				<li><a href="<?= base_url('agendaredaktur/index'); ?>"><i class="fa fa-circle-o"></i> Agenda Kegiatan Redaktur</a></li>
          </ul>
        </li>   
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Agenda Kegiatan Audio Man</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="<?= base_url('agendaaudio/agendacalendar'); ?>"><i class="fa fa-circle-o"></i> Agenda Calendar Audio Man</a></li>
				<li><a href="<?= base_url('agendaaudio/index'); ?>"><i class="fa fa-circle-o"></i> Agenda Kegiatan Audio Man</a></li>
          </ul>
        </li>   
		
		
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Agenda Kegiatan Chargen</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="<?= base_url('agendachargen/agendacalendar'); ?>"><i class="fa fa-circle-o"></i> Agenda Calendar Chargen</a></li>
				<li><a href="<?= base_url('agendachargen/index'); ?>"><i class="fa fa-circle-o"></i> Agenda Kegiatan Chargen</a></li>
          </ul>
        </li>   
		
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Agenda Kegiatan Editor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="<?= base_url('agendaeditor/agendacalendar'); ?>"><i class="fa fa-circle-o"></i> Agenda Calendar Editor</a></li>
				<li><a href="<?= base_url('agendaeditor/index'); ?>"><i class="fa fa-circle-o"></i> Agenda Kegiatan Editor</a></li>
          </ul>
        </li>   
		
		
			
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Agenda Kegiatan IT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="<?= base_url('agendait/agendacalendar'); ?>"><i class="fa fa-circle-o"></i> Agenda Calendar IT</a></li>
				<li><a href="<?= base_url('agendait/index'); ?>"><i class="fa fa-circle-o"></i> Agenda Kegiatan IT</a></li>
          </ul>
        </li>   

		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Agenda Kegiatan Kepustakaan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="<?= base_url('agendakepustakaan/agendacalendar'); ?>"><i class="fa fa-circle-o"></i> Agenda Calendar Kepustakaan</a></li>
				<li><a href="<?= base_url('agendakepustakaan/index'); ?>"><i class="fa fa-circle-o"></i> Agenda Kegiatan Kepustakaan</a></li>
          </ul>
        </li>   
        
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Agenda Kegiatan Operational</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="<?= base_url('agendaoperasional/agendacalendar'); ?>"><i class="fa fa-circle-o"></i> Agenda Calendar Operational</a></li>
				<li><a href="<?= base_url('agendaoperasional/index'); ?>"><i class="fa fa-circle-o"></i> Agenda Kegiatan Operational</a></li>
          </ul>
        </li>   
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Agenda Kegiatan PD Umum</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="<?= base_url('agendapdumum/agendacalendar'); ?>"><i class="fa fa-circle-o"></i> Agenda Calendar PD Umum</a></li>
				<li><a href="<?= base_url('agendapdumum/index'); ?>"><i class="fa fa-circle-o"></i> Agenda Kegiatan PD Umum</a></li>
          </ul>
        </li>   
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Agenda Kegiatan Penata Rias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="<?= base_url('agendapenatarias/agendacalendar'); ?>"><i class="fa fa-circle-o"></i> Agenda Calendar Penata Rias</a></li>
				<li><a href="<?= base_url('agendapenatarias/index'); ?>"><i class="fa fa-circle-o"></i> Agenda Kegiatan Penata Rias</a></li>
          </ul>
        </li>   
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Agenda Kegiatan  Switcher</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="<?= base_url('agendaswitcher/agendacalendar'); ?>"><i class="fa fa-circle-o"></i> Agenda Calendar Switcher</a></li>
				<li><a href="<?= base_url('agendaswitcher/index'); ?>"><i class="fa fa-circle-o"></i> Agenda Kegiatan Switcher</a></li>
          </ul>
        </li>   
		
		
			
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Agenda Kegiatan Lightning</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="<?= base_url('agendalightning/agendacalendar'); ?>"><i class="fa fa-circle-o"></i> Agenda Calendar Lightning</a></li>
				<li><a href="<?= base_url('agendalightning/index'); ?>"><i class="fa fa-circle-o"></i> Agenda Kegiatan Lightning</a></li>
          </ul>
        </li>   
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Agenda Kegiatan Maintenance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="<?= base_url('agendamaintenance/agendacalendar'); ?>"><i class="fa fa-circle-o"></i> Agenda Calendar Maintenance</a></li>
				<li><a href="<?= base_url('agendamaintenance/index'); ?>"><i class="fa fa-circle-o"></i> Agenda Kegiatan Maintenance</a></li>
          </ul>
        </li>   
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Agenda Kegiatan Master Control</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="<?= base_url('agendamastercontrol/agendacalendar'); ?>"><i class="fa fa-circle-o"></i> Agenda Calendar Master Control</a></li>
				<li><a href="<?= base_url('agendamastercontrol/index'); ?>"><i class="fa fa-circle-o"></i> Agenda Kegiatan Master Control</a></li>
          </ul>
        </li>   
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Agenda Kegiatan TD</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="<?= base_url('agendatd/agendacalendar'); ?>"><i class="fa fa-circle-o"></i> Agenda Calendar TD</a></li>
				<li><a href="<?= base_url('agendatd/index'); ?>"><i class="fa fa-circle-o"></i> Agenda Kegiatan TD</a></li>
          </ul>
        </li>   
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Agenda Kegiatan VTR</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="<?= base_url('agendavtr/agendacalendar'); ?>"><i class="fa fa-circle-o"></i> Agenda Calendar VTR</a></li>
				<li><a href="<?= base_url('agendavtr/index'); ?>"><i class="fa fa-circle-o"></i> Agenda Kegiatan VTR</a></li>
          </ul>
        </li>   
		
	
		
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Laporan </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="<?= base_url('laporan/laporan_pegawai'); ?>"><i class="fa fa-circle-o"></i> Laporan Data Pegawai</a></li>
			 <li><a href="<?= base_url('laporanagenda/laporan_agenda'); ?>"><i class="fa fa-circle-o"></i> Laporan Agenda Kegiatan</a></li>
			 <li><a href="<?= base_url('laporanagenda/laporan_agendadinas'); ?>"><i class="fa fa-circle-o"></i> Laporan Agenda Kegiatan Dinas</a></li>
             <li><a href="<?= base_url('laporanagenda/laporan_agendapegawai'); ?>"><i class="fa fa-circle-o"></i>Laporan Agenda Per Pegawai</a></li>
			 <li><a href="<?= base_url('laporanagenda/laporan_pegawaiagenda'); ?>"><i class="fa fa-circle-o"></i>Laporan Agenda Pegawai Aktif</a></li>
             <li><a href="<?= base_url('laporanagenda/laporan_satuanagenda'); ?>"><i class="fa fa-circle-o"></i>Laporan Agenda SatuanKerja</a></li>
          </ul>
        </li>    

      <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Data User/Hak Akses</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
         <li><a href="<?= base_url('admin/user_admin') ?>" class="active"><i class="fa fa-circle-o"></i>Hak Akses User </a></li> 
          </ul>
        </li>
		
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Profil Pegawai</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url('admin/profil'); ?>"><i class="fa fa-circle-o"></i>Ubah Password</a></li>
			<li><a href="<?= base_url('admin/profil_pegawai'); ?>"><i class="fa fa-circle-o"></i>Lihat Data Profil Lengkap</a></li>
			
          </ul>
        </li> 

		
		<li class="">
          <a href="<?= base_url('admin/keluar') ?>">
            <i class="fa fa-th"></i> <span>Keluar</span>
          </a>
        </li>
		 <?php }elseif($this->session->userdata('level') == "sespri"){ ?>
   
      <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Agenda Kegiatan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			 <li><a href="<?= base_url('agenda/myagendacalendar'); ?>"><i class="fa fa-circle-o"></i>Agenda Kegiatan Anda</a></li>
          </ul>
      </li>   
	
       <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Laporan </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="<?= base_url('laporan/laporan_pegawai'); ?>"><i class="fa fa-circle-o"></i> Laporan Data Pegawai</a></li>
			 <li><a href="<?= base_url('laporanagenda/laporan_agenda'); ?>"><i class="fa fa-circle-o"></i> Laporan Agenda Kegiatan</a></li>
             <li><a href="<?= base_url('laporanagenda/laporan_agendapegawai'); ?>"><i class="fa fa-circle-o"></i>Laporan Agenda Per Pegawai</a></li>
			 <li><a href="<?= base_url('laporanagenda/laporan_pegawaiagenda'); ?>"><i class="fa fa-circle-o"></i>Laporan Agenda Pegawai Aktif</a></li>
             <li><a href="<?= base_url('laporanagenda/laporan_satuanagenda'); ?>"><i class="fa fa-circle-o"></i>Laporan Agenda SatuanKerja</a></li>
          </ul>
        </li>        
		
		
  
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Profil Pegawai</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="<?= base_url('admin/profil'); ?>"><i class="fa fa-circle-o"></i>Ubah Password</a></li>
			<li><a href="<?= base_url('admin/profil_pegawai'); ?>"><i class="fa fa-circle-o"></i>Lihat Data Profil Lengkap</a></li>
			
          </ul>
        </li> 

		
		<li class="">
          <a href="<?= base_url('admin/keluar') ?>">
            <i class="fa fa-th"></i> <span>Keluar</span>
          </a>
        </li>
		
	  <?php 
	  }elseif($this->session->userdata('level') == "user"){ ?>
   
      <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Agenda Kegiatan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			 <li><a href="<?= base_url('agenda/myagendacalendar'); ?>"><i class="fa fa-circle-o"></i>Agenda Kegiatan Anda</a></li>
          </ul>
      </li>   
	
       <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Laporan </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="<?= base_url('laporan/laporan_pegawai'); ?>"><i class="fa fa-circle-o"></i> Laporan Data Pegawai</a></li>
			 <li><a href="<?= base_url('laporanagenda/laporan_agenda'); ?>"><i class="fa fa-circle-o"></i> Laporan Agenda Kegiatan</a></li>
             <li><a href="<?= base_url('laporanagenda/laporan_agendapegawai'); ?>"><i class="fa fa-circle-o"></i>Laporan Agenda Per Pegawai</a></li>
			 <li><a href="<?= base_url('laporanagenda/laporan_pegawaiagenda'); ?>"><i class="fa fa-circle-o"></i>Laporan Agenda Pegawai Aktif</a></li>
             <li><a href="<?= base_url('laporanagenda/laporan_satuanagenda'); ?>"><i class="fa fa-circle-o"></i>Laporan Agenda SatuanKerja</a></li>
          </ul>
        </li>        
  
		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Profil Pegawai</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="<?= base_url('admin/profil'); ?>"><i class="fa fa-circle-o"></i>Ubah Password</a></li>
			<li><a href="<?= base_url('admin/profil_pegawai'); ?>"><i class="fa fa-circle-o"></i>Lihat Data Profil Lengkap</a></li>
			
          </ul>
        </li> 

		
		<li class="">
          <a href="<?= base_url('admin/keluar') ?>">
            <i class="fa fa-th"></i> <span>Keluar</span>
          </a>
        </li>
		
	  <?php 
	  }
	  else if($this->session->userdata('level') == "pegawai")
	  { 
      ?>
		<li class="treeview">
		  <a href="#">
			<i class="fa fa-pie-chart"></i>
			<span>Agenda Kegiatan</span>
			<span class="pull-right-container">
			  <i class="fa fa-angle-left pull-right"></i>
			</span>
		  </a>
		  <ul class="treeview-menu">
			<li><a href="<?= base_url('agenda/myagendacalendar'); ?>"><i class="fa fa-circle-o"></i>Agenda Kegiatan Anda</a></li>
		  </ul>
	  </li>   


		<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Profil Pegawai</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="<?= base_url('admin/profil'); ?>"><i class="fa fa-circle-o"></i>Ubah Password</a></li>
			<li><a href="<?= base_url('admin/profil_pegawai'); ?>"><i class="fa fa-circle-o"></i>Lihat Data Profil Lengkap</a></li>
			
          </ul>
        </li> 

		
		<li class="">
          <a href="<?= base_url('admin/keluar') ?>">
            <i class="fa fa-th"></i> <span>Keluar</span>
          </a>
        </li>

<?php } ?>
	  <li class="header"></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content"> 
      <div class="row">
        <div class="box">
          <div class="box-header">
            <center><h3 class="box-title"><i class="fa fa-cubes"></i><?= $judul ?></h3></center></div>
            <div class="col-xs-12">
              

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"> <!--<![endif]-->

<head>
    <!-- BEGIN META SECTION -->
      <meta charset="utf-8">
	  <title><?= $judul ?> - Masuk</title>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta content="" name="description" />
	  <meta content="themes-lab" name="author" />
	  <link rel="shortcut icon" href="<?= base_url('/') ?>assetlogs/img/favicon.png">
		<!-- END META SECTION -->
		<!-- BEGIN MANDATORY STYLE -->
		  <link href="<?= base_url('/') ?>assetlogs/css/icons/icons.min.css" rel="stylesheet">
	  <link href="<?= base_url('/') ?>assetlogs/css/bootstrap.min.css" rel="stylesheet">
	  <link href="<?= base_url('/') ?>assetlogs/css/plugins.min.css" rel="stylesheet">
	  <link href="<?= base_url('/') ?>assetlogs/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
	  <link href="<?= base_url('/') ?>assetlogs/css/style.min.css" rel="stylesheet">
	  <link href="#" rel="stylesheet" id="theme-color">
		<!-- END  MANDATORY STYLE -->
		<!-- BEGIN PAGE LEVEL STYLE -->
		  <link href="<?= base_url('/') ?>assetlogs/css/animate-custom.css" rel="stylesheet">
		<!-- END PAGE LEVEL STYLE -->
		  <script src="<?= base_url('/') ?>assetlogs/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	
		<link rel="stylesheet" href="<?= base_url('/') ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?= base_url('/') ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?= base_url('/') ?>assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?= base_url('/') ?>assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?= base_url('/') ?>assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		
		  <meta charset="utf-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <title><?= $judul ?></title>
		  <!-- Tell the browser to be responsive to screen width -->
		  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		  <!-- Bootstrap 3.3.7 -->
		  <link rel="stylesheet" href="<?= base_url('template/admin/') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
		  <!-- Font Awesome -->
		  <link rel="stylesheet" href="<?= base_url('template/admin/') ?>/bower_components/font-awesome/css/font-awesome.min.css">
		  <!-- Ionicons -->
		  <link rel="stylesheet" href="<?= base_url('template/admin/') ?>/bower_components/Ionicons/css/ionicons.min.css">
		  <!-- Theme style -->
		  <link rel="stylesheet" href="<?= base_url('template/admin/') ?>/dist/css/AdminLTE.min.css">
		  <!-- iCheck -->
		  <link rel="stylesheet" href="<?= base_url('template/admin/') ?>/plugins/iCheck/square/blue.css">

		  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		  <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		  <![endif]-->

		  <!-- Google Font -->
		  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		
	</head>
	
	<body class="login fade-in" data-page="login">
    <!-- BEGIN LOGIN BOX -->
    <div class="container" id="login-block">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
            <div class="login-box clearfix animated flipInY">
                <div class="page-icon animated bounceInDown">
                    <img src="<?= base_url() ?>assetlogs/img/account/user-icon.png" alt="Key icon">
                </div>
                <div class="login-logo">
                    <a href="#?login-theme-3">
                        <img src="<?= base_url() ?>assetlogs/img/account/login-logo.png" alt="Desa2.0 Logo">
                    </a>
                </div>
                <hr>
				<div class="login-links">
				<h5><a href="#">SIJAKET (Sistem Informasi Jadwal Kegiatan Terpadu)</a></h5>
				</div>
                <div class="login-form">

					<?= $this->session->flashdata('pesan'); ?>
				 
					<form action="" method="post">
					  <div class="form-group has-feedback">
						<input type="text" class="form-control" name="username" placeholder="Username" required="">
						
					  </div>
					 
					<div class="form-group has-feedback">
						<input type="password" class="form-control" name="password" placeholder="Password" required="">
					</div>
					
					 <button type="submit" class="btn btn-login ladda-button" name="login" data-style="expand-left">Sign In</button>
						
					  
					</form>

											
				<div class="login-links">
								<br/>
								<h5><a href="#">TVRI </a><a href="#">Copyright - TVRI 2021</a></h5>
				</div>
							<!--<div class="login-links">
								<a href="password_forgot.html">Forgot password?</a>
								<br>
								<a href="signup.html">Don't have an account? <strong>Sign Up</strong></a>
							</div>-->
						</div>
					</div>
					<!--<div class="social-login row">
						<div class="fb-login col-lg-6 col-md-12 animated flipInX">
							<a href="#" class="btn btn-facebook btn-block">Connect with <strong>Facebook</strong></a>
						</div>
						<div class="twit-login col-lg-6 col-md-12 animated flipInX">
							<a href="#" class="btn btn-twitter btn-block">Connect with <strong>Twitter</strong></a>
						</div>
					</div>-->
				</div>
			</div>
		</div>
			<!-- END LOCKSCREEN BOX -->
			<!-- BEGIN MANDATORY SCRIPTS -->
		  <script src="<?= base_url('/') ?>assetlogs/plugins/jquery-1.11.js"></script>
		  <script src="<?= base_url('/') ?>assetlogs/plugins/jquery-migrate-1.2.1.js"></script>
		  <script src="<?= base_url('/') ?>assetlogs/plugins/jquery-ui/jquery-ui-1.10.4.min.js"></script>
		  <script src="<?= base_url('/') ?>assetlogs/plugins/jquery-mobile/jquery.mobile-1.4.2.js"></script>
		  <script src="<?= base_url('/') ?>assetlogs/plugins/bootstrap/bootstrap.min.js"></script>
		  <script src="<?= base_url('/') ?>assetlogs/plugins/jquery.cookie.min.js&quot; type=&quot;text/javascript"></script>
			<!-- END MANDATORY SCRIPTS -->
			<!-- BEGIN PAGE LEVEL SCRIPTS -->
		<script src="<?= base_url('/') ?>assetlogs/plugins/backstretch/backstretch.min.js"></script>
		<script src="<?= base_url('/') ?>assetlogs/plugins/bootstrap-loading/lada.min.js"></script>
		<script src="<?= base_url('/') ?>assetlogs/js/account.js"></script>
			<!-- END PAGE LEVEL SCRIPTS -->

			<script>
		$(function() {
		$('#submit-form').click(function(e){
			e.preventDefault();
			var l = Ladda.create(this);
			l.start();
			setTimeout(function () {
				window.location.href = "index.html";
			}, 2000);

		});
		});
		</script>
		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>


<!-- jQuery 3 -->
<script src="<?= base_url('template/admin/') ?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('template/admin/') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url('template/admin/') ?>/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>


    <!-- END LOCKSCREEN BOX -->
    <!-- BEGIN MANDATORY SCRIPTS -->
      <script src="<?= base_url('/') ?>assetlogs/plugins/jquery-1.11.js"></script>
	  <script src="<?= base_url('/') ?>assetlogs/plugins/jquery-migrate-1.2.1.js"></script>
	  <script src="<?= base_url('/') ?>assetlogs/plugins/jquery-ui/jquery-ui-1.10.4.min.js"></script>
	  <script src="<?= base_url('/') ?>assetlogs/plugins/jquery-mobile/jquery.mobile-1.4.2.js"></script>
	  <script src="<?= base_url('/') ?>assetlogs/plugins/bootstrap/bootstrap.min.js"></script>
	  <script src="<?= base_url('/') ?>assetlogs/plugins/jquery.cookie.min.js&quot; type=&quot;text/javascript"></script>
		<!-- END MANDATORY SCRIPTS -->
		<!-- BEGIN PAGE LEVEL SCRIPTS -->
		<script src="<?= base_url('/') ?>assetlogs/plugins/backstretch/backstretch.min.js"></script>
	<script src="<?= base_url('/') ?>assetlogs/plugins/bootstrap-loading/lada.min.js"></script>
	<script src="<?= base_url('/') ?>assetlogs/js/account.js"></script>
		<!-- END PAGE LEVEL SCRIPTS -->

    <script>
$(function() {
$('#submit-form').click(function(e){
    e.preventDefault();
    var l = Ladda.create(this);
    l.start();
    setTimeout(function () {
        window.location.href = "index.html";
    }, 2000);

});
});
</script>
</body>

</html>

<!-- Header -->
<?php $this->load->view('template/template-admin-header'); ?>
 

		<title>后台管理系统</title>

		<!-- Local global -->
		<link href="<?php echo base_url('public/css/global.css'); ?>" rel="stylesheet" type="text/css">

		<!-- Bootstrap -->
		<link href="<?php echo base_url('public/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">

		<!-- Local admin -->
		<link href="<?php echo base_url('public/css/admin/admin.common.css'); ?>" rel="stylesheet" type="text/css">




		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?php echo base_url('public/scripts/jquery.min.js'); ?>"></script>
		<script src="<?php echo base_url('public/scripts/jquery.validate.min.js'); ?>"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?php echo base_url('public/scripts/bootstrap.min.js'); ?>"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>

	<!-- content -->

	<?php $this->load->view('admin/home-header'); ?>
	<?php $this->load->view('admin/home-sidebar'); ?>

	<div id="content">
		
	</div>




	<script src="<?php echo base_url('public/scripts/md5.js'); ?>"></script>
	<script src="<?php echo base_url('public/scripts/admin/admin.common.js'); ?>"></script>

	<script type="application/javascript">

	</script>


<!-- Footer -->
<?php $this->load->view('template/template-admin-footer'); ?>
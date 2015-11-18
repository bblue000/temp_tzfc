<!-- Header -->
<?php $this->load->view('template/template-admin-header'); ?>
 
		<title>后台管理系统-管理小区</title>

		<!-- Local global -->
		<link href="public/css/global.css" rel="stylesheet" type="text/css">

		<!-- Bootstrap -->
		<link href="public/css/bootstrap.min.css" rel="stylesheet" type="text/css">

		<!-- Local admin -->
		<link href="public/css/admin/admin.common.css" rel="stylesheet" type="text/css">

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script type="text/javascript" src="public/scripts/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script type="text/javascript" src="public/scripts/bootstrap.min.js"></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script type="text/javascript" src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script type="text/javascript" src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>

	<!-- content -->

	<?php $this->load->view('admin/home-header'); ?>
	<?php $this->load->view('admin/home-sidebar'); ?>

	<div id="content">
		<div id="house-container">

			<h3>公共信息 <small>管理小区</small></h3>
			
			<hr/>

			<div id="house-list-container">
				<table class="table table-bordered table-hover table-striped">
					<tbody>
						<?php if (isset($communitys)) : ?>
							<?php $myIndex = 0; ?>
							<?php foreach ($communitys as $community) : ?>
								<?php if ($myIndex % 2 == 0) : ?>
								<tr>
								<?php endif; ?>
									<td class="house-col-1" title="<?php echo $community['cname']; ?>"><?php echo $community['cname']; ?></td>
									<td>
										<a class="btn btn-warning house-op house-op-edit" href="admincommon/community/edit?cid=<?php echo $community['cid']; ?>" onclick="return true;">编辑</a>
										<a class="btn btn-danger house-op house-op-delete" href="admincommon/community/del?cid=<?php echo $community['cid']; ?>" onclick="return confirm('确认要删除吗？');">删除</a>
									</td>
								<?php if ($myIndex % 2 == 1) : ?>
								</tr>
								<?php endif; ?>
								<?php $myIndex++; ?>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
			</div>

		</div>
	</div>



	<script type="text/javascript" src="public/scripts/admin/admin.common.js"></script>
	<script type="text/javascript" src="public/scripts/admin/admin.validate.js"></script>

	<script type="text/javascript">

	</script>

<!-- Footer -->
<?php $this->load->view('template/template-admin-footer'); ?>
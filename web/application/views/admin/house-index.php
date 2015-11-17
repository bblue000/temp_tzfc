<!-- Header -->
<?php $this->load->view('template/template-admin-header'); ?>
 
		<title>后台管理系统-我的房源</title>

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

			<h3>房源管理 <small>房源列表</small></h3>
			
			<hr/>

			<div id="house-cat-container">
				<label class="radio-inline">
					<input type="radio" name="house_cat" value="0" checked="checked"> 出售房源
				</label>
				<label class="radio-inline">
					<input type="radio" name="house_cat" value="1"> 出租房源
				</label>
			</div>

			<div id="house-keyword-container">
				<input id="house-keyword-input" type="text" class="form-control" placeholder="输入关键字">
			</div>

			<div id="house-result-lable"><strong>搜索结果：</strong></div>

			<div id="house-list-container">
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th>标题</th>
							<th>户型</th>
							<th>上传日期</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($houses as $house) : ?>
							<tr>
								<td class="house-col-1" title="<?php echo $house['title']; ?>"><?php echo $house['title']; ?></td>
								<td><?php echo $house['house_type']; ?></td>
								<td><?php echo $house['create_time']; ?></td>
								<td>
									<a class="btn btn-warning house-op house-op-edit" href="adminhouse/edit?hid=<?php echo $house['hid']; ?>" onclick="return true;">编辑</a>
									<a class="btn btn-danger house-op house-op-delete" href="adminhouse/del?hid=<?php echo $house['hid']; ?>" onclick="return confirm('确认要删除吗？');">删除</a>
								</td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>



	<script type="text/javascript" src="public/scripts/md5.js"></script>
	<script type="text/javascript" src="public/scripts/admin/admin.common.js"></script>
	<script type="text/javascript" src="public/scripts/admin/admin.validate.js"></script>
	<script type="text/javascript" src="public/scripts/admin/zxxFile.js"></script>

	<script type="text/javascript">

	</script>

<!-- Footer -->
<?php $this->load->view('template/template-admin-footer'); ?>
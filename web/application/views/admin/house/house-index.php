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

			<form id="searchForm" action="adminhouse" method="get">
			<div id="house-cat-container">
				<label class="radio-inline">
					<input type="radio" name="cat" value="0"> 出售房源
				</label>
				<label class="radio-inline">
					<input type="radio" name="cat" value="1"> 出租房源
				</label>
			</div>

			<div id="house-keyword-container" class="form-inline">
				<input id="house-keyword-input" name="kw" type="text" class="form-control" placeholder="输入关键字">
				<a class="btn btn-default" href="javascript:void(0);" onclick="return searchHouse(this);" target="_self">搜索</a>
			</div>
			</form>

			<div id="house-result-lable"><strong>搜索结果：</strong></div>

			<div id="house-list-container">
				<?php if (isset($houses) && !empty($houses)) : ?>
				<table class="table table-bordered table-hover table-striped">
					<thead>
						<tr>
							<th class="check"><input type="checkbox" onclick="checkAll(this,'id[]')" /></th>
							<th>标题</th>
							<th>户型</th>
							<th>更新时间</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody> <form id="delForm" action="adminhouse/del_sell" method="post">
						<?php 
							$myIndex = 0;
							foreach ($houses as $house) : ?>
							<?php $house_title = to_room_title($house); ?>
							<tr>
								<td class="check"><input type="checkbox" id="<?php echo "hid$myIndex";?>" name="id[]" value="<?php echo $house['hid'];?>" /></td></td>
								<td class="house-col-1" title="<?php echo $house_title; ?>"><?php echo $house_title; ?></td>
								<td>
									<?php 
										echo to_room_type($house); 
									?>
								</td>
								<td><?php echo $house['update_time']; ?></td>
								<td>
									<a class="btn btn-warning house-op house-op-edit" href="adminhouse/edit_?hid=<?php echo $house['hid']; ?>" onclick="return true;">编辑</a>
									<a class="btn btn-danger house-op house-op-delete" data-inputid="<?php echo "hid$myIndex";?>" onclick="return delBatch(this);">删除</a>
								</td>
							</tr>
							<?php $myIndex++; ?>
						<?php endforeach;?>
					</form>
					</tbody>
				</table>
				<?php endif; ?>
			</div>
		</div>
	</div>



	<script type="text/javascript" src="public/scripts/admin/admin.common.js"></script>

	<script type="text/javascript">
	$('input[name="cat"][value="<?php echo (!isset($cat) || empty($cat) || $cat == 0) ? "0" : "1"; ?>"]').attr('checked', 'checked');

	var searchForm = $('#searchForm');
	function searchHouse (self) {
		console.log($('input[name="cat"]:checked').val());
		searchForm.submit();
		return true;
	}

	var delForm = $('#delForm');
	function delBatch(o) {
		var inputCheckbox = $('#' + $(o).data('inputid'));
		var tcheck = inputCheckbox.is(':checked');
		if (!tcheck) {
			inputCheckbox.prop('checked', true);
		}
		var r = confirm('确认要删除吗？');
		if (!r) {
			if (!tcheck) {
				inputCheckbox.prop('checked', false);
			}
		} else {
			delForm.submit();
		}
		return r;
	}
	</script>

<!-- Footer -->
<?php $this->load->view('template/template-admin-footer'); ?>
<!-- Header -->
<?php $this->load->view('template/template-admin-header'); ?>
 
		<title>后台管理系统</title>

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
			<h3>房源管理 <small>添加二手房源</small></h3>

			<table class="table table-bordered table-striped house-edit-container">
				<tr class="danger">
					<th><label>小区</label></th>
					<td>
						<div class="house-edit-input-container">
							
							<input type="text" name="comm" id="inputComm" class="form-control house-related-long" autofocus placeholder="只填写小区名，例财富广场" tabindex="1">

							<div class="house-tooltip">
								<ul class="house-autoCompleteul">
									<li r="11383" m="5512" k="山水华庭" valueid="1882" class="">
										<b>山水</b>华庭<cite>长江中路99号（长江路与向阳路交汇处往南100米）</cite>
									</li>
									<li r="16" m="11863" k="山水森林" valueid="315550" class="">
										<b>山水</b>森林<cite>马鞍山路与鹿城路交汇处</cite>
									</li>
								</ul>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<th>房屋户型</th>
					<td>
						<div class="house-edit-input-container">
							<div class="house-input_text_wrap">
								<input type="text" tabindex="2" name="rooms" id="inputHouseRooms" maxlength="1" class="house-related-short">
								<span>室</span>
							</div>
							<div class="house-input_text_wrap">
								<input type="text" tabindex="3" name="halls" id="inputHouseHalls" maxlength="1" class="house-related-short">
								<span>厅</span>
							</div>
							<div class="house-input_text_wrap">
								<input type="text" tabindex="4" name="bathrooms" id="inputHouseBathrooms" maxlength="1" class="house-related-short">
								<span>卫</span>
							</div>

							<div class="house-input_text_wrap">
								<span>共</span>
								<input type="text" tabindex="5" name="size" id="inputHouseSize" class="house-related-short">
								<span>㎡(<small>*支持两位小数</small>)</span>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<th>价格(<small>*支持两位小数</small>)</th>
					<td>
						<div class="house-edit-input-container">
							<div class="house-input_text_wrap">
								<span>总价</span>
								<input type="text" tabindex="6" id="inputHouseTotal" class="house-related-short">
								<span>万</span>
							</div>
							<div class="house-input_text_wrap">
								<span>单价</span>
								<input type="text" tabindex="7" id="inputHouseUnitPrice" class="house-related-short">
								<span>元/㎡</span>
							</div>
						</div>
					</td>
				</tr>
				

				<tr>
					<th>房源标题(<small>*可自动生成</small>)</th>
					<td>
						<div class="house-edit-input-container form-inline">
							<input type="text" tabindex="8" id="inputHouseTitle" maxlength="50" class="form-control house-related-long" disabled>

							<button class="btn btn-warning" onclick="enableTitle(this);">编辑</button>
						</div>
					</td>
				</tr>

				<!-- 额外的一些信息㎡ -->
				<tr>
					<th>楼层</th>
					<td>
						<div class="house-edit-input-container">
							<div class="house-input_text_wrap">
								<span>第</span>
								<input type="text" tabindex="9" name="floor" id="inputHouseFloor" class="house-related-short">
								<span>层(<small>地下室用负数，例：-3</small>）</span>
							</div>
							<div class="house-input_text_wrap">
								<span>共</span>
								<input type="text" tabindex="10" name="total_floor" id="inputHouseTotalFloor" class="house-related-short">
								<span>层</span>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<th>类型</th>
					<td>
						<div class="house-edit-input-container clearfix">
							<div class="house-selectordef" tabindex="11">
								<div class="title">
									<span class="seled" id="inputHouseType">普通住宅</span>
									<div class="arrow"></div>
								</div>
								<div class="house-optiondef" style="display:none;" >
									<ul>
										<li val="">请选择类别</li>
										<li val="1">平房</li>
										<li val="2">普通住宅</li>
										<li val="3">公寓</li>
										<li val="4">别墅</li>
									</ul>
								</div>
							</div>

							<div class="house-selectordef" tabindex="12">
								<div class="title">
									<span class="seled" id="inputHouseDecor">请选择装修情况</span>
									<div class="arrow"></div>
								</div>
								<div class="house-optiondef" style="display:none;" >
									<ul>
										<li val="">请选择类别</li>
										<li val="1">平房</li>
										<li val="2">普通住宅</li>
										<li val="3">公寓</li>
										<li val="4">别墅</li>
									</ul>
								</div>
							</div>

							<div class="house-selectordef" tabindex="13">
								<div class="title">
									<span class="seled" id="inputHouseOrientation">请选择朝向</span>
									<div class="arrow"></div>
								</div>
								<div class="house-optiondef" style="display:none;" >
									<ul>
										<li val="">请选择类别</li>
										<li val="1">平房</li>
										<li val="2">普通住宅</li>
										<li val="3">公寓</li>
										<li val="4">别墅</li>
									</ul>
								</div>
							</div>

						</div>
					</td>
				</tr>
				<tr>
					<th>产权</th>
					<td>
						<div class="house-edit-input-container">
							<div class="house-selectordef" tabindex="14">
								<div class="title">
									<span class="seled" id="inputHouseRightsLen">请选择产权年限</span>
									<div class="arrow"></div>
								</div>
								<div class="house-optiondef" style="display:none;" >
									<ul>
										<li val="">请选择类别</li>
										<li val="1">平房</li>
										<li val="2">普通住宅</li>
										<li val="3">公寓</li>
										<li val="4">别墅</li>
									</ul>
								</div>
							</div>


							<div class="house-selectordef" tabindex="15">
								<div class="title">
									<span class="seled" id="inputHouseRights">请选择产权</span>
									<div class="arrow"></div>
								</div>
								<div class="house-optiondef" style="display:none;" >
									<ul>
										<li val="">请选择类别</li>
										<li val="1">平房</li>
										<li val="2">普通住宅</li>
										<li val="3">公寓</li>
										<li val="4">别墅</li>
									</ul>
								</div>
							</div>

							<div class="house-input_text_wrap">
								<input type="text" tabindex="16" name="rights_from" id="inputHouseRightsFrom" class="house-related-short" placeholder="建筑年代">
								<span>年</span>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<th>小学学区</th>
					<td>
						<div class="house-edit-input-container">
							<input type="text" name="pri_school" id="inputprimary" class="form-control house-related-long" >
						</div>
					</td> 
				</tr>
				<tr>
					<th>初中学区</th>
					<td>
						<div class="house-edit-input-container">
							<input type="text" name="jun_school" id="inputJunior" class="form-control house-related-long" >
						</div>
					</td>
				</tr>

				<tr>
					<th>详细介绍</th>
					<td>
						<div class="house-edit-input-container">
							<textarea name="detail" id="inputDetail"  class="form-control house-related-long" rows="5" placeholder=""></textarea>
						</div>
					</td>
				</tr>

				<tr>
					<th></th>
					<td>
						<div class="house-edit-input-container">
							<button class="btn btn-lg btn-primary btn-block login-btn house-related-short" type="submit" onClick="return checkInput()">提交</button>
						</div>
					</td>
				</tr>
			</table>

		</div>
	</div>



	<script type="text/javascript" src="public/scripts/md5.js"></script>
	<script type="text/javascript" src="public/scripts/admin/admin.common.js"></script>
	<script type="text/javascript" src="public/scripts/admin/admin.validate.js"></script>

	<script type="text/javascript">
	function enableTitle(self) {
		var inputHouseTitle = $('#inputHouseTitle');
		if (inputHouseTitle.attr("disabled")) {
			inputHouseTitle.removeAttr("disabled");
			$(self).text('完成');
		} else {
			inputHouseTitle.attr("disabled", "disabled");
			$(self).text('编辑');
		}
	}

	function checkInput() {
		return commonHouseValidate("<?php echo base_url('adminhouse/add_sell/ajax'); ?>");
	}
	</script>

<!-- Footer -->
<?php $this->load->view('template/template-admin-footer'); ?>
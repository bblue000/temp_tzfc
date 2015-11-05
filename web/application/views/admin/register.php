<!-- Header -->
<?php $this->load->view('template/template-admin-header'); ?>
 


	<title>后台管理系统</title>

	<!-- Local global -->
	<link href="<?php echo base_url('public/css/global.css'); ?>" rel="stylesheet" type="text/css">

	<!-- Bootstrap -->
	<link href="<?php echo base_url('public/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">

	<!-- Local admin -->
	<link href="<?php echo base_url('public/css/admin/admin.common.css'); ?>" rel="stylesheet" type="text/css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<!-- content -->
	<h1 class="form-sign-h1">后台管理系统</h1>
	<div class="container">
		<div class="form_wrapper">
			<h2 class="form-sign-heading">用户注册</h2>
              
			<form id="registerForm" class="form-sign form-signup" action="" onsubmit="return false" method="post">
				<table class="table table-striped input-table">
					<tr>
						<td>
							<label for="inputAvatar">头像</label>
						</td>
						<td>
							<img class="img-thumbnail avator" alt="点击上传头像" onclick="changeAvator();" />
						</td>
					</tr>

					<tr class="danger">
						<td>
							<label for="inputUsername">账户</label>
						</td>
						<td>
							<input type="text" name="user_name" id="inputUsername" class="form-control" placeholder="账户" autofocus >
						</td>
					</tr>

					<tr class="danger">
						<td>
							<label for="inputPassword">密码</label>
						</td>
						<td>
							<input type="password" name="password" id="inputPassword" class="form-control" placeholder="密码">
						</td>
					</tr>

					<tr class="danger">
						<td>
							<label for="inputTrueName">姓名</label>
						</td>
						<td>
							<input type="text" name="true_name" id="inputTrueName" class="form-control" placeholder="姓名">
						</td>
					</tr>

					<tr>
						<td>
							<label for="inputSex">性别</label>
						</td>
						<td>
							<label class="radio-inline">
								<input type="radio" name="inputSex" value="0"  checked="checked"> 男
							</label>
							<label class="radio-inline">
								<input type="radio" name="inputSex" value="1"> 女
							</label>
						</td>
					</tr>

					<tr class="danger">
						<td>
							<label for="inputMobile">手机号</label>
						</td>
						<td>
							<input type="text" name="contact_mobile" maxlength="11" id="inputMobile" class="form-control" placeholder="手机号">
						</td>
					</tr>

					<tr>
						<td>
							<label for="inputQQ">QQ</label>
						</td>
						<td>
							<input type="text" name="qqchat" id="inputQQ" class="form-control" placeholder="QQ号">
						</td>
					</tr>

					<tr>
						<td>
							<label for="inputEmail">邮箱</label>
						</td>
						<td>
							<input type="text" name="email" id="inputEmail" class="form-control" placeholder="邮箱">
						</td>
					</tr>
				</table>

				<button class="btn btn-lg btn-primary btn-block login-btn" type="submit" onClick="return checkInput()">注册</button>
			</form>

		</div>
	</div>






	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?php echo base_url('public/scripts/jquery.min.js'); ?>"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php echo base_url('public/scripts/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('public/scripts/md5.js'); ?>"></script>
	<script src="<?php echo base_url('public/scripts/admin/admin.common.js'); ?>"></script>

	<script type="application/javascript">
	function checkInput() {
		var user_name=$.trim($("#inputUsername").val());
		if (user_name == "") {
			showToast('请输入用户名');
			return false;
		}
		var password = $("#inputPassword").val();
			if (password == "") {
			showToast('请输入密码');
			return false;
		}

		if (password.length < 6) {
			showToast('密码至少6位');
			return false;
		}

		var user_pass = hex_md5(password);

		var sex = $(':radio[name="inputSex"]:checked').val();


		var true_name=$.trim($("#inputTrueName").val());
		if (true_name == "") {
			showToast('请输入姓名');
			return false;
		}

		var contact_mobile=$.trim($("#inputMobile").val());
		if (contact_mobile == "") {
			showToast('请输入手机号');
			return false;
		}

		var qqchat=$.trim($("#inputQQ").val());
		if (qqchat == "") {
			showToast('请输入QQ号');
			return false;
		}
		var email = $.trim($("#inputMobile").val());

		var postData = "user_name=" + user_name
						+ "&password=" + user_pass
						+ "&sex=" + sex
						+ "&true_name=" + true_name
						+ "&contact_mobile=" + contact_mobile
						+ "&qqchat=" + qqchat
						+ "&email=" + email
		console.log(postData);
		console.log(encodeURI(postData));
	}

	function changeAvator() {

	}
	</script>


<!-- Footer -->
<?php $this->load->view('template/template-admin-footer'); ?>
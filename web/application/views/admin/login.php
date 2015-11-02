<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    
	<title>后台管理系统-登录</title>

    <!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('public/css/style-admin.css'); ?>">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
    body {
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #eee;
    }
    
    h1{
        font-size:45px;
        margin:20px auto;
        text-align:center
    }
    
    .form_wrapper{
        background:#fff;
        border:1px solid #ddd;
        margin:0 auto;
        width:350px;
        font-size:16px;
        -moz-box-shadow:1px 1px 7px #ccc;
        -webkit-box-shadow:1px 1px 7px #ccc;
        box-shadow:1px 1px 7px #ccc;
    }
    
    .form_wrapper h2{
        padding:20px 30px 20px 30px;
        background-color:#444;
        color:#fff;
        font-size:25px;
        border-bottom:1px solid #ddd;
        margin: 0;
    }
    
    .form-signin {
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
      margin-bottom: 10px;
    }
    .form-signin .checkbox {
      font-weight: normal;
    }
    .form-signin .form-control {
      position: relative;
      height: auto;
      -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
              box-sizing: border-box;
      padding: 10px;
      font-size: 16px;
    }
    .form-signin .form-control:focus {
      z-index: 2;
    }
    .form-signin input[type="text"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
    
    .input-table {
        width:100%;
        margin-top:20px;
    }
    
    .login-btn {
        background:#444;
        margin-top:20px
    }
    </style>
</head>


<body>

	<h1>后台管理系统</h1>
	<div class="container">
		<div class="form_wrapper">
        	<h2 class="form-signin-heading">用户登录</h2>
            
            
            <form id="loginForm" class="form-signin" method="post" action="">
                
                <table class="input-table">
                    <tr>
                        <td>
                        <label for="inputEmail">账户</label>
                        </td>
                        <td>
                        <input type="text" name="user_name" id="inputUsername" class="form-control" placeholder="账户" autofocus <?php if (isset($user_name)) :?> value="<?php echo $user_name; ?>" <?php endif; ?>>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <label for="inputPassword">密码</label>
                        </td>
                        <td>
                        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="密码">
                        </td>
                    </tr>
                </table>
                
                <button class="btn btn-lg btn-primary btn-block login-btn" type="submit" onClick="return check_input()">登录</button>
          	</form>
        </div>
      

    </div> <!-- /container -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('public/scripts/jquery.min.js'); ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('public/scripts/bootstrap.min.js'); ?>"></script>
    
    <script type="application/javascript">
	function check_input() {
		var userName = $("#inputUsername").val();
		if (!userName) {
			alert('请输入用户名');
			return false;
		}
		var password = $("#inputPassword").val();
		if (!password) {
			alert('请输入密码');
			return false;
		}
		$.post("<?php echo base_url('admin/login'); ?>", 
			$("#loginForm").serialize(), function(data,status) {
				
			});
		return false;
	}
	</script>
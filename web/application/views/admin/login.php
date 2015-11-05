<!-- Header -->
<?php  $this->load->view('template/template-admin-header'); ?>

    <title>后台管理系统-登录</title>

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

  	<h1 class="form-sign-h1">后台管理系统</h1>

  	<div class="container">
  		<div class="form_wrapper">
          	<h2 class="form-sign-heading">用户登录</h2>
              
              <form id="loginForm" class="form-sign form-signin" action="" onsubmit="return false" method="post">
                  
                  <table class="input-table">
                      <tr>
                          <td>
                          <label for="inputUsername">账户</label>
                          </td>
                          <td>
                          <input type="text" name="user_name" id="inputUsername" class="form-control" placeholder="账户" autofocus <?php if (isset($user_name)) { echo ' value="'.$user_name.'" ';} ?>>
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
      <script src="<?php echo base_url('public/scripts/md5.js'); ?>"></script>
      <script src="<?php echo base_url('public/scripts/admin/admin.common.js'); ?>"></script>
      
      <script type="application/javascript">
    	function check_input() {
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

        if (password.length < <?php echo PASS_MIN_LEN; ?>) {
          showToast('密码至少6位');
          return false;
        }

        var user_pass = hex_md5(password);

        $.ajax({
          type: "POST",
          url: "<?php echo site_url('admin/login/ajax');?>",
          dataType: "json",
          data: "user_name="+user_name+"&password="+user_pass,
          success: function(data){
                if (data.code == 200) {
                    location.href=data.data;
                } else {
                    showToast(data.msg);
                }
          },
          beforeSend:function(){
            
          },
          error:function(XMLHttpRequest, textStatus, errorThrown){
            showToast("出错了：" + textStatus);
          }
        });
    		return false;
    	}
    	</script>

<!-- Footer -->
<?php $this->load->view('template/template-admin-footer'); ?>

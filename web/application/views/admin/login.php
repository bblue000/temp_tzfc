<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>管理后台</title>
<meta name="Author" content="YY" />
<meta name="Copyright" content="YY" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<link href="<?php echo base_url('public/css/admin/admin.css');?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('public/css/admin/global.css');?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url('public/js/jquery.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/js/md5.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/js/admin.common.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/js/admin.public.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/js/base.js')?>"></script>
<script type="text/javascript">

function login(){
	var $loginForm = $("#loginForm");
	var $captcha = $("#code");
	var $captchaImage = $("#captchaImage");
	var user_name=$.trim($("#username").val());

	var password=$.trim($("#pwd").val());
	var user_pass = hex_md5(password);
	//$("#pwd").val("");
	var user_code=$.trim($("#code").val());


	if (user_name == "") {
		dialog('用户名不能为空!');
		return false;
	}

	if (password == "") {
		dialog('请输入您的密码!');
		return false;
	}
	if (user_code == "") {
		dialog('验证码不能为空!');
		return false;
	}
	$.ajax({
		type: "POST",
		url: "<?php echo site_url('c=admin&m=login');?>",
		dataType: "json",
		data: "opt=ajax&username="+user_name+"&password="+user_pass+"&code="+user_code,
		success: function(data){
			if(data.status == '200'){
					location.href="<?php echo site_url('c=admin&m=main');?>";
			}else{
					new ui.Dialog({width:300,
								textContent : data.msg,
								textContentAlign : "center",
								closeButton : false,
								shadow : true,
								autoClose : true,
								closeDuration : 1000,
								closeCallBacks: function() {
									return false;
								}
							});
						}
					$('.captchaImage').trigger('click');

		},
		beforeSend:function(){
			
		},
		error:function(XMLHttpRequest, textStatus, errorThrown){
			
		}
	});

	function dialog(msg){
		new ui.Dialog({width:300,
			textContent : msg,
			textContentAlign : "center",
			closeButton : false,
			shadow : true,
			autoClose : true,
			closeDuration : 1000,
			closeCallBacks: function() {
				return false;
			}
		});
	}
}
$().ready( function() {
	// 刷新验证码
	$(".captchaImage").click( function() {
		document.getElementById('captchaImage' ).src="<?php echo site_url('admin/checkcode?r=');?>" + Math.random(); ;
	});
});
</script>
</head>
<body class="login">
	<script type="text/javascript">
		// 登录页面若在框架内，则跳出框架
		if (self != top) {
			top.location = self.location;
		};
	</script>
    
    <div>
    <form id="loginForm" action="" onsubmit="return false" method="post">
        <div class="logo"></div>
        <table class="loginTable">
            <tr>
                <th>
                    用户名：
                </th>
                <td>
                    <input type="text" id="username" name="username" class="formText"/>
                </td>
            </tr>
            <tr>
                <th>
                    密&nbsp;&nbsp;&nbsp;码：
                </th>
                <td>
                    <input type="password" id="pwd" name="pwd" class="formText"/>
                    <input type="hidden" id="" name="password" class="formText"/>
                </td>
            </tr>
            <tr>
                <th>
                    验证码：
                </th>
                <td>
                    <input type="text" id="code" name="code" class="formText captcha" />
                    <img id="captchaImage" class="captchaImage" src="<?php echo site_url('c=admin&m=code');?>" alt="换一张" />
                </td>
            </tr>
            <tr>
                <th>&nbsp;
                </th>
                <td><input type="submit" class="submitButton" onclick="login()" value="登 录" hidefocus /></td>
            </tr>
        </table>
        <p class="fl-clear"></p>
    </form>
    </div>
</body>
</html>

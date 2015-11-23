var avatar = $('#inputAvatar');
var user_name = $("#inputUsername");
var password = $("#inputPassword");
var password2 = $("#inputPassword2");
var true_name = $("#inputTrueName");
var sex = $('input[name="inputSex"]');
var contact_mobile = $("#inputMobile");
var qqchat = $("#inputQQ");
var email = $("#inputEmail");
var postIsProgressing = false;
function commonSignValidate(postUrl) {
	var result = "";
	if (user_name && user_name.length > 0) {
		var val = $.trim(user_name.val());
		if (val == "") {
			showToast("请输入用户名");
			user_name.focus();
			return false;
		}
		result = "user_name=" + $.urlencode(val);
	}
	var pwdVal;
	if (password && password.length > 0) {
		var val = $.trim(password.val());
		if (val == "") {
			showToast("请输入密码");
			password.focus();
			return false;
		}
		if (val.length < 6) {
			showToast("密码长度至少6位");
			password.focus();
			return false;
		}
		pwdVal = val;
		result += "&password=" + hex_md5(val);
	}
	if (password2 && password2.length > 0) {
		var val = $.trim(password2.val());
		if (val != pwdVal) {
			showToast("两次密码不一致");
			password2.focus();
			return false;
		}
	}
	if (true_name && true_name.length > 0) {
		var val = $.trim(true_name.val());
		if (val == "") {
			showToast("请输入姓名");
			true_name.focus();
			return false;
		}
		result += "&true_name=" + $.urlencode(val);
	}

	var sex = $('input[name="inputSex"]:checked');
	if (sex && sex.length > 0) {
		var val = sex.val();
		result += "&sex=" + val;
	}

	if (contact_mobile && contact_mobile.length > 0) {
		var val = $.trim(contact_mobile.val());
		if (val == "") {
			showToast("请输入手机号");
			contact_mobile.focus();
			return false;
		}
		if (val.length != 11 || !__isUnsignedNumber(val)) {
			showToast("手机号必须为11位纯数字");
			contact_mobile.focus();
			return false;
		}
		result += "&contact_mobile=" + val;
	}
	if (qqchat && qqchat.length > 0) {
		var val = $.trim(qqchat.val());
		if (val != "") {
			if (!__isUnsignedNumber(val)) {
				showToast("QQ号必须为纯数字");
				qqchat.focus();
				return false;
			}
			result += "&qqchat=" + val;
		}
	}
	if (email && email.length > 0) {
		var val = $.trim(email.val());
		if (val != "") {
			if (!__isEmail(val)) {
				showToast("请输入正确的邮箱");
				email.focus();
				return false;
			}
			result += "&email=" + val;
		}
	}

	if (avatar && avatar.length > 0) {
		if (val = avatar.data('src')) {
			result += "&avatar=" + val;
		}
	}

	console.log(result);
	if (result.indexOf('&') == 0) {
		result = result.substr(1);
	}
	console.log(result);

	// 如果正在进行，则直接返回咯
	if (postIsProgressing) {
		return false;
	}

	postIsProgressing = true;
	var postData = result;

	console.log(postData);

	simplePost(postUrl, postData, {
		success : function(data) {
			postIsProgressing = false;
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			postIsProgressing = false;
		}
	});

	return true;
}

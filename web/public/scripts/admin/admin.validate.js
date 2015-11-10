
// jQuery validator
$.extend($.validator.elements, function() {  
            var validator = this, rulesCache = { };
            
            // select all valid inputs inside the form (no submit or reset buttons)
            // workaround $Query([]).add until http://dev.jquery.com/ticket/2114 is solved
            return $([]).add(this.currentForm.elements)
            // .find("input, select, textarea")
            .filter(":input")
            .not(":submit, :reset, :image, [disabled]")
            .not( this.settings.ignore )
            .filter(function() {
                !this.name && validator.settings.debug && window.console && console.error( "%o has no name assigned", this);
            
                // select only the first element for each name, and only those with rules specified
                if ( this.name in rulesCache || !validator.objectLength($(this).rules()) )
                    return false;
                
                rulesCache[this.name] = true;
                return true;
            })
            .sort(function(a,b){
                return $(a).attr("tabindex") - $(b).attr("tabindex");
            });          
        });

jQuery.extend($.validator.messages, {
	required: "必选字段",  
	remote: "请修正该字段",  
	email: "请输入正确格式的电子邮件",  
	url: "请输入合法的网址",  
	date: "请输入合法的日期",  
	dateISO: "请输入合法的日期 (ISO).",  
	number: "请输入合法的数字",  
	digits: "只能输入整数",  
	creditcard: "请输入合法的信用卡号",
	equalTo: "请再次输入相同的值",
	accept: "请输入拥有合法后缀名的字符串",
	maxlength: jQuery.validator.format("请输入一个长度最多是 {0} 的字符串"),  
	minlength: jQuery.validator.format("请输入一个长度最少是 {0} 的字符串"),  
	rangelength: jQuery.validator.format("请输入一个长度介于 {0} 和 {1} 之间的字符串"),  
	range: jQuery.validator.format("请输入一个介于 {0} 和 {1} 之间的值"),  
	max: jQuery.validator.format("请输入一个最大为 {0} 的值"),  
	min: jQuery.validator.format("请输入一个最小为 {0} 的值")
});


var user_name = $("#inputUsername");
var password = $("#inputPassword");
var password2 = $("#inputPassword2");
var true_name = $("#inputTrueName");
var sex = $('input[name="inputSex"]');
var contact_mobile = $("#inputMobile");
var qqchat = $("#inputQQ");
var email = $("#inputEmail");
function commonSignValidate(postUrl) {
	var result = "";
	if (user_name && user_name.length > 0) {
		var val = $.trim(user_name.val());
		if (val == "") {
			showToast("请输入用户名");
			user_name.focus();
			return false;
		}
		result = "user_name=" + val;
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
		result += "&true_name=" + val;
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
		if (val.length != 11 || !__is_number(val)) {
			showToast("手机号必须为11位纯数字");
			contact_mobile.focus();
			return false;
		}
		result += "&contact_mobile=" + val;
	}
	if (qqchat && qqchat.length > 0) {
		var val = $.trim(qqchat.val());
		if (val != "") {
			if (!__is_number(val)) {
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
			if (!__is_email(val)) {
				showToast("请输入正确的邮箱");
				email.focus();
				return false;
			}
			result += "&email=" + val;
		}
	}

	console.log(result);
	if (result.indexOf('&') == 0) {
		result = result.substr(1);
	}
	console.log(result);

	var postData = result;
	$.ajax({
		type: "POST",
		url: postUrl,
		dataType: "json",
		data: postData,
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

	return true;
}

function __is_number(val) {
	return /^-?(?:\d+|\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(val);
}

function __is_email(val) {
	return /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(val);
}




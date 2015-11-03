<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// 对密码加密
function md5pass($pass, $salt){
	return md5(substr(md5($pass),0,10).$salt);
}


?>
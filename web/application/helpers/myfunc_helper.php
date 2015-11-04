<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// 对密码加密
function md5pass($pass, $salt){
	return md5(substr(md5($pass),0,10).$salt);
}

// 改进版的show_404
function ishow_404($message=NULL, $page = '', $log_error = TRUE) {
	if (isset($message)) {
		$heading = '404 Page Not Found';
		// By default we log this, but allow a dev to skip it
		if ($log_error)
		{
			log_message('error', $heading.': '.$page);
		}
		$_error =& load_class('Exceptions', 'core');
		echo $_error->show_error($heading, $message, 'error_404', 404);
		exit(4); // EXIT_UNKNOWN_FILE
	} else {
		show_404($page, $log_error);
	}
}

?>
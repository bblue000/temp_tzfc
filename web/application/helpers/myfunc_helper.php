<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// 对密码加密
function md5pass($pass, $salt){
	return md5(substr($pass, 0, 10).$salt);
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

// 过滤字段
function array_filter_by_key($key_values, $filter_keys) {
	if (empty($key_values)) {
		return array();
	}
	$result = array();
	foreach ($key_values as $key => $value) {
		if (array_search($key, $filter_keys) === FALSE) {
			continue;
		}
		$result[$key] = $value;
	}
	return $result;
}

?>
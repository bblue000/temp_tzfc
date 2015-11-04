<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// 快捷的判断是否已经登录
function is_login() {
	$CI =& get_instance();
	return $CI->sessionaccess->check_login();
}

// 快捷的清除login信息
function clear_login() {
	$CI =& get_instance();
	return $CI->sessionaccess->clear_user_info();
}


/**
 * User login Session access manager
 */
class sessionaccess {
	// 一般用户登录状态中都要含有一些公共信息
	const COOKIE_EXPIRE = 86500;
	
	protected $CI;
	
    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
        // Assign the CodeIgniter super-object
		$this->CI =& get_instance();
		$this->CI->load->library('session');
    }

    public function check_login(/*$input = NULL*/) {
		$session_user_id = $this->CI->session->userdata('uid');
		return (!isset($session_user_id) || empty($session_user_id));
	}

	/**
	 * 设置cookie
	 */
	public function set_user_info($user_info) {
		$this->CI->session->set_userdata($user_info);
	}
	
	/**
	 * 返回用户相关的数据
	 */
	public function get_user_info() {
		return $this->CI->session->userdata();
	}

	/**
	 * 设置单个的cookie
	 */
	public function set_field($key, $val = NULL) {
		$this->CI->session->set_userdata($key, $val);
	}

	/**
	 * 获取单个的cookie
	 */
	public function get_field($key) {
		return $this->CI->session->userdata($key);
	}

	/**
	 * 清空用户信息
	 */
	public function clear_user_info() {
		$userdata = array(
				'uid',
				'user_name',
				'true_name',
				'gid',
				'group_name'
		);
		$this->CI->session->unset_userdata($userdata);
	}
	
}

?>
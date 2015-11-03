<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SessionAccess {
	// 一般用户登录状态中都要含有一些公共信息

	const KEY_USER_INFO = 'user_info';
	const COOKIE_EXPIRE = 86500;
	
	protected $CI;
	protected $session_user_info;
	
    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
        // Assign the CodeIgniter super-object
		$this->CI =& get_instance();
    }

    public function check_login(/*$input = NULL*/) {
		$session_user_info = get_cookie($this::KEY_USER_INFO, true);
		if (!isset($session_user_info)) {
			return FALSE;
		}
		return TRUE;
	}
	
	public function set_user_info($user_info) {
		set_cookie($this::KEY_USER_INFO, $user_info, $this::COOKIE_EXPIRE);  
	}
	
	public function clear_user_info() {
		delete_cookie($this::KEY_USER_INFO);
	}
	
}

?>
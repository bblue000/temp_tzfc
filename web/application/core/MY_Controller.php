<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * 默认加载了一些辅助类：url；
 *
 */
class MY_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// 需要base url
        $this->load->helper('url');

        // 将用户信息插入到
        $user_info = get_sim_user_info();
        if (isset($user_info) && !empty($user_info)) {
			foreach ($user_info as $key => $value) {
	        	$this->$key = $value;
	        }
        }
        
	}

	public function check_state_common($request_method, $need_login = FALSE) {
		if (isset($request_method)) {
			$cur_req_method = $this->input->method(TRUE);
			$request_method = strtoupper($request_method);
			if ($cur_req_method != $request_method) {
				ishow_404('required method is \''.$request_method.'\', but now is \''.$cur_req_method.'\'');
			}
		}
		if ($need_login) {
			if (!is_login()) {
				// 如果没有登录
				redirect(base_url('admin/login'));
			}
		}
	}

	public function check_state_api($request_method) {
		if (isset($request_method)) {
			$cur_req_method = $this->input->method(TRUE);
			$request_method = strtoupper($request_method);
			if ($cur_req_method != $request_method) {
				echo json_encode(common_result(404, 'Not Found'));
				exit(EXIT_UNKNOWN_FILE);
			}
		}
	}

	public function check_param($param_name) {
		$val = $this->input->get_post($param_name, TRUE);
		if (!isset($val)) {
			ishow_error('No param \''.$param_name.'\'', 'You should provide \''.$param_name.'\' as a parameter', 400);
		}
		return $val;
	}

	public function check_param_api($param_name) {
		$val = $this->input->get_post($param_name, TRUE);
		if (!isset($val)) {
			echo json_encode(common_result(400, 'No param \''.$param_name.'\'', 'You should provide \''.$param_name.'\' as a parameter'));
			exit(EXIT_USER_INPUT);
		}
		return $val;
	}

}

?>
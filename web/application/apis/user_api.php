<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 用户相关的API，包括登录，注册，修改密码，修改信息；
 */
class user_api extends API {
	
	protected $apicode = array(

		// 登录时API
		90001 => '用户名为空',
		90002 => '密码为空',
		90003 => '用户不存在',
		90004 => '用户名与密码不匹配',
		90005 => '验证码为空',

		90101 => '注册信息缺失',
		90102 => '用户名已存在',
		90103 => '注册失败',

		90201 => '密码修改失败',

		90301 => '用户信息更新失败'

	);

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	/**
	 * 用户登录
	 */
	public function login($user_name, $user_pass) {
		if (!isset($user_name)) {
			return $this->ex(90001);
		}
		if (!isset($user_pass)) {
			return $this->ex(90002);
		}

		$query_user = $this->user_model->get_by_name($user_name);
		if (empty($query_user)) {
			return $this->ex(90003);
		}
		if (md5pass($user_pass, $query_user['salt']) != $query_user['password']) {
			return $this->ex(90004);
		} else {
			return $this->ok(createLoginData($query_user));
		}
	}

	/**
	 * 用户注册
	 */
	public function register($user) {
		if (!isset($user) || empty($user)) {
			return $this->ex(90101);
		}
		if (!isset($user['user_name']) || empty($user['user_name'])) {
			return $this->ex(90001);
		}
		if (!isset($user['password']) || empty($user['password'])) {
			return $this->ex(90002);
		}

		// check exist
		// 检测用户名有没有注册过
		if ($this->exist_by_name($user['user_name'])) {
			return $this->ex(90102);
		}

		// do set new user
		$insert_result = $this->addData($user);
		if (!$insert_result) {
			return $this->ex(90103);
		}
		// 如果成功返回login数据
		return login($user['user_name'], $user['password']);
	}



	// *************************************
	// 修改密码
	// *************************************
	/**
	 * 修改密码
	 *
	 * @param	string	$user_pass 用户修改后的密码
	 * @param	mixed	$user 当前用户信息
	 */
	public function change_pass($uid, $user_pass) {
		if (!is_login()) {
			return $this->un_login();
		}
		if (!isset($user_pass) || empty($user_pass)) {
			return $this->ex(90002);
		}
		// 尝试更新数据库
		$update_result = $this->update_pass_by_id($uid, $user_pass);
		if (!$update_result) {
			return $this->ex(90201);
		}
		return $this->login();
	}


	// *************************************
	// 修改个人信息
	// *************************************
	public function update_info($uid, $update_pair) {
		if (!is_login()) {
			return $this->un_login();
		}
		if (!isset($update_pair) || !is_array($update_pair)) {
			return $this->ok();
		}
		// 更新数据库
		$this->setTable($this::TABLE_NAME);
		$update_result = $this->editData(array('uid' => $uid), $update_pair);
		if ($update_result) {
			return $this->login();
		} else {
			return common_result_use_pair($this::$result_update_info_failed_unknown);
		}
	}

	/**
	 * 注销
	 */
	public function logout() {
		clear_login();
		return $this->ok();
	}
	
	private function createLoginData($query_user) {
		return array(
					'user_name' => $query_user['user_name'], 
					'true_name' => $query_user['true_name'],
					'email' => $query_user['email'],
					'true_name' => $query_user['true_name'],
					'true_name' => $query_user['true_name'],
					'true_name' => $query_user['true_name'],
					);
	}
}


?>
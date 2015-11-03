<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 用户相关的API，包括登录，注册，修改密码，修改信息；
 */
class user_model extends MY_Model {
	
	// 表名
	const TABLE_NAME = 'tab_user';
	
	public function __construct() {
		parent::__construct();
	}

	// *************************************
	// 登录
	// *************************************
	static $result_login_failed_non_user_name = array(
		'code' => 90001, 
		'msg' => '用户名为空'
	);
	static $result_login_failed_non_user_pwd = array(
		'code' => 90002, 
		'msg' => '密码为空'
	);
	static $result_login_failed_err_user_name = array(
		'code' => 90003, 
		'msg' => '用户名不存在'
	);
	static $result_login_failed_err_user_pwd = array(
		'code' => 90004, 
		'msg' => '用户名与密码不匹配'
	);

	/**
	 * 用户登录
	 */
	public function login($user_name, $user_pass) {
		if (!isset($user_name)) {
			return common_result_use_pair($this::$result_login_failed_non_user_name);
		} else if (!isset($user_pass)) {
			return common_result_use_pair($this::$result_login_failed_non_user_pwd);
		} else {
			$this->setTable($this::TABLE_NAME);
			$query_user = $this->getSingle(array('user_name'=>$user_name));
			if (!isset($query_user['password'])) {
				return common_result_use_pair($this::$result_login_failed_err_user_name);
			}
			if (md5pass($user_pass, $query_user['salt']) != $query_user['password']) {
				return common_result_use_pair($this::$result_login_failed_err_user_pwd);
			} else {
				return common_result_ok(createLoginData($query_user));
			}
		}
	}

	// *************************************
	// 注册
	// *************************************
	static $result_register_failed_non_user = array(
		'code' => 90101, 
		'msg' => '用户名或密码为空'
	);
	static $result_register_failed_non_user_name = array(
		'code' => 90102, 
		'msg' => '用户名为空'
	);
	static $result_register_failed_non_user_pwd = array(
		'code' => 90103, 
		'msg' => '密码为空'
	);
	static $result_register_failed_exist_user = array(
		'code' => 90102, 
		'msg' => '用户名已存在'
	);
	static $result_register_failed_unknown = array(
		'code' => 90199, 
		'msg' => '注册失败'
	);

	/**
	 * 用户注册
	 */
	public function register($user) {
		if (!isset($user) || empty($user)) {
			return common_result_use_pair($this::$result_register_failed_non_user);
		}
		if (!isset($user['user_name']) || empty($user['user_name'])) {
			return common_result_use_pair($this::$result_register_failed_non_user_name);
		}
		if (!isset($user['password']) || empty($user['password'])) {
			return common_result_use_pair($this::$result_register_failed_non_user_pwd);
		}

		// check exist
		// 检测用户名有没有注册过
		$this->setTable($this::TABLE_NAME);
		$query_user = $this->getSingle(array('user_name'=>$user['user_name']));
		if (isset($query_user)) {
			return common_result_use_pair($this::$result_register_failed_exist_user);
		}

		// do set new user
		$insert_result = $this->addData($user);
		if (!$insert_result) {
			return common_result_use_pair($this::$result_register_failed_unknown);
		}
		// 如果成功返回login数据
		return login($user['user_name'], $user['password']);
	}



	// *************************************
	// 修改密码
	// *************************************
	static $result_change_pass_failed_non_user = array(
		'code' => 90201, 
		'msg' => '用户未登录'
	);
	static $result_change_pass_failed_non_pass = array(
		'code' => 90202, 
		'msg' => '密码为空'
	);
	static $result_change_pass_failed_unknown = array(
		'code' => 90299, 
		'msg' => '密码修改失败'
	);

	/**
	 * 修改密码
	 *
	 * @param	string	$user_pass 用户修改后的密码
	 * @param	mixed	$user 当前用户信息
	 */
	public function change_pass($uid, $user_pass) {
		if (!isset($uid) || empty($uid)) {
			return common_result_use_pair($this::$result_change_pass_failed_non_user);
		} else if (!isset($user_pass) || empty($user_pass)) {
			return common_result_use_pair($this::$result_change_pass_failed_non_pass);
		} else {
			$this->setTable($this::TABLE_NAME);
			$update_result = $this->editData(array('uid' => $uid), $update_pair);
			return $this->login();
		}
	}



	// *************************************
	// 修改个人信息
	// *************************************
	static $result_update_info_failed_non_user = array(
		'code' => 90301, 
		'msg' => '用户名未登录'
	);
	static $result_update_info_failed_unknown = array(
		'code' => 90399, 
		'msg' => '用户信息更新失败'
	);

	public function update_info($uid, $update_pair) {
		if (!isset($uid) || empty($uid)) {
			return common_result_use_pair($this::$result_update_info_failed_non_user);
		} else if (!isset($update_pair) || !is_array($update_pair)) {
			return common_result_ok();
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

	/**
	 * 暂时没做任何处理
	 */
	public function logout() {
		return common_result_ok();
	}

	
}

?>
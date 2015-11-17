<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 管理用户
class adminuser extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function edit() {
		$this->check_state_common('GET', TRUE);
		$this->load->view('admin/user/edit-user', $this);
	}

	public function edit_ajax() {
		$this->check_state_api('POST');

		// 获取所有的数据
		$post = $this->input->post(NULL, TRUE);
		$this->load->api('user_api');
		$api_result = $this->user_api->update_info($post);
		if (is_ok_result($api_result)) {
			$api_result['data'] = base_url('adminuser/edit');
		}
		echo json_encode($api_result);
	}

	public function edit_password() {
		$this->check_state_common('GET', TRUE);
		$this->load->view('admin/user/edit-password', $this);
	}

	public function edit_password_ajax() {
		$this->check_state_api('POST');

		// 获取所有的数据
		$post = $this->input->post(NULL, TRUE);
		if (isset($post['password'])) {
			$user_pass = $post['password'];
		}
		$this->load->api('user_api');
		$api_result = $this->user_api->change_pass($user_pass);
		if (is_ok_result($api_result)) {
			$api_result['data'] = base_url('admin');
		}
		echo json_encode($api_result);
	}

	// public function add() {
	// 	$this->check_state_common('GET', TRUE);
	// }

	// public function del() {
	// 	$this->check_state_common('GET', TRUE);

	// 	$post = $this->input->post('id',TRUE);
	// 	$id = !empty($post) ? $post : array($this->input->get('id',TRUE));
	// 	if (is_array($id) && in_array('1',$id)) {
	// 		$tag = false;
	// 	} 
	// }

}

?>
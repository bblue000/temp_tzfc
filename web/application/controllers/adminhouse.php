<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 管理用户的房源
class adminhouse extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('house');
	}

	public function index() {
		$this->check_state_common('GET', TRUE);


		$uid = get_session_uid();

		$this->load->api('adminhouse_api');
		$sell_list_result = $this->adminhouse_api->sell_list($uid);

		$this->houses = $sell_list_result['data'];
		$this->load->view('admin/house-index', $this);
	}

	public function edit() {
		$this->check_state_common('GET', TRUE);

		// 编辑数据

		$this->load->view('admin/edit-house', $this);
	}

	public function edit_ajax() {
		$this->check_state_api('POST');

		
	}

	public function del() {
		$this->check_state_common('POST', TRUE);
		$hid = $this->check_param('id');
		if (is_array($hid)) {

		}
		print_r($hid);

		// 删除数据


		// $this->load->view('admin/del-house', $this);
	}

	public function add() {
		$this->check_state_common('GET', TRUE);
		$this->load->view('admin/add-house', $this);
	}

	public function add_sell() {
		$this->check_state_common('GET', TRUE);
		loadCommonInfos($this);
		$this->load->view('admin/house-add-sell', $this);
	}

	public function add_sell_ajax() {
		$this->check_state_api('POST');
		// 获取所有的数据
		$post = $this->input->post(NULL,TRUE);

		$post['uid'] = get_session_uid();

		$this->load->api('adminhouse_api');
		$api_result = $this->adminhouse_api->add_sell($post);
		if (is_ok_result($api_result)) {
			$api_result['data'] = base_url('adminhouse/add_sell');
		}
		echo json_encode($api_result);
	}

}

?>
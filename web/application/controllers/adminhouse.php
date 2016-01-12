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

		// 获取当前分类
		$this->generate_cat_kw();
		$uid = get_session_uid();

		if ($this->cat == 0) {
			$this->load->api('adminsellhouse_api');
			$list_result = $this->adminsellhouse_api->sell_list($uid, $this->cat);
		} else {
			$this->load->api('adminrenthouse_api');
			$list_result = $this->adminrenthouse_api->rent_list($uid, $this->cat);
		}
		$this->houses = $list_result['data'];
		$this->load->view('admin/house/house-index', $this);
	}

	private function generate_cat_kw() {
		$cat = $this->input->get_post('cat', TRUE);
		if (!isset($cat) || empty($cat) || intval($cat) == 0) {
			$cat = 0;
		} else {
			$cat = 1;
		}
		$this->cat = $cat; // save cat variable

		// 获取当前关键词
		$kw = $this->input->get_post('kw', TRUE);
		if (!isset($kw) || empty($kw)) {
			$kw = '';
		}
		$this->kw = $kw;
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


	// **************************************************
	// **************************************************
	// sell house
	// **************************************************
	// **************************************************
	public function add_sell() {
		$this->check_state_common('GET', TRUE);
		loadCommonInfos($this);
		$this->load->view('admin/house/add-sell', $this);
	}

	public function add_sell_ajax() {
		$this->check_state_api('POST');
		// 获取所有的数据
		$post = $this->input->post(NULL,TRUE);

		$uid = get_session_uid();

		$this->load->api('adminsellhouse_api');
		$api_result = $this->adminsellhouse_api->add_sell($uid, $post);
		if (is_ok_result($api_result)) {
			$api_result['data'] = base_url('adminhouse/add_sell');
		}
		echo json_encode($api_result);
	}

	public function edit_sell() {
		$this->check_state_common('GET', TRUE);

		$hid = $this->check_param('hid');
		$uid = get_session_uid();

		$this->load->api('adminsellhouse_api');
		$api_result = $this->adminsellhouse_api->sell_item($uid, $hid);
		if (is_ok_result($api_result)) {
			loadCommonInfos($this);
			$this->house = $api_result['data'];
			$this->load->view('admin/house/edit-sell', $this);
		} else {
			redirect(base_url('adminhouse/index'));
		}
	}

	public function edit_sell_ajax() {
		$this->check_state_api('POST');
		// 获取所有的数据
		$post = $this->input->post(NULL,TRUE);

		$uid = get_session_uid();
		$hid = $this->check_param('hid');

		$this->load->api('adminsellhouse_api');
		$api_result = $this->adminsellhouse_api->update_sell($uid, $hid, $post);
		if (is_ok_result($api_result)) {
			$api_result['data'] = base_url('adminhouse/edit_sell').'?hid='.$hid;			
		}
		echo json_encode($api_result);
	}

	public function del_sell_ajax() {
		$this->check_state_api('POST');

		$uid = get_session_uid();
		$hid = $this->check_param('hid');

		$this->load->api('adminsellhouse_api');
		$api_result = $this->adminsellhouse_api->del_sell($uid, $hid);
		if (is_ok_result($api_result)) {
			$this->generate_cat_kw();
			$api_result['data'] = base_url('adminhouse').'?cat='.$this->cat.'&kw='.$this->kw;
		}
		echo json_encode($api_result);
	}



	// **************************************************
	// **************************************************
	// rent house
	// **************************************************
	// **************************************************
	public function add_rent() {
		$this->check_state_common('GET', TRUE);
		loadRentCommonInfos($this);
		$this->load->view('admin/house/add-rent', $this);
	}

	public function add_rent_ajax() {
		$this->check_state_api('POST');
		// 获取所有的数据
		$post = $this->input->post(NULL,TRUE);

		$uid = get_session_uid();

		$this->load->api('adminrenthouse_api');
		$api_result = $this->adminrenthouse_api->add_rent($uid, $post);
		if (is_ok_result($api_result)) {
			$api_result['data'] = base_url('adminhouse/add_rent');
		}
		echo json_encode($api_result);
	}

	public function edit_rent() {
		$this->check_state_common('GET', TRUE);

		$hid = $this->check_param('hid');
		$uid = get_session_uid();

		$this->load->api('adminrenthouse_api');
		$api_result = $this->adminrenthouse_api->rent_item($uid, $hid);
		if (is_ok_result($api_result)) {
			loadRentCommonInfos($this);
			$this->house = $api_result['data'];
			$this->load->view('admin/house/edit-sell', $this);
		} else {
			redirect(base_url('adminhouse/index'));
		}
	}

	public function edit_rent_ajax() {
		$this->check_state_api('POST');
		// 获取所有的数据
		$post = $this->input->post(NULL,TRUE);

		$uid = get_session_uid();
		$hid = $this->check_param('hid');

		$this->load->api('adminrenthouse_api');
		$api_result = $this->adminrenthouse_api->update_rent($uid, $hid, $post);
		if (is_ok_result($api_result)) {
			$api_result['data'] = base_url('adminhouse/edit_rent').'?hid='.$hid;			
		}
		echo json_encode($api_result);
	}

	public function del_rent_ajax() {
		$this->check_state_api('POST');

		$uid = get_session_uid();
		$hid = $this->check_param('hid');

		$this->load->api('adminrenthouse_api');
		$api_result = $this->adminrenthouse_api->del_sell($uid, $hid);
		if (is_ok_result($api_result)) {
			$this->generate_cat_kw();
			$api_result['data'] = base_url('adminhouse').'?cat='.$this->cat.'&kw='.$this->kw;
		}
		echo json_encode($api_result);
	}

}

?>
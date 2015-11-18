<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admincommon extends MY_Controller {
	
	// 后台的管理登录界面
	const ADMIN_LOGIN = 'admin/user/login';
	
	public function __construct() {
		parent::__construct();
	}
	
	// 进入管理小区的界面
	public function community() {
		$this->check_state_common('GET', TRUE);

		$this->load->api('admincommon_api');
		$result = $this->admincommon_api->community_list();
		if (is_ok_result($result)) {
			$this->communitys = $result['data'];
			$this->load->view('admin/common/community', $this);
		} else {
			ishow_error_msg($result['msg']);
		}
	}

	// 新增小区
	public function add_community_ajax() {
		$this->check_state_api('POST');


	}
	
	// 进入管理区域的界面
	public function area() {
		$this->check_state_common('GET', TRUE);

		$this->load->api('admincommon_api');
		$result = $this->admincommon_api->area_list();
		if (is_ok_result($result)) {
			$this->areas = $result['data'];
			$this->load->view('admin/common/area', $this);
		} else {
			ishow_error_msg($result['msg']);
		}
	}

	// 新增区域
	public function add_area_ajax() {
		$this->check_state_api('POST');


	}

}


?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class house_attrs extends MY_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}
	
	public function index() {
		$this->check_state_common('GET', TRUE);
		// 如果已经登录，则显示当前用户能够看到的管理界面
		$this->load->view('admin/house-attrs-index', $this);
	}
}

?>
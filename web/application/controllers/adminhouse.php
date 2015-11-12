<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 管理用户的房源
class adminhouse extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->check_state_common('GET', TRUE);

		$houses = array(
			array(
				'hid' => 1,
				'title' => '我是中国人，我爱中国，思密达',
				'house_type' => '三室一厅',
				'create_time' => '2015-10-12 21:21:23'
			),
			array(
				'hid' => 2,
				'title' => '我是中国人，我爱中国，思密达; 我是中国人，我爱中国，思密达',
				'house_type' => '三室一厅',
				'create_time' => '2015-10-12 21:21:23'
			),
			array(
				'hid' => 3,
				'title' => '我是中国人，我爱中国，思密达; 我是中国人，我爱中国，思密达; 我是中国人，我爱中国，思密达',
				'house_type' => '三室一厅',
				'create_time' => '2015-10-12 21:21:23'
			)
		);
		$this->houses = $houses;
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
		$this->check_state_common('GET', TRUE);
		$hid = $this->check_param('hid');

		// 删除数据


		$this->load->view('admin/del-house', $this);
	}

	public function add() {
		$this->check_state_common('GET', TRUE);
		$this->load->view('admin/add-house', $this);
	}

}

?>
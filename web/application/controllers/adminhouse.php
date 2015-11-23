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
		$this->loadCommonInfos();
		$houses = array(
			array(
				'hid' => 1,
				'title' => '我是中国人，我爱中国，思密达',
				'rooms' => '3',
				'halls' => '1',
				'bathrooms' => '1',
				'create_time' => '2015-10-12 21:21:23',
				'update_time' => '2015-10-12 21:21:23',
			),
			array(
				'hid' => 2,
				'title' => '我是中国人，我爱中国，思密达; 我是中国人，我爱中国，思密达',
				'rooms' => '3',
				'halls' => '1',
				'bathrooms' => '1',
				'create_time' => '2015-10-12 21:21:23',
				'update_time' => '2015-10-12 21:21:23'
			),
			array(
				'hid' => 3,
				'title' => '我是中国人，我爱中国，思密达; 我是中国人，我爱中国，思密达; 我是中国人，我爱中国，思密达',
				'rooms' => '3',
				'halls' => '1',
				'bathrooms' => '1',
				'create_time' => '2015-10-12 21:21:23',
				'update_time' => '2015-10-12 21:21:23'
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
		$this->loadCommonInfos();
		$this->load->view('admin/house-add-sell', $this);
	}

	public function add_sell_ajax() {
		$this->check_state_api('POST');
		// 获取所有的数据
		$post = $this->input->post(NULL,TRUE);

		print_r($post['community']);
		print_r($post['details']);
	}


	private function loadCommonInfos() {
		$this->load->api('admincommon_api');
		$communitys_result = $this->admincommon_api->community_list();
		if (is_ok_result($communitys_result)) {
			$this->communitys = arrayofmap_to_keymap($communitys_result['data'], 'cid');
		}

		$areas_result = $this->admincommon_api->area_list();
		if (is_ok_result($areas_result)) {
			$this->areas = arrayofmap_to_keymap($areas_result['data'], 'aid');
		}

		$this->house_types = array(
			1 => '普通住宅',
			2 => '公寓',
			3 => '别墅',
			4 => '平房',
			5 => '其他'
		);

		$this->house_decors = array(
			1 => '毛胚',
			2 => '简装',
			3 => '中装',
			4 => '高装',
			5 => '豪装'
		);

		$this->house_orientations = array(
			1 => '东',
			2 => '南',
			3 => '西',
			4 => '北',
			5 => '东西',
			6 => '南北',
			7 => '东南',
			8 => '西南',
			9 => '东北',
			10 => '西北'
		);

		$this->rights_lens = array(
			1 => '70年产权',
			2 => '50年产权',
			3 => '40年产权'
		);

		$this->rights_types = array(
			1 => '商品房',
			2 => '商住两用',
			3 => '经济适用房',
			4 => '使用权',
			5 => '公房'
		);

	}
}

?>
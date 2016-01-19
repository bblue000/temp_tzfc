<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class portal extends MY_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('house');
	}

	public function index() {
		$this->check_state_common('GET');
		redirect(base_url('sellhouse'));
	}

	// 出售房源
	public function sellhouse($hid) {
		$this->check_state_common('GET');

		if (isset($hid)) {
			$this->sellhouseitem($hid);
		} else {
			$this->sellhouselist();
		}
	}

	private function sellhouselist() {
		$this->cat = HOUSE_CAT_SELL;
		loadCommonInfos($this);
		$this->load->api('adminsellhouse_api');
		$list_result = $this->adminsellhouse_api->sell_list($uid, $this->kw);
		$this->load->view('portal/index', $this);
	}

	private function sellhouseitem($hid) {
		$this->cat = HOUSE_CAT_SELL;
		loadCommonInfos($this);
		$this->load->view('portal/sell-info', $this);
	}








	// ****************************************
	// ****************************************
	// 出租房源信息
	// ****************************************
	// ****************************************
	public function renthouse($hid) {
		$this->check_state_common('GET');

		if (isset($hid)) {
			$this->renthouseitem($hid);
		} else {
			$this->renthouselist();
		}
	}

	private function renthouselist() {
		$this->cat = HOUSE_CAT_RENT;
		
		$page = $this->input->get_post('page', TRUE);
		if (!isset($page) || !is_int($page) || $page < 0) {
			$page = 0;
		}

		$kw = $this->input->get_post('kw', TRUE);
		$uid = $this->input->get_post('uid', TRUE);

		$extra_conditions = NULL;
		if (isset($uid)) {
			$extra_conditions = array();
			$extra_conditions['uid'] = $uid;
		}

		$this->load->model('renthouse_model');
		$total = $this->renthouse_model->num_rows($kw, $extra_conditions);

		$this->pagearr = array(
			'currentpage' => $page,
			'totalnum' => $total,
			'pagenum' => HOUSE_LIST_PAGE_SIZE
		);

		if ($total > 0) {
			loadRentCommonInfos($this);
			// 组装成界面需要的格式
			// 查询
			$renthouses = $this->renthouse_model->get_page_data(HOUSE_LIST_PAGE_SIZE, $kw, $extra_conditions);
			if (isset($renthouses) && !empty($renthouses)) {
				$this->renthouses = array();
				// 处理数据
				foreach ($renthouses as $house) {
					if (isset($house['cid']) && isset($this->communitys['cid'])) {
						$this->communitys['cid']['cname'];
					} else {

					}
				}
			}
		}

		$this->kw = $kw;
		$this->load->view('portal/index', $this);
	}

	private function renthouseitem($hid) {
		$this->cat = HOUSE_CAT_RENT;
		loadRentCommonInfos($this);
		$this->load->view('portal/rent-info', $this);
	}

}

?>
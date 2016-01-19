<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sellhouse extends MY_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('house');
	}

	public function index($hid) {
		if (isset($hid)) {
			$this->sell_item($hid);
		} else {
			$this->sell_list();
		}
	}

	private function sell_list() {
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

		$this->load->model('sellhouse_model');
		$total = $this->sellhouse_model->num_rows($kw, $extra_conditions);

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
				// 处理数据
				foreach ($renthouses as $house) {
					$parsed_house = array();
					if (isset($house['cid']) && isset($this->communitys['cid'])) {
						$house['community'] = $this->communitys['cid']['cname'];
					} else if (!isset($house['community']) || empty($house['community'])) {
						$house['community'] = '-';
					}


					array_push($parsed_houses, $parsed_house);
				}
			}
		}

		$this->kw = $kw;
		$this->load->view('portal/sell-list', $this);
	}

	public function sell_item($hid) {
		$this->cat = HOUSE_CAT_SELL;
		loadCommonInfos($this);


		$this->load->model('sellhouse_model');
		$total = $this->sellhouse_model->get_page_data(1, 1);
		print_r($total);
		$this->load->view('portal/sell-info', $this);

	}
}

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class renthouse extends MY_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('house');
		$this->load->helper('houseparse');
	}

	public function index($hid = NULL) {
		if (isset($hid)) {
			$this->rent_item($hid);
		} else {
			$this->rent_list();
		}
	}

	private function rent_list() {
		// 分类信息
		$this->cat = HOUSE_CAT_SELL;

		$extra_conditions = array();
		
		// 分页相关的参数
		$page_size = HOUSE_LIST_PAGE_SIZE;
		$page = $this->input->get_post('page', TRUE);
		if (!isset($page) || !is_int($page) || $page <= 0) {
			$page = 1;
		}
		$offset = ($page - 1) * $page_size;

		// $extra_conditions['currentpage'] = $page;

		// 搜索参数
		$kw = $this->input->get_post('kw', TRUE);
		$uid = $this->input->get_post('uid', TRUE);

		if (isset($uid)) {
			$extra_conditions['uid'] = $uid;
		}

		$this->load->model('renthouse_model');
		$total = $this->renthouse_model->num_rows($kw, $extra_conditions);

		$this->pagearr = array(
			'currentpage' => $page,
			'totalnum' => $total,
			'pagenum' => $page_size
		);

		$this->extra_conditions = $extra_conditions;

		$result_num = 0;
		if ($total > 0) {
			loadRentCommonInfos($this);
			// 组装成界面需要的格式
			// 查询
			$renthouses = $this->renthouse_model->get_page_data($page_size, $offset, $kw, $extra_conditions);
			if (isset($renthouses) && !empty($renthouses)) {
				$parsed_houses = array();
				// 处理数据
				foreach ($renthouses as $house) {
					$parsed_houses[] = parse_rent_list_item($this, $house);
				}
				$this->houses = $parsed_houses;
				$result_num = count($this->houses);
				// print_r($this->houses);
			}
		}

		$this->kw = $kw;
		$this->result_num = $result_num;
		$this->load->view('portal/sell-list', $this);
	}

	private function rent_item($hid) {
		if (!isset($hid) || !is_numeric($hid)) {
			ishow_404('请指定房源');
		}

		$this->load->model('sellhouse_model');
		$renthouse = $this->sellhouse_model->get_single_by_hid($hid);
		if (!isset($renthouse) || empty($renthouse)) {
			ishow_404('找不到房源');
		}

		$this->cat = HOUSE_CAT_SELL;
		loadRentCommonInfos($this);
		$this->house = parse_rent_house_item($this, $renthouse);
		// print_r($this->house);
		$this->load->view('portal/sell-info', $this);
	}
}

?>
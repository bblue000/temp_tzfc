<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 房源相关的API
 */
class adminrenthouse_api extends API {

	protected $apicode = array(
		11001 => '未选择小区',
		11002 => '标题为空',
		11003 => '未指定户型',
		11004 => '未指定面积',
		11005 => '未指定总价',
		11006 => '新增出租房源失败',

		11007 => '未指定操作用户',
		11008 => '未指定删除的房源',
		11009 => '删除房源失败',

	);

	public function __construct() {
		parent::__construct();

		$this->load->model('adminrenthouse_model');
	}

	// **************************************************
	// **************************************************
	// rent house
	// **************************************************
	public function rent_list($uid, $kw = NULL) {
		if (!is_login()) { return $this->un_login(); }

		if (!isset($uid)) {
			return $this->ex(11007);
		}

		$rent_houses = $this->adminrenthouse_model->get_by_kw($uid, $kw);
		return $this->ok($rent_houses);
	}

	public function add_rent($house, $return_list = FALSE) {
		if (!is_login()) { return $this->un_login(); }

		$code = $this->validateAddRent($house);
		if ($code != 200) {
			return $this->ex($code);
		}

		$insert_result = $this->adminrenthouse_model->add($house);
		if (!$insert_result) {
			log_message('error', 'add_rent db failed');
			return $this->ex(11006);
		}
		
		if ($return_list) {
			return $this->rent_list();
		}
		return $this->ok();
	}

	public function del_rent($hid, $return_list = FALSE) {
		if (!is_login()) { return $this->un_login(); }

		if (!isset($hid)) {
			return $this->ex(11008);
		}
		$del_result = $this->adminrenthouse_model->del_by_id($hid);
		if (!$del_result) {
			log_message('error', 'del_rent db failed');
			return $this->ex(11009);
		}
		
		if ($return_list) {
			return $this->rent_list();
		}
		return $this->ok();
	}

	private function validateAddRent($house) {
		if (!isset($house['cid']) && !isset($house['community'])) {
			return 11001;
		}
		if (!isset($house['title'])) {
			return 11002;
		}
		if (!isset($house['rooms'])) {
			return 11003;
		}
		if (!isset($house['size'])) {
			return 11004;
		}
		if (!isset($house['price'])) {
			return 11005;
		}
		return 200;
	}


}


?>
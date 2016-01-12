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

		11010 => '未指定更新的房源',
		11011 => '更新房源失败',


		11012 => '未指定',
	);

	public function __construct() {
		parent::__construct();

		$this->load->model('renthouse_model');
	}

	// **************************************************
	// **************************************************
	// rent house
	// **************************************************
	public function rent_item($uid, $kw = NULL) {
		if (!is_login()) { return $this->un_login(); }

		if (!isset($uid)) { return $this->ex(11007); }

		$rent_house = $this->renthouse_model->get_by_hid_by_uid($uid, $hid);
		return $this->ok($rent_house);
	}

	public function rent_list($uid, $kw = NULL) {
		if (!is_login()) { return $this->un_login(); }

		if (!isset($uid)) { return $this->ex(11007); }

		$rent_houses = $this->renthouse_model->get_by_kw_by_uid($uid, $kw);
		return $this->ok($rent_houses);
	}

	public function add_rent($uid, $house, $return_list = FALSE) {
		if (!is_login()) { return $this->un_login(); }

		if (!isset($uid)) { return $this->ex(10007); }

		$code = $this->validateAddRent($house);
		if ($code != 200) { return $this->ex($code); }

		isset($house['uid']) OR $house['uid'] = $uid;

		$insert_result = $this->renthouse_model->add($house);
		if (!$insert_result) {
			log_message('error', 'add_rent db failed');
			return $this->ex(11006);
		}
		
		if ($return_list) { return $this->rent_list(); }

		return $this->ok();
	}

	public function update_rent($uid, $hid, $house, $return_list = FALSE) {
		if (!is_login()) { return $this->un_login(); }

		if (!isset($uid)) { return $this->ex(11007); }
		if (!isset($hid)) { return $this->ex(11010); }

		if (isset($house) && !empty($house)) {
			isset($house['uid']) OR $house['uid'] = $uid;
			$update_result = $this->renthouse_model->update_by_hid($house);
			if (!$update_result) {
				log_message('error', 'update_rent db failed');
				return $this->ex(11011);
			}
		}
		
		if ($return_list) { return $this->sell_list(); }

		return $this->ok();
	}

	public function del_rent($uid, $hid, $return_list = FALSE) {
		if (!is_login()) { return $this->un_login(); }

		if (!isset($uid)) { return $this->ex(11007); }
		if (!isset($hid) || empty($hid)) { return $this->ex(11008); }

		$del_result = $this->renthouse_model->del_by_hid($hid);
		if (!$del_result) {
			log_message('error', 'del_rent db failed');
			return $this->ex(11009);
		}
		
		if ($return_list) { return $this->sell_list(); }

		return $this->ok();
	}

	// 新增房源验证必要的字段
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
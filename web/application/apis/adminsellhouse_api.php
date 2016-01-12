<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 房源相关的API
 */
class adminsellhouse_api extends API {

	protected $apicode = array(
		10001 => '未选择小区',
		10002 => '标题为空',
		10003 => '未指定户型',
		10004 => '未指定面积',
		10005 => '未指定总价',
		10006 => '新增出售房源失败',

		10007 => '未指定操作用户',
		10008 => '未指定删除的房源',
		10009 => '删除房源失败',
		
		10010 => '未指定更新的房源',
		10011 => '更新房源失败',

	);

	public function __construct() {
		parent::__construct();

		$this->load->model('sellhouse_model');
	}

	// **************************************************
	// **************************************************
	// sell house
	// **************************************************
	// **************************************************
	public function sell_item($uid, $hid) {
		if (!is_login()) { return $this->un_login(); }

		if (!isset($uid)) { return $this->ex(10007); }

		$sell_house = $this->sellhouse_model->get_by_hid_by_uid($uid, $hid);
		return $this->ok($sell_house);
	}

	public function sell_list($uid, $kw = NULL) {
		if (!is_login()) { return $this->un_login(); }

		if (!isset($uid)) { return $this->ex(10007); }

		$sell_houses = $this->sellhouse_model->get_by_kw_by_uid($uid, $kw);
		return $this->ok($sell_houses);
	}

	public function add_sell($uid, $house, $return_list = FALSE) {
		if (!is_login()) { return $this->un_login(); }

		if (!isset($uid)) { return $this->ex(10007); }

		$code = $this->validateAddSell($house);
		if ($code != 200) { return $this->ex($code); }

		isset($house['uid']) OR $house['uid'] = $uid;

		$insert_result = $this->sellhouse_model->add($house);
		if (!$insert_result) {
			log_message('error', 'add_sell db failed');
			return $this->ex(10006);
		}
		
		if ($return_list) { return $this->sell_list(); }

		return $this->ok();
	}

	public function update_sell($uid, $hid, $house, $return_list = FALSE) {
		if (!is_login()) { return $this->un_login(); }

		if (!isset($uid)) { return $this->ex(10007); }
		if (!isset($hid)) { return $this->ex(10010); }

		if (isset($house) && !empty($house)) {
			isset($house['uid']) OR $house['uid'] = $uid;
			$update_result = $this->sellhouse_model->update_by_hid($house);
			if (!$update_result) {
				log_message('error', 'update_sell db failed');
				return $this->ex(10011);
			}
		}
		
		if ($return_list) { return $this->sell_list(); }

		return $this->ok();
	}

	public function del_sell($uid, $hid, $return_list = FALSE) {
		if (!is_login()) { return $this->un_login(); }

		if (!isset($uid)) { return $this->ex(10007); }
		if (!isset($hid) || empty($hid)) { return $this->ex(10008); }

		$del_result = $this->sellhouse_model->del_by_hid($hid);
		if (!$del_result) {
			log_message('error', 'del_sell db failed');
			return $this->ex(10009);
		}
		
		if ($return_list) { return $this->sell_list(); }

		return $this->ok();
	}

	// 新增房源验证必要的字段
	private function validateAddSell($house) {
		if (!isset($house['cid']) && !isset($house['community'])) {
			return 10001;
		}
		if (!isset($house['title'])) {
			return 10002;
		}
		if (!isset($house['rooms'])) {
			return 10003;
		}
		if (!isset($house['size'])) {
			return 10004;
		}
		if (!isset($house['price'])) {
			return 10005;
		}
		return 200;
	}


}


?>
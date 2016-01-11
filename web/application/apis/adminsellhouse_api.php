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

	);

	public function __construct() {
		parent::__construct();

		$this->load->model('adminsellhouse_model');
	}

	// **************************************************
	// **************************************************
	// sell house
	// **************************************************
	// **************************************************
	public function sell_item($uid, $hid) {
		if (!is_login()) { return $this->un_login(); }

		if (!isset($uid)) {
			return $this->ex(10007);
		}

		$sell_houses = $this->adminsellhouse_model->get_by_id($hid);
		return $this->ok($sell_houses);
	}

	public function sell_list($uid, $kw = NULL) {
		if (!is_login()) { return $this->un_login(); }

		if (!isset($uid)) {
			return $this->ex(10007);
		}

		$sell_houses = $this->adminsellhouse_model->get_by_kw($uid, $kw);
		return $this->ok($sell_houses);
	}

	public function add_sell($house, $return_list = FALSE) {
		if (!is_login()) { return $this->un_login(); }

		$code = $this->validateAddSell($house);
		if ($code != 200) {
			return $this->ex($code);
		}

		$insert_result = $this->adminsellhouse_model->add($house);
		if (!$insert_result) {
			log_message('error', 'add_sell db failed');
			return $this->ex(10006);
		}
		
		if ($return_list) {
			return $this->sell_list();
		}
		return $this->ok();
	}

	public function del_sell($hid, $return_list = FALSE) {
		if (!is_login()) { return $this->un_login(); }

		if (!isset($hid)) {
			return $this->ex(10008);
		}
		$del_result = $this->adminsellhouse_model->del_by_id($hid);
		if (!$del_result) {
			log_message('error', 'del_sell db failed');
			return $this->ex(10009);
		}
		
		if ($return_list) {
			return $this->sell_list();
		}
		return $this->ok();
	}

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
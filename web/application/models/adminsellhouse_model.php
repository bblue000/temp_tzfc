<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 用户相关的API，包括登录，注册，修改密码，修改信息；
 */
class adminsellhouse_model extends MY_Model {
	
	// 表名
	const TABLE_NAME = 'tab_sellhouse';

	private $COLS = array(
		'hid',
		'community', 'cid', 'aid', 
		'rooms', 'halls', 'bathrooms', 'size',
		'price', 'unit_price',
		'title',
		'floors', 'floors_total', 
		'rights_len', 'rights_type', 'rights_from', 
		'house_type', 'decor', 'orientation',
		'primary_school', 'junior_school', 'details',
		'uid'
	);

	private $INSERT_COLS = array(
		'community', 'cid', 'aid', 
		'rooms', 'halls', 'bathrooms', 'size',
		'price', 'unit_price',
		'title',
		'floors', 'floors_total', 
		'rights_len', 'rights_type', 'rights_from', 
		'house_type', 'decor', 'orientation',
		'primary_school', 'junior_school', 'details',
		'uid'
	);
	
	public function __construct() {
		parent::__construct();
	}

	public function get_all() {
		$this->setTable($this::TABLE_NAME);
		return $this->getData();
	}

	public function get_by_uid($uid) {
		$this->setTable($this::TABLE_NAME);
		return $this->getData(array('uid'=>$uid));	
	}

	public function get

	public function get_by_id($shid) {
		$this->setTable($this::TABLE_NAME);
		return $this->getSingle(array('hid'=>$shid));	
	}

	public function add($house) {
		$user = array_filter_by_key($house, $this->INSERT_COLS);
		$this->setTable($this::TABLE_NAME);
		$result = $this->addData($house);
		return isset($result);
	}

	public function update_by_id($shid, $fields) {
		$fields = array_filter_by_key($fields, $this->INSERT_COLS);
		$this->setTable($this::TABLE_NAME);
		return $this->editData(array('hid' => $shid), $fields);
	}

	public function del_by_id($shid) {
		$result = $this->delData($shid, $this::TABLE_NAME, 'hid');
		return $result === FALSE ? FALSE : TRUE;
	}
	
}

?>
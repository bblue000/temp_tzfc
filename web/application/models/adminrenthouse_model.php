<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class adminrenthouse_model extends MY_Model {
	
	// 表名
	const TABLE_NAME = 'tab_renthouse';

	private $COLS = array(
		'hid',
		'community', 'cid', 'aid', 
		'rooms', 'halls', 'bathrooms', 'size',
		'price', 'is_undefined',
		'title',
		'rent_type', 'rentpay_type',
		'floors', 'floors_total', 
		'house_type', 'decor', 'orientation',
		'details',
		'uid'
	);

	private $INSERT_COLS = array(
		'community', 'cid', 'aid', 
		'rooms', 'halls', 'bathrooms', 'size',
		'price', 'is_undefined',
		'title',
		'rent_type', 'rentpay_type',
		'floors', 'floors_total', 
		'house_type', 'decor', 'orientation',
		'details',
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

	public function get_by_kw($uid, $kw) {
		$this->setTable($this::TABLE_NAME);
		if (isset($kw) && !empty($kw)) {
			$kw = $this->db->escape_like_str($kw);
			$this->db->or_like(array('title' => $kw));
			$this->db->or_like(array('community' => $kw));
			$this->db->or_like(array('details' => $kw));
			return $this->getData();
		}
		return $this->get_by_uid($uid);	
	}

	public function get_by_id($rhid) {
		$this->setTable($this::TABLE_NAME);
		return $this->getSingle(array('hid'=>$rhid));	
	}

	public function add($house) {
		$user = array_filter_by_key($house, $this->INSERT_COLS);
		$this->setTable($this::TABLE_NAME);
		$result = $this->addData($house);
		return isset($result);
	}

	public function update_by_id($rhid, $fields) {
		$fields = array_filter_by_key($fields, $this->INSERT_COLS);
		$this->setTable($this::TABLE_NAME);
		return $this->editData(array('hid' => $rhid), $fields);
	}

	public function del_by_id($rhid) {
		$result = $this->delData($rhid, $this::TABLE_NAME, 'hid');
		return $result === FALSE ? FALSE : TRUE;
	}
	
}

?>
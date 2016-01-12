<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class sellhouse_model extends MY_Model {
	
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

	// ========================================
	// ========================================
	// 用户无关的
	// ========================================
	// ========================================
	public function get_all() {
		$this->setTable($this::TABLE_NAME);
		return $this->getData();
	}

	public function get_by_kw($kw) {
		$this->setTable($this::TABLE_NAME);
		if (isset($kw) && !empty($kw)) {
			$kw = $this->db->escape_like_str($kw);
			$this->db->or_like(array('title' => $kw));
			$this->db->or_like(array('community' => $kw));
			$this->db->or_like(array('details' => $kw));
			return $this->getData();
		}
		return $this->get_all();
	}

	public function get_by_hid($hid) {
		$this->setTable($this::TABLE_NAME);
		return $this->getSingle(array('hid'=>$hid));	
	}

	// ========================================
	// ========================================
	// 用户相关的
	// ========================================
	// ========================================
	public function get_all_by_uid($uid) {
		$this->setTable($this::TABLE_NAME);
		return $this->getData(array('uid'=>$uid));	
	}

	public function get_by_kw_by_uid($uid, $kw) {
		$this->setTable($this::TABLE_NAME);
		if (isset($kw) && !empty($kw)) {
			$kw = $this->db->escape_like_str($kw);
			$this->db->or_like(array('title' => $kw));
			$this->db->or_like(array('community' => $kw));
			$this->db->or_like(array('details' => $kw));
			return $this->getData(array('uid'=>$uid));
		}
		return $this->get_all_by_uid($uid);	
	}

	public function add($house) {
		$user = array_filter_by_key($house, $this->INSERT_COLS);
		$this->setTable($this::TABLE_NAME);
		$result = $this->addData($house);
		return isset($result);
	}

	public function update_by_hid($hid, $fields) {
		$fields = array_filter_by_key($fields, $this->INSERT_COLS);
		$this->setTable($this::TABLE_NAME);
		return $this->editData(array('hid' => $hid), $fields);
	}

	public function del_by_hid($hid) {
		$result = $this->delData($hid, $this::TABLE_NAME, 'hid');
		return $result === FALSE ? FALSE : TRUE;
	}
	
}

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 出售房源的model
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
		'primary_school', 'junior_school', 
		'images', 'details',
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
		'primary_school', 'junior_school', 
		'images', 'details',
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
	public function num_rows($kw = '', $conditions = NULL) {
		$this->db->select('hid');
		if ($conditions) {
            $this->db->where($conditions);
        }
		if (isset($kw) && !empty($kw)) {
			$kw = $this->db->escape_like_str($kw);
			$this->db->group_start()
		            	->or_like('title', $kw)
		            	->or_like('community', $kw)
	        		->group_end();
		}
        return $this->db->get($this::TABLE_NAME)->num_rows();
	}

	public function get_page_data($page_size, $offset = 0, $conditions = NULL) {
		$this->load->helper('housesql');
		$sub_where = to_where_str($conditions, $this);
		$sub_sql = "select * from tab_sellhouse where 1 ". $sub_where ." order by hid limit {$offset},{$page_size}";
		$sql = 'select h.*, u.* from (' . $sub_sql . ') h, tab_user u where h.uid = u.uid;';

		// print_r($sql);
        return $this->db->query($sql)->result_array();
	}

	public function get_all() {
		$this->setTable($this::TABLE_NAME);
		return $this->getOrderedData();
	}

	public function get_by_kw($kw) {
		$this->setTable($this::TABLE_NAME);
		if (isset($kw) && !empty($kw)) {
			$kw = $this->db->escape_like_str($kw);
			$this->db->or_like(array('title' => $kw));
			$this->db->or_like(array('community' => $kw));
			return $this->getOrderedData();
		}
		return $this->get_all();
	}

	public function get_by_hid($hid) {
		$this->setTable($this::TABLE_NAME);
		return $this->getSingle(array('hid' => $hid));	
	}

	// ========================================
	// ========================================
	// 用户相关的
	// ========================================
	// ========================================
	public function get_all_by_uid($uid) {
		$this->setTable($this::TABLE_NAME);
		return $this->getOrderedData(array('uid' => $uid));	
	}

	public function get_by_kw_by_uid($uid, $kw) {
		if (isset($kw) && !empty($kw)) {
			$this->setTable($this::TABLE_NAME);
			$kw = $this->db->escape_like_str($kw);
			$this->db->where('uid', $uid)
			        ->group_start()
			            ->or_like('title', $kw)
			            ->or_like('community', $kw)
		        	->group_end();
			return $this->getOrderedData();
		}
		return $this->get_all_by_uid($uid);	
	}

	public function get_by_hid_by_uid($uid, $hid) {
		$this->setTable($this::TABLE_NAME);
		return $this->getSingle(array('uid' => $uid, 'hid' => $hid));	
	}

	public function add($house) {
		$user = array_filter_by_key($house, $this->INSERT_COLS);
		$this->setTable($this::TABLE_NAME);
		$result = $this->addData($house);
		return $result;
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
	
	private function getOrderedData($where = NULL) {
		$this->db->order_by('update_time', 'DESC');
		return $this->getData($where);
	}
}

?>
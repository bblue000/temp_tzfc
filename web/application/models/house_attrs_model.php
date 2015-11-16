<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 房源属性
 */
class house_attrs_model extends MY_Model {
	
	// 表名
	const TABLE_ATTR = 'tab_houseattrs';
	private $ATTR_COLS = array(
		'haid', 'attr_name', 'option_values', 'multi_enabled'
	);
	private $ATTR_UPDATE_COLS = array(
		'attr_name', 'option_values', 'multi_enabled'
	);
	
	public function __construct() {
		parent::__construct();
	}

	/**
	 * 增加属性
	 *
	 * @param	attr	属性信息
	 * @return	insert_id or false 
	 * @see CI_DB_result::insert  db->insert_id()
	 */
	public function add_new_attr($attr) {
		$attr = array_filter_by_key($user, $this->ATTR_UPDATE_COLS);
		$this->setTable($this::TABLE_ATTR);
		$result = $this->addData($attr);
		return isset($result);
	}

	/**
	 * 获取所有的属性信息
	 *
	 * @return	array 	所有属性信息，或者空数组
	 * @see CI_DB_result::result_array
	 */
	public function get_all() {
		$this->setTable($this::TABLE_ATTR);
		return $this->getData();
	}

	/**
	 * 根据属性ID获取属性信息
	 *
	 * @param	string	$haid 属性ID
	 * @return	array 	$haid的属性信息，或者空数组
	 * @see CI_DB_result::result_array
	 */
	public function get_by_id($haid) {
		$this->setTable($this::TABLE_ATTR);
		return $this->getSingle(array('haid'=>$haid));	
	}

	/**
	 * 
	 * 根据属性ID获取属性信息
	 *
	 * @param	string	$haid 属性ID
	 * @param	string	$fields 属性信息
	 * @return	bool	TRUE on success, FALSE on failure
	 * @see CI_DB_query_builder::update
	 */
	public function update_by_id($haid, $fields) {
		$fields = array_filter_by_key($fields, $this->ATTR_UPDATE_COLS);
		$this->setTable($this::TABLE_ATTR);
		return $this->editData(array('haid' => $haid), $fields);
	}

	/**
	 * 删除属性
	 *
	 * @param	string	$haid 属性ID
	 * @return	bool	TRUE on success, FALSE on failure
	 * @see CI_DB_query_builder::delte
	 */
	public function del_by_id($haid) {
		$result = $this->delData($uid, $this::TABLE_ATTR, 'haid');
		return $result === FALSE ? FALSE : TRUE;
	}
}

?>
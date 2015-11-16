<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 用户相关的API，包括登录，注册，修改密码，修改信息；
 */
class house_attrs_api extends API {
	
	protected $apicode = array(

		// 登录时API
		10001 => '无效的属性数据',
		10002 => '属性名为空',
		10003 => '添加属性失败',

		10301 => '属性更新失败',

		10401 => '指定删除属性ID',
		10402 => '删除属性失败'

	);

	public function __construct() {
		parent::__construct();
		$this->load->model('house_attrs_model');
	}

	public function get_all() {
		if (!is_login()) {
			return $this->un_login();
		}
		$query_result = $this->house_attrs_model->get_all();
		if (!empty($query_result)) {
			foreach ($query_result as $attr) {
				$attr['option_values'] = json_decode($attr[option_values], TRUE);
			}
		}
		return $this->ok($query_result);
	}

	public function add_new_attr($attr) {
		if (!is_login()) {
			return $this->un_login();
		}
		if (!isset($attr) || empty($attr)) { return $this->ex(10001); }
		if (!isset($attr['attr_name']) || empty($attr['attr_name'])) { return $this->ex(10002); }
		if (!isset($attr['multi_enabled'])) {
			$attr['multi_enabled'] = 0;
		}
		$insert_result = $this->house_attrs_model->add_new_attr($attr);
		if (!$insert_result) {
			log_message('error', 'add_new_attr db failed');
			return $this->ex(10003);
		}
	}


	public function update_attr($haid, $update_pair) {
		if (!is_login()) {
			return $this->un_login();
		}
		if (!isset($update_pair) || !is_array($update_pair)) {
			return $this->ok();
		}
		// 更新数据库
		$update_result = $this->house_attrs_model->update_by_id($haid, $update_pair);
		if (!$update_result) {
			log_message('error', 'update_attr db failed');
			return $this->ex(10301);
		} else {
			return $this->ok($this->house_attrs_model->get_by_id($haid));
		}
	}

	public function del_attr($haid) {
		if (!is_login()) {
			return $this->un_login();
		}
		if (!isset($haid)) {
			return $this->ex(10401);
		}
		$del_result = $this->house_attrs_model->del_by_id($haid);
		if (!$del_result) {
			log_message('error', 'del_attr db failed');
			return $this->ex(10402);
		} else {
			return $this->ok($haid);
		}
	}
}

?>

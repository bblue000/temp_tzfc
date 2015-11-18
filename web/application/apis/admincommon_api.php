<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 公共信息相关的API
 */
class admincommon_api extends API {

	protected $apicode = array(
		80001 => '请输入小区名',
		80002 => '添加小区失败',
		80003 => '更新小区失败',

		80101 => '请输入区域名',
		80102 => '添加区域失败',
		80103 => '更新区域失败'

	);

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function community_list() {
		if (!is_login()) { return $this->un_login(); }

		$this->load->model('community_model');
		$communitys = $this->community_model->get_all();
		return $this->ok($communitys);
	}

	// 添加成功后返回最新的列表
	public function community_add($cnames) {
		if (!is_login()) { return $this->un_login(); }

		if (!isset($cnames) || empty($cnames)) { return $this->ex(80001); }

		$this->load->model('community_model');
		$result = $this->community_model->add($cnames);
		if (!$result) {
			log_message('error', 'community_add db failed');
			return $this->ex(80002);
		}
		return $this->community_list();
	}

	public function community_edit($cid, $cname) {
		if (!is_login()) { return $this->un_login(); }

		if (!isset($cname) || empty($cname)) { return $this->ex(80001); }

		$this->load->model('community_model');
		$result = $this->community_model->update_by_id($cid, $cname);
		if (!$result) {
			log_message('error', 'community_edit db failed');
			return $this->ex(80003);
		}
		return $this->community_list();
	}


	public function area_list() {
		if (!is_login()) { return $this->un_login(); }

		$this->load->model('area_model');
		$areas = $this->area_model->get_all();
		return $this->ok($areas);
	}

	public function area_add($area_names) {
		if (!is_login()) { return $this->un_login(); }

		if (!isset($area_names) || empty($area_names)) { return $this->ex(80101); }

		$this->load->model('area_model');
		$result = $this->area_model->add($area_names);
		if (!$result) {
			log_message('error', 'area_add db failed');
			return $this->ex(80102);
		}
		return $this->area_list();
	}

	public function area_edit($aid, $cname) {
		if (!is_login()) { return $this->un_login(); }

		if (!isset($cname) || empty($area_name)) { return $this->ex(80101); }

		$this->load->model('area_model');
		$result = $this->area_model->update_by_id($aid, $area_name);
		if (!$result) {
			log_message('error', 'area_edit db failed');
			return $this->ex(80103);
		}
		return $this->area_list();
	}

}


?>
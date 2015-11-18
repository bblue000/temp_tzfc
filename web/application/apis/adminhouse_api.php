<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 房源相关的API
 */
class adminhouse_api extends API {

	protected $apicode = array(
		80001 => ''

	);

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function list() {
		if (!is_login()) { return $this->un_login(); }

		$this->load->model('community_model');
		$communitys = $this->community_model->get_all();

		return $this->ok($communitys);
	}



}


?>
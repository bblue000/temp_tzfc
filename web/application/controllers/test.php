<?php


class test extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {

		echo is_login();

		// static $apicode;
		// $this->load->api('user_api');
		
		// echo json_encode($this->user_api->logout());
		// echo json_encode($this->user_api->test());
	}

}

?>
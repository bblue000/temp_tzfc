<?php


class test extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		static $apicode;
		$this->load->helper('user_api');
		echo json_encode($apicode);
	}

}

?>
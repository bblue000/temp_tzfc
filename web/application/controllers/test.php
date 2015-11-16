<?php


class test extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = '1ed2d2efb09d3bc21f924dde909720b5';
		
		$this->load->api('house_attrs_api');
		echo json_encode($this->house_attrs_api->get_all());

		// echo phpinfo();
		// echo get_user_field('yytest').'haha';
		// static $apicode;
		// $this->load->api('user_api');
		
		// echo json_encode($this->user_api->logout());
		// echo json_encode($this->user_api->test());
	}

}

?>
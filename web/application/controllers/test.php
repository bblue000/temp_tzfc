<?php


class test extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = '1ed2d2efb09d3bc21f924dde909720b5';
		
		echo substr($data, 0, 10);
		echo '<br/>';
		echo substr($data, 10, 100);
		echo '<br/>';

		$this->load->helper('string');
		$salt = random_string('alnum',6);
		echo $salt;
		echo '<br/>';
		echo md5pass($data, $salt);
		// echo phpinfo();
		// echo get_user_field('yytest').'haha';
		// static $apicode;
		// $this->load->api('user_api');
		
		// echo json_encode($this->user_api->logout());
		// echo json_encode($this->user_api->test());
	}

}

?>
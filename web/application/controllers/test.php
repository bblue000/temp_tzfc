<?php


class test extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = '1ed2d2efb09d3bc21f924dde909720b5';
		
		print_r($this->input->post(NULL, TRUE));
		print_r($this->input->get(NULL, TRUE));

		print_r($this->input->post('a'));

		printf(intval('a1a'));

		// $this->load->view('test', $this);
	}

}

?>
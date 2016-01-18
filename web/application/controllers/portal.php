<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class portal extends MY_Controller {
	

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->check_state_common('GET');
		$this->load->view('portal/template-info', $this);
	}

	public function sellhouse() {
		$this->check_state_common('GET');
		$this->load->view('portal/sellhouse', $this);
	}

	public function renthouse() {
		$this->check_state_common('GET');
		$this->load->view('portal/renthouse', $this);
	}

}

?>
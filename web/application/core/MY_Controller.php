<?php
class MY_Controller extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		// 需要base url
        $this->load->helper('url');
        $this->load->library('APIResult');
	}
	
}

?>
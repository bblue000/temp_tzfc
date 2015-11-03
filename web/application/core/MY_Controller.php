<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * 默认加载了一些辅助类：url, cookie；
 *
 * 类库：sessionaccess
 *
 */
class MY_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// 需要base url
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->library('sessionaccess');
	}
	
}

?>
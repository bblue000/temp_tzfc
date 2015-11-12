<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 房源相关的API
 */
class adminhouse_api extends API {

	protected $apicode = array(


	);

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}



}


?>
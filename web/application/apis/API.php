<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// api基类，API是一种特殊的controller
class API extends MY_Controller {

	public function __construct() {
		parent::__construct();
		// do sth. common
	}


}

?>
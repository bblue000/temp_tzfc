<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 管理用户
class adminuser extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function add() {

	}

	public function del() {
		$post = $this->input->post('id',TRUE);
		$id = !empty($post) ? $post : array($this->input->get('id',TRUE));
		if (is_array($id) && in_array('1',$id)) {
			$tag = false;
		} 
	}

}

?>
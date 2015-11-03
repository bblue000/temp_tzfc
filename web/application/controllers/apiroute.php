<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 用于API路由转发的
 *
 */
class apiroute extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function apiroute_redirect($path) {
		if (!isset($path)) {
			show_404();
			return;
		}
		$target_model_ref = explode("_", $path);
		
		if (!isset($target_model_ref[0])) {
			show_404();
			return;
		}

		if (!isset($target_model_ref[1])) {
			show_404();
			return;
		}
		$target_mothod = $target_model_ref[1];

		$target_model_class_name = $target_model_ref[0].'_model';
		$target_model_class_path = APPPATH.'models/'.$target_model_class_name.'.php';
		if (!class_exists($target_model_class_path) && !file_exists($target_model_class_path)) {
			show_404();
			return;
		}

		$this->load->model($target_model_class_name);

		if (!method_exists($this->$target_model_class_name, $target_mothod)) {
			show_404();
			return;
		}

		if (!isset($target_model_ref[2])) {
			$output = $this->$target_model_class_name->$target_mothod($_REQUEST);
		} else {
			$output = $this->$target_model_class_name->$target_mothod($target_model_ref[2]);
		}

		echo json_encode($output);
	}
	
}


?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class upload extends MY_Controller {

	
	public function __construct() {
		parent::__construct();
	}


	public function index() {
		$fn = $this->input->get_request_header('X_FILENAME', TRUE);
		if (!$fn) {
			echo json_encode(common_result(404, '请选择上传的文件'));
			exit(EXIT_UNKNOWN_FILE);
		}

		$validFormats = array('jpg', 'gif', 'png', 'jpeg');
		$ext = pathinfo($fn, PATHINFO_EXTENSION);
		if (!isset($ext)) {
			echo json_encode(common_result(500, '文件格式不支持: '.$ext));
			exit(EXIT_USER_INPUT);
		}
		$ext = strtolower($ext);
		if (!in_array($ext, $validFormats)) {
			echo json_encode(common_result(500, '文件格式不支持: '.$ext));
			exit(EXIT_USER_INPUT);
		}
		unset($validFormats);

		$tempFile = $this->generateFileName($ext);
	    file_put_contents(
	        FCPATH.'uploads/avatar/' . $tempFile,
	        file_get_contents('php://input')
	    );
	    echo json_encode(common_result_ok(base_url('uploads/avatar/'.$tempFile)));
	}

	private function generateFileName($ext) {
		$this->load->helper('string');
		$salt = random_string('alnum', 10);
		return 'tmp-'.date('Y-m-d-H-i-s', time()).'-'.$salt.'.'.$ext;
	}

}

?>
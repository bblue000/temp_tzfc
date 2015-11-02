<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class APIResult {

	// 请求成功后的通用返回
	static $result_ok_pair = array(
		'code' => 200,
		'msg' => 'success'
	);

    public function common_result($code = 200, $msg = 'OK', $data = NULL) {
		$result_data = array(
			'code' => $code,
			'msg' => $msg,
			'data' => $data,
		);
		return $result_data;
	}
	
	public function common_result_use_pair($code_msg_pair, $data = NULL) {
		$result_data = array(
			'code' => $code_msg_pair['code'],
			'msg' => $code_msg_pair['msg'],
			'data' => $data,
		);
		return $result_data;
	}
	
	public function common_result_ok($data = NULL) {
		return $this->common_result($this->result_ok_pair, $data);
	}
}

?>
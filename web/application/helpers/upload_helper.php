<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function common_check_upload_input($CI) {
	$fn = $CI->input->get_request_header('X_FILENAME', TRUE);
	if (!$fn) {
		return common_result(404, '请选择上传的文件');
	}

	$validFormats = array('jpg', 'gif', 'png', 'jpeg');
	$ext = pathinfo($fn, PATHINFO_EXTENSION);
	if (!isset($ext)) {
		return common_result(500, '文件格式不支持: '.$ext);
	}
	$ext = strtolower($ext);
	if (!in_array($ext, $validFormats)) {
		return common_result(500, '文件格式不支持: '.$ext);
	}
	unset($validFormats);
	return common_result_ok($ext);
}

// =======================================
// 上传头像
function save_avatar($CI, $uid) {
	$check_result = common_check_upload_input($CI); // 获取扩展名
	if (!is_ok_result($check_result)) { return $check_result; }

	$ext = $check_result['data'];

	$tempFileName = generate_avatar_fn($CI, $ext);
	$tempFilePath = 'uploads/avatar/'. $uid . '/';
	$tempFileAbsPath = FCPATH . $tempFilePath;
	if (!file_exists($tempFileAbsPath)) {
		mkdir($tempFileAbsPath);
	}
    file_put_contents(
        $tempFileAbsPath . $tempFileName,
        file_get_contents('php://input')
    );
    return common_result_ok($tempFilePath . $tempFileName);
}

function generate_avatar_fn($CI, $ext) {
	$CI->load->helper('string');
	$salt = random_string('alnum', 10);
	return date('Y-m-d-H-i-s', time()).'-'.$salt.'.'.$ext;
}

function delete_avatar($CI, $file) {
	if (isset($file) && !empty($file)) {
		$fileAbsPath = FCPATH . $file;
		if (file_exists($fileAbsPath)) {
			@unlink($fileAbsPath);
		}
	}
}

function delete_old_avatar($CI, $new_avatar) {
	$old_avatar = get_user_field('avatar');
	if (isset($old_avatar) && !empty($old_avatar)
		&& isset($new_avatar) && !empty($new_avatar)) {
		if ($old_avatar != $new_avatar) {
			delete_avatar($CI, $old_avatar);
		}
	}
}



// =======================================
// 上传房源图片
function house() {
	$ext = $this->common_check_upload_input();
	$uid = get_session_uid();
	if (!isset($uid)) {
		echo json_encode(common_result(400, '操作用户未知'));
		return;
	}

	$tempFileName = $this->generateHouseFileName($ext);
	$tempFilePath = 'uploads/house/'.$uid.'/';
	$tempFileAbsPath = FCPATH.$tempFilePath;
	if (!file_exists($tempFileAbsPath)) {
		mkdir($tempFileAbsPath);
	}
    file_put_contents(
        $tempFileAbsPath. $tempFileName,
        file_get_contents('php://input')
    );
    echo json_encode(common_result_ok($tempFilePath.$tempFileName));
}

function generateHouseFileName($ext) {
	$this->load->helper('string');
	$salt = random_string('alnum', 10);
	return date('Y-m-d-H-i-s', time()).'-'.$salt.'.'.$ext;
}


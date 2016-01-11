<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 生成户型字符串
 */
function to_room_type($house) {
	$room_type_str = '';
	if (isset($house['rooms']) && $house['rooms'] > 0) {
		$room_type_str .= $house['rooms'].'室';
	}
	if (isset($house['halls']) && $house['halls'] > 0) {
		$room_type_str .= $house['halls'].'厅';
	}
	if (isset($house['bathrooms']) && $house['bathrooms'] > 0) {
		$room_type_str .= $house['bathrooms'].'卫';
	}
	return $room_type_str; 
}

/**
 * 生成标题字符串
 */
function to_room_title($house) {
	$room_title_str = '';
	if (isset($house['title']) && !empty($house['title'])) {
		return $house['title'];
	}
	return $room_title_str; 
}


function loadCommonInfos($CI) {
	$CI->load->api('admincommon_api');
	$communitys_result = $CI->admincommon_api->community_list();
	if (is_ok_result($communitys_result)) {
		$CI->communitys = arrayofmap_to_keymap($communitys_result['data'], 'cid');
	}

	$areas_result = $CI->admincommon_api->area_list();
	if (is_ok_result($areas_result)) {
		$CI->areas = arrayofmap_to_keymap($areas_result['data'], 'aid');
	}

	$CI->house_types = array(
		1 => '普通住宅',
		2 => '公寓',
		3 => '别墅',
		4 => '平房',
		5 => '其他'
	);

	$CI->house_decors = array(
		1 => '毛胚',
		2 => '简装',
		3 => '中装',
		4 => '高装',
		5 => '豪装'
	);

	$CI->house_orientations = array(
		1 => '东',
		2 => '南',
		3 => '西',
		4 => '北',
		5 => '东西',
		6 => '南北',
		7 => '东南',
		8 => '西南',
		9 => '东北',
		10 => '西北'
	);

	$CI->rights_lens = array(
		1 => '70年产权',
		2 => '50年产权',
		3 => '40年产权'
	);

	$CI->rights_types = array(
		1 => '商品房',
		2 => '商住两用',
		3 => '经济适用房',
		4 => '使用权',
		5 => '公房'
	);

}

function loadRentCommonInfos($CI) {
	loadCommonInfos($CI);

	$CI->rent_types = array(
		1 => '整租',
		2 => '合租',
		3 => '床位'
	);

	$CI->rentpay_types = array(
		0 => '面议',
		1 => '押一付一',
		2 => '押一付二',
		3 => '押一付三',
		4 => '押二付一',
		5 => '押二付二',
		6 => '押二付三',
		7 => '半年付',
		8 => '年付'
	);
}

// $houses = array(
// 	array(
// 		'hid' => 1,
// 		'title' => '我是中国人，我爱中国，思密达',
// 		'rooms' => '3',
// 		'halls' => '1',
// 		'bathrooms' => '1',
// 		'create_time' => '2015-10-12 21:21:23',
// 		'update_time' => '2015-10-12 21:21:23',
// 	),
// 	array(
// 		'hid' => 2,
// 		'title' => '我是中国人，我爱中国，思密达; 我是中国人，我爱中国，思密达',
// 		'rooms' => '3',
// 		'halls' => '1',
// 		'bathrooms' => '1',
// 		'create_time' => '2015-10-12 21:21:23',
// 		'update_time' => '2015-10-12 21:21:23'
// 	),
// 	array(
// 		'hid' => 3,
// 		'title' => '我是中国人，我爱中国，思密达; 我是中国人，我爱中国，思密达; 我是中国人，我爱中国，思密达',
// 		'rooms' => '3',
// 		'halls' => '1',
// 		'bathrooms' => '1',
// 		'create_time' => '2015-10-12 21:21:23',
// 		'update_time' => '2015-10-12 21:21:23'
// 	)
// );
?>
<?php

defined('BASEPATH') OR exit('No direct script access allowed');


// for UI
// ***************************************
// ***************************************
// 列表中的项
// ***************************************
// ***************************************
function parse_sell_list_item($CI, $house) {
	if (!isset($house) || empty($house) || !is_array($house)) {
		return $house;
	}
	$new_house = array();
	$new_house['hid'] = $house['hid'];
	$new_house['images'] = parse_get_by_key($CI, $house, 'images', '');
	$new_house['title'] = parse_get_by_key($CI, $house, 'title');
	$new_house['subinfo_area'] = parse_house_area_community($CI, $house);
	$new_house['subinfo_house'] = parse_sell_subinfo_house($CI, $house);

	$new_house['price'] = parse_get_by_key($CI, $house, 'price');

	$new_house['poster_name'] = parse_get_by_key($CI, $house, 'true_name');
	$new_house['poster_mobile'] = parse_get_by_key($CI, $house, 'contact_mobile');
	return $new_house;
}

function parse_sell_subinfo_house($CI, $house, $result = array()) {
	$room_type = to_room_type($house);
	if (!empty($room_type)) {
		$result[] = $room_type;
	}
	$size = parse_get_by_key($CI, $house, 'size', '');
	if (!empty($size)) {
		$result[] = $size . '㎡';
	}
	$result[] = parse_get_by_key($CI, $house, 'update_time');
	return $result;
}


// ***************************************
// ***************************************
// 单独显示的项
// ***************************************
// ***************************************
function parse_sell_house_item($CI, $house) {
	if (!isset($house) || empty($house) || !is_array($house)) {
		return $house;
	}
	$new_house = array();
	$new_house['hid'] = $house['hid'];
	$new_house['title'] = parse_get_by_key($CI, $house, 'title');

	$new_house['area'] = parse_from_attr_array($CI, $house, 'aid', 'areas', 'area_name');
	$new_house['community'] = parse_house_community($CI, $house);

	$new_house['price'] = parse_get_by_key($CI, $house, 'price');
	$new_house['unit_price'] = parse_get_by_key($CI, $house, 'unit_price');
	$new_house['room_type'] = to_room_type($house);
	$new_house['size'] = parse_get_by_key($CI, $house, 'size');

	$new_house['floors'] = parse_house_floors($CI, $house);
	$new_house['floors_total'] = parse_house_floors_total($CI, $house);

	$new_house['rights_len'] = parse_from_array($CI, $house, 'rights_len', 'rights_lens');
	$new_house['rights_type'] = parse_from_array($CI, $house, 'rights_type', 'rights_types');
	$new_house['rights_from'] = parse_from_number($CI, $house, 'rights_from');

	$new_house['house_type'] = parse_from_array($CI, $house, 'house_type', 'house_types');
	$new_house['decor'] = parse_from_array($CI, $house, 'decor', 'house_decors');
	$new_house['orientation'] = parse_from_array($CI, $house, 'orientation', 'house_orientations');

	$new_house['primary_school'] = parse_get_by_key($CI, $house, 'primary_school');
	$new_house['junior_school'] = parse_get_by_key($CI, $house, 'junior_school');

	$new_house['details'] = parse_get_by_key($CI, $house, 'details');
	$new_house['update_time'] = parse_get_by_key($CI, $house, 'update_time');

	// poster 信息
	$poster = array();
	array_merge_by_key($house, $poster, array(
			'uid',
			'user_name', 'true_name',
			'sex',
			'contact_tel', 'contact_mobile',
			'qqchat', 'wechat', 'email',
			'avatar'
	));
	$new_house['poster'] = $poster;
	return $new_house;
}

function loadSellFilterInfos($CI) {
	loadCommonFilterInfos($CI);
	$CI->filters_price = array(
		0 => '不限',
		1 => '30万以下',
		2 => '30-50万',
		3 => '50-70万',
		4 => '70-90万',
		5 => '90-110万',
		6 => '110万以上',
	);
}

function unloadSellFilterInfos($CI) {
	unloadCommonFilterInfos($CI);
	unset($CI->filters_price);
}

function loadCommonFilterInfos($CI) {
	loadCommonInfos($CI);

	$CI->filters_area = array_merge(array(0 => array('area_name' => '不限')), $CI->areas);

	$CI->filters_community = $CI->communitys; //array_merge(0 => array('cname' => '不限'), $CI->communitys);

	$CI->filters_house_type = array_merge(array(0 => array('不限')), $CI->house_types);

	$CI->filters_decor = array_merge(array(0 => '不限'), $CI->house_decors);

	$CI->filters_size = array(
		0 => '不限',
		1 => '0-40㎡',
		2 => '40-60㎡',
		3 => '60-80㎡',
		4 => '80-100㎡',
		5 => '100-144㎡',
		6 => '144㎡以上',
	);

	$CI->filters_room = array(
		0 => '不限',
		1 => '一室',
		2 => '两室',
		3 => '三室',
		4 => '四室',
		5 => '五室及以上',
	);

	$CI->filters_floor = array(
		0 => '不限',
		1 => '1楼',
		2 => '2楼',
		3 => '3楼',
		4 => '4楼',
		5 => '5楼',
		6 => '6楼',
		7 => '7楼',
		8 => '8楼',
	);
}

function unloadCommonFilterInfos($CI) {
	unset($CI->filters_area);
	unset($CI->filters_community);
	unset($CI->filters_house_type);
	unset($CI->filters_decor);

	unset($CI->filters_size);
	unset($CI->filters_room);
	unset($CI->filters_floor);
}




// ***************************************
// ***************************************
// 列表中的项
// ***************************************
// ***************************************
function parse_rent_list_item($CI, $house) {
	if (!isset($house) || empty($house) || !is_array($house)) {
		return;
	}
	$new_house = array();
	$new_house['hid'] = $house['hid'];
	$new_house['images'] = parse_get_by_key($CI, $house, 'images', '');
	$new_house['title'] = parse_get_by_key($CI, $house, 'title');
	$new_house['subinfo_area'] = parse_house_area_community($CI, $house);
	$new_house['subinfo_house'] = parse_rent_subinfo_house($CI, $house);

	$new_house['price'] = parse_get_by_key($CI, $house, 'price');

	$new_house['poster_name'] = parse_get_by_key($CI, $house, 'true_name');
	$new_house['poster_mobile'] = parse_get_by_key($CI, $house, 'contact_mobile');
	return $new_house;
}

function parse_rent_subinfo_house($CI, $house, $result = array()) {
	// 出租方式
	$rent_type = parse_from_array($CI, $house, 'rent_type', 'rent_types', '');
	if (!empty($rent_type)) {
		$result[] = $rent_type;
	}
	// 付租方式
	$rentpay_type = parse_from_array($CI, $house, 'rentpay_type', 'rentpay_types', '');
	if (!empty($rentpay_type)) {
		$result[] = $rentpay_type;
	}
	$result = parse_sell_subinfo_house($CI, $house, $result);
	return $result;
}

function loadRentFilterInfos($CI) {
	loadCommonFilterInfos($CI);
	$CI->filters_price = array(
		0 => '不限',
		1 => '500元以下',
		2 => '500-1000元/月',
		3 => '1000-1800元/月',
		4 => '1800元以上',
	);
}

function unloadRentFilterInfos($CI) {
	unloadCommonFilterInfos($CI);
	unset($CI->filters_price);
}




// ***************************************
// ***************************************
// 单独显示的项
// ***************************************
// ***************************************
function parse_rent_house($CI, $house) {
	return $house;
}





// ***************************************
// ***************************************
// util
// ***************************************
// ***************************************
function parse_get_by_key($CI, $house, $key, $ph = '-') {
	if (array_key_exists($key, $house)) {
		$val = $house[$key];
		if (empty($val)) {
			return $ph;
		}
		return $val;
	} else {
		return $ph;
	}
}

function parse_house_community($CI, $house, $ph = '-') {
	$cname = parse_from_attr_array($CI, $house, 'cid', 'communitys', 'cname', '');
	if (!empty($cname)) {
		return $cname;
	} else if (!isset($house['community']) || empty($house['community'])) {
		return $ph;
	} else {
		return $house['community'];
	}
}

function parse_house_area_community($CI, $house, $ph = '-') {
	$area = parse_from_attr_array($CI, $house, 'aid', 'areas', 'area_name', '');
	$community = parse_house_community($CI, $house, '');
	if (empty($area)) {
		if (empty($community)) {
			return $ph;
		}
		return $community;
	} elseif (empty($community)) {
		return $area;
	} else {
		return "{$area}-{$community}";
	}
}

function parse_house_floors($CI, $house, $ph = '-') {
	$floors = parse_from_number($CI, $house, 'floors', '');
	if (!empty($floors)) {
		return "第{$floors}层";
	}
	return $ph;
}

function parse_house_floors_total($CI, $house, $ph = '-') {
	$floors_total = parse_from_number($CI, $house, 'floors_total', '');
	if (!empty($floors_total)) {
		return "共{$floors_total}层";
	}
	return $ph;
}

function parse_house_floor($CI, $house, $ph = '-') {
	$floors = parse_house_floors($CI, $house, '');
	$floors_total = parse_house_floors_total($CI, $house, '') ;
	if (empty($floors) && empty($floors_total)) {
		return $ph;
	}
	if (!empty($floors) && !empty($floors_total)) {
		return $floors . '/' . $floors_total;
	}
	return $floors . $floors_total;
}

function parse_from_attr_array($CI, $house, $key, $ci_attr, $ci_attr_key, $ph = '-') {
	$attrs = $CI->$ci_attr;
	if (isset($house[$key]) && isset($attrs[$house[$key]])) {
		return $attrs[$house[$key]][$ci_attr_key];
	} else {
		return $ph;
	}
}

function parse_from_array($CI, $house, $key, $ci_attr, $ph = '-') {
	$attrs = $CI->$ci_attr;
	if (isset($house[$key]) && isset($attrs[$house[$key]])) {
		return $attrs[$house[$key]];
	} else {
		return $ph;
	}
}

function parse_from_number($CI, $house, $key, $ph = '-') {
	if (isset($house[$key]) && !empty($house[$key])) {
		return $house[$key];
	}
	return $ph;
}

?>
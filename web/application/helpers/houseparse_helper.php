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

function parse_sell_subinfo_house($CI, $house) {
	$result = array();
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

	$new_house['price'] = parse_get_by_key($CI, $house, 'price');
	$new_house['unit_price'] = parse_get_by_key($CI, $house, 'unit_price');
	$new_house['room_type'] = to_room_type($house);
	$new_house['size'] = parse_get_by_key($CI, $house, 'size');


	$new_house['decor'] = parse_house_floor($CI, $house);
	$new_house['floor'] = parse_house_floor($CI, $house);

	$new_house['area'] = parse_from_attr_array($CI, $house, 'aid', 'areas', 'area_name');
	$new_house['community'] = parse_house_community($CI, $house);

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

function parse_rent_subinfo_house($CI, $house) {
	$result = array();
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

function parse_house_floor($CI, $house) {
	$floors = '';
	if (isset($house['floors'])) {
		$floors = '第' . $house['floors'] . '层';
	}
	$floors_total = '';
	if (isset($house['floors_total'])) {
		$floors_total = '共' . $house['floors_total'] . '层';
	}

	if (empty($floors) && empty($floors_total)) {
		return '-';
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

?>
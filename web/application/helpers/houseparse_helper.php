<?php

defined('BASEPATH') OR exit('No direct script access allowed');


// for UI

function parse_sell_house($CI, $house) {
	if (!isset($house) || empty($house) || !is_array($house)) {
		return;
	}
	$new_house = array();
	$new_house['hid'] = $house['hid'];
	$new_house['uid'] = $house['uid'];
	$new_house['poster'] = array(
			'' => ''
		);

	$new_house['price'] = parse_get_by_key($CI, $house, 'price');
	$new_house['unit_price'] = parse_get_by_key($CI, $house, 'unit_price');
	$new_house['room_type'] = to_room_type($house);
	$new_house['size'] = parse_get_by_key($CI, $house, 'size');


	$new_house['decor'] = parse_house_floor($CI, $house);
	$new_house['floor'] = parse_house_floor($CI, $house);

	$new_house['area'] = parse_house_area($CI, $house);
	$new_house['community'] = parse_house_community($CI, $house);

	$new_house['primary_school'] = parse_get_by_key($CI, $house, 'primary_school');
	$new_house['junior_school'] = parse_get_by_key($CI, $house, 'junior_school');

	$new_house['details'] = parse_get_by_key($CI, $house, 'details');
	$new_house['update_time'] = parse_get_by_key($CI, $house, 'update_time');

	return $new_house;
}

// 从房源信息中查找
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

function parse_house_area($CI, $house) {
	if (isset($house['aid']) && isset($this->areas['aid'])) {
		return $this->areas['aid']['area_name'];
	} else {
		return '-';
	}
}

function parse_house_community($CI, $house) {
	if (isset($house['cid']) && isset($this->communitys['cid'])) {
		return $this->communitys['cid']['cname'];
	} else if (!isset($house['community']) || empty($house['community'])) {
		return '-';
	} else {
		return $house['community'];
	}
}

function parse_house_floor($CI, $house) {
	$floors = '';
	if (isset($house['floors'])) {
		$floors = '第' . $house['floors'] . '层';
	}
	$floors_total = '';
	if (isset($house['floors_total'])) {
		$floors_total = '共' . $floors_total . '层';
	}

	if (empty($floors) && empty($floors_total)) {
		return '-';
	}
	if (!empty($floors) && !empty($floors_total)) {
		return $floors . '/' . $floors_total;
	}
	return $floors . $floors_total;
}

?>
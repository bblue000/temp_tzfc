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



?>
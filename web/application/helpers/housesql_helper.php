<?php

defined('BASEPATH') OR exit('No direct script access allowed');


function to_where_str($conditions='', $CI)
{
	$wherearr = array();
	
		if ($conditions) {
			if (!is_array($conditions)) {
				$conditions = array($conditions => NULL);
			}
			foreach ($conditions as $k => $v) {
				$where = '';
				if ($v !== NULL)
				{
					$where .= $k . ' = ' . $CI->db->escape($v);
				} else {
					$where .= $k . ' IS NULL';
				}
				$wherearr[] = $where;
			}
        }
    return implode(' AND ', $wherearr);
}

?>
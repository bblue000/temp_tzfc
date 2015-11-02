<?php

class User_model extends CI_Model {
	
	// 表名
	const TABLE_NAME = 'tab_user';
	
	public function __construct() {
		$this->load->database();
	}
	
	public function get_users() {
		$query = $this->db->get($this::TABLE_NAME);
		return $query->result_array();
	}
	
	public function login() {
		$user_name = $this->input->post("user_name");
		$password = $this->input->post("password");
		$query = $this->db->get($this::TABLE_NAME);
		return $query->result_array();
	}
	
}

?>
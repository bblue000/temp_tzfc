<?php

class Admin_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
		
		$this->load->model('user_model');
	}
	
	public function get_users() {
		$query = $this->db->get('tab_user');
		return $query->result_array();
	}
	
	public function login($user) {
		return $this->user_model->login($user);
	}
	
	public function set_news() {
		$this->load->helper('url');

		$data = array(
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content')
		);
	
		return $this->db->insert('tab_news', $data);
	}
}

?>
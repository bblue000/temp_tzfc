<?php

class News_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	public function get_news() {
		$query = $this->db->get('tab_news');
		return $query->result_array();
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
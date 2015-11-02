<?php
class User extends MY_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}
	
	// ***********************************
	// as view controller
	// ***********************************
	public function index()
	{
		$data['users'] = $this->user_model->get_users();
		$this->load->view('template/template-admin-header', $data);
		$this->load->view('user/index', $data);
		$this->load->view('template/template-admin-footer', $data);
	}
	
	public function login() {
		
	}
	
	public function register() {
		
	}
	
	public function create() {
		//echo $this->config->item('base_url');
		$data["title"] = "";
		$this->load->view('news/create', $data);
	}
	
	public function validate_create() {
		$this->news_model->set_news();
		echo json_encode(array("code"=>"200",
		"msg"=>"OK"));
	}
	
	// ***********************************
	// for api
	// ***********************************
}

?>
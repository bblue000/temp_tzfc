<?php
class News extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('news_model');
        $this->load->helper('url_helper');
	}
	
	public function index()
	{
		//$this->load->view('welcome_message');
		$data['news'] = $this->news_model->get_news();
		$this->load->view('news/index', $data);
//		echo BASEPATH;
		//echo json_encode($data['news']);
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
}

?>
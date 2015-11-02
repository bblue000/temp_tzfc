<?php
class Pages extends CI_Controller {
	
	public function index()
	{
		//$this->load->view('welcome_message');
		echo "Hello World22222!";
	}
	
	public function view($page = 'home') {
		
		$data["title"] = "我是中国人";
		
		$data["content"] = "我爱中国";
		
		$this->load->view('pages/'.$page, $data);
	}
}

?>
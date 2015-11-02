<?php
class Admin extends MY_Controller {
	
	// 后台的管理登录界面
	const ADMIN_LOGIN = 'admin/login';
	
	public function __construct() {
		parent::__construct();
		$this->load->model('admin_model');
        $this->load->library('sessionaccess');
	}
	
	public function index()
	{
		//$this->load->view('welcome_message');
		if ($this->sessionaccess->check_login()) {
			$data['title'] = "后台管理系统";
			$this->load->view('template/template-admin-header', $data);
		} else {
			$this->login();
		}
	}
	
	public function login() {
		echo $this->db->escape("a'b;");
		if ($this->sessionaccess->check_login()) {
			// 直接跳到首页
			$this->index();
		} else {
			$input_user_name = $this->input->post('user_name');
			$input_user_pwd = $this->input->post('password');
			
			if (!$input_user_name || !$input_user_pwd) {
				$data['user_name'] = "";
				if (isset($input_user_name)) {
					$data['user_name'] = $input_user_name;
				}
				$this->load->view('template/template-admin-header', $data);
				$this->load->view('admin/login', $data);
				$this->load->view('template/template-admin-footer', $data);
			} else {
				$loginResult = $this->admin_model->login(array(
					'user_name' => $input_user_name,
					'password' => $input_user_pwd
				));
				
				echo $loginResult;
			}
		}
	}
	

}

?>
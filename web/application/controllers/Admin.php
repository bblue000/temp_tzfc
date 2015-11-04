<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
	
	// 后台的管理登录界面
	const ADMIN_LOGIN = 'admin/login';
	
	public function __construct() {
		parent::__construct();
		$this->load->model('admin_model');
	}
	
	// 显示管理当前用户所属组能够操作的管理后台界面
	public function index()
	{
		echo base_url();
		echo site_url();
		echo json_encode($this->sessionaccess->get_user_info());
		$this->load->helper('user_api');
		echo $this->apicode[90000];
		if ($this->sessionaccess->check_login()) {
			// 如果已经登录，则显示当前用户能够看到的管理界面
			$this->load->view('admin', $this->sessionaccess->get_user_info());
		} else {
			$this->load->view('admin/login');
		}
	}
	
	// 管理后台登陆
	public function login() {
		if ($this->sessionaccess->check_login()) {
			// 直接跳到首页
			redirect(base_url('admin'));
			return ;
		}

		// 获取所有的数据
		$post = $this->input->post(NULL,TRUE);

		$user_name = trim($post['username']);
		$password = trim($post['password']);

		
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
	
	// 管理后台注销登陆
	public function logout() {
		$this->sessionaccess->clear_user_info();
		$this->load->model('user_model');
		$this->User_model->logout();
	}

	// 用户注册，此处是经纪人注册
	public function register() {
		// 获取所有的数据
		$post = $this->input->post(NULL,TRUE);
	}

	// 加载验证码
	public function checkcode() {
		$this->load->library('checkcode');
	    $this->checkcode->show(function ($verify_code) {
	    	$this->session->set_userdata('verify_code', $verify_code);
	    });
	}


}

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 个人房源
 * 
 * 个人房源可以认为是临时用户
 * 
 */
class other extends MY_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('house');
	}

    public function addsell() {
        loadCommonInfos($this);
        $this->load->view('portal/other/addsell', $this);
    }
    
    public function addsell_ajax() {
        
    }




    public function addrent() {
		loadRentCommonInfos($this);
        $this->load->view('portal/other/addrent', $this);
    }
    
    public function addrent_ajax() {
        
    }

}

?>
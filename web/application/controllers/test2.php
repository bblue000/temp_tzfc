<?php


class test2 extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		phpinfo();
		
        print_r($this->test_ref());
        print_r("<br/>");

        $arr = array('mm' => 'xx');
        print_r($this->test_ref($arr));
        print_r("<br/>");
        print_r($arr);
	}

	public function test_ref($arr = array()) {
		$arr['mm'] = 'dada';
		return $arr;
	}

	public function test_to_select_str()
	{
		$this->load->database();
		$this->load->helper('housesql');

		$conditions = NULL;
		$sub_where = to_select_str($this, $conditions);
		print_r($sub_where);
		print_r("<br/>");

		$conditions = 'hid';
		$sub_where = to_select_str($this, $conditions);
		print_r($sub_where);
		print_r("<br/>");

		$conditions = array('hid');
		$sub_where = to_select_str($this, $conditions);
		print_r($sub_where);
		print_r("<br/>");

		$conditions = array('hid', 'title');
		$sub_where = to_select_str($this, $conditions);
		print_r($sub_where);
		print_r("<br/>");



		$conditions = NULL;
		$sub_where = to_select_str($this, $conditions, 'h.');
		print_r($sub_where);
		print_r("<br/>");

		$conditions = 'hid';
		$sub_where = to_select_str($this, $conditions, 'h.');
		print_r($sub_where);
		print_r("<br/>");

		$conditions = array('hid');
		$sub_where = to_select_str($this, $conditions, 'h.');
		print_r($sub_where);
		print_r("<br/>");

		$conditions = array('hid', 'title');
		$sub_where = to_select_str($this, $conditions, 'h.');
		print_r($sub_where);
		print_r("<br/>");


		$offset = 1;
		$page_size = 1;
		$sub_where = to_where_str($this, NULL);
		$sub_sql = "select * from tab_sellhouse where ". $sub_where ." order by hid limit {$offset},{$page_size}";
		$select = to_select_str($this, array('*'), 'h.') 
				. ', ' 
				. to_select_str($this, array('true_name', 'contact_mobile'), 'u.');
		$sql = "select {$select} from ($sub_sql) h, tab_user u where h.uid = u.uid;";
		print_r($sql);
		print_r("<br/>");
	}

	public function test_to_where_str() {
		$this->load->database();
		$this->load->helper('housesql');

		$conditions = NULL;
		$sub_where = to_where_str($this, $conditions);
		print_r($sub_where);
		
		print_r("<br/>");
		

		$conditions = array();
		$sub_where = to_where_str($this, $conditions);
		print_r($sub_where);
		
		print_r("<br/>");

		$conditions = array('uid' => '0', 'kw' => '41241341');
		$sub_where = to_where_str($this, $conditions);
		print_r($sub_where);
		
		print_r("<br/>");
	}

}

?>
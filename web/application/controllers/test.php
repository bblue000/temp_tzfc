<?php


class test extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = array();
		array_push($data, array(
					'type'  		=> 1,
					'title' 		=> '土豪金玩不腻 年会出彩预备站',
					'previewImage' 	=> 'http://192.168.1.112/public/tmp1.jpg',
					'videoUrl' 		=> ''
				)
			);
		array_push($data, array(
					'type'  		=> 2,
					'title' 		=> 'Iphone 6sssssss 你拥有了吗？！',
					'previewImage' 	=> 'http://192.168.1.112/public/vip1.png',
					'videoUrl' 		=> 'http://192.168.1.112/public/vip1.mp4'
				)
			);
		array_push($data, array(
					'type'  		=> 2,
					'title' 		=> '你若看得懂 我定给你送',
					'previewImage' 	=> 'http://192.168.1.112/public/vip2.png',
					'videoUrl' 		=> 'http://192.168.1.112/public/vip2.mp4'
				)
			);
		array_push($data, array(
					'type'  		=> 1,
					'title' 		=> '土豪金玩不腻 年会出彩预备站',
					'previewImage' 	=> 'http://192.168.1.112/public/tmp2.jpg',
					'videoUrl' 		=> ''
				)
			);
		array_push($data, array(
					'type'  		=> 1,
					'title' 		=> '土豪金玩不腻 年会出彩预备站',
					'previewImage' 	=> 'http://192.168.1.112/public/tmp3.jpg',
					'videoUrl' 		=> ''
				)
			);
		array_push($data, array(
					'type'  		=> 2,
					'title' 		=> '你若看得懂 我定给你送',
					'previewImage' 	=> 'http://192.168.1.112/public/vip3.png',
					'videoUrl' 		=> 'http://192.168.1.112/public/vip3.mp4'
				)
			);
		array_push($data, array(
					'type'  		=> 1,
					'title' 		=> '土豪金玩不腻 年会出彩预备站',
					'previewImage' 	=> 'http://192.168.1.112/public/tmp4.jpg',
					'videoUrl' 		=> ''
				)
			);
		array_push($data, array(
					'type'  		=> 2,
					'title' 		=> 'NOKIA 还记得吗？',
					'previewImage' 	=> 'http://192.168.1.112/public/vip4.png',
					'videoUrl' 		=> 'http://192.168.1.112/public/vip4.mp4'
				)
			);
		array_push($data, array(
					'type'  		=> 1,
					'title' 		=> '土豪金玩不腻 年会出彩预备站',
					'previewImage' 	=> 'http://192.168.1.112/public/tmp5.jpg',
					'videoUrl' 		=> ''
				)
			);
		array_push($data, array(
					'type'  		=> 1,
					'title' 		=> '土豪金玩不腻 年会出彩预备站',
					'previewImage' 	=> 'http://192.168.1.112/public/tmp6.jpg',
					'videoUrl' 		=> ''
				)
			);

	    echo json_encode($data);
		// $this->load->view('test', $this);
	}

}

?>
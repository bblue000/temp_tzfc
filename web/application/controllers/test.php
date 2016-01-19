<?php


class test extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		phpinfo();
		$result = array(
			'code' => 200,
			'msg'  => 'ok'
		);

		$data = array();

		// for ($i=0; $i < 4; $i++) { 
		// 	# code...
		// 	array_push($data, array(
		// 			'type'  		=> 1,
		// 			'title' 		=> '土豪金玩不腻 年会出彩预备站',
		// 			'previewImage' 	=> 'http://10.101.54.106/public/tmp'.($i + 1).'.jpg',
		// 			'videoUrl' 		=> ''
		// 		)
		// 	);
		// }
		// for ($i=0; $i < 5; $i++) { 
		// 	# code...
		// 	array_push($data, array(
		// 			'type'  		=> 1,
		// 			'title' 		=> '土豪金玩不腻 年会出彩预备站',
		// 			'previewImage' 	=> 'http://10.101.54.106/public/vip'.$i.'.jpg',
		// 			'videoUrl' 		=> ''
		// 		)
		// 	);
		// }
		
		array_push($data, array(
				'type'  		=> 1,
				'title' 		=> '土豪金玩不腻 年会出彩预备站',
				'previewImage' 	=> 'http://10.101.54.106/public/tmp1.jpg',
				'videoUrl' 		=> ''
			)
		);


		array_push($data, array(
					'type'  		=> 2,
					'title' 		=> 'Iphone 6sssssss 你拥有了吗？！',
					'previewImage' 	=> 'http://10.101.54.106/public/vip1.png',
					'videoUrl' 		=> 'http://10.101.54.106/public/vip1.mp4'
				)
			);
		array_push($data, array(
					'type'  		=> 2,
					'title' 		=> '你若看得懂 我定给你送',
					'previewImage' 	=> 'http://10.101.54.106/public/vip2.png',
					'videoUrl' 		=> 'http://10.101.54.106/public/vip2.mp4'
				)
			);
		array_push($data, array(
					'type'  		=> 1,
					'title' 		=> '土豪金玩不腻 年会出彩预备站',
					'previewImage' 	=> 'http://10.101.54.106/public/tmp2.jpg',
					'videoUrl' 		=> ''
				)
			);
		array_push($data, array(
					'type'  		=> 1,
					'title' 		=> '土豪金玩不腻 年会出彩预备站',
					'previewImage' 	=> 'http://10.101.54.106/public/tmp3.jpg',
					'videoUrl' 		=> ''
				)
			);
		array_push($data, array(
					'type'  		=> 2,
					'title' 		=> '你若看得懂 我定给你送',
					'previewImage' 	=> 'http://10.101.54.106/public/vip3.png',
					'videoUrl' 		=> 'http://10.101.54.106/public/vip3.mp4'
				)
			);
		array_push($data, array(
					'type'  		=> 1,
					'title' 		=> '土豪金玩不腻 年会出彩预备站',
					'previewImage' 	=> 'http://10.101.54.106/public/tmp4.jpg',
					'videoUrl' 		=> ''
				)
			);
		array_push($data, array(
					'type'  		=> 2,
					'title' 		=> 'NOKIA 还记得吗？',
					'previewImage' 	=> 'http://10.101.54.106/public/vip4.png',
					'videoUrl' 		=> 'http://10.101.54.106/public/vip4.mp4'
				)
			);
		array_push($data, array(
					'type'  		=> 1,
					'title' 		=> '土豪金玩不腻 年会出彩预备站',
					'previewImage' 	=> 'http://10.101.54.106/public/tmp5.jpg',
					'videoUrl' 		=> ''
				)
			);
		array_push($data, array(
					'type'  		=> 1,
					'title' 		=> '土豪金玩不腻 年会出彩预备站',
					'previewImage' 	=> 'http://10.101.54.106/public/tmp6.jpg',
					'videoUrl' 		=> ''
				)
			);

		// for ($i=0; $i < 16; $i++) { 
		// 	# code...
		// 	array_push($data, array(
		// 			'type'  		=> 1,
		// 			'title' 		=> '测试视频标题'.($i + 1),
		// 			'previewImage' 	=> 'http://10.101.54.106/public/vip'.($i % 5).'.jpg',
		// 			'videoUrl' 		=> 'http://10.101.54.106/public/vip'.($i + 1).'.mp4',
		// 		)
		// 	);
		// }
		$result['data'] = $data;
		
		echo json_encode($data);
		// print_r($result);
	}

}

?>
<!-- Header -->
<?php $this->load->view('portal/template/template-portal-header'); ?>

    <script type="text/javascript">
	var localHouseConfig = {
		url : '<?php echo base_url('other/addsell/ajax'); ?>',
		successMsg : '房源添加成功'
	};
	</script>

    <link href="public/css/admin/admin.common.css" rel="stylesheet" type="text/css">
    
    <style>
    body {
        font-family: 'Hiragino Sans GB','Microsoft YaHei','黑体',sans-serif;
        font-size: 14px;
        line-height: 1.428571429;
        color: #333;
        min-width: 980px;
        background: #eeeff1;
    }
    </style>

    <section>
		<div class="sub-container fixed-sub-container">
    		<div id="house-container">
    			<h3>房源管理 <small>添加出售房源</small></h3>
    
    			<?php $this->load->view('admin/house/editor-sell'); ?>
    
    		</div>
        </div>
    </section>

	<script type="text/javascript" src="public/scripts/admin/admin.common.js"></script>

	<div class="section-sep"></div>

	<script type="text/javascript">

	</script>


<!-- Footer -->
<?php $this->load->view('portal/template/template-portal-footer'); ?>
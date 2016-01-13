<aside id="sidebar">
	<nav id="main-nav">
		<a href="<?php echo base_url("admin"); ?>" class="ico-home"></a>
		<a href="javascript:void(0)" class="ico-nav" data-id="sn-house">管理房源</a>
		<a href="<?php echo base_url("adminuser/edit_password"); ?>" class="ico-nav" >修改密码</a>
		<a href="<?php echo base_url("adminuser/edit"); ?>" class="ico-nav" >修改资料</a>
		<a href="javascript:void(0)" class="ico-nav" data-id="sn-common">公共信息</a>
	</nav>
	<nav class="sub-nav" id="sn-house">
		<dd><a href="<?php echo base_url("adminhouse/sell_index"); ?>">出售房源列表</a></dd>
		<dd><a href="<?php echo base_url("adminhouse/add_sell"); ?>">添加出售房源</a></dd>
		<div style="width: 100%; height: 2px; background: #fff"></div>
		<dd><a href="<?php echo base_url("adminhouse/rent_index"); ?>">出租房源列表</a></dd>
		<dd><a href="<?php echo base_url("adminhouse/add_rent"); ?>">添加出租房源</a></dd>
	</nav>
	<nav class="sub-nav" id="sn-common">
		<dd><a href="<?php echo base_url("admincommon/area"); ?>">管理区域</a></dd>
		<dd><a href="<?php echo base_url("admincommon/community"); ?>">管理小区</a></dd>
	</nav>
</aside>
<script>
(function() {
	
	var mainNav = $("#main-nav"),
	    subNav = $(".sub-nav");
	
	mainNav.on("mouseover", "a", function() {
		
		var ts = $(this);
		
		subNav.hide();
		$("#" + ts.data("id")).css("top", ts.position().top).fadeIn(300);
	});
		
	subNav.on("mouseleave", function() {
		
		mainNav.find("a").removeClass("curr");
		subNav.hide();
	});

})();
</script>
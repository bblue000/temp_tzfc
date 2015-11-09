<aside id="sidebar">
	<nav id="main-nav">
		<a href="<?php echo base_url("admin"); ?>" class="ico-home"></a>
		<a href="#" class="ico-nav" data-id="sn-house">管理房源</a>
		<a href="<?php echo base_url("adminuser/edit_password"); ?>" class="ico-nav" >修改密码</a>
		<a href="<?php echo base_url("adminuser/edit"); ?>" class="ico-nav" >修改资料</a>
	</nav>
	<nav class="sub-nav" id="sn-house">
		<dd><a href="<?php echo base_url("adminhouse/list"); ?>">房源列表</a></dd>
		<dd><a href="<?php echo base_url("adminhouse/add"); ?>">添加房源</a></dd>
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
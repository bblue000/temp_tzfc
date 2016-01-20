<!-- Header -->
<?php $this->load->view('portal/template/template-portal-header'); ?>

	<link href="public/css/portal/index-listing-filter.css" rel="stylesheet" type="text/css">
	<!-- content -->

	<section>
		<div class="top-tab">
			<ul>
				<li>
					<a class="active" href="">出售房源</a>
				</li>
				<li>
					<a href="">出租房源</a>
				</li>
			</ul>
		</div>
		<form id="listing-filters" class="sub-container fixed-sub-container">
			<fieldset>
				<span class="legend">区域</span>
				<div class="links">
					<a class="checked" href="">1</a>
					<a href="">2</a>
					<a href="">3</a>
					<a href="">4</a>
					<span class="range">
						<label>自定义：</label>
						<input type="text" class="number" />
						<label>~</label>
						<input type="text" class="number" />
						<label class="unit">平方米</label>
						<input type="submit" value="筛选" class="filter-button" />
					</span>
				</div>
			</fieldset>
			<fieldset>
				<span class="legend">面积</span>
				<div></div>
			</fieldset>
			<fieldset>
				<span class="legend">户型</span>
				<div></div>
			</fieldset>
			<fieldset>
				<span class="legend">售价</span>
				<div></div>
			</fieldset>
			<fieldset>
				<span class="legend">装修</span>
				<div></div>
			</fieldset>
			<fieldset>
				<span class="legend">楼层</span>
				<div></div>
			</fieldset>
			<div style="border-top: 1px solid #ddd; "></div>
			<fieldset>
				<span class="legend">热门小区</span>
				<div ></div>
			</fieldset>
			<fieldset class="search-fieldset">
				<input type="text" placeholder="搜索关键词"/>
				<button type="submit">
					<i class="glyphicon-search"></i>
				</button>
			</fieldset>
		</form>
	</section>

	<div class="section-sep"></div>

	<link href="public/css/portal/index-list.css" rel="stylesheet" type="text/css">

	<section>
		<div id="listing-result" class="sub-container fixed-sub-container">
			<div class="listing-result-hint">共搜到<span class="highlight">1</span>条房源</div>
			<ul id="house-list">
				<li>
					<a class="media-cap" href="" target="_blank">
						<img src="public/img/portal/list_default_house_img.png"/>
					</a>
					<div class="media-body">
						<div class="media-body-title">
							<span class="highlight">48万元</span>
							<a class="house-title" href="" target="_blank">Title</a>
						</div>
						<div class="house-info">城中-XX小区 &nbsp;&nbsp;&nbsp;&nbsp; X室&nbsp;/&nbsp;XX㎡&nbsp;/&nbsp;2016-01-18 14:39:44</div>
						<div class="house-info">经纪人：xxx &nbsp;&nbsp;&nbsp;&nbsp; 联系电话：213456789..</div>
					</div>
				</li>
			</ul>
		</div>
	</section>

	<section id="listing-pager" class="fixed-sub-container">
		<ul>
			<li class="checked"><span>1</span></li>
			<li><span>2</span></li>
			<li><span>3</span></li>
			<li><span>4</span></li>
			<li><span>5</span></li>
			<li><span>6</span></li>
			<li><span>7</span></li>
			<li><span>8</span></li>
			<li><span>9</span></li>
			<li><span>...</span></li>
			<li><span>99</span></li>
			<li><span>100</span></li>
			<li><span>下一页</span></li>
		</ul>
	</section>

	<script type="text/javascript">

	</script>


<!-- Footer -->
<?php $this->load->view('portal/template/template-portal-footer'); ?>
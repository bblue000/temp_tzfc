<!-- Header -->
<?php $this->load->view('portal/template/template-portal-header'); ?>

	<!-- content -->
	<link href="public/css/portal/index-listing-filter.css" rel="stylesheet" type="text/css">

	<section>
		<div class="top-tab">
			<ul>
				<li>
					<a class="active" href="javascript:;">出售房源</a>
				</li>
				<li>
					<a href="renthouse">出租房源</a>
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

	<?php $this->load->view('portal/house-list-result', array('item_url' => 'sellhouse')); ?>

<!-- Footer -->
<?php $this->load->view('portal/template/template-portal-footer'); ?>
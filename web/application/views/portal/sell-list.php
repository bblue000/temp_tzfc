<!-- Header -->
<?php $this->load->view('portal/template/template-portal-header'); ?>

	<!-- content -->
	<link href="public/css/portal/index-listing-filter.css" rel="stylesheet" type="text/css">

	<section>
		<div class="top-tab fixed-sub-container">
			<ul>
				<li>
					<a class="active" href="javascript:;">出售房源</a>
				</li>
				<li>
					<a href="renthouse">出租房源</a>
				</li>
			</ul>
		</div>

		<div id="listing-filters" class="sub-container fixed-sub-container">
		<?php if (isset($filters_area)) :?>
			<fieldset>
				<span class="legend">区域</span>
				<div class="links">
				<?php foreach ($filters_area as $area_id => $area) : ?>
					<?php if ($filters['area'] == $area_id) :?>
						<a class="checked"><?php print_r($area['area_name']); ?></a>
					<?php else : ?>
						<a href="javascript:performFilter('area', <?php print_r($area_id); ?>);"><?php print_r($area['area_name']); ?></a>
					<?php endif; ?>
				<?php endforeach; ?>
				</div>
			</fieldset>
		<?php endif; ?>

		<?php if (isset($filters_size)) :?>
			<fieldset>
				<span class="legend">面积</span>
				<div class="links">
				<?php foreach ($filters_size as $index => $size_name) : ?>
					<?php if ($filters['size'] == $index) :?>
						<a class="checked"><?php print_r($size_name); ?></a>
					<?php else : ?>
						<a href="javascript:performFilter('size', <?php print_r($index); ?>);"><?php print_r($size_name); ?></a>
					<?php endif; ?>
				<?php endforeach; ?>
				</div>
			</fieldset>
		<?php endif; ?>

		<?php if (isset($filters_room)) :?>
			<fieldset>
				<span class="legend">户型</span>
				<div class="links">
				<?php foreach ($filters_room as $index => $room_name) : ?>
					<?php if ($filters['room'] == $index) :?>
						<a class="checked"><?php print_r($room_name); ?></a>
					<?php else : ?>
						<a href="javascript:performFilter('room', <?php print_r($index); ?>);"><?php print_r($room_name); ?></a>
					<?php endif; ?>
				<?php endforeach; ?>
				</div>
			</fieldset>
		<?php endif; ?>

		<?php if (isset($filters_price)) :?>
			<fieldset>
				<span class="legend">售价</span>
				<div class="links">
				<?php foreach ($filters_price as $index => $sell_price) : ?>
					<?php if ($filters['price'] == $index) :?>
						<a class="checked"><?php print_r($sell_price); ?></a>
					<?php else : ?>
						<a href="javascript:performFilter('price', <?php print_r($index); ?>);"><?php print_r($sell_price); ?></a>
					<?php endif; ?>
				<?php endforeach; ?>
				</div>
			</fieldset>
		<?php endif; ?>

		<?php if (isset($filters_decor)) :?>
			<fieldset>
				<span class="legend">装修</span>
				<div class="links">
				<?php foreach ($filters_decor as $index => $decor) : ?>
					<?php if ($filters['decor'] == $index) :?>
						<a class="checked"><?php print_r($decor); ?></a>
					<?php else : ?>
						<a href="javascript:performFilter('decor', <?php print_r($index); ?>);"><?php print_r($decor); ?></a>
					<?php endif; ?>
				<?php endforeach; ?>
				</div>
			</fieldset>
		<?php endif; ?>

		<?php if (isset($filters_floor)) :?>
			<fieldset>
				<span class="legend">楼层</span>
				<div class="links">
				<?php foreach ($filters_floor as $index => $floor) : ?>
					<?php if ($filters['floor_from'] == $filters['floor_to'] && $filters['floor_from'] == $index) :?>
						<a class="checked"><?php print_r($floor); ?></a>
					<?php else : ?>
						<a href="javascript:performFilter('floor', <?php print_r($index); ?>);"><?php print_r($floor); ?></a>
					<?php endif; ?>
				<?php endforeach; ?>
					<span class="range">
						<label>自定义：</label>
						<input type="text" class="number" />
						<label>~</label>
						<input type="text" class="number" />
						<label class="unit">楼</label>
						<input type="submit" value="筛选" class="filter-button" />
					</span>
				</div>
			</fieldset>
		<?php endif; ?>

			<div style="border-top: 1px solid #ddd; "></div>

		<?php if (isset($filters_community)) :?>
			<fieldset>
				<span class="legend">热门小区</span>
				<div class="links">
				<?php foreach ($filters_community as $community_id => $community) : ?>
					<?php if ($filters['community'] == $community_id) :?>
						<a class="checked"><?php print_r($community['cname']); ?></a>
					<?php else : ?>
						<a href="javascript:performFilter('community', <?php print_r($community_id); ?>);"><?php print_r($community['cname']); ?></a>
					<?php endif; ?>
				<?php endforeach; ?>
				</div>
			</fieldset>
		<?php endif; ?>

			<fieldset class="search-fieldset">
				<form id="xxx" action="sellhouse">

				<?php foreach ($filters as $key => $value) : ?>
					<input type="hidden" name="<?php print_r($key); ?>" value="<?php print_r($value); ?>"/>
				<?php endforeach; ?>

					<input type="text" name="kw" placeholder="搜索关键词"/>
					<button type="submit" onclick="return submitFilter();">
						<i class="glyphicon-search"></i>
					</button>
				</form>
				
			</fieldset>
		</div>
	</section>

	<div class="section-sep"></div>

	<?php $this->load->view('portal/house-list-result', array('item_url' => 'sellhouse')); ?>

<!-- Footer -->
<?php $this->load->view('portal/template/template-portal-footer'); ?>
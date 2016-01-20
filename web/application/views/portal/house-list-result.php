	<section>
		<div id="listing-result" class="sub-container fixed-sub-container">
			<div class="listing-result-hint">共搜到<span class="highlight"><?php print_r($result_num); ?></span>条房源</div>
			<?php if ($result_num > 0) : ?>
				<ul id="house-list">
				<?php foreach ($houses as $house) : ?>
				<li>
					<?php $item_url_path = "{$item_url}/{$house['hid']}" ; ?>
					<a class="media-cap" href="<?php print_r($item_url_path); ?>" target="_blank">
						<?php if (empty($house['images'])) : ?>
						<img src="public/img/portal/list_default_house_img.png"/>
						<?php else : ?>
						<img src="<?php print_r($house['images']); ?>"/>
						<?php endif ; ?>
					</a>
					<div class="media-body">
						<div class="media-body-title">
							<span class="highlight"><?php print_r($house['price']); ?>万元</span>
							<a class="house-title" href="<?php print_r($item_url_path); ?>" target="_blank"><?php print_r($house['title']); ?></a>
						</div>
						<div class="house-info">
						<?php print_r($house['subinfo_area']); ?> 
						<?php if (!empty($house['subinfo_house'])) : ?>
						&nbsp;&nbsp;&nbsp;&nbsp; <?php print_r(implode('&nbsp;/&nbsp;', $house['subinfo_house'])); ?>
						<?php endif ; ?>
						</div>
						<div class="house-info">经纪人：<?php print_r($house['poster_name']); ?> &nbsp;&nbsp;&nbsp;&nbsp; 联系电话：<?php print_r($house['poster_mobile']); ?></div>
					</div>
				</li>
				<?php endforeach ; ?>
				</ul>
			<?php endif ; ?>
		</div>
	</section>
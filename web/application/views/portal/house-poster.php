		<div class="sidebar">
			<div class="poster-info-container">
				<div class="avatar">
					<a href="javascript:;">
						<?php if (!isset($house['poster']['avatar']) || empty($house['poster']['avatar'])) : ?>
							<?php if (!isset($house['poster']['sex']) || empty($house['poster']['sex'])) : ?>
						<div class="avatar-placeholder man"></div>
							<?php else : ?>
						<div class="avatar-placeholder woman"></div>
							<?php endif; ?>
						<?php else : ?>
						<img src="<?php print_r($house['poster']['avatar']); ?>" />
						<?php endif; ?>
					</a>
				</div>
				<div class="poster-name">
					<span>经纪人：<?php print_r($house['poster']['true_name']); ?></span>
				</div>
				<div class="poster-detail">
					<span>手机：<?php print_r($house['poster']['contact_mobile']); ?></span>
				</div>
				<div class="poster-detail">
					<span>邮箱：<?php print_r($house['poster']['email']); ?></span>
				</div>
				<!--
				<div class="poster-detail">
					<span><a href="javascript:;">查看“<?php print_r($house['poster']['true_name']); ?>”的所有房源>></a></span>
				</div>
				-->

				<?php if (isset($house['poster']['qqchat']) && !empty($house['poster']['qqchat'])) : ?>
				<div class="poster-detail">
					<span><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php print_r($house['poster']['qqchat']); ?>&site=tzfc.com&menu=yes" target="_blank">
					<img border="0" src="http://wpa.qq.com/pa?p=2:<?php print_r($house['poster']['qqchat']); ?>:41" alt="我是<?php print_r($house['poster']['true_name']); ?>，请给我发消息" title="我是<?php print_r($house['poster']['true_name']); ?>，请给我发消息"/>
					</a></span>
				</div>
				<?php endif; ?>
				
				<div class="poster-detail">
					<div class="empty-placeholder"></div>
				</div>
				<!--
				<div class="poster-detail wx">
					<img src="" />
					<br/>
					<span>扫描微信二维码，加我为好友</span>
				</div>
				-->
			</div>
		</div>
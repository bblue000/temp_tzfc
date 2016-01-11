			<?php $tabIndex = 1; ?>
			<table class="table table-bordered table-striped house-edit-container">
				<tr>
					<th><small>*</small><label>小区</label></th>
					<td>
						<div class="house-edit-input-container">
							<div class="house-selectordef" style="width:160px" tabindex="<?php echo $tabIndex++; ?>">
								<div class="title">
									<span id="inputArea" class="seled" data-field="aid" data-trtitle="1">选择区域(非必选)</span>
									<div class="arrow"></div>
								</div>
								<?php if (isset($areas)) : ?>
									<div class="house-optiondef" style="display:none; width:172px" >
										<ul>
											<li data-id="0">请选择区域</li>
											<?php foreach ($areas as $key => $value) : ?>
												<li data-id="<?php echo $key; ?>"><?php echo $value['area_name']; ?></li>
											<?php endforeach; ?>
										</ul>
									</div>
								<?php endif; ?>
							</div>

							<div class="house-related-long" style="height: 34px; display: inline-block; float: left;">
								<input type="text" name="community" id="inputComm" class="form-control" style="width: 100%;" placeholder="只填写小区名，例财富广场, cfgc" tabindex="<?php echo $tabIndex++; ?>" autofocus>
						
								<div class="house-tooltip" style="display: none;">
									<ul class="house-autoCompleteul">
										<?php if (isset($communitys)) : ?>
										<?php foreach ($communitys as $key => $value) : ?>
										<li data-id="<?php echo $key; ?>" data-pinyin="<?php echo $value['pinyin']; ?>" data-name="<?php echo $value['cname']; ?>"><?php echo $value['cname']; ?></li>
										<?php endforeach; ?>
										<?php endif; ?>
									</ul>
								</div>
							</div>
							
						</div>
					</td>
				</tr>
				<tr>
					<th><small>*</small>房屋户型</th>
					<td>
						<div class="house-edit-input-container">
							<div class="house-input_text_wrap">
								<input type="text" name="rooms" id="inputHouseRooms" maxlength="1" class="house-related-short" tabindex="<?php echo $tabIndex++; ?>">
								<span>室</span>
							</div>
							<div class="house-input_text_wrap">
								<input type="text" name="halls" id="inputHouseHalls" maxlength="1" class="house-related-short" tabindex="<?php echo $tabIndex++; ?>">
								<span>厅</span>
							</div>
							<div class="house-input_text_wrap">
								<input type="text" name="bathrooms" id="inputHouseBathrooms" maxlength="1" class="house-related-short" tabindex="<?php echo $tabIndex++; ?>">
								<span>卫</span>
							</div>

							<div class="house-input_text_wrap">
								<span>共</span>
								<input type="text" name="size" id="inputHouseSize" class="house-related-short" tabindex="<?php echo $tabIndex++; ?>">
								<span>㎡(<small>*支持两位小数</small>)</span>
							</div>
						</div>
					</td>
				</tr>

				<?php if (isset($rent_types)) : ?>
				<tr>
					<th><small>*</small>出租方式</th>
					<td>
						<div id="house-edit-input-container">
				<?php foreach ($rent_types as $key => $value) : ?>
							<label class="radio-inline">
								<input type="radio" name="rent_type" value="<?php echo $key; ?>"> <?php echo $value; ?>
							</label>
				<?php endforeach; ?>
						</div>
					</td>
				</tr>
				<?php endif; ?>

				<tr>
					<th><small>*</small>租金</th>
					<td>
						<div class="house-edit-input-container">
							<div class="house-input_text_wrap">
								<input type="text" name="price" id="inputHousePrice" class="house-related-short" tabindex="<?php echo $tabIndex++; ?>" value="面议">
								<span>元/月(<small>*整数</small>)</span>
							</div>

							<div class="house-selectordef" style="width:160px" tabindex="<?php echo $tabIndex++; ?>">
								<div class="title">
									<span id="inputRentPayType" class="seled" data-field="rentpay_type" data-trtitle="1">选择区域(非必选)</span>
									<div class="arrow"></div>
								</div>
								<?php if (isset($areas)) : ?>
									<div class="house-optiondef" style="display:none; width:172px" >
										<ul>
											<li data-id="0">面议</li>
											<?php foreach ($areas as $key => $value) : ?>
												<li data-id="<?php echo $key; ?>"><?php echo $value['area_name']; ?></li>
											<?php endforeach; ?>
										</ul>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</td>
				</tr>
				

				<tr>
					<th><small>*</small>房源标题(<small>*可自动生成</small>)</th>
					<td>
						<div class="house-edit-input-container form-inline">
							<input type="text" name="title" id="inputHouseTitle" maxlength="50" class="form-control house-related-long" tabindex="<?php echo $tabIndex++; ?>" disabled>

							<button class="btn btn-warning" onclick="enableTitle(this);">编辑</button>
						</div>
					</td>
				</tr>

				<!-- 额外的一些信息㎡ -->
				<tr>
					<th>楼层</th>
					<td>
						<div class="house-edit-input-container">
							<div class="house-input_text_wrap">
								<span>第</span>
								<input type="text" name="floors" id="inputHouseFloor" class="house-related-short" tabindex="<?php echo $tabIndex++; ?>">
								<span>层(<small>地下室用负数，例：-3</small>）</span>
							</div>
							<div class="house-input_text_wrap">
								<span>共</span>
								<input type="text" name="floors_total" id="inputHouseTotalFloor" class="house-related-short" tabindex="<?php echo $tabIndex++; ?>">
								<span>层</span>
							</div>
						</div>
					</td>
				</tr>


				<tr>
					<th>类型</th>
					<td>
						<div class="house-edit-input-container clearfix">
							<div class="house-selectordef" tabindex="<?php echo $tabIndex++; ?>">
								<div class="title">
									<span class="seled" data-field="house_type">请选择类型</span>
									<div class="arrow"></div>
								</div>
								<?php if (isset($house_types)) : ?>
									<div class="house-optiondef" style="display:none;" >
										<ul>
											<li data-id="0">请选择类型</li>
											<?php foreach ($house_types as $key => $value) : ?>
												<li data-id="<?php echo $key; ?>"><?php echo $value; ?></li>
											<?php endforeach; ?>
										</ul>
									</div>
								<?php endif; ?>
							</div>

							<div class="house-selectordef" tabindex="<?php echo $tabIndex++; ?>">
								<div class="title">
									<span id="inputDecor" class="seled" data-field="decor" data-trtitle="1">请选择装修情况</span>
									<div class="arrow"></div>
								</div>
								<?php if (isset($house_decors)) : ?>
									<div class="house-optiondef" style="display:none;" >
										<ul>
											<li data-id="0">请选择装修情况</li>
											<?php foreach ($house_decors as $key => $value) : ?>
												<li data-id="<?php echo $key; ?>"><?php echo $value; ?></li>
											<?php endforeach; ?>
										</ul>
									</div>
								<?php endif; ?>
							</div>

							<div class="house-selectordef" tabindex="<?php echo $tabIndex++; ?>">
								<div class="title">
									<span class="seled" data-field="orientation">请选择朝向</span>
									<div class="arrow"></div>
								</div>
								<?php if (isset($house_orientations)) : ?>
									<div class="house-optiondef" style="display:none;" >
										<ul>
											<li data-id="0">请选择朝向</li>
											<?php foreach ($house_orientations as $key => $value) : ?>
												<li data-id="<?php echo $key; ?>"><?php echo $value; ?></li>
											<?php endforeach; ?>
										</ul>
									</div>
								<?php endif; ?>
							</div>

						</div>
					</td>
				</tr>


				<!-- 详细信息 -->
				<tr>
					<th>详细介绍</th>
					<td>
						<div class="house-edit-input-container">
							<textarea name="details" id="inputDetails" class="form-control house-related-long" rows="5" placeholder="" tabindex="<?php echo $tabIndex++; ?>"></textarea>
						</div>
					</td>
				</tr>

				<tr>
					<th></th>
					<td>
						<div class="house-edit-input-container">
							<button class="btn btn-lg btn-primary btn-block login-btn house-related-short" type="submit" onClick="return checkInput()">提交</button>
						</div>
					</td>
				</tr>
			</table>

			<script type="text/javascript" src="public/scripts/admin/adminhouse.validate.js"></script>
			<script type="text/javascript" src="public/scripts/admin/adminrenthouse.validate.js"></script>

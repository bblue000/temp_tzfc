			<?php $tabIndex = 1; ?>
			<table class="table table-bordered table-striped house-edit-container">
				<tr>
					<th><label>小区</label></th>
					<td>
						<div class="house-edit-input-container">
							
							<input type="text" name="community" id="inputComm" class="form-control house-related-long" autofocus placeholder="只填写小区名，例财富广场, cfgc" tabindex="<?php echo $tabIndex++; ?>">
							
							<div class="house-tooltip">
								<ul class="house-autoCompleteul">
									<li r="11383" m="5512" k="山水华庭" valueid="1882" class="">
										<b>山水</b>华庭<cite>长江中路99号（长江路与向阳路交汇处往南100米）</cite>
									</li>
									<li r="16" m="11863" k="山水森林" valueid="315550" class="">
										<b>山水</b>森林<cite>马鞍山路与鹿城路交汇处</cite>
									</li>
								</ul>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<th>房屋户型</th>
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
				<tr>
					<th>价格(<small>*支持两位小数</small>)</th>
					<td>
						<div class="house-edit-input-container">
							<div class="house-input_text_wrap">
								<span>总价</span>
								<input type="text" id="inputHouseTotal" class="house-related-short" tabindex="<?php echo $tabIndex++; ?>">
								<span>万(<small>*支持两位小数</small>)</span>
							</div>
							<div class="house-input_text_wrap">
								<span>单价</span>
								<input type="text" id="inputHouseUnitPrice" class="house-related-short" tabindex="<?php echo $tabIndex++; ?>">
								<span>元/㎡(<small>*整数</small>)</span>
							</div>
						</div>
					</td>
				</tr>
				

				<tr>
					<th>房源标题(<small>*可自动生成</small>)</th>
					<td>
						<div class="house-edit-input-container form-inline">
							<input type="text" id="inputHouseTitle" maxlength="50" class="form-control house-related-long" tabindex="<?php echo $tabIndex++; ?>" disabled>

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
								<input type="text" name="floor" id="inputHouseFloor" class="house-related-short" tabindex="<?php echo $tabIndex++; ?>">
								<span>层(<small>地下室用负数，例：-3</small>）</span>
							</div>
							<div class="house-input_text_wrap">
								<span>共</span>
								<input type="text" name="total_floor" id="inputHouseTotalFloor" class="house-related-short" tabindex="<?php echo $tabIndex++; ?>">
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
									<span class="seled" data-field="decor">请选择装修情况</span>
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


				<tr>
					<th>产权</th>
					<td>
						<div class="house-edit-input-container">
							<div class="house-selectordef" tabindex="<?php echo $tabIndex++; ?>">
								<div class="title">
									<span class="seled" data-field="rights_len">请选择产权年限</span>
									<div class="arrow"></div>
								</div>
								<?php if (isset($rights_lens)) : ?>
									<div class="house-optiondef" style="display:none;" >
										<ul>
											<li data-id="0">请选择产权年限</li>
											<?php foreach ($rights_lens as $key => $value) : ?>
												<li data-id="<?php echo $key; ?>"><?php echo $value; ?></li>
											<?php endforeach; ?>
										</ul>
									</div>
								<?php endif; ?>
							</div>


							<div class="house-selectordef" tabindex="<?php echo $tabIndex++; ?>">
								<div class="title">
									<span class="seled" data-field="rights_type">请选择产权</span>
									<div class="arrow"></div>
								</div>
								<?php if (isset($rights_types)) : ?>
									<div class="house-optiondef" style="display:none;" >
										<ul>
											<li data-id="0">请选择产权</li>
											<?php foreach ($rights_types as $key => $value) : ?>
												<li data-id="<?php echo $key; ?>"><?php echo $value; ?></li>
											<?php endforeach; ?>
										</ul>
									</div>
								<?php endif; ?>
							</div>

							<div class="house-input_text_wrap">
								<input type="text" name="rights_from" id="inputHouseRightsFrom" class="house-related-short" placeholder="建筑年代" tabindex="<?php echo $tabIndex++; ?>">
								<span>年(<small>*如：2010</small>)</span>
							</div>
						</div>
					</td>
				</tr>



				<!-- 更次一级的信息 -->
				<tr>
					<th>小学学区</th>
					<td>
						<div class="house-edit-input-container">
							<input type="text" name="primary_school" id="inputPrimary" class="form-control house-related-long" tabindex="<?php echo $tabIndex++; ?>">
						</div>
					</td> 
				</tr>
				<tr>
					<th>初中学区</th>
					<td>
						<div class="house-edit-input-container">
							<input type="text" name="junior_school" id="inputJunior" class="form-control house-related-long" tabindex="<?php echo $tabIndex++; ?>" >
						</div>
					</td>
				</tr>


				<!-- 详细信息 -->
				<tr>
					<th>详细介绍</th>
					<td>
						<div class="house-edit-input-container">
							<textarea name="details" id="inputDetail" class="form-control house-related-long" rows="5" placeholder="" tabindex="<?php echo $tabIndex++; ?>"></textarea>
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


			<script type="text/javascript">
			function registerListeners(myTarget) {
				var selLabel = myTarget.find('.seled');
				var optiondef = myTarget.find('.house-optiondef');
				var optiondefLi = optiondef.find('ul li');
				if (optiondef && optiondefLi) {
					myTarget.focus(function() {
						optiondef.show();
					}).blur(function() {
						optiondef.hide();
					});
					optiondefLi.click(function() {
						var who = $(this);
						selLabel.text(who.text());

						if (who.data('id') == '0') {
							selLabel.removeData('valueid');
						} else {
							selLabel.data('valueid', who.data('id'));
						}

						optiondef.hide();
					});
				} 
			}

			// 分别给含有选项的属性注册选择器
			$('.house-selectordef').each(function() {
				registerListeners($(this));
			});

			// 验证
			var inputComm = $('#inputComm');
			function checkInput() {
				var result = '';
				var val = $.trim(inputComm.val());
				if (val == '') {
					showToast('请选择小区');
					inputComm.focus();
					return false;
				}
				result = 'community=' + val;

				var selLabels = $('.house-selectordef .seled');
				var optionSelections = [];
				selLabels.each(function() {
					var who = $(this);
					var whoField = who.data('field');
					if (who.data('valueid')) {
						optionSelections.push(whoField + '=' + who.data(whoField));
					}
				});
				var optionSelectionsStr = $.trim(optionSelections.join('&'));
				console.log(optionSelectionsStr);
				if (optionSelectionsStr != '') {
					result += ('&' + optionSelectionsStr);
				}
				simplePost(base_url('adminhouse/add_sell/ajax'), result);
				return true;
			}
			</script>
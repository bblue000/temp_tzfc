			<?php $tabIndex = 1; ?>
			<table class="table table-bordered table-striped house-edit-container">
				<tr>
					<th><label>小区</label></th>
					<td>
						<div class="house-edit-input-container">
							
							<input type="text" name="community" id="inputComm" class="form-control house-related-long" placeholder="只填写小区名，例财富广场, cfgc" tabindex="<?php echo $tabIndex++; ?>" autofocus>
							
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
								<input type="text" name="price" id="inputHousePrice" class="house-related-short" tabindex="<?php echo $tabIndex++; ?>">
								<span>万(<small>*支持两位小数</small>)</span>
							</div>
							<div class="house-input_text_wrap">
								<span>单价</span>
								<input type="text" name="unit_price" id="inputHouseUnitPrice" class="house-related-short" tabindex="<?php echo $tabIndex++; ?>">
								<span>元/㎡(<small>*整数</small>)</span>
							</div>
						</div>
					</td>
				</tr>
				

				<tr>
					<th>房源标题(<small>*可自动生成</small>)</th>
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

			var inputHouseRooms = $('#inputHouseRooms');
			var inputHouseHalls = $('#inputHouseHalls');
			var inputHouseBathrooms = $('#inputHouseBathrooms');
			var inputHouseSize = $('#inputHouseSize');

			var inputHousePrice = $('#inputHousePrice');
			var inputHouseUnitPrice = $('#inputHouseUnitPrice');

			var inputHouseTitle = $('#inputHouseTitle');

			var inputHouseFloor = $('#inputHouseFloor');
			var inputHouseTotalFloor = $('#inputHouseTotalFloor');

			var inputHouseRightsFrom = $('#inputHouseRightsFrom');

			var inputPrimary = $('#inputPrimary');
			var inputJunior = $('#inputJunior');
			var inputDetails = $('#inputDetails');
			function checkInput() {
				var result = [];

				var val = inputComm.data('id');
				if (!val) {
					showToast('请选择小区');
					return false;
				}
				result.push(inputComm.attr('name') + '=' + val);

				if (!__checkIntInput(inputHouseRooms, result, '室数', true, true)) return false;

				if (!__checkIntInput(inputHouseHalls, result, '厅数')) return false;

				if (!__checkIntInput(inputHouseBathrooms, result, '卫生间数')) return false;

				if (!__checkDecimalInput(inputHouseSize, result, '面积', true, true)) return false;

				if (!__checkDecimalInput(inputHousePrice, result, '总价', true, true)) return false;

				if (!__checkIntInput(inputHouseUnitPrice, result, '单价')) return false;

				if (!__checkEmpty(inputHouseTitle, result, '请填写标题')) return false;

				if (!__checkIntInput(inputHouseFloor, result, '层数', false, false, true)) return false;

				if (!__checkIntInput(inputHouseTotalFloor, result, '总层数')) return false;

				val = $.trim(inputHouseRightsFrom.val());
				if (val != '') {
					if (!__isPositiveInt(val) || val.length != 4) {
						showToast('请填写正确的年份');
						inputHouseRightsFrom.focus();
						return false;
					}
					result.push(inputHouseRightsFrom.attr('name') + '=' + val);
				}

				__checkIfSet(inputPrimary, result);
				__checkIfSet(inputJunior, result);

				__checkIfSet(inputDetails, result);


				// 验证下拉列表选项
				var selLabels = $('.house-selectordef .seled');
				var optionSelections = [];
				selLabels.each(function() {
					var who = $(this);
					var whoField = who.data('field');
					if (who.data('valueid')) {
						optionSelections.push(whoField + '=' + who.data('valueid'));
					}
				});
				var optionSelectionsStr = $.trim(optionSelections.join('&'));
				console.log(optionSelectionsStr);

				var postData = result.join('&');
				if (optionSelectionsStr != '') {
					postData += ('&' + optionSelectionsStr);
				}

				console.log(postData);
				// simplePost("<?php echo base_url('adminhouse/add_sell/ajax'); ?>", postData);
				return true;
			}

			function __checkEmpty (o, target, msg, hasMore) {
				var val = $.trim(o.val());
				if (val == '') {
					showToast(msg);
					o.focus();
					return false;
				}
				if (!hasMore) {
					target.push(o.attr('name') + '=' + $.urlencode(val));
				}
				return val;
			}

			function __checkIntInput (o, target, msg, msgEmpty, msgOver0, msgNeg) {
				var val = $.trim(o.val());
				// 如果不需要处理为空的情况
				if (val == '' && !msgEmpty) return true;

				if (!__checkEmpty(o, target, '请填写' + msg, true)) return false;

				if (msgOver0) {
					if (!__isPositiveInt(val)) {
						showToast(msg + '必须为大于0的整数');
						o.focus();
						return false;
					}
				} else {
					if ((msgNeg && !__isInt(val)) || (!msgNeg && !__isUnsignedInt(val))) {
						showToast(msg + '必须为整数');
						o.focus();
						return false;
					}
				}
				target.push(o.attr('name') + '=' + val);
				return true;
			}

			function __checkDecimalInput (o, target, msg, msgEmpty, msgOver0) {
				var val = $.trim(o.val());
				// 如果不需要处理为空的情况
				if (val == '' && !msgEmpty) return true;

				if (!__checkEmpty(o, target, '请填写' + msg, true)) return false;

				if (msgOver0) {
					if (!__isPositiveNumber(val)) {
						showToast(msg + '必须为大于0的数值');
						o.focus();
						return false;
					}
				} else {
					if (!__isUnsignedNumber(val)) {
						showToast(msg + '必须为数值');
						o.focus();
						return false;
					}
				}

				if (!__isUnsignedNumberLimitScale(val, 2)) {
					showToast(msg + '只能保留两位小数');
					o.focus();
					return false;
				}
				target.push(o.attr('name') + '=' + val);
				return true;
			}

			function __checkIfSet (o, target) {
				var val = $.trim(o.val());
				if (val != '') {
					target.push(o.attr('name') + '=' + $.urlencode(val));
				}
			}


			// 自动生成房源标题
			function generateTitle () {
				if () {

				}
			}
			inputComm.blur(generateTitle) ;
			inputHouseRooms.blur(generateTitle) ;
			inputHouseHalls.blur(generateTitle) ;
			inputHouseBathrooms.blur(generateTitle) ;
			inputHouseSize.blur(generateTitle) ;
			</script>
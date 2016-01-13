// 验证

var inputHouseRooms = $('#inputHouseRooms');
var inputHouseHalls = $('#inputHouseHalls');
var inputHouseBathrooms = $('#inputHouseBathrooms');
var inputHouseSize = $('#inputHouseSize');

var inputHousePrice = $('#inputHousePrice');
var inputHouseUnitPrice = $('#inputHouseUnitPrice');


var inputHouseFloor = $('#inputHouseFloor');
var inputHouseTotalFloor = $('#inputHouseTotalFloor');

var inputDecor = $('#inputDecor');
var inputHouseRightsFrom = $('#inputHouseRightsFrom');

var inputPrimary = $('#inputPrimary');
var inputJunior = $('#inputJunior');
var inputDetails = $('#inputDetails');
function checkInput() {
	var result = [];

	if (!__checkInputTitle(result)) {
		return false;
	}

	if (!__checkIntInput(inputHouseRooms, result, '室数', true, true)) return false;

	if (!__checkIntInput(inputHouseHalls, result, '厅数')) return false;

	if (!__checkIntInput(inputHouseBathrooms, result, '卫生间数')) return false;

	if (!__checkDecimalInput(inputHouseSize, result, '面积', true, true)) return false;

	if (!__checkDecimalInput(inputHousePrice, result, '总价', true, true)) return false;

	if (!__checkIntInput(inputHouseUnitPrice, result, '单价')) return false;

	if (!__checkEmpty(inputHouseTitle, result, '请填写标题')) return false;

	if (!__checkIntInput(inputHouseFloor, result, '层数', false, false, true)) return false;

	if (!__checkIntInput(inputHouseTotalFloor, result, '总层数')) return false;

	// 房屋年份
	val = Validate.of(inputHouseRightsFrom).val();
	if (val == '') {
		val = '0';
	} else {
		if (!Validate.isPositiveInt() || val.length != 4) {
			showToast('请填写正确的年份');
			inputHouseRightsFrom.focus();
			return false;
		}
	}
	result.push(inputHouseRightsFrom.attr('name') + '=' + val);

	// 其他信息
	__checkIfSet(inputPrimary, result);
	__checkIfSet(inputJunior, result);
	__checkIfSet(inputDetails, result);


	// 验证下拉列表选项
	var optionSelectionsStr = __generateInputSelOps(result);

	var postData = result.join('&');
	if (optionSelectionsStr != '') {
		postData += ('&' + optionSelectionsStr);
	}

	console.log(postData);

	doWhatYouWant(postData);
	return true;
}

function __checkInputTitle(output) {
	if (!__checkEmpty(inputComm, output, '小区', true)) return false;

	var community = Validate.of(inputComm).val(); // 小区名
	var valueid = inputComm.data('id');
	if (!valueid) {
		valueid = '0';
	} else {
		if (community != inputComm.data('name')) { // 此时相当于没有设置valueid，使用自定义的小区名
			valueid = '0';
		} else {
			community = '';
		}
	}
	output.push(inputComm.attr('name') + '=' + $.urlencode(community));
	output.push('cid=' + valueid);
	return true;
}


// 自动生成房源标题
function generateTitle () {
	if (!inputHouseTitle.attr("disabled")) {
		return;
	}
	var myTitle = '';

	if (inputArea.data('valueid')) {
		myTitle += '[' + $.trim(inputArea.text()) + '] ';
	}
	if (Validate.of(inputComm).isNotEmpty()) {
		myTitle += Validate.val() + ' ';
	}

	myTitle += '(';
	if (Validate.of(inputHouseRooms).isPositiveInt()) {
		myTitle += Validate.val() + '室';
	}
	if (Validate.of(inputHouseHalls).isPositiveInt()) {
		myTitle += Validate.val() + '厅';
	}
	if (Validate.of(inputHouseBathrooms).isPositiveInt()) {
		myTitle += Validate.val() + '卫';
	}

	if (inputDecor.data('valueid')) {
		myTitle += ' ' + $.trim(inputDecor.text());
	}

	myTitle += ') ';

	if (inputHouseSize.val() != '' && __isUnsignedNumberLimitScale(inputHouseSize.val(), 2)) {
		myTitle += inputHouseSize.val() + '㎡ ';
	}
	myTitle += '出售';
	inputHouseTitle.val(myTitle);
}
inputComm.blur(generateTitle) ;
inputHouseRooms.blur(generateTitle) ;
inputHouseHalls.blur(generateTitle) ;
inputHouseBathrooms.blur(generateTitle) ;
inputHouseSize.blur(generateTitle) ;



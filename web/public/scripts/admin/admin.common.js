/*
 * <Admin Common> JavaScript Document 
 * Requires : jQuery v1.8.2
 * Copyright © 2014 VIP.com. All rights reserved.
 */
 
	var ui = {
		
		/** 
		 * TabBox
		 */
		TabBox: function(target){
						
			var obj, tab, thisTab, tabItem, thisItem, index;
			
			obj = $(target);
			tab = obj.find('.tabs');
			tabItem = obj.find('.tab-item');
									
			tab.on('click', 'a', function() {
								
				thisTab = $(this);
				index = thisTab.index();
				thisTab.addClass('curr').siblings().removeClass('curr');
				tabItem.removeClass('curr').hide().eq(index).addClass('curr').show();
			});
		},

	
		/**
		 * Dialog
		 * @method: 
			 -> close()
		 */
		Dialog: function(param){
			
			// Parameters
			self = this;
			self.width = param.width;                          // 类型为int
			self.height = param.height;                        // 类型为int
			self.title = param.title;                          // 标题
			self.textContent = param.textContent;              // 文字內容
			self.isAlert = param.isAlert;                      // 是否提示框
			self.elem = param.elem;                            // 添加的DOM元素ID
			self.closeButton = param.closeButton;              // 关闭按钮，默认为true
			self.shadow = param.shadow;                        // 阴影层，默认为true
			self.autoClose = param.autoClose;                  // 自动关闭
			self.closeDuration = param.closeDuration;          // 延迟时间
			self.closeCallBacks = param.closeCallBacks;        // 自动关闭时执行的回调函数
			
			// Close Dialog Function
			self.close = function() {
				
				if (param.elem) {
				
					var _elem = document.getElementById(param.elem);
					_elem.style.display = "none";
					document.body.appendChild(_elem);
				}
				if(ds)  ds.parentNode.removeChild(ds);    // 判断是否有阴影
				d.parentNode.removeChild(d);              // 删除对话框
			}

			/* Init Dialog Element */		
			var _width, _height, _title, _textContent, _isAlert, _closeButton, _shadow;
			
			if (self.width)    _width = self.width;
			if (self.height)    _height = self.height;
			
			if (self.title)    _title = "<span class='admin-ui-dialog-head-title'>" + self.title + "</span>";
			else               _title = "";
			
			if (self.textContent)    _textContent = "<div class='admin-ui-dialog-body-textContent'>" + self.textContent + "</div>";
			else                     _textContent = "";
							
			if (self.isAlert != false) _isAlert = true;

			_closeButton = "<span class='admin-ui-dialog-head-closeButton'></span>";
						
			/* Create Dialog */
			var htm1, d;
						
			htm1 = "<div class='admin-ui-dialog-head'>" + _title + _closeButton + "</div><div class='admin-ui-dialog-body'>" + _textContent + "</div>",
			
			d = document.createElement("div");
			
			if (_isAlert)    d.className = 'admin-ui-dialog';
			else             d.className = 'admin-ui-dialog alert';
			
			d.innerHTML = htm1;
			d.style.display = "block";
			d.style.width = _width + "px";
			d.style.height = _height + "px";
			document.body.appendChild(d);
						
			/* Create Dialog Shadow */
			if(self.shadow != false){
				
				var htm2 = "<div class='admin-ui-dialog-shadow'></div>",
				    ds = document.createElement("div");
				
				ds.className = 'admin-ui-dialog-shadow';
				ds.innerHTML = htm2;
				document.body.appendChild(ds);
			}
						
			var dialog = document.getElementsByClassName('admin-ui-dialog')[0] || document.getElementsByClassName('admin-ui-dialog-alert')[0],    // 获取对话框
				dialogTop = 0,
				dialogLeft = 0,
				viewPortWidth = document.documentElement.clientWidth,
				viewPortHeight = document.documentElement.clientHeight,		
				scrollTop = document.documentElement.scrollTop,
				scrollLeft = document.documentElement.scrollLeft;
				
			console.log(viewPortHeight);
				
				
			// Show Close Button
			if (self.closeButton != false) {
			
				var cBtn = dialog.getElementsByClassName('admin-ui-dialog-head-closeButton')[0];
				
				if (cBtn.addEventListener) {
					
					cBtn.addEventListener("click", self.close);
				
				} else if (cBtn.attachEvent) {
				
					cBtn.attachEvent("onclick", self.close);
				}
				cBtn.style.display = "block";
			}
			
			// Append Element
			if (self.elem) {
			
				var _elem = document.getElementById(self.elem);
				dialog.getElementsByClassName('admin-ui-dialog-body')[0].appendChild(_elem);
				_elem.style.display = "block";
			}

			var dialogWidth = dialog.offsetWidth,		
				dialogHeight = dialog.offsetHeight;

			// Set Left
			if (dialogWidth <= viewPortWidth) {
			
				dialogLeft = (viewPortWidth - dialogWidth)/2 + scrollLeft;
				dialog.style.left = dialogLeft + "px";
			
			} else {
			
				dialog.style.left = "0px";
			}
			
			// Set Top
			if (dialogHeight <= viewPortHeight) {			
							
				dialogTop = (viewPortHeight - dialogHeight)/2 + scrollTop;
				dialog.style.top = dialogTop + "px";
			
			} else {
			
				dialog.style.top = "0px";
			}
			
			// Auto Close
			if (self.autoClose === true) {
				
				var _closeFn = self.close,
					_closeDuration = self.closeDuration,
					_closeCallBacks = self.closeCallBacks;
				
				if (!_closeDuration)    _closeDuration = 3000;
														
				setTimeout(function() {
					
					_closeFn();						
					_closeCallBacks();
					
				}, _closeDuration);
			}
		},
		
		/**
		 * Overlay - 遮罩层
		 * @method: 
			 -> open()
			 -> close()
		 */
		Overlay: {
			
			open: function() {
				
				$("body").append("<div id='overlay'></div>");
			},
			
			close: function() {
				
				$("#overlay").remove();
			}
		}
	}; 
  
	/** 
	 * Define Confirm
	 */
	var defConfirm = function(o, msg) {
		
		var r = confirm(msg);
		
		if (r === true)    o.form.submit();
		else               return false;
	};
 


function showToast(msg){
	new ui.Dialog({
		width:300,
		textContent : msg,
		textContentAlign : "center",
		closeButton : false,
		shadow : true,
		autoClose : true,
		closeDuration : 1000,
		closeCallBacks: function() {
			return false;
		}
	});
}








	<style type="text/css">
	/* style 专门就写在这边 */
	#overlayer {
		background-attachment: scroll;
		background-color: #000;
		height: 100%;
		left: 0;
		opacity: 0.6;
		position: fixed;
		top: 0;
		width: 100%;
	}

	#loadbox {
		height: 100%;
		left: 0;
		position: absolute;
		text-align: center;
		top: 20%;
		width: 100%;
		z-index: 100
	}

	#loadlayer {
		background: none repeat scroll 0 0 #f4f1f4;
		display: block;
		margin: 0 auto;
		padding: 10px 20px;
		position: relative;
		text-align: center;
		width: 640px
	}

	#loadlayer .close {
		background: url("<?php echo base_url('public/img/admin/close.png'); ?>") no-repeat scroll 0 0 rgba(0,0,0,0);
		height: 10px;
		position: absolute;
		right: 20px;
		top: 10px;
		width: 10px
	}


	.upload_box {
		width: 100%;
		margin: 1em auto;
	}

	.upload_main {
		border-width: 1px 1px 2px;
		border-style: solid;
		border-color: #ccc #ccc #ddd;
		background-color: #fbfbfb;
	}

	.upload_choose {
		padding: 10px;
	}

	.fileInputContainer {
		display: block;
		float: left;
		height: 200px;
		width: 200px;
		line-height: 200px;
		position: relative;
		overflow: hidden;
	}

	.fileInput-dummy {
		max-height: 200px;
		max-width: 200px;
		margin: auto;
	}

	.fileInput {
		height: 100%;
		overflow: hidden;
		position: absolute;
    	font-size: 300px;
		right:0;
		top:0;
		opacity: 0;
		filter:alpha(opacity=0);
		cursor:pointer;
	}

	.upload_drag_area {
		display: block;
		float: right;
		width: 350px;
		height: 200px;
		line-height: 200px;

		border: 1px dashed #ddd;
		/*  background: #fff url(../img/java.jpg) no-repeat 20px center;*/
		color: #999;
		text-align: center;
		vertical-align: middle;
	}

	.upload_drag_hover {
		border-color: #069;
		box-shadow: inset 2px 2px 4px rgba(0, 0, 0, .5);
		color: #333;
	}

	.upload_preview {
		border-top: 1px solid #bbb;
		border-bottom: 1px solid #bbb;
		background-color: #fff;
		overflow: hidden;
		_zoom: 1;
	}
	</style>
	
	<div id="overlayer" style="display:none;z-index:999999"></div>

	<div id="loadbox" style="display:none;z-index:999999">
	    <div id="loadlayer">
	        <a href="javascript:void(0)" class="close" onclick="layer_close();"></a>
            <form id="uploadForm" action="upload.php" method="post" enctype="multipart/form-data">
                <div class="upload_box">
                    <div class="upload_main">
                        <div class="upload_choose">

                            <div class="fileInputContainer">
                            	<img class="fileInput-dummy" src="<?php echo base_url('public/img/admin/demo_1.jpg'); ?>" />
                                <input id="fileImage" size="30" class="fileInput" type="file" name="fileselect[]" />
                            </div>

                            <span id="fileDragArea" class="upload_drag_area">或者将图片拖到此处</span>
                            <div class="fl-clear"></div>
                        </div>
                        <div id="preview" class="upload_preview"></div>
                    </div>
                    <div class="upload_submit">
                        <button type="button" id="fileSubmit" class="upload_submit_btn">确认上传图片</button>
                    </div>
                    <div id="uploadInf" class="upload_inf"></div>
                </div>
            </form>
	    </div>
	</div>

	<script type="text/javascript">
		function layer_show() {
			$("#loadbox").show();
			$("#overlayer").show();
		}

		function layer_close() {
			$("#loadbox").hide();
			$("#overlayer").hide();
		}

		var params = {
			fileInput: $("#fileImage").get(0),
			dragDrop: $("#fileDragArea").get(0),
			upButton: $("#fileSubmit").get(0),
			url: $("#uploadForm").attr("action"),
			filter: function(files) {
			  var arrFiles = [];
			  for (var i = 0, file; file = files[i]; i++) {
			      if (file.type.indexOf("image") == 0 || (!file.type && /\.(?:jpg|png|gif)$/.test(file.name) /* for IE10 */ )) {
			          if (file.size >= 512000000) {
			              alert('您这张"' + file.name + '"图片大小过大，应小于500k');
			          } else {
			              arrFiles.push(file);
			          }
			      } else {
			          alert('文件"' + file.name + '"不是图片。');
			      }
			  }
			  return arrFiles;
			},
			onSelect: function(files) {
				$("#preview").html(''); // clear
			  var html = '',
			      i = 0;
			  $("#preview").html('<div class="upload_loading"></div>');
			  var funAppendImage = function() {
			      file = files[i];
			      if (file) {
			          var reader = new FileReader()
			          reader.onload = function(e) {
			              html = html + '<div id="uploadList_' + i + '" class="upload_append_list"><p><strong>' + file.name + '</strong>' +
			                  '<a href="javascript:" class="upload_delete" title="删除" data-index="' + i + '"></a><br />' +
			                  '<img id="uploadImage_' + i + '" src="' + e.target.result + '" class="upload_image" /></p>' +
			                  '<span id="uploadProgress_' + i + '" class="upload_progress"></span>' +
			                  '</div>';

			              i++;
			              funAppendImage();
			          }
			          reader.readAsDataURL(file);
			      } else {
			          $("#preview").html(html);
			          if (html) {
			              //删除方法
			              $(".upload_delete").click(function() {
			                  ZXXFILE.funDeleteFile(files[parseInt($(this).attr("data-index"))]);
			                  return false;
			              });
			              //提交按钮显示
			              $("#fileSubmit").show();
			          } else {
			              //提交按钮隐藏
			              $("#fileSubmit").hide();
			          }
			      }
			  };
			  funAppendImage();
			},
			onDelete: function(file) {
			  $("#uploadList_" + file.index).fadeOut();
			},
			onDragOver: function() {
			  $(this).addClass("upload_drag_hover");
			},
			onDragLeave: function() {
			  $(this).removeClass("upload_drag_hover");
			},
			onProgress: function(file, loaded, total) {
			  var eleProgress = $("#uploadProgress_" + file.index),
			      percent = (loaded / total * 100).toFixed(2) + '%';
			  eleProgress.show().html(percent);
			},
			onSuccess: function(file, response) {
			  //$("#upimg").val(response);
			  $("#uploadInf").append("<p>上传成功，图片地址是：" + response + "</p>");
			  $("#upimg").append("<input type='text' name='img[]' value=" + response + " />");

			},
			onFailure: function(file) {
			  $("#uploadInf").append("<p>图片" + file.name + "上传失败！</p>");
			  $("#uploadImage_" + file.index).css("opacity", 0.2);
			},
			onComplete: function() {
			  //提交按钮隐藏
			  $("#fileSubmit").hide();
			  //file控件value置空
			  $("#fileImage").val("");
			  $("#uploadInf").append("<p>当前图片全部上传完毕，可继续添加上传。</p>");
			}
		};
		ZXXFILE = $.extend(ZXXFILE, params);
		ZXXFILE.init();
	</script>
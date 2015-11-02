<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<script src="<?php echo base_url('public/scripts/jquery-2.0.3.min.js'); ?>" type="application/javascript"></script>
<script type="application/javascript">
function submitCreate() {
	alert($("#createNewsForm").serializeArray());
	$.post("validate_create",
  $("#createNewsForm").serializeArray(),
  function(data,status){
    alert("Data: " + data + "\nStatus: " + status);
  });
  return false;
}
</script>
</head>
<body>
<div id="div1"></div>
	<form id="createNewsForm" onSubmit="return submitCreate()">

        <label for="title">Title</label>
        <input type="input" name="title" /><br />
    
        <label for="text">Content</label>
        <textarea name="content"></textarea><br />
    
        <input type="submit" name="submit" value="Create news item"/>
    
    </form>
    
</body>
</html>
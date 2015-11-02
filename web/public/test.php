<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script src="scripts/jquery-2.0.3.min.js" type="application/javascript"></script>
<script src="scripts/responsive-nav.min.js" type="application/javascript"></script>
<link rel="stylesheet" href="css/responsive-nav.css">
</head>
<body>
<div id="nav">
  <ul>
    <li><a href="#">Home</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Projects</a></li>
    <li><a href="#">Contact</a></li>
  </ul>
</div>
<!-- 将下面这段代码放置在 </body> 之前 -->
<script>
  //var navigation = responsiveNav("#nav");
  var navigation = responsiveNav("#nav", { // Selector: The ID of the wrapper
  animate: true, // Boolean: 是否启动CSS过渡效果（transitions）， true 或 false
  transition: 400, // Integer: 过渡效果的执行速度，以毫秒（millisecond）为单位
  label: "Menu", // String: Label for the navigation toggle
  insert: "after", // String: Insert the toggle before or after the navigation
  customToggle: "", // Selector: Specify the ID of a custom toggle
  openPos: "relative", // String: Position of the opened nav, relative or static
  jsClass: "js", // String: 'JS enabled' class which is added to <html> el
  debug: false, // Boolean: Log debug messages to console, true 或 false
  init: function(){}, // Function: Init callback
  open: function(){}, // Function: Open callback
  close: function(){} // Function: Close callback
});
</script>
    
</body>
</html>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
</head><body>
	<?php 
		foreach ($news as $news_item):
	?>
    <h3><?php echo $news_item['title']; ?></h3>
    <div class="main">
        <?php echo $news_item['content']; ?>
    </div>
    <?php endforeach; ?>
</body>
</html>
<!--
<?php
//header('Content-type: application/json');
//echo json_encode($news);
?>
-->
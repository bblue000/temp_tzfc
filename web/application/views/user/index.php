
	<?php 
		foreach ($users as $user):
	?>
    <h3><?php echo $user['true_name']; ?></h3>
    <div>
        <?php echo $user['email']; ?>
    </div>
    <?php endforeach; ?>

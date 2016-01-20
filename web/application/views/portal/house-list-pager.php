	<?php if (isset($pagearr) && $pagearr['pagenum'] > 0) : ?>
	<section id="listing-pager" class="fixed-sub-container">
		<ul>
		<?php $currentpage = $pagearr['currentpage']; $pagenum = $pagearr['pagenum'] ; ?>
		<?php if ($pagenum <= 12) : ?>
			<?php for ($i=0; $i < $pagearr['pagenum']; $i++) { ?> 
				<?php if ($i + 1 == $currentpage) : ?>
			<li class="checked"><span><?php print_r($i + 1); ?></span></li>
				<?php else: ?>
			<li><a href="javascript: gotopage(<?php print_r($i + 1); ?>);"><?php print_r($i + 1); ?></a></li>
				<?php endif; ?>
			<?php } ?>
		<?php else : ?>
			
		<?php endif; ?>
			$this->pagearr = array(
			'currentpage' => $page,
			'totalnum' => $total,
			'pagenum' => $page_size
		);
			<?php print_r(expression); ?>
			<li class="checked"><span>1</span></li>
			<li><a href="">2</a></li>
			<li><span>3</span></li>
			<li><span>4</span></li>
			<li><span>5</span></li>
			<li><span>6</span></li>
			<li><span>7</span></li>
			<li><span>8</span></li>
			<li><span>9</span></li>
			<li><span>...</span></li>
			<li><span>99</span></li>
			<li><span>100</span></li>
			<li><span>下一页</span></li>
		</ul>

		<form id="listing-pager-form">
			<input type="hidden" name="currentpage" id="currentpage" value="<?php print_r($pagearr['currentpage']); ?>">
		</form>
	</section>

	<script type="text/javascript">
	function gotopage (num) {
		$("#currentpage").val(num);
		$('#formpage').attr('action',$("#action").val());

		$('#listing-filters').submit();
	}
	</script>
	<?php endif; ?>
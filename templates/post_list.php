<div class="post">
	<div style="float: left; width: 400px;"><h3><a href="<?php e(generate_link($post['id'])); ?>"><?php e($post['title']); ?></a></h3></div>
	<?php if(is_admin()) { ?><div style="float: left; margin: 5px 0 0 10px; font-size: 8pt;"><?php e($post['menu']); ?></div><?php } ?>
	<div style="float: right; margin-top: 5px; font-size: 8pt; color: #999999; line-height: 8pt;"><?php e($post['date']); ?></div>
	<div style="clear: both;"></div>
	<a href="<?php e(generate_link($post['id'])); ?>" style="text-decoration: none; color: #000000;">
		<?php e(cutString($post['text'], 400)); ?>
	</a>
	
</div><hr>
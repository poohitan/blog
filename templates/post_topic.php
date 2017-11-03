<!-- post: <?php e($post['title']); ?> -->
<div class="item">
	<a href="#" name="<?php e($post['id']); ?>"></a>
	<?php e($post['text']); ?>
	<table width="550" border="0" class="staff" cellpadding="0" cellspacing="0">
  		<tr>
			<?php if(is_admin()) { ?><td valign="top" width="200"><?php e($post['menu']); ?></td><?php } ?>
			<td <?php if(is_admin()) print("width='370'"); else print("width='100%'");?> valign="middle"><hr></td>
   			<td valign="top"><div align="right" class="date"><a href="<?php e($_s['base_url']);?>/trash#<?php e($post['id']); ?>"><?php e($post['date']); ?></a></div></td>
  		</tr>
	</table>
</div>

<? if(isset($_GET['p'])) { ?> <div style="text-align:center;"><? e(@$post['mprev']); ?> &nbsp;&nbsp;&nbsp;&nbsp; <? e(@$post['mnext']); ?> </div> <? } ?>

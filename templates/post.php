
<!-- запис: <?php e($post['title']); ?> -->
<meta name="description" content="<?php e(cutString($post['text'], 300)); ?>">
<div class="post">		
	<h1><a href="<?php e(generate_link($post['id'])); ?>"><?php e($post['title']); ?></a></h1>
	<?php if(is_admin()) { ?>
	<div style="font-size:8pt; margin: -15px 0 10px 0;"><?php e($post['menu']); ?></div>
	<?php } ?>
	<div class="entry"> 
		<?php 
			e("\t");
			e('<link href="https://plus.google.com/108033633482449683866" rel="author">');
			e('<div style="width: 0; height: 0; overflow: hidden;"><a href="https://plus.google.com/108033633482449683866" rel="author">Bohdan Prokopovych</a></div>');
			e("\n\t");
			e($post['text']); 
			e("\n\t"); 
		?>
	</div> 
	<div class="stuff">
		<div class="comments"><a href="<?php e(generate_link($post['id'])); ?>#disqus_thread">Коментарі</a></div>
		<div class="date"><?php e($post['date']); ?></div>
		<script type="text/javascript">
            function shorten(html) {
				div = document.createElement("div");
				div.innerHTML = html;
				fullText = div.textContent;
				if (fullText.length > 40) {//32?
					document.write('<div class="category" id="category-<?php e($post['id']); ?>" style="text-overflow: ellipsis; overflow: hidden; background-color: #f0eee2;" onmouseover="hideSocial(<?php e($post['id']); ?>)" onmouseout="showSocial(<?php e($post['id']); ?>)">' + html + '</div>');
				}
				else {
					document.write('<div class="category" id="category-<?php e($post['id']); ?>">' + html + '</div>');
				}
			}
			shorten('Теґи: <?php e(@$post['tags']); ?>');
		</script>
		<div class="social" id="social-<?php e($post['id']); ?>">
			<a title="Поділитись у Twitter" href="http://twitter.com/intent/tweet?original_referer=&source=tweetbutton&text=<?php e($post['title']); ?>&url=<?php e(generate_link($post['id'])); ?>&via=poohitan" target="_blank" onClick="popupWin = window.open(this.href, 'twitter', 'location,width=600,height=300,top=250,left=400'); popupWin.focus(); return false;"><span class="twitter"></span></a>
			<a title="Поділитись у ВКонтакті" href="http://vk.com/share.php?url=<?php e(generate_link($post['id'])); ?>" target="_blank" onClick="popupWin = window.open(this.href, 'vk', 'location,width=600,height=300,top=250,left=400'); popupWin.focus(); return false;"><span class="vkontakte"></span></a>
			<a title="Поділитись у Facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?php e(generate_link($post['id'])); ?>" target="_blank" onClick="popupWin = window.open(this.href, 'facebook', 'location,width=600,height=300,top=250,left=400'); popupWin.focus(); return false;"><span class="facebook"></span></a>
			<a href="https://plus.google.com/share?url=<?php e(generate_link($post['id'])); ?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=600,height=500,top=150,left=400');return false;"><span class="gplus"></span></a>
		</div>
        <div class="clearfix"></div>
	</div>
</div>

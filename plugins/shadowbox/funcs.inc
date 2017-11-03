<?php

function shadowboxload() {
	global $_s;
	$_s['moremeta'] .= '<link rel="stylesheet" type="text/css" href="'.$_s['base_url'].'/shadowbox/shadowbox.css">
<script type="text/javascript" src="'.$_s['base_url'].'/shadowbox/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init();
</script>';
}

function shadowboxpost() {
	global $post, $_s;
	$post['text']=preg_replace("#<img(.*?)src=(.*?)>#", "<a href=\\2 rel=shadowbox[$post[id]]><img\\1src=\\2></a>", $post['text']);
	//to enable image resizing comment the previous line and uncomment the next one
	//$post['text']=preg_replace("#<img src=(.*?)>#", "<a href=\\1 rel=shadowbox[$post[id]]><img src=".$_s['base_url']."/imgrs.php?\\1></a>", $post['text']);
}

?>

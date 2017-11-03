<?php
function search() {
	global $_v, $_s, $_l, $posts;
	if(isset($_v['scword']) && trim($_v['scword'])) {
		$_s['posts_get_standart']=0;
    	$psts=get_posts();
    	$_s['ppp']=999999;
		mb_regex_encoding('UTF-8'); 
		for($i=0;$i<sizeof($psts);$i++) {
			$txt=file_get_contents($_s['posts_dir'].'/'.$psts[$i]);
			$s=$_v['scword'];
			if(preg_replace("/($s)/iu",'ok',$txt) != $txt) $posts[]=$psts[$i]; 
		} 
		if(sizeof($posts)<1) {
			e('<div align="center" style="margin: 15px 0;">');
			e($_l['search_not_found']);
			e('<br><br>'.$_l['tag_cloud'].'<br>');
			tag_cloud();
			e('</div>');
		}
	}
}
?>

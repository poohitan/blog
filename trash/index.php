<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Trash - poohitan</title>
<link href="http://poohitan.com/templates/style.css" rel="stylesheet" type="text/css" media="screen"/>
<script type="text/javascript" src="http://poohitan.com/ctrl_navigation.js"></script>

<link rel="stylesheet" type="text/css" href="http://poohitan.com/shadowbox/shadowbox.css">
<?php
	$lucky = rand(1,12);
	$got = rand(1,12);
	if ($got == $lucky) {
		echo("<!-- Випало щасливе число " . $lucky . "! -->\n");
		echo("<style>body {background: url('http://poohitan.com/templates/raspberry.gif');}</style>");
	}
	else {
		echo("<!-- Щасливе число — " . $lucky . ", а вам випало " . $got . " -->");
	}
?>
<script type="text/javascript" src="http://poohitan.com/shadowbox/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init({
    handleOversize: "resize",
    overlayColor: "#ffffff",
	resizeDuration: 0.1,
	viewportPadding: 5
});
</script>
</head>

<body>
<div id="wrapper"> 
 
 	<!-- Header -->
	<div id="header"> 
		<div id="menu" align="center">
			<table width="200" border="0" cellpadding="15">
				<tr>
					<td>
						<a href="http://poohitan.com" title="Головна">Головна</a>
					</td>
					<td>
						<a href="http://poohitan.com/archive/" title="Архів">Архів</a>
					</td>
					<td>
						<a href="http://poohitan.com/about/" title="Про">Про</a>
					</td>
					<td>
						<a href="http://poohitan.com/trash/" title="Смітник"><div id="trashbin"></div></a>
					</td>
				</tr>
			</table>
		</div>
		<hr>
	</div>
	<!--/ Header -->
	
	<h1>Смітник</h1>
<?php
	//якщо на цю сторінку передається якийсь текст з форми, то додаємо запис
	if ($_POST['text']) {
		$filename = date("Ymd_His");
		$text = $_POST['text'];
		
		$text = str_replace('\\"','"',$text);//видаляємо зайві слеші біля лапок, які чомусь додає NicEdit
		
		$pattern = '/<img(.*?)src="(.*?).(bmp|gif|jpeg|jpg|png)"(.*?)>/i';
		$replacement = '<a href="$2.$3" rel="shadowbox[' . $filename . ']"><img$1src="$2.$3"$4></a>';
		$text = preg_replace($pattern, $replacement, $text);//додаємо всім зображенням посилання на них і rel="shadowbox"
		
		$pattern2 = '/http:\/\/(\S*)/';
		$replacement2 = '<a href="http://$1">$1</a>';
	//	$text = preg_replace($pattern2, $replacement2, $text);//робимо так, щоб посилання, вставлені просто текстом, справді були посиланнями
		
		@$fp = fopen("posts/" . $filename, 'w');
		fwrite($fp, $text);
		fclose($fp);
			
		/*$tags_one_string = $_POST['tags'];
			
		$content = $text . "\n" . $tags_one_string;
		
		@$fp = fopen("posts/" . $filename, 'w');
		fwrite($fp, $content);
		fclose($fp);
		
		$tags_one_string_without_whitespaces = trim($tags_one_string);
		$tags = explode(",", $tags_one_string_without_whitespaces);
		
		foreach($tags as $tag) {
			if (!in_array($taglist, $tag)) $taglist[] = $tag;
		}*/
	}
	
	//перебираємо файли з теки posts і робимо масив назв файлів
	$handle = opendir('posts/');
	while (false !== ($entry = readdir($handle))) {
		if ($entry != "." && $entry != "..") $posts[] = $entry;
	}
	closedir($handle);
	
	if (!empty($_GET['permalink'])) {//якщо передається параметр з якимось конкретним постом, то вивести його
		$permalink = $_GET['permalink'];
		echo("<div class='item' id='" . $permalink . "'>\n\t");
		readfile("posts/" . $permalink);
		echo("\n\t<table width='550' border='0' class='staff' cellpadding='0' cellspacing='0'>\n");
		echo("\t\t<tr>\n");
		echo("\t\t\t<td width='475'><hr></td>\n");
		echo("\t\t\t<td>");
		echo("<div align='right' class='date'>");
		$post_date = substr($permalink,6,2) . "." . substr($permalink,4,2) . "." . substr($permalink,0,4) . ", " . substr($permalink,9,2) . ":" . substr($permalink,11,2);
		echo($post_date);
		echo("</div></td>\n\t\t</tr>\n\t</table>\n");
		echo("</div>\n");
	}
	else {//інакше вивести всю стрічку
		//посторінкова навігація
		if (!empty($_GET['skip'])) $skip = $_GET['skip'] + 1; 
		else $skip = 1;
	
		$count = 15; //скільки записів відображати на сторінці
		
		$p = ($skip * $count) - $count;
		if ($p < 1) $p = 0;
	
		$np = count($posts);
		
		sort($posts);
		$posts = array_reverse($posts);
		for($i = $p; $i < $p + $count; $i++) {
			$post = $posts[$i];
			if (!empty($post)) {
				echo("<div class='item' id='" . $post . "'>\n\t");
				readfile("posts/" . $post);
				echo("\n\t<table class='staff' width='550' border='0' cellpadding='0' cellspacing='0'>\n");
				echo("\t\t<tr>\n");
				echo("\t\t\t<td width='85'>");
				echo("<a href=\"?permalink=" . $post . "\">постійне посилання</a>");
				echo("</td>\n");
				echo("\t\t\t<td width='390'><hr></td>\n");
				echo("\t\t\t<td>");
				echo("<div align='right' class='date'>");
				$post_date = substr($post,6,2) . "." . substr($post,4,2) . "." . substr($post,0,4) . ", " . substr($post,9,2) . ":" . substr($post,11,2);
				echo($post_date);
				echo("</div></td>\n\t\t</tr>\n\t</table>\n");
				echo("</div>\n");
			} else break;
		}
		
		$previous_page = $skip - 2;
		$next_page = $skip;
	}
?>
	<!-- Footer -->
	<div id="footer"> 
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
 			<tr>
    			<td width="50%" align="left">
					<div id="pages_navigation">
						<?php
						if ($skip > 1 && $skip != 2) {
							echo("<a href='?skip=$previous_page'>← Назад</a>&nbsp;&nbsp;&nbsp;");
							echo("<link rel='next' href='http://poohitan.com/trash/?skip=$previous_page' id ='NextLink'/>");
						}
						else if($skip == 2) {
							echo("<a href='/trash/'>← Назад</a>&nbsp;&nbsp;&nbsp;");
							echo("<link rel='next' href='http://poohitan.com/trash/' id='NextLink'/>");
						}
						if ($count > 0 && $skip < $np/$count) {
							echo("<a href='?skip=$next_page'>Далі →</a>\n");
							echo("<link rel='prev' href='http://poohitan.com/trash/?skip=$next_page' id='PrevLink'/>");
						}
						?>
					</div>
				</td>
   				<td width="50%" align="right">
					<!--<div id="search">
						<form method="post" action="http://www.google.com/cse?cx=002666360769287709548:pndclbubzky&q=" id="search">
						<input type="text" name="scword" value="пошук" class="input" />
						</form>
					</div>-->
				</td>
			</tr>
		</table>
		<div id="google-search">
		<script>
		  (function() {
			var cx = '002666360769287709548:pndclbubzky';
			var gcse = document.createElement('script');
			gcse.type = 'text/javascript';
			gcse.async = true;
			gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
				'//www.google.com/cse/cse.js?cx=' + cx;
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(gcse, s);
		  })();
		</script>
		<gcse:search></gcse:search>
	</div>
	<!--/ Footer -->
</div>
<div id="shadow"></div>

<!-- Панелька «вгору-вниз» -->
<div id="updown"></div>
<script>
var updownElem = document.getElementById('updown');

var pageYLabel = 0;

updownElem.onclick = function() {
  var pageY = window.pageYOffset || document.documentElement.scrollTop;

  switch(this.className) {
    case 'up':
      pageYLabel = pageY;
      window.scrollTo(0, 0);
      this.className = 'down';
      break;

    case 'down':
      window.scrollTo(0, pageYLabel);
      this.className = 'up';
  }
}

window.onscroll = function() {
  var pageY = window.pageYOffset || document.documentElement.scrollTop;
  var innerHeight = document.documentElement.clientHeight;

  switch(updownElem.className) {
    case '':
      if (pageY > innerHeight / 1.5) {
        updownElem.className = 'up';
      }
      break;

    case 'up':
      if (pageY < innerHeight / 1.5) {
        updownElem.className = '';
      }
      break;

    case 'down':
      if (pageY > innerHeight) {
        updownElem.className = 'up';
      }
      break;

  }
}
</script>
<!--/ Панелька «вгору-вниз» -->

<!-- Google Analytics -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-10797087-16']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!--/ Google Analytics -->

<!-- Посилання на сторінку входу -->
<div id="login">
	<a href="http://poohitan.com?action=login"><img src="http://poohitan.com/templates/empty.png"  border="0"/></a>
</div>
<!--/ Посилання на сторінку входу -->
</body>
</html>

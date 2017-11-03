<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Аґреґатор</title>
</head>

<body>
<?php 
	$number = 200; //скільки посилань видавати в аґреґатор
?>

<div>
	<p>
	<a href="http://poohitan.com/">poohitan.com</a><br>
	Аґреґатор з посиланнями на записи у смітнику.<br>
	Сюди заходить Google-бот та індексує ці посилання для подальшого Google-пошуку по смітнику.<br>
	Зберігаються посилання на останні <?php echo($number) ?> записів.
	</p>

	<ul>
<?php
//перебираємо файли з теки posts і робимо масив posts[] назв файлів
	$handle = opendir('posts/');
	while (false !== ($entry = readdir($handle))) {
		if ($entry != "." && $entry != "..") $posts[] = $entry;
	}
	closedir($handle);
	
	sort($posts);
	$posts = array_reverse($posts);
	
	$i = 0;
	foreach($posts as $post) {
		if ($i < $number) {
			echo("\t\t<li><a href=\"http://poohitan.com/trash/?permalink=" . $post . "\">" . $post . "</a></li>\n");
			$i++;
		}
	}
?>
	</ul>
</div>
</body>
</html>

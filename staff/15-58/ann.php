<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Оголошення / Телефон довіри 15-58</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<link href="/style.css" rel="stylesheet" type="text/css">
<?php
require('api/settings.php');

function safe ($key) {
$_GET[$key] = htmlspecialchars(stripslashes($_GET[$key]));
$_GET[$key] = str_ireplace("script", "blocked", $_GET[$key]);
$_GET[$key] = mysql_escape_string($_GET[$key]); 
}

if (empty($_GET['article'])) {
    $name = 'ann';

    $query = "SELECT * FROM other WHERE name='".$name."'";
    $res = mysql_query($query);
		 
} else {
    safe('article');
	intval($_GET['article']);
	
	$query = "SELECT * FROM articles WHERE id='".$_GET['article']."'";
    $res = mysql_query($query);
}

	while($row = mysql_fetch_array($res)) {
          $head = $row['head'];
          $body = $row['body'];
         }
    mysql_close($dbh);
?>
</head>
<body>
<a href="/login.php" title="Вхід на сайт"><div id="login-icon"></div></a>
<center>
<div id="wrapper" align="left">
	<div id="header">
		<div id="logo"><a href="/" title="На головну"><img src="/logo.png" width="440" height="93"></a></div>
		<div id="slogan">
			<li>Безкоштовно.</li>
			<li>Цілодобово.</li>
			<li>Анонімно.</li>	
		</div>
	</div>
	<div id="menu">
		<ul>
			<a href="/"><li>Головна</li></a>
			<a href="/online-help/"><li>Допомога онлайн</li></a>
			<a href="/news/"><li>Новини</li></a>
			<a href="/articles/"><li>Статті</li></a>
			<a href="/ann/"><li>Оголошення</li></a>
			<a href="/guides/"><li>Довідники</li></a>
			<a href="/about/"><li>Про нас</li></a>
		</ul>
	</div>
	<div id="content">
	<h1>Оголошення</h1>
	    <?php print($body) ?> 
	</div>
</div>
</center>
</body>
</html>

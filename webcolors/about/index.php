<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Про сайт</title>
<link rel="stylesheet" href="../style.css"/>
<link href='http://fonts.googleapis.com/css?family=PT+Sans&subset=cyrillic,latin&v1' rel='stylesheet' type='text/css'>
<style>
a {text-decoration:underline; !important}
a:hover {color:#990000;}
</style>
<!-- Навігація з Ctrl -->
<script type="text/javascript" src="../navigate.js"></script>
<link rel="prev" href="../" id="NextLink"/>
<!-- /Навігація з Ctrl -->
<!--[if IE]><link rel="stylesheet" type="text/css" href="../styleie.css"/><![endif]-->
<!-- Динамічний favicon -->
<?php
$dir = "../favicons/";
$files = array();
if ($handle = opendir($dir)) {
while (false !== ($file = readdir($handle))) {
$files[] = $file;
}
}
$icon = $files[rand(2,count($files)-1)];
echo "<LINK REL=\"SHORTCUT ICON\" HREF=\"/favicons/" . $icon . "\">";
?>
<!-- /Динамічний favicon -->
</head>
<body>
<center>
<small style="position:fixed; left:11px; top:48px;"><a style="text-decoration:none;" href="../" title="До повної таблиці «безпечних» кольорів">Ctrl</a></small>
<h2 style="position:fixed; left:10px; top:40px;"><a style="text-decoration:none;" href="../" title="До повної таблиці «безпечних» кольорів">←</a></h2>
<h1>Про сайт</h1>
<p>Це перший український сайт, присвячений «безпечним» кольорам. Метою створення цього сайту було зробити максимально простий та зручний інструмент для веб-дизайнерів, яким постійно потрібно мати палітру «безпечних» кольорів під рукою.</p>
<p>Будь-які побажання, зауваження та відгуки стосовно сайту пишіть на <a href="mailto:poohitan@gmail.com">poohitan@gmail.com</a>.</p>
<p>При створенні сайту використовувались матеріали <a href="http://w3c.org">World Wide Web Consortium</a>, <a href="http://en.wikipedia.org">Вікіпедії</a>,  та <a href="http://artlebedev.ru">Студії Артемія Лебедєва</a>.</p>
</center>
</body>
</html>

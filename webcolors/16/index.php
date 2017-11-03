<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Таблиця основних «безпечних» кольорів</title>
<link rel="stylesheet" href="../style.css"/>
<link href='http://fonts.googleapis.com/css?family=PT+Sans&subset=cyrillic,latin&v1' rel='stylesheet' type='text/css'>
<!-- Навігація з Ctrl -->
<script type="text/javascript" src="../navigate.js"></script>
<link rel="next" href="../" id="PrevLink"/>
<!-- /Навігація з Ctrl -->
<!--[if IE]><link rel="stylesheet" type="text/css" href="../styleie.css"/><![endif]-->
<script type="text/javascript" src="../cloud.js"></script>
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
<small style="position:fixed; right:11px; top:48px;"><a href="../" title="До повної таблиці «безпечних» кольорів">Ctrl</a></small>
<h2 style="position:fixed; right:10px; top:40px;"><a href="../" title="До повної таблиці «безпечних» кольорів">→</a></h2>
<h1>Таблиця основних «безпечних» кольорів</h1>
<p>Це 16 «безпечних» кольорів, які у <span class="code">HTML/CSS</span> можна записувати не лише за допомогою Hex-коду, а й спеціальним ключовим словом.<br>
  Насправді є набагато більше кольорів з ключовими словами ніж подано нижче, але лише ці є «безпечними».</p>

<div id="colors" style="width:260px;">
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Purple<br>Hex: 800080<br>R: 128, G: 0, B: 128'});return false;">
	<div id="color" style="background: #800080;"></div>
	</a>
	<a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Fuchsia<br>Hex: FF00FF<br>R: 255, G: 0, B: 255'});return false;">
	<div id="color" style="background: #FF00FF;"></div>
	</a>
	<a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Navy<br>Hex: 000080<br>R: 0, G: 0, B: 128'});return false;">
	<div id="color" style="background: #000080;"></div>
	</a>
	<a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Blue<br>Hex: 0000FF<br>R: 0, G: 0, B: 255'});return false;">
	<div id="color" style="background: #0000FF;"></div>
	</a>
	<a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Teal<br>Hex: 008080<br>R: 0, G: 128, B: 128'});return false;">
	<div id="color" style="background: #008080;"></div>
	</a>
	<a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Aqua<br>Hex: 00FFFF<br>R: 0, G: 255, B: 255'});return false;">
	<div id="color" style="background: #00FFFF;"></div>
	</a>
	<a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Green<br>Hex: 008000<br>R: 0, G: 128, B: 0'});return false;">
	<div id="color" style="background: #008000;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Lime<br>Hex: 00FF00<br>R: 0, G: 255, B: 0'});return false;">
	<div id="color" style="background: #00FF00;"></div>
	</a>
	<a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Olive<br>Hex: 808000<br>R: 128, G: 128, B: 0'});return false;">
	<div id="color" style="background: #808000;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Yellow<br>Hex: FFFF00<br>R: 255, G: 255, B: 0'});return false;">
	<div id="color" style="background: #FFFF00;"></div>
	</a>
	<a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Maroon<br>Hex: 800000<br>R: 128, G: 0, B: 0'});return false;">
	<div id="color" style="background: #800000;"></div>
	</a>
	<a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Red<br>Hex: FF0000<br>R: 255, G: 0, B: 0'});return false;">
	<div id="color" style="background: #FF0000;"></div>
	</a>
	<a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Black<br>Hex: 000000<br>R: 0, G: 0, B: 0'});return false;">
	<div id="color" style="background: #000000;"></div>
	</a>
	<a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Gray<br>Hex: 808080<br>R: 128, G: 128, B: 128'});return false;">
	<div id="color" style="background: #808080;"></div>
	</a>
	<a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Silver<br>Hex: C0C0C0<br>R: 192, G: 192, B: 192'});return false;">
	<div id="color" style="background: #C0C0C0;"></div>
	</a>
	<a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'White<br>Hex: FFFFFF<br>R: 255, G: 255, B: 255'});return false;">
	<div id="color" style="background: #FFFFFF;"></div>
	</a>
</div>

<p>Наприклад використання записів <span class="code">a:visited {color: navy;}</span> та <span class="code">a:visited {color: #000080;}</span> матимуть однаковий результат.</p>
</center>
</body>
</html>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Повна таблиця «безпечних» кольорів</title>
<meta name="description" content="Це таблиця кольорів, рекомендованих для екранного дизайну. Кольори з цієї таблиці однаково відображаються на усіх моніторах та всіма браузерами." />
<meta name="keywords" content="колір,кольори,безпечні кольори,таблиця кольорів,палітра,колірна схема,таблиця,кольорова палітра,безпечні кольори,веб,веб-кольори,веб-дизайн,екранний дизайн,hex,rgb,216,html,безепчні веб кольори,хтмл,css" />
<link rel="stylesheet" href="style.css"/>
<style>
#colors {width:100%!important;}
</style>
<!--[if IE]><link rel="stylesheet" type="text/css" href="styleie.css"/><![endif]-->
<script type="text/javascript" src="cloud.js"></script>
<script>
function read(type){
param=document.getElementById(type);
if(param.style.display == "none") param.style.display = "block";
else param.style.display = "none"
}
</script>
<!-- Google, Yandex, Analytics -->
<meta name="google-site-verification" content="CofBIUh3VJ3Dw4F1XCg7sEnW7k1tLoThWH0snOUWjtY" />
<meta name='yandex-verification' content='666a0662761e8ae7' />
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-10797087-14']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!-- /Google, Yandex, Analytics -->
    <?php
    $dir = "favicons/";
    $files = array();
    if ($handle = opendir($dir)) {
    while (false !== ($file = readdir($handle))) {
    $files[] = $file;
    }
    }
    $icon = $files[rand(2,count($files)-1)];
    echo "<LINK REL=\"SHORTCUT ICON\" HREF=\"/favicons/" . $icon . "\">";
    ?>
</head>
<body>
<center>
<h2 align="left" style="position: absolute; left: 5pt; top: 5pt;"><a href="16/" title="До таблиці основних «безпечних» кольорів">←</a></h2>
<h2 align="left" style="position: absolute; right: 5pt; top: 5pt;"><a href="about/" title="Про сайт">→</a></h2>
<h1>Повна таблиця «безпечних» кольорів<sup>beta</sup></h1>
<a href="#" onClick="read('more'); return false;">Детальніше про «безпечні» кольори</a>
<div id="more" style="display:none">
<p>При створенні будь-якої веб-графіки головною проблемою є правильне відображення кольорів на різних моніторах та у різних браузерах. Коли браузер не здатен відобразити певний колір, він підбирає схожий, або змішує кілька сусідніх кольорів. Деколи трапляється таке, що певний колір може бути відображений зовсім не так, як було задумано.</p>
<p>«Безпечними» називаються кольори, які однаково відображаються на усіх моніторах та у всіх браузерах. Ці кольори рекомендовані для екранного дизайну — ви можете спокійно використовувати їх при створенні веб-сторінок, підготовці графіки для публікації в мережі та ін.</p>
<p>Щоб переглянути HEX- та RGB-коди певного кольору, достатньо просто клацнути по ньому мишкою.</p>
</div>

<div id="colors">

<!-- 1 рядок -->
	<a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FFFFCC<br>R: 255, G: 255, B: 204'});return false;">
	<div id="color" style="background: #FFFFCC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FFFF99<br>R: 255, G: 255, B: 153'});return false;">
	<div id="color" style="background: #FFFF99;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FFFF66<br>R: 255, G: 255, B: 102'});return false;">
	<div id="color" style="background: #FFFF66;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FFFF33<br>R: 255, G: 255, B: 51'});return false;">
	<div id="color" style="background: #FFFF33;"></div>
	</a>
	<a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FFFF00<br>R: 255, G: 255, B: 0'});return false;">
	<div id="color" style="background: #FFFF00;"></div>
	</a>
	<a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CCCC00<br>R: 204, G: 204, B: 0'});return false;">
	<div id="color" style="background: #CCCC00;"></div>
	</a>
	
<!-- 2 рядок -->
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FFCC66<br>R: 255, G: 204, B: 102'});return false;">
	<div id="color" style="background: #FFCC66;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FFCC00<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #FFCC00;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FFCC33<br>R: 255, G: 204, B: 51'});return false;">
	<div id="color" style="background: #FFCC33;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC9900<br>R: 204, G: 153, B: 0'});return false;">
	<div id="color" style="background: #CC9900;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC9933<br>R: 204, G: 153, B: 51'});return false;">
	<div id="color" style="background: #CC9933;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 996600<br>R: 153, G: 102, B: 0'});return false;">
	<div id="color" style="background: #996600;"></div>
	</a>
  
<!-- 3 рядок -->
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF9900<br>R: 255, G: 153, B: 0'});return false;">
	<div id="color" style="background: #FF9900;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF9933<br>R: 255, G: 153, B: 51'});return false;">
	<div id="color" style="background: #FF9933;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC9966<br>R: 204, G: 153, B: 102'});return false;">
	<div id="color" style="background: #CC9966;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC6600<br>R: 204, G: 102, B: 0'});return false;">
	<div id="color" style="background: #CC6600;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 996633<br>R: 153, G: 102, B: 51'});return false;">
	<div id="color" style="background: #996633;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 663300<br>R: 102, G: 51, B: 0'});return false;">
	<div id="color" style="background: #663300;"></div>
	</a>

<!-- 4 рядок -->  
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FFCC99<br>R: 255, G: 204, B: 153'});return false;">
	<div id="color" style="background: #FFCC99;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF9966<br>R: 255, G: 153, B: 102'});return false;">
	<div id="color" style="background: #FF9966;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF6600<br>R: 255, G: 102, B: 0'});return false;">
	<div id="color" style="background: #FF6600;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC6633<br>R: 204, G: 102, B: 51'});return false;">
	<div id="color" style="background: #CC6633;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 993300<br>R: 153, G: 51, B: 0'});return false;">
	<div id="color" style="background: #993300;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 660000<br>R: 102, G: 0, B: 0'});return false;">
	<div id="color" style="background: #660000;"></div>
	</a>
  
<!-- 5 рядок -->  
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF6633<br>R: 255, G: 102, B: 51'});return false;">
	<div id="color" style="background: #FF6633;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC3300<br>R: 204, G: 51, B: 0'});return false;">
	<div id="color" style="background: #CC3300;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF3300<br>R: 255, G: 51, B: 0'});return false;">
	<div id="color" style="background: #FF3300;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF0000<br>R: 255, G: 0, B: 0'});return false;">
	<div id="color" style="background: #FF0000;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC0000<br>R: 204, G: 0, B: 0'});return false;">
	<div id="color" style="background: #CC0000;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 990000<br>R: 153, G: 0, B: 0'});return false;">
	<div id="color" style="background: #990000;"></div>
	</a>
  
<!-- 6 рядок -->  
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FFCCCC<br>R: 255, G: 204, B: 204'});return false;">
	<div id="color" style="background: #FFCCCC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF9999<br>R: 255, G: 153, B: 153'});return false;">
	<div id="color" style="background: #FF9999;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF6666<br>R: 255, G: 102, B: 102'});return false;">
	<div id="color" style="background: #FF6666;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF3333<br>R: 255, G: 51, B: 51'});return false;">
	<div id="color" style="background: #FF3333;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF0033<br>R: 255, G: 0, B: 51'});return false;">
	<div id="color" style="background: #FF0033;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC0033<br>R: 204, G: 0, B: 51'});return false;">
	<div id="color" style="background: #CC0033;"></div>
	</a>
  
<!-- 7 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC9999<br>R: 204, G: 153, B: 153'});return false;">
	<div id="color" style="background: #CC9999;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC6666<br>R: 204, G: 102, B: 102'});return false;">
	<div id="color" style="background: #CC6666;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC3333<br>R: 204, G: 51, B: 51'});return false;">
	<div id="color" style="background: #CC3333;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 993333<br>R: 153, G: 51, B: 51'});return false;">
	<div id="color" style="background: #993333;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 990033<br>R: 153, G: 0, B: 51'});return false;">
	<div id="color" style="background: #990033;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 330000<br>R: 51, G: 0, B: 0'});return false;">
	<div id="color" style="background: #330000;"></div>
	</a>
  
<!-- 8 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF6699<br>R: 255, G: 102, B: 153'});return false;">
	<div id="color" style="background: #FF6699;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF3366<br>R: 255, G: 51, B: 102'});return false;">
	<div id="color" style="background: #FF3366;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF0066<br>R: 255, G: 0, B: 102'});return false;">
	<div id="color" style="background: #FF0066;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC3366<br>R: 204, G: 51, B: 102'});return false;">
	<div id="color" style="background: #CC3366;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 996666<br>R: 153, G: 102, B: 102'});return false;">
	<div id="color" style="background: #996666;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 663333<br>R: 102, G: 51, B: 51'});return false;">
	<div id="color" style="background: #663333;"></div>
	</a>
  
<!-- 9 рядок -->  
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF99CC<br>R: 255, G: 153, B: 204'});return false;">
	<div id="color" style="background: #FF99CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF3399<br>R: 255, G: 51, B: 153'});return false;">
	<div id="color" style="background: #FF3399;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF0099<br>R: 255, G: 0, B: 153'});return false;">
	<div id="color" style="background: #FF0099;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC0066<br>R: 204, G: 0, B: 102'});return false;">
	<div id="color" style="background: #CC0066;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 993366<br>R: 153, G: 51, B: 102'});return false;">
	<div id="color" style="background: #993366;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 660033<br>R: 102, G: 0, B: 51'});return false;">
	<div id="color" style="background: #660033;"></div>
	</a>
  
<!-- 10 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF66CC<br>R: 255, G: 102, B: 204'});return false;">
	<div id="color" style="background: #FF66CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF00CC<br>R: 255, G: 0, B: 204'});return false;">
	<div id="color" style="background: #FF00CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF33CC<br>R: 255, G: 51, B: 204'});return false;">
	<div id="color" style="background: #FF33CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC6699<br>R: 204, G: 102, B: 153'});return false;">
	<div id="color" style="background: #CC6699;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC0099<br>R: 204, G: 0, B: 153'});return false;">
	<div id="color" style="background: #CC0099;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 990066<br>R: 153, G: 0, B: 102'});return false;">
	<div id="color" style="background: #990066;"></div>
	</a>
	
<!-- 11 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FFCCFF<br>R: 255, G: 204, B: 255'});return false;">
	<div id="color" style="background: #FFCCFF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF99FF<br>R: 255, G: 153, B: 255'});return false;">
	<div id="color" style="background: #FF99FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF66FF<br>R: 255, G: 102, B: 255'});return false;">
	<div id="color" style="background: #FF66FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF33FF<br>R: 255, G: 51, B: 255'});return false;">
	<div id="color" style="background: #FF33FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FF00FF<br>R: 255, G: 0, B: 255'});return false;">
	<div id="color" style="background: #FF00FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC3399<br>R: 204, G: 51, B: 153'});return false;">
	<div id="color" style="background: #CC3399;"></div>
	</a>
  
<!-- 12 рядок -->  
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC99CC<br>R: 204, G: 153, B: 204'});return false;">
	<div id="color" style="background: #CC99CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC66CC<br>R: 204, G: 102, B: 204'});return false;">
	<div id="color" style="background: #CC66CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC00CC<br>R: 204, G: 0, B: 204'});return false;">
	<div id="color" style="background: #CC00CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC33CC<br>R: 204 G: 51, B: 204'});return false;">
	<div id="color" style="background: #CC33CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 990099<br>R: 153, G: 0, B: 153'});return false;">
	<div id="color" style="background: #990099;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 993399<br>R: 153, G: 51, B: 153'});return false;">
	<div id="color" style="background: #993399;"></div>
	</a>
  
<!-- 13 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC66FF<br>R: 204, G: 102, B: 255'});return false;">
	<div id="color" style="background: #CC66FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC33FF<br>R: 204 G: 51, B: 255'});return false;">
	<div id="color" style="background: #CC33FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC00FF<br>R: 204, G: 0, B: 255'});return false;">
	<div id="color" style="background: #CC00FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 9900CC<br>R: 153, G: 0, B: 204'});return false;">
	<div id="color" style="background: #9900CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 996699<br>R: 153, G: 102, B: 153'});return false;">
	<div id="color" style="background: #996699;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 660066<br>R: 102, G: 0, B: 102'});return false;">
	<div id="color" style="background: #660066;"></div>
	</a>
  
<!-- 14 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CC99FF<br>R: 204, G: 153, B: 255'});return false;">
	<div id="color" style="background: #CC99FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 9933CC<br>R: 153, G: 51, B: 204'});return false;">
	<div id="color" style="background: #9933CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 9933FF<br>R: 153, G: 51, B: 255'});return false;">
	<div id="color" style="background: #9933FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 9900FF<br>R: 153, G: 0, B: 255'});return false;">
	<div id="color" style="background: #9900FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 660099<br>R: 102, G: 0, B: 153'});return false;">
	<div id="color" style="background: #660099;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 663366<br>R: 102, G: 51, B: 102'});return false;">
	<div id="color" style="background: #663366;"></div>
	</a>
  
<!-- 15 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 9966CC<br>R: 153, G: 102, B: 204'});return false;">
	<div id="color" style="background: #9966CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 9966FF<br>R: 153, G: 102, B: 255'});return false;">
	<div id="color" style="background: #9966FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 6600CC<br>R: 102, G: 0, B: 204'});return false;">
	<div id="color" style="background: #6600CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 6633CC<br>R: 102, G: 51, B: 204'});return false;">
	<div id="color" style="background: #6633CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 663399<br>R: 102, G: 51, B: 153'});return false;">
	<div id="color" style="background: #663399;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 330033<br>R: 51, G: 0, B: 51'});return false;">
	<div id="color" style="background: #330033;"></div>
	</a>
  
<!-- 16 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CCCCFF<br>R: 204, G: 204, B: 255'});return false;">
	<div id="color" style="background: #CCCCFF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 9999FF<br>R: 153, G: 153, B: 255'});return false;">
	<div id="color" style="background: #9999FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 6633FF<br>R: 102, G: 51, B: 255'});return false;">
	<div id="color" style="background: #6633FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 6600FF<br>R: 102, G: 2004, B: 255'});return false;">
	<div id="color" style="background: #6600FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 330099<br>R: 51, G: 0, B: 153'});return false;">
	<div id="color" style="background: #330099;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 330066<br>R: 51, G: 0, B: 102'});return false;">
	<div id="color" style="background: #330066;"></div>
	</a>
  
<!-- 17 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 9999CC<br>R: 153, G: 153, B: 204'});return false;">
	<div id="color" style="background: #9999CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 6666FF<br>R: 102, G: 102, B: 255'});return false;">
	<div id="color" style="background: #6666FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 6666CC<br>R: 102, G: 102, B: 204'});return false;">
	<div id="color" style="background: #6666CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 666699<br>R: 102, G: 102, B: 153'});return false;">
	<div id="color" style="background: #666699;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 333399<br>R: 51, G: 51, B: 153'});return false;">
	<div id="color" style="background: #333399;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 333366<br>R: 51, G: 51, B: 102'});return false;">
	<div id="color" style="background: #333366;"></div>
	</a>
  
<!-- 18 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 3333FF<br>R: 51, G: 51, B: 255'});return false;">
	<div id="color" style="background: #3333FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 3300FF<br>R: 51, G: 0, B: 255'});return false;">
	<div id="color" style="background: #3300FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 3300CC<br>R: 51, G: 0, B: 204'});return false;">
	<div id="color" style="background: #3300CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 3333CC<br>R: 51, G: 51, B: 204'});return false;">
	<div id="color" style="background: #3333CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 000099<br>R: 0, G: 0, B: 153'});return false;">
	<div id="color" style="background: #000099;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 000066<br>R: 0, G: 0, B: 102'});return false;">
	<div id="color" style="background: #000066;"></div>
	</a>
  
<!-- 19 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 6699FF<br>R: 102, G: 153, B: 255'});return false;">
	<div id="color" style="background: #6699FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 3366FF<br>R: 51, G: 102, B: 255'});return false;">
	<div id="color" style="background: #3366FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 0000FF<br>R: 0, G: 0, B: 255'});return false;">
	<div id="color" style="background: #0000FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 0000CC<br>R: 0, G: 0, B: 204'});return false;">
	<div id="color" style="background: #0000CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 0033CC<br>R: 0, G: 51, B: 204'});return false;">
	<div id="color" style="background: #0033CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 000033<br>R: 0, G: 0, B: 51'});return false;">
	<div id="color" style="background: #000033;"></div>
	</a>
  
<!-- 20 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 0066FF<br>R: 0, G: 102, B: 255'});return false;">
	<div id="color" style="background: #0066FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 0066CC<br>R: 0, G: 102, B: 204'});return false;">
	<div id="color" style="background: #0066CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 3366CC<br>R: 51, G: 102, B: 204'});return false;">
	<div id="color" style="background: #3366CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 0033FF<br>R: 0, G: 51, B: 255'});return false;">
	<div id="color" style="background: #0033FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 003399<br>R: 0, G: 51, B: 153'});return false;">
	<div id="color" style="background: #003399;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 003366<br>R: 0, G: 51, B: 102'});return false;">
	<div id="color" style="background: #003366;"></div>
	</a>
  
 <!-- 21 рядок -->  
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 99CCFF<br>R: 153, G: 204, B: 255'});return false;">
	<div id="color" style="background: #99CCFF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 3399FF<br>R: 51, G: 153, B: 255'});return false;">
	<div id="color" style="background: #3399FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 0099FF<br>R: 0, G: 153, B: 255'});return false;">
	<div id="color" style="background: #0099FF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 6699CC<br>R: 102, G: 153, B: 204'});return false;">
	<div id="color" style="background: #6699CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 336699<br>R: 51, G: 102, B: 153'});return false;">
	<div id="color" style="background: #336699;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 006699<br>R: 0, G: 102, B: 153'});return false;">
	<div id="color" style="background: #006699;"></div>
	</a>
  
<!-- 22 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 66CCFF<br>R: 102, G: 204, B: 255'});return false;">
	<div id="color" style="background: #66CCFF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 33CCFF<br>R: 51, G: 204, B: 255'});return false;">
	<div id="color" style="background: #33CCFF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 00CCFF<br>R: 0, G: 204, B: 255'});return false;">
	<div id="color" style="background: #00CCFF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 3399CC<br>R: 51, G: 153, B: 204'});return false;">
	<div id="color" style="background: #3399CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 0099CC<br>R: 0, G: 153, B: 204'});return false;">
	<div id="color" style="background: #0099CC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 003333<br>R: 0, G: 51, B: 51'});return false;">
	<div id="color" style="background: #003333;"></div>
	</a>
  
<!-- 23 рядок -->  
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 99CCCC<br>R: 153, G: 204, B: 204'});return false;">
	<div id="color" style="background: #99CCCC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 66CCCC<br>R: 102, G: 204, B: 204'});return false;">
	<div id="color" style="background: #66CCCC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 339999<br>R: 51, G: 153, B: 153'});return false;">
	<div id="color" style="background: #339999;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 669999<br>R: 102, G: 153, B: 153'});return false;">
	<div id="color" style="background: #669999;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 006666<br>R: 0, G: 102, B: 102'});return false;">
	<div id="color" style="background: #006666;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 336666<br>R: 51, G: 102, B: 102'});return false;">
	<div id="color" style="background: #336666;"></div>
	</a>
  
<!-- 24 рядок -->  
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CCFFFF<br>R: 204, G: 255, B: 255'});return false;">
	<div id="color" style="background: #CCFFFF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 99FFFF<br>R: 153, G: 255, B: 255'});return false;">
	<div id="color" style="background: #99FFFF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 66FFFF<br>R: 102, G: 255, B: 255'});return false;">
	<div id="color" style="background: #66FFFF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 33FFFF<br>R: 51, G: 255, B: 255'});return false;">
	<div id="color" style="background: #33FFFF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 00FFFF<br>R: 0, G: 255, B: 255'});return false;">
	<div id="color" style="background: #00FFFF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 00CCCC<br>R: 0, G: 204, B: 204'});return false;">
	<div id="color" style="background: #00CCCC;"></div>
	</a>
  
<!-- 25 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 99FFCC<br>R: 153, G: 255, B: 204'});return false;">
	<div id="color" style="background: #99FFCC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 66FFCC<br>R: 102, G: 255, B: 204'});return false;">
	<div id="color" style="background: #66FFCC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 33FFCC<br>R: 51, G: 255, B: 204'});return false;">
	<div id="color" style="background: #33FFCC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 00FFCC<br>R: 0, G: 255, B: 204'});return false;">
	<div id="color" style="background: #00FFCC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 33CCCC<br>R: 51, G: 204, B: 204'});return false;">
	<div id="color" style="background: #33CCCC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 009999<br>R: 0, G: 153, B: 153'});return false;">
	<div id="color" style="background: #009999;"></div>
	</a>
  
<!-- 26 рядок -->  
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 66CC99<br>R: 102, G: 204, B: 153'});return false;">
	<div id="color" style="background: #66CC99;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 33CC99<br>R: 51, G: 204, B: 153'});return false;">
	<div id="color" style="background: #33CC99;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 00CC99<br>R: 0, G: 204, B: 153'});return false;">
	<div id="color" style="background: #00CC99;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 339966<br>R: 51, G: 153, B: 102'});return false;">
	<div id="color" style="background: #339966;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 009966<br>R: 0, G: 153, B: 102'});return false;">
	<div id="color" style="background: #009966;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 006633<br>R: 0, G: 102, B: 51'});return false;">
	<div id="color" style="background: #006633;"></div>
	</a>
  
<!-- 27 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 66FF99<br>R: 102, G: 255, B: 153'});return false;">
	<div id="color" style="background: #66FF99;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 33FF99<br>R: 51, G: 255, B: 153'});return false;">
	<div id="color" style="background: #33FF99;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 00FF99<br>R: 0, G: 255, B: 153'});return false;">
	<div id="color" style="background: #00FF99;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 33CC66<br>R: 51, G: 204, B: 102'});return false;">
	<div id="color" style="background: #33CC66;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 00CC66<br>R: 0, G: 204, B: 102'});return false;">
	<div id="color" style="background: #00CC66;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 009933<br>R: 0, G: 153, B: 51'});return false;">
	<div id="color" style="background: #009933;"></div>
	</a>
  
<!-- 28 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 99FF99<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #99FF99;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 66FF66<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #66FF66;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 33FF66<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #33FF66;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 00FF66<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #00FF66;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 339933<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #339933;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 006600<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #006600;"></div>
	</a>
  
<!-- 29 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CCFFCC<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #CCFFCC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 99CC99<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #99CC99;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 66CC66<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #66CC66;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 669966<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #669966;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 336633<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #336633;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 003300<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #003300;"></div>
	</a>
  
<!-- 30 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 33FF33<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #33FF33;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 00FF33<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #00FF33;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 00FF00<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #00FF00;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 00CC00<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #00CC00;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 33CC33<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #33CC33;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 00CC33<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #00CC33;"></div>
	</a>
  
<!-- 31 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 66FF00<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #66FF00;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 66FF33<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #66FF33;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 33FF00<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #33FF00;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 33CC00<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #33CC00;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 339900<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #339900;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 009900<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #009900;"></div>
	</a>
  
<!-- 32 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CCFF99<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #CCFF99;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 99FF66<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #99FF66;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 66CC00<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #66CC00;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 66CC33<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #66CC33;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 669933<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #669933;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 336600<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #336600;"></div>
	</a>
  
<!-- 33 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 99FF00<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #99FF00;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 99FF33<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #99FF33;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 99CC66<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #99CC66;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 99CC00<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #99CC00;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 99CC33<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #99CC33;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 669900<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #669900;"></div>
	</a>
  
<!-- 34 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CCFF66<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #CCFF66;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CCFF00<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #CCFF00;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CCFF33<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #CCFF33;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CCCC99<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #CCCC99;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 666633<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #666633;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 333300<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #333300;"></div>
	</a>
  
<!-- 35 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CCCC66<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #CCCC66;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CCCC33<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #CCCC33;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 999966<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #999966;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 999933<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #999933;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 999900<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #999900;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 666600<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #666600;"></div>
	</a>
  
<!-- 36 рядок -->   
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: FFFFFF<br>R: 255, G: 255, B: 255'});return false;">
	<div id="color" style="background: #FFFFFF;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: CCCCCC<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #CCCCCC;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 999999<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #999999;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 666666<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #666666;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 333333<br>R: 255, G: 204, B: 0'});return false;">
	<div id="color" style="background: #333333;"></div>
	</a>
    <a href="#" onclick="Popup.show(null,null,null,{'className':'popup','content':'Hex: 000000<br>R: 0, G: 0, B: 0'});return false;">
	<div id="color" style="background: #000000;"></div>
	</a>

</div>
</center>
<!-- Сайт зроблено у робочому куточку poohitan'a -->
<div style="position: absolute; left: 0pt; margin-top:200%"><a href="http://poohitan.com" title="Робочий куточок poohitan'а"><img src="http://webcolors.org.ua/site-developer.png" alt="Сайт зроблено у робочому куточку poohitan'a" width="99" border="0" height="63"></a></div>
<!-- Сайт зроблено у робочому куточку poohitan'a -->
</body>
</html>

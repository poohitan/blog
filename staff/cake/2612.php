<?php include ('header.php');?>
<?php include ('date.php');?>
<div id="content">
<div id="title">1898 рік</div>
<p><?php
$string='П’єром і Марією Кюрі відкрито радіоактивний елемент Радій.';
$length=strlen($string);
echo $string;
?></p>
</div>
<div id="content">
<div id="title">1963 рік</div>
<p><?php
$string='Фірма грамзапису «Capitol Records» випустила перший у США сингл групи The Beatles «I Want to Hold Your Hand/I Saw Her Standing There», який 1 лютого наступного року вийшов на перше місце в американському хіт-параді, почалося «британське вторгнення» бітломанії в США.';
$length=strlen($string);
$string=substr($string, 0, 139);
if ($length>140) echo $string.'…'; else echo $string;
?></p>
</div>
<div id="content">
<div id="title">2004 рік</div>
<p>Відбувся найбільш смертоносний землетрус у сучасній історії. Стався в Індійському океані, на північ від острова Сімеулує.</p>
</div>
<div id="content">
<div id="title">2004 рік</div>
<p>В Україні проведено Переголосування другого туру 26 грудня 2004, на якому перемогу здобув Віктор Ющенко</p>

</div>
</body>
</html>

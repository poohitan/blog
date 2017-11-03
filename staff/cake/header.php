<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<?php $day=date("d.m.Y");?>
<title>Сьогодні <?php echo $day; ?></title>
<link rel="stylesheet" href="style.css"/>
<script type='text/javascript' src='basic/js/jquery.js'></script>
<script type='text/javascript' src='basic/js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='basic/js/basic.js'></script>
</head>
<body>
<div id="date">
Сьогодні&nbsp;<?php
function today_date(){
$date=explode(".", date("d.m.Y"));
switch ($date[1]){
case 1: $m='Січня'; break;
case 2: $m='Лютого'; break;
case 3: $m='Березня'; break;
case 4: $m='Квітня'; break;
case 5: $m='Травня'; break;
case 6: $m='Червня'; break;
case 7: $m='Липня'; break;
case 8: $m='Серпня'; break;
case 9: $m='Вересня'; break;
case 10: $m='Жовтня'; break;
case 11: $m='Листопада'; break;
case 12: $m='Грудня'; break;
}
echo $date[0].'&nbsp;'.$m.'&nbsp;'.$date[2].'&nbsp;року';
}
today_date();
?>
</div>

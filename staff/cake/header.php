<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<?php $day=date("d.m.Y");?>
<title>������� <?php echo $day; ?></title>
<link rel="stylesheet" href="style.css"/>
<script type='text/javascript' src='basic/js/jquery.js'></script>
<script type='text/javascript' src='basic/js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='basic/js/basic.js'></script>
</head>
<body>
<div id="date">
�������&nbsp;<?php
function today_date(){
$date=explode(".", date("d.m.Y"));
switch ($date[1]){
case 1: $m='ѳ���'; break;
case 2: $m='������'; break;
case 3: $m='�������'; break;
case 4: $m='�����'; break;
case 5: $m='������'; break;
case 6: $m='������'; break;
case 7: $m='�����'; break;
case 8: $m='������'; break;
case 9: $m='�������'; break;
case 10: $m='������'; break;
case 11: $m='���������'; break;
case 12: $m='������'; break;
}
echo $date[0].'&nbsp;'.$m.'&nbsp;'.$date[2].'&nbsp;����';
}
today_date();
?>
</div>

<div id="date">
�������&nbsp;&nbsp;<?php
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
echo $date[0].'&nbsp;&nbsp;'.$m.'&nbsp;&nbsp;'.$date[2].'&nbsp;&nbsp;����';
}
today_date();
?>
</div>

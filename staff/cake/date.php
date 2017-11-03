<div id="date">
Сьогодні&nbsp;&nbsp;<?php
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
echo $date[0].'&nbsp;&nbsp;'.$m.'&nbsp;&nbsp;'.$date[2].'&nbsp;&nbsp;року';
}
today_date();
?>
</div>

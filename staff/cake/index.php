<?php include ('header.php');?>
<?php 
$today=date("dm");
include ("$today.php");
?>

<div id='basic-modal'><a href="#" class="basic"><div style="position:absolute; top:5pt; left:5pt;">Додати подію</div></a></div>
<div id="basic-modal-content">
<?php include ('mail.php');?>
</div>
</body>
</html>
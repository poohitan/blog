<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Адмін-панель / Телефон довіри 15-58</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<link href="/style.css" rel="stylesheet" type="text/css">
<link href="/adm-style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<?php
require_once('../api/settings.php');
	
	$ip = $_SERVER['REMOTE_ADDR'];
	$ip = md5($ip);	
	
	$query = "SELECT * FROM `users` WHERE `ip`='".$ip."'";
    $res = mysql_query($query);	   
	   
	if (mysql_num_rows($res) == 0) {
	       if ($_GET['act'] !== "login") {
	           print "<script>";
               print " self.location='/login.php';";
	           print "</script>";
	           die(); 
	       } else {
	       require_once("functions.php"); }
     } else {  
    require_once("functions.php"); 
    }
?>
</head>
<body>
<center>
<div id="wrapper" align="left">
	<div id="menu">
		<ul>
			<a href="/" title="На головну"><img src="/logo-adm.png" width="250" height="25" style="margin:0 0 -7px 0; padding:0;"></a>
			<a href="#"><li>Змінити пароль</li></a>
			<a href="/admin/?act=logout"><li>Вийти</li></a>
		</ul>
	</div>
	<div id="content">
		<div>
		<div id="sidebar">
			<h3>Редагувати сторінки:</h3>
			<ul>
				<li><a href="/admin/edit.php?do=edit&name=index">Головна</a></li>
				<li><a href="/admin/edit.php?do=edit&name=guides">Довідники</a></li>
				<li><a href="/admin/edit.php?do=edit&name=ann">Оголошення</a></li>
				<li><a href="/admin/edit.php?do=edit&name=about">Про нас</a></li>
			</ul>
			<h3>Додати:</h3>
			<ul>
				<li><a href="/admin/">Новину</a></li>
				<li><a href="/admin/add-article.php">Статтю</a></li>
			</ul>
		</div>
		<div id="edit">
			<h3>Додати новину:</h3>
         <?php
         switch($_GET['er']) {
          case 1:
           echo "Помилка: невірно вказана дата.\n";
		   break;
		  case 2:
           echo "Помилка: заповніть усі необхідні поля!\n";
	       break;
         }
        ?>
          
          <form action="/admin/?act=add&key=n" method="post"> 
			Дата:<br>
			<input name="date" type="text" value="<?php echo date('d.m.Y'); ?>" maxlength="10">
			<br><br>
			Опис:<br>
			<textarea name="body" cols="60" rows="10"></textarea>
			<br>
			<input class="button" type="submit" value="Додати">
          </form> 
		</div>
		</div>
	</div>
</div>
</center>
</body>
</html>

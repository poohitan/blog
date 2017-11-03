<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Вхід на сайт</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<link href="style.css" rel="stylesheet" type="text/css">
<style>
#login {
	width:250px;
}
input {
	font-family:"Open Sans", "Myriad Pro", Arial, sans-serif;
	border:1px solid #ed1f24;
	color:#999;
	border-radius:5px;
	padding:2px;
	font-size:16px;
}
input:focus {
	color:#000;
	border:1px solid #aa161a;
}
input.button {
	background: #fff;
	padding:2px 5px;
	color:#000;
}
</style>
<?php
    include('api/settings.php');
	
	$ip = $_SERVER['REMOTE_ADDR'];
	$ip = md5($ip);	
	
	$query = "SELECT * FROM `users` WHERE `ip`='".$ip."'";
    $res = mysql_query($query);	   
	echo mysql_error(); 
	   
	if (mysql_num_rows($res) > 0) {
	    print "<script>";
        print " self.location='/admin/';";
	    print "</script>";
	    die(); 
	}
    mysql_close($dbh);		   
?>
</head>
<body>
<center>
	<div id="login" align="left">
		<h1>Вхід на сайт</h1>
        <?php
         switch($_GET['er']) {
          case 1:
           echo "Помилка: невірно введено логін або пароль.\n";
	      break;
         }
        ?>
     <form action="/admin/?act=login" method="post">
		<p>Логін:<br>
		<input name="user" type="text"></p>
		<p>Пароль:<br>
		<input name="pass" type="password"></p>
		<p><input type="submit" value="Увійти" class="button"></p>
     </form> 
	</div>
</center>
</body>
</html>

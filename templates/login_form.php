<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="<?php e($_s['base_url']);?>/templates/style.css" rel="stylesheet" type="text/css" media="screen"/>
<title>Вхід</title>
</head>
<body>
<div id="wrapper"> 
	<h1>Вхід</h1>
	<div style="width: 230px; margin-left: 170px;">
		<form action="" method="post">
		Пароль:<br>
		<input type="hidden" name="action" value="login">
		<input class="login_pass" type="password" name="pass">
		<input class="login_button" type=submit style="padding: 2px 10px; margin-top: 5px; font-size: 10pt;" value="Увійти">	
		</form>
	</div>
</div>
</body>

</html>
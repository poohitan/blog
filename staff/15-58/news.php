<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>������ / ������� ����� 15-58</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<link href="/style.css" rel="stylesheet" type="text/css">
<style>
.publ {margin:0 0 20px 0;}
.date {color:#fff; background-color:#ed1f24; font-size:12px; padding:1px; margin-left:-20px;}
.text p {text-indent:0 !important;}
.text {margin:-40px 0 0 50px;}
</style>
<?php
  require_once('api/settings.php');
          
  $ip = $_SERVER['REMOTE_ADDR'];
  $ip = md5($ip);	
	
  $query = "SELECT * FROM `users` WHERE `ip`='".$ip."'";
  $res = mysql_query($query);	   
  echo mysql_error(); 
	   
  if (mysql_num_rows($res) > 0) $log=true;
?>
</head>
<body>
<center>
<div id="wrapper" align="left">
	<div id="header">
		<div id="logo"><a href="/" title="�� �������"><img src="/logo.png" width="440" height="93"></a></div>
		<div id="slogan">
			<li>�����������.</li>
			<li>ֳ��������.</li>
			<li>�������.</li>	
		</div>
	</div>
	<div id="menu">
		<ul>
			<a href="/"><li>�������</li></a>
			<a href="/online-help/"><li>�������� ������</li></a>
			<a href="/news/"><li>������</li></a>
			<a href="/articles/"><li>�����</li></a>
			<a href="/ann/"><li>����������</li></a>
			<a href="/guides/"><li>��������</li></a>
			<a href="/about/"><li>��� ���</li></a>
		</ul>
	</div>
	<div id="content">
	<h1>������</h1>
    <?php
          $query = "SELECT DATE_FORMAT(date,'%d.%m.%Y') AS date_X, id, body, date FROM news ORDER BY date_X DESC";
          $res = mysql_query($query);
          
		  while($row = mysql_fetch_array($res)) {
		  print "<div class='publ'>\n";
		  print "<span class='date'>".$row['date']."</span>\n";
		  print "<div class='text'>\n";
		  print "<p>".$row['body']."</p>\n";
		  if ($log) print "<div align='right' class='more'><a href='/admin/?act=edit&do=del&ls=n&id=".$row['id']."'>[ �������� ]</a></div>";
		  print "</div>\n</div>\n";
          }
		  mysql_close($dbh);
         ?>
	</div>
</div>
</center>
</body>
</html>

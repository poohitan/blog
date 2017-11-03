<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Статті / Телефон довіри 15-58</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<link href="/style.css" rel="stylesheet" type="text/css">
<style>
.article {border-bottom:2px solid #ccc; margin-bottom:20px;}
.article h3 {margin:0 0 -10px 40px;}
.more {margin:-20px 20px 10px 0;}
</style>
<?php
  function transLate($string) 
   { 
        
        $arr = array( 
                       'А' => 'A' , 'Б' => 'B' , 'В' => 'V'  , 'Г' => 'G', 
                       'Д' => 'D' , 'Е' => 'E' , 'Ё' => 'JO' , 'Ж' => 'ZH', 
                       'З' => 'Z' , 'И' => 'I' , 'Й' => 'JJ' , 'К' => 'K', 'І' => 'I', 'Ї' => 'YI',
                       'Л' => 'L' , 'М' => 'M' , 'Н' => 'N'  , 'О' => 'O', 'Ґ' => 'G',
                       'П' => 'P' , 'Р' => 'R' , 'С' => 'S'  , 'Т' => 'T', 
                       'У' => 'U' , 'Ф' => 'F' , 'Х' => 'KH' , 'Ц' => 'C', 
                       'Ч' => 'CH', 'Ш' => 'SH', 'Щ' => 'SHH', 'Ъ' => '' , 
                       'Ы' => 'Y' , 'Ь' => ''  , 'Э' => 'EH' , 'Ю' => 'JU', 
                       'Я' => 'JA', ' ' => '-', "'" => '',
                       'а' => 'a' , 'б' => 'b'  , 'в' => 'v' , 'г' => 'g', 'д' => 'd', 
                       'е' => 'e' , 'ё' => 'jo' , 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'і' => 'i', 'ї' => 'yi',
                       'й' => 'jj', 'к' => 'k'  , 'л' => 'l' , 'м' => 'm', 'н' => 'n', 'ґ' => 'g', 
                       'о' => 'o' , 'п' => 'p'  , 'р' => 'r' , 'с' => 's', 'т' => 't', 
                       'у' => 'u' , 'ф' => 'f'  , 'х' => 'kh', 'ц' => 'c', 'ч' => 'ch', 
                       'ш' => 'sh', 'щ' => 'shh', 'ъ' => ''  , 'ы' => 'y', 'ь' => '', 
                       'э' => 'eh', 'ю' => 'ju' , 'я' => 'ja'
                     ); 
		
        $key = array_keys($arr);
        $val = array_values($arr);
        $translate = str_replace($key, $val, $string); 
        
        return $translate; 
   } 
   

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
<a href="/login.php" title="Вхід на сайт"><div id="login-icon"></div></a>
<center>
<div id="wrapper" align="left">
	<div id="header">
		<div id="logo"><a href="/" title="На головну"><img src="/logo.png" width="440" height="93"></a></div>
		<div id="slogan">
			<li>Безкоштовно.</li>
			<li>Цілодобово.</li>
			<li>Анонімно.</li>	
		</div>
	</div>
	<div id="menu">
		<ul>
			<a href="/"><li>Головна</li></a>
			<a href="/online-help/"><li>Допомога онлайн</li></a>
			<a href="/news/"><li>Новини</li></a>
			<a href="/articles/"><li>Статті</li></a>
			<a href="/ann/"><li>Оголошення</li></a>
			<a href="/guides/"><li>Довідники</li></a>
			<a href="/about/"><li>Про нас</li></a>
		</ul>
	</div>
	<div id="content">
		<h1>Статті</h1>
		<?php
          $query = "SELECT * FROM articles ORDER BY `id` DESC";
          $res = mysql_query($query);
          
		  while($row = mysql_fetch_array($res)) {
		  $id = $row['id'];
          $head = $row['head'];
		   if (strlen($row['body'])>350) {
               preg_match("/^(.{350,}?)\s+/s", $row['body'], $body_a);
		       $body = $body_a[1];
		  } else {
		       $body = $row['body'];
		  }
		  print "<div class='article'>";
		  print "<h3>".$head."</h3>\n";
		  print "<p>".$body."…"."</p>\n";
		  print "<div align='right' class='more'><a href='/".$id."-".transLate($head).".html'>Читати далі &rarr;</a></div>\n";
		  if ($log) print "<div align='left' class='more'><a href='/admin/?act=edit&do=del&ls=a&id=".$id."'>[ Видалити ]</a></div>\n";
		  print "</div>\n";
          }
         ?>
	</div>
</div>
</center>
</body>
</html>

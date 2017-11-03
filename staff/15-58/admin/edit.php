<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Адмін-панель / Телефон довіри 15-58</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<link href="/style.css" rel="stylesheet" type="text/css">
<link href="/adm-style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<?php
  require_once('../api/check.php');
  
  $uri = "/";
  if (!empty($_SERVER['HTTP_REFERER'])) $uri = $_SERVER['HTTP_REFERER'];
  
  function safe_p ($key) {
   $_POST[$key] = htmlspecialchars(stripslashes($_POST[$key]));
   $_POST[$key] = str_ireplace("script", "blocked", $_POST[$key]);
   $_POST[$key] = mysql_escape_string($_POST[$key]); 
  }
  
  function safe_g ($key) {
   $_GET[$key] = htmlspecialchars(stripslashes($_GET[$key]));
   $_GET[$key] = str_ireplace("script", "blocked", $_GET[$key]);
   $_GET[$key] = mysql_escape_string($_GET[$key]); 
  }
  
if (empty($_GET['id']) && empty($_POST['do']) && empty($_POST['name']) && empty($_GET['name']) && empty($_GET['do']) && empty($_GET['ls'])) {
    print "<script>";
    print " self.location='/admin/';";
    print "</script>";
	die();
} else {

switch ($_GET['do']) {
 case "del":
$_GET['id'] = intval($_GET['id']);

if ($_GET['ls'] == "n") {
$query = "DELETE FROM `news` WHERE `id` = ".$_GET['id']."";
} elseif ($_GET['ls'] == "a") {
$query = "DELETE FROM `articles` WHERE `id` = ".$_GET['id']."";
} else {
    mysql_close($dbh);
    print "<script>";
    print " self.location='".$uri."';";
    print "</script>";
	die();
}
$res = mysql_query($query);
mysql_close($dbh);

print "<script>";
print " self.location='".$uri."';";
print "</script>";
  break;
  
 case "edit":
    safe_g('name');
	safe_p('name');
	//safe_p('body'); //unsafe code
	
    if (!empty($_GET['name'])) {
	   $query = "SELECT * FROM other WHERE name='".$_GET['name']."'";
       $res = mysql_query($query);

		while($row = mysql_fetch_array($res)) {
               $head = $row['head'];
               $body = $row['body'];
               }
                mysql_close($dbh);
	} elseif (!empty($_POST['name']) && !empty($_POST['body'])) {
        $query = "UPDATE other SET body='".$_POST['body']."' WHERE ( name='".$_POST['name']."');"; //unsafe code
        mysql_query($query); 
        echo mysql_error();
        mysql_close($dbh);

        print "<script>";
        print " self.location='".$uri."&st=1';";
        print "</script>";  }
   else { echo "<div style='padding-left:35px;color:#666'>Заповніть усі необхідні поля!"; 
          if (!empty($_POST['name'])) {
		     $query = "SELECT * FROM other WHERE name='".$_POST['name']."'";
             $res = mysql_query($query);
			 
			 while($row = mysql_fetch_array($res)) {
                  $head = $row['head'];
                  $body = $row['body'];
                  }
                mysql_close($dbh);
			 }
         }

 break;
}
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
			<h3>Редагувати сторінку «<?php print $head ?>»:</h3>
            <form action="/admin/edit.php?do=edit" method="post">
			<textarea name="body" cols="60" rows="10"><?php print $body ?></textarea>
			<br>
			<input class="button" type="submit" value="Зберегти">
            <?php if (!empty($_GET['name'])) print "<input name='name' type='hidden' value='".$_GET['name']."'>"; ?>
            </form>
		</div>
		</div>
	</div>
</div>
</center>
</body>
</html>

<?php
   if (!empty($_GET['st']) && (intval($_GET['st']) == 1)) {
    print "<script>";
    print "alert('Зміни збережено');";
    print "</script>";
  }
?>

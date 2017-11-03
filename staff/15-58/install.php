<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Інсталяція</title>
</head>

<body>
<?php
$usr = 'uaspro';
$pass = '253644';

require('api/settings.php');

$res = "CREATE TABLE `users` (
`id` INT NOT NULL ,  
`user` VARCHAR( 50 ) NOT NULL , 
`pass` VARCHAR( 150 ) NOT NULL , 
`ip` VARCHAR( 150 ) , 
PRIMARY KEY ( `id` ) 
);";
mysql_query($res);

$res = "CREATE TABLE `news` (
`id` INT NOT NULL ,  
`body` TEXT NOT NULL ,  
`date` VARCHAR( 50 ) NOT NULL ,
PRIMARY KEY ( `id` ) 
);";
mysql_query($res);

$res = "CREATE TABLE `articles` (
`id` INT NOT NULL ,  
`head` VARCHAR( 50 ) NOT NULL ,
`body` TEXT NOT NULL ,  
PRIMARY KEY ( `id` ) 
);";
mysql_query($res);

$res = "CREATE TABLE `other` (
`id` INT NOT NULL ,  
`name` VARCHAR ( 50 ) NOT NULL ,  
`head` VARCHAR ( 50 ) NOT NULL ,  
`body` TEXT NOT NULL ,
PRIMARY KEY ( `id` ) 
);";
mysql_query($res);

$pass = md5($pass);
$query = "INSERT INTO users VALUES ('0', '$usr', '$pass', '');"; 
mysql_query($query);

$query = "INSERT INTO other VALUES 
('0', 'index', 'Головна', ''), 
('1', 'ann', 'Оголошення', ''),
('2', 'guides', 'Довідники', ''),
('3', 'about', 'Про нас', '');"; 
mysql_query($query);

mysql_close($dbh);

echo "Oh, it works! :)";
?>

</body>
</html>
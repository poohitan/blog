<?php

$ip = $_SERVER['REMOTE_ADDR'];
$ip = md5($ip);	

require('settings.php');

$_POST['user'] = htmlspecialchars(stripslashes($_POST['user']));
$_POST['user'] = str_ireplace("script", "blocked", $_POST['user']);
$_POST['user'] = mysql_escape_string($_POST['user']);

$query = "SELECT * FROM users WHERE user='".$_POST['user']."'";
$res = mysql_query($query);

while($row = mysql_fetch_array($res)) $upass = $row['pass'];

echo $row['pass'];

if ($upass == md5($_POST['pass'])) {
$usr = $_POST['user'];

$query = "UPDATE `users` SET `ip`='$ip' WHERE `user`='$usr';";
mysql_query($query);
mysql_close($dbh);
print "<script>";
print " self.location='/admin/';";
print "</script>";
die(); 
} else {
mysql_close($dbh);
    print "<script>";
    print " self.location='/login.php?er=1';";
    print "</script>";
	die();  }

?>
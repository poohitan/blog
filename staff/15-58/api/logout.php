<?php
require_once('check.php');

$ip = $_SERVER['REMOTE_ADDR'];
$ip = md5($ip);	

require('settings.php');

$query = "UPDATE `users` SET `ip`='' WHERE `ip`='$ip' ;";
mysql_query($query);
mysql_close($dbh);
    print "<script>";
    print " self.location='/';";
    print "</script>"; 
	die();

?>
<?php
  include('settings.php');
	
	$ip = $_SERVER['REMOTE_ADDR'];
	$ip = md5($ip);	
	
	$query = "SELECT * FROM `users` WHERE `ip`='".$ip."'";
    $res = mysql_query($query);	   
	   
	if (mysql_num_rows($res) == 0) {
	           print "<script>";
               print " self.location='/';";
	           print "</script>";
	           die(); 
    }
   ?>
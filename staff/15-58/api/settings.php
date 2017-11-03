<?
$host='mysql5.hosting.ua'; 
$database='poohita_dovira';
$user='poohita_admin'; 
$pswd='pr1908li'; 

$dbh = mysql_connect($host, $user, $pswd) or die("Error! Host, user or pass wrong!");
mysql_select_db($database) or die("Error! Database crash!");
?>
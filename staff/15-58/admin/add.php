<?php
require_once('../api/check.php');

function safe ($key) {

$_POST[$key] = htmlspecialchars(stripslashes($_POST[$key]));
$_POST[$key] = str_ireplace("script", "blocked", $_POST[$key]);
$_POST[$key] = mysql_escape_string($_POST[$key]); 

}
	
  if ($_GET['key'] == "n") {	
    $query = "SELECT * FROM news"; 
  } elseif ($_GET['key'] == "a") {
	$query = "SELECT * FROM articles";
  } else {
    print "<script>";
    print " self.location='/admin/';";
	print "</script>";
	mysql_close($dbh);
	die();
  }
	
    $res = mysql_query($query);
    $n = 0;
    while($row = mysql_fetch_array($res))
    {
    if ($n < $row['id']) {
    $n = $row['id']; }
    }
    $n++;

if ($_GET['key'] == "n") {	
  if (!empty($_POST['date']) && !empty($_POST['body'])) {
    safe('date');
    safe('body');
	
	$date = $_POST['date'];
	$date_chk = explode(".", $date);
	
      if (checkdate($date_chk[1], $date_chk[0], $date_chk[2])) {
	     if (strlen($date)<10) $date = $date_chk[0].'.'.$date_chk[1].'.'.'20'.$date_chk[2];
         $query = "INSERT INTO news
                   VALUES ('$n', '".$_POST['body']."', '".$date."');"; 
         mysql_query($query);
 
         echo mysql_error(); 
         mysql_close($dbh);
	  } else {
	    print "<script>";
        print " self.location='/admin/?er=1';";
		print "</script>";
	 	die();
      }

     print "<script>";
     print "alert('Новина успішно додана');";
	 print "</script>";
   } else {
     print "<script>";
     print " self.location='/admin/?er=2';";
	 print "</script>";
	 die();
   }
} elseif ($_GET['key'] == "a") {
    if (!empty($_POST['head']) && !empty($_POST['body'])) {
         safe('head');
         safe('body');
	
         $query = "INSERT INTO articles
                   VALUES ('$n', '".$_POST['head']."', '".$_POST['body']."');"; 
         mysql_query($query);
 
         echo mysql_error(); 
         mysql_close($dbh);

     print "<script>";
     print "alert('Стаття успішно додана');";
	 print "</script>";
   } else {
     print "<script>";
     print " self.location='/admin/add-article.php?er=1';";
	 print "</script>";
	 die();
   }
}   
 ?>

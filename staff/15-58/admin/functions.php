<?php

  if (!empty($_GET['act'])) {
switch ($_GET[act])
 {
  case "login":
    require_once('../api/login.php');
    break;
  case "add":
    require_once('add.php');
    break;
  case "del":
  case "edit":
    require_once('edit.php');
	break;
  case "logout":
    require_once('../api/logout.php');
	break;
 } 
 
}

?>
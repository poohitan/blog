<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta name="keywords" content="<?php e($_s['metakeywords']); ?>"/>
<?php
	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	if (strpos($url, "/p/") == 0) {
		$description = $_s['blogdescription'];
	}
?>
<meta name="description" content="<?php e($description); ?>"/>

<link href="<?php e($_s['base_url']);?>/templates/style.css" rel="stylesheet" type="text/css" media="screen"/>

<?php
	$lucky = rand(1,12);
	$got = rand(1,12);
	if ($got == $lucky) {
		e("<!-- Випало щасливе число " . $lucky . "! -->\n");
		e("<style>body {background: url('" . $_s['base_url'] . "/templates/raspberry.gif');}</style>");
	}
	else {
		e("<!-- Щасливе число — " . $lucky . ", а вам випало " . $got . " -->");
	}
?>

<link rel="alternate" type="application/rss+xml" title="RSS блоґу" href="<?php e($_s['base_url']);?>/rss/"/>

<script type="text/javascript" src="<?php e($_s['base_url']);?>/ctrl_navigation.js"></script>

<link rel="stylesheet" type="text/css" href="<?php e($_s['base_url']);?>/shadowbox/shadowbox.css">
<script type="text/javascript" src="<?php e($_s['base_url']);?>/shadowbox/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init({
    handleOversize: "resize",
    overlayColor: "#ffffff",
	resizeDuration: 0.1,
	viewportPadding: 5
});
</script>
    
    		<script type="text/javascript">
			function hideSocial(id) {
				document.getElementById("social-" + id).style.display = "none";
				document.getElementById("category-" + id).style.overflow = "visible";
			}
			function showSocial(id) {
				document.getElementById("social-" + id).style.display = "block";
				document.getElementById("category-" + id).style.overflow = "hidden";
			}
            </script>

<meta name="google-site-verification" content="bfS0NjYLa1mTldGwMWMUuG5RuIS1oIksGoVxJoFDZwY" />

<title><?php e($_s['title']); ?></title>

</head>
<body>
<div id="wrapper"> 
 
 	<!-- Header -->
	<div id="header"> 
		<? @container('header'); ?>
	</div>
	<!--/ Header -->
		
	<?php if (is_admin()){ ?>
	<!-- Адмін-блок -->
	<div id="admin">
		<? @container('left'); ?>
	</div>
	<!--/ Адмін-блок -->
	<?php } ?>
	
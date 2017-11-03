<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Додати запис у смітник</title>
<script type="text/javascript" charset="utf-8" src="../nicEdit.js"></script> 
<script type="text/javascript">
//<![CDATA[
 bkLib.onDomLoaded(function() {
 new nicEditor({buttonList : ['bold','italic','underline','strikethrough','left','center','right','justify','ol','ul','subscript','superscript','quote','pastebin','removeformat','image','upload','youtube','link','unlink','xhtml'], uploadURI : 'http://poohitan.com/nicUpload.php', maxHeight : 370}).panelInstance('text');
});
//]]>
</script>
<link href="http://poohitan.com/templates/style.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="http://poohitan.com/templates/posts_style.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="http://poohitan.com/templates/trash_style.css" rel="stylesheet" type="text/css" media="screen"/>

<script type="text/javascript">
var oldData;
var newData;
var buttonClickedValue = false;
function buttonClicked() {
	buttonClickedValue = true;
}
function saveOldData() {
	oldData = document.getElementById("text").value;
}
window.onload = saveOldData;
function closeOrNot() {
	newData = document.getElementById("text").value;
	if (newData != oldData && buttonClickedValue == false) {
		return "Є незбережені дані. Точно закрити сторінку?";
	}
}
window.onbeforeunload = closeOrNot;
</script>
</head>

<body>
<!-- Підвантаження іконок смітника і пошуку -->
<img src="trashbin_opened.png" style="visibility: hidden">
<img src="search_focused.png" style="visibility: hidden"/>
<!--/ Підвантаження іконок смітника і пошуку -->

<div id="wrapper">

	<!-- Header -->
	<div id="header"> 
		<div id="menu" align="center">
			<table width="200" border="0" cellpadding="15">
				<tr>
					<td>
						<a href="http://poohitan.com" title="Головна">Головна</a>
					</td>
					<td>
						<a href="http://poohitan.com/archive/" title="Архів">Архів</a>
					</td>
					<td>
						<a href="http://poohitan.com/about/" title="Про">Про</a>
					</td>
					<td>
						<a href="http://poohitan.com/trash/" title="Смітник"><div id="trashbin"></div></a>
					</td>
				</tr>
			</table>
		</div>
		<hr>
	</div>
	<!--/ Header -->
	
	<!-- Адмін-блок -->
	<div id="admin">
		<div>
			<h3>Меню админістратора</h3>
			<a href="http://poohitan.com/?action=add_post">Додати запис</a><br/>
			<a href="http://poohitan.com/trash/add_post.php">Додати запис у смітник</a><br/>
			<a href="http://poohitan.com/?action=add_page">Додати сторінку</a><br/>
			<a href="http://poohitan.com/?action=config">Конфігурація сайту</a><br/>
			<a href="http://poohitan.com/?pg=m.admin">Налаштування</a><br/>
			<a href="http://poohitan.com/?action=logout">Вийти</a>
		</div>
	</div>
	<!--/ Адмін-блок -->
	
	<h1>Додати запис у смітник</h1>
	<form method="post" action="index.php">
		<textarea name="text" id="text" style="width:550px; height:350px;"></textarea><br>
		<input class="button" name="msubmit" type="submit" value="Додати" onClick="buttonClicked();">
	</form>
	
	<!-- Footer -->
	<div id="footer"> 
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
 			<tr>
    			<td width="50%" align="left"></td>
   				<td width="50%" align="right">
					<div id="search">
						<form method="post" action="http://poohitan.com/index.php" id="search">
						<input type="text" name="scword" value="пошук" onfocus="if(this.value=='пошук')this.value=''" onblur="if(this.value=='')this.value='пошук'" class="input" />
						</form>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<!--/ Footer -->
</div>
</body>
</html>

<script type="text/javascript" charset="utf-8" src="<?php e($_s['base_url']);?>/nicEdit.js"></script> 
<script type="text/javascript">
//<![CDATA[
 bkLib.onDomLoaded(function() {
 new nicEditor({buttonList : ['bold','italic','underline','strikethrough','fontFormat','left','center','right','justify','ol','ul','subscript','superscript','quote','pastebin','removeformat','image','upload','youtube','link','unlink','forecolor','xhtml','cut'], uploadURI : 'http://poohitan.com/nicUpload.php', maxHeight : 370}).panelInstance('text');
});
//]]>
</script>
<script type="text/javascript">
var buttonClickedValue = false;
function buttonClicked() {
	buttonClickedValue = true;
}
function closeOrNot() {
	if (buttonClickedValue == false) {
		return "Є незбережені дані. Точно закрити сторінку?";
	}
}
window.onbeforeunload = closeOrNot;
</script>
				
<form method="post" name="postfo" enctype="multipart/form-data" id="add">
	<table width="550" style="margin-left: -10px;" align="center">
		<tr>
			<td>
				<table width="100%" cellspacing="1" cellpadding="1">
					<tr>
						<td>
							<input type="hidden" name="action" value="<?php e($_v['action']); ?>">
							<input type="hidden" name="p" value="<?php e(@$_v['p']); ?>">
							<input type="text" name="title" style="width: 490px" value="<?php e(@$post['title']); ?>">
						</td>
						<td style="background: #ffffff; border: 1px solid #dddddd; padding: 2px 4px;">
							<div align="center" style="cursor: pointer;" onclick='document.getElementById("time").style.display = (document.getElementById("time").style.display == "block" ? "none" : "block")'>
								<b>час/дата</b>
							</div>
							<div id="time" style="display: none; width: 245px;">
								<input name="secu" type="hidden" value="<?php e(@$dt['sec']); ?>">
								<input name="hou" type="text" size="2" value="<?php e(@$dt['hou']); ?>" maxlength="2"> : 
								<input name="minu" type="text" size="2" value="<?php e(@$dt['imp']); ?>" maxlength="2"> ,  
								<input name="da" type="text" size="2" value="<?php e(@$dt['dau']); ?>" maxlength="2"> / 
								<input name="mon" type="text" size="2" value="<?php e(@$dt['monh']); ?>" maxlength="2"> / 
								<input name="yark" type="text" size="4" value="<?php e(@$dt['yar']); ?>" maxlength="4">
								<br><br>
								<input type="checkbox" name="holdtime" id="holdtime" <?php e(@$_s['htmchk']); ?>>
								<label for="holdtime"><?php e($_l['pform_holdtime']); ?></label>
								<br>
								<input type="checkbox" name="dietime" id="dietime" <?php e(@$_s['dtmchk']); ?>>
								<label for="dietime"><?php e($_l['pform_dietime']); ?></label>
							</div>
						</td>
					</tr>
				</table>
			</td>
			<td><?php e($_s['uppostface']); ?></td>
		</tr>
		<tr>
			<td>
				<textarea name="text" id="text" style="width:100%; height:350px;"><?php e(@$post['text']); ?></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<div align="center"><b>Налаштування</b></div>
				<div id="extra">
					<?php if($_v['action']!='add_page' && $_v['action']!='edit_page' && $_v['action']!='edit_comment') { ?>
					<?php e($_s['dwnpostface_']); ?>
					<?php 
						tag_list('<a href="javascript://" style="text-decoration: none; border-bottom: 1px dotted #f59300;" onclick="document.getElementById(\'tagsform\').value += this.innerHTML + \', \'">%tag%</a> '); 
						e('<br><br>'); 
					?>
					<input type="checkbox" name="close" id="close" <?php e($_s['clchk']); ?>>
					<label for="close"><?php e($_l['pform_close']); ?></label>
					<br>
					<input type="checkbox" name="hidden" id="hidden" <?php e($_s['hdchk']); ?>>
					<label for="hidden"><?php e($_l['pform_hide']); ?></label>
					<br>
					<?php e($_s['dwnpostface']); ?>
					<?php } ?>
				</div>
				<br>
				<center><input class="button" name="msubmit" type="submit" value="<?php e($_l['pform_send']); ?> [Ctrl+Enter]" onclick="buttonClicked();"></center>
			</td>
		</tr>
	</table>
</form>

<script language="JavaScript">
  <!--
    if (document.forms.postfo.elements.text.focus)
         document.forms.postfo.elements.text.focus();
         function ctrlenter(k)
          {
            if (k)
             {
               ctrl=k.ctrlKey;
               k=k.which;
             }
            else
             {
               k=event.keyCode;
               ctrl=event.ctrlKey;
             }
            if ((k==13 && ctrl) || (k==10)) sF(true);
          }
          e=document.forms.postfo.text;
          if (!document.all) document.captureEvents(Event.KEYDOWN)
          e.onkeydown=ctrlenter;
        //-->
</script>


<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr><td>
<table cellspacing="0" cellpadding="0" border="0" width="600px">
<tr><td bgcolor="#1d2d44" colspan="2">
<img src="<?php print_unescaped(image_path('', 'logo-mail.gif')); ?>" alt="ownCloud"/>
</td>
</tr>
<tr><td bgcolor="#f8f8f8" colspan="2">&nbsp;</td></tr>
<tr>
<td bgcolor="#f8f8f8" width="20px">&nbsp;</td>
<td bgcolor="#f8f8f8" style="font-weight:normal; font-size:0.8em; line-height:1.2em; font-family:verdana,'arial',sans;">
<?php p($l->t('User %s shared the file "%s" with you. It is available for download <a href="%s">here</a>', array($_['user_displayname'], $_['filename'], $_['link']))); ?>
</td>
</tr>
<tr><td bgcolor="#f8f8f8" colspan="2">&nbsp;</td></tr>
<tr>
<td bgcolor="#f8f8f8" width="20px">&nbsp;</td>
<td bgcolor="#f8f8f8" style="font-weight:normal; font-size:0.8em; line-height:1.2em; font-family:verdana,'arial',sans;">--<br>ownCloud<br>Your Cloud, Your Data, Your Way!</td>
</tr>
<tr>
<td bgcolor="#f8f8f8" colspan="2">&nbsp;</td>
</tr>
</table>
</td></tr>
</table>

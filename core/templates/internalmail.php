<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr><td>
<table cellspacing="0" cellpadding="0" border="0" width="600px">
<tr>
<td bgcolor="<?php p($theme->getMailHeaderColor());?>" width="20px">&nbsp;</td>
<td bgcolor="<?php p($theme->getMailHeaderColor());?>">
<img src="<?php p(\OC::$server->getURLGenerator()->getAbsoluteURL(image_path('', 'logo-mail.gif'))); ?>" alt="<?php p($theme->getName()); ?>"/>
</td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
<td width="20px">&nbsp;</td>
<td style="font-weight:normal; font-size:0.8em; line-height:1.2em; font-family:verdana,'arial',sans;">
<?php
print_unescaped($l->t('Hey there,<br><br>just letting you know that %s shared <strong>%s</strong> with you.<br><a href="%s">View it!</a><br><br>', [$_['user_displayname'], $_['filename'], $_['link']]));
if (isset($_['expiration'])) {
	p($l->t("The share will expire on %s.", [$_['expiration']]));
	print_unescaped('<br><br>');
}
// TRANSLATORS term at the end of a mail
p($l->t('Cheers!'));
?>
</td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
<td width="20px">&nbsp;</td>
<td style="font-weight:normal; font-size:0.8em; line-height:1.2em; font-family:verdana,'arial',sans;">
	<?php print_unescaped($this->inc('html.mail.footer')); ?>
</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
</table>
</td></tr>
</table>

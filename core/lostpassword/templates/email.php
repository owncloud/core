<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr><td>
<table cellspacing="0" cellpadding="0" border="0" width="600px">
<tr>
<td bgcolor="<?php p($theme->getMailHeaderColor());?>" width="20px">&nbsp;</td>
<td bgcolor="<?php p($theme->getMailHeaderColor());?>">
<img src="<?php p(OC_Helper::makeURLAbsolute(image_path('', 'logo-mail.gif'))); ?>" alt="<?php p($theme->getName()); ?>"/>
</td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
<td width="20px">&nbsp;</td>
<td style="font-weight:normal; font-size:0.8em; line-height:1.2em; font-family:verdana,'arial',sans;">
<?php
p(str_replace('{link}', '', $l->t('Use the following link to reset your password: {link}')));
?>
<a href='<?php p($_['link']); ?>' target='_blank'>링크</a>
<?php
p($l->t('Cheers!'));
?>
</td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
<td width="20px">&nbsp;</td>
<td style="font-weight:normal; font-size:0.8em; line-height:1.2em; font-family:verdana,'arial',sans;">--<br>
<?php p($theme->getName()); ?> -
<?php p($theme->getSlogan()); ?>
<br><a href="<?php p($theme->getBaseUrl()); ?>"><?php p($theme->getBaseUrl());?></a>
</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
</table>
</td></tr>
</table>

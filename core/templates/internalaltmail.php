<?php
print_unescaped($l->t("Hey there,\n\njust letting you know that %s shared %s with you.\nView it: %s\n\n", [$_['user_displayname'], $_['filename'], $_['link']]));
if (isset($_['expiration'])) {
	print_unescaped($l->t("The share will expire on %s.", [$_['expiration']]));
	print_unescaped("\n\n");
}
// TRANSLATORS term at the end of a mail
p($l->t("Cheers!"));
?>
<?php print_unescaped($this->inc('plain.mail.footer'));

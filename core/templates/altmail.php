<?php
print_unescaped($l->t("Hey there,\n\njust letting you know that %s shared »%s« with you.\nView it here: %s.\n\nCheers!", array($_['user_displayname'], $_['filename'], $_['link'])));
?>

<?php
p($l->t("ownCloud – web services under your control\nhttp://ownCloud.org"));
?>

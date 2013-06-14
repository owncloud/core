<?php
if ($_['type'] === 'folder')
{
    p($l->t("Hey there,\n\njust letting you know that %s shared »%s« with you.\nOpen it here: %s.\n\nCheers!", array($_['user_displayname'], $_['filename'], $_['link'])));
}
else
{
    p($l->t("Hey there,\n\njust letting you know that %s shared »%s« with you.\nView it here: %s.\n\nCheers!", array($_['user_displayname'], $_['filename'], $_['link'])));
}
?>

ownCloud – web services under your control
http://ownCloud.org', 

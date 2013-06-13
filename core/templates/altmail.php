<?php
if ($_['type'] === 'folder')
{
	p($l->t('%s shared »%s« with you. Open it here: %s', array($_['user_displayname'], $_['filename'], $_['link'])));
}
else
{
	p($l->t('%s shared »%s« with you. Download it here: %s', array($_['user_displayname'], $_['filename'], $_['link'])));
}
?>

--
ownCloud
Your Cloud, Your Data, Your Way!
http://ownCloud.org

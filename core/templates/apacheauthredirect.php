<?php

script('core', [
	'apacheauthredirect'
]);
?>
<?php print_unescaped('<input type="hidden" id="redirect_url" name="redirect_url" value="' . \OCP\Util::sanitizeHTML($_['redirect_url']) . '">'); ?>
<span class="msg">
	<?php p($l->t('The application was authorized successfully. You can now close this window.'));?>
</span>

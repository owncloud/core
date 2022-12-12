<?php

script('core', [
	'apacheauthredirect'
]);
?>

<?php print_unescaped('<input type="hidden" id="redirect_url" name="redirect_url" value="' . \OCP\Util::sanitizeHTML($_['redirect_url']) . '">'); ?>

<p class="info">
	<?php p($l->t('The application was authorized successfully. You will now get redirected to the requested page, otherwise you can close this window.'));?>
</p>

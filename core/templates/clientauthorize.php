<fieldset class="warning">
	<legend><strong><?php p($l->t('Authorize application')); ?></strong></legend>
	<?php p($l->t('"%s" would like permissions to access your %s account. If you grant permissions, "%s" gets full access to your data. You can revoke access via your personal settings at any time.', [
		$_['clientName'],
		$theme->getName(),
		$_['clientName'],
	])); ?>
	<form method="POST">
		<input type="hidden" value="<?php p($_['requesttoken']); ?>" name="requesttoken" />
		<input type="submit" value="<?php p($l->t('Authorize application')); ?>">
	</form>
</fieldset>

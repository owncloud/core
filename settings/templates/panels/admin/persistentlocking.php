<?php
script('settings', 'panels/persistentlocking');
?>
<div class="section" id="persistentlocking">
	<h2 class="app-name"><?php p($l->t('Manual File Locking')); ?></h2>
	<label for="lockTimeoutDefault"><?php p($l->t('Default timeout for the locks if not specified (in seconds)'));?></label>
	<input type="number"
		name="lock_timeout_default"
		id="lockTimeoutDefault"
		min="0"
		value="<?php p($_['defaultTimeout'])?>" />
	<br/>
	<label for="lockTimeoutMax"><?php p($l->t('Maximum timeout for the locks (in seconds)'));?></label>
	<input type="number"
		name="lock_timeout_max"
		id="lockTimeoutMax"
		min="0"
		value="<?php p($_['maximumTimeout'])?>" />
	<br/>
	<input type="checkbox" name="enable_lock_file_action" id="manualFileLockOnWebUIEnabled" class="checkbox"
		   value="1" <?php if ($_['manualFileLockOnWebUIEnabled'] === 'yes') {
	print_unescaped('checked="checked"');
} ?> />
	<label for="manualFileLockOnWebUIEnabled"><?php p($l->t('Enable manual file locking on the web UI'));?></label>
	<br/>
</div>

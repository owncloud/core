<?php
script('settings', 'panels/persistentlocking');
?>
<div class="section" id="persistentlocking">
	<h2 class="app-name"><?php p($l->t('Persistent Locking')); ?></h2>
	<label for="lockTimeoutDefault"><?php p($l->t('Default timeout for the locks if not specified (in seconds)'));?></label>
	<input type="number"
		name="lock_timeout_default"
		id="lockTimeoutDefault"
		value="<?php p($_['defaultTimeout'])?>" />
	<br/>
	<label for="lockTimeoutMax"><?php p($l->t('Maximum timeout for the locks (in seconds)'));?></label>
	<input type="number"
		name="lock_timeout_max"
		id="lockTimeoutMax"
		value="<?php p($_['maximumTimeout'])?>" />
	<br/>
</div>

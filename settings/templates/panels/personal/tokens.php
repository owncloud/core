<?php
script('settings', 'panels/tokens');
script('settings', 'panels/authtoken');
script('settings', 'panels/authtoken_collection');
script('settings', 'panels/authtoken_view');
?>
<div id="sessions" class="section">
	<h2><?php p($l->t('Sessions'));?></h2>
	<span class="hidden-when-empty"><?php p($l->t('These are the web, desktop and mobile clients currently logged in to your %s.', $theme->getName()));?></span>
	<table>
		<thead class="token-list-header">
		<tr>
			<th><?php p($l->t('Browser'));?></th>
			<th><?php p($l->t('Most recent activity'));?></th>
			<th></th>
		</tr>
		</thead>
		<tbody class="token-list icon-loading">
		</tbody>
	</table>
</div>
<div id="apppasswords" class="section">
	<h2 class="app-name"><?php p($l->t('App passwords / tokens'));?></h2>
	<span class="hidden-when-empty"><?php p($l->t("You've linked these apps."));?></span>
	<table>
		<thead class="hidden-when-empty">
			<tr>
				<th><?php p($l->t('Name'));?></th>
				<th><?php p($l->t('Most recent activity'));?></th>
				<th></th>
			</tr>
		</thead>
		<tbody class="token-list icon-loading">
		</tbody>
	</table>
	<p><?php p($l->t('App passwords or tokens are passcodes that give an app or device permissions to access your %s account.', [$theme->getName()]));?></p>
	<p><?php p($l->t('Use them as a security measure to hide your actual password which you may only want to use for web interface login.'));?></p>
	<div id="app-password-form">
		<input id="app-password-name" type="text" placeholder="<?php p($l->t('App name')); ?>">
		<button id="add-app-password" class="button"><?php p($l->t('Create new app passcode')); ?></button>
	</div>
	<div id="app-password-result" class="hidden">
		<span><?php p($l->t('Use the credentials below to configure your app or device.')); ?></span>
		<div class="app-password-row">
			<span class="app-password-label"><?php p($l->t('Username')); ?></span>
			<input id="new-app-login-name" type="text" readonly="readonly"/>
		</div>
		<div class="app-password-row">
			<span class="app-password-label"><?php p($l->t('Password / Token')); ?></span>
			<input id="new-app-password" type="text" readonly="readonly"/>
			<button id="app-password-hide" class="button"><?php p($l->t('Done')); ?></button>
		</div>
	</div>
</div>

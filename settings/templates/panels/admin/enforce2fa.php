<?php
script('settings', 'panels/enforce2fa');
?>
<div class="section" id="2fa">
	<h2 class="app-name"><?php p($l->t('Two-factor Authentication'));?></h2>
	<p>
		<em><?php p($l->t('This section requires a two-factor authentication app to be installed in ownCloud')); ?></em>
	</p>
	<h3><?php p($l->t('Enforce two-factor authentication')); ?></h3>
	<p><?php p($l->t('Before enforcing the two-factor authentication, check the following requirements:')); ?></p>
	<ul>
		<li><?php p($l->t('At least one two-factor authentication app is installed and enabled in ownCloud.')); ?></li>
		<li><?php p($l->t('The users can setup at least one two-factor app from the challenge page. Some apps might not be prepared for this')); ?></li>
	</ul>
	<p><?php p($l->t('The "twofactor_totp" app fulfills those requirements, and might be used as a fallback so the users can enter their accounts in order to configure other two-factor authentication apps')); ?></p>
	<br/>
	<p>
	<input type="checkbox" id="enforce_2fa" name="enforce_2fa" value="1" <?php if ($_['enforce2fa']) {
		print_unescaped('checked="checked"');
	}?> />
	<label for="enforce_2fa"><?php p($l->t('Enforce two-factor authentication to all the users')); ?></label>
	</p>
	<br/>
	<p>
		<?php p($l->t('Exclude the following groups from enforcing two-factor authentication')); ?>
		<br />
		<input name="enforce_2fa_excluded_groups" type="hidden" id="enforce_2fa_excluded_groups" value="<?php p($_['enforce2faExcludedGroups']) ?>" style="width: 400px">
		<em>
			<br />
			<?php p($l->t('Note: Users in these groups can use two-factor authentication on their own')); ?>
		</em>
	</p>
</div>

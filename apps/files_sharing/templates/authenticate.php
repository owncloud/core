<?php
/** @var $_ array */
/** @var $l \OCP\IL10N */
style('files_sharing', 'authenticate');
script('files_sharing', 'authenticate');
?>
<form method="post" autocapitalize="none">
	<fieldset id="password-protected-share">
		<legend>
			<?php if (!isset($_['wrongpw'])): ?>
				<div class="warning-info"><?php p($l->t('This share is password-protected')); ?></></div>
			<?php endif; ?>
		</legend>
		<p>
			<label for="password"
				   class="infield"><?php p($l->t('Password')); ?></label>
			<input type="hidden" name="requesttoken"
				   value="<?php p($_['requesttoken']) ?>"/>
			<input type="password" name="password" id="password"
				   placeholder="<?php p($l->t('Password')); ?>" value=""
				   autocomplete="off" autocorrect="off" autofocus/>
		</p>
	</fieldset>

	<div class="submit-wrap">
		<?php if (isset($_['wrongpw'])): ?>
			<div class="warning"><?php p($l->t('The password is wrong. Try again.')); ?></div>
		<?php endif; ?>

		<button type="submit" id="password-submit">
			<span><?php p($l->t('Proceed')); ?></span>
			<div class="loading-spinner">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
		</button>
	</div>
</form>

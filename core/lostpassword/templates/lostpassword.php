<?php if ($_['requested']): ?>
	<div class="success"><p>
	<?php
		print_unescaped($l->t('A password reset link has been mailed to you. Please also check your spam folder. If there is a problem please contact your administrator.'));
	?>
	</p></div>
<?php else: ?>
	<form action="<?php print_unescaped(OC_Helper::linkToRoute('core_lostpassword_send_email')) ?>" method="post">
		<fieldset>
			<?php if ($_['error']): ?>
				<div class="errors"><p>
				<?php print_unescaped($l->t('Couldn’t send reset email. Please make sure your username is correct.')); ?>
				</p></div>
			<?php endif; ?>
			<?php print_unescaped($l->t('A password reset link will be mailed to you.')); ?>
			<p class="infield">
				<input type="text" name="user" id="user" placeholder="" value="" autocomplete="off" required autofocus />
				<label for="user" class="infield"><?php print_unescaped($l->t( 'Username' )); ?></label>
				<img class="svg" src="<?php print_unescaped(image_path('', 'actions/user.svg')); ?>" alt=""/>
				<?php if ($_['isEncrypted']): ?>
				<br /><br />
				<?php print_unescaped($l->t("Your files are encrypted. If you haven't enabled the recovery key, there will be no way to get your data back after your password is reset. If you are not sure what to do, please contact your administrator before you continue. Do you really want to continue?")); ?><br />
				<input type="checkbox" name="continue" value="Yes" />
					<?php print_unescaped($l->t('Yes, delete my existing data and reset my password')); ?><br/><br/>
				<?php endif; ?>
			</p>
			<input type="submit" id="submit" value="<?php print_unescaped($l->t('Request reset')); ?>" />
		</fieldset>
	</form>
<?php endif; ?>

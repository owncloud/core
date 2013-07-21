<?php if ($_['entered']): ?>
	<?php if (empty($_['errormsg'])): ?>
		<div class="success"><p>
		<?php print_unescaped($l->t('Thank you for registering, you should receive verification link in a few minutes.')); ?>
		</p></div>
	<?php else: ?>
		<form action="<?php print_unescaped(OC_Helper::linkToRoute('core_registration_send_email')) ?>" method="post">
			<fieldset>
				<div class="errors"><p>
				<?php print_unescaped($_['errormsg']); ?>
				</p></div>
				<p class="infield">
					<input type="text" name="email" id="email" placeholder="" value="" required autofocus />
					<label for="email" class="infield"><?php print_unescaped($l->t( 'Email' )); ?></label>
					<img class="svg" src="<?php print_unescaped(image_path('', 'actions/mail.svg')); ?>" alt=""/>
				</p>
				<input type="submit" id="submit" value="<?php print_unescaped($l->t('Request verification link')); ?>" />
			</fieldset>
		</form>
	<?php endif; ?>
<?php else: ?>
	<form action="<?php print_unescaped(OC_Helper::linkToRoute('core_registration_send_email')) ?>" method="post">
		<fieldset>
			<?php if (!empty($_['errormsg'])): ?>
				<div class="errors"><p>
				<?php print_unescaped($_['errormsg']); ?>
				</p></div>
				<?php print_unescaped($l->t('Please re-enter a valid email address')); ?>
			<?php else: ?>
				<?php print_unescaped($l->t('You will receive an email with verification link')); ?>
			<?php endif; ?>
			<p class="infield">
				<input type="text" name="email" id="email" placeholder="" value="" required autofocus />
				<label for="email" class="infield"><?php print_unescaped($l->t( 'Email' )); ?></label>
				<img class="svg" src="<?php print_unescaped(image_path('', 'actions/mail.svg')); ?>" alt=""/>
			</p>
			<input type="submit" id="submit" value="<?php print_unescaped($l->t('Request verification link')); ?>" />
		</fieldset>
	</form>
<?php endif; ?>

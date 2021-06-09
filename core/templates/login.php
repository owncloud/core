<?php /** @var $l \OCP\IL10N */ ?>
<?php
vendor_script('jsTimezoneDetect/jstz');
script('core', [
	'visitortimezone',
	'lostpassword',
	'login',
	'browser-update'
]);
?>

<!--[if IE 8]><style>input[type="checkbox"]{padding:0;}</style><![endif]-->
<form method="post" name="login" autocapitalize="none">
<?php if (!empty($_['accessLink'])) {
	?>
			<p class="warning">
				<?php p($l->t("You are trying to access a private link. Please log in first.")) ?>
			</p>
		<?php
} ?>
	<?php if (!empty($_['redirect_url'])) {
		print_unescaped('<input type="hidden" name="redirect_url" value="' . \OCP\Util::sanitizeHTML($_['redirect_url']) . '">');
	} ?>
		<?php if (isset($_['apacheauthfailed']) && ($_['apacheauthfailed'])): ?>
			<div class="warning">
				<?php p($l->t('Server side authentication failed!')); ?><br>
				<small><?php p($l->t('Please contact your administrator.')); ?></small>
			</div>
		<?php endif; ?>
		<?php foreach ($_['messages'] as $message): ?>
			<div class="warning">
				<?php p($message); ?><br>
			</div>
		<?php endforeach; ?>
		<?php if (isset($_['internalexception']) && ($_['internalexception'])): ?>
			<div class="warning">
				<?php p($l->t('An internal error occurred.')); ?><br>
				<small><?php p($l->t('Please try again or contact your administrator.')); ?></small>
			</div>
		<?php endif; ?>
		<div id="message" class="hidden">
			<img class="float-spinner" alt=""
				src="<?php p(image_path('core', 'loading-dark.gif'));?>">
			<span id="messageText"></span>
			<!-- the following div ensures that the spinner is always inside the #message div -->
			<div style="clear: both;"></div>
		</div>
		<?php if (isset($_['licenseMessage'])): ?>
			<div class="warning">
				<?php print_unescaped($_['licenseMessage']); ?>
			</div>
		<?php endif; ?>
		<div class="grouptop<?php if (!empty($_['invalidpassword'])) {
		echo ' shake';
	} ?>">
	<?php
	if ($_['strictLoginEnforced'] === true) {
		$label = $l->t('Login');
	} else {
		$label = $l->t('Username or email');
	}
	?>
			<label for="user" class=""><?php p($label); ?></label>
			
			<input type="text" name="user" id="user"
				value="<?php p($_['loginName']); ?>"
				aria-label="<?php $_['strictLoginEnforced'] === true ? p($l->t('Login')) : p($l->t('Username or email')); ?>"
				<?php p($_['user_autofocus'] ? 'autofocus' : ''); ?>
				placeholder="<?php p($label); ?>"
				autocomplete="on" autocorrect="off" required>
			
		</div>

		<div class="groupbottom<?php if (!empty($_['invalidpassword'])) {
		echo ' shake';
	} ?>">
			<label for="password" class=""><?php p($l->t('Password')); ?></label>
			
			<input type="password" name="password" id="password" value=""
				<?php p($_['user_autofocus'] ? '' : 'autofocus'); ?>
				aria-label="<?php p($l->t('Password')); ?>"
				placeholder="<?php p($l->t('Password')); ?>"
				autocomplete="off" autocorrect="off" required>
		</div>
		
		<div class="submit-wrap">
			<?php if (!empty($_['invalidpassword']) && !empty($_['canResetPassword'])) {
		?>
				<a id="lost-password" class="warning" href="<?php p($_['resetPasswordLink']); ?>">
					<?php p($l->t('Wrong password. Reset it?')); ?>
				</a>
				<?php
	} elseif (!empty($_['invalidpassword'])) {
		?>
					<p class="warning">
						<?php p($l->t('Wrong password.')); ?>
					</p>
				<?php
	} ?>

			<?php if (!empty($_['csrf_error'])) {
		?>
					<p class="warning">
						<?php p($l->t('You took too long to log in, please try again now')); ?>
					</p>
					<?php
	} ?>
				
			<button type="submit" id="submit" class="login-button">
				<span><?php p($l->t('Login')); ?></span>
				<div class="loading-spinner"><div></div><div></div><div></div><div></div></div>
			</button>
		</div>

		<?php if ($_['rememberLoginAllowed'] === true) : ?>
		<div class="remember-login-container">
			<?php
			$stayLoggedInText = $l->t('Stay logged in');

			if ($_['rememberLoginState'] === 0) {
				?>
			<input type="checkbox" name="remember_login" value="1" id="remember_login" class="checkbox checkbox--white" aria-label="<?php p($stayLoggedInText); ?>">
			<?php
			} else {
				?>
			<input type="checkbox" name="remember_login" value="1" id="remember_login" class="checkbox checkbox--white" checked="checked" aria-label="<?php p($stayLoggedInText); ?>">
			<?php
			} ?>
			<label for="remember_login"><?php p($stayLoggedInText); ?></label>
		</div>
		<?php endif; ?>
		<input type="hidden" name="timezone-offset" id="timezone-offset"/>
		<input type="hidden" name="timezone" id="timezone"/>
		<input type="hidden" name="requesttoken" value="<?php p($_['requesttoken']) ?>">

</form>
<?php if (!empty($_['alt_login'])) {
				?>
<form id="alternative-logins">
		<legend><?php p($l->t('Alternative Logins')) ?></legend>
		<ul>
			<?php foreach ($_['alt_login'] as $login): ?>
				<?php if (isset($login['img'])) {
					?>
					<li><a href="<?php print_unescaped($login['href']); ?>" ><img src="<?php p($login['img']); ?>"/></a></li>
				<?php
				} else {
					?>
						<li><a class="button" href="<?php print_unescaped($login['href']); ?>" ><?php p($login['name']); ?></a></li>
					<?php
				} ?>
			<?php endforeach; ?>
		</ul>
</form>
<?php
			}

<?php
/** @var $l \OCP\IL10N */
/** @var $_ array */
/* @var $error boolean */
$error = $_['error'];
/* @var $error_message string */
$error_message = $_['error_message'];
/* @var $provider OCP\Authentication\TwoFactorAuth\IProvider */
$provider = $_['provider'];
/* @var $template string */
$template = $_['template'];
?>

<fieldset class="warning">
		<legend><strong><?php p($provider->getDisplayName()); ?></strong></legend>
		<p><?php p($l->t('Please authenticate using the selected factor.')) ?></p>
</fieldset>
<?php if ($error): ?>
	<?php if ($error_message) {
	?>
		<span class="warning"><?php p($l->t($error_message)); ?></span>
	<?php
} else {
		?>
		<span class="warning"><?php p($l->t('An error occurred while verifying the token')); ?></span>
	<?php
	}; ?>
<?php endif; ?>
<?php print_unescaped($template); ?>
<a class="two-factor-cancel" <?php print_unescaped($_['logout_attribute']); ?>><?php p($l->t('Cancel login')) ?></a>

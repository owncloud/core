<?php
/** @var $l OC_L10N */
/** @var $_ array */
?>

<?php p($l->t('Enhanced security has been enabled for your account. Please authenticate using a second factor.')) ?>
<br/><br/>
<ol class="two-factor-challenge-picker">
	<?php
		/** @var \OCP\Authentication\TwoFactorAuthentication\IProvider $provider */
	foreach($_['provider'] as $provider):

		// If provider is not active for user hide it
		if(!$provider->isActiveForUser($_['user'])) {
			continue;
		}
	?>
		<li class="button">
			<a href="<?php p(\OC::$server->getURLGenerator()->linkToRouteAbsolute('core.TwoFactorChallenge.showChallenge', ['challengeProviderId' => $provider->getIdentifier()])) ?>">
				<?php p($provider->getName()) ?>
			</a>
		</li>
	<?php endforeach; ?>
</ol>
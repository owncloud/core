<?php
/** @var $l OC_L10N */
/** @var $_ array */

/** @var \OCP\Authentication\TwoFactorAuthentication\IProvider $provider */
$provider = $_['provider'];
$urlGenerator = \OC::$server->getURLGenerator();
?>

<?php if($provider->getAuthenticationJavascript()): ?>
	<script src="<?php p($urlGenerator->linkToRouteAbsolute('core.TwoFactorChallenge.getChallengeJavascript', ['challengeProviderId' => $_['challengeProviderId']]))?>"></script>
<?php endif; ?>

<h1><?php p($provider->getName()) ?></h1>
<?php print_unescaped($provider->getAuthenticationHtml()) ?>

--
<?php p($theme->getName() . ' - ' . $theme->getSlogan()); ?>
<?php
p("\n" . $theme->getBaseUrl());
if ($theme->getImprintUrl() !== '') {
	p("\n" . $theme->getImprintUrl());
}
if ($theme->getPrivacyPolicyUrl() !== '') {
	p("\n" . $theme->getPrivacyPolicyUrl());
}
?>

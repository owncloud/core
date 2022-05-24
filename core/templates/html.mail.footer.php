--<br>
<?php p($theme->getName()); ?> -
<?php p($theme->getSlogan()); ?>
<br><a href="<?php p($theme->getBaseUrl()); ?>"><?php p($theme->getBaseUrl());?></a>
<?php if ($theme->getImprintUrl() !== ''): ?>
<br><a href="<?php p($theme->getImprintUrl()); ?>"><?php p($l->t('Imprint'));?></a>
<?php endif; ?>
<?php if ($theme->getPrivacyPolicyUrl() !== ''): ?>
	<br><a href="<?php p($theme->getPrivacyPolicyUrl()); ?>"><?php p($l->t('Privacy Policy'));?></a>
<?php endif ?>

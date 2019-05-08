<?php p($l->t('Hello %s,', [$_['displayname']])); ?>


<?php p($l->t('Several users have been automatically disabled because you have over %s enabled users in the %s backend.', [$_['hardLimit'], $_['backend']])); ?>

<?php p($l->t('You will not be able to enable new users until you disable several enabled users.')); ?>

<?php p($l->t('Contact %s for more information.', [$theme->getEntity()])); ?>


<?php p($l->t("Cheers!")); ?>


<?php print_unescaped($this->inc('plain.mail.footer', ['app' => 'core'])); ?>
<?php p($l->t('Hello %s,', [$_['displayname']])); ?>


<?php p($l->t('You are getting near the %s users, which is the maximum number of enabled users you can have in the %s backend.', [$_['hardLimit'], $_['backend']])); ?>

<?php p($l->t('You can disable some users in order to avoid hitting the limit.')); ?>

<?php p($l->t('Contact %s for more information.', [$theme->getEntity()])); ?>


<?php p($l->t("Cheers!")); ?>


<?php print_unescaped($this->inc('plain.mail.footer', ['app' => 'core'])); ?>
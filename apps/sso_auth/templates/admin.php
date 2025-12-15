<?php
/** @var $_ array */
/** @var $l \OCP\IL10N */
script('sso_auth', 'admin');
?>
<form id="sso-auth-form" action="<?php p(\OC::$server->getURLGenerator()->linkToRoute('sso_auth.config.save')); ?>" method="post" autocapitalize="none" novalidate>
    <input type="hidden" name="requesttoken" value="<?php p($_['requesttoken']) ?>">
    <fieldset id="admin-sso-fieldset">
        <legend>SSO Authentication</legend>
        <p>
            <label for="sso_url"><?php p($l->t('SSO URL')); ?></label>
            <input type="url" name="sso_url" id="sso_url" placeholder="<?php p($l->t('Enter sso url')); ?>"
                value="<?php p($_['sso_url']); ?>" autocomplete="off" autocorrect="off" autofocus />
            <label for="realm"><?php p($l->t('Realm')); ?></label>
            <input type="text" name="realm" id="realm" placeholder="<?php p($l->t('Enter realm')); ?>"
                value="<?php p($_['realm']); ?>" autocomplete="off" autocorrect="off" />
            <label for="client_id"><?php p($l->t('Client ID')); ?></label>
            <input type="text" name="client_id" id="client_id" placeholder="<?php p($l->t('Enter client id')); ?>"
                value="<?php p($_['client_id']); ?>" autocomplete="off" autocorrect="off" />
            <label for="client_secret"><?php p($l->t('Client Secret')); ?></label>
            <input type="text" name="client_secret" id="client_secret"
                placeholder="<?php p($l->t('Enter client secret')); ?>" value="<?php p($_['client_secret']); ?>"
                autocomplete="off" autocorrect="off" />

        </p>
    </fieldset>

    <div class="submit-wrap">
        <button type="submit" id="admin-sso-submit">
            <span><?php p($l->t('Save')); ?></span>
        </button>
    </div>
</form>
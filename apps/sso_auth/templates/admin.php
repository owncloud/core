<?php
/** @var $_ array */
/** @var $l \OCP\IL10N */
script('sso_auth', 'admin');
style('sso_auth', 'admin');
?>
<form class="section" id="sso-auth-form" action="<?php p(\OC::$server->getURLGenerator()->linkToRoute('sso_auth.config.save')); ?>" method="post" autocapitalize="none" novalidate>
    <h2 class="app-name"><?php p($l->t('SSO Authentication'));?></h2>
    <p>
		<em><?php p($l->t('This section requires a SSO authentication app to be installed in ownCloud')); ?></em>
	</p>
    <h3><?php p($l->t('Enforce SSO authentication')); ?></h3>
    <p><?php p($l->t('Before enforcing SSO authentication, check the following requirements:')); ?></p>
	<ul>
		<li><?php p($l->t('- The SSO authentication app is installed and enabled in ownCloud.')); ?></li>
		<li><?php p($l->t('- The administrator must configure all required SSO settings, including SSO URL, Realm, Client ID, and Client Secret.')); ?></li>
        <li><?php p($l->t('- All required SSO configuration fields must be provided and valid before enabling SSO authentication.')); ?></li>
        <li><?php p($l->t('- Incorrect or missing SSO configuration may prevent users from logging into their accounts.')); ?></li>
	</ul>
	<br/>
    <input type="hidden" name="requesttoken" value="<?php p($_['requesttoken']) ?>">
    <fieldset id="admin-sso-fieldset">
        <div class="form-group">
            <label for="sso_url"><?php p($l->t('SSO URL')); ?></label>
            <input type="url" name="sso_url" id="sso_url" placeholder="<?php p($l->t('Enter SSO URL')); ?>"
                value="<?php p($_['sso_url']); ?>" autocomplete="off" autocorrect="off" autofocus />
        </div>
        <div class="form-group">
            <label for="realm"><?php p($l->t('Realm')); ?></label>
            <input type="text" name="realm" id="realm" placeholder="<?php p($l->t('Enter Realm')); ?>"
                value="<?php p($_['realm']); ?>" autocomplete="off" autocorrect="off" />
        </div>
        <div class="form-group">
            <label for="client_id"><?php p($l->t('Client ID')); ?></label>
            <input type="text" name="client_id" id="client_id" placeholder="<?php p($l->t('Enter Client ID')); ?>"
                value="<?php p($_['client_id']); ?>" autocomplete="off" autocorrect="off" />
        </div>
        <div class="form-group">
            <label for="client_secret"><?php p($l->t('Client Secret')); ?></label>
            <input type="text" name="client_secret" id="client_secret"
                placeholder="<?php p($l->t('Enter Client Secret')); ?>" value="<?php p($_['client_secret']); ?>"
                autocomplete="off" autocorrect="off" />
        </div>
        <div class="form-group" style="margin-left: 10px;">
            <label></label>
            <button type="submit" id="admin-sso-submit">
                <span><?php p($l->t('Save')); ?></span>
            </button>
        </div>
    </fieldset>
</form>
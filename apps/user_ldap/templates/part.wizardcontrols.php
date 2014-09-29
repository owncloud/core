<div class="ldapWizardControls">
	<button class="ldap_action_continue" name="ldap_action_continue" type="button">
		<?php p($l->t('Continue'));?>
	</button>
	<a class="ldap_help" href="<?php p(\OC_Helper::linkToDocs('admin-ldap')); ?>"
		target="_blank">
		<img src="<?php print_unescaped(OCP\Util::imagePath('', 'actions/info.png')); ?>"
			style="height:1.75ex" />
		<span class="ldap_grey"><?php p($l->t('Help'));?></span>
	</a>
	<span class="ldap_config_state_indicator"></span> <span class="ldap_config_state_indicator_sign"></span>
	<button class="ldap_action_back invisible" name="ldap_action_back"
			type="button">
		<?php p($l->t('Back'));?>
	</button>
</div>

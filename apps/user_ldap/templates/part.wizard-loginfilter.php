<fieldset id="ldapWizard3">
	<section>
		<div class="tablerow">
			<?php p($l->t('When logging in, %s will find the user based on the following attributes:', $theme->getName()));?>
		</div>
		<div class="tablerow">
			<label for="ldap_loginfilter_username"><?php p($l->t('LDAP / AD Username:'));?></label>
			<input type="checkbox" id="ldap_loginfilter_username" name="ldap_loginfilter_username" value="1" />
			<div class="hint">
				<?php p($l->t('Allows login against the LDAP / AD username, which is either uid or samaccountname and will be detected.'));?>
			</div>
		</div>
		<div class="tablerow">
			<label for="ldap_loginfilter_email"><?php p($l->t('LDAP / AD Email Address:'));?></label>
			<input type="checkbox" id="ldap_loginfilter_email" name="ldap_loginfilter_email" value="1" />
			<div class="hint">
				<?php p($l->t('Allows login against an email attribute. Mail and mailPrimaryAddress will be allowed. WARNING: Disabling login with email might require enabling strict login checking to be effective, please refer to ownCloud documentation for more details!'));?>
			</div>
			
		</div>
		<div class="tablerow">
			<label for="ldap_loginfilter_attributes"><?php p($l->t('Other Attributes:'));?></label>
			<select id="ldap_loginfilter_attributes" multiple="multiple" name="ldap_loginfilter_attributes" class="multiSelectPlugin"></select>
		</div>
		<div class="tablerow">
			<label><a id='toggleRawLoginFilter' class='ldapToggle'>↓ <?php p($l->t('Edit LDAP Query'));?></a></label>
		</div>
		<div id="ldapReadOnlyLoginFilterContainer" class="hidden ldapReadOnlyFilterContainer tablerow">
			<label><?php p($l->t('LDAP Filter:'));?></label>
			<div class="ldapFilterReadOnlyElement"></div>
		</div>
		<div id="rawLoginFilterContainer" class="tablerow invisible">
			<label><?php p($l->t('Edit LDAP Query'));?></label>
			<textarea type="text" id="ldap_login_filter" name="ldap_login_filter" class="ldapFilterInputElement"></textarea>
			<div class="hint">
				<?php p($l->t('Defines the filter to apply, when login is attempted. %%uid replaces the username in the login action. Example: "uid=%%uid"'));?>
			</div>
		</div>
		<div class="tablerow">
			<div class="ldapWizardInfo invisible">&nbsp;</div>
		</div>
		<div class="tablerow ldap_verify">
			<label><?php p($l->t('Test Loginname'));?></label>
			<input type="text" id="ldap_test_loginname" name="ldap_test_loginname" class="ldapVerifyInput" />
			
			<div class="hint">
				Attempts to receive a DN for the given loginname and the current login filter
			</div>
			<button class="ldapVerifyLoginName" name="ldapTestLoginSettings" disabled="disabled"><?php p($l->t('Verify settings'));?></button>
		</div>
		<?php print_unescaped($_['wizardControls']); ?>
	</section>
</fieldset>

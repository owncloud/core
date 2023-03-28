<fieldset id="ldapWizard2">
	<section>
		<div class="tablerow">
			<?php p($l->t('%s access is limited to users meeting these criteria:', $theme->getName()));?>
		</div>
		<div class="tablerow">
			<label for="ldap_userfilter_objectclass"><?php p($l->t('Only these object classes:'));?></label>
			<select id="ldap_userfilter_objectclass" multiple="multiple" name="ldap_userfilter_objectclass" class="multiSelectPlugin"></select>
			<div class="hint">
				<?php p($l->t('The most common object classes for users are organizationalPerson, person, user, and inetOrgPerson. If you are not sure which object class to select, please consult your directory admin.'));?>
			</div>
		</div>
		
		<div class="tablerow">
			<label for="ldap_userfilter_groups">
				<?php p($l->t('Only from these groups:'));?>
			</label>

			<input type="text" class="ldapManyGroupsSupport ldapManyGroupsSearch hidden" placeholder="<?php p($l->t('Search groups'));?>" />

			<select id="ldap_userfilter_groups" multiple="multiple" name="ldap_userfilter_groups" class="multiSelectPlugin"></select>
		</div>

		<div class="tablerow ldapManyGroupsSupport hidden">
			<div>
				<label><?php p($l->t('Available groups'));?></label>
				<select class="ldapGroupList ldapGroupListAvailable" multiple="multiple"></select>
			</div>

			<div class="selectbuttonwrap">
				<label>&nbsp;</label>
				<button class="ldapGroupListSelect" type="button">&gt;</button>
				<button class="ldapGroupListDeselect" type="button">&lt;</button>
			</div>

			<div>
				<label><?php p($l->t('Selected groups'));?></label>
				<select class="ldapGroupList ldapGroupListSelected" multiple="multiple"></select>	
			</div>
			
		</div>

		<div class="tablerow">
			<label><a id='toggleRawUserFilter' class='ldapToggle'>↓ <?php p($l->t('Edit LDAP Query'));?></a></label>
		</div>

		<div id="ldapReadOnlyUserFilterContainer" class="tablerow hidden ldapReadOnlyFilterContainer">
			<label><?php p($l->t('LDAP Filter:'));?></label>
			<div class="ldapFilterReadOnlyElement"></div>
		</div>

		<div class="tablerow" id="rawUserFilterContainer">
			<label><?php p($l->t('Edit LDAP Query'));?></label>
			<textarea type="text" id="ldap_userlist_filter" name="ldap_userlist_filter" class="ldapFilterInputElement"></textarea>
			<div class="hint">
				<?php p($l->t('The filter specifies which LDAP users shall have access to the %s instance.', $theme->getName()));?>
			</div>
		</div>

		<div class="tablerow">
			<div class="ldapWizardInfo invisible">&nbsp;</div>
		</div>

		<div class="ldap_count tablerow">
			<button class="ldapGetEntryCount ldapGetUserCount" name="ldapGetEntryCount" type="button">
				<?php p($l->t('Verify settings and count users'));?>
			</button>
			<span id="ldap_user_count"></span>
		</div>
		<?php print_unescaped($_['wizardControls']); ?>
	</section>
</fieldset>

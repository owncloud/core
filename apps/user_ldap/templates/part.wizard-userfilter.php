<fieldset id="ldapWizard2">
	<div>
		<p>
			<?php p($l->t('Limit %s access to users meeting these criteria:', $theme->getName()));?>
		</p>
		<p>
			<label for="ldap_userfilter_objectclass">
				<?php p($l->t('Only these object classes:'));?>
			</label>

			<select id="ldap_userfilter_objectclass" multiple="multiple"
			 name="ldap_userfilter_objectclass" class="multiSelectPlugin">
			</select>
		</p>
		<p>
			<label></label>
			<span class="ldapInputColElement"><?php p($l->t('The most common object classes for users are organizationalPerson, person, user, and inetOrgPerson. If you are not sure which object class to select, please consult your directory admin.'));?></span>
		</p>
		<p>
			<label for="ldap_userfilter_groups">
				<?php p($l->t('Only from these groups:'));?>
			</label>

			<input type="text" class="ldapManyGroupsSupport ldapManyGroupsSearch hidden" placeholder="<?php p($l->t('Search groups'));?>" />

			<select id="ldap_userfilter_groups" multiple="multiple"
			 name="ldap_userfilter_groups" class="multiSelectPlugin">
			</select>
		</p>
		<p class="ldapManyGroupsSupport hidden">
			<label></label>
			<select class="ldapGroupList ldapGroupListAvailable" multiple="multiple"
					title="<?php p($l->t('Available groups'));?>"></select>
			<span class="buttonSpan">
				<button class="ldapGroupListSelect" type="button">&gt;</button><br/>
				<button class="ldapGroupListDeselect" type="button">&lt;</button>
			</span>
			<select class="ldapGroupList ldapGroupListSelected" multiple="multiple"
					title="<?php p($l->t('Selected groups'));?>"></select>
		</p>
		<p>
			<label><a id='toggleRawUserFilter' class='ldapToggle'>↓ <?php p($l->t('Edit LDAP Query'));?></a></label>
		</p>
		<p id="ldapReadOnlyUserFilterContainer" class="hidden ldapReadOnlyFilterContainer">
			<label><?php p($l->t('LDAP Filter:'));?></label>
			<span class="ldapFilterReadOnlyElement ldapInputColElement"></span>
		</p>
		<p id="rawUserFilterContainer">
			<textarea type="text" id="ldap_userlist_filter" name="ldap_userlist_filter"
				class="ldapFilterInputElement"
				placeholder="<?php p($l->t('Edit LDAP Query'));?>"
				title="<?php p($l->t('The filter specifies which LDAP users shall have access to the %s instance.', $theme->getName()));?>">
			</textarea>
		</p>
		<p>
			<div class="ldapWizardInfo invisible">&nbsp;</div>
		</p>
		<p>
			Dynamic membership settings:
		</p>
		<p>
			<label>
                        	Enable: 
                        </label>

                        <input type="checkbox" id="ldap_userfilter_dm_enable"
                                   title="Allows dynamic membership of groups to be enabled"
                                   name="ldap_userfilter_dm_enable" value="1" />	
		</p>
		<p>
			<label>
                        	Member URL Attribute: 
                        </label>
			<input type="text" id="ldap_userfilter_dm_member_url" name="ldap_userfilter_dm_member_url"
                                placeholder="memberURL" autocomplete="off" style="width: 20%;"
                                title="The LDAP attribute that contains the membership URL used to determine what users are in each dynamic group"
                                />
		</p>
		<p>
			<div class="ldapWizardInfo invisible">&nbsp;</div>
		</p>
		<p class="ldap_count">
			<button class="ldapGetEntryCount ldapGetUserCount" name="ldapGetEntryCount" type="button">
				<?php p($l->t('Verify settings and count users'));?>
			</button>
			<span id="ldap_user_count"></span>
		</p>
		<?php print_unescaped($_['wizardControls']); ?>
	</div>
</fieldset>

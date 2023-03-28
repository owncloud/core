<?php

/** @var array $_ */
vendor_script('user_ldap', 'ui-multiselect/src/jquery.multiselect');
vendor_style('user_ldap', 'ui-multiselect/jquery.multiselect');
script('user_ldap', [
	'wizard/controller',
	'wizard/configModel',
	'wizard/view',
	'wizard/wizardObject',
	'wizard/wizardTabGeneric',
	'wizard/wizardTabElementary',
	'wizard/wizardTabAbstractFilter',
	'wizard/wizardTabUserFilter',
	'wizard/wizardTabLoginFilter',
	'wizard/wizardTabGroupFilter',
	'wizard/wizardTabAdvanced',
	'wizard/wizardTabExpert',
	'wizard/wizardDetectorQueue',
	'wizard/wizardDetectorGeneric',
	'wizard/wizardDetectorBaseDN',
	'wizard/wizardDetectorFeatureAbstract',
	'wizard/wizardDetectorUserObjectClasses',
	'wizard/wizardDetectorGroupObjectClasses',
	'wizard/wizardDetectorGroupsForUsers',
	'wizard/wizardDetectorGroupsForGroups',
	'wizard/wizardDetectorSimpleRequestAbstract',
	'wizard/wizardDetectorFilterUser',
	'wizard/wizardDetectorFilterLogin',
	'wizard/wizardDetectorFilterGroup',
	'wizard/wizardDetectorUserCount',
	'wizard/wizardDetectorGroupCount',
	'wizard/wizardDetectorEmailAttribute',
	'wizard/wizardDetectorUserDisplayNameAttribute',
	'wizard/wizardDetectorUserGroupAssociation',
	'wizard/wizardDetectorAvailableAttributes',
	'wizard/wizardDetectorTestAbstract',
	'wizard/wizardDetectorTestLoginName',
	'wizard/wizardDetectorTestBaseDN',
	'wizard/wizardDetectorTestConfiguration',
	'wizard/wizardDetectorClearUserMappings',
	'wizard/wizardDetectorClearGroupMappings',
	'wizard/wizardFilterOnType',
	'wizard/wizardFilterOnTypeFactory',
	'wizard/wizard',
]);

style('user_ldap', 'settings');

?>

<form id="ldap" class="section" action="#" method="post">
	<div id="ldapSettings">
		<div class="header">
			<h2 class="app-name"><?php p($l->t('LDAP')); ?><div class="ldap_config_state_indicator_container"><span class="ldap_config_state_indicator"></span> <span class="ldap_config_state_indicator_sign"></span><div class="ldap_config_state_indicator_subline"></div></div></h2>
			<ul>
				<?php foreach ($_['toc'] as $id => $title) {
	?>
					<li id="<?php p($id); ?>"><a href="<?php p($id); ?>"><?php p($title); ?></a></li>
					<?php
}
				?>
				<li class="warn"><a href="#ldapSettings-1"><?php p($l->t('Advanced')); ?></a></li>
				<li class="warn"><a href="#ldapSettings-2"><?php p($l->t('Expert')); ?></a></li>
				<li class="stateIndicator"><span class="ldap_config_state_indicator"></span> <span class="ldap_config_state_indicator_sign"></span><div class="ldap_config_state_indicator_subline"></div></li>
				<li>
					<a href="<?php p(link_to_docs('admin-ldap')); ?>" target="_blank" rel="noreferrer">
						<img src="<?php print_unescaped(image_path('', 'actions/info.svg')); ?>" style="height:1.75ex" />
						<span class="ldap_grey"><?php p($l->t('Help')); ?></span>
					</a>
				</li>
				<li class="ldap_saving_wrapper">
					<div class="ldap_saving hidden">
						<span class="working"><?php p($l->t('Saving'));?> ...</span><span class="done"><?php p($l->t('Saved'));?></span>
					</div>
				</li>
			</ul>
		</div>
		<?php if (OCP\App::isEnabled('user_webdavauth')) {
					print_unescaped('<p class="ldapwarning">'.$l->t('<b>Warning:</b> Apps user_ldap and user_webdavauth are incompatible. You may experience unexpected behavior. Please ask your system administrator to disable one of them.').'</p>');
				}

		if (!\function_exists('ldap_connect')) {
			print_unescaped('<p class="ldapwarning">'.$l->t('<b>Warning:</b> The PHP LDAP module is not installed, the backend will not work. Please ask your system administrator to install it.').'</p>');
		}
		?>
		<?php print_unescaped($_['tabs']); ?>
		<fieldset id="ldapSettings-1">
			<div id="ldapAdvancedAccordion">
				<section>
					<h3><?php p($l->t('Connection Settings')); ?></h3>
					<div>
						<div class="tablerow">
							<input type="checkbox" id="ldap_configuration_active" name="ldap_configuration_active" value="1" data-default="<?php p($_['ldap_configuration_active_default']); ?>"  title="<?php p($l->t('When unchecked, this configuration will be skipped.')); ?>" />
							<label for="ldap_configuration_active"><?php p($l->t('Configuration Active')); ?></label>
						</div>

						<div class="tablerow">
							<label for="ldap_backup_host"><?php p($l->t('Backup (Replica) Host')); ?></label>
							<input type="text" id="ldap_backup_host" name="ldap_backup_host" data-default="<?php p($_['ldap_backup_host_default']); ?>">
							<div class="hint">
								<?php p($l->t('Give an optional backup host. It must be a replica of the main LDAP/AD server.')); ?>
							</div>
						</div>
						<div class="tablerow">
							<label for="ldap_backup_port"><?php p($l->t('Backup (Replica) Port')); ?></label><input type="number" id="ldap_backup_port" name="ldap_backup_port" data-default="<?php p($_['ldap_backup_port_default']); ?>"  />
						</div>
						<div class="tablerow">
							<label for="ldap_override_main_server"><?php p($l->t('Disable Main Server')); ?></label><input type="checkbox" id="ldap_override_main_server" name="ldap_override_main_server" value="1" data-default="<?php p($_['ldap_override_main_server_default']); ?>"/>
							<div class="hint">
								<?php p($l->t('Only connect to the replica server.')); ?>
							</div>
						</div>
						<div class="tablerow">
							<label for="ldap_turn_off_cert_check"><?php p($l->t('Turn off SSL certificate validation.')); ?></label><input type="checkbox" id="ldap_turn_off_cert_check" name="ldap_turn_off_cert_check" data-default="<?php p($_['ldap_turn_off_cert_check_default']); ?>" value="1">
							<div class="hint">
								<?php p($l->t('Not recommended, use it for testing only! If connection only works with this option, import the LDAP server\'s SSL certificate in your %s server.', $theme->getName())); ?>
							</div>
						</div>
						<div class="tablerow">
							<label for="ldap_cache_ttl"><?php p($l->t('Cache Time-To-Live')); ?></label><input type="number" id="ldap_cache_ttl" name="ldap_cache_ttl" data-default="<?php p($_['ldap_cache_ttl_default']); ?>" />
							<div class="hint">
								<?php p($l->t('in seconds. A change empties the cache.')); ?>
							</div>
						</div>
						<div class="tablerow">
							<label for="ldap_network_timeout"><?php p($l->t('Network Timeout')); ?></label><input type="number" id="ldap_network_timeout" name="ldap_network_timeout" data-default="<?php p($_['ldap_network_timeout_default']); ?>" />
							<div class="hint">
								<?php p($l->t('timeout for all the ldap network operations, in seconds.')); ?>
							</div>
						</div>
					</div>
				</section>

				<section>
					<h3><?php p($l->t('Directory Settings')); ?></h3>
					<div>
						<div class="tablerow">
							<label for="ldap_display_name"><?php p($l->t('User Display Name Field')); ?></label>
							<input type="text" id="ldap_display_name" name="ldap_display_name" data-default="<?php p($_['ldap_display_name_default']); ?>" />
							<div class="hint">
								<?php p($l->t('The LDAP attribute to use to generate the user\'s display name.')); ?>
							</div>
						</div>
						<div class="tablerow">
							<label for="ldap_user_display_name_2"><?php p($l->t('2nd User Display Name Field')); ?></label>
							<input type="text" id="ldap_user_display_name_2" name="ldap_user_display_name_2" data-default="<?php p($_['ldap_user_display_name_2_default']); ?>" />
							<div class="hint">
								<?php p($l->t('Optional. An LDAP attribute to be added to the display name in brackets. Results in e.g. »John Doe (john.doe@example.org)«.')); ?>
							</div>
						</div>
						<div class="tablerow">
							<label for="ldap_base_users"><?php p($l->t('Base User Tree')); ?></label>
							<textarea id="ldap_base_users" name="ldap_base_users" placeholder="<?php p($l->t('One User Base DN per line')); ?>" data-default="<?php p($_['ldap_base_users_default']); ?>"></textarea>
							<div class="hint">
								<?php p($l->t('Base User Tree')); ?>
							</div>
						</div>
						<div class="tablerow">
							<label for="ldap_attributes_for_user_search"><?php p($l->t('User Search Attributes')); ?></label>
							<textarea id="ldap_attributes_for_user_search" name="ldap_attributes_for_user_search" placeholder="<?php p($l->t('Optional; one attribute per line')); ?>" data-default="<?php p($_['ldap_attributes_for_user_search_default']); ?>"></textarea>
							<div class="hint">
								<?php p($l->t('User Search Attributes')); ?>
							</div>
						</div>
						<div class="tablerow">
							<label></label>
							<small><?php p($l->t('Each attribute value is truncated to 191 characters')); ?></small>
						</div>
						<div class="tablerow">
							<label for="ldap_group_display_name"><?php p($l->t('Group Display Name Field')); ?></label>
							<input type="text" id="ldap_group_display_name" name="ldap_group_display_name" data-default="<?php p($_['ldap_group_display_name_default']); ?>" />
							<div class="hint">
								<?php p($l->t('The LDAP attribute to use to generate the groups\'s display name.')); ?>
							</div>
						</div>
						<div class="tablerow">
							<label for="ldap_base_groups"><?php p($l->t('Base Group Tree')); ?></label>
							<textarea id="ldap_base_groups" name="ldap_base_groups" placeholder="<?php p($l->t('One Group Base DN per line')); ?>" data-default="<?php p($_['ldap_base_groups_default']); ?>"></textarea>
							<div class="hint">
								<?php p($l->t('Base Group Tree')); ?>
							</div>
						</div>
						<div class="tablerow">
							<label for="ldap_attributes_for_group_search"><?php p($l->t('Group Search Attributes')); ?></label>
							<textarea id="ldap_attributes_for_group_search" name="ldap_attributes_for_group_search" placeholder="<?php p($l->t('Optional; one attribute per line')); ?>" data-default="<?php p($_['ldap_attributes_for_group_search_default']); ?>"></textarea>
							<div class="hint">
								<?php p($l->t('Group Search Attributes')); ?>
							</div>
						</div>
						<div class="tablerow">
							<label for="ldap_group_member_assoc_attribute"><?php p($l->t('Group-Member association')); ?></label>
							<select id="ldap_group_member_assoc_attribute" name="ldap_group_member_assoc_attribute" data-default="<?php p($_['ldap_group_member_assoc_attribute_default']); ?>" >
								<option value="uniqueMember"<?php if (isset($_['ldap_group_member_assoc_attribute']) && ($_['ldap_group_member_assoc_attribute'] === 'uniqueMember')) {
			p(' selected');
		} ?>>uniqueMember</option>
								<option value="memberUid"<?php if (isset($_['ldap_group_member_assoc_attribute']) && ($_['ldap_group_member_assoc_attribute'] === 'memberUid')) {
			p(' selected');
		} ?>>memberUid</option>
								<option value="member"<?php if (isset($_['ldap_group_member_assoc_attribute']) && ($_['ldap_group_member_assoc_attribute'] === 'member')) {
			p(' selected');
		} ?>>member (AD)</option>
							</select>
						</div>
						<div class="tablerow">
							<label for="ldap_group_member_algo"><?php p($l->t('Group-Member algorithm')); ?></label>
							<select id="ldap_group_member_algo" name="ldap_group_member_algo" data-default="<?php p($_['ldap_group_member_algo_default']); ?>" >
								<option value="groupScan"<?php if (isset($_['ldap_group_member_algo']) && ($_['ldap_group_member_algo'] === 'groupScan')) {
			p(' selected');
		} ?>>groupScan</option>
								<option value="memberOf"<?php if (isset($_['ldap_group_member_algo']) && ($_['ldap_group_member_algo'] === 'memberOf')) {
			p(' selected');
		} ?>>memberOf</option>
								<option value="recursiveMemberOf"<?php if (isset($_['ldap_group_member_algo']) && ($_['ldap_group_member_algo'] === 'recursiveMemberOf')) {
			p(' selected');
		} ?>>recursiveMemberOf (AD)</option>
							</select>
							<div class="hint">
								<?php p($l->t('Algorithm to be used when searching for members in a group. In case of doubt, "%s" is the safe choice. Note that you\'re responsible of fulfilling the restrictions in order to use any algorithm; the app will behave erratically if the restrictions aren\'t fulfilled', ['groupScan'])); ?>
								<ul>
									<li>groupScan: <?php p($l->t('Scan the group looking for users. This is the basic method and works without restrictions. It supports nested groups')) ;?></li>
									<li>memberOf: <?php p($l->t('Search the members using the "memberOf" attribute. It requires support for the "memberOf" attribute, and it doesn\'t work with nested groups')) ;?></li>
									<li>recursiveMemberOf (AD): <?php p($l->t('Search the members using the "memberOf" attribute in a recursive way. It requires support for the "memberOf" attribute and support for the "LDAP_MATCHING_RULE_IN_CHAIN" operator, it works with nested groups. Its main target is AD servers. NOTE: This algorithm only works with members explicitly listed in the group; AD\'s primary group, for example, won\'t be taken into account.')) ;?></li>
								</ul>
							</div>
						</div>
						<div class="tablerow">
							<label for="ldap_dynamic_group_member_url"><?php p($l->t('Dynamic Group Member URL')); ?></label><input type="text" id="ldap_dynamic_group_member_url" name="ldap_dynamic_group_member_url" data-default="<?php p($_['ldap_dynamic_group_member_url_default']); ?>" />
							<div class="hint">
								<?php p($l->t('The LDAP attribute that on group objects contains an LDAP search URL that determines what objects belong to the group. (An empty setting disables dynamic group membership functionality.)')); ?>
							</div>
						</div>
						<div class="tablerow">
							<label for="ldap_nested_groups"><?php p($l->t('Nested Groups')); ?></label><input type="checkbox" id="ldap_nested_groups" name="ldap_nested_groups" value="1" data-default="<?php p($_['ldap_nested_groups_default']); ?>" />
							<div class="hint">
								<?php p($l->t('When switched on, groups that contain groups are supported. (Only works if the group member attribute contains DNs.)')); ?>
							</div>
						</div>
						<div class="tablerow">
							<label for="ldap_paging_size"><?php p($l->t('Paging chunksize')); ?></label><input type="number" id="ldap_paging_size" name="ldap_paging_size" data-default="<?php p($_['ldap_paging_size_default']); ?>" />
							<div class="hint">
								<?php p($l->t('Chunksize used for paged LDAP searches that may return bulky results like user or group enumeration. (Setting it 0 disables paged LDAP searches in those situations.)')); ?>
							</div>
						</div>
					</div>
				</section>

				<section>
					<h3><?php p($l->t('Special Attributes')); ?></h3>
					<div>
						<div class="tablerow">
							<label for="ldap_quota_attr"><?php p($l->t('Quota Field')); ?></label>
							<input type="text" id="ldap_quota_attr" name="ldap_quota_attr" data-default="<?php p($_['ldap_quota_attr_default']); ?>" />
							<div class="hint">
								<?php p($l->t('Leave empty for user\'s default quota. Otherwise, specify an LDAP/AD attribute.')); ?>
							</div>
						</div>
						<div class="tablerow">
							<label for="ldap_quota_def"><?php p($l->t('Quota Default')); ?></label>
							<input type="text" id="ldap_quota_def" name="ldap_quota_def" data-default="<?php p($_['ldap_quota_def_default']); ?>" />
							<div class="hint">
								<?php p($l->t('Override default quota for LDAP users who do not have a quota set in the Quota Field.')); ?>
							</div>
						</div>
						<div class="tablerow">
							<label for="ldap_email_attr"><?php p($l->t('Email Field')); ?></label>
							<input type="text" id="ldap_email_attr" name="ldap_email_attr" data-default="<?php p($_['ldap_email_attr_default']); ?>" />
							<div class="hint">
								<?php p($l->t('Set the user\'s email from their LDAP attribute. Leave it empty for default behaviour.')); ?>
							</div>
						</div>
						<div class="tablerow">
							<label for="home_folder_naming_rule"><?php p($l->t('User Home Folder Naming Rule')); ?></label>
							<input type="text" id="home_folder_naming_rule" name="home_folder_naming_rule" data-default="<?php p($_['home_folder_naming_rule_default']); ?>" />
							<div class="hint">
								<?php p($l->t('Leave empty for user name (default). Otherwise, specify an LDAP/AD attribute.')); ?>
							</div>
						</div>
					</div>
				</section>
			</div>
			<?php print_unescaped($_['settingControls']); ?>
		</fieldset>
		<fieldset id="ldapSettings-2">
			<section>
				<h3><?php p($l->t('Internal Username')); ?></h3>
				<p><?php p($l->t('By default the internal username will be created from the UUID attribute. It makes sure that the username is unique and characters do not need to be converted. The internal username has the restriction that only these characters are allowed: [ a-zA-Z0-9+_.@- ].  Other characters are replaced with their ASCII correspondence or simply omitted. On collisions a number will be added/increased. The internal username is used to identify a user internally. It is also the default name for the user home folder. It is also a part of remote URLs, for instance for all *DAV services. With this setting, the default behavior can be overridden. To do so, enter the user display name attribute in the following field. Leave it empty for default behavior. Changes will have effect only on newly mapped (added) LDAP users.')); ?></p>
				<div class="tablerow">
					<label for="ldap_expert_username_attr"><?php p($l->t('Internal Username Attribute:')); ?></label>
					<input type="text" id="ldap_expert_username_attr" name="ldap_expert_username_attr" data-default="<?php p($_['ldap_expert_username_attr_default']); ?>" />
				</div>
			</section>
			<section>
				<h3><?php p($l->t('Internal Groupname')); ?></h3>
				<p><?php p($l->t('The internal groupname is used to uniquely identify the group. It has the same restrictions as the internal username, in particular, the group name must be immutable and unique. By default, the UUID will be used. This internal groupname won\'t likely by visible because a displayname attribute is intended to be used to show the group.')); ?></p>
				<div class="tablerow">
					<label for="ldap_expert_groupname_attr"><?php p($l->t('Internal Groupname Attribute:')); ?></label>
					<input type="text" id="ldap_expert_groupname_attr" name="ldap_expert_groupname_attr" data-default="<?php p($_['ldap_expert_groupname_attr_default']); ?>" />
				</div>
			</section>
			<section>
				<h3><?php p($l->t('Override UUID detection')); ?></h3>
				<p><?php p($l->t('By default, the UUID attribute is automatically detected. The UUID attribute is used to doubtlessly identify LDAP users and groups. Also, the internal username will be created based on the UUID, if not specified otherwise above. You can override the setting and pass an attribute of your choice. You must make sure that the attribute of your choice can be fetched for both users and groups and it is unique. Leave it empty for default behavior. Changes will have effect only on newly mapped (added) LDAP users and groups.')); ?></p>
				<div class="tablerow">
					<label for="ldap_expert_uuid_user_attr"><?php p($l->t('UUID Attribute for Users:')); ?></label>
					<input type="text" id="ldap_expert_uuid_user_attr" name="ldap_expert_uuid_user_attr" data-default="<?php p($_['ldap_expert_uuid_user_attr_default']); ?>" />
				</div>
				<div class="tablerow">
					<label for="ldap_expert_uuid_group_attr"><?php p($l->t('UUID Attribute for Groups:')); ?></label>
					<input type="text" id="ldap_expert_uuid_group_attr" name="ldap_expert_uuid_group_attr" data-default="<?php p($_['ldap_expert_uuid_group_attr_default']); ?>" />
				</div>
			</section>
			
			<section>
				<h3><?php p($l->t('Username-LDAP User Mapping')); ?></h3>
				<p><?php p($l->t('Usernames are used to store and assign (meta) data. In order to precisely identify and recognize users, each LDAP user will have an internal username. This requires a mapping from username to LDAP user. The created username is mapped to the UUID of the LDAP user. Additionally the DN is cached as well to reduce LDAP interaction, but it is not used for identification. If the DN changes, the changes will be found. The internal username is used all over. Clearing the mappings will have leftovers everywhere. Clearing the mappings is not configuration sensitive, it affects all LDAP configurations! Never clear the mappings in a production environment, only in a testing or experimental stage.')); ?></p>
				<div class="tablerow">
					<button type="button" id="ldap_action_clear_user_mappings" name="ldap_action_clear_user_mappings"><?php p($l->t('Clear Username-LDAP User Mapping')); ?></button>
					<button type="button" id="ldap_action_clear_group_mappings" name="ldap_action_clear_group_mappings"><?php p($l->t('Clear Groupname-LDAP Group Mapping')); ?></button>
				</div>
				<?php print_unescaped($_['settingControls']); ?>
			</section>
		</fieldset>
	</div>
	<!-- Spinner Template -->
	<img class="ldapSpinner hidden" src="<?php p(image_path('core', 'loading.gif')); ?>">
</form>

<?php
/** @var \OCP\IL10N $l */
/** @var array $_ */
?>
<div id="shareAPI" class="section">
	<h2 class="app-name has-documentation"><?php p($l->t('Sharing'));?></h2>
	<a target="_blank" rel="noreferrer" class="icon-info"
		title="<?php p($l->t('Open documentation'));?>"
		href="<?php p(link_to_docs('admin-sharing')); ?>"></a>
	<p id="enable">
		<input type="checkbox" name="shareapi_enabled" id="shareAPIEnabled" class="checkbox"
			   value="1" <?php if ($_['shareAPIEnabled'] === 'yes') {
	print_unescaped('checked="checked"');
} ?> />
		<label for="shareAPIEnabled"><?php p($l->t('Allow apps to use the Share API'));?></label><br/>
	</p>
	<p class="<?php if ($_['shareAPIEnabled'] === 'no') {
	p('hidden');
}?>">
		<input type="checkbox" name="shareapi_allow_links" id="allowLinks" class="checkbox"
			   value="1" <?php if ($_['allowLinks'] === 'yes') {
	print_unescaped('checked="checked"');
} ?> />
		<label for="allowLinks"><?php p($l->t('Allow users to share via link'));?></label><br/>
	</p>

	<p id="publicLinkSettings" class="indent <?php if ($_['allowLinks'] !== 'yes' || $_['shareAPIEnabled'] === 'no') {
	p('hidden');
} ?>">
		<input type="checkbox" name="shareapi_allow_public_upload" id="allowPublicUpload" class="checkbox"
			   value="1" <?php if ($_['allowPublicUpload'] == 'yes') {
	print_unescaped('checked="checked"');
} ?> />
		<label for="allowPublicUpload"><?php p($l->t('Allow public uploads'));?></label><br/>

		<input type="checkbox" name="shareapi_enforce_links_password_read_only" id="enforceLinkPasswordReadOnly" class="checkbox"
			value="1" <?php if ($_['enforceLinkPasswordReadOnly'] === 'yes') {
	print_unescaped('checked="checked"');
} ?> />
		<label for="enforceLinkPasswordReadOnly"><?php p($l->t('Enforce password protection for read-only links'));?></label><br/>

		<input type="checkbox" name="shareapi_enforce_links_password_read_write" id="enforceLinkPasswordReadWrite" class="checkbox"
			value="1" <?php if ($_['enforceLinkPasswordReadWrite'] === 'yes') {
	print_unescaped('checked="checked"');
} ?> />
		<label for="enforceLinkPasswordReadWrite"><?php p($l->t('Enforce password protection for read & write links'));?></label><br/>

		<input type="checkbox" name="shareapi_enforce_links_password_write_only" id="enforceLinkPasswordWriteOnly" class="checkbox"
			value="1" <?php if ($_['enforceLinkPasswordWriteOnly'] === 'yes') {
	print_unescaped('checked="checked"');
} ?> />
		<label for="enforceLinkPasswordWriteOnly"><?php p($l->t('Enforce password protection for upload-only (File Drop) links'));?></label><br/>

		<input type="checkbox" name="shareapi_default_expire_date" id="shareapiDefaultExpireDate" class="checkbox"
			   value="1" <?php if ($_['shareDefaultExpireDateSet'] === 'yes') {
	print_unescaped('checked="checked"');
} ?> />
		<label for="shareapiDefaultExpireDate"><?php p($l->t('Set default expiration date'));?></label><br/>

		<input type="checkbox" name="shareapi_allow_public_notification" id="allowPublicMailNotification" class="checkbox"
			   value="1" <?php if ($_['allowPublicMailNotification'] == 'yes') {
	print_unescaped('checked="checked"');
} ?> />
		<label for="allowPublicMailNotification"><?php p($l->t('Allow users to send mail notification for shared files'));?></label><br/>
	<span id="publicMailNotificationLang" <?php if ($_['allowPublicMailNotification'] == 'no') {
	print_unescaped('class="hidden"');
} ?>>
		<label><?php p($l->t('Language used for public mail notifications for shared files'));?></label>
		<?php print_unescaped($_['publicMailNotificationLang']); ?>
		<br>
	</span>


		<input type="checkbox" name="shareapi_allow_social_share" id="allowSocialShare" class="checkbox"
			   value="1" <?php if ($_['allowSocialShare'] == 'yes') {
	print_unescaped('checked="checked"');
} ?> />
		<label for="allowSocialShare"><?php p($l->t('Allow users to share file via social media'));?></label><br/>

	</p>
	<p id="setDefaultExpireDate" class="double-indent <?php if ($_['allowLinks'] !== 'yes' || $_['shareDefaultExpireDateSet'] === 'no' || $_['shareAPIEnabled'] === 'no') {
	p('hidden');
}?>">
		<?php p($l->t('Expire after ')); ?>
		<input type="text" name='shareapi_expire_after_n_days' id="shareapiExpireAfterNDays" placeholder="<?php p('7')?>"
			   value='<?php p($_['shareExpireAfterNDays']) ?>' />
		<?php p($l->t('days')); ?>
		<input type="checkbox" name="shareapi_enforce_expire_date" id="shareapiEnforceExpireDate" class="checkbox"
			   value="1" <?php if ($_['shareEnforceExpireDate'] === 'yes') {
	print_unescaped('checked="checked"');
} ?> />
		<label for="shareapiEnforceExpireDate"><?php p($l->t('Enforce expiration date'));?></label><br/>
	</p>
	<p class="<?php if ($_['shareAPIEnabled'] === 'no') {
	p('hidden');
}?>">
		<input type="checkbox" name="shareapi_auto_accept_share" id="autoAcceptShare" class="checkbox"
			value="1" <?php if ($_['autoAcceptShare'] === 'yes') {
	print_unescaped('checked="checked"');
}?> />
		<label for="autoAcceptShare"><?php p($l->t('Automatically accept new incoming local user shares'));?></label><br/>
	</p>
	<p class="<?php if ($_['shareAPIEnabled'] === 'no') {
	p('hidden');
}?>">
		<input type="checkbox" name="shareapi_allow_resharing" id="allowResharing" class="checkbox"
			   value="1" <?php if ($_['allowResharing'] === 'yes') {
	print_unescaped('checked="checked"');
} ?> />
		<label for="allowResharing"><?php p($l->t('Allow resharing'));?></label><br/>
	</p>
	<p class="<?php if ($_['shareAPIEnabled'] === 'no') {
	p('hidden');
}?>">
		<input type="checkbox" name="shareapi_allow_group_sharing" id="allowGroupSharing" class="checkbox"
			   value="1" <?php if ($_['allowGroupSharing'] === 'yes') {
	print_unescaped('checked="checked"');
} ?> />
		<label for="allowGroupSharing"><?php p($l->t('Allow sharing with groups'));?></label><br />
	</p>
	<p class="<?php if ($_['shareAPIEnabled'] === 'no') {
	p('hidden');
}?>">
		<input type="checkbox" name="shareapi_only_share_with_group_members" id="onlyShareWithGroupMembers" class="checkbox"
			   value="1" <?php if ($_['onlyShareWithGroupMembers']) {
	print_unescaped('checked="checked"');
} ?> />
		<label for="onlyShareWithGroupMembers"><?php p($l->t('Restrict users to only share with users in their groups'));?></label><br/>
	</p>
	<p class="<?php if ($_['shareAPIEnabled'] === 'no') {
	p('hidden');
}?>">
		<input type="checkbox" name="shareapi_only_share_with_membership_groups" id="onlyShareWithMembershipGroups" class="checkbox"
			   value="1" <?php if ($_['onlyShareWithMembershipGroups']) {
	print_unescaped('checked="checked"');
} ?> />
		<label for="onlyShareWithMembershipGroups"><?php p($l->t('Restrict users to only share with groups they are member of'));?></label><br/>
	</p>
	<p class="<?php if ($_['shareAPIEnabled'] === 'no') {
	p('hidden');
}?>">
		<input type="checkbox" name="shareapi_allow_mail_notification" id="allowMailNotification" class="checkbox"
			   value="1" <?php if ($_['allowMailNotification'] === 'yes') {
	print_unescaped('checked="checked"');
} ?> />
		<label for="allowMailNotification"><?php p($l->t('Allow users to send mail notification for shared files to other users'));?></label><br/>
	</p>
	<p class="<?php if ($_['shareAPIEnabled'] === 'no') {
	p('hidden');
}?>">
		<input type="checkbox" name="shareapi_exclude_groups" id="shareapiExcludeGroups" class="checkbox"
			   value="1" <?php if ($_['shareExcludeGroups']) {
	print_unescaped('checked="checked"');
} ?> />
		<label for="shareapiExcludeGroups"><?php p($l->t('Exclude groups from sharing'));?></label><br/>
	</p>
	<p id="selectExcludedGroups" class="indent <?php if (!$_['shareExcludeGroups'] || $_['shareAPIEnabled'] === 'no') {
	p('hidden');
} ?>">
		<input name="shareapi_exclude_groups_list" class="noautosave" type="hidden" id="excludedGroups" value="<?php p($_['shareExcludedGroupsList']) ?>" style="width: 400px"/>
		<br />
		<em><?php p($l->t('These groups will still be able to receive shares, but not to initiate them.')); ?></em>
	</p>
	<p class="<?php if ($_['shareAPIEnabled'] === 'no') {
	p('hidden');
}?>">
		<input type="checkbox" name="shareapi_allow_share_dialog_user_enumeration" value="1" id="shareapi_allow_share_dialog_user_enumeration" class="checkbox"
			<?php if ($_['allowShareDialogUserEnumeration'] === 'yes') {
	print_unescaped('checked="checked"');
} ?> />
		<label for="shareapi_allow_share_dialog_user_enumeration"><?php p($l->t('Allow username autocompletion in share dialog. If this is disabled the full username needs to be entered.'));?></label><br />
	</p>
	<p class="indent <?php if ($_['shareAPIEnabled'] === 'no') {
	p('hidden');
}?>">
		<input type="checkbox" name="shareapi_share_dialog_user_enumeration_group_members" value="1" id="shareapi_share_dialog_user_enumeration_group_members" class="checkbox"
			<?php if ($_['shareDialogUserEnumerationGroupMembers'] === 'yes') {
	print_unescaped('checked="checked"');
} ?> />
		<label for="shareapi_share_dialog_user_enumeration_group_members"><?php p($l->t('Restrict enumeration to group members'));?></label><br />
	</p>
	<p class="nocheckbox <?php if ($_['shareAPIEnabled'] === 'no') {
	p('hidden');
}?>">
		<input type="hidden" name="shareapi_default_permissions" id="shareApiDefaultPermissions" class="checkbox"
		value="<?php p($_['shareApiDefaultPermissions']) ?>" />
		<?php p($l->t('Default user and group share permissions'));?>
	</p>
	<p id="shareApiDefaultPermissionsSection" class="indent <?php if ($_['shareAPIEnabled'] === 'no') {
	p('hidden');
} ?>">
		<?php foreach ($_['shareApiDefaultPermissionsCheckboxes'] as $perm): ?>
		<input type="checkbox" name="shareapi_default_permission_<?php p($perm['id']) ?>" id="shareapi_default_permission_<?php p($perm['id']) ?>"
			class="noautosave checkbox" value="<?php p($perm['value']) ?>" <?php if (($_['shareApiDefaultPermissions'] & $perm['value']) !== 0) {
	print_unescaped('checked="checked"');
} ?> />
		<label for="shareapi_default_permission_<?php p($perm['id']) ?>"><?php p($perm['label']);?></label>
		<?php endforeach ?>
	</p>
	<p class="<?php if ($_['shareAPIEnabled'] === 'no') {
	p('hidden');
}?>">
		<label for="coreUserAdditionalInfo"><?php p($l->t('Extra field to display in autocomplete results'));?></label><br/>
		<select name="user_additional_info_field" id="coreUserAdditionalInfo" data-value="<?php p($_['coreUserAdditionalInfo']) ?>">
			<option value=''><?php p($l->t('None')) ?></option>
			<option value='id'><?php p($l->t('User ID')) ?></option>
			<option value='email'><?php p($l->t('Email address')) ?></option>
		</select>
	</p>
</div>

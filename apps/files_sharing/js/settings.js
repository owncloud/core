/*
 * Copyright (c) 2018
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

$(document).ready(function() {
	var $blacklistedGroups = $('#files_sharing input[name="blacklisted_receiver_groups"]');
	OC.Settings.setupGroupsSelect($blacklistedGroups);
	$blacklistedGroups.change(function(ev) {
		var groups = ev.val || [];
		groups = JSON.stringify(groups);
		OC.AppConfig.setValue('files_sharing', $(this).attr('name'), groups);
	});

	var $publicShareSharersGroupsAllowlist = $('input[name="public_share_sharers_groups_allowlist"]');
	var $publicShareSharersGroupsAllowlistEnabled = $('#publicShareSharersGroupsAllowlistEnabled');
	OC.Settings.setupGroupsSelect($publicShareSharersGroupsAllowlist);

	$publicShareSharersGroupsAllowlist.change(function(ev) {
		var groups = ev.val || [];
		groups = JSON.stringify(groups);
		OC.AppConfig.setValue('files_sharing', 'public_share_sharers_groups_allowlist', groups);

	});
	$publicShareSharersGroupsAllowlistEnabled.change(function() {
		$("#setAllowlistPublicShareSharersGroups").toggleClass('hidden', !this.checked);
		OC.AppConfig.setValue('files_sharing', 'public_share_sharers_groups_allowlist_enabled', this.checked ? 'yes' : 'no');

	});
	// Move setting to sharing section
	$publicShareSharersGroupsAllowlist.closest('p').detach().insertAfter($('#selectExcludedGroups').closest('p'));
});
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
});
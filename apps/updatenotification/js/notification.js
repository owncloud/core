/**
 * Copyright (c) 2018, ownCloud GmbH
 *
 * @author Morris Jobke <hey@morrisjobke.de>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

/* global oc_updateState */

/**
 * this gets only loaded if an update is available and then shows a temporary notification
 */
$(document).ready(function(){
	var version = oc_updateState.updateVersion,
		docLink = oc_updateState.updateLink,
		text = t('core', '{version} is available. Get more information on how to update.', {version: version}),
		element = $('<a>').attr('href', docLink).attr('target','_blank').text(text);

	OC.Notification.showHtml(element, {
			type: 'error'
	});
});

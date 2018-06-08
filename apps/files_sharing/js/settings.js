/*
 * Copyright (c) 2018
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

$(document).ready(function(){
	$('#files_sharing .files_sharing_settings').change(function(){
		var $element = $(this);
		OC.AppConfig.setValue('files_sharing', $element.prop('name'), $element.val());
	});
});
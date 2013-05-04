/**
 * Copyright (c) 2013, Lukas Reschke <lukas@statuscode.ch>
 * This file is licensed under the Affero General Public License version 3 or later.
 * See the COPYING-README file.
 */

 $(function() {
 	$('#pass2').keyup(function() {
 		var result = zxcvbn($(this).val());
 		$('#password-strength').text(t('core', 'Crack time:') + " " + readableTime(result.crack_time));

 		if(result.score < 3) {
 			$("#password-strength").attr('class', 'password-bad');
 		} else {
 			$("#password-strength").attr('class', 'password-good');
 		}
 	});

 	function readableTime(seconds)
 	{
 		var minute = 60;
 		var hour = minute * 60;
 		var day = hour * 24;
 		var month = day * 31;
 		var year = month * 12;
 		var century = year * 100;

 		if(seconds < minute) {
 			return t('core', 'instant');
 		}
 		if(seconds < hour) {
 			return Math.ceil(seconds / minute) + " " + t('core', 'minutes');
 		}
 		if(seconds < day) {
 			return Math.ceil(seconds / hour) + " " + t('core', 'hours');
 		}
 		if(seconds < month) {
 			return Math.ceil(seconds / day) + " " + t('core', 'days');
 		}
 		if(seconds < year) {
 			return Math.ceil(seconds / month) + " " + t('core', 'months');
 		}
 		if(seconds < century) {
 			return Math.ceil(seconds / year) + " " + t('core', 'years');
 		}
 		return t('core', 'centuries');
 	}
 });
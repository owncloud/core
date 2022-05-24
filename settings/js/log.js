/**
 * Copyright (c) 2012, Robin Appelman <icewind1991@gmail.com>
 * Copyright (c) 2013, Morris Jobke <morris.jobke@gmail.com>
 * This file is licensed under the Affero General Public License version 3 or later.
 * See the COPYING-README file.
 */

/* global formatDate */

OC.Log = {
	levels: ['Debug', 'Info', 'Warning', 'Error', 'Fatal'],
	addEntries: function (entries) {
		for (var i = 0; i < entries.length; i++) {
			var entry = entries[i];
			var row = $('<tr/>');
			var levelTd = $('<td/>');
			levelTd.text(OC.Log.levels[entry.level]);
			row.append(levelTd);

			var appTd = $('<td/>');
			appTd.text(entry.app);
			row.append(appTd);

			var messageTd = $('<td/>');
			messageTd.addClass('log-message');
			messageTd.text(entry.message);
			row.append(messageTd);

			var timeTd = $('<td/>');
			timeTd.addClass('date');
			if (isNaN(entry.time)) {
				timeTd.text(entry.time);
			} else {
				timeTd.text(formatDate(entry.time * 1000));
			}
			row.append(timeTd);
			$('#log').append(row);
		}
		OC.Log.loaded += entries.length;
	}
};

$(document).ready(function () {
	$('#moreLog').click(function () {
		OC.Log.getMore();
	});
	$('#lessLog').click(function () {
		OC.Log.showLess();
	});
});

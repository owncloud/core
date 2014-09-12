/*
 * Copyright (c) 2014
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

/* global scanFiles, escapeHTML, formatDate */
$(document).ready(function(){

	if ($('#isPublic').val()){
		// no versions actions in public mode
		// beware of https://github.com/owncloud/core/issues/4545
		// as enabling this might hang Chrome
		return;
	}

	if (OCA.Files) {
		// Add versions button to 'files/index.php'
		OCA.Files.fileActions.register(
			'file',
			'Versions',
			OC.PERMISSION_UPDATE,
			function() {
				// Specify icon for hitory button
				return OC.imagePath('core','actions/history');
			}, function(filename, context){
				var $dropdown = $('#dropdown.drop-versions');
				// Action to perform when clicked
				if (scanFiles.scanning){return;}//workaround to prevent additional http request block scanning feedback

				var file = context.dir.replace(/(?!<=\/)$|\/$/, '/' + filename);
				// if action triggered on the same file and the dropdown is already open
				if ($dropdown.length && file === $dropdown.attr('data-file')) {
					// let the click automatically close the dropdown
					return;
				}

				$dropdown = createVersionsDropdown(filename, file, context.fileList);
				$dropdown.one('show', function() {
					// FIXME: doesn't work when toggling between dropdowns
					$dropdown.closest('tr').addClass('mouseOver');
				});
				$dropdown.one('hide', function() {
					$dropdown.closest('tr').removeClass('mouseOver');
					$dropdown.remove();
				});
				OC.showMenu($dropdown);
			}, t('files_versions', 'Versions')
		);
	}

	$(document).on("click", 'span[class="revertVersion"]', function() {
		var revision = $(this).attr('id');
		var file = $(this).attr('value');
		revertFile(file, revision);
	});

});

function revertFile(file, revision) {

	$.ajax({
		type: 'GET',
		url: OC.linkTo('files_versions', 'ajax/rollbackVersion.php'),
		dataType: 'json',
		data: {file: file, revision: revision},
		async: false,
		success: function(response) {
			if (response.status === 'error') {
				OC.Notification.show( t('files_version', 'Failed to revert {file} to revision {timestamp}.', {file:file, timestamp:formatDate(revision * 1000)}) );
			} else {
				var $dropdown = $('#dropdown.drop-versions');
				if ($dropdown.length) {
					OC.hideMenu();
				}
			}
		}
	});

}

function goToVersionPage(url){
	window.location.assign(url);
}

function createVersionsDropdown(filename, files, fileList) {

	var start = 0;
	var fileEl;

	var $dropdown;
	var html = '<div id="dropdown" class="drop drop-versions" data-file="'+escapeHTML(files)+'">';
	html += '<div id="private">';
	html += '<ul id="found_versions">';
	html += '</ul>';
	html += '</div>';
	html += '<input type="button" value="'+ t('files_versions', 'More versions...') + '" name="show-more-versions" id="show-more-versions" style="display: none;" />';

	$dropdown = $(html);
	if (filename) {
		fileEl = fileList.findFileEl(filename);
		$dropdown.appendTo(fileEl.find('td.filename'));
	} else {
		$dropdown.appendTo($('thead .share'));
	}

	getVersions(start);
	start = start + 5;

	$("#show-more-versions").click(function() {
		//get more versions
		getVersions(start);
		start = start + 5;
	});

	function getVersions(start) {
		$.ajax({
			type: 'GET',
			url: OC.filePath('files_versions', 'ajax', 'getVersions.php'),
			dataType: 'json',
			data: {source: files, start: start},
			async: false,
			success: function(result) {
				var versions = result.data.versions;
				if (result.data.endReached === true) {
					$("#show-more-versions").css("display", "none");
				} else {
					$("#show-more-versions").css("display", "block");
				}
				if (versions) {
					$.each(versions, function(index, row) {
						addVersion(row);
					});
				} else {
					$('<div style="text-align:center;">'+ t('files_versions', 'No other versions available') + '</div>').appendTo('#dropdown.drop-versions');
				}
				$('#found_versions').change(function() {
					var revision = parseInt($(this).val());
					revertFile(files, revision);
				});
			}
		});
	}

	function addVersion( revision ) {
		var title = formatDate(revision.version*1000);
		var name ='<span class="versionDate" title="' + title + '">' + revision.humanReadableTimestamp + '</span>';

		var path = OC.filePath('files_versions', '', 'download.php');

		var preview = '<img class="preview" src="'+revision.preview+'"/>';

		var download ='<a href="' + path + "?file=" + encodeURIComponent(files) + '&revision=' + revision.version + '">';
		download+='<img';
		download+=' src="' + OC.imagePath('core', 'actions/download') + '"';
		download+=' name="downloadVersion" />';
		download+=name;
		download+='</a>';

		var revert='<span class="revertVersion"';
		revert+=' id="' + revision.version + '">';
		revert+='<img';
		revert+=' src="' + OC.imagePath('core', 'actions/history') + '"';
		revert+=' name="revertVersion"';
		revert+='/>'+t('files_versions', 'Restore')+'</span>';

		var version=$('<li/>');
		version.attr('value', revision.version);
		version.html(preview + download + revert);
		// add file here for proper name escaping
		version.find('span.revertVersion').attr('value', files);

		version.appendTo('#found_versions');
	}

	return $dropdown;
}


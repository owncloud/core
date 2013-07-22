$(document).ready(function(){

	if (typeof FileActions !== 'undefined') {
		// Add versions button to 'files/index.php'
		FileActions.register(
			'file'
			, t('files_versions', 'Versions')
			, OC.PERMISSION_UPDATE
			, function() {
				// Specify icon for hitory button
				return OC.imagePath('core','actions/history');
			}
			,function(filename){
				// Action to perform when clicked
				if (scanFiles.scanning){return;}//workaround to prevent additional http request block scanning feedback

				var file = $('#dir').val()+'/'+filename;
				// Check if drop down is already visible for a different file
				if (($('#dropdown').length > 0) && $('#dropdown').hasClass('drop-versions') ) {
					if (file != $('#dropdown').data('file')) {
						$('#dropdown').hide('blind', function() {
							$('#dropdown').remove();
							$('tr').removeClass('mouseOver');
							createVersionsDropdown(filename, file);
						});
					}
				} else {
					createVersionsDropdown(filename, file);
				}
			}
		);
	}

	$('img[name="revertVersion"]').live("click", function() {
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
			if (response.status == 'error') {
				OC.dialogs.alert('Failed to revert ' + file + ' to revision ' + formatDate(revision * 1000) + '.', 'Failed to revert');
			} else {
				$('#dropdown').hide('blind', function() {
					$('#dropdown').remove();
					$('tr').removeClass('mouseOver');
					// TODO also update the modified time in the web ui
				});
			}
		}
	});

}

function goToVersionPage(url){
	window.location.assign(url);
}

function createVersionsDropdown(filename, files) {

	var start = 0;

	var html = '<div id="dropdown" class="drop drop-versions" data-file="'+escapeHTML(files)+'">';
	html += '<div id="private">';
	html += '<ul id="found_versions">';
	html += '</ul>';
	html += '</div>';
	html += '<input type="button" value="More versions..." name="makelink" id="makelink" />';
	//html += '<input id="link" style="display:none; width:90%;" />';

	if (filename) {
		$('tr').filterAttr('data-file',filename).addClass('mouseOver');
		$(html).appendTo($('tr').filterAttr('data-file',filename).find('td.filename'));
	} else {
		$(html).appendTo($('thead .share'));
	}

	getVersions(start);
	start = start + 5;

	$("#makelink").click(function() {
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
					$('#makelink').hide();
				}
				if (versions) {
					$.each(versions, function(index, row) {
						addVersion(row);
					});
				} else {
					$('<div style="text-align:center;">No other versions available</div>').appendTo('#dropdown');
				}
				$('#found_versions').change(function() {
					var revision = parseInt($(this).val());
					revertFile(files, revision);
				});
			}
		});
	}

	function addVersion( revision ) {
		name=formatDate(revision.version*1000);

		download='<img';
		download+=' src="' + OC.imagePath('core', 'actions/download.svg') + '"';
		download+=' id="' + revision.version + '"';
		download+=' value="' + files + '"';
		download+=' title="' + t('files_versions', 'Download') + '"';
		download+=' name="downloadVersion"';
		download+='/>';

		revert='<img';
		revert+=' src="' + OC.imagePath('core', 'actions/history.svg') + '"';
		revert+=' id="' + revision.version + '"';
		revert+=' value="' + files + '"';
		revert+=' title="' + t('files_versions', 'Revert') + '"';
		revert+=' name="revertVersion"';
		revert+='/>';

		var version=$('<li/>');
		version.attr('value', revision.version);
		version.html(name + ' ' + download + ' ' + revert );

		version.appendTo('#found_versions');
	}

	$('tr').filterAttr('data-file',filename).addClass('mouseOver');
	$('#dropdown').show('blind');


}

$(this).click(
	function(event) {
	if ($('#dropdown').has(event.target).length === 0 && $('#dropdown').hasClass('drop-versions')) {
		$('#dropdown').hide('blind', function() {
			$('#dropdown').remove();
			$('tr').removeClass('mouseOver');
		});
	}


	}
);

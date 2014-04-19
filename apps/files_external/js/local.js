var localroot = '/home';

$(document).ready(function() {
	
	/*$('#externalStorage tbody tr.\\\\OC\\\\Files\\\\Storage\\\\Local').each(function() {
			var local_path = $(this).find('[data-parameter="datadir"]');
			if (local_path.substring(0, localroot.length) == localroot) {
				var config = $(this).find('td.configuration');
				$(config).append('<span id="localroot"></span>');
				$(config).append('<a class="button local-dir-up ui-state-disabled">&larr;</a>');
				$(config).append('<a class="button local-dir-down ui-state-disabled">&rarr;</a>');
				var dirs = local_path.substring(localroot.length).split(/\\|\//);
				var cur_dir = localroot;
				createDirSelector($(config).find('span').last(), cur_dir, false);
				$.each(dirs, function (dir) {
					if (dir.length > 0) {
						var last_select = $(config).find('span').last().find('selector');
					}
				});
			}
			
	});*/

	$('#externalStorage').on('change', '#selectBackend', function(event) {
		var tr = $('#externalStorage tbody tr').eq(-2);
		if ($(tr).find('.backend').data('class') === '\\OC\\Files\\Storage\\Local') {
			var config = $(tr).find('td.configuration');
			$(config).append('<span id="localroot"></span>');
			$(config).append('<a class="button local-dir-up ui-state-disabled">&larr;</a>');
			$(config).append('<a class="button local-dir-down ui-state-disabled">&rarr;</a>');
			createDirSelector($(config).find('span'),localroot);
		}
	});

	$('#externalStorage').on('click', '.local-dir-up:not(.ui-state-disabled)', function(event) {
		event.preventDefault();
		var config = $(this).parent();
		var lastSpan = $(config).find('span').last();
		if ( $(lastSpan).attr('id') !== 'localroot') {
			var parent = $(lastSpan).parent();
			$(lastSpan).remove();
		}
		$(config).find('span').last().find('select').trigger('change');
	});

	$('#externalStorage').on('click', '.local-dir-down:not(.ui-state-disabled)', function(event) {
		event.preventDefault();
		var config = $(this).parent();
                var downButton = $(config).find('.local-dir-down');
		var lastSpan = $(config).find('span').last();
		var lastSelect = $(lastSpan).find('select');
		$.post(OC.filePath('files_external', 'ajax', 'local.php'), { path: $(lastSelect).find('option:selected').val(), isnotempty: true }, function(result) {
			if (result && result.status === 'success') {
				if (result.data) {
					$(downButton).removeClass('ui-state-disabled');
					$(lastSpan).append('<span id="'+$(lastSelect).attr('id')+'"></span>');
					createDirSelector($(lastSpan).find('span'),$(lastSelect).find('option:selected').val());
				} else {
					$(downButton).addClass('ui-state-disabled');
				}
			} else {
				OC.dialogs.alert(result.data.message, t('files_external', 'Error getting the local directory listing in' + $(lastSelect).find('option:selected').val() ));
			}
		});
	});

	$('#externalStorage').on('change', '.local-file-chooser', function(event) {
		$(this).parent().find('span').remove();

		var path = $(this).find('option:selected').val();
		var upButton = $(this).parents('td.configuration').find('.local-dir-up');
		var downButton = $(this).parents('td.configuration').find('.local-dir-down');

		if ($(this).parent().attr('id') === 'localroot') {
			$(upButton).addClass('ui-state-disabled');
		} else {
			$(upButton).removeClass('ui-state-disabled');
		}

		$.post(OC.filePath('files_external', 'ajax', 'local.php'), { path: path, isnotempty: true }, function(result) {
			if (result && result.status === 'success') {
				if (result.data) {
					$(downButton).removeClass('ui-state-disabled');
				} else {
					$(downButton).addClass('ui-state-disabled');
				}
			} else {
				OC.dialogs.alert(result.data.message, t('files_external', 'Error getting the local directory listing in' + path ));
			}
		});
		if ($(this).parents('td.configuration').find('[data-parameter="datadir"]').val() !== path) {
			$(this).parents('td.configuration').find('[data-parameter="datadir"]').val(path);
		}
	});

	function createDirSelector(dirSpan, path, trigger = true) {
		$.post(OC.filePath('files_external', 'ajax', 'local.php'), { path: path }, function(result) {
			if (result && result.status === 'success') {
				$(dirSpan).append('<select id="'+path+'" class="local-file-chooser"></select>');
				$.each(result.data, function (dir, path) {
					$(dirSpan).find('select')
					   .append($('<option></option>')
					   .attr('value',path)
					   .text(dir));
					if (trigger) {
						$(dirSpan).find('select').trigger('change');
					}
				});
			} else {
				OC.dialogs.alert(result.data.message, t('files_external', 'Error getting the local directory listing in ' + path ));
			}
		});
	}
});

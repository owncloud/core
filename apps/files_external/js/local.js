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
		if ($(tr).find('.backend').data('class') == '\\OC\\Files\\Storage\\Local') {
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
		var last_span = $(config).find('span').last();
		if ( $(last_span).attr('id') != 'localroot') {
			var parent = $(last_span).parent();
			$(last_span).remove();
		}
		$(config).find('span').last().find('select').trigger('change');
	});

	$('#externalStorage').on('click', '.local-dir-down:not(.ui-state-disabled)', function(event) {
		event.preventDefault();
		var config = $(this).parent();
		var last_span = $(config).find('span').last();
		var last_select = $(last_span).find('select');
		$.post(OC.filePath('files_external', 'ajax', 'local.php'), { path: $(last_select).find('option:selected').val(), isnotempty: true }, function(result) {
			if (result && result.status == 'success') {
				if (result.data) {
					$(down_button).removeClass('ui-state-disabled');
					$(last_span).append('<span id="'+$(last_select).attr('id')+'"></span>');
					createDirSelector($(last_span).find('span'),$(last_select).find('option:selected').val());
				} else {
					$(down_button).addClass('ui-state-disabled');
				}
			} else {
				OC.dialogs.alert(result.data.message, t('files_external', 'Error getting the local directory listing in' + $(last_select).find('option:selected').val() ));
			}
		});
	});

	$('#externalStorage').on('change', '.local-file-chooser', function(event) {
		$(this).parent().find('span').remove();

		var path = $(this).find('option:selected').val()
		var up_button = $(this).parents('td.configuration').find('.local-dir-up');
		var down_button = $(this).parents('td.configuration').find('.local-dir-down');

		if ($(this).parent().attr('id') == 'localroot')
			$(up_button).addClass('ui-state-disabled');
		else
			$(up_button).removeClass('ui-state-disabled');

		$.post(OC.filePath('files_external', 'ajax', 'local.php'), { path: path, isnotempty: true }, function(result) {
			if (result && result.status == 'success') {
				if (result.data)
					$(down_button).removeClass('ui-state-disabled');
				else
					$(down_button).addClass('ui-state-disabled');
			} else {
				OC.dialogs.alert(result.data.message, t('files_external', 'Error getting the local directory listing in' + path ));
			}
		});
		if ($(this).parents('td.configuration').find('[data-parameter="datadir"]').val() != path) {
			$(this).parents('td.configuration').find('[data-parameter="datadir"]').val(path)
		}
	});

	function createDirSelector(dir_span, path, trigger = true) {
		$.post(OC.filePath('files_external', 'ajax', 'local.php'), { path: path }, function(result) {
			if (result && result.status == 'success') {
				$(dir_span).append('<select id="'+path+'" class="local-file-chooser"></select>');
				$.each(result.data, function (dir, path) {
					$(dir_span).find('select')
					   .append($('<option></option>')
					   .attr('value',path)
					   .text(dir));
				if (trigger) $(dir_span).find('select').trigger('change');
				});
			} else {
				OC.dialogs.alert(result.data.message, t('files_external', 'Error getting the local directory listing in ' + path ));
			}
		});
	}
});

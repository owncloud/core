// Override download path to files_sharing/public.php
function fileDownloadPath(dir, file) {
	var url = $('#downloadURL').val();
	if (url.indexOf('&path=') != -1) {
		url += '/'+file;
	}
	return url;
}

$(document).ready(function() {

	if (typeof FileActions !== 'undefined') {
		var mimetype = $('#mimetype').val();
		// Show file preview if previewer is available, images are already handled by the template
		if (mimetype.substr(0, mimetype.indexOf('/')) != 'image') {
			// Trigger default action if not download TODO
			var action = FileActions.getDefault(mimetype, 'file', OC.PERMISSION_READ);
			if (typeof action === 'undefined') {
				$('#noPreview').show();
				if (mimetype != 'httpd/unix-directory') {
					// NOTE: Remove when a better file previewer solution exists
					$('#content').remove();
					$('table').remove();
				}
			} else {
				action($('#filename').val());
			}
		}
		FileActions.register('dir', 'Open', OC.PERMISSION_READ, '', function(filename) {
			var tr = $('tr').filterAttr('data-file', filename)
			if (tr.length > 0) {
				window.location = $(tr).find('a.name').attr('href');
			}
		});
		FileActions.register('file', 'Download', OC.PERMISSION_READ, '', function(filename) {
			var tr = $('tr').filterAttr('data-file', filename)
			if (tr.length > 0) {
				window.location = $(tr).find('a.name').attr('href');
			}
		});
		FileActions.register('dir', 'Download', OC.PERMISSION_READ, '', function(filename) {
			var tr = $('tr').filterAttr('data-file', filename)
			if (tr.length > 0) {
				window.location = $(tr).find('a.name').attr('href')+'&download';
			}
		});
	}

});

// TODO: Is there a way to add the stuff below as file actions? Haven't got my
// head around those yet - rgeber <geber@b1-systems.de>

// Public Upload Button Handler
// $(document).on('click', '#publicUpload', function() {
//   $('#publicUploadFileSelect').trigger('click');
// });

// Basic implementation of jquery.fileupload
$(function () {
  $('#publicUploadFileSelect').fileupload({
    dataType: 'json',
    formData: {
      MAX_FILE_SIZE: $('#publicUploadMaxFileSize').val(),
      requesttoken: $('#publicUploadRequestToken').val(),
      dir: $('#publicUploadTargetDir').val(),
      dirToken: $('#publicUploadTargetDirToken').val()
    },
    done: function (e, data) {
      // TODO: Is there a nice AJAXy way to update the list? - rgeber <geber@b1-systems.de>
      if (data.result[0].status == 'success') {
        window.location.reload();
      } else {
        alert(t('files_sharing', 'Upload failed'));
      }
    }
  });
});

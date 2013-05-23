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
      MAX_FILE_SIZE: $('#uploadMaxFilesize').val(),
      requesttoken: $('#publicUploadRequestToken').val(),
      dirToken: $('#dirToken').val()
    },
    add: function(event, data) {

      var totalUploadSize = 0;
      $.each(data.originalFiles, function(i,file){
        totalUploadSize += file.size;
      });

      if (totalUploadSize > $('input#uploadMaxFilesize').val()) {
        alert(t('files','Not enough space available'));
        data.textStatus = 'notenoughspace';
        data.errorThrown = t('files','Not enough space available');
        var fu = $(this).data('blueimp-fileupload') || $(this).data('fileupload');
        fu._trigger('fail', e, data);
        return false; //don't upload anything
      }

      var jqXHR = data.submit();

      return true;
    },
    done: function (e, data) {
      if (data.result[0].status == 'success') {
        FileList.addFile(
          data.result[0].name,
          data.result[0].size,
          new Date(),
          false,
          false
        );
      } else {
        alert(t('files_sharing', 'Upload failed'));
      }
    }
  });
});

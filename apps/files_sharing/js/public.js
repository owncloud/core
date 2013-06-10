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

// Add Uploadprogress Wrapper to controls bar
$(document).ready(function() {
  $('#controls').append($('#additional_controls div#uploadprogresswrapper'));
})


// Process file upload
// Reused from files.js - Special thanks to cosmomill
if ( document.getElementById('publicUploadFileSelect') ) {
  $(function() {
    $('#publicUploadFileSelect').fileupload({
      dropZone: $('#content'), // restrict dropZone to content div

      formData: {
        MAX_FILE_SIZE: $('#uploadMaxFilesize').val(),
        requesttoken: $('#publicUploadRequestToken').val(),
        dirToken: $('#dirToken').val()
      },

      //singleFileUploads is on by default, so the data.files array
      //will always have length 1
      add: function(e, data) {

	if(data.files[0].type === '' && data.files[0].size == 4096)
	{
	  data.textStatus = 'dirorzero';
	  data.errorThrown = t('files','Unable to upload your file as it is a directory or has 0 bytes');
	  var fu = $(this).data('blueimp-fileupload') || $(this).data('fileupload');
	  fu._trigger('fail', e, data);
	  return true; //don't upload this file but go on with next in queue
	}

	var totalSize=0;
	$.each(data.originalFiles, function(i,file){
	  totalSize+=file.size;
	});

	if(totalSize>$('#uploadMaxFilesize').val()){
	  data.textStatus = 'notenoughspace';
	  data.errorThrown = t('files','Not enough space available');
	  var fu = $(this).data('blueimp-fileupload') || $(this).data('fileupload');
	  fu._trigger('fail', e, data);
	  return false; //don't upload anything
	}

	// start the actual file upload
	var jqXHR = data.submit();

	// remember jqXHR to show warning to user when he navigates away but an upload is still in progress
	if (typeof data.context !== 'undefined' && data.context.data('type') === 'dir') {
	  var dirName = data.context.data('file');
	  if(typeof uploadingFiles[dirName] === 'undefined') {
	    uploadingFiles[dirName] = {};
	  }
	  uploadingFiles[dirName][data.files[0].name] = jqXHR;
	} else {
	  uploadingFiles[data.files[0].name] = jqXHR;
	}

	//show cancel button
	if($('html.lte9').length === 0 && data.dataType !== 'iframe') {
	  $('#uploadprogresswrapper input.stop').show();
	}
      },
      /**
       * called after the first add, does NOT have the data param
       * @param e
       */
      start: function(e) {
	//IE < 10 does not fire the necessary events for the progress bar.
	if($('html.lte9').length > 0) {
	  return;
	}
	$('#uploadprogressbar').progressbar({value:0});
	$('#uploadprogressbar').fadeIn();
      },
      fail: function(e, data) {
	if (typeof data.textStatus !== 'undefined' && data.textStatus !== 'success' ) {
	  if (data.textStatus === 'abort') {
	    $('#notification').text(t('files', 'Upload cancelled.'));
	  } else {
	    // HTTP connection problem
	    $('#notification').text(data.errorThrown);
	  }
	  $('#notification').fadeIn();
	  //hide notification after 5 sec
	  setTimeout(function() {
	    $('#notification').fadeOut();
	  }, 5000);
	}
	delete uploadingFiles[data.files[0].name];
      },
      progress: function(e, data) {
	// TODO: show nice progress bar in file row
      },
      progressall: function(e, data) {
	//IE < 10 does not fire the necessary events for the progress bar.
	if($('html.lte9').length > 0) {
	  return;
	}
	var progress = (data.loaded/data.total)*100;
	$('#uploadprogressbar').progressbar('value',progress);
      },
      /**
       * called for every successful upload
       * @param e
       * @param data
       */
      done:function(e, data) {
	// handle different responses (json or body from iframe for ie)
        console.log(e);
        console.log(data);
	var response;
	if (typeof data.result === 'string') {
	  response = data.result;
	} else {
	  //fetch response from iframe
	  response = data.result[0].body.innerText;
	}
	var result=$.parseJSON(response);

        console.log(result);

	if(typeof result[0] !== 'undefined' && result[0].status === 'success') {
	  var file = result[0];
          console.log('Eagle Speedster');
          FileList.addFile(result[0].name, result[0].size, new Date(), false, false);
	} else {
	  data.textStatus = 'servererror';
	  data.errorThrown = t('files', result.data.message);
	  var fu = $(this).data('blueimp-fileupload') || $(this).data('fileupload');
	  fu._trigger('fail', e, data);
	}

	var filename = result[0].originalname;

	// delete jqXHR reference
	if (typeof data.context !== 'undefined' && data.context.data('type') === 'dir') {
	  var dirName = data.context.data('file');
	  delete uploadingFiles[dirName][filename];
	  if ($.assocArraySize(uploadingFiles[dirName]) == 0) {
	    delete uploadingFiles[dirName];
	  }
	} else {
	  delete uploadingFiles[filename];
	}

      },
      /**
       * called after last upload
       * @param e
       * @param data
       */
      stop: function(e, data) {
	if(data.dataType !== 'iframe') {
	  $('#uploadprogresswrapper input.stop').hide();
	}

	//IE < 10 does not fire the necessary events for the progress bar.
	if($('html.lte9').length > 0) {
	  return;
	}

	$('#uploadprogressbar').progressbar('value',100);
	$('#uploadprogressbar').fadeOut();
      }
    })
  });
}

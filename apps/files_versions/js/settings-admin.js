$(document).ready(function(){
	$('#versions').bind('change', function() {
		if($('#versions').attr('checked')) {
			$('#maxVersions').removeAttr('disabled');
			$('#versionLimitType').removeAttr('disabled');
			var checked = 1;
		} else {
			$('#maxVersions').attr('disabled', 'disabled');
			$('#versionLimitType').attr('disabled', 'disabled');
			var checked = 0;
		}
		$.post(OC.filePath('files_versions','ajax','togglesettings.php'), 'versions='+checked);
	});
	
	$('#versionLimitType').bind('change', function() {
		if ( $("select#versionLimitType").val() == "size" ) {
			version_limit_number = $('#maxVersions').val();
			$('#maxVersions').val(version_limit_size);
		} else {
			version_limit_size =  $('#maxVersions').val();
			$('#maxVersions').val(version_limit_number);
		}
		$.post(OC.filePath('files_versions','ajax','setlimits.php'), {type:$("select#versionLimitType").val()});
	});
	
	$('#maxVersions').live('focusout', function(event) {
		if ( $("select#versionLimitType").val() == "size" ) {
			version_limit_size =  $('#maxVersions').val();
		} else {
			version_limit_number = $('#maxVersions').val();
		}
		$.post(OC.filePath('files_versions','ajax','setlimits.php'), {value:$('#maxVersions').val(), type:$("select#versionLimitType").val()});
	});
});

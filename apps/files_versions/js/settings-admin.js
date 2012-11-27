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
		console.log("HELLO!!!!");
		alert("limit type changed to: " + $("#versionLimitType option:selected").html() + " - value: " + $("select#versionLimitType").val());
	});
});

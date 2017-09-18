$(document).ready(function () {
    $('.removeDomainButton').on('click', function () {
        var id = $(this).attr('data-id');
        var confirmText = $(this).attr('data-confirm');
        var token = OC.requestToken;
        var $el = $(this);

        OC.dialogs.confirm(
            t('settings', confirmText), t('settings','CORS'),
            function (result) {
                if (result) {
                    $.ajax({
                        type: 'DELETE',
                        url: OC.generateUrl('/settings/domains/{id}', {id: id}),
                        data: {
                            requesttoken: token
                        }
                    }).success(function() {
                        var numDomains = $("#cors .grid tbody tr").length;
                        if ($el.closest('tr').length === 1 && numDomains === 1) {
                            // Means only one domain row remains and that is to be deleted
                            // Show the No domains text
                            $("#noDomains").text("No Domains.");
                            // Remove the domain listing table
                            $("#cors .grid").remove();
                        }
                        $el.closest('tr').remove();
                    });
                }
            }, true
        );
	});
});

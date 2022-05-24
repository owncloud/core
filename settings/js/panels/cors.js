var PersonalCors = {
    renderRow: function(domain){
        var col1 = $('<td></td>').text(domain);
        var input = $('<input type="button" class="button icon-delete removeDomainButton" />').data('domain', domain)
        var col2 = $('<td />').append(input);
        var row = $('<tr></tr>').append(col1).append(col2);
        $('#cors .grid tbody').append(row);
    },
    render: function (data) {
        $("#cors .grid tbody tr").remove();
        for (var p in data) {
            PersonalCors.renderRow(data[p]);
        }
        var numDomains = $("#cors .grid tbody tr").length;
        if (numDomains === 0) {
            $("#noDomains").show();
            $("#cors .grid").hide();
        } else {
            $("#noDomains").hide();
            $("#cors .grid").show();
        }
    }
};

$(document).ready(function () {
    $('#cors').on('click', '.removeDomainButton', function () {
        var $el = $(this);

        OC.dialogs.confirm(
            t('settings', 'Are you sure you want to remove this domain?'), t('settings','CORS'),
            function (result) {
                if (result) {
                    var domain = encodeURIComponent($el.data('domain'));
                    $.ajax({
                        type: 'DELETE',
                        url: OC.generateUrl('/settings/domains/{domain}', {domain: domain}),
                        data: {}
                    }).success(function(response) {
                        if (response.domains) {
                            PersonalCors.render(response.domains)
                        }
                    });
                }
            }, true
        );
	});
    $('#corsAddNewDomain').on('click', function() {
        $('#corsAddNewDomain').attr('disabled', true);
        $.post(
            OC.generateUrl('/settings/domains'),
            { domain : $('#domain').val()},
            function(response) {
                if (response.message) {
                    OC.Notification.showTemporary(response.message);
                }
                if (response.domains) {
                    PersonalCors.render(response.domains)
                }
                $('#domain').val('');
                $('#corsAddNewDomain').attr('disabled', false);
            }
        )
    });
});

$(document).ready(function () {
    $('#sso-auth-form').submit(function (event) {
        event.preventDefault();
        var $form = $(this);
        var $submitBtn = $form.find('button[type="submit"]');
        var $originalText = $submitBtn.text();
        var ssoUrl = $form.find('#sso_url').val().trim();

        if (ssoUrl === '') {
            OC.Notification.showTemporary(t('sso_auth', 'SSO URL is required.'));
            return;
        }

        var urlPattern = new RegExp('^(https?:\\/\\/)?'+
            '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+
            '((\\d{1,3}\\.){3}\\d{1,3}))'+
            '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+
            '(\\?[;&a-z\\d%_.~+=-]*)?'+
            '(\\#[-a-z\\d_]*)?$','i');
        if (!urlPattern.test(ssoUrl)) {
             OC.Notification.showTemporary(t('sso_auth', 'Invalid SSO URL.'));
             return;
        }

        var realm = $form.find('#realm').val().trim();
        if (realm === '') {
             OC.Notification.showTemporary(t('sso_auth', 'Realm is required.'));
             return;
        }

        var clientId = $form.find('#client_id').val().trim();
        if (clientId === '') {
             OC.Notification.showTemporary(t('sso_auth', 'Client ID is required.'));
             return;
        }

        var clientSecret = $form.find('#client_secret').val().trim();
        if (clientSecret === '') {
             OC.Notification.showTemporary(t('sso_auth', 'Client Secret is required.'));
             return;
        }

        $submitBtn.text('Saving...').prop('disabled', true);

        $.ajax({
            type: 'POST',
            url: $form.attr('action'),
            data: $form.serialize(),
            success: function (response) {
                if (response.status === 'success') {
                    OC.Notification.showTemporary(t('sso_auth', 'Saved config successfully.'));
                } else {
                    OC.Notification.showTemporary(t('sso_auth', 'Error saving.'));
                }
            },
            error: function (xhr) {
                var response = xhr.responseJSON;
                if (!response && xhr.responseText) {
                    try {
                        response = JSON.parse(xhr.responseText);
                    } catch (e) {
                         console.error("Failed to parse error response", e);
                    }
                }
                
                var message = (response && response.message) ? response.message : t('sso_auth', 'Error saving.');
                OC.Notification.showTemporary(message);
            },
            complete: function() {
                $submitBtn.text($originalText).prop('disabled', false);
            }
        });
    });
});

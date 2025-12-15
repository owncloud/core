$(document).ready(function () {
    $('#sso-auth-form').submit(function (event) {
        event.preventDefault();
        var $form = $(this);
        var $submitBtn = $form.find('button[type="submit"]');
        var $originalText = $submitBtn.text();
        
        $submitBtn.text('Saving...').prop('disabled', true);

        $.ajax({
            type: 'POST',
            url: $form.attr('action'),
            data: $form.serialize(),
            success: function (response) {
                if (response.status === 'success') {
                    OC.Notification.showTemporary(t('sso_auth', 'Saved successfully'));
                } else {
                    OC.Notification.showTemporary(t('sso_auth', 'Error saving'));
                }
            },
            error: function () {
                OC.Notification.showTemporary(t('sso_auth', 'Error saving'));
            },
            complete: function() {
                $submitBtn.text($originalText).prop('disabled', false);
            }
        });
    });
});

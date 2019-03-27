/*
 * Copyright (c) 2018 Sujith Haridasan <sharidasan@owncloud.com>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

describe('OCA.UserManagement.SetPassword tests', function () {
	var resultSpy, SetPassword, redirectURL;
	beforeEach(function () {
		$('#testArea').append(
			'<label id="error-message" class="warning" style="display:none"></label>' +
			'<form id="set-password" method="post">\n' +
			'<fieldset>' +
			'<p>' +
			'<label for="password" class="infield">New password</label>' +
			'<input type="password" name="password" id="password" value=""' +
			'placeholder="New Password"' +
			'autocomplete="off" autocapitalize="off" autocorrect="off"' +
			'required autofocus />' +
			'<input type="password" name="retypepassword" id="retypepassword" value=""' +
			'placeholder="<"Confirm Password">' +
			' />' +
			'<span id="message"></span>' +
			'</p>' +
			'<input type="submit" id="submit" value="Please set your password"' +
			'</fieldset>' +
			'</form>'
		);
	});

	describe('set newpassword', function () {
		beforeEach(function () {
			SetPassword = OCA.UserManagement.SetPassword;
			redirectURL = sinon.stub(OC, 'redirect');
		});
		afterEach(function () {
			resultSpy.restore();
			redirectURL.restore();
		});

		it('set password failed', function () {
			resultSpy = sinon.spy(SetPassword, '_onSetPasswordFail');
			var defr = $.Deferred();
			defr.reject({'responseText' : '{"foo":"bar", "message": false}'});

			spyOn($, 'post').and.returnValue(defr.promise());

			SetPassword.init();
			$('#password').val('foo');
			$('#retypepassword').val('foo');
			$('#submit').click();

			expect(resultSpy.calledOnce).toEqual(true);
			expect($('#submit').prop('disabled')).toEqual(false);
			expect($('#error-message').text()).toEqual('Failed to set password. Please contact your administrator.');
		});

		it('set password success', function () {
			resultSpy = sinon.spy(SetPassword, '_resetDone');
			var defr = $.Deferred();
			defr.resolve({'status' : 'success'});

			spyOn($, 'post').and.returnValue(defr.done());

			SetPassword.init();
			$('#password').val('foo');
			$('#retypepassword').val('foo');
			$('#submit').click();

			expect(resultSpy.calledOnce).toEqual(true);
			expect(redirectURL.calledOnce).toEqual(true);
			expect(redirectURL.getCall(0).args[0]).toContain('/owncloud');
		});
	});
});

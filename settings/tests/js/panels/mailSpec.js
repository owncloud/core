/**
 * ownCloud
 *
 * @author Jan Ackermann <jackermann@owncloud.com>
 * @author Jannik Stehle <jstehle@owncloud.com>
 * @copyright Copyright (c) 2021
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

describe('Mail panel tests', function() {
	var notificationStub;
	var postStub;

	beforeEach(function() {
		$('#testArea').append('<div id="sendtestmail"></div>');
		notificationStub = sinon.stub(OC.Notification, 'showTemporary');
		postStub = sinon.stub($, "post");
	});

	afterEach(function (){
		notificationStub.restore();
		postStub.restore();
	});

	it('sends a test email', function() {
		MailTestUtil.sendTestMail('admin@owncloud.com');
		expect(notificationStub.notCalled).toEqual(true);
		expect(postStub.calledWith(
			OC.generateUrl('/settings/admin/mailtest'),
			{'mail_to_address': 'admin@owncloud.com'})
		).toEqual(true);
	});
});

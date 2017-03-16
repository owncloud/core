/**
* ownCloud
*
* @author Vincent Petry
* @copyright 2017 Vincent Petry <pvince81@owncloud.com>
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

/* global oc_appconfig */
describe('OC.Share.ShareDialogMailView', function() {

	it('implements those tests!', function() {
			expect('TODO').toEqual(true);
	});

	/**
	describe('sendEmailPrivateLink', function() {
		it('succeeds', function() {
			fetchReshareDeferred.resolve(makeOcsResponse([]));
			fetchSharesDeferred.resolve(makeOcsResponse([{
				displayname_owner: 'root',
				expiration: null,
				file_source: 123,
				file_target: '/folder',
				id: 20,
				item_source: '123',
				item_type: 'folder',
				mail_send: '0',
				parent: null,
				path: '/folder',
				permissions: OC.PERMISSION_READ,
				share_type: OC.Share.SHARE_TYPE_LINK,
				share_with: null,
				stime: 1403884258,
				storage: 1,
				token: 'tehtoken',
				uid_owner: 'root'
			}]));
			OC.currentUser = 'root';
			model.fetch();

			var res = model.sendEmailPrivateLink('foo@bar.com');

			expect(res.state()).toEqual('pending');
			expect(fakeServer.requests.length).toEqual(1);
			expect(fakeServer.requests[0].url).toEqual(OC.generateUrl('core/ajax/share.php'));
			expect(OC.parseQueryString(fakeServer.requests[0].requestBody)).toEqual(
				{
					action: 'email',
					toaddress: 'foo@bar.com',
					link: model.get('linkShare').link,
					itemType: 'file',
					itemSource: '123',
					file: 'shared_file_name.txt',
					expiration: ''
				}
			)

			fakeServer.requests[0].respond(
				200,
				{ 'Content-Type': 'application/json' },
				JSON.stringify({status: 'success'})
			);
			expect(res.state()).toEqual('resolved');
		});

		it('fails', function() {
			fetchReshareDeferred.resolve(makeOcsResponse([]));
			fetchSharesDeferred.resolve(makeOcsResponse([{
				displayname_owner: 'root',
				expiration: null,
				file_source: 123,
				file_target: '/folder',
				id: 20,
				item_source: '123',
				item_type: 'folder',
				mail_send: '0',
				parent: null,
				path: '/folder',
				permissions: OC.PERMISSION_READ,
				share_type: OC.Share.SHARE_TYPE_LINK,
				share_with: null,
				stime: 1403884258,
				storage: 1,
				token: 'tehtoken',
				uid_owner: 'root'
			}]));
			OC.currentUser = 'root';
			model.fetch();

			var res = model.sendEmailPrivateLink('foo@bar.com');

			expect(res.state()).toEqual('pending');
			expect(fakeServer.requests.length).toEqual(1);
			expect(fakeServer.requests[0].url).toEqual(OC.generateUrl('core/ajax/share.php'));
			expect(OC.parseQueryString(fakeServer.requests[0].requestBody)).toEqual(
				{
					action: 'email',
					toaddress: 'foo@bar.com',
					link: model.get('linkShare').link,
					itemType: 'file',
					itemSource: '123',
					file: 'shared_file_name.txt',
					expiration: ''
				}
			)

			fakeServer.requests[0].respond(
				200,
				{ 'Content-Type': 'application/json' },
				JSON.stringify({data: {message: 'fail'}, status: 'error'})
			);
			expect(res.state()).toEqual('rejected');
		});
	});
	 */

});

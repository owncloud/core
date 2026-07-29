/**
* ownCloud
*
* @author Jannik Stehle
* @copyright Copyright (c) 2021 Jannik Stehle <jstehle@owncloud.com>
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

describe('groups tests', function() {
	var groupList, $userGroupList, $sortGroupBy;

	beforeEach(function() {
		$('#testArea').append(
			'<ul id="usergrouplist" data-sort-groups="1">' +
				'<li id="newgroup-form">' + 
					'<form>' +
						'<input type="text" id="newgroupname" placeholder="Group...">' +
						'<input type="submit" class="button icon-add" value="" disabled="disabled">' +
					'</form>' +
				'</li>' +
				'<li id="newgroup-init">' +
					'<a href="#">' +
						'<span>Add Group</span>' +
					'</a>' +
				'</li>' +
				'<li data-gid="admin" data-usercount="1" class="isgroup">' +
					'<a href="#">' +
						'<span class="groupname" title="Admins">' +
							'Admins' +
						'</span>' +
						'<span class="usercount tag">' +
							'1' +
						'</span>' +
					'</a>' +
					'<span class="utils">' +
					'</span>' +
				'</li>' +
			'</ul>'
		);

		groupList = OCA.UserManagement.GroupList;
		$userGroupList = $('#usergrouplist');
		groupList.setUserGroupListEl($userGroupList);
		groupList.setUserGroupByEl($userGroupList.data('sort-groups'));
	});

	it('adds new user group', function() {
		var $li = groupList.addGroup('new group', 0);
		expect($li.length).toEqual(1);
		expect($('#usergrouplist li').length).toEqual(4);
	});

	describe('escaping of group names', function() {
		it('renders a group name containing markup as text', function() {
			var payload = '"><script>alert(document.cookie)</script>';
			var $li = groupList.addGroup(payload, payload, 0);

			expect($li.find('script').length).toEqual(0);
			expect($li.find('.groupname').text()).toEqual(payload);
		});

		it('does not break out of the data-gid attribute', function() {
			var $li = groupList.addGroup('" onmouseover="alert(1)" x="', 'evil', 0);

			expect($li.attr('onmouseover')).toBeUndefined();
			expect($li.attr('data-gid')).toEqual('" onmouseover="alert(1)" x="');
		});

		it('does not execute an event handler payload in the group name', function() {
			var $li = groupList.addGroup('g1', '<img src=x onerror="alert(1)">', 0);

			// note: the row always contains the delete icon, so scope to the name
			expect($li.find('.groupname img').length).toEqual(0);
			expect($li.find('.groupname').text()).toEqual('<img src=x onerror="alert(1)">');
		});
	});
});

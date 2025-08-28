/**
 * Copyright (c) 2014, Arthur Schiwon <blizzz@owncloud.com>
 * Copyright (c) 2014, Raghu Nayyar <beingminimal@gmail.com>
 * Copyright (c) 2011, Robin Appelman <icewind1991@gmail.com>
 * This file is licensed under the Affero General Public License version 3 or later.
 * See the COPYING-README file.
 */

var $userList;
var $userListBody;

var UserDeleteHandler;
var UserList = {
	availableGroups: {},
	offset: 0,
	usersToLoad: 200,
	initialUsersToLoad: 200, // initial number of users to load
	perPageUsersToLoad: 100, // users to load when user scrolls down
	currentUser: '',
	currentGid: '',
	filter: '',

	/**
	 * Initializes the user list
	 * @param $el user list table element
	 */
	initialize: function($el) {
		this.$el = $el;

		UserList.currentUser = OC.getCurrentUser().uid;

		// initially the list might already contain user entries (not fully ajaxified yet)
		// initialize these entries
		this.$el.find('.isEnabled').on('change', this.onEnabledChange);
		this.$el.find('.quota-user').singleSelect().on('change', this.onQuotaSelect);
	},

	/**
	 * Add a user row from user object
	 *
	 * @param user object containing following keys:
	 * 			{
	 * 				'name': 			'username',
	 * 				'displayname': 		'Users display name',
	 * 				'groups': 			['group1', 'group2'],
	 * 				'subadmin': 		['group4', 'group5'],
	 *				'enabled'			'true'
	 *				'quota': 			'10 GB',
	 *				'storageLocation':	'/srv/www/owncloud/data/username',
         *                              'creationTime':         '1418632333',
	 *				'lastLogin':		'1418632333'
	 *				'backend':			'LDAP',
	 *				'email':			'username@example.org'
	 *				'isRestoreDisabled':false
	 * 			}
	 * @returns table row created for this user
	 */
	add: function (user) {
		if (this.currentGid && this.currentGid !== '_everyone' && user.groups[this.currentGid] === undefined) {
			return;
		}

		var $tr = $userListBody.find('tr:first-child').clone();
		// this removes just the `display:none` of the template row
		$tr.removeAttr('style');

		/**
		 * Avatar or placeholder
		 */
		if ($tr.find('div.avatardiv').length) {
			if (user.isAvatarAvailable === true) {
				$('div.avatardiv', $tr).avatar(user.name, 32, undefined, undefined, undefined, user.displayname);
			} else {
				$('div.avatardiv', $tr).imageplaceholder(user.displayname, undefined, 32);
			}
		}

		/**
		 * add username and displayname to row (in data and visible markup)
		 */
		$tr.data('uid', user.name);
		$tr.data('displayname', user.displayname);
		$tr.data('mailAddress', user.email);
		$tr.data('restoreDisabled', user.isRestoreDisabled);
		$tr.find('.name').text(user.name);
		$tr.find('td.displayName > span').text(user.displayname);
		$tr.find('td.mailAddress > span').text(user.email);
		$tr.find('td.displayName > .action').tooltip({placement: 'top'});
		$tr.find('td.mailAddress > .action').tooltip({placement: 'top'});
		$tr.find('td.password > .action').tooltip({placement: 'top'});


		/**
		 * groups and subadmins
		 */
		var $tdGroups = $tr.find('td.groups');
		this._updateGroupListLabel($tdGroups, user.groups);
		$tdGroups.find('.action').tooltip({placement: 'top'});

		var $tdSubadmins = $tr.find('td.subadmins');
		this._updateGroupListLabel($tdSubadmins, user.subadmin);
		$tdSubadmins.find('.action').tooltip({placement: 'top'});

		/**
		 * enabled
		 */
		var $tdEnabled = $tr.find('.isEnabled');
		if(user.name !== UserList.currentUser) {
			$tdEnabled.attr("checked", user.isEnabled);
			$tdEnabled.on('change', UserList.onEnabledChange);
		} else {
			$tdEnabled.remove();
		}

		/**
		 * resend invitation email action
		 */
		if (user.lastLogin === 0 && user.isGuest !== true) {
			var resendImage = $('<img class="action">').attr({
				src: OC.imagePath('core', 'actions/mail')
			});
			var resendLink = $('<a class="action resendInvitationEmail">')
				.attr({ href: '#', 'title': t('settings', 'Resend invitation email')})
				.append(resendImage);
			$tr.find('td.resendInvitationEmail').append(resendLink);
		}

		/**
		 * remove action
		 */
		if ($tr.find('td.remove img').length === 0 && OC.currentUser !== user.name) {
			var deleteImage = $('<img class="action">').attr({
				src: OC.imagePath('core', 'actions/delete')
			});
			var deleteLink = $('<a class="action delete">')
				.attr({ href: '#', 'title': t('settings', 'Delete')})
				.append(deleteImage);
			$tr.find('td.remove').append(deleteLink);
		} else if (OC.currentUser === user.name) {
			$tr.find('td.remove a').remove();
		}

		/**
		 * quota
		 */
		var $quotaSelect = $tr.find('.quota-user');
		if (user.quota === 'default') {
			$quotaSelect
				.data('previous', 'default')
				.find('option').attr('selected', null)
				.first().attr('selected', 'selected');
		} else {
			var $options = $quotaSelect.find('option');
			var $foundOption = $options.filterAttr('value', user.quota);
			if ($foundOption.length > 0) {
				$foundOption.attr('selected', 'selected');
			} else {
				// append before "Other" entry
				$options.last().before('<option value="' + escapeHTML(user.quota) + '" selected="selected">' + escapeHTML(user.quota) + '</option>');
			}
		}

		/**
		 * storage location
		 */
		$tr.find('td.storageLocation').text(user.storageLocation);

		/**
		 * user backend
		 */
		$tr.find('td.userBackend').text(user.backend);

		/**
		 * last login
		 */
		var lastLoginRel = t('settings', 'never');
		var lastLoginAbs = lastLoginRel;
		if(user.lastLogin !== 0) {
			lastLoginRel = OC.Util.relativeModifiedDate(user.lastLogin);
			lastLoginAbs = OC.Util.formatDate(user.lastLogin);
		}
		var $tdLastLogin = $tr.find('td.lastLogin');
		$tdLastLogin.text(lastLoginRel);
		$tdLastLogin.attr('title', lastLoginAbs);
		// setup tooltip with #app-content as container to prevent the td to resize on hover
		$tdLastLogin.tooltip({placement: 'top', container: '#app-content'});

                /**
                 * creation time
                 */
                var creationTimeRel = t('settings', 'unknown');
                var creationTimeAbs = creationTimeRel;
                if(user.creationTime !== 0) {
                        creationTimeRel = OC.Util.relativeModifiedDate(user.creationTime);
                        creationTimeAbs = OC.Util.formatDate(user.creationTime);
                }
                var $tdCreationTime = $tr.find('td.creationTime');
                $tdCreationTime.text(creationTimeRel);
                $tdCreationTime.attr('title', creationTimeAbs);
                // setup tooltip with #app-content as container to prevent the td to resize on hover
                $tdCreationTime.tooltip({placement: 'top', container: '#app-content'});

		/**
		 * append generated row to user list
		 */
		$tr.appendTo($userList);
		if(UserList.isEmpty === true) {
			$tr.show();
			UserList.isEmpty = false;
			UserList.checkUsersToLoad();
		}

		$quotaSelect.on('change', UserList.onQuotaSelect);

		// defer init so the user first sees the list appear more quickly
		window.setTimeout(function(){
			$quotaSelect.singleSelect();
		}, 0);
		return $tr;
	},
	// From http://my.opera.com/GreyWyvern/blog/show.dml/1671288
	alphanum: function(a, b) {
		function chunkify(t) {
			var tz = [], x = 0, y = -1, n = 0, i, j;

			while (i = (j = t.charAt(x++)).charCodeAt(0)) {
				var m = (i === 46 || (i >=48 && i <= 57));
				if (m !== n) {
					tz[++y] = "";
					n = m;
				}
				tz[y] += j;
			}
			return tz;
		}

		var aa = chunkify(a.toLowerCase());
		var bb = chunkify(b.toLowerCase());

		for (var x = 0; aa[x] && bb[x]; x++) {
			if (aa[x] !== bb[x]) {
				var c = Number(aa[x]), d = Number(bb[x]);
				if (c === aa[x] && d === bb[x]) {
					return c - d;
				} else {
					return (aa[x] > bb[x]) ? 1 : -1;
				}
			}
		}
		return aa.length - bb.length;
	},
	preSortSearchString: function(a, b) {
		var pattern = this.filter;
		if(typeof pattern === 'undefined') {
			return undefined;
		}
		pattern = pattern.toLowerCase();
		var aMatches = false;
		var bMatches = false;
		if(typeof a === 'string' && a.toLowerCase().indexOf(pattern) === 0) {
			aMatches = true;
		}
		if(typeof b === 'string' && b.toLowerCase().indexOf(pattern) === 0) {
			bMatches = true;
		}

		if((aMatches && bMatches) || (!aMatches && !bMatches)) {
			return undefined;
		}

		if(aMatches) {
			return -1;
		} else {
			return 1;
		}
	},
	checkUsersToLoad: function() {
		if(UserList.isEmpty === false) {
			UserList.usersToLoad = UserList.perPageUsersToLoad;
		} else {
			UserList.usersToLoad = UserList.initialUsersToLoad;
		}
	},
	empty: function() {
		//one row needs to be kept, because it is cloned to add new rows
		$userListBody.find('tr:not(:first)').remove();
		var $tr = $userListBody.find('tr:first');
		$tr.hide();
		//on an update a user may be missing when the username matches with that
		//of the hidden row. So change this to a random string.
		$tr.data('uid', Math.random().toString(36).substring(2));
		UserList.isEmpty = true;
		UserList.offset = 0;
		UserList.checkUsersToLoad();
	},
	hide: function(uid) {
		UserList.getRow(uid).hide();
	},
	show: function(uid) {
		UserList.getRow(uid).show();
	},
	markRemove: function(uid) {
		var $tr = UserList.getRow(uid);
		var groups = $tr.find('.groups').data('groups');
		for(var i in groups) {
			var gid = groups[i]['gid'];
			var $li = GroupList.getGroupLI(gid);
			var userCount = GroupList.getUserCount($li);
			GroupList.setUserCount($li, userCount - 1);
		}
		GroupList.decEveryoneCount();
		UserList.hide(uid);
	},
	remove: function(uid) {
		UserList.getRow(uid).remove();
	},
	undoRemove: function(uid) {
		var $tr = UserList.getRow(uid);
		var groups = $tr.find('.groups').data('groups');
		for(var i in groups) {
			var gid = groups[i]['gid'];
			var $li = GroupList.getGroupLI(gid);
			var userCount = GroupList.getUserCount($li);
			GroupList.setUserCount($li, userCount + 1);
		}
		GroupList.incEveryoneCount();
		UserList.getRow(uid).show();
	},
	has: function(uid) {
		return UserList.getRow(uid).length > 0;
	},
	getRow: function(uid) {
		return $userListBody.find('tr').filter(function(){
			return UserList.getUID(this) === uid;
		});
	},
	getUID: function(element) {
		return ($(element).closest('tr').data('uid') || '').toString();
	},
	getDisplayName: function(element) {
		return ($(element).closest('tr').data('displayname') || '').toString();
	},
	getMailAddress: function(element) {
		return ($(element).closest('tr').data('mailAddress') || '').toString();
	},
	getRestoreDisabled: function(element) {
		return ($(element).closest('tr').data('restoreDisabled') || '');
	},
	initDeleteHandling: function() {
		//set up handler
		UserDeleteHandler = new DeleteHandler('/settings/users/users', 'username',
											UserList.markRemove, UserList.remove, UserList.undoRemove);

		//when to mark user for delete
		$userListBody.on('click', '.delete', function () {
			// Call function for handling delete/undo
			var uid = UserList.getUID(this);
			OC.dialogs.confirm(
				t('settings', 'You are about to delete a user. This action can\'t be undone and is permanent. All user data, files and shares will be deleted. Are you sure that you want to permanently delete {userName}?', {userName: uid}),
				t('settings', 'Delete user'),
				function (confirmation) {
					if (confirmation) {
						UserDeleteHandler.mark(uid);
						UserDeleteHandler.deleteEntry();
					}
				}
			);
		});
	},
	initResendInvitationEmailHandling: function () {
		$userListBody.on('click', '.action.resendInvitationEmail', function () {
			var uid = UserList.getUID(this);
			$.post(
				OC.generateUrl('/resend/invitation/{id}', {id: uid}),
				{}
			).done(function () {
				OC.Notification.showTemporary(t('settings', 'The invitation email for this user has been resent'));
			}).error(function () {
				OC.Notification.showTemporary(t('settings', 'The invitation email for this user could not be resent'));
			});
		});
	},
	update: function (gid, limit) {
		if (UserList.updating) {
			return;
		}
		if(!limit) {
			limit = UserList.usersToLoad;
		}
		$userList.siblings('.loading').css('visibility', 'visible');
		UserList.updating = true;
		if(gid === undefined) {
			gid = '';
		}
		UserList.currentGid = gid;
		var pattern = this.filter;
		$.get(
			OC.generateUrl('/settings/users/users'),
			{ offset: UserList.offset, limit: limit, gid: gid, pattern: pattern },
			function (result) {
				var trs = [];
				//The offset does not mirror the amount of users available,
				//because it is backend-dependent. For correct retrieval,
				//always the limit(requested amount of users) needs to be added.
				$.each(result, function (index, user) {
					if(UserList.has(user.name)) {
						return true;
					}
					var $tr = UserList.add(user);
					trs.push($tr);
				});
				if (result.length > 0) {
					$userList.siblings('.loading').css('visibility', 'hidden');
					// reset state on load
					UserList.noMoreEntries = false;
				}
				else {
					UserList.noMoreEntries = true;
					$userList.siblings('.loading').remove();
				}
				UserList.offset += limit;
			}).always(function() {
				UserList.updating = false;
			});
	},

	applyGroupSelect: function (element, user, checked) {
		var $element = $(element);

		var checkHandler = null;
		if(user) { // Only if in a user row, and not the #newusergroups select
			checkHandler = function (group) {
				if (user === OC.currentUser && group === 'admin') {
					return false;
				}
				if (!oc_isadmin && checked.length === 1 && checked[0] === group) {
					return false;
				}
				$.post(
					OC.filePath('settings', 'ajax', 'togglegroups.php'),
					{
						username: user,
						group: group
					},
					function (response) {
						if (response.status === 'success') {
							GroupList.update();
							var groupGID = response.data.group.gid;
							var groupName = response.data.group.name;
							if (UserList.availableGroups[groupGID] === undefined &&
								response.data.action === 'add'
							) {
								UserList.availableGroups[groupGID] = {
									'gid': groupGID,
									'name': groupName
								};
							}

							if (response.data.action === 'add') {
								GroupList.incGroupCount(groupGID);
							} else {
								GroupList.decGroupCount(groupGID);
							}
						}
						if (response.data.message) {
							OC.Notification.show(response.data.message);
						}
					}
				);
			};
		}

		$element.multiSelect({
			selectedFirst: true,
			checked: checked,
			oncheck: checkHandler,
			onuncheck: checkHandler,
			minWidth: 100
		});
	},

	applySubadminSelect: function (element, user, checked) {
		var $element = $(element);
		var checkHandler = function (group) {
			if (group === 'admin') {
				return false;
			}
			$.post(
				OC.filePath('settings', 'ajax', 'togglesubadmins.php'),
				{
					username: user,
					group: group
				},
				function () {
				}
			);
		};

		$element.multiSelect({
			createText: null,
			checked: checked,
			oncheck: checkHandler,
			onuncheck: checkHandler,
			minWidth: 100
		});
	},

	_onScroll: function() {
		if (!!UserList.noMoreEntries) {
			return;
		}
		if (UserList.scrollArea.scrollTop() + UserList.scrollArea.height() > UserList.scrollArea.get(0).scrollHeight - 500) {
			UserList.update(UserList.currentGid);
		}
	},

	/**
	 * Event handler for when a quota has been changed through a single select.
	 * This will save the value.
	 */
	onQuotaSelect: function(ev) {
		var $select = $(ev.target);
		var uid = UserList.getUID($select);
		var quota = $select.val();
		if (quota === 'other') {
			return;
		}
		if (
			['default', 'none'].indexOf(quota) === -1
			&& (OC.Util.computerFileSize(quota) === null)
		) {
			// the select component has added the bogus value, delete it again
			$select.find('option[selected]').remove();
			OC.Notification.showTemporary(t('settings', 'Invalid quota value "{val}"', {val: quota}));
			return;
		}
		UserList._updateQuota(uid, quota, function(returnedQuota){
			if (quota !== returnedQuota) {
				$select.find(':selected').text(returnedQuota);
			}
		});
	},

	/**
	 * Saves the quota for the given user
	 * @param {String} [uid] optional user id, sets default quota if empty
	 * @param {String} quota quota value
	 * @param {Function} ready callback after save
	 */
	_updateQuota: function(uid, quota, ready) {
		$.post(
			OC.filePath('settings', 'ajax', 'setquota.php'),
			{username: uid, quota: quota},
			function (result) {
				if (ready) {
					ready(result.data.quota);
				}
			}
		);
	},

	/**
         * Event handler for when a enabled value has been changed.
         * This will save the value.
         */
        onEnabledChange: function() {
                var $select = $(this);
                var uid = UserList.getUID($select);
                var enabled = $select.prop('checked') ? 'true' : 'false';

                UserList._updateEnabled(uid, enabled,
                        function(returnedEnabled){
                                if (enabled !== returnedEnabled) {
                                          $select.prop('checked', user.isEnabled);
                                }
                        });
        },


        /**
         * Saves the enabled value for the given user
         * @param {String} [uid] optional user id, sets default quota if empty
         * @param {String} enabled value
         * @param {Function} ready callback after save
         */
        _updateEnabled: function(uid, enabled, ready) {
               $.post(
                        OC.generateUrl('/settings/users/{id}/enabled', {id: uid}),
                        {username: uid, enabled: enabled},
                        function (result) {
                               	if(result.status == 'success') {
                                        OC.Notification.showTemporary(t('settings', 'User {uid} has been {state}!',
                                                                        {uid: uid,
                                                                        state: result.data.enabled === 'true' ?
                                                                        t('settings', 'enabled') :
                                                                        t('settings', 'disabled')}
                                                                     ));
				} else {
                                        OC.Notification.showTemporary(t('settings', result.data.message));
				}
                        }
               );
        },


	/**
	 * Creates a temporary jquery.multiselect selector on the given group field
	 */
	_triggerGroupEdit: function($td, isSubadminSelect) {
		var $groupsListContainer = $td.find('.groupsListContainer');
		var placeholder = $groupsListContainer.attr('data-placeholder') || t('settings', 'no group');
		var user = UserList.getUID($td);
		var checked = _.keys($td.data('groups')) || [];
		var extraGroups = [].concat(checked);
		var assignableGroups = new Set();
		var removableGroups = new Set();
		var checkedSet = new Set();
		$.each(checked, function(pos, groupGID) {
			checkedSet.add(groupGID);
		});

		$td.find('.multiselectoptions').remove();

		// jquery.multiselect can only work with select+options in DOM ? We'll give jquery.multiselect what it wants...
		var $groupsSelect;
		if (isSubadminSelect) {
			$groupsSelect = $('<select multiple="multiple" class="groupsselect multiselect button" title="' + escapeHTML(placeholder) + '"></select>');
		} else {
			$groupsSelect = $('<select multiple="multiple" class="subadminsselect multiselect button" title="' + escapeHTML(placeholder) + '"></select>')
		}

		function createGroupItem(gid, group) {
			if (isSubadminSelect) {
				// this is solely for the dropdown menu "Group Admin for"
				if (gid === 'admin') {
					// can't become subadmin of "admin" group
					return;
				}

				$groupsSelect.append($('<option value="' + escapeHTML(gid) + '">' + escapeHTML(group['name']) + '</option>'));
				// return as we need to bypass the following group restrictions here
				return;
			}

			var groupIsChecked = checkedSet.has(gid);
			var groupIsAssignable = assignableGroups.has(gid);
			var groupIsRemovable = removableGroups.has(gid);
			if (!groupIsChecked && !groupIsAssignable) {
				$groupsSelect.append($('<option value="' + escapeHTML(gid) + '" disabled="disabled">' + escapeHTML(group['name']) + '</option>'));
				return;
			}
			if (groupIsChecked && !groupIsRemovable) {
				$groupsSelect.append($('<option value="' + escapeHTML(gid) + '" disabled="disabled">' + escapeHTML(group['name']) + '</option>'));
				return;
			}
			$groupsSelect.append($('<option value="' + escapeHTML(gid) + '">' + escapeHTML(group['name']) + '</option>'));
		}

		$.ajax({
			type: 'GET',
			url: OC.generateUrl('/settings/groups/available'),
		}).then(function (result) {
			var that = this;

			if (result.data) {
				this.availableGroups = {};
				$.each(result.data.assignableGroups, function(gid, group) {
					assignableGroups.add(gid);
					that.availableGroups[gid] = {
						'gid': gid,
						'name': group['name']
					};
				});
				$.each(result.data.removableGroups, function(gid, group) {
					removableGroups.add(gid);
				});
			}

			$.each(this.availableGroups, function (gid, group) {
				// some new groups might be selected but not in the available groups list yet
				var extraIndex = extraGroups.indexOf(gid);
				if (extraIndex >= 0) {
					// remove extra group as it was found
					extraGroups.splice(extraIndex, 1);
				}
				createGroupItem(gid, group);
			});
			$.each(extraGroups, function (pos, groupGID) {
				createGroupItem(groupGID, $td.data('groups')[groupGID]);
			});

			$td.append($groupsSelect);

			if (isSubadminSelect) {
				UserList.applySubadminSelect($groupsSelect, user, checked);
			} else {
				UserList.applyGroupSelect($groupsSelect, user, checked);
			}

			$groupsListContainer.addClass('hidden');
			$td.find('.multiselect:not(.groupsListContainer):first').click();
			$groupsSelect.on('dropdownclosed', function(e) {
				$groupsSelect.remove();
				$td.find('.multiselect:not(.groupsListContainer)').parent().remove();
				$td.find('.multiselectoptions').remove();
				$groupsListContainer.removeClass('hidden');
				var groups = {};
				for (var i in e.checked) {
					var gid = e.checked[i];
					var groupInfo = $td.data('groups')[gid] ? $td.data('groups')[gid] : that.availableGroups[gid];
					groups[gid] = {
						'gid': gid,
						'name': groupInfo['name']
					};
				}
				UserList._updateGroupListLabel($td, groups);
			});
		}.bind(this));
	},

	/**
	 * Updates the groups list td with the given groups selection
	 */
	_updateGroupListLabel: function($td, groups) {
		var placeholder = $td.find('.groupsListContainer').attr('data-placeholder');
		var $groupsEl = $td.find('.groupsList');
		$groupsEl.text(_.pluck(groups, 'name').join(', ') || placeholder || t('settings', 'no group'));
		$td.data('groups', groups);
	}
};

$(document).ready(function () {
	OC.Plugins.attach('OC.Settings.UserList', UserList);
	$userList = $('#userlist');
	$userListBody = $userList.find('tbody');

	UserList.initDeleteHandling();
	UserList.initResendInvitationEmailHandling();

	// Implements User Search
	OCA.Search.users= new UserManagementFilter(UserList, GroupList);

	UserList.scrollArea = $('#app-content');

	UserList.availableGroups = $userList.data('groups');

	UserList.scrollArea.scroll(function(e) {UserList._onScroll(e);});

	$userList.after($('<div class="loading" style="height: 200px; visibility: hidden;"></div>'));

	// TODO: move other init calls inside of initialize
	UserList.initialize($('#userlist'));

	OC.AppConfig.getValue('core', 'umgmt_set_password', 'false', function (data) {
		var showPassword = $.parseJSON(data);
		if (showPassword === true) {
			$("#newuserpassword").show();
			$("#newemail").hide();
			$('#CheckBoxPasswordOnUserCreate').attr('checked', true);
		} else {
			$("#newemail").show();
			$("#newuserpassword").hide();
			$('#CheckBoxPasswordOnUserCreate').attr('checked', false);
		}
	});

	$userListBody.on('click', '.password', function (event) {
		event.stopPropagation();

		var $td = $(this).closest('td');
		var $tr = $(this).closest('tr');
		var uid = UserList.getUID($td);
		var $input = $('<input type="password" autocomplete="new-password" autocorrect="off">');
		var isRestoreDisabled = UserList.getRestoreDisabled($td) === true;
		if(isRestoreDisabled) {
			$tr.addClass('row-warning');
			// add tooltip if the password change could cause data loss - no recovery enabled
			var title = t('settings', 'Changing the password will result in data loss, because data recovery is not available for this user');
			$input.tooltip({placement:'bottom', title: title});
		}
		$td.find('img').hide();
		$td.children('span').replaceWith($input);
		$input
			.focus()
			.keypress(function (event) {
				if (event.keyCode === 13) {
					if ($(this).val().length > 0) {
						var recoveryPasswordVal = $('input:password[id="recoveryPassword"]').val();
						$.post(
							OC.generateUrl('/settings/users/changepassword'),
							{username: uid, password: $(this).val(), recoveryPassword: recoveryPasswordVal},
							function (result) {
								if(result.status == 'success') {
									OC.Notification.showTemporary(t('settings', 'Password successfully changed'));
								} else {
									OC.Notification.showTemporary(t('settings', result.data.message));
								}
							}
						);
						$input.blur();
					} else {
						$input.blur();
					}
				}
			})
			.blur(function () {
				$(this).replaceWith($('<span>●●●●●●●</span>'));
				$td.find('img').show();
				// remove highlight class from users without recovery ability
				$tr.removeClass('row-warning');
			});
	});
	$('input:password[id="recoveryPassword"]').keyup(function() {
		OC.Notification.hide();
	});

	$userListBody.on('click', '.displayName', function (event) {
		event.stopPropagation();
		var $td = $(this).closest('td');
		var $tr = $td.closest('tr');
		var uid = UserList.getUID($td);
		var displayName = escapeHTML(UserList.getDisplayName($td));
		var $input = $('<input type="text" value="' + displayName + '">');
		$td.find('img').hide();
		$td.children('span').replaceWith($input);
		$input
			.focus()
			.keypress(function (event) {
				if (event.keyCode === 13) {
					if ($(this).val().length > 0) {
						var $div = $tr.find('div.avatardiv');
						if ($div.length) {
							$div.imageplaceholder(uid, displayName);
						}
						$.post(
							OC.generateUrl('/settings/users/{id}/displayName', {id: uid}),
							{username: uid, displayName: $(this).val()},
							function (result) {
								if (result && result.status==='success' && $div.length){
									$div.avatar(result.data.username, 32);
								}
							}
						);
						var displayName = $input.val();
						$tr.data('displayname', displayName);
						$input.blur();
					} else {
						$input.blur();
					}
				}
			})
			.blur(function () {
				var displayName = $tr.data('displayname');
				$input.replaceWith('<span>' + escapeHTML(displayName) + '</span>');
				$td.find('img').show();
			});
	});

	$userListBody.on('click', '.mailAddress', function (event) {
		event.stopPropagation();
		var $td = $(this).closest('td');
		var $tr = $td.closest('tr');
		var uid = UserList.getUID($td);
		var mailAddress = escapeHTML(UserList.getMailAddress($td));
		var $input = $('<input type="text">').val(mailAddress);
		$td.children('span').replaceWith($input);
		$td.find('img').hide();
		$input
			.focus()
			.keypress(function (event) {
				if (event.keyCode === 13) {
					// enter key

					var mailAddress = $input.val();
					$td.find('.loading-small').css('display', 'inline-block');
					$input.css('padding-right', '26px');
					$input.attr('disabled', 'disabled');
					$.ajax({
						type: 'PUT',
						url: OC.generateUrl('/settings/admin/{id}/mailAddress', {id: uid}),
						data: {
							mailAddress: $(this).val()
						}
					}).success(function () {
						// set data attribute to new value
						// will in blur() be used to show the text instead of the input field
						$tr.data('mailAddress', mailAddress);
						$td.find('.loading-small').css('display', '');
						$input.removeAttr('disabled')
							.triggerHandler('blur'); // needed instead of $input.blur() for Firefox
					}).fail(function (result) {
						OC.Notification.showTemporary(result.responseJSON.data.message);
						$td.find('.loading-small').css('display', '');
						$input.removeAttr('disabled')
							.css('padding-right', '6px');
					});
				}
			})
			.blur(function () {
				if($td.find('.loading-small').css('display') === 'inline-block') {
					// in Chrome the blur event is fired too early by the browser - even if the request is still running
					return;
				}
				var $span = $('<span>').text($tr.data('mailAddress'));
				$input.replaceWith($span);
				$td.find('img').show();
			});
	});

	$('#newuser .groupsListContainer').on('click', function (event) {
		event.stopPropagation();
		var $div = $(this).closest('.groups');
		UserList._triggerGroupEdit($div);
	});
	$userListBody.on('click', '.groups .groupsListContainer, .subadmins .groupsListContainer', function (event) {
		event.stopPropagation();
		var $td = $(this).closest('td');
		var isSubadminSelect = $td.hasClass('subadmins');
		UserList._triggerGroupEdit($td, isSubadminSelect);
	});

	// init the quota field select box after it is shown the first time
	$('#app-settings').one('show', function() {
		$(this).find('#default_quota').singleSelect().on('change', UserList.onQuotaSelect);
	});

	UserList._updateGroupListLabel($('#newuser .groups'), []);
	$('#newuser').submit(function (event) {
		event.preventDefault();
		var username = $('#newusername').val();
		var password = $('#newuserpassword').val();
		var email = $('#newemail').val();
		var setPassword = $('#CheckBoxPasswordOnUserCreate').is(':checked');

		if ($.trim(username) === '') {
			OC.Notification.showTemporary(t('settings', 'Error creating user: {message}', {
				message: t('settings', 'A valid username must be provided')
			}));
			return false;
		}
		if (setPassword === true) {
			if ($.trim(password) === '') {
				OC.Notification.showTemporary(t('settings', 'Error creating user: {message}', {
					message: t('settings', 'A valid password must be provided')
				}));
				return false;
			}
		} else {
			if ($.trim(email) === '') {
				OC.Notification.showTemporary(t('settings', 'Error creating user: {message}', {
					message: t('settings', 'A valid email must be provided')
				}));
				return false;
			}
		}

		var groups = _.keys($('#newuser .groups').data('groups')) || [];

		var data = {
			username: username,
			groups: groups,
		};

		if (setPassword === true) {
			data.password = password;
			data.email = '';
		} else {
			data.password = '';
			data.email = email;
		}

		$.post(
			OC.generateUrl('/settings/users/users'),
			data,
			function (result) {
				if (result.groups) {
					for (var i in result.groups) {
						var gid = result.groups[i]['gid'];
						var displayname = result.groups[i]['name'];
						if (UserList.availableGroups[gid] === undefined) {
							UserList.availableGroups[gid] = {
								'gid': gid,
								'name': displayname
							};
						}
						$li = GroupList.getGroupLI(gid);
						userCount = GroupList.getUserCount($li);
						GroupList.setUserCount($li, userCount + 1);
					}
				}
				if (!UserList.has(username)) {
					UserList.add(result);
				}
				$('#newusername').focus();
				GroupList.incEveryoneCount();
			}).fail(function (result) {
			OC.Notification.showTemporary(t('settings', 'Error creating user: {message}', {
				message: result.responseJSON.message
			}, undefined, {escape: false}));
		}).success(function () {
			$('#newuser').get(0).reset();
		});
	});

	if ($('#CheckboxIsEnabled').is(':checked')) {
		$("#userlist .enabled").show();
	}
	// Option to display/hide the "Enabled" column
	$('#CheckboxIsEnabled').click(function () {
		if ($('#CheckboxIsEnabled').is(':checked')) {
			$("#userlist .enabled").show();
			OC.AppConfig.setValue('core', 'umgmt_show_is_enabled', 'true');
		} else {
			$("#userlist .enabled").hide();
			OC.AppConfig.setValue('core', 'umgmt_show_is_enabled', 'false');
		}
	});

	if ($('#CheckboxStorageLocation').is(':checked')) {
		$("#userlist .storageLocation").show();
	}
	// Option to display/hide the "Storage location" column
	$('#CheckboxStorageLocation').click(function() {
		if ($('#CheckboxStorageLocation').is(':checked')) {
			$("#userlist .storageLocation").show();
			OC.AppConfig.setValue('core', 'umgmt_show_storage_location', 'true');
		} else {
			$("#userlist .storageLocation").hide();
			OC.AppConfig.setValue('core', 'umgmt_show_storage_location', 'false');
		}
	});

        if ($('#CheckboxCreationTime').is(':checked')) {
                $("#userlist .creationTime").show();
        }
        // Option to display/hide the "Creation Time" column
        $('#CheckboxCreationTime').click(function() {
                if ($('#CheckboxCreationTime').is(':checked')) {
                        $("#userlist .creationTime").show();
                        OC.AppConfig.setValue('core', 'umgmt_show_creation_time', 'true');
                } else {
                        $("#userlist .creationTime").hide();
                        OC.AppConfig.setValue('core', 'umgmt_show_creation_time', 'false');
                }
        });

	if ($('#CheckboxLastLogin').is(':checked')) {
		$("#userlist .lastLogin").show();
	} else {
		$("#userlist .lastLogin").hide();
	}
	// Option to display/hide the "Last Login" column
	$('#CheckboxLastLogin').click(function() {
		if ($('#CheckboxLastLogin').is(':checked')) {
			$("#userlist .lastLogin").show();
			OC.AppConfig.setValue('core', 'umgmt_show_last_login', 'true');
		} else {
			$("#userlist .lastLogin").hide();
			OC.AppConfig.setValue('core', 'umgmt_show_last_login', 'false');
		}
	});

	if ($('#CheckboxEmailAddress').is(':checked')) {
		$("#userlist .mailAddress").show();
	}
	// Option to display/hide the "Mail Address" column
	$('#CheckboxEmailAddress').click(function() {
		if ($('#CheckboxEmailAddress').is(':checked')) {
			$("#userlist .mailAddress").show();
			OC.AppConfig.setValue('core', 'umgmt_show_email', 'true');
		} else {
			$("#userlist .mailAddress").hide();
			OC.AppConfig.setValue('core', 'umgmt_show_email', 'false');
		}
	});

	if ($('#CheckboxUserBackend').is(':checked')) {
		$("#userlist .userBackend").show();
	}
	// Option to display/hide the "User Backend" column
	$('#CheckboxUserBackend').click(function() {
		if ($('#CheckboxUserBackend').is(':checked')) {
			$("#userlist .userBackend").show();
			OC.AppConfig.setValue('core', 'umgmt_show_backend', 'true');
		} else {
			$("#userlist .userBackend").hide();
			OC.AppConfig.setValue('core', 'umgmt_show_backend', 'false');
		}
	});

	if ($('#CheckBoxPasswordOnUserCreate').is(':checked')) {
		$("#newuserpassword").show();
	}
	// Option to display/hide the "E-Mail" input field
	$('#CheckBoxPasswordOnUserCreate').click(function () {
		if ($('#CheckBoxPasswordOnUserCreate').is(':checked')) {
			OC.AppConfig.setValue('core', 'umgmt_set_password', 'true');
			$('#newemail').hide();
			$('#newuserpassword').show();
		} else {
			OC.AppConfig.setValue('core', 'umgmt_set_password', 'false');
			$('#newemail').show();
			$("#newuserpassword").hide();
		}
	});

	if ($('#CheckboxQuota').is(':checked')) {
		$("#userlist .quota").show();
	}
	// Option to display/hide the "User Backend" column
	$('#CheckboxQuota').click(function() {
		if ($('#CheckboxQuota').is(':checked')) {
			$("#userlist .quota").show();
			OC.AppConfig.setValue('core', 'umgmt_show_quota', 'true');
		} else {
			$("#userlist .quota").hide();
			OC.AppConfig.setValue('core', 'umgmt_show_quota', 'false');
		}
	});

	if ($('#CheckboxPassword').is(':checked')) {
		$("#userlist .password").show();
	}
	// Option to display/hide the "User Backend" column
	$('#CheckboxPassword').click(function() {
		if ($('#CheckboxPassword').is(':checked')) {
			$("#userlist .password").show();
			OC.AppConfig.setValue('core', 'umgmt_show_password', 'true');
		} else {
			$("#userlist .password").hide();
			OC.AppConfig.setValue('core', 'umgmt_show_password', 'false');
		}
	});

	// calculate initial limit of users to load
	var initialUserCountLimit = UserList.initialUsersToLoad,
		containerHeight = $('#app-content').height();
	if(containerHeight > 40) {
		initialUserCountLimit = Math.floor(containerHeight/40);
		if (initialUserCountLimit < UserList.initialUsersToLoad) {
			initialUserCountLimit = UserList.initialUsersToLoad;
		}
	}
	//realign initialUserCountLimit with usersToLoad as a safeguard
	while((initialUserCountLimit % UserList.usersToLoad) !== 0) {
		// must be a multiple of this, otherwise LDAP freaks out.
		// FIXME: solve this in LDAP backend in  8.1
		initialUserCountLimit = initialUserCountLimit + 1;
	}

	// trigger loading of users on startup
	UserList.update(UserList.currentGid, initialUserCountLimit);

	_.defer(function() {
		$('#app-content').trigger($.Event('apprendered'));
	});

});

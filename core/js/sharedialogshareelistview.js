/*
 * Copyright (c) 2015
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function() {
	if (!OC.Share) {
		OC.Share = {};
	}

	var TEMPLATE =
		'<ul id="shareWithList" class="shareWithList">' +
		'	{{#each sharees}}' +
		'	<li data-share-id="{{shareId}}" data-share-type="{{shareType}}" data-share-with="{{shareWith}}">' +
		'		<a href="#" class="unshare"><span class="icon-loading-small hidden"></span><span class="icon icon-delete"></span><span class="hidden-visually">{{unshareLabel}}</span></a>' +
		'		<a href="#" class="toggleShareDetails"><span class="icon icon-settings-dark"></span><span class="hidden-visually">{{unshareLabel}}</span></a>' +
		'		{{#if expirationDate}}' +
		'		<a class="time"><span class="icon icon-time"></span><span class="hidden-visually">{{unshareLabel}}</span></a>' +
		'		{{/if}}' +
				// avatar disabled case will be handled via js when it's rendered
		'		<div class="avatar {{#if modSeed}}imageplaceholderseed{{/if}}" data-username="{{shareWith}}" {{#if modSeed}}data-seed="{{shareWith}} {{shareType}}"{{/if}}></div>' +
		'		<span class="has-tooltip username" title="{{shareWith}}">{{shareWithDisplayName}}</span>' +
		'		{{#if shareWithAdditionalInfo}}' +
		'		<span class="has-tooltip user-additional-info">({{shareWithAdditionalInfo}})</span>' +
		'		{{/if}}' +
		'		{{#if mailNotificationEnabled}}  {{#unless isRemoteShare}}' +
		'		<span class="shareOption">' +
		'		{{#unless wasMailSent}}' +
		'		<span class="mailNotificationSpinner icon-loading-small hidden"></span>' +
		'		<input id="mail-{{cid}}-{{shareWith}}-{{shareType}}" type="button" name="mailNotification" value="{{notifyByMailLabel}}" class="mailNotification checkbox" />' +
		'		{{/unless}}' +
		'		</span>' +
		'		{{/unless}} {{/if}}' +
		'		<div class="shareOption">' +
		'			{{#if isUserShare}}' +
		'			<label for="expiration-{{name}}-{{cid}}-{{shareWith}}-{{shareType}}">{{expirationLabel}}: ' +
		'				<input type="text" id="expiration-{{name}}-{{cid}}-{{shareWith}}-{{shareType}}" value="{{expirationDate}}" class="expiration expiration-user" placeholder="{{expirationDatePlaceholder}}" />' +
		'				{{#unless isDefaultExpireDateUserEnforced}}' +
		'				<button class="removeExpiration">Remove</button>' +
		'				{{/unless}}' +
		'			</label>' +
		'			{{/if}}' +
		'			{{#if isGroupShare}}' +
		'			<label for="expiration-{{name}}-{{cid}}-{{shareWith}}-{{shareType}}">{{expirationLabel}}: ' +
		'				<input type="text" id="expiration-{{name}}-{{cid}}-{{shareWith}}-{{shareType}}" value="{{expirationDate}}" class="expiration expiration-group" placeholder="{{expirationDatePlaceholder}}" />' +
		'				{{#unless isDefaultExpireDateGroupEnforced}}' +
		'				<button class="removeExpiration">Remove</button>' +
		'				{{/unless}}' +
		'			</label>' +
		'			{{/if}}' +
		'			{{#if isRemoteShare}}' +
		'			<label for="expiration-{{name}}-{{cid}}-{{shareWith}}-{{shareType}}">{{expirationLabel}}: ' +
		'				<input type="text" id="expiration-{{name}}-{{cid}}-{{shareWith}}-{{shareType}}" value="{{expirationDate}}" class="expiration expiration-remote" placeholder="{{expirationDatePlaceholder}}" />' +
		'				{{#unless isDefaultExpireDateRemoteEnforced}}' +
		'				<button class="removeExpiration">Remove</button>' +
		'				{{/unless}}' +
		'			</label>' +
		'			{{/if}}' +
		'		</div>' +
		'		<div class="coreShareOptions">' +
		'			{{#if isResharingAllowed}} {{#if sharePermissionPossible}}' +
		'			<span class="shareOption">' +
		'				<input id="canShare-{{cid}}-{{shareWith}}-{{shareType}}-{{shareType}}" type="checkbox" name="share" class="permissions checkbox" {{#if hasSharePermission}}checked="checked"{{/if}} data-permissions="{{sharePermission}}" />' +
		'				<label for="canShare-{{cid}}-{{shareWith}}-{{shareType}}-{{shareType}}">{{canShareLabel}}</label>' +
		'			</span>' +
		'			{{/if}} {{/if}}' +
		'			{{#if editPermissionPossible}}' +
		'			<span class="shareOption">' +
		'				<input id="canEdit-{{cid}}-{{shareWith}}-{{shareType}}" type="checkbox" name="edit" class="permissions checkbox" {{#if hasEditPermission}}checked="checked"{{/if}} />' +
		'				<label for="canEdit-{{cid}}-{{shareWith}}-{{shareType}}">{{canEditLabel}}</label>' +
		'			</span>' +
		'			{{/if}}' +
		'			{{#if createPermissionPossible}}' +
		'			<span class="shareOption">' +
		'				<input id="canCreate-{{cid}}-{{shareWith}}-{{shareType}}" type="checkbox" name="create" class="permissions checkbox" {{#if hasCreatePermission}}checked="checked"{{/if}} data-permissions="{{createPermission}}"/>' +
		'				<label for="canCreate-{{cid}}-{{shareWith}}-{{shareType}}">{{createPermissionLabel}}</label>' +
		'			</span>' +
		'			{{/if}}' +
		'			{{#if updatePermissionPossible}}' +
		'			<span class="shareOption">' +
		'				<input id="canUpdate-{{cid}}-{{shareWith}}-{{shareType}}" type="checkbox" name="update" class="permissions checkbox" {{#if hasUpdatePermission}}checked="checked"{{/if}} data-permissions="{{updatePermission}}"/>' +
		'				<label for="canUpdate-{{cid}}-{{shareWith}}-{{shareType}}">{{updatePermissionLabel}}</label>' +
		'			</span>' +
		'			{{/if}}' +
		'			{{#if deletePermissionPossible}}' +
		'				<span class="shareOption">' +
		'				<input id="canDelete-{{cid}}-{{shareWith}}-{{shareType}}" type="checkbox" name="delete" class="permissions checkbox" {{#if hasDeletePermission}}checked="checked"{{/if}} data-permissions="{{deletePermission}}"/>' +
		'				<label for="canDelete-{{cid}}-{{shareWith}}-{{shareType}}">{{deletePermissionLabel}}</label>' +
		'			</span>' +
		'			{{/if}}' +
		'		</div>' +
		'		<div class="shareAttributes"">' +
		'			{{#each shareAttributesV1}}' +
		'			<span class="shareOption">' +
		'				<input id="can-{{name}}-{{cid}}-{{shareWith}}-{{shareType}}" type="checkbox" name="{{name}}" class="attributes checkbox" {{#if isReshare}}disabled{{/if}} {{#if enabled}}checked="checked"{{/if}} data-scope="{{scope}}" data-enabled="{{enabled}}""/>' +
		'				<label for="can-{{name}}-{{cid}}-{{shareWith}}-{{shareType}}">{{label}}</label>' +
		'			</span>' +
		'			{{/each}}' +
		'		</div>' +
		'       <! –– shareAttributesV2 div would be appended to this li element ––>' +
		'	</li>' +
		'	{{/each}}' +
		'</ul>';

	/**
	 * @class OCA.Share.ShareDialogShareeListView
	 * @member {OC.Share.ShareItemModel} model
	 * @member {jQuery} $el
	 * @memberof OCA.Sharing
	 * @classdesc
	 *
	 * Represents the sharee list part in the GUI of the share dialogue
	 *
	 */
	var ShareDialogShareeListView = OC.Backbone.View.extend({
		/** @type {string} **/
		id: 'ShareDialogShareeList',

		/** @type {OC.Share.ShareConfigModel} **/
		configModel: undefined,

		/** @type {Function} **/
		_template: undefined,

		/** @type {MutationObserver} **/
		_toggleMutationObserver: undefined,

		_currentlyToggled: {},

		events: {
			'click .unshare': 'onUnshare',
			'click .permissions': 'onPermissionChange',
			'click .attributes': 'onPermissionChange',
			'click .mailNotification': 'onSendMailNotification',
			'click .removeExpiration' : 'onRemoveExpiration',
			'click .toggleShareDetails' : 'onToggleShareDetailsChange'
		},

		initialize: function(options) {
			if(!_.isUndefined(options.configModel)) {
				this.configModel = options.configModel;
			} else {
				throw 'missing OC.Share.ShareConfigModel';
			}

			var view = this;

			this.model.on('change:shares', function() {
				view.render();
			});
		},

		/**
		 * Get shareAttributesApi v1 attributes and update checkboxes
		 * @param shareIndex
		 * @returns {object}
		 * @deprecated shareAttributesApi v2 requires apps to extend ShareItemModel
		 */
		getAttributesObject: function(shareIndex) {
			var model = this.model;
			var cid = this.cid;
			var shareWith = model.getShareWith(shareIndex);

			// Check if reshare, and if so disable the checkboxes
			var isReshare = model.hasReshare();

			// Returns OC.Share.Types.ShareAttribute[] which were set for this
			// share (and stored in DB)
			var attributes = model.getShareAttributes(shareIndex);

			// Display shareAttributesV1 checkboxes (registered and with label)
			var list = [];
			attributes.map(function(attribute) {
				// Display only shareAttributesApi v1 attributes ,
				// other attributes should be handled by apps
				var regAttr = model.getRegisteredShareAttribute(
					attribute.scope,
					attribute.key
				);
				if (regAttr && regAttr.label) {
					list.push({
						cid: cid,
						isReshare: isReshare,
						shareWith: shareWith,
						enabled: attribute.enabled,
						scope: attribute.scope,
						name: attribute.key,
						label: regAttr.label
					});
				}
			});

			return list;
		},

		/**
		 * @param shareIndex
		 * @returns {object}
		 */
		getShareeObject: function(shareIndex) {
			var shareWith = this.model.getShareWith(shareIndex);
			var shareWithDisplayName = this.model.getShareWithDisplayName(shareIndex);
			var shareType = this.model.getShareType(shareIndex);
			var shareWithAdditionalInfo = this.model.getShareWithAdditionalInfo(shareIndex);

			var hasPermissionOverride = {};
			if (shareType === OC.Share.SHARE_TYPE_GROUP) {
				shareWithDisplayName = shareWithDisplayName + " (" + t('core', 'group') + ')';
			} else if (shareType === OC.Share.SHARE_TYPE_REMOTE) {
				shareWithDisplayName = shareWithDisplayName + " (" + t('core', 'federated') + ')';
			}

			return _.extend(hasPermissionOverride, {
				cid: this.cid,
				hasSharePermission: this.model.hasSharePermission(shareIndex),
				hasEditPermission: this.model.hasEditPermission(shareIndex),
				hasCreatePermission: this.model.hasCreatePermission(shareIndex),
				hasUpdatePermission: this.model.hasUpdatePermission(shareIndex),
				hasDeletePermission: this.model.hasDeletePermission(shareIndex),
				shareAttributesV1: this.getAttributesObject(shareIndex),
				expirationLabel: t('core', 'Expiration'),
				expirationDatePlaceholder: t('core', 'Choose an expiration date'),
				isDefaultExpireDateUserEnforced: this.configModel.isDefaultExpireDateUserEnforced(),
				isDefaultExpireDateGroupEnforced: this.configModel.isDefaultExpireDateGroupEnforced(),
				isDefaultExpireDateRemoteEnforced: this.configModel.isDefaultExpireDateRemoteEnforced(),
				expirationDate: this.model.getExpirationDate(shareIndex),
				wasMailSent: this.model.notificationMailWasSent(shareIndex),
				shareWith: shareWith,
				shareWithDisplayName: shareWithDisplayName,
				shareWithAdditionalInfo: shareWithAdditionalInfo,
				shareType: shareType,
				shareId: this.model.get('shares')[shareIndex].id,
				modSeed: shareType !== OC.Share.SHARE_TYPE_USER,
				isRemoteShare: shareType === OC.Share.SHARE_TYPE_REMOTE,
				isUserShare: shareType === OC.Share.SHARE_TYPE_USER,
				isGroupShare: shareType === OC.Share.SHARE_TYPE_GROUP
			});
		},

		getShareeList: function() {
			var universal = {
				avatarEnabled: this.configModel.areAvatarsEnabled(),
				mailNotificationEnabled: this.configModel.isMailNotificationEnabled(),
				notifyByMailLabel: t('core', 'notify by email'),
				unshareLabel: t('core', 'Unshare'),
				canShareLabel: t('core', 'can share'),
				canEditLabel: t('core', 'can edit'),
				createPermissionLabel: t('core', 'create'),
				updatePermissionLabel: t('core', 'change'),
				deletePermissionLabel: t('core', 'delete'),
				crudsLabel: t('core', 'access control'),
				triangleSImage: OC.imagePath('core', 'actions/triangle-s'),
				isResharingAllowed: this.configModel.get('isResharingAllowed'),
				sharePermissionPossible: this.model.sharePermissionPossible(),
				editPermissionPossible: this.model.editPermissionPossible(),
				createPermissionPossible: this.model.createPermissionPossible(),
				updatePermissionPossible: this.model.updatePermissionPossible(),
				deletePermissionPossible: this.model.deletePermissionPossible(),
				defaultExpireDateUserEnabled: this.configModel.isDefaultExpireDateUserEnabled(),
				defaultExpireDateGroupEnabled: this.configModel.isDefaultExpireDateGroupEnabled(),
				defaultExpireDateRemoteEnabled: this.configModel.isDefaultExpireDateRemoteEnabled(),
				sharePermission: OC.PERMISSION_SHARE,
				createPermission: OC.PERMISSION_CREATE,
				updatePermission: OC.PERMISSION_UPDATE,
				deletePermission: OC.PERMISSION_DELETE
			};

			if(!this.model.hasUserShares()) {
				return [];
			}

			var shares = this.model.get('shares');
			var list = [];
			for(var index = 0; index < shares.length; index++) {
				// first empty {} is necessary, otherwise we get in trouble
				// with references
				list.push(_.extend({}, universal, this.getShareeObject(index)));
			}

			return list;
		},

		render: function() {
			var self = this;

			// render shares list in a container
			this.$el.html(this.template({
				cid: this.cid,
				sharees: this.getShareeList()
			}));

			if(this.configModel.areAvatarsEnabled()) {
				this.$el.find('.avatar').each(function() {
					var $this = $(this);
					if ($this.hasClass('imageplaceholderseed')) {
						$this.css({width: 32, height: 32});
						$this.imageplaceholder($this.data('seed'));
					} else {
						$this.avatar($this.data('username'), 32);
					}
				});
			} else {
				this.$el.find('.avatar').css({visibility: 'hidden', width: 0});
			}

			this.$el.find('.has-tooltip').tooltip({
				placement: 'bottom'
			});

			this.$el.find('.expiration-user:not(.hasDatepicker)').each(function(){
				self._setDatepicker(this, {
					maxDate  : self.configModel.getDefaultExpireDateUser(),
					enforced : self.configModel.isDefaultExpireDateUserEnforced()
				});
			});

			this.$el.find('.expiration-group:not(.hasDatepicker)').each(function(){
				self._setDatepicker(this, {
					maxDate  : self.configModel.getDefaultExpireDateGroup(),
					enforced : self.configModel.isDefaultExpireDateGroupEnforced()
				});
			});

			this.$el.find('.expiration-remote:not(.hasDatepicker)').each(function(){
				self._setDatepicker(this, {
					maxDate  : self.configModel.getDefaultExpireDateRemote(),
					enforced : self.configModel.isDefaultExpireDateRemoteEnforced()
				});
			});

			var shareWithList = this.$el.get(0);
			if (!_.isUndefined(shareWithList)) {
				// make sure that toggled share options are shown, class .shareOption
				// elements are not displayed by default and need to be
				// toggled so they are rendered.
				this._renderToggledShareDetails();

				// use mutation observer to ensure that if shareWithList changes
				// proper share details are also toggled
				if (_.isUndefined(self._toggleMutationObserver)) {
					self._toggleMutationObserver =
						new MutationObserver(function() {
							self._renderToggledShareDetails();
						});
				}
				self._toggleMutationObserver.disconnect();
				self._toggleMutationObserver.observe(shareWithList, { childList: true, subtree: true });
			}

			this.delegateEvents();

			return this;
		},

		/**
		 * @returns {Function} from Handlebars
		 * @private
		 */
		template: function (data) {
			if (!this._template) {
				this._template = Handlebars.compile(TEMPLATE);
			}
			return this._template(data);
		},

		onUnshare: function(event) {
			var self = this;
			var $element = $(event.target);
			if (!$element.is('a')) {
				$element = $element.closest('a');
			}

			var $loading = $element.find('.icon-loading-small').eq(0);
			if(!$loading.hasClass('hidden')) {
				// in process
				return false;
			}
			$loading.removeClass('hidden');

			var $li = $element.closest('li');

			var shareId = $li.data('share-id');

			self.model.removeShare(shareId)
				.done(function() {
					$li.remove();
				})
				.fail(function() {
					$loading.addClass('hidden');
					OC.Notification.showTemporary(t('core', 'Could not unshare'));
				});
			return false;
		},

		onPermissionChange: function(event) {
			var $element = $(event.target);
			var $li = $element.closest('li');
			var shareId = $li.data('share-id');
			var shareType = $li.data('share-type');
			var shareWith = $li.attr('data-share-with');

			// adjust share permissions and their required checkbox states
			var $checkboxes = $('.permissions', $li).not('input[name="edit"]').not('input[name="share"]');
			var checked;
			if ($element.attr('name') === 'edit') {
				checked = $element.is(':checked');
				// Check/uncheck Create, Update, and Delete checkboxes if Edit is checked/unck
				$($checkboxes).prop('checked', checked);
			} else {
				var numberChecked = $checkboxes.filter(':checked').length;
				checked = numberChecked > 0;
				$('input[name="edit"]', $li).prop('checked', checked);
			}

			var permissions = OC.PERMISSION_READ;
			$('.permissions', $li).not('input[name="edit"]').filter(':checked').each(function(index, checkbox) {
				permissions |= $(checkbox).data('permissions');
			});

			/**
			 * ShareAttributesApi v1 attributes
			 *
		 	 * @deprecated attributes will be removed, shareAttributesApi v2 requires apps to extend ShareItemModel updateShare
			 */
			var attributes = [];
			$('.attributes', $li).each(function(index, checkbox) {
				var checked = $(checkbox).is(':checked');
				$(checkbox).prop('enabled', checked);
				attributes.push({
					scope : $(checkbox).data('scope'),
					key: $(checkbox).attr('name'),
					enabled: checked
				});
			});

			this.model.updateShare(shareId,	{
					permissions: permissions,
					attributes: attributes
				}, {}
			);
		},

		onSendMailNotification: function(event) {
			var $target = $(event.target);
			var $li = $(event.target).closest('li');
			var shareType = $li.data('share-type');
			var shareWith = $li.attr('data-share-with');

			var $loading = $target.prev('.icon-loading-small');

			$target.addClass('hidden');
			$loading.removeClass('hidden');

			this.model.sendNotificationForShare(shareType, shareWith, true).then(function(result) {
				if (result.ocs.data.status === 'success') {
					OC.Notification.showTemporary(t('core', 'Email notification was sent!'));
					$target.remove();
				} else {
					// sending was successful but some users might not have any email address
					OC.dialogs.alert(t('core', result.ocs.meta.message), t('core', 'Email notification not sent'));
				}

				$target.removeClass('hidden');
				$loading.addClass('hidden');
			});
		},

		onRemoveExpiration: function(event) {
			// make sure that click event is not propagated further
			event.preventDefault();

			// update share unsetting expiry date
			var shareId = $(event.target).closest('li').data('share-id');
			var share = this.model.getShareById(shareId);
			this.model.updateShare( shareId, {
				permissions: share.permissions,
				attributes: share.attributes || {},
				expireDate: ''
			}, {});
		},

		onExpirationChange: function(el) {
			var $el        = $(el);
			var shareId    = $el.closest('li').data('share-id');
			var expiration = moment($el.val(), 'DD-MM-YYYY').format();

			var share = this.model.getShareById(shareId);
			this.model.updateShare( shareId, {
				permissions: share.permissions,
				attributes: share.attributes || {},
				expireDate: expiration
			}, {});
		},

		onToggleShareDetailsChange: function(event) {
			var $li = $(event.target).closest('li');
			var shareId = $li.data('share-id');

			if (!_.isUndefined(this._currentlyToggled[shareId]) && this._currentlyToggled[shareId] === true) {
				delete(this._currentlyToggled[shareId]);
				this._toggleShareOptions(shareId, false);
			} else {
				this._currentlyToggled[shareId] = true;
				this._toggleShareOptions(shareId, true);
			}
		},

		_renderToggledShareDetails: function() {
			var view = this;
			this.$el.find('li').each(function() {
				var $li = $(this);
				var shareId = $li.data('share-id');
				if (!_.isUndefined(view._currentlyToggled[shareId]) && view._currentlyToggled[shareId] === true) {
					view._toggleShareOptions(shareId, true);
				} else {
					view._toggleShareOptions(shareId, false);
				}
			});
		},

		_toggleShareOptions: function(shareId, enabled) {
			var $li = this.$el.find('li[data-share-id=' + shareId + ']');
			$li.find(".shareOption").each(function() {
				var $option = $(this);
				if (enabled) {
					$option.css('display', 'inline-block');
				} else {
					$option.css('display', 'none');
				}
			});
		},

		_setDatepicker: function(el, params) {
			var self = this;
			var $el = $(el);

			$el.datepicker({
				minDate: "+0d",
				dateFormat : 'dd-mm-yy',
				onSelect : function() {
					self.onExpirationChange(el);
				}
			});

			if (params.enforced) {
				$el.datepicker("option", "maxDate", "+" + params.maxDate + 'd');
			}
		}
	});

	OC.Share.ShareDialogShareeListView = ShareDialogShareeListView;

})();

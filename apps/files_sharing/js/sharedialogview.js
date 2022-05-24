/**
 * @author Jan Ackermann <jackermann@owncloud.com>
 *
 * @copyright Copyright (c) 2021, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

(function() {
	if (!OCA.Sharing) {
		OCA.Sharing = {};
	}

	/**
	 * @namespace
	 */
	OCA.Sharing.ShareDialogView = {
		attach: function (view) {
			var that = this;
			var baseRenderCall = view.render;

			var shareCollectionModel = view.model.getLinkSharesCollection();
			view.linkShareView = new OC.Share.ShareDialogLinkListView({
				collection: shareCollectionModel,
				itemModel: view.model
			});

			var baseLinkShareViewRender = view.linkShareView.render;
			view.render = function () {
				baseRenderCall.call(view);
				if (view.configModel.isPublicSharingBlockedByAllowlist() && !shareCollectionModel.length) {
					view.$el.find('.subtab-publicshare').remove();
				}
			};

			view.linkShareView.render = function () {
				baseLinkShareViewRender.call(view.linkShareView);

				if (view.configModel.isPublicSharingBlockedByAllowlist()) {
					view.linkShareView.$el.find('.addLink').remove();
					view.$el.find('.empty-message').remove();
				}
			};

			var baseShareeListViewRender = view.shareeListView.render;

			var linkShareViewInitialized = false;
			view.shareeListView.render = function () {
				baseShareeListViewRender.call(view.shareeListView);

				view.$el.find(".subTabHeader.subtab-publicshare").on("click", function () {
					if (linkShareViewInitialized) {
						return;
					}

					view.linkShareView.render();
					view.$('.linkListView').html(view.linkShareView.$el);
					linkShareViewInitialized = true;
				});

			};
		},
	};
})();

OC.Plugins.register('OC.Share.ShareDialogView', OCA.Sharing.ShareDialogView, 100);

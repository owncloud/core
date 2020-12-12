/**
* ownCloud
*
* @author Vincent Petry
* @copyright Copyright (c) 2016 Vincent Petry <pvince81@owncloud.com>
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

describe('OC.SystemTags.SystemTagsList tests', function() {
	var view, clock;

	beforeEach(function() {
		clock = sinon.useFakeTimers();
		var $container = $('<div class="testListContainer"></div>');
		$('#testArea').append($container);

		view = new OC.SystemTags.SystemTagsList();
		$('.testListContainer').append(view.$el);
		view.data = [
			{name: 'abc'},
			{name: 'def'},
			{name: 'abd'},
		];
		view.render();
	});
	afterEach(function() {
		OC.SystemTags.collection.reset();
		clock.restore();
		view.remove();
		view = undefined;
	});

	describe('rendering tags', function() {
		it('renders system tag list', function() {
			expect(view.$el.hasClass('system-tag-list')).toEqual(true);
		});

		it('renders tags within the system tag list', function() {
			expect(view.$el.find('.system-tag-list-item').length).toEqual(3);
		});
	});
});

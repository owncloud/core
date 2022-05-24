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

describe('OCA.SystemTags.SystemTagsInfoView tests', function() {
	var view;
	var clock;

	beforeEach(function() {
		clock = sinon.useFakeTimers();
		view = new OCA.SystemTags.SystemTagsInfoView();
		$('#testArea').append(view.$el);


	});
	afterEach(function() {
		clock.restore();
		view.remove();
		view = undefined;
	});
	describe('rendering', function() {
		beforeEach(function() {
			view.selectedTagsCollection.add([
				{id: '1', name: 'test1'},
				{id: '2', name: 'test2'},
				{id: '3', name: 'test3'}
			]);
			view.render();
		});
		it('render tag list view including tags', function() {
			expect(view.$el.find('.system-tag-list').length).toEqual(1);
			expect(view.$el.find('.system-tag-list-item').length).toEqual(3);
		});
	});
	describe('events', function() {
		var allTagsCollection;
		beforeEach(function() {
			allTagsCollection = view._inputView.collection;

			allTagsCollection.add([
				{id: '1', name: 'test1'},
				{id: '2', name: 'test2'},
				{id: '3', name: 'test3'},
				{id: '4', name: 'test4'},
			]);

			view.selectedTagsCollection.add([
				{id: '1', name: 'test1'},
				{id: '2', name: 'test2'},
				{id: '3', name: 'test3'}
			]);
			view.render();
		});
		it('add tag to list view', function() {
			view.selectedTagsCollection.add([{id: '4', name: 'test4'}]);
			expect(view.$el.find('.system-tag-list-item').length).toEqual(4);
		});
		it('remove tag from list view', function() {
			view.selectedTagsCollection.remove([{id: '1', name: 'test1'}]);
			expect(view.$el.find('.system-tag-list-item').length).toEqual(2);
		});
		it('global tag delete also deleted the tag in list view', function() {
			allTagsCollection.remove([{id: '1', name: 'test1'}]);
			expect(view.selectedTagsCollection.get('1')).toBeFalsy();
		});
		it('global tag name change also changes the tag name in list view', function() {
			allTagsCollection.get('1').set('name', 'test1_renamed');
			expect(view.selectedTagsCollection.get('1').get('name')).toEqual('test1_renamed');
		});
	});
});

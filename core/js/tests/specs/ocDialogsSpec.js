/**
 * ownCloud
 *
 * @author Jan Ackermann <jackermann@owncloud.com>
 * @author Jannik Stehle <jstehle@owncloud.com>
 * @copyright Copyright (c) 2021 ownCloud GmbH
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

describe('OC.dialogs', function () {
	describe('OC.dialogs.filepicker', function () {
		describe('rendering', function () {
				var mockFiles,
					currentUserStub,
					stubGetFileList,
					stubGetFilePickerTemplate;

				beforeEach(function () {
					mockFiles = [
						{
							"id": "2147483792",
							"parentId": "3",
							"mtime": 1627456238000,
							"name": "dir",
							"permissions": 31,
							"mimetype": "httpd/unix-directory",
							"size": 10577869,
							"type": "dir",
							"etag": "610102ee0515c"
						},
						{
							"id": "1",
							"parentId": "1",
							"mtime": 1613236065000,
							"name": "image.png",
							"permissions": 27,
							"mimetype": "image/png",
							"size": 2837104,
							"type": "file",
							"etag": "481bd6be5f890a95ca65a6121e932399",
							"icon": "/core/img/filetypes/image.svg"
						},
					];
					var getFileListResponse = function () {
						var d = $.Deferred();
						d.resolve({
							data: {
								files: mockFiles
							}
						});
						return d.promise();
					};


					var getFilePickerTemplateResponse = function () {
						var d = $.Deferred();

						var template = $(
							'<div id="{dialog_name}" title="{title}">' +
							'	<span class="dirtree"></span>' +
							'		<ul class="filelist">' +
							'			<li data-entryname="{filename}" data-type="{type}" title="{filename}">' +
							'				<img />' +
							'			<div>' +
							'				<span class="filename">{filename}</span>' +
							'				<span class="date">{date}</span>' +
							'			</div>' +
							'			</li>' +
							'		</ul>' +
							'</div>');

						OC.dialogs.$listTmpl = template.find('.filelist li:first-child').detach();
						d.resolve(template);
						return d.promise();
					};

					stubGetFileList = sinon.stub(OC.dialogs, '_getFileList');
					stubGetFilePickerTemplate = sinon.stub(OC.dialogs, '_getFilePickerTemplate');
					currentUserStub = sinon.stub(OC, 'getCurrentUser');

					currentUserStub.returns({
						uid: 'testuser',
						displayName: 'Test User'
					});

					stubGetFileList.returns(getFileListResponse());
					stubGetFilePickerTemplate.returns(getFilePickerTemplateResponse());

				});

				afterEach(function () {
					currentUserStub.restore();
					stubGetFileList.restore();
					stubGetFilePickerTemplate.restore();
				});

				it('renders', function () {
						OC.dialogs.filepicker('Test', sinon.stub(), false, [], false);
						expect(OC.dialogs.$filePicker.find('li').length).toEqual(mockFiles.length);

						for (var i = 0; i < mockFiles.length; i++) {
							expect(OC.dialogs.$filePicker.find('li:eq(' + i + ')').data('entryname')).toEqual(mockFiles[i].name);
							expect(OC.dialogs.$filePicker.find('li:eq(' + i + ')').data('type')).toEqual(mockFiles[i].type);
							expect(OC.dialogs.$filePicker.find('li:eq(' + i + ')').attr('title')).toEqual(mockFiles[i].name);
						}
					}
				);

			}
		);
	});
});

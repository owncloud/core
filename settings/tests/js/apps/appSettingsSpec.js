/**
* ownCloud
*
* @author Kai Schröer
* @copyright 2018 Kai Schröer <git@schroeer.co>
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

describe('App Settings tests', function() {
	var apps = [
		{
			"author": "Author 1, Author 2",
			"types": [
				"logging",
				"dav"
			]
		},
		{
			"author": [
				"Author 1",
				"Author 2",
				{
					"@attributes": {
						"email": "author3@owncloud.org"
					},
					"@value": "Author 3"
				}
			],
			"types": [
				"filesystem"
			]
		}
	];

	it('should parse the author info', function() {
		var author = OC.Settings.Apps._parseAppAuthor(apps[0].author);
		expect(author).toEqual('Author 1, Author 2');

		author = OC.Settings.Apps._parseAppAuthor(apps[1].author);
		expect(author).toEqual('Author 1, Author 2, Author 3');
	});

	it('should check the app type', function() {
		var isFilesystem = OC.Settings.Apps.isType(apps[0], 'filesystem');
		expect(isFilesystem).toEqual(false);

		isFilesystem = OC.Settings.Apps.isType(apps[1], 'filesystem');
		expect(isFilesystem).toEqual(true);
	});
});

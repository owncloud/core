/**
 * @author Roeland Jago Douma <roeland@famdouma.nl>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

describe('Preview', function() {
	var _providers;

	beforeAll(function() {
		_providers = OC.Preview._Providers;

		OC.Preview._Providers = [
			"image\\\/png"
		];
	});

	afterAll(function() {
		OC.Preview._Providers = _providers;
	});

	describe('previewAvailable', function() {

		it('match for image/png', function() {
			var res = OC.Preview.previewAvailable('image/png');
			expect(res).toEqual(true);
		});

		it('no match for image/png2', function() {
			var res = OC.Preview.previewAvailable('image/png2');
			expect(res).toEqual(false);
		});

		it('no match on image', function() {
			var res = OC.Preview.previewAvailable('image');
			expect(res).toEqual(false);
		});

		it('no match on png', function() {
			var res = OC.Preview.previewAvailable('png');
			expect(res).toEqual(false);
		});

	});

});

/*
 * ownCloud - Core
 *
 * @author Raghu Nayyar
 * @copyright 2013 Raghu Nayyar <raghu.nayyar.007@gmail.com>
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

/* Lists out Admins and User Admins on Top. */

usersmanagement.filter('adminFilter', 
	[function() {
		return function(groups) {
			var isAdmin = [];
			for (var i=0; i<groups.length; i++) {
				if (groups[i].isAdmin == true) {
					isAdmin.push(groups[i]);
				}
			}
		}
	}
]);

/* Capitalizes the Group List */

usersmanagement.filter('capitalize',
	[function() {
		var firstcharUpper = function(input) {
			input = input.charAt(0).toUpperCase();
			return input;
		}
		return firstcharUpper;
	}
]);

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

/* The Spinner Directive */

usersmanagement.directive('loading',
	[ function() {
		return {
			restrict: 'E',
			replace: true,
			template:"<div class='loading'></div>",
	    	link: function($scope, element, attr) {
				$scope.$watch('loading', function(val) {
					if (val) {
						$(element).show();
					}
					else {
						$(element).hide();
					}
				});
			}		
		}
	}]
);

/* ngFocus and ngBlur Directives */

usersmanagement.directive('ngFocus', 
	['$parse', function($timeout) {
    	return function( scope, element, attrs ) {
        	scope.$watch(attrs.ngFocus, function (newVal, oldVal) {
            	if (newVal) {
            		element[0].focus();
            	}
			});
		};
	}
]);

usersmanagement.directive('ngBlur',
	['$parse', function($parse) {
    	return function (scope, element, attrs) {
			element.bind('blur', function () {
				scope.$apply(attrs.ngBlur);
			});
		}
	}
]);

/* The Jquery Multiselect Directive for Toggling Groups. */

usersmanagement.directive('multiselectUsers', [function() {
	return function(scope, element, attributes) {
		element = $(element[0]); // To use jQuery.
        element.multiSelect({
			title: 'Groups..',
			createText: scope.label,
			selectedFirst: true,
			minWidth: 100
			//checked: checked,
			//oncheck: checkHandeler,
			//onuncheck: checkHandeler,
			//createCallback: addGroup,
        });
	}
}]);

/* The Jquery Multiselect Directive for Toggling SubAdmins */
/*
usersmanagement.directive('multiselectSubadmins', [function() {
	return function(scope, element, attributes) {
		element = $(element[0]); // To use jQuery.
        element.multiSelect({
			title: 'Select Subadmin of..',
			minWidth: 150,
			maxWidth: 200
        });
	}
}]);
*/

/* The Jquery Multiselect Directive for Adding Groups. */

usersmanagement.directive('multiselectDropdown', [function() {
	return function(scope, element, attributes) {
		element = $(element[0]); // To use jQuery.
        element.multiSelect({
			title: 'Groups..',
			oncheck: scope.addGroup,
			minWidth: 100,
			maxWidth: 125
        });
	}
}]);

/* The Directives for the ownCloud Avatars. */

usersmanagement.directive('avatar',
	[ function() {
		return {
			template: "<div class='avatardiv'></div>",
			replace: true
			// Get the Avatar Plugin here once it gets into master.
		}
	}]
);
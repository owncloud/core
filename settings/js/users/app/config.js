/*
 * ownCloud - Core
 *
 * @author Raghu Nayyar
 * @author Bernhard Posselt
 * @copyright 2013 Raghu Nayyar <raghu.nayyar.007@gmail.com>
 * @copyright 2013 Bernhard Posselt <nukeawhale@gmail.com>
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

var usersmanagement = angular.module('usersmanagement', ['ngResource']).
config(['$httpProvider','$routeProvider', '$windowProvider', '$provide',
	function($httpProvider,$routeProvider, $windowProvider, $provide) {

		$httpProvider.defaults.headers.common['requesttoken'] = oc_requesttoken;

		$routeProvider
			.when('/group/:groupId', {
				templateUrl : 'user-table.html',
				controller : 'userlistController',
				resolve : {
					users :['$q', '$route', 'GroupModel', 'UserService',
					function ($q,$route,GroupModel,UserService) {
						var deferred = $q.defer();
						var groupId = $route.current.params.groupId;
						var group = GroupModel.getById(groupId);
						if(group) {
							var users = UserService.getUsersInGroup(groupId);
							deferred.resolve(users);
						}
						else {
							deferred.reject();
						}
						return deferred.promise;
					}]
				}
			})
			.otherwise('/group/', {
				templateUrl : 'user-table.html',
				controller : 'userlistController',
				resolve : {
					users :['$q', '$route', 'GroupModel', 'UserModel',
						function ($q,$route,GroupModel,UserModel) {
							var deferred = $q.defer();
							var group = GroupModel.getById(groupId);
		                    if(group) {
		                        var users = UserModel.getAll();
		                        deferred.resolve(users);
		                    }
							else {
		                        deferred.reject();
		                    }
						return deferred.promise;
					}]
				}
			});
			var $window = $windowProvider.$get();
			var url = $window.location.href;
			var baseUrl = url.split('index.php')[0] + 'index.php/settings';
			$provide.value('Config', {
				baseUrl: baseUrl
			});
		}
]).run(['$rootScope', '$location', 'GroupModel',
	function($rootScope, $location, GroupModel) {
	$rootScope.$on('$routeChangeError', function() {
		// Something wrong here
		var groups = GroupModel.getAll();
		if (groups.length > 0) {
			var sorted = groups.sort(function(a, b) {
				if(a.modified > b.modified) return 1;
				if(a.modified < b.modified) return -1;
				return 0;
			});
			var group = groups[groups.length-1];
			$location.path('/group/' + group.groupId);
		} else {
			$location.path('/group/');
		}
	});
}]);

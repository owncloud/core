
/**
 * ownCloud - Settings - v2.0.0
 *
 * Copyright (c) 2013 - Raghu Nayyar <raghu.nayyar.007@gmail.com>
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


var usersmanagement = angular.module('usersmanagement', ['ngResource','localytics.directives']).
config(['$httpProvider','$routeProvider', '$windowProvider', '$provide',
	function($httpProvider,$routeProvider, $windowProvider, $provide) {

		$httpProvider.defaults.headers.common['requesttoken'] = oc_requesttoken;

		$routeProvider
		.when('/group/:groupid', {
			controller : 'grouplistController',
			templateUrl : OC.filePath('settings', 'templates/users', 'part.userlist.php')
		})
		.otherwise({
			redirectTo : '/group/everyone'
		});

		var $window = $windowProvider.$get();
		var url = $window.location.href;
		var baseUrl = url.split('index.php')[0] + 'index.php/settings';

		$provide.value('Config', {
			baseUrl: baseUrl
		});
	}
]);

/* Group Service */

usersmanagement.factory('GroupService', function($resource) {
	var groupname = {};
	return {
		creategroup: function () {
			return $resource(OC.filePath('settings', 'ajax', 'creategroup.php'), {}, {
				method : 'POST'
			});
		},
		togglegroup: function () {
			return $resource(OC.filePath('settings', 'ajax', 'togglegroup.php'), group, {
				method : 'GET',
				isArray : true
			});
		},
		removegroup: function (group) {
			return $resource(OC.filePath('settings', 'ajax', 'removegroup.php'), group, {
				method: 'DELETE'
			});
		},
		getAllGroups: function() {
			return $resource(OC.filePath('settings', 'ajax', 'grouplist.php'), {}, {
				method:'POST'
			});
		},
		getByGroupId: function(groupId) {
			return $resource(OC.filePath('settings', 'ajax', 'grouplist.php'), {}, {
				method: 'GET'
			});
		}
	}
});

/* User Serivce */

usersmanagement.factory('UserService', ['$resource', 'Config',
	function($resource, Config) {
	return {
		createuser: function () {
			return $resource(OC.filePath('settings', 'ajax', 'createuser.php'), {}, {
				method : 'POST'
			});
		},
		removeuser: function (users) {
			return $resource(OC.filePath('settings', 'ajax', 'removeuser.php'), users, {
				method: 'DELETE'
			});
		},
		updateField: function(userId, fields) {
			return $resource(Config.baseUrl + '/users/' + userId, fields, {
				method: 'POST'
			});
		},
		getAllUsers: function() {
			return $resource(OC.filePath('settings', 'ajax', 'userlist.php'), {}, {
				method: 'POST'
			});
		}
	};
}]);

/* Quota Service */

usersmanagement.factory('QuotaService', function($resource) {
	return $resource(OC.filePath('settings','ajax', 'setQuota.php'), {}, {
		method : 'POST'
	});
});


usersmanagement.factory('GroupModel', ['_Model', function (_Model) {
	GroupModel = function() {};
	GroupModel.prototype = Object.create(_Model.prototype);
	return new GroupModel();
}]);

usersmanagement.factory('UserModel', ['_Model', function (_Model) {
	UserModel = function() {};
	UserModel.prototype = Object.create(_Model.prototype);
	return new UserModel();
}]);

usersmanagement.factory('_Model', function() {
	var Model;
	Model = (function() {

		function Model() {
			this._data = [];
			this._dataMap = {};
			this._filterCache = {};
		}

		Model.prototype.addAll = function(data) {
			var item, _i, _len, _results;
			_results = [];
			for (_i = 0, _len = data.length; _i < _len; _i++) {
				item = data[_i];
				_results.push(this.add(item));
			}
			return _results;
		};

		Model.prototype.add = function(data, clearCache) {
			if (clearCache == null) {
				clearCache = true;
			}
			/*
						Adds a new entry or updates an entry if the id exists already
			*/

			if (clearCache) {
				this._invalidateCache();
			}
			if (angular.isDefined(this._dataMap[data.id])) {
				return this.update(data, clearCache);
			} else {
				this._data.push(data);
				return this._dataMap[data.id] = data;
			}
		};

		Model.prototype.update = function(data, clearCache) {
			var entry, key, value, _results;
			if (clearCache == null) {
				clearCache = true;
			}
			/*
						Update an entry by searching for its id
			*/

			if (clearCache) {
				this._invalidateCache();
			}
			entry = this.getById(data.id);
			_results = [];
			for (key in data) {
				value = data[key];
				if (key === 'id') {
					continue;
				} else {
					_results.push(entry[key] = value);
				}
			}
			return _results;
		};

		Model.prototype.getById = function(id) {
			/*
						Return an entry by its id
			*/
			return this._dataMap[id];
		};

		Model.prototype.getAll = function() {
			/*
						Returns all stored entries
			*/
			return this._data;
		};

		Model.prototype.removeById = function(id, clearCache) {
			var counter, data, entry, _i, _len, _ref;
			if (clearCache == null) {
				clearCache = true;
			}
			/*
						Remove an entry by id
			*/

			_ref = this._data;
			for (counter = _i = 0, _len = _ref.length; _i < _len; counter = ++_i) {
				entry = _ref[counter];
				if (entry.id === id) {
					this._data.splice(counter, 1);
					data = this._dataMap[id];
					delete this._dataMap[id];
					if (clearCache) {
						this._invalidateCache();
					}
					return data;
				}
			}
		};

		Model.prototype.clear = function() {
			/*
						Removes all cached elements
			*/
			this._data.length = 0;
			this._dataMap = {};
			return this._invalidateCache();
		};

		Model.prototype._invalidateCache = function() {
			return this._filterCache = {};
		};

		Model.prototype.get = function(query) {
			/*
						Calls, caches and returns filtered results
			*/

			var hash;
			hash = query.hashCode();
			if (!angular.isDefined(this._filterCache[hash])) {
				this._filterCache[hash] = query.exec(this._data);
			}
			return this._filterCache[hash];
		};

		Model.prototype.size = function() {
			/*
						Return the number of all stored entries
			*/
			return this._data.length;
		};

		return Model;

	})();
	return Model;
});


/* Controller for Creating Groups - Left Sidebar */

usersmanagement.controller('creategroupController',
	['$scope', '$http', 'GroupService',
	function($scope, $http, GroupService) {
		var newgroup = {};
		$scope.savegroup = function() {
			GroupService.creategroup().save({ groupname : $scope.newgroup });
			//CreateGroupService.addNewGroup($scope.newgroup);
			$scope.showgroupinput = false;
			$scope.showbutton = true;
			$scope.newgroup = '';
		}
	}
]);

/* Fetches the List of All Groups - Left Sidebar */

usersmanagement.controller('grouplistController',
	['$scope', '$resource', '$routeParams', 'GroupService', 'UserService',
	function($scope, $resource, $routeParams, GroupService, UserService) {
		$scope.loading = true;
		$scope.Groupdata = GroupService.getAllGroups().get().success(function(response) {
			$scope.groupnames = response.data.result;
			var grouplist = $scope.groupnames;
			$scope.loading = false;

			$scope.groups = GroupService.getByGroupId($routeParams.groupid);
			// Selects the current Group.
			$scope.selectGroup = function(groupid) {
				$scope.selectedGroup = groupid;
			}

			// Adds an Active class for the ng-class field.
			$scope.selectListGroup = function(groupid) {
				return groupid === $scope.selectedGroup ? 'active' : undefined;
			}

			// Deletes the group.
			$scope.deletegroup = function(group) {
				grouplist.splice(grouplist.indexOf(group), 1);
				GroupService.removegroup().delete({ groupname : group });
			}
		});
	}
]);

/* Asynchronously creates user */

usersmanagement.controller('addUserController',
	['$scope', '$http', 'UserService', 'GroupService',
	function($scope, $http, UserService, GroupService) {
		var newuser,password = {};
		var groups = [];
		$scope.saveuser = function() {
			UserService.createuser().save({ username : $scope.newuser }, { password : $scope.password }, { group : $scope.selectedgroup });
		}
		// Takes Out all groups for the Chosen dropdown
		$scope.allgroups = GroupService.getByGroupId().get();
	}
]);

usersmanagement.controller('setQuotaController',
	['$scope', 'QuotaService',
	function($scope, QuotaService) {
		// Shift Default Storage here.
	}
]);

/* Fetches the List of All Users and details on the Right Content */

usersmanagement.controller('userlistController',
	['$scope', '$resource', 'UserService', 'GroupService', '$routeParams', 'CreateUserService',
	function($scope, $resource, UserService, GroupService, $routeParams, CreateUserService) {
		$scope.loading = true;
		$scope.Userdata = UserService.getAllUsers().get().success(function(response) {
			$scope.users = response.data.userdetails;
			$scope.loading = false;

			/* Takes Out all groups for the Chosen dropdown */
			$scope.allgroups = GroupService.getByGroupId().get();

		    var getnewuser = function(newname) {
		        $scope.users.push({
					userid : newname.replace(/\s/g, ''),
					name : newname,
					displayname : newname,
					groups : CreateUserService.useringroups
		        });
		    }

			$scope.gid = $routeParams.groupid;

			$scope.deleteuser = function(user) {
				$scope.users.splice($scope.users.indexOf(user), 1);
				UserService.removeuser().delete({ username : user });
			};

			$scope.updateUser = function(field) {
				console.log(field);
				console.log($scope.users);
			}
		});
	}
]);

/* The Spinner Directive */

usersmanagement.directive('loading', function() {
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
});

/* ngFocus and ngBlur Directives */

usersmanagement.directive('ngFocus', ['$parse', function($timeout) {
    return function( scope, element, attrs ) {
        scope.$watch(attrs.ngFocus, function (newVal, oldVal) {
            if (newVal)
                element[0].focus();
        });
      };
}]);

usersmanagement.directive('ngBlur', ['$parse', function($parse) {
    return function (scope, element, attrs) {
		element.bind('blur', function () {
			scope.$apply(attrs.ngBlur);
		});
	}
}]);

/* Filters the userlist for the respective group */

usersmanagement.filter('usertogroupFilter', function() {
	return function(users,groups) {
		var groupusers = [];
		for(var i=0; i<users.length; i++) {
			for (var j=0; j<groups.length; j++ ) {
				if(users[i].userid === groups[j]) {
					groupusers.push(users[i]);
				}
			}
		}
		return groupusers;
	}
});

/* Capitalizes the Group List */

usersmanagement.filter('capitalize', function() {
	var firstcharUpper = function(input) {
		input = input.charAt(0).toUpperCase();
		return input;
	}
	return firstcharUpper;
});


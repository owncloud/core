
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


var usersmanagement = angular.module('usersmanagement', ['ngResource']).
config(['$httpProvider','$routeProvider', '$windowProvider', '$provide',
	function($httpProvider,$routeProvider, $windowProvider, $provide) {

		$httpProvider.defaults.headers.common['requesttoken'] = oc_requesttoken;

		$routeProvider
		.when('/group/:groupId', {
			controller : 'grouplistController',
			templateUrl : OC.filePath('settings', 'templates/users', 'part.userlist.php')
		})
		.otherwise({
			redirectTo : '/group/'
		});

		var $window = $windowProvider.$get();
		var url = $window.location.href;
		var baseUrl = url.split('index.php')[0] + 'index.php/settings';

		$provide.value('Config', {
			baseUrl: baseUrl
		});
	}
]).run(['$rootScope', '$location', 'GroupService',
	function($rootScope, $location, GroupService) {
	$rootScope.$on('$routeChangeError', function() {
		// Something wrong here
		var groups = GroupService.getAllGroups();
		
		// route change error should redirect to the latest note if possible
		if (groups.length > 0) {
			var sorted = groups.sort(function(a, b) {
				if(a.modified > b.modified) return 1;
				if(a.modified < b.modified) return -1;
				return 0;
			});
			
			var group = groups[groups.length-1];
			$location.path('/group/' + group.id);
		} else {
			$location.path('/group/');
		}
	});
}]);

/* Group Service */

usersmanagement.factory('GroupService',
	['$q', '$resource', 'GroupModel',
	function($q, $resource, GroupModel) {
	var groupname = {};
	return {
		creategroup: function () {
			return $resource(OC.filePath('settings', 'ajax', 'creategroup.php'), {}, {
				method : 'POST'
			});
		},
		removegroup: function(group) {
			$resource(OC.filePath('settings', 'ajax', 'removegroup.php')).delete(
				{ groupname : group }
			);
		},
		getAllGroups: function() {
			var deferred = $q.defer();
			var Groups = $resource(OC.filePath('settings', 'ajax', 'grouplist.php'));
			Groups.get(function(response){
				GroupModel.addAll(response.result);
				deferred.resolve(response);
			});
			return deferred.promise;
		},
		getByGroupId: function(groupId) {
			return $resource(OC.filePath('settings', 'ajax', 'grouplist.php'), {}, {
				method: 'GET'
			});
		}
	}
}]);

/* User Serivce */

usersmanagement.factory('UserService',
	['$resource', 'Config', '$q', 'UserModel', '_InArrayQuery',
	function($resource, Config, $q, UserModel, _InArrayQuery) {
	return {
		createuser: function(user, userpass, ingroup) {
			return $resource(OC.filePath('settings', 'ajax', 'createuser.php')).save(
				{ username : user, password: userpass, groups : ingroup }
			);
		},
		removeuser: function(user) {
			return $resource(OC.filePath('settings', 'ajax', 'removeuser.php')).delete(
				{ username : user }
			);
		},
		updateName: function(userid,displayname) {
			return $resource(OC.filePath('settings', 'ajax', 'changedisplayname.php')).save(
				{ username : userid, displayName : displayname }
			);
		},
		updatePass: function(userid,password) {
			return $resource(OC.filePath('settings', 'ajax', 'changepassword.php')).save(
				{ userid : userid, password : password }
			);
		},
		updateField: function(userId, fields) {
			return $resource(Config.baseUrl + '/users/' + userId, fields, {
				method: 'POST'
			});
		},
		getAllUsers: function() {
			var deferred = $q.defer();
			var User = $resource(OC.filePath('settings', 'ajax', 'userlist.php'));
			User.get(function(response){
				UserModel.addAll(response.userdetails);
				deferred.resolve(response);
			});
			return deferred.promise;
		},
		getUsersInGroup: function (groupId) {
			var usersInGroupQuery = new _InArrayQuery('groups', groupId);
			return UserModel.get(usersInGroupQuery);
		},
		toggleGroup: function(userid,group) {
			return $resource(OC.filePath('settings', 'ajax', 'togglegroup.php')).save(
				{ username : userid, groupname : group }
			);
		},
	};
}]);

/* Quota Service */

usersmanagement.factory('QuotaService', function($resource) {
	return {
		setUserQuota: function(userid,userQuota) {
			return $resource(OC.filePath('settings','ajax', 'setquota.php')).save(
				{ username : userid, quota : userQuota }
			);
		},
		setDefaultQuota: function(defaultquota) {
			return $resource(OC.filePath('settings', 'ajax', 'setquota.php')).save(
				{ quota : defaultquota }
			);
		}
	}
});


usersmanagement.factory('GroupModel', ['_Model', function (_Model) {
	GroupModel = function() {
		_Model.call(this);
	};
	GroupModel.prototype = Object.create(_Model.prototype);
	return new GroupModel();
}]);

usersmanagement.factory('UserModel', ['_Model', function (_Model) {
	UserModel = function() {
		_Model.call(this);
	};
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


usersmanagement.factory('_InArrayQuery', ['_Query', function(_Query) {
	var _InArrayQuery = function(fieldName, filterFor) {
		_Query.call(this, 'inarrayquery', [fieldName, filterFor]);
		this.filterFor = filterFor;
		this.fieldName = fieldName;
	};

	_InArrayQuery.prototype = Object.create(_Query.prototype);

	_InArrayQuery.prototype.exec = function(data) {
		var filtered = [];

		for(var i=0; i<data.length; i++) {
			var current = data[i];

			for(var j=0; j<current[this.fieldName].length; j++) {
				var toBeCompared = current[this.fieldName][j];

				if(toBeCompared === this.filterFor) {
					filtered.push(current);
					break;
				}
			}
		}

 		return filtered;
	};

	return _InArrayQuery;
}]);

usersmanagement.factory('_Query', [function() {
		var Query;
		Query = (function() {

			function Query(_name, _args) {
				this._name = _name;
				this._args = _args != null ? _args : [];
			}

			Query.prototype.exec = function(data) {
				throw new Error('Not implemented');
			};

			Query.prototype.hashCode = function(filter) {
				var arg, hash, _i, _len, _ref;
				hash = this._name;
				_ref = this._args;
				for (_i = 0, _len = _ref.length; _i < _len; _i++) {
					arg = _ref[_i];
					if (angular.isString(arg)) {
						arg = arg.replace(/_/gi, '__');
					}
					hash += '_' + arg;
				}
				return hash;
			};

			return Query;

		})();
		return Query;
	}
]);

usersmanagement.controller('prioritygroupController',
	['$scope', '$routeParams', 'GroupService', 'UserService',
	function($scope, $routeParams, GroupService, UserService){
		
	}
]);

/* Controller for Creating Groups - Left Sidebar */

usersmanagement.controller('creategroupController',
	['$scope', '$http', 'GroupService',
	function($scope, $http, GroupService) {
		var newgroup = {};
		$scope.savegroup = function() {
			GroupService.creategroup().save({ groupname : $scope.newgroup });
			$scope.showgroupinput = false;
			$scope.showbutton = true;
			$scope.newgroup = '';
		}
	}
]);

/* Fetches the List of All Groups - Left Sidebar */

usersmanagement.controller('grouplistController',
	['$scope', '$resource', '$routeParams', 'GroupService', 'UserService', 'GroupModel',
	function($scope, $resource, $routeParams, GroupService, UserService, GroupModel) {
		$scope.loading = true;
		$scope.groups = GroupModel.getAll();
		
		$scope.routeParams = $routeParams;
		GroupService.getAllGroups().then(function(response) {
			$scope.loading = false;
			
			// Deletes the group.
			$scope.deletegroup = function(group) {
				$scope.groups.splice($scope.groups.indexOf(group), 1);
				GroupService.removegroup(group);
			}
		});
	}
]);

/* Asynchronously creates user */

usersmanagement.controller('addUserController',
	['$scope', '$http', 'UserService', 'GroupService',
	function($scope, $http, UserService, GroupService) {
		
		// Takes Out all groups for the Mutiselect dropdown
		$scope.allgroups = GroupService.getByGroupId().get();
		var newuser = $scope.newuser;
		var password = $scope.password;
		var selectedgroup = $scope.addGroup;
		$scope.saveuser = function(newuser,password,selectedgroup) {
			UserService.createuser(newuser,password,selectedgroup);
		}
	}
]);

usersmanagement.controller('setQuotaController',
	['$scope', 'QuotaService',
	function($scope, QuotaService) {
		$scope.quotavalues =[
								{show : '5 GB'},
								{show : '10 GB'},
								{show : '10 GB'},
								//{show : '10 GB', quotaval : 'Unlimited'},
								//{show : 'Custom', quotaval : 'Custom'}
							];
		// Default Quota
		$scope.selectdefaultQuota = function(defaultquota) {
			console.log(defaultquota.show);
			QuotaService.setDefaultQuota(defaultquota.show);
		}
	}
]);

/* Fetches the List of All Users and details on the Right Content */

usersmanagement.controller('userlistController',
	['$scope', 'UserService', 'GroupService', 'QuotaService','$routeParams',
	function($scope, UserService, GroupService, QuotaService, $routeParams) {
		$scope.loading = true;
		UserService.getAllUsers().then(function(response) {
			$scope.users = UserService.getUsersInGroup($routeParams.groupId);
			$scope.loading = false;
			$scope.userquotavalues = [
									{ show : '5 GB' },
									{ show : '10 GB' },
									{ show : '15 GB' },
									//{show : 'Unlimited'},
									//{show : 'Custom'}
			];			

			/* Takes Out all groups for the Chosen dropdown */
			$scope.allgroups = GroupService.getByGroupId().get();
			/* Updates Display name */
			$scope.updateDisplayName = function(userid,displayname) {
				UserService.updateName(userid,displayname);
			}
			
			/* Updates Password */
			$scope.updatePassword = function(userid,password) {
				UserService.updatePass(userid,password);
			}
			
			/* Updates User Quota */
			$scope.updateUserQuota = function(userid,userQuota) {
				console.log(userid);
				QuotaService.setUserQuota(userid,userQuota.show);
			}
			
			/* Deletes Users */
			$scope.deleteuser = function(user) {
				$scope.users.splice($scope.users.indexOf(user), 1);
				UserService.removeuser(user);
			};
			
			/* To Toggle User Groups */
			$scope.toggleGroup = function() {
				UserService.groupToggle({ username : userid });
			}
			
			/* To Add a User to a New Group */
			$scope.addGroup = function() {
				
			}
			
		});
	}
]);

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
			title: 'Add to Groups..',
			createCallback: scope.addGroup,
			onCheck: scope.toggleGroup,
			minWidth: 150,
			maxWidth: 200
        });
	}
}]);

/* The Jquery Multiselect Directive for Adding Groups. */

usersmanagement.directive('multiselectDropdown', [function() {
	return function(scope, element, attributes) {
		element = $(element[0]); // To use jQuery.
        element.multiSelect({
			title: 'Add to Groups..',
			oncheck: scope.addGroup,
			minWidth: 150,
			maxWidth: 200
        });
	}
}]);
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


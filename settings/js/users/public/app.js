
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


var usersmanagement = angular.module('usersmanagement', ['ngResource','localytics.directives']).config(['$httpProvider','$routeProvider',
	function($httpProvider,$routeProvider) {
		$httpProvider.defaults.headers.common['requesttoken'] = oc_requesttoken;
		$routeProvider
		.when('/group/:groupid', {
			controller : 'grouplistController',
			templateUrl : OC.filePath('settings', 'templates/users', 'part.userlist.php')
		})
		.otherwise({
			redirectTo : '/group/everyone'
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
		getByGroupId: function(groupId) {
			return $resource(OC.filePath('settings', 'ajax', 'grouplist.php'), {}, {
				method: 'GET'
			});
		}
	}
});

/* Create Group Service */

usersmanagement.factory('CreateGroupService', function() {
	var CreateGroup = {};
    CreateGroup.groupname = "";
    CreateGroup.addNewGroup = function(newgroup) {
        CreateGroup.groupname = newgroup;
    };
    return CreateGroup;
});

/* Create User Service */

usersmanagement.factory('CreateUserService', function() {
	var CreateUser = {};
    CreateUser.username = "";
	CreateUser.useringroups = "";
    CreateUser.addNewUser = function(user,groups) {
        CreateUser.username = user;
		CreateUser.useringroups = groups;
    };
    return CreateUser;
});

/* User Serivce */

usersmanagement.factory('UserService', function($resource) {
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
		}
	};
});

/* Quota Service */

usersmanagement.factory('QuotaService', function($resource) {
	return $resource(OC.filePath('settings','ajax', 'setQuota.php'), {}, {
		method : 'POST'
	});
});

/* Controller for Creating Groups - Left Sidebar */

usersmanagement.controller('creategroupController', ['$scope', '$http', 'GroupService', 'CreateGroupService',
	function($scope, $http, GroupService) {
		var newgroup = {};
		$scope.savegroup = function() {
			GroupService.creategroup().save({ groupname : $scope.newgroup });
			CreateGroupService.addNewGroup($scope.newgroup);		
			$scope.showgroupinput = false;
			$scope.showbutton = true;
			$scope.newgroup = '';
		}
	}
]);

/* Fetches the List of All Groups - Left Sidebar */

usersmanagement.controller('grouplistController', ['$scope', '$http', '$routeParams', 'GroupService', 'CreateGroupService', 'UserService',
	function($scope, $http, $routeParams, GroupService) {
		$scope.loading = true;
		$http.get(OC.filePath('settings', 'ajax', 'grouplist.php')).then(function(response){
			$scope.groupnames = response.data.result;
			var grouplist = $scope.groupnames;
			$scope.loading = false;
			
			$scope.groups = GroupService.getByGroupId($routeParams.groupid);
			
			//Ajaxifies the Group Addition
		    $scope.$watch(function() {
		        return CreateGroupService.groupname;
		    }, function(newGroupname, oldGroupname) {
				if (newGroupname !== oldGroupname) {
					getnewgroup(newGroupname);
				}
		    });
		    var getnewgroup = function(newname) {
		        grouplist.push({
					groupid : newname.replace(/\s/g, ''),
					name : newname,
					useringroup : [],
					isAdmin : false
		        });
		    }
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

usersmanagement.controller('addUserController', ['$scope', '$http', 'UserService', 'GroupService',
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

usersmanagement.controller('setQuotaController', ['$scope', 'QuotaService',
	function($scope, QuotaService) {
		// Shift Default Storage here.
	}
]);

/* Fetches the List of All Users and details on the Right Content */

usersmanagement.controller('userlistController', ['$scope', '$http', 'UserService', 'GroupService', '$routeParams',
	function($scope, $http, UserService, GroupService, $routeParams) {
		$scope.loading = true;
		$http.get(OC.filePath('settings', 'ajax', 'userlist.php')).then(function(response) {
			$scope.users = response.data.userdetails;
			$scope.loading = false;
			
			/* Takes Out all groups for the Chosen dropdown */
			$scope.allgroups = GroupService.getByGroupId().get();
			
			//Ajaxifies the User Addition
			
		    $scope.$watch(function() {
		        return {
					'user' : CreateUserService.username,
					'useringroups' : CreateUserService.useringroups
				};
		    }, function(newUsername, oldUsername) {
				if (newUsername !== oldUsername) {
					getnewuser(newUsername);
				}
		    });
			
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


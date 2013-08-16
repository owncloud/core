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

/* Group Service */

usersmanagement.factory('GroupService', 
	['$q', '$resource', function($q, $resource) {
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
			var deferred = $q.defer();
			$resource(OC.filePath('settings', 'ajax', 'grouplist.php'), {}, {
				method:'GET'
			}, function(response){
				deffered.resolve(response);
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

usersmanagement.factory('UserService', ['$resource', 'Config', '$q',
	function($resource, Config, $q) {
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
			var deferred = $q.defer();
			$resource(OC.filePath('settings', 'ajax', 'userlist.php'), {}, {
				method: 'GET'
			}, function(response){
				deffered.resolve(response);
			});
			return deferred.promise;
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


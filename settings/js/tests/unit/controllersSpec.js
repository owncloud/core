describe('Controllers', function () {

	var controller,
		rootScope,
		http,
		baseUrl = '/users',
		users = [
			{id: 1, groups: ['test', 'admin']},
			{id: 2, groups: ['test']},
			{id: 3, groups: ['admin']},
			{id: 4, groups: []}
		];


	beforeEach(module('usersmanagement'));

	beforeEach(module(function($provide) {
		$provide.value('Config', {
			baseUrl: baseUrl
		});
	}));

	beforeEach(inject(function($controller, $rootScope, $httpBackend){
		controller = $controller;
		rootScope = $rootScope;
		http = $httpBackend;
	}));


	it ('should set the filtered users list', inject(function(UserService, GroupService) {
		http.when('GET', 'settings/ajax/userlist.php').respond(200, {
			userdetails: users
		});

		var scope = rootScope.$new();
		var userListController = controller('userlistController', {
			'$scope': scope,
			'$routeParams': {
				groupId: 'admin'
			},
			'UserService': UserService,
			'GroupService': GroupService
		});

		expect(scope.loading).toBe(true);
		http.flush();

		expect(scope.loading).toBe(false);

		expect(scope.users).toContain(users[0]);
		expect(scope.users).not.toContain(users[1]);
		expect(scope.users).toContain(users[2]);
		expect(scope.users).not.toContain(users[3]);
	}));


	afterEach(function() {
		http.verifyNoOutstandingExpectation();
		http.verifyNoOutstandingRequest();
	});

});
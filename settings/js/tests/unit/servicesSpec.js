describe('Services', function () {

	beforeEach(module('usersmanagement'));

	it ('should filter arrays', inject(function(_InArrayQuery) {
		var users = [
			{id: 1, groups: ['test', 'admin']},
			{id: 2, groups: ['test']},
			{id: 3, groups: ['admin']},
			{id: 4, groups: []}
		];
		var query = new _InArrayQuery('groups', 'admin');

		var result = query.exec(users);

		expect(result).toContain(users[0]);
		expect(result).not.toContain(users[1]);
		expect(result).toContain(users[2]);
		expect(result).not.toContain(users[3]);
	}));

});
@api
Feature: delete users
As an admin
I want to be able to delete users
So that I can remove user from ownCloud

	Scenario: Delete a user
		Given user "brand-new-user" has been created
		When user "admin" sends HTTP method "DELETE" to API endpoint "/cloud/users/brand-new-user"
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And user "brand-new-user" should not exist
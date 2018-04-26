@api
Feature: remove subadmin
As an admin
I want to be able to remove subadmin rights to a user from a group
So that I cam manage administrative access rights for groups

	Background:
		Given using API version "2"

		Scenario: Removing subadmin from a group
		Given user "brand-new-user" has been created
		And group "new-group" has been created
		And user "brand-new-user" has been made a subadmin of group "new-group"
		When user "admin" sends HTTP method "DELETE" to API endpoint "/cloud/users/brand-new-user/subadmins" with body
			| groupid | new-group |
		Then the OCS status code should be "200"
		And the HTTP status code should be "200"
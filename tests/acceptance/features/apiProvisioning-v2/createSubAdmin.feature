@api
Feature: create a subadmin
As an admin
I want to be able to make a user the subadmin of a group
So that I can give administrative privilege of a group to a user

	Background:
		Given using API version "2"

	Scenario: create a subadmin
		Given user "brand-new-user" has been created
		And group "new-group" has been created
		When user "admin" sends HTTP method "POST" to API endpoint "/cloud/users/brand-new-user/subadmins" with body
			| groupid | new-group |
		Then the OCS status code should be "200"
		And the HTTP status code should be "200"

	Scenario: create a subadmin using a user which does not exist
		Given user "not-user" has been deleted
		And group "new-group" has been created
		When user "admin" sends HTTP method "POST" to API endpoint "/cloud/users/not-user/subadmins" with body
			| groupid | new-group |
		Then the OCS status code should be "400"
		And the HTTP status code should be "400"

	Scenario: create a subadmin using a group which does not exist
		Given user "brand-new-user" has been created
		And group "not-group" has been deleted
		When user "admin" sends HTTP method "POST" to API endpoint "/cloud/users/brand-new-user/subadmins" with body
			| groupid | not-group |
		Then the OCS status code should be "400"
		And the HTTP status code should be "400"

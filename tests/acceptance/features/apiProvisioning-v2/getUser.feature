@api
Feature: get user
As an admin 
I want to be able to get user
So that I can get information about user
	Background:
		Given using OCS API version "2"

	@smokeTest
	Scenario: admin gets an existing user
		Given user "brand-new-user" has been created
		When user "admin" sends HTTP method "GET" to OCS API endpoint "/cloud/users/brand-new-user"
		Then the OCS status code should be "200"
		And the HTTP status code should be "200"
		And the display name returned by the API should be "brand-new-user"

	Scenario: admin tries to get a not existing user
		When user "admin" sends HTTP method "GET" to OCS API endpoint "/cloud/users/test"
		Then the OCS status code should be "404"
		And the HTTP status code should be "404"
		And the API should not return any data

	@smokeTest
	Scenario: subadmin gets information of a user in his group
		Given user "subadmin" has been created
		And user "newuser" has been created
		And group "newgroup" has been created
		And user "newuser" has been added to group "newgroup"
		And user "subadmin" has been made a subadmin of group "newgroup"
		When user "subadmin" sends HTTP method "GET" to OCS API endpoint "/cloud/users/newuser"
		Then the OCS status code should be "200"
		And the HTTP status code should be "200"
		And the display name returned by the API should be "newuser"

	@skip @issue-31276
	Scenario: subadmin tries to get information of a user not in his group
		Given user "subadmin" has been created
		And user "newuser" has been created
		And group "newgroup" has been created
		And user "subadmin" has been made a subadmin of group "newgroup"
		When user "subadmin" sends HTTP method "GET" to OCS API endpoint "/cloud/users/newuser"
		Then the OCS status code should be "401"
		And the HTTP status code should be "401"
		And the API should not return any data

	@skip @issue-31276
	Scenario: normal user tries to get information of another user
		Given user "newuser" has been created
		And user "anotheruser" has been created
		When user "anotheruser" sends HTTP method "GET" to OCS API endpoint "/cloud/users/newuser"
		Then the OCS status code should be "401"
		And the HTTP status code should be "401"
		And the API should not return any data

	@smokeTest
	Scenario: normal user gets his own information
		Given user "newuser" has been created
		When user "newuser" sends HTTP method "GET" to OCS API endpoint "/cloud/users/newuser"
		Then the OCS status code should be "200"
		And the HTTP status code should be "200"
		And the display name returned by the API should be "newuser"
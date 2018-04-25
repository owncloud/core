@api
Feature: get subadmins
As an admin
I want to be able to get the list of subadmins of a group
So that I can manage subadmins of a group

	Background:
		Given using API version "2"

	Scenario: Getting subadmin users of a group
		Given user "brand-new-user" has been created
		And group "new-group" has been created
		And user "brand-new-user" has been made a subadmin of group "new-group"
		When user "admin" sends HTTP method "GET" to API endpoint "/cloud/groups/new-group/subadmins"
		Then the subadmin users returned by the API should be
			| brand-new-user |
		And the OCS status code should be "200"
		And the HTTP status code should be "200"

	Scenario: Getting subadmin users of a group which doesn't exist
		Given user "brand-new-user" has been created
		And group "not-group" has been deleted
		When user "admin" sends HTTP method "GET" to API endpoint "/cloud/groups/not-group/subadmins"
		Then the OCS status code should be "400"
		And the HTTP status code should be "400"
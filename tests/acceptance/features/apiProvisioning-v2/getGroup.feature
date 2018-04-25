@api
Feature: get group
As an admin
I want to be able to get group details
So that I can know which users are in a group

	Background:
		Given using API version "2"

	Scenario: getting users in a group
		Given user "brand-new-user" has been created
		And user "123" has been created
		And group "new-group" has been created
		And user "brand-new-user" has been added to group "new-group"
		And user "123" has been added to group "new-group"
		When user "admin" sends HTTP method "GET" to API endpoint "/cloud/groups/new-group"
		Then the OCS status code should be "200"
		And the HTTP status code should be "200"
		And the users returned by the API should be
			| brand-new-user |
			| 123            |

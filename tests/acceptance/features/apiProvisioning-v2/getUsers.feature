@api
Feature: get users
As an admin
I want to be able to list the users that exist
So that I can see who has access to ownCloud

	Background:
		Given using API version "2"

	Scenario: Getting all users
		Given user "brand-new-user" has been created
		And user "admin" has been created
		When user "admin" sends HTTP method "GET" to API endpoint "/cloud/users"
		Then the OCS status code should be "200"
		And the HTTP status code should be "200"
		And the users returned by the API should be
			| brand-new-user |
			| admin          |

	Scenario: get users using a subadmin
		Given user "brand-new-user" has been created
		And group "new-group" has been created
		And user "brand-new-user" has been added to group "new-group"
		And user "brand-new-user" has been made a subadmin of group "new-group"
		When user "brand-new-user" sends HTTP method "GET" to API endpoint "/cloud/users"
		Then the users returned by the API should be
			| brand-new-user |
		And the OCS status code should be "200"
		And the HTTP status code should be "200"
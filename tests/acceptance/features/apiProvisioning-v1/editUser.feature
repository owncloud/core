@api
Feature: edit users
As an admin
I want to be able to edit a user
So that I can change user information

	Background:
		Given using OCS API version "1"

	@smokeTest
	Scenario: Edit a user
		Given user "brand-new-user" has been created
		When user "admin" sends HTTP method "PUT" to OCS API endpoint "/cloud/users/brand-new-user" with body
			| key   | quota                    |
			| value | 12MB                     |
			| key   | email                    |
			| value | brand-new-user@gmail.com |
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And user "brand-new-user" should exist

	Scenario: Override existing user email
		Given user "brand-new-user" has been created
		And user "admin" has sent HTTP method "PUT" to OCS API endpoint "/cloud/users/brand-new-user" with body
			| key   | email                    |
			| value | brand-new-user@gmail.com |
		And the OCS status code should be "100"
		And the HTTP status code should be "200"
		And user "admin" has sent HTTP method "PUT" to OCS API endpoint "/cloud/users/brand-new-user" with body
			| key   | email                      |
			| value | brand-new-user@example.com |
		And the OCS status code should be "100"
		And the HTTP status code should be "200"
		When user "admin" sends HTTP method "GET" to OCS API endpoint "/cloud/users/brand-new-user"
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And the user attributes returned by the API should include
			| email | brand-new-user@example.com |

	@smokeTest
	Scenario: subadmin should be able to edit the user information in his group
		Given user "subadmin" has been created
		And user "brand-new-user" has been created
		And group "new-group" has been created
		And user "brand-new-user" has been added to group "new-group"
		And user "subadmin" has been made a subadmin of group "new-group"
		And user "subadmin" has sent HTTP method "PUT" to OCS API endpoint "/cloud/users/brand-new-user" with body
			| key   | quota                      |
			| value | 12MB                       |
		And user "subadmin" has sent HTTP method "PUT" to OCS API endpoint "/cloud/users/brand-new-user" with body
			| key   | email                      |
			| value | brand-new-user@example.com |
		When user "subadmin" sends HTTP method "GET" to OCS API endpoint "/cloud/users/brand-new-user"
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And the user attributes returned by the API should include
			| quota definition | 12 MB           |
			| email | brand-new-user@example.com |

	Scenario: normal user should not be able to change their quota
		Given user "brand-new-user" has been created
		When user "brand-new-user" sends HTTP method "PUT" to OCS API endpoint "/cloud/users/brand-new-user" with body
			| key   | quota                      |
			| value | 12MB                       |
		Then the OCS status code should be "997"
		And the HTTP status code should be "401"
		And the attributes of user "brand-new-user" returned by the API should include
			| quota definition | default |
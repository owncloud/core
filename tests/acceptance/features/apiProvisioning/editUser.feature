@api
Feature: edit users
As an admin
I want to be able to edit a user
So that I can change user information

	Background:
		Given using API version "1"

	Scenario: Edit a user
		Given user "brand-new-user" has been created
		When user "admin" sends HTTP method "PUT" to API endpoint "/cloud/users/brand-new-user" with body
			| key   | quota                    |
			| value | 12MB                     |
			| key   | email                    |
			| value | brand-new-user@gmail.com |
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And user "brand-new-user" should exist

	Scenario: Override existing user email
		Given user "brand-new-user" has been created
		And user "admin" has sent HTTP method "PUT" to API endpoint "/cloud/users/brand-new-user" with body
			| key   | email                    |
			| value | brand-new-user@gmail.com |
		And the OCS status code should be "100"
		And the HTTP status code should be "200"
		And user "admin" has sent HTTP method "PUT" to API endpoint "/cloud/users/brand-new-user" with body
			| key   | email                      |
			| value | brand-new-user@example.com |
		And the OCS status code should be "100"
		And the HTTP status code should be "200"
		When user "admin" sends HTTP method "GET" to API endpoint "/cloud/users/brand-new-user"
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And the user attributes returned by the API should include
			| email | brand-new-user@example.com |
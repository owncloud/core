@api
Feature: get user
As an admin 
I want to be able to get user
So that I can get information about user
	Background:
		Given using API version "1"

	Scenario: Get an existing user
		Given user "brand-new-user" has been created
		When user "admin" sends HTTP method "GET" to API endpoint "/cloud/users/brand-new-user"
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"

	Scenario: Getting a not existing user
		When user "admin" sends HTTP method "GET" to API endpoint "/cloud/users/test"
		Then the OCS status code should be "998"
		And the HTTP status code should be "200"
@api
Feature: add user
As an admin
I want to be able to add users
So that I can give people controlled individual access to resources on the ownCloud server

	Background:
		Given using API version "1"

	Scenario: Create a user
		Given user "brand-new-user" has been deleted
		When the administrator sends a user creation request for user "brand-new-user" password "456firstpwd" using the API
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And user "brand-new-user" should exist

	Scenario: Create an existing user
		Given user "brand-new-user" has been created
		When the administrator sends a user creation request for user "brand-new-user" password "456newpwd" using the API
		Then the OCS status code should be "102"
		And the HTTP status code should be "200"

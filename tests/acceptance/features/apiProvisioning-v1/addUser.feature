@api
Feature: add user
As an admin
I want to be able to add users
So that I can give people controlled individual access to resources on the ownCloud server

	Background:
		Given using OCS API version "1"

	@smokeTest
	Scenario: admin creates a user
		Given user "brand-new-user" has been deleted
		When the administrator sends a user creation request for user "brand-new-user" password "456firstpwd" using the provisioning API
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And user "brand-new-user" should exist

	Scenario: admin tries to create an existing user
		Given user "brand-new-user" has been created
		When the administrator sends a user creation request for user "brand-new-user" password "456newpwd" using the provisioning API
		Then the OCS status code should be "102"
		And the HTTP status code should be "200"
		And the API should not return any data

	Scenario: admin tries to create an existing disabled user
		Given user "brand-new-user" has been created
		And user "brand-new-user" has been disabled
		When the administrator sends a user creation request for user "brand-new-user" password "456newpwd" using the provisioning API
		Then the OCS status code should be "102"
		And the HTTP status code should be "200"
		And the API should not return any data

	Scenario: Admin creates a new user and adds him directly to a group
		Given group "newgroup" has been created
		When the administrator sends a user creation request for user "newuser" password "456firstpwd" group "newgroup" using the provisioning API
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And user "newuser" should belong to group "newgroup"
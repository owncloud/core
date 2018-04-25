@api
Feature: add groups
As an admin
I want to be able to add groups
So that I can more easily manage access to resources by groups rather than individual users

	Scenario: Create a group
		Given group "new-group" has been deleted
		When the administrator sends a group creation request for group "new-group" using the API
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And group "new-group" should exist

	Scenario: Create a group with special characters
		Given group "España" has been deleted
		When the administrator sends a group creation request for group "España" using the API
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And group "España" should exist

	Scenario: Create a group named "0"
		Given group "0" has been deleted
		When the administrator sends a group creation request for group "0" using the API
		Then the OCS status code should be "100"
		And the HTTP status code should be "200"
		And group "0" should exist


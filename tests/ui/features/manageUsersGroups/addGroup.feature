@insulated @disablePreviews
Feature: Add group
As an admin
I would like to add a group
So that I can share documents with other users

	Background: 
		Given I am logged in as admin
		And I am on the users page

	Scenario Outline: Add group
		When I add a group with the name <groupname>
		Then The group name <groupname> should be listed
		Examples:
		|groupname|
		|"localuser" |

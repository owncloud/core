@webUI @insulated @disablePreviews
Feature: Add group
As an admin
I would like to add a group
So that I can share documents with other users

	Background: 
		Given user admin has logged in using the webUI
		And the administrator has browsed to the users page

	Scenario Outline: Add group
		When the administrator adds group <groupname> using the webUI
		Then the group name <groupname> should be listed on the webUI
		Examples:
		|groupname|
		|"localuser" |

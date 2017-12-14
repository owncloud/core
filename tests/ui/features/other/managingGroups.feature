Feature: manage groups
As an admin
I want to manage groups
So that access to resources can be controlled more effectively

	Background:
		Given a regular user exists but is not initialized
		And I am logged in as admin
		And I am on the users page

	@skipOnOcV10.0.3
	Scenario: delete group called "0" and "false"
		And these groups exist:
		|groupname     |
		|do-not-delete |
		|0             |
		|false         |
		|do-not-delete2|
		And I am on the users page
		When I delete these groups:
		|groupname|
		|0        |
		|false    |
		And the users page is reloaded
		Then these groups should be listed:
		|groupname     |
		|do-not-delete |
		|do-not-delete2|
		But these groups should not be listed:
		|groupname|
		|0        |
		|false    |
		And these groups should exist:
		|groupname     |
		|do-not-delete |
		|do-not-delete2|
		But these groups should not exist:
		|groupname|
		|0        |
		|false    |
	
	Scenario: delete groups with problematic names
		And these groups exist:
		|groupname     |
		|do-not-delete |
		|grp1          |
		|quotes'       |
		|quotes"       |
		|do-not-delete2|
		And I am on the users page
		When I delete these groups:
		|groupname|
		|grp1     |
		|quotes'  |
		|quotes"  |
		And the users page is reloaded
		Then these groups should be listed:
		|groupname     |
		|do-not-delete |
		|do-not-delete2|
		But these groups should not be listed:
		|groupname|
		|grp1     |
		|quotes'  |
		|quotes"  |
		And these groups should exist:
		|groupname     |
		|do-not-delete |
		|do-not-delete2|
		But these groups should not exist:
		|groupname|
		|grp1     |
		|quotes'  |
		|quotes"  |

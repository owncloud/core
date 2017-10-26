Features: manageGroups
As an admin
I want to manage groups
So that access to resources can be controlled more effectively

	Background:
		Given a regular user exists
		And I am logged in as admin
		And I am on the users page

	Scenario: delete groups
		And these groups exist:
		|groupname     |
		|do-not-delete |
		|grp1          |
		|0             |
		|false         |
		|quotes'       |
		|quotes"       |
		|do-not-delete2|
		And I am on the users page
		When I delete these groups:
		|groupname|
		|grp1     |
		|0        |
		|false    |
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
		|0        |
		|false    |
		|quotes'  |
		|quotes"  |
		And these groups should exist:
		|groupname     |
		|do-not-delete |
		|do-not-delete2|
		But these groups should not exist:
		|groupname|
		|grp1     |
		|0        |
		|false    |
		|quotes'  |
		|quotes"  |
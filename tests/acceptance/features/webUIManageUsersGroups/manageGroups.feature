@webUI @insulated @disablePreviews
Feature: manage groups
As an admin
I want to manage groups
So that access to resources can be controlled more effectively

	Background:
		Given user admin has logged in using the webUI
		And the administrator has browsed to the users page

	@skipOnOcV10.0.3
	Scenario: delete group called "0" and "false"
		Given these groups have been created:
		|groupname     |
		|do-not-delete |
		|0             |
		|false         |
		|do-not-delete2|
		And the administrator has browsed to the users page
		When the administrator deletes these groups using the webUI:
		|groupname|
		|0        |
		|false    |
		And the administrator reloads the users page
		Then these groups should be listed on the webUI:
		|groupname     |
		|do-not-delete |
		|do-not-delete2|
		But these groups should not be listed on the webUI:
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

	@skipOnOcV10.0.3 @skipOnOcV10.0.4 @skipOnOcV10.0.5
	Scenario: delete groups with special characters that appear in URLs
		Given these groups have been created:
		|groupname     |
		|do-not-delete |
		|a/slash       |
		|per%cent      |
		|hash#char     |
		|q?mark        |
		|do-not-delete2|
		And the administrator has browsed to the users page
		When the administrator deletes these groups using the webUI:
		|groupname     |
		|a/slash       |
		|per%cent      |
		|hash#char     |
		|q?mark        |
		And the administrator reloads the users page
		Then these groups should be listed on the webUI:
		|groupname     |
		|do-not-delete |
		|do-not-delete2|
		But these groups should not be listed on the webUI:
		|groupname     |
		|a/slash       |
		|per%cent      |
		|hash#char     |
		|q?mark        |
		And these groups should exist:
		|groupname     |
		|do-not-delete |
		|do-not-delete2|
		But these groups should not exist:
		|groupname     |
		|a/slash       |
		|per%cent      |
		|hash#char     |
		|q?mark        |

	Scenario: delete groups with problematic names
		Given these groups have been created:
		|groupname     |
		|do-not-delete |
		|grp1          |
		|quotes'       |
		|quotes"       |
		|do-not-delete2|
		And the administrator has browsed to the users page
		When the administrator deletes these groups using the webUI:
		|groupname|
		|grp1     |
		|quotes'  |
		|quotes"  |
		And the administrator reloads the users page
		Then these groups should be listed on the webUI:
		|groupname     |
		|do-not-delete |
		|do-not-delete2|
		But these groups should not be listed on the webUI:
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

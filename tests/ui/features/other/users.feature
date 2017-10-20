Feature: users

	Background:
		Given a regular user exists
		And I am logged in as admin
		And I am on the users page

	Scenario Outline: change quota to a valid value
		And quota of user "%regularuser%" is set to "<start_quota>"
		When quota of user "%regularuser%" is changed to "<wished_quota>"
		And the users page is reloaded
		Then quota of user "%regularuser%" should be set to "<expected_quota>"

		Examples:
		|start_quota|wished_quota|expected_quota|
		|Unlimited  |5 GB        |5 GB          |
		|1 GB       |5 GB        |5 GB          |
		|5 GB       |Unlimited   |Unlimited     |
		|1 GB       |Unlimited   |Unlimited     |
		|Unlimited  |5.5 GB      |5.5 GB        |
		|Unlimited  |5B          |5 B           |
		|Unlimited  |55kB        |55 KB         |
		|Unlimited  |45Kb        |45 KB         |
		|Unlimited  |0 Kb        |0 B           |

	Scenario Outline: change quota to an invalid value
		When quota of user "%regularuser%" is changed to "<wished_quota>"
		Then a notification should be displayed with the text 'Invalid quota value "<wished_quota>"'
		Then quota of user "%regularuser%" should be set to "Default"

		Examples:
		|wished_quota|
		|stupidtext  |
		|34,54GB     |
		|30/40GB     |
		|30/40       |
		|3+56 B      |
		|-1 B        |

	Scenario: create simple user
		When I create a user with the name "guiusr1" and the password "pwd"
		And I logout
		And I login with username "guiusr1" and password "pwd"
		Then I should be redirected to a page with the title "Files - ownCloud"

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
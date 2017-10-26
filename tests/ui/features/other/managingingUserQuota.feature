@insulated
Feature: manageUserQuota
As an admin
I want to manage user quota
So that users only take up a certain amount of space

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
		And quota of user "%regularuser%" should be set to "Default"

		Examples:
		|wished_quota|
		|stupidtext  |
		|34,54GB     |
		|30/40GB     |
		|30/40       |
		|3+56 B      |
		|-1 B        |
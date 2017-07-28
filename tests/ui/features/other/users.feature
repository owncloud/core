Feature: users

	Scenario Outline: change quota to a valid value
		Given I am logged in as admin
		And quota of user "admin" is set to "<start_quota>"
		When quota of user "admin" is changed to "<wished_quota>"
		And the page is reloaded
		Then quota of user "admin" should be set to "<expected_quota>"

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

	Scenario Outline: change quota to an invalid value
		Given I am logged in as admin
		When quota of user "admin" is changed to "<wished_quota>"
		Then a notification should be displayed with the text 'Invalid quota value "<wished_quota>"'
		Then quota of user "admin" should be set to "Default"

		Examples:
		|wished_quota|
		|stupidtext  |
		|34,54GB     |
		|30/40GB     |
		|30/40       |
		|3+56 B      |

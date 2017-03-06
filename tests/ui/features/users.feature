Feature: users

	@AdminLogin
	Scenario Outline: change quota to a value from dropdown list
		Given quota of user "admin" is set to "<start_quota>"
		When quota of user "admin" is changed to "<wished_quota>"
		And page is reloaded
		Then quota of user "admin" should be set to "<wished_quota>"
	
		Examples:
		|start_quota|wished_quota|
		|Unlimited  |5 GB        |
		|Unlimited  |1 GB        |
		|1 GB       |5 GB        |
		|5 GB       |Unlimited   |
		|1 GB       |Unlimited   |
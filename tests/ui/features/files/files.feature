Feature: files

	Background:
		Given a regular user exists
		And I am logged in as a regular user
		And I am on the files page

	@skipOnIE
	Scenario: scroll fileactionsmenu into view
		And the list of files/folders does not fit in one browser page
		Then the filesactionmenu should be completely visible after clicking on it

	Scenario Outline: Create a folder using special characters
		When I create a folder with the name <folder_name>
		Then the folder <folder_name> should be listed
		And the page is reloaded
		Then the folder <folder_name> should be listed
		Examples:
		|folder_name    |
		|'सिमप्ले फोल्देर $%#?&@'|
		|'"somequotes1"'|
		|"'somequotes2'"|
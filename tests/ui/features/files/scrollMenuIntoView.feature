Feature: scroll menu of actions that can be done on a file into view
As a user
I want to see the whole menu of actions that can be done on a file
So that I have access to the whole menu of actions that can be done on a file

	Background:
		Given a regular user exists
		And I am logged in as a regular user
		And I am on the files page

	@skipOnINTERNETEXPLORER
	Scenario: scroll fileactionsmenu into view
		And the list of files/folders does not fit in one browser page
		Then the filesactionmenu should be completely visible after clicking on it
Feature: files

	@skipOnIE
	Scenario: scroll fileactionsmenu into view
		Given a regular user exists
		And I am logged in as a regular user
		And I am on the files page
		And the list of files/folders does not fit in one browser page
		Then the filesactionmenu should be completely visible after clicking on it

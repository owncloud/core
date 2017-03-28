Feature: files

	@AdminLogin
	Scenario: scroll fileactionsmenu into view
		Given I am on the files page
		And the list of files/folders does not fit in one browser page
		Then The filesactionmenu should be completely visible after clicking on it

@webUI @insulated @disablePreviews
Feature: personal general settings
As a user
I want to change the ownCloud User Interface to my preferred settings
So that I can personalise the User Interface

	Scenario: change language
		Given a regular user has been created
		And the regular user has logged in using the webUI
		And the user has browsed to the personal general settings page
		When the user changes the language to "Русский" using the webUI
		Then the user should be redirected to a webUI page with the title "Настройки - ownCloud"
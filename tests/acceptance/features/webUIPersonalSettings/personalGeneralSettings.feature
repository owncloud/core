@webUI @insulated @disablePreviews
Feature: personal general settings
As a user
I want to change the ownCloud User Interface to my preferred settings
So that I can personalise the User Interface

	@smokeTest
	Scenario: change language
		Given these users have been created:
			|username|password|displayname|email       |
			|user1   |1234    |User One   |u1@oc.com.np|
		And the user has browsed to the login page
		And the user has logged in with username "user1" and password "1234" using the webUI
		And the user has browsed to the personal general settings page
		When the user changes the language to "Русский" using the webUI
		Then the user should be redirected to a webUI page with the title "Настройки - ownCloud"
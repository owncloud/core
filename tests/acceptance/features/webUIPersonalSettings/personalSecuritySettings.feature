@webUI @insulated @disablePreviews
Feature: personal security settings
As a user
I want to be able to manage security settings for my account
So that I can enable, allow and deny access to and from other storage systems or resources

	Scenario: create new app password
		Given user admin has logged in using the webUI
		And the user has browsed to the personal security settings page
		When the user creates a new App password using the webUI
		Then the new app should be listed in the App passwords list on the webUI
		And the user display name and the app password should be displayed on the webUI
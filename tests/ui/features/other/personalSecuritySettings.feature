@insulated
Feature: personal security settings
As a user
I want to be able to manage security settings for my account
So that I can enable, allow and deny access to and from other storage systems or resources

	Scenario: create new app password
		Given I am logged in as admin
		And I am on the personal security settings page
		When I create a new App password
		Then the new app should be listed in the App passwords list
		And my username and the app password should be displayed
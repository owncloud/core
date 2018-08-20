@webUI @insulated @disablePreviews
Feature: personal security settings
As a user
I want to be able to manage security settings for my account
So that I can enable, allow and deny access to and from other storage systems or resources

	Background:
			Given these users have been created but not initialized:
			|username|password|displayname|email       |
			|user1   |1234    |User One   |u1@oc.com.np|
			And the user has browsed to the login page
			And the user has logged in with username "user1" and password "1234" using the webUI
			And the user has browsed to the personal security settings page

	@smokeTest
	Scenario: login with new app password
		When the user creates a new App password using the webUI
		And the user re-logs in with username "user1" and generated app password using the webUI
		Then the user should be redirected to a webUI page with the title "Files - ownCloud"

	@smokeTest
	Scenario: delete the app password 
		When the user creates a new App password using the webUI
		And the user deletes the app password
		And the user re-logs in with username "user1" and deleted app password using the webUI
		Then the user should be redirected to a webUI page with the title "ownCloud"

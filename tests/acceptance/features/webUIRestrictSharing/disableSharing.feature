@webUI @insulated @disablePreviews
Feature: disable sharing
As an admin
I want to be able to disable the sharing function
So that users cannot share files

	Background:
		Given these users have been created:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|
		
	@TestAlsoOnExternalUserBackend
	@smokeTest
	Scenario: Users tries to share via WebUI when Sharing is disabled
		Given the setting "Allow apps to use the Share API" in the section "Sharing" has been disabled
		And the user has browsed to the login page
		When the user logs in with username "user1" and password "1234" using the webUI
		Then it should not be possible to share the folder "simple-folder" using the webUI

@insulated
Feature: disable sharing
As an admin
I want to be able to disable the sharing function
So that users cannot share files

	Background:
		Given these users exist:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|
		
	@TestAlsoOnExternalUserBackend
	Scenario: Users tries to share via WebUI when Sharing is disabled
		When the setting "Allow apps to use the Share API" in the section "Sharing" is disabled
		And I am on the login page
		And I login with username "user1" and password "1234"
		Then it should not be possible to share the folder "simple-folder"

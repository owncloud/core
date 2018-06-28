@webUI @insulated @disablePreviews
Feature: delete users
	As an admin
	I want to delete users
	So that I can remove users

	Background:
		Given these users have been created but not initialized:
			|username|password|displayname|email       |
			|user1   |1234    |User One   |u1@oc.com.np|
			|user2   |1234    |User Two   |u2@oc.com.np|
		And user admin has logged in using the webUI
		And the administrator has browsed to the users page

	Scenario: use the webUI to delete a simple user
		When the administrator deletes the user with the username "user1" using the webUI
		And the deleted user "user1" tries to login using the password "1234" using the webUI
		Then the user should be redirected to a webUI page with the title "ownCloud"
		When the user has browsed to the login page
		And the user logs in with username "user2" and password "1234" using the webUI
		Then the user should be redirected to a webUI page with the title "Files - ownCloud"

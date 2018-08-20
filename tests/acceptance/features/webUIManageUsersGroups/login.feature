@webUI @insulated @disablePreviews
Feature: login users
	As a user
	I want to be able to log into my account
	So that I have access to my files

	As an admin
	I want only authorised users to log in
	So that unauthorised access is impossible

	@TestAlsoOnExternalUserBackend
	Scenario: simple user login
		Given these users have been created but not initialized:
			|username|password|displayname|email       |
			|user1   |1234    |User One   |u1@oc.com.np|
		And the user has browsed to the login page
		When the user logs in with username "user1" and password "1234" using the webUI
		Then the user should be redirected to a webUI page with the title "Files - ownCloud"

	@smokeTest
	Scenario: admin login
		Given the user has browsed to the login page
		When the user logs in with username "admin" and password "admin" using the webUI
		Then the user should be redirected to a webUI page with the title "Files - ownCloud"

	@smokeTest
	Scenario: admin login with invalid password
		Given the user has browsed to the login page
		When the user logs in with username "admin" and invalid password "invalidpassword" using the webUI
		Then the user should be redirected to a webUI page with the title "ownCloud"

	Scenario: access the personal general settings page when not logged in
		When the user attempts to browse to the personal general settings page
		Then the user should be redirected to a webUI page with the title "ownCloud"
		When the user logs in with username "admin" and password "admin" using the webUI after a redirect from the "personal general settings" page
		Then the user should be redirected to a webUI page with the title "Settings - ownCloud"

	Scenario: access the personal general settings page when not logged in using incorrect then correct password
		When the user attempts to browse to the personal general settings page
		Then the user should be redirected to a webUI page with the title "ownCloud"
		When the user logs in with username "admin" and invalid password "qwerty" using the webUI
		Then the user should be redirected to a webUI page with the title "ownCloud"
		When the user logs in with username "admin" and password "admin" using the webUI after a redirect from the "personal general settings" page
		Then the user should be redirected to a webUI page with the title "Settings - ownCloud"

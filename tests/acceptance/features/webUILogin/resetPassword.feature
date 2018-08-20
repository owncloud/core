@webUI @insulated @disablePreviews @mailhog

Feature: reset the password
As a user
I want to reset my password
So that I can login to my account again after forgetting the password

	Background:
		Given these users have been created but not initialized:
			|username|password|displayname|email       |
			|user1   |1234    |User One   |u1@oc.com.np|
		And the user has browsed to the login page
		And the user logs in with username "user1" and invalid password "invalidpassword" using the webUI

	@smokeTest
	Scenario: send password reset email
		When the user requests the password reset link using the webUI
		Then a message with this text should be displayed on the webUI:
			"""
			The link to reset your password has been sent to your email. If you do not receive it within a reasonable amount of time, check your spam/junk folders. If it is not there ask your local administrator.
			"""
		And the email address "u1@oc.com.np" should have received an email with the body containing
			"""
			Use the following link to reset your password: <a href=
			"""

	@skipOnEncryption
	@smokeTest
	Scenario: reset password for the ordinary (no encryption) case
		When the user requests the password reset link using the webUI
		And the user follows the password reset link from email address "u1@oc.com.np"
		Then the user should be redirected to a webUI page with the title "ownCloud"
		When the user resets the password to "newpassword" using the webUI
		Then the email address "u1@oc.com.np" should have received an email with the body containing
			"""
			Password changed successfully
			"""
		When the user logs in with username "user1" and password "newpassword" using the webUI
		Then the user should be redirected to a webUI page with the title "Files - ownCloud"

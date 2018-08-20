@webUI @insulated @disablePreviews @app-required @notifications-app-required
Feature: Display notifications when receiving a share and follow embedded links
As a user
I want to use the notification header as a link
So that I will be redirected to the most appropriate screen

	Background:
		Given the app "notifications" has been enabled
		And these users have been created:
			|username|password|displayname|email       |
			|user1   |1234    |User One   |u1@oc.com.np|
			|user2   |1234    |User Two   |u2@oc.com.np|
		And the user has browsed to the login page
		And the user has logged in with username "user2" and password "1234" using the webUI

	@smokeTest
	Scenario: notification link redirection in case a share is pending
		Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
		And user "user1" has shared folder "/simple-folder" with user "user2"
		When the user follows the link of the first notification on the webUI
		Then the user should be redirected to a webUI page with the title "Shared with you - ownCloud"
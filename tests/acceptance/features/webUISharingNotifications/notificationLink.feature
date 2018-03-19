@webUI @insulated @disablePreviews
Feature: Sharing files and folders with internal users
As a user
I want to use the notification header as a link
So that I will be redirected to the most appropriate screen

	Background:
		Given these users have been created:
			|username|password|displayname|email       |
			|user1   |1234    |User One   |u1@oc.com.np|
			|user2   |1234    |User Two   |u2@oc.com.np|
		And the user has browsed to the login page
		And the user has logged in with username "user2" and password "1234" using the webUI

	Scenario: notification link redirection in case a share is declined
		Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
		And user "user1" has shared folder "/simple-folder" with user "user2"
		And user "user2" has declined the share "/simple-folder" offered by user "user1"
		When the user follows the link of the first notification on the webUI
		Then the user should be redirected to a webUI page with the title "Shared with you - ownCloud"

	Scenario: notification link redirection in case a share is accepted
		Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
		And user "user1" has shared folder "/simple-folder" with user "user2"
		And user "user2" has accepted the share "/simple-folder" offered by user "user1"
		When the user follows the link of the first notification on the webUI
		Then the user should be redirected to a webUI page with the title "simple-folder (2) - Files - ownCloud"

	Scenario: notification link redirection in case a share is pending
		Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
		And user "user1" has shared folder "/simple-folder" with user "user2"
		When the user follows the link of the first notification on the webUI
		Then the user should be redirected to a webUI page with the title "Shared with you - ownCloud"
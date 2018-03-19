@webUI @insulated @disablePreviews
Feature: Sharing files and folders with internal groups
As a user
I want to share files and folders with groups
So that those groups can access the files and folders

	Background:
		Given these users have been created:
			|username|password|displayname|email       |
			|user1   |1234    |User One   |u1@oc.com.np|
			|user2   |1234    |User Two   |u2@oc.com.np|
			|user3   |1234    |User Three |u2@oc.com.np|
		And these groups have been created:
			|groupname|
			|grp1     |
		And user "user1" has been added to group "grp1"
		And user "user2" has been added to group "grp1"
		And the user has browsed to the login page
		And the user has logged in with username "user2" and password "1234" using the webUI

	Scenario: notifications about new share is displayed
		Given the setting "Automatically accept new incoming local user shares" in the section "Sharing" has been disabled
		When user "user3" has shared folder "/simple-folder" with group "grp1"
		And user "user3" has shared folder "/data.zip" with group "grp1"
		Then the user should see 2 notifications on the webUI with these details
			| title                                            |
			| User user3 shared "simple-folder" with you  |
			| User user3 shared "data.zip" with you       |
		When the user re-logs in with username "user1" and password "1234" using the webUI
		Then the user should see 2 notifications on the webUI with these details
			| title                                            |
			| User user3 shared "simple-folder" with you  |
			| User user3 shared "data.zip" with you       |
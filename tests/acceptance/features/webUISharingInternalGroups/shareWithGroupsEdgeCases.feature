@webUI @insulated @disablePreviews
Feature: Sharing files and folders with internal groups
As a user
I want to share files and folders with groups
So that those groups can access the files and folders

	Scenario Outline: sharing  files and folder with an internal problematic group name
		Given these users have been created:
			|username|password|displayname|email       |
			|user1   |1234    |User One   |u1@oc.com.np|
			|user2   |1234    |User Two   |u2@oc.com.np|
			|user3   |1234    |User Three |u2@oc.com.np|
		And these groups have been created:
			|groupname|
			|<group>  |
		And user "user1" has been added to group "<group>"
		And user "user2" has been added to group "<group>"
		And the user has browsed to the login page
		And the user has logged in with username "user3" and password "1234" using the webUI
		When the user shares the folder "simple-folder" with the group "<group>" using the webUI
		And the user shares the file "testimage.jpg" with the group "<group>" using the webUI
		And the user re-logs in with username "user1" and password "1234" using the webUI
		Then the folder "simple-folder (2)" should be listed on the webUI
		And the folder "simple-folder (2)" should be marked as shared with "<group>" by "User Three" on the webUI
		And the file "testimage (2).jpg" should be listed on the webUI
		And the file "testimage (2).jpg" should be marked as shared with "<group>" by "User Three" on the webUI
		When the user re-logs in with username "user2" and password "1234" using the webUI
		Then the folder "simple-folder (2)" should be listed on the webUI
		And the folder "simple-folder (2)" should be marked as shared with "<group>" by "User Three" on the webUI
		And the file "testimage (2).jpg" should be listed on the webUI
		And the file "testimage (2).jpg" should be marked as shared with "<group>" by "User Three" on the webUI
		Examples:
		|group    |
		|?\?@#%@,;|
		 |नेपाली            |


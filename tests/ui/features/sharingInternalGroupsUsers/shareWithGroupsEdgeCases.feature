@insulated
Feature: Sharing files and folders with internal groups
As a user
I want to share files and folders with groups
So that those groups can access the files and folders

	Scenario Outline: sharing  files and folder with an internal problematic group name
		Given these users exist:
			|username|password|displayname|email       |
			|user1   |1234    |User One   |u1@oc.com.np|
			|user2   |1234    |User Two   |u2@oc.com.np|
			|user3   |1234    |User Three |u2@oc.com.np|
		And these groups exist:
			|groupname|
			|<group>  |
		And the user "user1" is in the group "<group>"
		And the user "user2" is in the group "<group>"
		And I am on the login page
		And I login with username "user3" and password "1234"
		When the folder "simple-folder" is shared with the group "<group>"
		And the file "testimage.jpg" is shared with the group "<group>"
		And I relogin with username "user1" and password "1234"
		Then the folder "simple-folder (2)" should be listed
		And the folder "simple-folder (2)" should be marked as shared with "<group>" by "User Three"
		And the file "testimage (2).jpg" should be listed
		And the file "testimage (2).jpg" should be marked as shared with "<group>" by "User Three"
		When I relogin with username "user2" and password "1234"
		Then the folder "simple-folder (2)" should be listed
		And the folder "simple-folder (2)" should be marked as shared with "<group>" by "User Three"
		And the file "testimage (2).jpg" should be listed
		And the file "testimage (2).jpg" should be marked as shared with "<group>" by "User Three"
		Examples:
		|group    |
		|?\?@#%@,;|
		 |नेपाली            |


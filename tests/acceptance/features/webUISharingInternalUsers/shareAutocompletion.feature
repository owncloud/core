@webUI @insulated @disablePreviews @TestAlsoOnExternalUserBackend
Feature: Autocompletion of share-with names
As a user
I want to share files, with minimal typing, to the right people or groups
So that I can efficiently share my files with other users or groups

	Background:
		Given these users have been created but not initialized:
			| username    | password | displayname  | email                 |
			| user1       | 1234     | User One     | u1@oc.com.np          |
			| user2       | 1234     | User Two     | u2@oc.com.np          |
			| user3       | 1234     | User Three   | u2@oc.com.np          |
			| usergrp     | 1234     | User Grp     | u@oc.com.np           |
			| regularuser | 1234     | User Regular | regularuser@oc.com.np |
		And these groups have been created:
			|groupname|
			|group1     |
			|group2     |
			|group3     |
			|groupuser  |
		And the user has browsed to the login page
		And the user has logged in with username "regularuser" and password "1234" using the webUI
		And the user has browsed to the files page

	@skipOnLDAP @user_ldap#175
	Scenario: autocompletion of regular existing users
		Given the user has opened the share dialog for the folder "simple-folder"
		When the user types "user" in the share-with-field
		Then all users and groups that contain the string "user" in their name should be listed in the autocomplete list on the webUI
		And the users own name should not be listed in the autocomplete list on the webUI
		
	Scenario: autocompletion of regular existing groups
		Given the user has opened the share dialog for the folder "simple-folder"
		When the user types "grou" in the share-with-field
		Then all users and groups that contain the string "grou" in their name should be listed in the autocomplete list on the webUI
		And the users own name should not be listed in the autocomplete list on the webUI
		
	Scenario: autocompletion for a pattern that does not match any user or group
		Given the user has opened the share dialog for the folder "simple-folder"
		When the user types "doesnotexist" in the share-with-field
		Then a tooltip with the text "No users or groups found for doesnotexist" should be shown near the share-with-field on the webUI
		And the autocomplete list should not be displayed on the webUI

	@skipOnLDAP
	Scenario: autocomplete short user names when completely typed
		Given these users have been created but not initialized:
			| username  | password | displayname  | email                 |
			| uu1       | 1234     | UU One       | uu1@oc.com.np         |
		And the user has opened the share dialog for the folder "simple-folder"
		When the user types "uu1" in the share-with-field
		Then all users and groups that contain the string "uu1" in their name should be listed in the autocomplete list on the webUI

	Scenario: autocompletion when not enough characters typed
		Given the user has opened the share dialog for the folder "simple-folder"
		When the user types "use" in the share-with-field
		Then a tooltip with the text "No users or groups found for use" should be shown near the share-with-field on the webUI
		And the autocomplete list should not be displayed on the webUI

	Scenario: autocompletion when changing minimum characters for sharing autocomplete
		Given the administrator has set the minimum characters for sharing autocomplete to "2"
		And the user has opened the share dialog for the folder "simple-folder"
		When the user types "us" in the share-with-field
		Then all users and groups that contain the string "us" in their name should be listed in the autocomplete list on the webUI
		And the users own name should not be listed in the autocomplete list on the webUI

	@skipOnLDAP @user_ldap#175
	Scenario: autocompletion of a pattern that matches regular existing users but also a user with whom the item is already shared (folder)
		Given the user has shared the folder "simple-folder" with the user "User One" using the webUI
		And the user has opened the share dialog for the folder "simple-folder"
		When the user types "user" in the share-with-field
		Then all users and groups that contain the string "user" in their name should be listed in the autocomplete list on the webUI except user "User One"
		And the users own name should not be listed in the autocomplete list on the webUI

	@skipOnLDAP @user_ldap#175
	Scenario: autocompletion of a pattern that matches regular existing users but also a user with whom the item is already shared (file)
		Given the user has shared the file "data.zip" with the user "User Grp" using the webUI
		And the user has opened the share dialog for the file "data.zip"
		When the user types "user" in the share-with-field
		Then all users and groups that contain the string "user" in their name should be listed in the autocomplete list on the webUI except user "User Grp"
		And the users own name should not be listed in the autocomplete list on the webUI
	
	Scenario: autocompletion of a pattern that matches regular existing groups but also a group with whom the item is already shared (folder)
		Given the user shares the folder "simple-folder" with the group "group1" using the webUI
		And the user has opened the share dialog for the folder "simple-folder"
		When the user types "grou" in the share-with-field
		Then all users and groups that contain the string "grou" in their name should be listed in the autocomplete list on the webUI except group "group1"
		And the users own name should not be listed in the autocomplete list on the webUI

	Scenario: autocompletion of a pattern that matches regular existing groups but also a group with whom the item is already shared (file)
		Given the user shares the file "data.zip" with the group "groupuser" using the webUI
		And the user has opened the share dialog for the file "data.zip"
		When the user types "grou" in the share-with-field
		Then all users and groups that contain the string "grou" in their name should be listed in the autocomplete list on the webUI except group "groupuser"
		And the users own name should not be listed in the autocomplete list on the webUI


@insulated @TestAlsoOnExternalUserBackend
Feature: Autocompletion of share-with names
As a user
I want to share files, with minimal typing, to the right people or groups
So that I can efficiently share my files with other users or groups

	Background:
		Given these users exist but are not initialized:
			|username|password|displayname|email       |
			|user1   |1234    |User One   |u1@oc.com.np|
			|user2   |1234    |User Two   |u2@oc.com.np|
			|user3   |1234    |User Three |u2@oc.com.np|
			|usergrp |1234    |User Grp   |u@oc.com.np |
		And a regular user exists
		And regular groups exist
		And I am logged in as a regular user
		And I am on the files page
	@skipOnLDAP @user_ldap#175
	Scenario: autocompletion of regular existing users
		And the share dialog for the folder "simple-folder" is open
		When I type "user" in the share-with-field
		Then all users and groups that contain the string "user" in their name should be listed in the autocomplete list
		And my own name should not be listed in the autocomplete list
		
	Scenario: autocompletion of regular existing groups
		And the share dialog for the folder "simple-folder" is open
		When I type "grp" in the share-with-field
		Then all users and groups that contain the string "grp" in their name should be listed in the autocomplete list
		And my own name should not be listed in the autocomplete list
		
	Scenario: autocompletion for a pattern that does not match any user or group
		And the share dialog for the folder "simple-folder" is open
		When I type "doesnotexist" in the share-with-field
		Then a tooltip with the text "No users or groups found for doesnotexist" should be shown near the share-with-field
		And the autocomplete list should not be displayed
		
	@skipOnLDAP @user_ldap#175
	Scenario: autocompletion of a pattern that matches regular existing users but also a user with whom the item is already shared (folder)
		And the folder "simple-folder" is shared with the user "User One"
		And the share dialog for the folder "simple-folder" is open
		When I type "user" in the share-with-field
		Then all users and groups that contain the string "user" in their name should be listed in the autocomplete list except user "User One"
		And my own name should not be listed in the autocomplete list

	@skipOnLDAP @user_ldap#175
	Scenario: autocompletion of a pattern that matches regular existing users but also a user whith whom the item is already shared (file)
		And the file "data.zip" is shared with the user "User Grp"
		And the share dialog for the file "data.zip" is open
		When I type "user" in the share-with-field
		Then all users and groups that contain the string "user" in their name should be listed in the autocomplete list except user "User Grp"
		And my own name should not be listed in the autocomplete list
	
	Scenario: autocompletion of a pattern that matches regular existing groups but also a group with whom the item is already shared (folder)
		And the folder "simple-folder" is shared with the group "grp1"
		And the share dialog for the folder "simple-folder" is open
		When I type "grp" in the share-with-field
		Then all users and groups that contain the string "grp" in their name should be listed in the autocomplete list except group "grp1"
		And my own name should not be listed in the autocomplete list

	Scenario: autocompletion of a pattern that matches regular existing groups but also a group whith whom the item is already shared (file)
		And the file "data.zip" is shared with the group "grpuser"
		And the share dialog for the file "data.zip" is open
		When I type "grp" in the share-with-field
		Then all users and groups that contain the string "grp" in their name should be listed in the autocomplete list except group "grpuser"
		And my own name should not be listed in the autocomplete list

@insulated
Feature: restrict Sharing
As an admin
I want to be able to restrict the sharing function
So that users can only share files with specific users and groups

	Background:
		Given these users exist:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|
		|user2   |1234    |User Two   |u2@oc.com.np|
		|user3   |1234    |User Three |u2@oc.com.np|
		And these groups exist:
		|groupname|
		|grp1     |
		|grp2     |
		And the user "user1" is in the group "grp1"
		And the user "user2" is in the group "grp1"
		And the user "user3" is in the group "grp2"
		And I am on the login page
		And I login with username "user2" and password "1234"
	
	@TestAlsoOnExternalUserBackend
	Scenario: Restrict users to only share with users in their groups
		When the setting "Restrict users to only share with users in their groups" in the section "Sharing" is enabled
		And I am on the files page
		Then it should not be possible to share the folder "simple-folder" with "User Three"
		When the folder "simple-folder" is shared with the user "User One"
		And I relogin with username "user1" and password "1234"
		Then the folder "simple-folder (2)" should be listed

	@TestAlsoOnExternalUserBackend
	Scenario: Restrict users to only share with groups they are member of
		When the setting "Restrict users to only share with groups they are member of" in the section "Sharing" is enabled
		And I am on the files page
		Then it should not be possible to share the folder "simple-folder" with "grp2"
		When the folder "simple-folder" is shared with the group "grp1"
		And I relogin with username "user1" and password "1234"
		Then the folder "simple-folder (2)" should be listed

	@TestAlsoOnExternalUserBackend
	Scenario: Do not restrict users to only share with groups they are member of
		When the setting "Restrict users to only share with groups they are member of" in the section "Sharing" is disabled
		And I am on the files page
		When the folder "simple-folder" is shared with the group "grp2"
		And I relogin with username "user3" and password "1234"
		Then the folder "simple-folder (2)" should be listed

	@TestAlsoOnExternalUserBackend
	Scenario: Forbid sharing with groups
		When the setting "Allow sharing with groups" in the section "Sharing" is disabled
		And I am on the files page
		Then it should not be possible to share the folder "simple-folder" with "grp1"
		And it should not be possible to share the folder "simple-folder" with "grp2"
		When the folder "simple-folder" is shared with the user "User One"
		And I relogin with username "user1" and password "1234"
		Then the folder "simple-folder (2)" should be listed

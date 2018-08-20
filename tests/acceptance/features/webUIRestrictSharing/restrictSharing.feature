@webUI @insulated @disablePreviews
Feature: restrict Sharing
As an admin
I want to be able to restrict the sharing function
So that users can only share files with specific users and groups

	Background:
		Given these users have been created:
		|username|password|displayname|email       |
		|user1   |1234    |User One   |u1@oc.com.np|
		|user2   |1234    |User Two   |u2@oc.com.np|
		|user3   |1234    |User Three |u2@oc.com.np|
		And these groups have been created:
		|groupname|
		|grp1     |
		|grp2     |
		And user "user1" has been added to group "grp1"
		And user "user2" has been added to group "grp1"
		And user "user3" has been added to group "grp2"
		And the user has browsed to the login page
		And the user has logged in with username "user2" and password "1234" using the webUI
	
	@TestAlsoOnExternalUserBackend
	@smokeTest
	Scenario: Restrict users to only share with users in their groups
		Given the setting "Restrict users to only share with users in their groups" in the section "Sharing" has been enabled
		When the user browses to the files page
		Then it should not be possible to share the folder "simple-folder" with "User Three" using the webUI
		When the user shares the folder "simple-folder" with the user "User One" using the webUI
		And the user re-logs in with username "user1" and password "1234" using the webUI
		Then the folder "simple-folder (2)" should be listed on the webUI

	@TestAlsoOnExternalUserBackend
	@smokeTest
	Scenario: Restrict users to only share with groups they are member of
		Given the setting "Restrict users to only share with groups they are member of" in the section "Sharing" has been enabled
		When the user browses to the files page
		Then it should not be possible to share the folder "simple-folder" with "grp2" using the webUI
		When the user shares the folder "simple-folder" with the group "grp1" using the webUI
		And the user re-logs in with username "user1" and password "1234" using the webUI
		Then the folder "simple-folder (2)" should be listed on the webUI

	@TestAlsoOnExternalUserBackend
	Scenario: Do not restrict users to only share with groups they are member of
		Given the setting "Restrict users to only share with groups they are member of" in the section "Sharing" has been disabled
		And the user browses to the files page
		When the user shares the folder "simple-folder" with the group "grp2" using the webUI
		And the user re-logs in with username "user3" and password "1234" using the webUI
		Then the folder "simple-folder (2)" should be listed on the webUI

	@TestAlsoOnExternalUserBackend
	@smokeTest
	Scenario: Forbid sharing with groups
		Given the setting "Allow sharing with groups" in the section "Sharing" has been disabled
		When the user browses to the files page
		Then it should not be possible to share the folder "simple-folder" with "grp1" using the webUI
		And it should not be possible to share the folder "simple-folder" with "grp2" using the webUI
		When the user shares the folder "simple-folder" with the user "User One" using the webUI
		And the user re-logs in with username "user1" and password "1234" using the webUI
		Then the folder "simple-folder (2)" should be listed on the webUI
